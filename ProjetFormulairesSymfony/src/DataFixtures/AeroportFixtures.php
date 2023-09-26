<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker;
use App\Entity\Aeroport;

class AeroportFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create();
    
        for ($i = 0; $i < 5; $i++) {
            
            // sans hydrate
            // $aeroport = new Aeroport();
            // $aeroport->setNom ($faker->city . " Airport");


            // avec hydrate
            $aeroport = new Aeroport([
                'nom' => $faker->city . " Airport",
                'code' => 'COD'. $i,
                'dateMiseEnService' => $faker->dateTime,
                'heureMiseEnService' => $faker->dateTime,
                'description' => $faker->realText($faker->numberBetween(10, 30))
            ]);
            $manager->persist($aeroport);
        }
        $manager->flush();
    }
}
