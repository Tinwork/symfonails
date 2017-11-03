<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadArticle extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        // create 20 tag! Bam!
        for ($i = 0; $i < 20; $i++) {
            $article = new Article();
            $article->setTitle($faker->name());
            $article->setDescription($faker->name());
            $article->setCreatedAt();
            
            $manager->persist($article);
        }

        $manager->flush();
    }
}
