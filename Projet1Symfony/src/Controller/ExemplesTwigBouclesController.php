<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;




class ExemplesTwigBouclesController extends AbstractController
{

    #[Route("/exemples/twig/boucles/exemple1")]
    public function exemple1()
    {
        $vars = [
            'ville' => [
                'nom' => 'Bruxelles',
                'population' => 1500000,
                'pays' => 'Belgique'
            ]
        ];
        return $this->render('exemples_twig_boucles/exemple_1.html.twig', $vars);
    }

    #[Route("/exemples/twig/boucles/exemple2")]
    public function exemple2()
    {
        // les objets ne sont pas itérables mais les arrays oui,
        // on peut faire une conversion en utilisant le mot (array)
        $l1 = new Film("Blade Runner", "Ridley Scott");
        // attention: on force la conversion d'objet en array.
        // cette conversion crée un array associatif dont les clés 
        // sont les propriétés de l'objet et les valeurs sont 
        // les valeurs de ces propriétés
        $vars = ['film' => (array)$l1];
        return $this->render('exemples_twig_boucles/exemple_2.html.twig', $vars);
    }


    // Exercices
    #[Route("/exemples/twig/boucles/exercice1")]
    public function exercice1()
    {
        $films = [
            new Film("Blade Runner", "Ridley Scott"),
            new Film("Alien", "Ridley Scott")
        ];

        $vars = [];
        // casting
        foreach ($films as $film){
            $vars['films'][] = (array)$film;
        }
        return $this->render('exemples_twig_boucles/exercice_1.html.twig', $vars);
    }
}

// une classe ne devra jamais être ici, c'est juste pour l'exemple!!
class Film
{
    public $titre;
    public $auteur;

    function __construct($titre, $auteur)
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
    }
}
