<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i <= 10; $i++) {
            $produit = new Produit();
            $produit
                ->setNom('Produit ' . $i)
                ->setDescription('la description')
                ->setPrix(mt_rand(2,5))
                ->setLien ("p" . rand(1,3) . ".jpg");

            $manager->persist($produit);
        }
        $manager->flush();

    }
}