<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(ProduitRepository $rep): Response
    {
        // on peut injecter le repo au lieu de l'ObjectManager (moins de code!)
        $produits = $rep->findAll();
        $vars = ['produits' => $produits];
        return $this->render('accueil/index.html.twig', $vars);
    }
}
