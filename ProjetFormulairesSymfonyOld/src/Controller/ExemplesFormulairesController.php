<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\LivreType;


// les entités de base
use App\Entity\Aeroport;
use App\Form\AeroportType;
// les classes des Formulaires
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExemplesFormulairesController extends AbstractController
{

    #[Route("/exemples/formulaires/exemple/independent/affichage/form")]
    public function exempleIndependentAffichageForm()
    {
        // cette action affiche une vue contenant un formulaire traditionnel
        return $this->render("/exemples_formulaires/exemple_independent_affichage_form.html.twig");
    }

    #[Route("/exemples/formulaires/exemple/independent/traitement/post", name: "traitement_form_simple_post")]
    public function exempleIndependentTraitementPost(Request $req)
    {
        // cette action traite un formulaire traditionnel POST et affiche le contenu dans une vue
        // On obtient l'objet Request
        // "request" contient le contenu du $_POST

        $nom = $req->request->get('nom'); // pas $req['nom'] ni $req->request['nom']
        $age = $req->request->get('age'); // pas $req['age'] ni $req->request['age']


        return $this->render(
            "/exemples_formulaires/exemple_independent_traitement_post.html.twig",
            [
                'nom' => $nom,
                'age' => $age
            ]
        );
    }


    #[Route("/exemples/formulaires/exemple/independent/traitement/get", name: "traitement_form_simple_get")]
    public function exempleIndependentTraitementGet(Request $req)
    {
        // cette action traite un formulaire traditionnel GET et affiche le contenu dans une vue
        // On obtient l'objet Request
        // "query" contient le contenu du $_GET

        $produit = $req->query->get('produit'); // pas $req['produit'] ni $req->request['produit']
        $prix = $req->query->get('prix'); // pas $req['prix'] ni $req->request['prix']


        return $this->render(
            "/exemples_formulaires/exemple_independent_traitement_get.html.twig",
            [
                'produit' => $produit,
                'prix' => $prix
            ]
        );
    }


    #[Route("/exemples/formulaires/exemple/aeroport")]
    public function exempleAeroport()
    {
        // on crée le formulaire du type souhaité
        $formulaireAeroport = $this->createForm(AeroportType::class);

        // on envoie un objet FormView à la vue pour qu'elle puisse 
        // faire le rendu, pas le formulaire en soi
        $vars = ['unFormulaire' => $formulaireAeroport->createView()];

        return $this->render('/exemples_formulaires/exemple_aeroport.html.twig', $vars);
    }


    #[Route("/exemples/formulaires/exemple/aeroport/rempli")]
    public function exempleAeroportRempli()
    {
        $unAeroport = new Aeroport();
        $unAeroport->setNom("Sevilla Santa Justa");
        $unAeroport->setCode("SVQ");
        $unAeroport->setDescription ("Il fait toujours beau là bas");
        // etc....
    
        // on crée le formulaire du type souhaité
        // et on envoie l'entité remplie
        $formulaireAeroport = $this->createForm(AeroportType::class, $unAeroport);
    
        // on envoie un objet FormView à la vue pour qu'elle puisse 
        // faire le rendu, pas le formulaire en soi
        $vars = ['unFormulaire' => $formulaireAeroport->createView()];
    
        return $this->render('/exemples_formulaires/exemple_aeroport.html.twig', $vars);
    }
    
    #[Route("/exemples/formulaires/exemple/livre")]
    public function exempleLivre()
    {
        $livre = new Livre();
        $formulaireLivre = $this->createForm(LivreType::class, $livre, array(
            'action' => $this->generateUrl("rajouter_livre"), // name de la route!
            // si on n'utilise pas le name d'une route on doit l'écrire à la main... mauvaise idée
            // 'action' => "/exemples/formulaires/livre/rajouter", 
            'method' => 'POST'
        ));
        $vars = ['unFormulaire' => $formulaireLivre->createView()];


        return $this->render('/exemples_formulaires/exemple_livre.html.twig', $vars);
    }


}
