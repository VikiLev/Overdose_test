<?php

namespace Overdose\Testimonials\Model;
/**
 * Class Testimonials
 * @package Overdose\Testimonials\Model
 */
class Testimonials extends \Magento\Framework\Model\AbstractModel
{
    const CACHE_TAG = 'overdose_testimonials';

    protected $_cacheTag = 'overdose_testimonials';

    protected $_eventPrefix = 'overdose_testimonials';

    protected function _construct()
    {
        $this->_init('Overdose\Testimonials\Model\ResourceModel\Testimonials');
    }
}
