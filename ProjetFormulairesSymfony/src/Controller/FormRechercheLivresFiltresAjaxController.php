<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\SearchFiltreLivresType;
use App\Form\RechercheiltreLivresType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormRechercheLivresFiltresAjaxController extends AbstractController
{
    #[Route('/form/search/livres/filtres/ajax', name: 'recherche_livres_filtres')]
    public function rechercheLivresFiltres(Request $req, ManagerRegistry $doctrine): Response
    {

        
        $form = $this->createForm(RechercheiltreLivresType::class);
        
        $form->handleRequest($req);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $rep = $doctrine->getRepository(Livre::class);
            $resultats = $rep->rechercheLivresFiltres($form->getData());
            // dd();
            
            // on renvoie le résultat JSON
            return new JsonResponse($resultats);

        }

        $vars = ['form' => $form];
        return $this->render('form_recherche_livres_filtres_ajax/recherche_livres_filtres.html.twig', $vars);
    }
}
