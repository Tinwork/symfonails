<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Tags extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        // create 20 tag! Bam!
        for ($i = 0; $i < 20; $i++) {
            $tag = new Tag();
            $tag->setTitle($faker->name());
            $manager->persist($tag);
        }

        $manager->flush();
    }
}
