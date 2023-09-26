<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ExemplesServicesController extends AbstractController
{   
    #[Route ("/exemples/services/utilise/logger")]
    public function utiliseLogger(LoggerInterface $monLogger){
        $monLogger->info ("On utilise le logger, c'est super!");
        $monLogger->error ("Hey! une erreur fake s'est produite!");
        return new Response ("J'ai fait mon boulot de logger!");      
    }   
    
    #[Route ("/exemples/services/utilise/session")]
    public function utiliseSession(SessionInterface $maSession){
        // stocker dans la session
        $maSession->set ("panier", ["oranges"=>3,
                                    "pommes"=>2,
                                    "citrons"=>1]);
        // obtenir de la session
        $panier = $maSession->get ("panier");
        
        // si on veut afficher la variable sans charger la vue
        // dump ($panier);
        // die();      
        // rendre la vue et lui envoyer la valeur obtenue de la session
        return $this->render ("exemples_services/utilise_session.html.twig", ['panier' => $panier]);
        
        // plus d'info sur les sessions ici
        // comme service : https://symfony.com/doc/current/controller.html#session-intro
        // comme objet: https://symfony.com/doc/current/components/http_foundation/sessions.html
    }
    
}
