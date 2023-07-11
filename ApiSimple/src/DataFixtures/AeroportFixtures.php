<?php

namespace App\DataFixtures;

use App\Entity\Aeroport;
use Faker\Factory;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AeroportFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create ('fr_FR');

        for ($i = 0; $i < 25; $i++) {
            $produit = new Aeroport();
            $produit->setNom("Aeroport" . $i);
            $produit->setCode("AER" . $i);
            $manager->persist($produit);
        }
        $manager->flush();
    }
}
