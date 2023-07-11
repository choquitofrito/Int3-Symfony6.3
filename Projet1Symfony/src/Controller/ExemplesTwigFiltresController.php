<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ExemplesTwigFiltresController extends AbstractController
{
    #[Route("/exemples/twig/filtres/exemple1", name: "exemples_twig_filtres1")]
    public function exemple1()
    {

        $ville = [
            'nom' => 'Bruxelles',
            'population' => 1500000,
            'pays' => 'Belgique'
        ];

        return $this->render('exemples_twig_filtres/exemple_1.html.twig', [
            'controller_name' => 'ExemplesTwigFiltresController',
            'ville' => $ville
        ]);
    }

    #[Route("/exemples/twig/filtres/exemple2", name: "exemples_twig_filtres2")]
    public function exemple2()
    {

        $ville = [
            'nom' => 'Bruxelles',
            'population' => 1500000,
            'pays' => 'Belgique'
        ];

        return $this->render('exemples_twig_filtres/exemple_2.html.twig', [
            'controller_name' => 'ExemplesTwigFiltresController',
            'ville' => $ville
        ]);
    }


    #[Route('/exemples/twig/filtres/array')]
    public function filtresArray (){
        $vars = ['monArray'=> ['Madrid', 'Bruxelles', 'Tokyo']];
        return $this->render ('/exemples_twig_filtres/filtres_array.html.twig', $vars);
    }


    // Exercices
    #[Route("/exemples/twig/filtres/exercice1/{nom}")]
    public function exercice1(Request $req)
    {
        $vars = ['nom' => $req->get('nom')];
        return $this->render('exemples_twig_filtres/exercice1.html.twig', $vars);
    }
}
