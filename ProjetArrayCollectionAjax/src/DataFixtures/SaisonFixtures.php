<?php

namespace App\DataFixtures;

use App\Entity\Saison;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class SaisonFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $s1 = new Saison();
        $s1->setNom("Printemps" );

        $s2 = new Saison();
        $s2->setNom("Eté" );

        $s3 = new Saison();
        $s3->setNom("Automne" );

        $s4 = new Saison();
        $s4->setNom("Hiver" );
       
       
        $manager->persist($s1);
        $manager->persist($s2);
        $manager->persist($s3);
        $manager->persist($s4);

$manager->flush();
    }
}
