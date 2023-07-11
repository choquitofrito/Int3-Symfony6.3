<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Livre;



class LivreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 10; $i++) {
            $livre = new Livre();
            // si on a un hydrate, pas besoin de sets...
            $livre->setTitre("La vie de Toto Vol. " . $i);
            $livre->setIsbn("12123123123123" . $i);
            $livre->setPrix($i + 20);
            $manager->persist($livre);
        }

        $manager->flush();
    }
}
