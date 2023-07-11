<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GestionController extends AbstractController
{
    // ces routes seront accessibles uniquement pour certains roles
    // quand on le fixera ainsi dans /config/packages/security.yaml. 
    #[Route("/gestion/action1")]
    public function action1()
    {
        return $this->render('gestion/action1.html.twig');
    }
    #[Route("/gestion/action2")]
    public function action2()
    {
        return $this->render('gestion/action2.html.twig');
    }
}