<?php

namespace App\DataFixtures;

use App\Entity\Personne;
use App\Entity\Equipe;
use App\DataFixtures\PersonneUserFixtures;
use App\DataFixtures\EquipeFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EquipeJoueursFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Obtenir tous les personnes et puis tous les role_joueurs
        $personnes = $manager
            ->getRepository(Personne::class)
            ->findAll();
        $joueurs = [];
        foreach ($personnes as $personne) {
            if (in_array("ROLE_USER", $personne->getUser()->getRoles(), true)) {
                $joueurs[] = $personne;
            }
        }
        // Obtenir toutes les equipes
        $repEquipes = $manager->getRepository(Equipe::class);
        $arrayObjEquipes = $repEquipes->findAll();


        // Parcourir tous les personnes qui ont le role user et leur attribuer une equipe (avec add)
        foreach ($joueurs as $joueur) {
            $randomIndex = array_rand($arrayObjEquipes);
            $joueur->addEquipesJoueur($arrayObjEquipes[$randomIndex]);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            PersonneUserFixtures::class,
            EquipeFixtures::class,
        ];
    }
}
