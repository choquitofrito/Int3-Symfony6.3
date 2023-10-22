<?php
namespace App\Controller;

use App\Service\ImportCSVService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ImportExempleController extends AbstractController{


    #[Route('/import/csv')]
    public function importCSV (ImportCSVService $is) {
        // obtenir le dossier du projet
        $dossierProjet = $this->getParameter ('kernel.project_dir'); 
        $is->importCSV ('History_Quiz_db_TEST.csv');
        return new Response ("fichier importé");
        
    }
}