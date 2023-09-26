<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Services\Statistiques;
use App\Services\BonjourSimple;


// src/Controller/ExemplesPropreServiceController
class ExemplesPropreServiceController extends AbstractController
{
    #[Route("/exemples/propre/service/utilise/statistiques")]
    public function utiliseStatistiques(Statistiques $mesStats)
    {
        $arrayNoms = ['Lucas', 'Jean', 'Norah'];
        $permutationsNoms = $mesStats->permutations($arrayNoms);
        return $this->render('exemples_propre_service/utilise_statistiques.html.twig', ['permutationsNoms' => $permutationsNoms]);
    }
    
    // Exercice Service propre : BonjourSimple
    #[Route("/exemples/propre/service/utilise/bonjour/simple")]
    public function utiliseBonjourSimple (BonjourSimple $b){
        $vars = ['message' => $b->obtenirMessage()];
        return $this->render('exemples_propre_service/utilise_bonjour_simple.html.twig',$vars);
    }

}
