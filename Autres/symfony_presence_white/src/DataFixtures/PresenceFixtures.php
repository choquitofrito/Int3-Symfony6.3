<?php

namespace App\DataFixtures;

use App\Entity\Personne;
use App\Entity\Presence;
use App\Entity\Evenement;
use App\DataFixtures\PersonneUserFixtures;
use App\DataFixtures\EvenementFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class PresenceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $etat = array('yes', 'no');
        $complement = array('present', 'absent', 'excusé', 'malade', 'renfort');

        // obtenir un Personne au hasard
        $repPersonne = $manager->getRepository(Personne::class);
        $arrayPersonnes = $repPersonne->findAll();

        // obtenir un Evenement au hasard
        $repEvenement = $manager->getRepository(Evenement::class);
        $arrayEvenements = $repEvenement->findAll();



        for ($i = 0; $i < 40; $i++) {
            $presence = new Presence([
                'etat' => $etat[mt_rand(0, count($etat) - 1)],
                'complement' => $complement[mt_rand(0, count($complement) - 1)],
            ]);

            $randomPersonne = $arrayPersonnes[array_rand($arrayPersonnes)];
            $presence->setJoueur($randomPersonne);
            $randomEvenement = $arrayEvenements[array_rand($arrayEvenements)];
            $presence->setEvenement($randomEvenement);


            $manager->persist($presence);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return ([
            PersonneUserFixtures::class,
            EvenementFixtures::class,
        ]);
    }
}
