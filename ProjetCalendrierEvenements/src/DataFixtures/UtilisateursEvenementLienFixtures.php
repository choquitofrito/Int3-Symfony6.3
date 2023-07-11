<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Evenement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\Utilisateur;
// use Faker;

class UtilisateursEvenementLienFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // $faker = Faker\Factory::create();


        // on obtient tous les utilisateurs. Pour chaque Evenement on fixera un User random
        $rep = $manager->getRepository(Utilisateur::class);
        $utilisateurs = $rep->findAll(); // array d'utilisateurs

        $rep = $manager->getRepository(Evenement::class);
        $evenements = $rep->findAll(); // array d'utilisateurs

        // créer des Evenements
        for ($i = 0; $i < count($evenements); $i++) {
            // affecter un utilisateur random
            $utilisateurChoisi = $utilisateurs[rand(0,count($utilisateurs)-1)];
            $utilisateurChoisi->addEvenement($evenements[$i]);

            $manager->persist($evenements[$i]);
        }
        $manager->flush();
    }
}
