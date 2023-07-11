<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\FilmFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class GenreFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5; $i++) {
            $genre = new Genre([
                'nom' => 'Genre ' . $i,
                'description' => 'Description ' . $i

            ]);
            $manager->persist($genre);
        }

        $manager->flush();
    }


}
