<?php

namespace App\DataFixtures;

// service capable de lire un fichier .csv stocké dans 
// créer des entités du modèle et les stocker dans la bd

use DateTime;
use App\Entity\QuizItem;
use Symfony\Component\Finder\Finder;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;


class ImportCSVFixtures extends Fixture
{

        
    private $em;
    private string $dossierImport;

    // on doit injecter le dossier qui contient le fichier à importer
    // (voir services.yaml, ligne "bind")
    // on doit aussi injecter le Manager pour manipuler la BD
    public function __construct ($dossierImport, EntityManagerInterface $em){
        $this->em = $em;
        $this->dossierImport = $dossierImport;
    }

    // méthode qui réalise l'importation, elle reçoit le chemin du fichier complet
    public function load(ObjectManager $manager): void
    {


        // Note optionnelle:  
        // $finder = new Finder(); // composant pour chercher de fichiers dans le projet
        // // attention: lancez 'composer require symfony/finder'
        // $finder->files()->in('/importData'); // si on veut charger plusieurs fichier .csv on peut obtenir une liste (voir syllabus, exemple avec de fichiers .sql)


        // str_getcsv est une fonction incluse dans PHP qui lit une ligne d'un fichier CSV et renvoie un array.
        // array_map il va lancer la fonction pour chaque ligne du fichier
        // La fonction str_getcsv utilise le "," comme separator et le "" comme enclosure. 
        $arrayCsv = array_map("str_getcsv", file($this->dossierImport . DIRECTORY_SEPARATOR . "History_Quiz_db_TEST.csv"));

        // Si on avait d' autres paramètres pour la fonction str_getcsv (fichier .csv avec un autre format, ex: separator ";")
        // on devrait envoyer un paramètre a str_getcsv. Voici un exemple:

        // Note optionnelle:
        // $delimiter = ";"; // Set the delimiter to a ; character
        // $csv = array_map(function ($row) use ($delimiter) {
        //     return str_getcsv($row, $delimiter); // la valeur de retour du callback
        // }, file($path));

        // Maintenant on doit traiter l'array et créer les entités
        // dd($arrayCsv); // debugger ici est intéressant, on voit le contenu du fichier et s'il y a des lignes "inutiles"  (ici il y en aura deux, titre et en-têtes)
        unset ($arrayCsv[0]);
        unset ($arrayCsv[1]);

        // pour chaque autre ligne on crée une entité et on la stocke dans la BD
        foreach ($arrayCsv as $ligneCsv){
            $qi = new QuizItem ();
            // $qi->setProposedBy($ligneCsv[1]);
            $qi->setTitle($ligneCsv[2]);
            $qi->setYear((int)$ligneCsv[3]);
            $qi->setDescription($ligneCsv[4]);
            $qi->setLink($ligneCsv[5]);
            $qi->setImage($ligneCsv[6]);
            // si la Date n'est pas vide on la prends. Autrement on met null 
            // À vous de choisir si vous voulez juste créer l'entrée avec la date actuelle
            $qi->setSubmissionDate(!empty($ligneCsv[7]) ? new DateTime($ligneCsv[7]) : null);

            $this->em->persist ($qi);
            // dd($qi); // pour debugger avant de stocker...
        }
        // flushhhhhhhhhhhhhhhhh :))
        $this->em->flush();
    }
}
