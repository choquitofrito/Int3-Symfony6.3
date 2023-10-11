<?php

namespace App\DataFixtures;

use App\Entity\Equipe;
use App\Entity\Personne;
use App\DataFixtures\EquipeFixtures;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\PersonneUserFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EquipeCoachLinkFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        // 1. Obtenir tous les personnes et puis tous les joueurs
        $personnes = $manager
            ->getRepository(Personne::class)
            ->findAll();
        $coaches = [];
        foreach ($personnes as $personne) {
            if (in_array("ROLE_COACH", $personne->getUser()->getRoles(), true)) {
                $coaches[] = $personne;
            }
        }

        // 2. Obtenir tous les Equipes
        $repEquipes = $manager->getRepository(Equipe::class);
        $arrayObjEquipes = $repEquipes->findAll();

        // 3. Parcourir tous les Users. Pour chaque User, rajouter (add) un Equipe aléatoire
        foreach ($coaches as $coach) {
            $randomIndex = array_rand($arrayObjEquipes); // l'index d'un Equipe, random
            $coach->addEquipesCoach($arrayObjEquipes[$randomIndex]);
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
