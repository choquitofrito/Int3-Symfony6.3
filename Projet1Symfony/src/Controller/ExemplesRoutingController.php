<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ExemplesRoutingController extends AbstractController
{
    #[Route('/exemples/routing/accueil')]
    public function afficherMessageAccueil()
    {
        return new Response(
            '<html><body>Je suis une action du controller ExemplesRoutingController.</body></html>'
        );
    }
    

    #[Route("/exemples/routing/afficher/contact/{prenom}/{profession}")]
    public function afficherContact(Request $objetRequest)
    {
        // on obtient les valeurs des paramètres de l'url grâce à la méthode "get" de l'objet Request
        $lePrenom = $objetRequest->get("prenom");
        $laProfession = $objetRequest->get("profession");
        return new Response("<br>Je suis " . $lePrenom . ", " . $laProfession);
    }

    #[Route("/exemples/routing/bienvenue/age/{age}",requirements:['age'=>'\d+'])]
    public function bienvenueAge (Request $objRequest){
        return new Response ("Bienvenue au site, vous avez ".$objRequest->get ("age")." ans");
        
    }

    #[Route ("/exemples/routing/affiche/prix/defaut/tvac/{prix}/{tauxTVA?21}")]
    public function affichePrixDefautTvac(Request $objetRequest)
    {
        $prix = $objetRequest->get("prix");
        $tauxTVA = $objetRequest->get("tauxTVA");
        return new Response("<br>Le produit coûte ".$prix. " euros, ".($prix * (1 + $tauxTVA / 100)). " TVAC");

    }       


    #[Route ("/exemples/routing/affiche/prix/opt/tvac/{prix}/{tauxTVA?}")]
    public function afficheOptPrixTaux (Request $objetRequest){
        $prix = $objetRequest->get ("prix");
        $tauxTVA = $objetRequest->get ("tauxTVA");
        if (!isset($tauxTVA)){
            $tauxTVA = 21;
        }
        return new Response ("Prix TVAC : " . $prix * (1+$tauxTVA/100));
    }


    




    // Exercices 
    #[Route('/exemples/routing/monAction1')]
    public function monAction1()
    {
        return new Response("Ce controller est en charge du répertoire de l'application et je suis juste une action à l'intérieur");
    }

    #[Route('/exemples/routing/monAction2')]
    public function monAction2()
    {
        return new Response(date("d/M/Y"));
    }

    #[Route('/exemples/routing/affiche/tvac/{prix}')]
    public function afficheTvac(Request $objetRequest)
    {
        return new Response("Le prix TVAC est : " . ($objetRequest->get('prix') * 1.21));
    }

    #[Route('/exemples/routing/affiche/moyenne/val1/val2/val3')]
    public function afficheMoyenne(Request $req)
    {
        $moyenne = ($req->get('val1') + $req->get('val2') + $req->get('val3')) / 3;
        return new Response("La moyenne vaut : " . $moyenne);
    }


    #[Route ("/exemples/routing/affiche/ville/{ville<\w+>}")]
    public function afficheVille(Request $objRequest)
    {
        return new Response("Voici la ville de " . $objRequest->get("ville"));
    }
    
    
    #[Route ("/exemples/routing/affiche/ville2/{ville<\w{1,15}>}")]
    public function afficheVille2(Request $objRequest)
    {
        return new Response("Voici la ville de " . $objRequest->get("ville"));
    }
    
    #[Route ("/exemples/routing/affiche/disponibilite/{disponibilite<oui|non|en attente>?}")]
    public function afficheDisponibilite(Request $objRequest)
    {
        return new Response("Le produit est " . $objRequest->get("disponibilite"));
    }
    
    
    #[Route ("/exemples/routing/affiche/message/{message}/{nombreFois<\d+>?10}")]
    public function afficheMessage(Request $objetRequest)
    {
        $contenuHTML = "";
        for ($i = 0; $i < $objetRequest->get("nombreFois") ; $i++) {
            $contenuHTML = $contenuHTML . $i . " " . $objetRequest->get("message") . "<br>" ;
        }
        return new Response($contenuHTML);
    }

    #[Route ("/exemples/affiche/message/{message}/{nombreFois<\d+>?10}")]
    public function afficheMessageXFois(Request $objetRequest)
    {
        $contenuHTML = "";
        for ($i = 0; $i < $objetRequest->get("nombreFois") ; $i++) {
            $contenuHTML = $contenuHTML . $i . " " . $objetRequest->get("message") . "<br>" ;
        }
        return new Response($contenuHTML);
    }

}
