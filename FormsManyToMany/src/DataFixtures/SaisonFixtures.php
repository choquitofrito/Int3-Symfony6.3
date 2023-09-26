<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Saison;
use App\Entity\CouleurFleur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SaisonFixtures extends Fixture
{     

    public function load(ObjectManager $manager): void
    {
        $saison1 = new Saison();
        $saison1->setNom("Janvier");
        $manager->persist($saison1);
        $saison2 = new Saison();
        $saison2->setNom("Février");
        $manager->persist($saison2);
        $saison3 = new Saison();
        $saison3->setNom("Mars");
        $manager->persist($saison3);
        $saison4 = new Saison();
        $saison4->setNom("Avril");
        $manager->persist($saison4);
        $saison5 = new Saison();
        $saison5->setNom("Mai");
        $manager->persist($saison5);
        $saison6 = new Saison();
        $saison6->setNom("Juin");
        $manager->persist($saison6);
        $saison7 = new Saison();
        $saison7->setNom("Juillet");
        $manager->persist($saison7);
        $saison8 = new Saison();
        $saison8->setNom("Août");
        $manager->persist($saison8);
        $saison9 = new Saison();
        $saison9->setNom("Septembre");
        $manager->persist($saison9);
        $saison10 = new Saison();
        $saison10->setNom("Octobre");
        $manager->persist($saison10);
        $saison11 = new Saison();
        $saison11->setNom("Novembre");
        $manager->persist($saison11);
        $saison12 = new Saison();
        $saison12->setNom("Décembre");
        $manager->persist($saison12);
        
        
        $manager->flush();

        
    }
}