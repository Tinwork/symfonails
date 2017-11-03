<?php

// src/AppBundle/Entity/Article.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *  @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
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
     private $description;

     /**
      * Get Title
      * @return string
      */
     public function getTitle() {
         return $this->title;
     }

    /**
     * @var \AppBundle\Entity\Tag
     * 
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", cascade={"persist"})
     */
    private $tags;

     /**
      * Get Id
      * @return integer
      */
     public function getId() {
         return $this->id;
     }


     /**
      * Get Title
      * @return string
      */
     public function getCreatedAt() {
         return $this->createdAt;
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

    public function gettags() {
        return $this->tags;
    }

    /**
     * Set Description
     * @var string
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    public function addTags(Tag $tags)
    {
        $tags->addArticle($this);

        $this->tags->add($tags);
    }
}