<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Genre;

class GenreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 10; $i++) {
            $genre = new Genre();
            // si on a un hydrate, pas besoin de sets...
            $genre->setNom("genre " . $i);
            $genre->setDescription ("bla bla bla " . $i);
            $manager->persist($genre);
        }

        $manager->flush();
    }
}
