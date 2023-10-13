<?php

namespace App\DataFixtures;

use App\Entity\Ingredients;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IngredientsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $ingredient = new Ingredients();
            // si on a un hydrate, pas besoin de sets...
            $ingredient->setNom("ingredient" . $i);
           
           
            $manager->persist($ingredient);
    }
    $manager->flush();
}
}
