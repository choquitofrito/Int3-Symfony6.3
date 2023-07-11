<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Pays;

class PaysFixtures extends Fixture
{
    // load créera et stockera 20 pays dans la BD
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $pays = new Pays();
            $pays->setNom("Fixtures" . $i);
            // on n'a pas d'image encore : $pays->setImage("Fixtures" . $i . ".jpg");
            // $pays->setImage ("blabla.jpg"); // on ne vas pas mettre des liens fictifs car les fichiers n'existeront pas!
            $manager->persist($pays);
        }
        $manager->flush();
    }
}
