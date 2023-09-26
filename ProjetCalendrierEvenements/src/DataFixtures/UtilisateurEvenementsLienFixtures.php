<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use App\Entity\Utilisateur;

use App\DataFixtures\EvenementFixtures;
use App\DataFixtures\UtilisateurFixtures;

use Doctrine\Persistence\ObjectManager;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class UtilisateurEvenementsLienFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        $rep = $manager->getRepository(Evenement::class);
        $evenements = $rep->findAll();
        $rep = $manager->getRepository(Utilisateur::class);
        $utilisateurs = $rep->findAll();
        
        for ($i = 0; $i < count ($evenements) ; $i++){
            $utilisateurChoisi = $utilisateurs[ rand (0, count($utilisateurs) - 1)];
            $utilisateurChoisi->addEvenement($evenements[$i]);
            $manager->persist($evenements[$i]);
        }
        $manager->flush();

    }

    public function getDependencies()
    {
        return ([UtilisateurFixtures::class,
                EvenementFixtures::class]);

    }

}
