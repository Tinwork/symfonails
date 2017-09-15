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
      * Get Title
      * @return string
      */
     public function getTitle() {
         return $this->tilte;
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
      * Set Title
      * @void
      * @var string
      */
     public function setTitle($title) {
        $this->tilte = $title;
    }

    /**
      * Set Created At
      * @void
      * @var string
      */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    /**
      * Set Content
      * @void
      * @var string
      */
    public function setContent($content) {
        $this->content = $content;
    }
}