<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Data\SearchData;
use App\Form\SearchType;
use Symfony\Component\HttpFoundation\Request;



// En cours
class NavigationPaginationAjaxController extends AbstractController
{


    // lancez cette route pour commencer. Elle contient une nav
    #[Route('/navigation/pagination/ajax', name: 'navigation_pagination_ajax')]
    public function index(): Response
    {

        return $this->render('navigation_pagination_ajax/index.html.twig');
    }

    // on crée le form et un contenu de base à afficher. Cette action ne traite pas le form
    #[Route('/contenu/base/generique', name: 'contenu_base_generique')] // on peut injecter un repo si on le veut
    public function contenuBaseAjax(FilmRepository $rep, Request $req): Response
    {

        $data = new SearchData(); // c'est une classe qui représente le form, pas une entité
        // on aurait pu utiliser un form indépendant aussi au lieu d'une classe
        $form = $this->createForm(
            SearchType::class,
            $data,
            ['method' => 'POST'] // traiter le form comme un post, ajax envoie un post
        );

        
        // nous allons montrer le formulaire et quelque données d'exemple en plus. Ici on fait un findall de tous les films
        $data->numeroPage = $req->get ('page',1); // obtenir la page du paginator (cas générique, pas ajax)
                                                        // si vide, 1

        // Requête pour afficher le résultat inital
        // Quand on fait submit du form on ne charge pas cette action!
        // Pas de sens d'écrire if ($form->isSubmitted()) {....}

        $filmsFiltres = $rep->obtenirResultatsFiltres($data); // sans envoyer de filtres (objet vide) on obtient les 5 prémieres films de la BD.
        // Il faut juste faire une méthode qui renvoie déjà la pagination (tel que obtenirResultatsFiltres)

        // on peut customiser notre repo pour obtenir qui qui ce soit avec autant de méthodes qu'on veut
        
        // Si on n'envoie pas de films ici, le div sera vide initiellement.
        $vars = [
            'form' => $form->createView(),
            'filmsFiltres' => $filmsFiltres
        ];
        return $this->render('navigation_pagination_ajax/contenu_base.html.twig', $vars);
    }


    // action qui traite le form
    #[Route('/contenu/base/ajax/traitement', name: 'contenu_base_ajax_traitement')] // on peut injecter un repo si on le veut
    public function contenuBaseAjaxTraitement(FilmRepository $rep, Request $req): Response
    {
        $data = new SearchData(); // c'est une classe qui représente le form, pas une entité
        // on aurait pu utiliser un form indépendant aussi au lieu d'une classe
        $form = $this->createForm(
            SearchType::class,
            $data,
            ['method' => 'POST'] // traiter le form comme un post, ajax envoie un post. Indispensable pour handleRequest
        );

        $data->numeroPage = $req->get('page', 1); // c'est le paginator qui rajoute page=X dans l'URL. Notre proprieté dans SearchData peut s'appeler comment on veut...
        // on met la valeur 1 par défaut

        // traiter le form
        $form->handleRequest($req);

        // voici l'avantage de la classe: on peut envoyer à la méthode du Repo 
        // un objet au lieu d'un tas de string...
        // Le repo fera la pagination à l'interieur (voir code). On aura pu juste recevoir un array
        // d'objets et paginer ici (ex. des notes). Question de choix (simplifier ou pas le controller)

        $filmsFiltres = $rep->obtenirResultatsFiltres($data);

        $vars = [
            'filmsFiltres' => $filmsFiltres,
            'form' => $form->createView()
        ];

        // maintenant il faut renvoyer un contenu, pas rendre une page
        return new Response($this->renderView('navigation_pagination_ajax/contenu_base_ajax_traitement.html.twig', $vars));
    }




}
