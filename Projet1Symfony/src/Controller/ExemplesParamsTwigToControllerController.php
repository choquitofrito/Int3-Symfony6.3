<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExemplesParamsTwigToControllerController extends AbstractController
{
     // cette action affiche une vue qui envoie un paramètre à l'action2
    #[Route ("exemples/params/twig/to/controller/action1")]
    public function action1 (){
        return $this->render ('exemples_params_twig_to_controller/action1.html.twig');
    }

    // ne faites pas appel à cette action directement.
    // Cette action est appellée par la vue d'action1 et reçoit les paramètres
    #[Route ("exemples/params/twig/to/controller/action2", name:"action2_recoit_params")]
    public function action2 (Request $req){
        
        // on reçoit les paramètres ici. On va juste faire un dump
        // mais faites ce que vous voulez
        dump ($req->get('nom'));
        dd ($req->get('ville'));
        return $this->render ('exemples_params_twig_to_controller/action2.html.twig');
    }
}
