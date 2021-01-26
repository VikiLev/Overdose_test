<?php

namespace Overdose\Testimonials\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Context;

/**
 * Class Testimonials
 * @package Overdose\Testimonials\Model\ResourceModel
 */
class Testimonials extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(
        Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('overdose_testimonials', 'testimonials_id');
    }
}
