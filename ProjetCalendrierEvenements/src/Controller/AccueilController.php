<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        // si pas d'user, charger le login
        if (!$this->getUser()){
            return $this->redirectToRoute('app_login');

        }
        return $this->render('accueil/index.html.twig');
    }
}
