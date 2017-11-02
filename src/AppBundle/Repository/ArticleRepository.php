<?php 
// src/AppBundle/Entity/Article.php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Tag;

class ArticleRepository extends EntityRepository {

    /**
     * Find By Tag
     */
    // public function findByTag($tag, $isRemoved = false)
    // {
    //     $query = $this->createQueryBuilder('a')
    //         ->join('a.tags', 't')
    //         ->where('t.slug = :tag')
    //         ->setParameter('tag', $tag)
    //         ->andWhere('a.removed = :isRemoved')
    //         ->setParameter('isRemoved', $isRemoved)
    //         ->orderBy('a.title', 'ASC')
    //         ->getQuery();

    //    return $query->getResult();
    // }

    /**
     * Get Articles By Tag
     * @var Tag
     * @return query::object
     */
    public function findByTags(Tag $tag) {
        $qb = $this->createQueryBuilder ('a');
        
        // Create a custom request
        $qb
        ->leftJoin('a.slug', 't');

        var_dump($qb->getQuery());

        return $qb->getQuery()->getResult();
    }
}