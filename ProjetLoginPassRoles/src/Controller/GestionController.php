<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GestionController extends AbstractController
{
    // ces routes seront accessibles uniquement pour certains roles
    // quand on le fixera ainsi dans /config/packages/security.yaml. 
    #[Route("/gestion/action1")]
    public function action1()
    {
        return $this->render('gestion/action1.html.twig');
    }

    // exemple de contrôle d'accès en utilisant IsGranted (ici on a utilisé un attribut PHP, pas une annotation. Le résultat est le même)
    #[IsGranted('ROLE_ADMIN')]
    #[Route("/gestion/action2")]
    public function action2()
    {
        return $this->render('gestion/action2.html.twig');
    }

    #[Route("/gestion/action3")]
    public function action3()
    {
        // cette fois on va controller l'accès dans la vue
        return $this->render('gestion/action3.html.twig');
    }
}
