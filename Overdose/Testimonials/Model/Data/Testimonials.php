<?php

namespace Overdose\Testimonials\Model\Data;

use Overdose\Testimonials\Api\Data\TestimonialsInterface;

/**
 * Class Testimonials
 * @package Overdose\Testimonials\Model\Data
 */
class Testimonials extends \Magento\Framework\Api\AbstractExtensibleObject implements TestimonialsInterface
{

    /**
     * @return mixed|null
     */
    public function getTestimonialsId()
    {
        return $this->_get(self::TESTIMONIALS_ID);
    }

    /**
     * @param $testimonialsId
     * @return mixed|Testimonials
     */
    public function setTestimonialsId($testimonialsId)
    {
        return $this->setData(self::TESTIMONIALS_ID, $testimonialsId);
    }

    /**
     * Get title
     * @return string|null
     */
    public function getTitle()
    {
        return $this->_get(self::TITLE);
    }

    /**
     * Set title
     * @param string $title
     * @return \Overdose\Testimonials\Api\Data\TestimonialsInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }


    /**
     * Get message
     * @return string|null
     */
    public function getMessage()
    {
        return $this->_get(self::MESSAGE);
    }

    /**
     * Set message
     * @param string $message
     * @return \Overdose\Testimonials\Api\Data\TestimonialsInterface
     */
    public function setMessage($message)
    {
        return $this->setData(self::MESSAGE, $message);
    }

    /**
     * Get upload_pic
     * @return string|null
     */
    public function getUploadPic()
    {
        return $this->_get(self::UPLOAD_PIC);
    }

    /**
     * Set upload_pic
     * @param string $uploadPic
     * @return \Overdose\Testimonials\Api\Data\TestimonialsInterface
     */
    public function setUploadPic($uploadPic)
    {
        return $this->setData(self::UPLOAD_PIC, $uploadPic);
    }
}

