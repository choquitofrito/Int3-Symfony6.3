<?php

namespace App\DataFixtures;

use App\Entity\Emprunt;
use App\Entity\Client;
use App\Entity\Exemplaire;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
// Faker
use Faker;

class EmpruntFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create();



        // obtenir un Client au hasard
        $repClient = $manager->getRepository(Client::class);
        $arrayClients = $repClient->findAll();

        // obtenir un Exemplaire au hasard
        $repExemplaire = $manager->getRepository(Exemplaire::class);
        $arrayExemplaires = $repExemplaire->findAll();



        for ($i = 0; $i < 200; $i++) {

            $dateEmprunt = $faker->dateTime();
            $dateRetourPrevu = clone $dateEmprunt;
            $dateRetourPrevu->modify("+25 day");
            $dateRetourReelle = clone $dateEmprunt;
            $dateRetourReelle->modify("+" . mt_rand(1, 40) . " day");


            // créer l'emprunt
            $emprunt = new Emprunt([
                'dateEmprunt' => $dateEmprunt,
                'dateRetourPrevu' => $dateRetourPrevu,
                'dateRetourReelle' => $dateRetourReelle
            ]);

            $randomClient = $arrayClients[array_rand($arrayClients)];
            $emprunt->setClient($randomClient);
            $randomExemplaire = $arrayExemplaires[array_rand($arrayExemplaires)];
            $emprunt->setExemplaire($randomExemplaire);

            $manager->persist($emprunt);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return ([
            ClientFixtures::class,
            ExemplaireFixtures::class
        ]);
    }
}
