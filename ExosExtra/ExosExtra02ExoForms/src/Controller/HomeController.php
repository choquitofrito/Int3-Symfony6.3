<?php

namespace App\Controller;

use App\Entity\Carte;
use App\Form\CarteType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    // route pour afficher la page d'accueil avec les deux liens
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    // route pour afficher toutes les cartes
    #[Route('/afficher/cartes', name: 'afficher_cartes')]
    public function afficherCartes(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Carte::class);
        $arrayCartes = $rep->findAll();
        $vars = ['arrayCartes' => $arrayCartes];
        return $this->render('home/afficher_cartes.html.twig', $vars);
    }

    #[Route('/rajouter/carte', name: 'rajouter_carte')]
    public function rajouterCarte(Request $req, ManagerRegistry $doctrine)
    {
        $carte = new Carte();

        $formCarte = $this->createForm(CarteType::class, $carte); // cette fois on s'epargne l'action et la méthode, car un submit fera appel à la même action

        $formCarte->handleRequest($req);

        if ($formCarte->isSubmitted() && $formCarte->isValid()) {
            // traiter le formulaire

            // stocker le fichier sur le disque du serveur
            $fichier = $carte->getLien();
            $nomFichier = md5(uniqid()) . "." . $fichier->guessExtension();
            $fichier->move("uploadsImages/cartes", $nomFichier);

            // stocker le nom de l'image dans la BD
            $carte->setLien($nomFichier);
            $em = $doctrine->getManager();
            $em->persist($carte);
            $em->flush();

            $vars = ['carteUploaded' => $carte];

            // aller vers une autre vue
            return $this->render('home/afficher_carte_uploaded.html.twig', $vars);
        } else {
            $vars = ['formCarte' => $formCarte->createView()];
            return $this->render('home/afficher_form_upload.html.twig', $vars);
        }
    }
}
