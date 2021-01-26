<?php

namespace Overdose\Testimonials\Api\Data;
/**
 * Interface TestimonialsInterface
 * @package Overdose\Testimonials\Api\Data
 */
interface TestimonialsInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const TESTIMONIALS_ID = 'testimonials_id';
    const UPLOAD_PIC = 'upload_pic';
    const TITLE = 'title';
    const MESSAGE = 'message';

    /**
     * @return mixed
     */
    public function getTestimonialsId();

    /**
     * @param $testimonialsId
     * @return mixed
     */
    public function setTestimonialsId($testimonialsId);

    /**
     * @return mixed
     */
    public function getTitle();

    /**
     * @param $title
     * @return mixed
     */
    public function setTitle($title);


    /**
     * @return mixed
     */
    public function getMessage();

    /**
     * @param $message
     * @return mixed
     */
    public function setMessage($message);

    /**
     * @return mixed
     */
    public function getUploadPic();

    /**
     * @param $uploadPic
     * @return mixed
     */
    public function setUploadPic($uploadPic);
}
