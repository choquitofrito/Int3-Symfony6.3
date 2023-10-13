<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $c1 = new Categories();
        $c1->setNom("Entrée" );

        $c2 = new Categories();
        $c2->setNom("Plat" );

        $c3 = new Categories();
        $c3->setNom("Dessert" );

        $c4 = new Categories();
        $c4->setNom("Accompagnement" );

        $c5 = new Categories();
        $c5->setNom("Apero" );

        $c6 = new Categories();
        $c6->setNom("Dejeuner" );

        $c7 = new Categories();
        $c7->setNom("Boisson" );

        $c8 = new Categories();
        $c8->setNom("Soupes et potages" );

        $c9 = new Categories();
        $c9->setNom("Sauces et condiments" );

        $c10 = new Categories();
        $c10->setNom("En-cas" );

        $c11 = new Categories();
        $c11->setNom("Viande" );

        $c12 = new Categories();
        $c12->setNom("Poissons et fruits de mer" );

        $c13 = new Categories();
        $c13->setNom("Produits Laitiers" );

        

       
       
       
        $manager->persist($c1);
        $manager->persist($c2);
        $manager->persist($c3);
        $manager->persist($c4);
        $manager->persist($c5);
        $manager->persist($c6);
        $manager->persist($c7);
        $manager->persist($c8);
        $manager->persist($c9);
        $manager->persist($c10);
        $manager->persist($c11);
        $manager->persist($c12);
        $manager->persist($c13);
        

        $manager->flush();
    }
}
