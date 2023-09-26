<?php

namespace App\DataFixtures;

use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Genre;
use App\DataFixtures\GenreFixtures;
use Faker;



class FilmFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $rep = $manager->getRepository(Genre::class);
        $genres = $rep->findAll();

        $faker = Faker\Factory::create();

        for ($i=0;$i<100;$i++){
            $film = new Film([
                'titre'=>ucfirst($faker->word . " ". $faker->word),
                'duree'=>rand(60,200),
                'annee'=>rand (1900,2050)
            ]);
            $film->setGenre($genres[array_rand($genres)]);
            
            $manager->persist($film);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return ([GenreFixtures::class]);
    }
}
