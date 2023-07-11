<?php

namespace App\DataFixtures;

use Faker\Factory;

use App\Entity\Aeroport;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AeroportFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create ('fr_FR');

        for ($i = 0; $i < 25; $i++) {
            $aeroport = new Aeroport();
            $aeroport->setNom("aeroport" . $i);
            $aeroport->setCode("COD" . $i);
            $manager->persist($aeroport);
        }
        $manager->flush();
    }
}
