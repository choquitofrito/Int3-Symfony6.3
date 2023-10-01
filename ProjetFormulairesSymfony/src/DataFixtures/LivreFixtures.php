<?php

namespace App\DataFixtures;

use App\Entity\Livre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

// Faker


use Faker;

class LivreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $livre = new Livre(
                [
                    'titre' => $faker->text(),
                    'isbn' => $faker->isbn13(),
                    'nombrePages'=> $faker->numberBetween(50,200),
                    'prix'=>$faker->numberBetween(10,50),
                    'datePublication'=> $faker->dateTime(),
                    'description' => $faker->text(),
                    'dateEdition'=> $faker->dateTime()
                ]
            );
            $manager->persist($livre);
        }

        $manager->flush();
    }
}
