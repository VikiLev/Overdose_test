<?php

namespace Overdose\Testimonials\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;
use Overdose\Testimonials\Api\TestimonialsRepositoryInterface;
use Overdose\Testimonials\Api\Data\TestimonialsInterfaceFactory;
use Overdose\Testimonials\Api\Data\TestimonialsSearchResultsInterfaceFactory;
use Overdose\Testimonials\Model\ResourceModel\Testimonials as ResourceTestimonials;
use Overdose\Testimonials\Model\ResourceModel\Testimonials\CollectionFactory as TestimonialsCollectionFactory;

/**
 * Class TestimonialsRepository
 * @package Overdose\Testimonials\Model
 */
class TestimonialsRepository implements TestimonialsRepositoryInterface
{

    private $storeManager;

    protected $dataObjectProcessor;

    private $collectionProcessor;

    protected $testimonialsCollectionFactory;

    protected $datatestimonialsFactory;

    protected $extensibleDataObjectConverter;
    protected $testimonialsFactory;

    protected $searchResultsFactory;

    protected $extensionAttributesJoinProcessor;

    protected $resource;

    protected $dataObjectHelper;

    /**
     * TestimonialsRepository constructor.
     * @param ResourceTestimonials $resource
     * @param TestimonialsFactory $testimonialsFactory
     * @param TestimonialsInterfaceFactory $datatestimonialsFactory
     * @param TestimonialsCollectionFactory $testimonialsCollectionFactory
     * @param TestimonialsSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceTestimonials $resource,
        TestimonialsFactory $testimonialsFactory,
        TestimonialsInterfaceFactory $datatestimonialsFactory,
        TestimonialsCollectionFactory $testimonialsCollectionFactory,
        TestimonialsSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->testimonialsFactory = $testimonialsFactory;
        $this->testimonialsCollectionFactory = $testimonialsCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->datatestimonialsFactory = $datatestimonialsFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Overdose\Testimonials\Api\Data\TestimonialsInterface $testimonials
    ) {

        $testimonialsData = $this->extensibleDataObjectConverter->toNestedArray(
            $testimonials,
            [],
            \Overdose\Testimonials\Api\Data\TestimonialsInterface::class
        );

        $testimonialsModel = $this->testimonialsFactory->create()->setData($testimonialsData);

        try {
            $this->resource->save($testimonialsModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the testimonials: %1',
                $exception->getMessage()
            ));
        }
        return $testimonialsModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($testimonialsId)
    {
        $testimonials = $this->testimonialsFactory->create();
        $this->resource->load($testimonials, $testimonialsId);
        if (!$testimonials->getId()) {
            throw new NoSuchEntityException(__('Testimonials with id "%1" does not exist.', $testimonialsId));
        }
        return $testimonials->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->testimonialsCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Overdose\Testimonials\Api\Data\TestimonialsInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Overdose\Testimonials\Api\Data\TestimonialsInterface $testimonials
    ) {
        try {
            $testimonialsModel = $this->testimonialsFactory->create();
            $this->resource->load($testimonialsModel, $testimonials->gettestimonialsId());
            $this->resource->delete($testimonialsModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Testimonials: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($testimonialsId)
    {
        return $this->delete($this->get($testimonialsId));
    }
}
