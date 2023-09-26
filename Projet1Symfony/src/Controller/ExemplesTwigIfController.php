<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ExemplesTwigIfController extends AbstractController
{

    #[Route("/exemples/twig/if/exercice1/{prix}", name: "exercice1")]
    public function exercice1(Request $req)
    {
        return $this->render('exemples_twig_if/exercice_1.html.twig', ['prix' => $req->get('prix') * 2]);
    }
}
