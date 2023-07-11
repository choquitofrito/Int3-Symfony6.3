<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitController extends AbstractController
{
    // si on met l'id dans la route et on injecte
    // un objet Produit, Symfony (ParamConverter)
    // cherchera lui-même dans la BD en faisant un find
    #[Route('/produit/{id}', name: 'produit_detail')]
    public function produitDetail (Produit $produit): Response
    {
     
        $vars = ['produit' => $produit];
        return $this->render('produit/produit_detail.html.twig', $vars);
    }
}
