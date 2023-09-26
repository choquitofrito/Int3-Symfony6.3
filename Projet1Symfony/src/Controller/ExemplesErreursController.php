<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ExemplesErreursController extends AbstractController
{
    
    
    #[Route("/exemple/action/provoque/erreur")]
    public function exempleActionProvoqueErreur()
    {
        // De-commentez la ligne suivante pour provoquer l'erreur:
        $req->get("param");
    }
        
    
    #[Route("/erreurs/erreur/pas/trouve")]
    // réponse HTTP modifiée : dans cet exemple, on renvoie au navigateur une réponse "404: NOT FOUND"
    // si la variable de session "login" n'existe pas. 
    // De-commentez la ligne du "set"
    // pour établir sa valeur une première fois,
    // puis commentez la ligne, fermez le navigateur et  
    // et relancez la page
    public function erreurPasTrouveAction(Request $req)
    {
        $session = $req->getSession();
        
        // $session->set("login", "Marie");
        $reponse = new Response();
        
        if ($session->get("login") == null) {
            $reponse->setStatusCode(Response::HTTP_NOT_FOUND);
            $reponse->setContent("Page non trouvée!");
            // autre exemple:
            // $reponse->setStatusCode(Response::HTTP_BAD_GATEWAY);
        } else {
            $reponse->setContent("Bienvenu " . $session->get("login"));
        }
        
        return ($reponse);
    }

    
    #[Route("/erreurs/erreur/pas/trouve/avec/exception")]
    public function errorPasTrouveAvecExceptionAction(Request $req)
    {
        $session = $req->getSession();
        // on lance cette ligne une seule fois, puis commentez-la et relancez le navigateur et l'action");
        // $session->set ("login","Lola");
        $reponse = new Response();
        if ($session->get("login")==null) {
            throw $this->createNotFoundException("Non trouvée");
        } 
        else {
            $reponse->setContent("Hello " . $session->get("login"));
        }
        return ($reponse);
    }
    
    
}
