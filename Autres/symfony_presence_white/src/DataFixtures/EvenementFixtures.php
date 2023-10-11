<?php

namespace App\DataFixtures;

use Faker;
use Faker\Factory;

use App\Entity\Evenement;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\PersonneUserFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EvenementFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $type = array('match', 'entrainement', 'physique', 'gardien');

        for ($i = 0; $i < 100; $i++) {
            $evenement = new Evenement();

            $evenement->setTitle($type[mt_rand(0, count($type) - 1)]);
            $evenement->setStart($date = $faker->dateTimeBetween('-4 month', '+0 day'));
            $evenement->setEnd($date);
            $evenement->setBackgroundColor("#ff0000");
            $evenement->setTextColor("#ffffff");
            $evenement->setBorderColor("#000000");
    

            $manager->persist($evenement);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return ([
            PersonneUserFixtures::class,
        ]);
    }
}
