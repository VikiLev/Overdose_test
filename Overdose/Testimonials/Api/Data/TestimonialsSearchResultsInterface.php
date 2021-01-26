<?php

namespace Overdose\Testimonials\Api\Data;
/**
 * Interface TestimonialsSearchResultsInterface
 * @package Overdose\Testimonials\Api\Data
 */
interface TestimonialsSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Testimonials list.
     * @return \Overdose\Testimonials\Api\Data\TestimonialsInterface[]
     */
    public function getItems();

    /**
     * Set title list.
     * @param \Overdose\Testimonials\Api\Data\TestimonialsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

