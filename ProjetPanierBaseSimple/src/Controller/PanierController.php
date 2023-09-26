<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Commande;
use App\Entity\DetailCommande;
use App\Repository\ProduitRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PanierController extends AbstractController
{
    #[Route('/panier/afficher', name: 'panier_afficher')]
    public function index(SessionInterface $session, ProduitRepository $repProduit): Response
    {
        $panierCommande = $session->get('panierCommande', new Commande());

        $vars = ['panierCommande' => $panierCommande];
        return $this->render('panier/panier_afficher.html.twig', $vars);
    }


    // version panier avec des entités.
    // type 1: rajouter une seule unité
    // on crée une commande, mais elle est vide au départ
    // Quand on passera la commande on fera le persist
    // #[Route('/panier/add/{id}', name: 'panier_add_produit')]
    // public function addProduitEntities(
    //     Request $req,
    //     SessionInterface $session,
    //     ProduitRepository $repProduit
    // ): Response {
    //     $id = $req->get('id'); // id du produit à rajouter


    //     $panierCommande = $session->get('panierCommande', new Commande()); // si la variable 'panier' n'existe pas, on initialise l'array



    //     $detail = new DetailCommande();
    //     $detail->setProduit($repProduit->find($id));
    //     $detail->setQuantite(1); // ou plus (reçu en paramètre tel que l'id), si vous mettez un champ pour choisir la quantité dans l'interface

    //     $panierCommande->addDetail($detail);  // regardez le code de addDetail       

    //     $session->set('panierCommande', $panierCommande);
    //     return $this->redirectToRoute('panier_afficher');
    // }


    // version panier avec des entités.
    // type 2: rajouter plusieurs unités d'un produit à la fois
    // On reçoit un form
    // on crée une entité Commande dans la session qui sera vide au départ
    // Quand on passera la commande on fera le persist
    #[Route('/panier/add', name: 'panier_add_produit_plusieurs')]
    public function addProduitPlusieurs(
        Request $req,
        SessionInterface $session,
        ProduitRepository $repProduit
    ): Response {
        $id = $req->request->get('id'); // id du produit à rajouter pris du POST (name dans le form)
        $quantite = $req->request->get('quantite'); // quantité, pris du POST (name dans le form)

        $panierCommande = $session->get('panierCommande', new Commande()); // si la variable 'panier' n'existe pas, on initialise l'array

        $detail = new DetailCommande();
        
        // new
        // rajouter le detail au produit
        $produit = $repProduit->find($id);
        

        $produit->addDetail($detail);

        $detail->setQuantite($quantite); // on fixe ici la quantité, mais quand on fait addDetail l'addition sera faite (regardez le code de addDetail dans l'entity Commande)

        // rajouter le detail à la commande dans la session        
        $panierCommande->addDetail($detail);  // regardez le code de addDetail       

        $session->set('panierCommande', $panierCommande);
        return $this->redirectToRoute('panier_afficher');
    }

    // efface un détail de la session
    // On cherche par l'id du produit du détail
    // On ne peut pas chercher par id de détail car
    // La commande n'est pas encore dans la BD
    // et les détails non plus (ils n'ont pas d'id)
    #[Route('/panier/effacer/detail/{id}', name: 'panier_effacer_detail')]
    public function panierEffacerDetail(
        Request $req,
        SessionInterface $session,
    ) {

        // dump ($session->get("panierCommande"));
        // dump ($detail);

        // on efface de la session et de la BD
        $panierCommande = $session->get("panierCommande");

        // Effacer de la SESSION
        // On cherche le détail qui contient le produit dans
        // la commande de la session
        
        // Commande avant
        // dump($panierCommande->getDetails());

        // on parcour tous les détails et on cherche 
        // celui qui contient le produit recherché
        $detailsCommandeSession = $panierCommande->getDetails();
        foreach ($panierCommande->getDetails() as $key => $detailSession){
            if ($req->get('id') == $detailSession->getProduit()->getId()){
                $detailsCommandeSession->removeElement($detailSession);
                // plus besoin de chercher, on redirige
                return $this->redirectToRoute('panier_afficher');

            }
        }
        // Commande après
        // dd($panierCommande->getDetails());

        // on affiche à nouveau le panier de toute façon
        return $this->redirectToRoute('panier_afficher');
    }
}
