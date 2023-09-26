<?php

namespace App\Controller;

use App\Entity\Fleur;
use App\Form\FleurType;
use App\Repository\FleurRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FleurController extends AbstractController
{
    #[Route('/fleur', name: 'app_fleur')]
    public function index(FleurRepository $repo): Response
    {
        $fleurs = $repo->findAll();
        $vars = ['fleurs' => $fleurs];
        
        return $this->render('fleur/index.html.twig', $vars);
    }

    #[Route('/formulaire/creation/fleur')]
    public function CreationFleur(Request $req, ManagerRegistry $doctrine): Response 
    {
        $fleur = new Fleur();
        $formFleur = $this->createForm(FleurType::class,$fleur);
        $formFleur->handleRequest($req);

        if($formFleur->isSubmitted()){

            $em = $doctrine->getManager();
            //On associe le user à la fleur qu'on crée
            $fleur->setUser($this->getUser());
   
            $em->persist($fleur);
            $em->flush();
            
            return $this->redirectToRoute("app_fleur");
        }

        else
        {
            $vars = ['formFleur' => $formFleur->createView()];
            return $this->render('fleur/creation_fleur.html.twig', $vars);
        }

    }
}