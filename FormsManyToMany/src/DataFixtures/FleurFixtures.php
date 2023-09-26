<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Fleur;
use App\Entity\ModeVente;
use App\Entity\CouleurFleur;
use App\Entity\Conditionnement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class FleurFixtures extends Fixture implements DependentFixtureInterface
{       

    public function load(ObjectManager $manager): void
    {
        
        $rep = $manager->getRepository(User::class);
        $users = $rep->findAll();

        for($i = 1; $i <= 10; $i++)
        
        {
            $userChoisi = $users[rand(0, count($users)-1)];


            $fleur = new Fleur();
            $fleur->setNom("fleur".$i);
            $fleur->setPrix(10,00);

            $fleur->setUser($userChoisi);

            $manager->persist($fleur);
        }

        
        
        $manager->flush();

        
    }

    public function getDependencies()
    {
        return ([
            UserFixtures::class
        ]);
    }
}

