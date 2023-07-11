<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\DetailCommande;
use App\Entity\Produit;
use App\Repository\CommandeRepository;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    #[Route('/commande/passer', name: 'commande_passer')]
    public function commandePasser(
        SessionInterface $session,
        ManagerRegistry $doctrine
    ): Response {

        // obtenir le panier de la session
        $commandePanier = $session->get("panierCommande");

        $em = $doctrine->getManager();
        // créer une commande, la persister et puis affecter cette commande
        // avec la commande de la session (rajouter les détails - et eventuellement un client)
        $commandeBD = new Commande();
        $em->persist($commandeBD);
        
        // on initisalise tout ce qu'on a de la commande avant de faire le persist
        // (client - $this->getUser(), dateCreation, etc...)
        // et puis on copie les détails du panier 
        $commandeBD->setDateCreation(new DateTime());

        // parcourir le panier
        foreach ($commandePanier->getDetails() as $detail) {
            
            // Dans notre cas il y a cascade persist dans les rélations OneToMany

            // Créer un détail vide
            $detailBD = new DetailCommande();
            
            // obtenir le produit de la BD à nouveau, sans aucun lien avec les autres entités du panier
            $produit = $doctrine->getRepository(Produit::class)->find($detail->getProduit()->getId());
            
            // Rajouter du côté 1, un détail à la liste de produits. Si on fait un set de l'autre côté, on fait le liens dans un seul sens dans le domaine d'objets
            $produit->addDetail ($detailBD);

            // Affecter la commande du détail
            $commandeBD->addDetail($detailBD);


            // Affecter la quantité
            $detailBD->setQuantite($detail->getQuantite());

            // Persister le détail (la commande est déjà persistée - dans cette même méthode . Le produit aussi, on vient de l'obtenir de la BD)
            $em->persist($detailBD);
            
            
        }
        $em->flush(); // mettre à jour une fois les détails sont là

        $vars = ['commandeBD' => $commandeBD];
        return $this->render('commande/commande_passer.html.twig', $vars);
    }
}
