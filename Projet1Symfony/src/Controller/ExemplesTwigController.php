<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ExemplesTwigController extends AbstractController
{
    #[Route('/exemples/twig', name: 'exemples_twig')]
    public function index(): Response
    {
        return $this->render('exemples_twig/index.html.twig', [
            'controller_name' => 'ExemplesTwigController',
        ]);

    }

    #[Route('/exemples/twig/exemple1', name: 'exemple1Twig')]
    public function exemple1()
    {
        return $this->render('exemples_twig/exemple_1.html.twig');
    }


    #[Route('/exemples/twig/affiche/ville', name: 'afficheVille')]
    public function afficheVille()
    {
        // nous créons une structure de données
        $vars = [
            'nom' => 'Bruxelles',
            'population' => 1500000,
            'pays' => 'Belgique'
        ];
        // render reçoit l'array associatif et renvoie l'objet Response
        // on accédera à cette array depuis la vue
        return $this->render(
            'exemples_twig/affiche_ville.html.twig',
            $vars
        );
    }


    #[Route('/exemples/twig/afficher/ville/italienne/{ville}')]
    public function afficherVilleItalienne(Request $req)
    {
        $nomVilleChoisie = $req->get('ville');
        // on cherche normalement la ville dans une BD et on obtient ce qu'on veut envoyer à la vue
        $villes = [
            'Rome' => [
                'population' => 1500000,
                'pays' => 'Italie'
            ],
            'Milan' => [
                'population' => 2500000,
                'pays' => 'Italie'
            ]
        ];

        $vars = $villes[$nomVilleChoisie]; // vars contient l'array de la ville choisie
        $vars['nom'] = $nomVilleChoisie;

        return $this->render('exemples_twig/afficher_ville_italienne.html.twig', $vars);
    }


    #[Route('/exemples/twig/afficher/array/index')]
    public function afficherArrayIndex()
    {
        $lesNoms = ['Julie', 'Ylenia', 'Caro'];
        $vars = ['lesNoms' => $lesNoms];
        return $this->render('exemples_twig/afficher_array_index.html.twig', $vars);
    }

    // envoyer un objet à la vue
    #[Route('/exemples/twig/afficher/objet')]
    public function afficherObjet()
    {
        $v1 = new Voiture("Renault");
        $vars = ['objetVoiture' => $v1];
        return $this->render('exemples_twig/afficher_objet.html.twig', $vars);
    }

    #[Route('/exemples/twig/afficher/array/objet')]
    public function afficherArrayObjet()
    {
        $v1 = new Voiture("Renault");
        $v2 = new Voiture("AUDI");
        $v3 = new Voiture("Porsche");

        $vars = ['arrayObjetsVoiture' => [$v1, $v2, $v3]];
        return $this->render('exemples_twig/afficher_array_objet.html.twig', $vars);
    }


    // Exercices
    #[Route("exemples/twig/affiche/tvac/twig/{prix}/{tauxTVA}")]
    public function afficheTvacTwig(Request $req)
    {
        $prix = $req->get("prix");
        $tauxTVA = $req->get("tauxTVA");
        $prixTVAC = $prix * (1 + $tauxTVA / 100);
        return $this->render(
            'exemples_twig/affiche_tvac_twig.html.twig',
            ['prixTVAC' => $prixTVAC]
        );
    }



    #[Route("exemples/twig/affiche/tvac/complet/twig/{prix}/{tauxTVA}")]
    public function afficheTVACCompletTwig(Request $req)
    {
        $prix = $req->get("prix");
        $tauxTVA = $req->get("tauxTVA");
        return $this->render(
            'exemples_twig/affiche_tvac_complet_twig.html.twig',
            [
                'prix' => $prix,
                'tauxTVA' => $tauxTVA,
                'prixTVAC' => $prix * (1 + $tauxTVA / 100)
            ]
        );
    }


    #[Route("exemples/twig/affiche/villes")]
    public function afficheVilles()
    {
        return $this->render('exemples_twig/affiche_villes.html.twig');
    }

    #[Route("exemples/twig/affiche/villes/envoi")]
    public function afficheVillesEnvoi()
    {
        $villes = ['Bruxelles', 'Charleroi', 'Namur'];
        return $this->render('exemples_twig/affiche_villes_envoi.html.twig', ['lesVilles' => $villes]);
    }

    #[Route("exemples/twig/affiche/villes/langue/{langue}")]
    public function afficheVillesLangue(Request $req)
    {
        $villes = [
            'fr' => ['Bruxelles', 'Liège', 'Gand'],
            'nl' => ['Brussels', 'Luik', 'Ghent']
        ];
        $lange = $req->get("langue");
        return $this->render('exemples_twig/affiche_villes_envoi.html.twig', ['lesVilles' => $villes[$lange]]);
    }

    #[Route("exemples/twig/affiche/date/objet")]
    public function afficheDateObjet()
    {
        $dateActuelle = new \DateTime();
        return $this->render('exemples_twig/affiche_date_objet.html.twig', ['laDate' => $dateActuelle]);
    }
}
// à ne pas faire, c'est juste un exemple!
class Voiture
{
    public string $marque;
    public function __construct(string $marque)
    {
        $this->marque = $marque;
    }
    public function getMarque(): string
    {
        return $this->marque;
    }
}
