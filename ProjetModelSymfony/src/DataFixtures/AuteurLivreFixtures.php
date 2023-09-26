<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use App\Entity\Livre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AuteurLivreFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        // 1. Obtenir tous les Livres
        $repLivres = $manager->getRepository(Livre::class);
        $arrayObjLivres = $repLivres->findAll();

        // 2. Obtenir tous les Auteurs
        $repAuteurs = $manager->getRepository(Auteur::class);
        $arrayObjAuteurs = $repAuteurs->findAll();

        // 3. Parcourir tous les Livres. Pour chaque Livre, rajouter (add) un Auteur aléatoire
        foreach ($arrayObjLivres as $livre) {
            $randomIndex = mt_rand(0, count($arrayObjAuteurs) - 1); // l'index d'un Auteur, random
            $livre->addAuteur($arrayObjAuteurs[$randomIndex]); 
            $manager->persist($livre);
        }
        $manager->flush();
    }

    // fixer les dépéndances de cette fixture
    public function getDependencies(): array
    {
        return [
            AuteurFixtures::class,
            LivreFixtures::class
        ];
    }
}
