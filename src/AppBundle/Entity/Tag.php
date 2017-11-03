<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *  @ORM\Entity
 */
class Tag
{

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
      * Get Id
      * @return string
      */
    public function getId()
    {
        return $this->id;
    }

     /**
      * Get Title
      * @return string
      */
    public function getTitle()
    {
        return $this->title;
    }

     /**
      * Set Title
      * @var string
      */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function addArticle(Article $article)
    {
        if (!$this->article->contains($article)) {
            $this->article->add($article);
        }
    }
}
