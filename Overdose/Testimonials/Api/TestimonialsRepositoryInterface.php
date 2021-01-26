<?php

namespace Overdose\Testimonials\Api;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface TestimonialsRepositoryInterface
 * @package Overdose\Testimonials\Api
 */
interface TestimonialsRepositoryInterface
{

    /**
     * @param Data\TestimonialsInterface $testimonials
     * @return mixed
     */
    public function save(
        \Overdose\Testimonials\Api\Data\TestimonialsInterface $testimonials
    );

    /**
     * @param $testimonialsId
     * @return mixed
     */
    public function get($testimonialsId);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * @param Data\TestimonialsInterface $testimonials
     * @return mixed
     */
    public function delete(
        \Overdose\Testimonials\Api\Data\TestimonialsInterface $testimonials
    );

    /**
     * @param $testimonialsId
     * @return mixed
     */
    public function deleteById($testimonialsId);
}

