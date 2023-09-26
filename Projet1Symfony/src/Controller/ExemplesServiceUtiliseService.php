<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Services\StatistiquesLog;


// src/Controller/ExemplesServiceUtiliseService.php
class ExemplesServiceUtiliseService extends AbstractController
{
    private $mesStats;
    // Le service StatistiquesLog utilise Logger
    public function __construct(StatistiquesLog $mesStats)
    {
        $this->mesStats = $mesStats;
    }

    #[Route("/exemples/propre/service/utilise/service")]
    public function utiliseStatistiques()
    {
        $arrayNoms = ['Lucas', 'Jean', 'Norah'];
        // calculera les permutations et créera une ligne de log
        $permutationsNoms = $this->mesStats->permutations($arrayNoms);

        return $this->render('exemples_service_utilise_service/utilise_statistiques.html.twig', ['permutationsNoms' => $permutationsNoms]);
    }
}
