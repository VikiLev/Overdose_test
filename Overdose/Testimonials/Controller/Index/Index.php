<?php

namespace Overdose\Testimonials\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Overdose\Testimonials\Controller\Index
 */
class Index extends Action
{
    /** @var  \Magento\Framework\View\Result\Page */
    protected $resultPageFactory;
    /**
     * @param Context $context
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     *
     * @return PageFactory
     */
    public function execute()
    {
        $resultFactory = $this->resultPageFactory->create();
        return $resultFactory;
    }
}
