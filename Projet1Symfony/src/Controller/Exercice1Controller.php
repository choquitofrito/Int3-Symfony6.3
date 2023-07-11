<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class Exercice1Controller extends AbstractController
{
    #[Route("/exercice1/afficher/contact/{prenom}/{profession}")]
    public function afficherContact(Request $objetRequest)
    {
        // on obtient les valeurs des paramètres de l'url grâce à la méthode "get" de l'objet Request
        $lePrenom = $objetRequest->get("prenom");
        $laProfession = $objetRequest->get("profession");
        return new Response("<br>Je suis " . $lePrenom . ", " . $laProfession);
    }

    #[Route("/exercice1/routing/bienvenue/age/{age}",requirements:['age'=>'\d+'])]
    public function bienvenueAge (Request $objRequest){
        return new Response ("Bienvenue au site, vous avez ".$objRequest->get ("age")." ans");
        
    }

}
