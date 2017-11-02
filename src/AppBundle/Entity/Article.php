<?php

// src/AppBundle/Entity/Article.php
namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM; 
use Doctrine\Common\Collections\ArrayCollection;

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
     * @var Tag
     */
    private $tags;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var string
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string")
     * @ORM\OneToMany(targetEntity="Tag", mappedBy="label")
     */
    private $slug;

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
      * Article::Constructor
      */
     public function __construct() {
        $this->tags = new ArrayCollection();
     }

    /**
     * Get Id
     * @return int
     */
     public function getId() {
        return $this->id;
     }

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
      * Get Tags
      * @return tags
      */
     public function getTags() {
         return $this->tags;
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

    /**
     * Set Tag
     * @var Tag
     */
    public function setTags(Tag $tag) {
        $this->tags->add($tag);
    }
}