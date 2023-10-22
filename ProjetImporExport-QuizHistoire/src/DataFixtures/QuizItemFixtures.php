<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\QuizItem;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class QuizItemFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 150; $i++) {

            $item = new QuizItem();
            $item->setTitle('Quiz item #' . $i);
            $item->setYear(mt_rand(-800, 1900));
            $item->setDescription('This happened in ' . $item->getYear());
            $item->setLink('Link #' . $i);
            $item->setImage($faker->imageUrl($width = 640, $height = 480));

            $manager->persist($item);
        }

        $manager->flush();
    }
}
