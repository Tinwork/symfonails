<?php 

// src/AppBundle/Entity/Tag.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Tag {

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
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Article", inversedBy="slug")
     */
    private $label;

    /**
     * Set Tag
     * @var string
     */
    public function setTag($label) {
        $this->label = $label;
    }

    /**
     * Get Tag
     * @return string
     */
    public function getTag() {
        return $this->label;
    }

    /**
     * Get Id
     * @return integer
     */
    public function getId() {
        return $this->id;
    }
    
}