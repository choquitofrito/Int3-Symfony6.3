<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ExemplesReponsesController extends AbstractController
{
    #[Route("/exemples/reponses/exemple/redirect/{titreFilm}")]
    public function exempleRedirect(Request $req)
    {
        $titreFilm = $req->get("titreFilm");
        $url = "http://www.imdb.com/find?ref_=nv_sr_fn&q=" . $titreFilm;
        // maintenant on appelle une autre action
        return $this->redirect($url);
    }

    // Cette action est juste un exemple qui montre comment une action peut
    // rediriger vers une autre en utilisant la propriété "name"
    #[Route("/exemples/reponses/redirection/avec/name")]
    public function redirectionAvecName(Request $req)
    {
        // faire quoi qui ce soit ici....
        // et rediriger après vers une autre route en lui envoyant de paramètres
        return $this->redirectToRoute("spaghettiCarbonara");
    }

    #[Route("/exemples/reponses/action/avec/name", name: "spaghettiCarbonara")]
    public function actionAvecName(Request $req)
    {
        return new Response("Je suis une action qui a été appelée par une autre, je porte un nom");
    }


    // Cette action redirige vers une autre en utilisant la propriété "name" de la 
    // deuxième et en lui envoyant de paramètres sous la forme d`array 
    #[Route("/exemples/reponses/redirection/avec/name/params")]
    public function redirectionAvecNameParams(Request $req)
    {
        // faire quoi qui ce soit ici....
        // et rediriger après vers une autre route
        return $this->redirectToRoute(
            "spaghettiBolognese",
            [
                'type' => 'bio',
                'prix' => '10'
            ]
        );
    }

    #[Route("/exemples/reponses/action/avec/name/params/{type}/{prix}", name: "spaghettiBolognese")]
    public function actionAvecNameParams(Request $req)
    {
        $type = $req->get("type");
        $prix = $req->get("prix");
        return new Response("Je suis une action qui a été appelée par
        une "
            . "autre, je porte un nom et je reçoit des valeurs: " . $type . "
        " . $prix);
    }

    // utilisation de forward pour appeler une action du controller ContactsController

    #[Route("/exemples/reponses/forward/exemple")]
    public function forwardExemple()
    {
        return $this->forward(
            'App\Controller\ContactsController::afficherTous'
            // Le forward peut avoir aussi des paramètres 
            // , ['param1' => $val1,
            // 'param2' => $val2 , etc... ] );
        );
    }
}
