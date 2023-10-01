<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

// Faker


use Faker;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $client = new Client(
                [
                    'nom' => $faker->lastName(),
                    'prenom' => $faker->firstName(),
                    'email' => $faker->email(),
                ]
            );
            $manager->persist($client);
        }

        $manager->flush();
    }
}
