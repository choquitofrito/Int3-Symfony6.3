<?php

namespace App\DataFixtures;

use App\Entity\Regime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class RegimesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $r1 = new Regime();
        $r1->setNom("Vegetarien" );

        $r2 = new Regime();
        $r2->setNom("Vegetalien" );

        $r3 = new Regime();
        $r3->setNom("Sans Lactose" );

        $r4 = new Regime();
        $r4->setNom("Sans gluten" );

        $r5 = new Regime();
        $r5->setNom("Mediterannéen" );


        $manager->persist($r1);
        $manager->persist($r2);
        $manager->persist($r3);
        $manager->persist($r4);
        $manager->persist($r5);
        $manager->flush();
    }
}
