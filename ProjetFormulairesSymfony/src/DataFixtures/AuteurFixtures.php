<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

// Faker


use Faker;

class AuteurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $auteur = new Auteur(
                [
                    'nom' => $faker->name(),
                    'nationalite' => $faker->country()
                ]
            );
            $manager->persist($auteur);
            // dd($auteur);
        }

        $manager->flush();
    }
}
