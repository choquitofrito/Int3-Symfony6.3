<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Exemplaire;
use App\Entity\Livre;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\LivreFixtures;

class ExemplaireFixtures extends Fixture implements DependentFixtureInterface
{
    
    public function load(ObjectManager $manager) 
    {
        $rep = $manager->getRepository(Livre::class);
        $livres = $rep->findAll();

        for ($i = 0; $i < 10; $i++) {
            $exemplaire = new Exemplaire();
            // si on a un hydrate, pas besoin de sets...
            $etats = ['nouveau', 'perdu','abîmé'];
            $exemplaire->setEtat ($etats[array_rand($etats)]);

            $exemplaire->setLivre($livres[array_rand($livres)]);

            $manager->persist($exemplaire);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            LivreFixtures::class
        ];
    }    

}
