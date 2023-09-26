<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use Doctrine\Persistence\ManagerRegistry;

use App\Entity\Livre;

class MiniPanierController extends AbstractController
{
    
 
    
    #[Route("/mini/panier/liste/produits")]
    // action qui affiche tous le produits du magasin
    // Chaque produit sera cliquable et on verra son détail
    public function listeProduits(ManagerRegistry $doctrine)
    {
        
        $em = $doctrine->getManager()->getRepository(Livre::class);
        $livres = $em->findAll();
        return $this->render('mini_panier/liste_produits.html.twig',
                ['produits'=>$livres]);
    }
    
    #[Route("/mini/panier/detail/produit/{idProduit}")]
    // action qui affiche le détail d'un produit. On verra un formulaire
    // qui nous permettra de choisir la quantité et un bouton pour
    // rajouter au panier
    
    public function detailProduit (ManagerRegistry $doctrine,Request $req){
        // le produit dont on va afficher le détail
        $idLivre = $req->get ('idProduit');
        // on obtient le produit et on l'envoie à la vue
        $em = $doctrine->getManager()->getRepository(Livre::class);
        $livre = $em->find($idLivre);
        return $this->render('mini_panier/detail_produit.html.twig',
                ['produit'=>$livre]);
               
        
    }
    
    
    #[Route("/mini/panier/rajouter/produit")]
    // action qui rajoute un produit au panier
    public function rajouterProduit (Request $req, SessionInterface $session){
        
        dump ($session->get('panier'));
        // vérifier que le panier existe
        if (!$session->get('panier')){
            $session->set ('panier',[]);
        }
            
        dump ($req->request->get ("id"));
        dump ($req->request->get ("quantite"));
        
        
        die();
        
    }
    
    
    #[Route("/mini/panier/vider/panier")]
    public function viderPanier (SessionInterface $session){
        // à faire
        
    }
    
    
    
    
}
