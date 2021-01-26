<?php


namespace Overdose\Testimonials\Model\ResourceModel\Testimonials;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Overdose\Testimonials\Model\ResourceModel\Testimonials
 */
class Collection extends AbstractCollection
{
    protected $_idFieldName = 'testimonials_id';
    protected $_eventPrefix = 'overdose_testimonials_collection';
    protected $_eventObject = 'testimonials_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Overdose\Testimonials\Model\Testimonials', 'Overdose\Testimonials\Model\ResourceModel\Testimonials');
    }

}
