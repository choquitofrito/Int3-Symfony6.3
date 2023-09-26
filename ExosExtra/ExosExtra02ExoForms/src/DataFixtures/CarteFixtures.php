<?php

namespace App\DataFixtures;

use App\Entity\Carte;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CarteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i= 0 ; $i<10; $i++){
            $carte = new Carte(['nom' => 'Perso' . $i,
                                'description' => 'ce personnage blablabla ' . $i,
                                'pv'=> rand(10,20)]);
            $manager->persist($carte);
            $manager->flush();
        }

    }
}
