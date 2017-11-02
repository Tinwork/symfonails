<?php

// src/AppBundle/Entity/Article.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *  @ORM\Entity
 */
class Article {

    /**
     * @var integer
     * 
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
     private $content;

    /**
     * @var string
     * 
     * @ORM\Column(type="text")
     */
     private $description;

     /**
      * Get Title
      * @return string
      */
     public function getTitle() {
         return $this->title;
     }

     /**
      * Get Title
      * @return string
      */
     public function getCreatedAt() {
         return $this->createdAt;
     }

     /**
      * Get Title
      * @return string
      */
     public function getContent() {
         return $this->content;
     }

     /**
      * Get Description
      * @return string
      */
     public function getDescription() {
        return $this->description;
     }

     /**
      * Set Title
      * @var string
      */
     public function setTitle($title) {
        $this->title = $title;
    }

    /**
      * Set Created At
      * @var string
      */
    public function setCreatedAt() {
        $this->createdAt = new \DateTime();
    }

    /**
      * Set Content
      * @var string
      */
    public function setContent($content) {
        $this->content = $content;
    }

    /**
     * Set Description
     * @var string
     */
    public function setDescription($description) {
        $this->description = $description;
    }
}