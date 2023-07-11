<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Services\Bonjour;

// src/Controller/ExemplesServicesParamsController.php
class ExemplesServicesParamsController extends AbstractController
{
    private $bonjour;

    // on utilise la méthode d'injection du service dans le controller
    public function __construct(Bonjour $bonjour) 
    {
        $this->bonjour = $bonjour;
    }

    #[Route("/exemples/propre/service/params")]
    public function utiliseBonjour(): Response
    {
        return new Response($this->bonjour->obtenirMessage());
    }
}
