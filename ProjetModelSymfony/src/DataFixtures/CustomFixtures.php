<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Finder\Finder;


// Cette fixture lancera tous les fichiers sql qui se trouvent dans DataFixtures/sql
// Utile si vous voulez lancez du SQL fixe en dehors des fixtures standards

// Pour créer les fichiers, faites export (enlevez création de tables etc... ce qui compte ce sont les inserts)
class CustomFixtures extends Fixture implements ContainerAwareInterface
{

    private $container;

    public function load(ObjectManager $om)
    {
        $finder = new Finder();

        // chercher le fichier qui contient le SQL, à nous de choisir son emplacement
        $finder->files()->in('src/DataFixtures/sql'); // si on veut charger plusieurs fichier sql
        
        $content = "" ;
        $cnx = $this->container->get("doctrine")->getConnection();
        $cnx->beginTransaction();
        
        foreach ($finder as $file){
            // lire le contenu SQL du fichier. Observez vous-même le contenu
            $content = $file->getContents();
            $cnx->setAutoCommit(false);
            $cnx->exec ($content);
  
        }
    
    }

    public function setContainer(?ContainerInterface $container = null)
    {
        $this->container = $container;
    }

}





