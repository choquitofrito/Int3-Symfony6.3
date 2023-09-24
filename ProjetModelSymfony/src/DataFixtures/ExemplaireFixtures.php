<?php

namespace App\DataFixtures;

use App\Entity\Livre;
use App\Entity\Exemplaire;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ExemplaireFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $repLivres = $manager->getRepository(Livre::class);
        $arrayLivres = $repLivres->findAll();
        // si on veut un ensemble de valeurs fixes, on peut 
        // se créer un array
        $etats = ['bon', 'mauvais', 'très abîmé'];
        for ($i = 0; $i < 100; $i++) {
            // générer un index au hasard (pour obtenir un état au hasard)
            $indexEtat = mt_rand(0, count($etats) - 1); // index aléatoire array états

            // création de l'exemplaire sans Livre associé
            $exemplaire = new Exemplaire(
                [
                    'etat' => $etats[$indexEtat],
                ]
            );

            // associer un Livre au hasard à l'exemplaire

            // générer un index au hasard
            $indexLivre = mt_rand(0, count($arrayLivres) - 1);   
            // prendre le Livre qui se trouve dans cet index          
            $randomLivre = $arrayLivres[$indexLivre];
            // fixer le Livre (1 seul) à l'Exemplaire
            $exemplaire->setLivre($randomLivre);

            $manager->persist($exemplaire);
        }

        $manager->flush();
    }
}
