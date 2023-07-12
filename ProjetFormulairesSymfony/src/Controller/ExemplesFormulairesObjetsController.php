<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Livre;


use App\Form\LivreGenreType;
// les classes des Formulaires
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ExemplesFormulairesObjetsController extends AbstractController
{
    #[Route ("/exemples/formulaires/objets/traitement/livre/genre", name:"exemple_livre_genre")]
    
    // dans la même action on réalise le rendu et la réception 
    public function exempleLivre (Request $req){
        // 1. Création d'une entité vide
        $livre = new Livre();
        // 2. Création du formulaire du type souhaité
        $formulaireLivre = $this->createForm (LivreGenreType::class, $livre,
                ['action'=> $this->generateUrl ("exemple_livre_genre"),
                    'method'=>'POST']);
 
        // 3. Analyse de l'objet Request
        $formulaireLivre->handleRequest($req);
        
        // 4. Vérification: on vient d'un submit ou pas?
        
        // si oui, on traite le formulaire et on remplit l'entité
        if ($formulaireLivre->isSubmitted() && $formulaireLivre->isValid()){
            // Remplissage de l'entité avec les données du formulaire
            
            // $livre = $formulaireLivre->getData();  // pas besoin, le submit remplit l'entite déjà
            
            // Rendu d'une vue où on affiche les données
            // Normalement on fera CRUD ici ou une autre opération...
            return $this->render ('/exemples_formulaires_objets/traitement_formulaire_livre.html.twig',
                                ['livre'=> $livre]);
        }
        // si non, on doit juste faire le rendu du formulaire
        else {
            return $this->render ('/exemples_formulaires_objets/affichage_formulaire_livre.html.twig',
                                ['formulaireLivre'=> $formulaireLivre->createView()]);
        }
    }
}
