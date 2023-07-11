<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Produit;
use App\Entity\Commande;
use App\Entity\DetailCommande;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class DetailCommandeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        // on obtient tous les commandes. Pour chaque Evenement on fixera un User random
        $rep = $manager->getRepository(Commande::class);
        $commandes = $rep->findAll();

        $rep = $manager->getRepository(Produit::class);
        $produits = $rep->findAll();

        // créer des DetailsCommande
        for ($i = 0; $i < 50; $i++) {
            // affecter un commande random et un produit random
            $commandeChoisie = $commandes[rand(0, count($commandes) - 1)];
            $produitChoisi = $produits[rand(0, count($produits) - 1)];

            $detailCommande = new DetailCommande();
            $detailCommande->setProduit($produitChoisi);
            $detailCommande->setCommande($commandeChoisie);
            $detailCommande->setQuantite(rand(5, 20));
            
            $commandeChoisie->addDetail($detailCommande);
            $produitChoisi->addDetail($detailCommande);

            $manager->persist($detailCommande);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return ([
            ProduitFixtures::class,
            CommandeFixtures::class
        ]);
    }
}
