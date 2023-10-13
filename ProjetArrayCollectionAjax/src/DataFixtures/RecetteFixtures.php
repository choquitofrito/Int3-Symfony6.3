<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Recette;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RecetteFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $rep = $manager->getRepository(User::class);
        $user = $rep->findAll();

        for ($i = 0; $i < 100; $i++) {
            $userChoisi = $user[rand(0, count($user) - 1)];
            $recette = new Recette();
            // créer un hydrate!!!
            $recette->setTitre("pizza" );
            $recette->setDureePreparation("25min" );
            $recette->setTempsCuisson("15min" );
            $recette->setNbPersonne("2" );
            $recette->setPhoto("2.png" );
            $recette->setDescription("Description, description, description" );
            $recette->setUser($userChoisi);

            $userChoisi->addRecette($recette);
            $manager->persist($recette);
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
