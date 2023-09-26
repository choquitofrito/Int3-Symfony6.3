<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Services\Statistiques;

// src/Controller/ExemplesPropreServiceInjectionController.php
class ExemplesPropreServiceInjectionController extends AbstractController
{
    private $mesStats;

    // on injecte le service diréctement dans le constructeur du controller
    public function __construct(Statistiques $mesStats)
    {
        $this->mesStats = $mesStats;
    }

    #[Route("/exemples/propre/service/injection/utilise/statistiques")]
    public function utiliseStatistiques()
    {

        $arrayNoms = ['Lisa', 'Jean', 'Norah'];
        $permutationsNoms = $this->mesStats->permutations($arrayNoms);
        return $this->render('exemples_propre_service_injection/utilise_statistiques.html.twig', ['permutationsNoms' => $permutationsNoms]);
    }
}
