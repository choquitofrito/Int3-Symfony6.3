<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{
    #[Route('/home/affiche/bienvenue', name: 'affiche_bienvenue')]
    public function afficheBienvenue(): Response
    {
        return $this->render('home/afficher_bienvenue.html.twig');
    }


    #[Route('/home/affiche/bienvenue/nom/{nom}', name: 'affiche_bienvenue_nom')]
    public function afficheBienvenueNom(Request $req): Response
    {
        $nom = $req->get("nom");
        $vars = ['nom' => $nom];
        return $this->render('home/afficher_bienvenue_nom.html.twig', $vars);
    }

    #[Route('/home/affiche/bienvenue/nom/genre/{nom}', name: 'affiche_bienvenue_nom_genre')]
    public function afficheBienvenueNomGenre(Request $req, HttpClientInterface $client): Response
    {
        $nom = $req->get("nom");

        // appel API
        $response = $client->request("GET", "https://api.genderize.io/?name=" . $nom);
        $contenu = $response->getContent(); // cette API renvoie du JSON
        // dump ($contenu);
        $array = json_decode($contenu, true);
        // dd ($array);

        $vars = ['arrayNom' => $array];
        return $this->render('home/afficher_bienvenue_nom_genre.html.twig', $vars);
    }

    // vue principale qui utilise la vue partielle
    #[Route('home/utilisation/vue/partielle')]
    public function exempleUtilisationVuePartielle(): Response
    {
        return $this->render('home/utilisation_vue_partielle.html.twig');
    }
    // action dont la vue sera incrustée dans home/utilisation/vue/partielle
    // PAS besoin DE ROUTE ICI!! mais on peut la mettre
    // si on veut accéder à cette action directement
    // #[Route('home/vue/partielle')]
    public function afficherDate()
    {
        $laDate = (new \DateTime())->format("d/m/y"); // donne un string
        $vars = ['laDate' => $laDate];
        // dd();
        return $this->render('home/afficher_date.html.twig',$vars);
    }
}
