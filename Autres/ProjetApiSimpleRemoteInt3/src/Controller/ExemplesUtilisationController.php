<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ExemplesUtilisationController extends AbstractController
{
    #[Route('/exemples/utilisation/afficher/tous', name: 'afficher_tous')]
    public function afficherTous(HttpClientInterface $client): Response
    {
        // $response = $client->request(
        //     'GET',
        //     'http://localhost:8000/api/aeroports'
        // );
        // dd ($response->getContent());
        

        return $this->render('exemples_utilisation/afficher_tous.html.twig');
    }

    
}
