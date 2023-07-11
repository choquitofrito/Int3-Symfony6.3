<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Data\SearchData;
use App\Form\SearchType;
use App\Repository\FilmRepository;

use App\Repository\GenreRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class NavigationPaginationController extends AbstractController
{


    // lancez cette route pour commencer. Elle contient une nav
    #[Route('/navigation/pagination', name: 'navigation_pagination')]
    public function index(): Response
    {
        // les liens sont dans base.html.twig, ici il y a juste un contenu de base
        // (à vous de le personnaliser)
        return $this->render('navigation_pagination/index.html.twig');
    }

    // Cette route affiche et traite le form
    #[Route('/contenu/base', name: 'contenu_base')] // on peut injecter un repo si on le veut
    public function contenuBase(FilmRepository $rep, GenreRepository $repGenre, Request $req): Response
    {
        $data = new SearchData(); // c'est une classe qui représente le form, pas une entité
        // on aurait pu utiliser un form indépendant aussi au lieu d'une classe
        $form = $this->createForm(
            SearchType::class,
            $data
        );

        $data->numeroPage = $req->get('page', 1); // c'est le paginator qui rajoute page=X dans l'URL. Notre proprieté dans SearchData peut s'appeler comment on veut...
        // on met la valeur 1 au cas où on ne reçoit pas de page dans $req (la première fois qu'on charge on sera dans ce cas)


        
        // traiter le form.
        // premiere fois qu'on charge cette action, $data ser vide (sauf pour la page
        // qu'on vient d'incruster)
        // Quand on fera submit, $data contiendra les données remplies
        // dans le form de recherche (voir avec dd)
        $form->handleRequest($req);



        // Si on veut faire une requête particulière (filtres spécifiques ou juste une bête requête) 
        // pour la prémière fois qu'on charge la page
        // on a qu'à regarder si on vient d'un submit ou pas

        $filmsFiltres = [];
        if ($form->isSubmitted()) {
            // on vient d'un submit! on va chercher avec les filtres
            $filmsFiltres = $rep->obtenirResultatsFiltres($data);
        } else {
            // on ne vient pas d'un submit, on n'a pas fait de recherche
            // on lance ici la requête du repo qui nous intéresse. Deux cas de figure:

            // a) requête qui n'a rien à voir
            // $filmsFiltres = $rep->autreRequete($parametre1, $parametre2);// à nous de voir ce qu'on veut envoyer!
            // si on veut la pagination il faut l'implementer
            // pareille que dans obtenirResultatsFiltres

            // b) requête avec de filtres, mais qui ne sont pas reçus dans le form (car on n'a jamais fait submit)

            //ex : tous les films du genre 2 (nom "Genre 2"). On ne peut pas just mettre "2", il faut trouver l'entité
            // $data->genre = $repGenre->findOneBy(['nom'=>'Genre 3']);
            // d'autres exemples de filtre custom
            // $data->minDuree = 180;
            // $data->query = "ab";

            $filmsFiltres = $rep->obtenirResultatsFiltres($data);
        }

        // voici l'avantage de la classe: on peut envoyer 
        // à la méthode du Repo 
        // un objet au lieu d'un tas de strings (titre, duree etc...)

        // Le repo fera la pagination à l'interieur (voir code). On aura pu juste recevoir un array
        // d'objets et paginer ici (ex. des notes). Question de choix (simplifier ou pas le controller)

        // on reçoit un résultat paginable et parcourable qu'on 
        // envoie à la vue. On renvoie aussi le formulaire pour
        // l'afficher à nouveau
        $vars = [
            'filmsFiltres' => $filmsFiltres,
            'form' => $form->createView()
        ];
        // on va rendre la même vue
        return $this->render('navigation_pagination/contenu_base.html.twig', $vars);
    }
}
