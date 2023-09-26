<?php

namespace App\Controller;

use App\Entity\Pays;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\ResponsesApi\ResponseContainerCountry;
use App\ResponsesApi\RacineResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Film;

class NavigationController extends AbstractController
{

    // Rendre une vue partielle permet d'éviter de générer à la main le contenu de la page en js
    // quand on fait un appel ajax 
    // On génére un bloc (twig) et on l'incruste quelque part (ex: div)


    // lancez cette route pour commencer. Elle contient une nav
    #[Route('/navigation', name: 'navigation')]
    public function index(): Response
    {
        return $this->render('navigation/index.html.twig');
    }

    // VUE PARTIELLE AJAX
    // appel AJAX dans l'onclick du lien de la nav
    // Vue contenant le form de recherche et le code pour faire l'appel AJAX
    #[Route('/navigation/recherche/vue/partielle', name: 'recherche_vue_partielle')]
    public function rechercheVuePartielle(Request $req)
    {
        // render normal, c'est une vue contenant
        // - un form (ici pas associé à une entité, mais on pourrait le faire) 
        // - le code pour faire l'appel AJAX
        // - le code pour remplacer le contenu du DIV généré par l'action ajax_vue_partielle ci-dessous
        return $this->render("navigation/recherche_vue_partielle.html.twig");
    }


    // ajax_vue_partielle: Vue qui génére la vue partielle. Le script dans 'recherche_vue_partielle' (ci-dessus)
    // Cette action, alors:
    // 1. reçoit un form encodé avec FormData
    // 2. cherche un film dans la BD par titre (ex: Film2. Ici on a fait just findAll :D) 
    // re-ajustez les requêtes selon vos besoins (par id, filtres....) 
    // 3. renvoie une vue partielle et lui envoie le résultat de la recherche (ici un array d'objets).
    // C'est l'autre vue (recherche_vue_partielle) qui modifie le div 
    // On ne doit pas sérialiser, car on va utiliser les objets dans un twig et pas en JS

    // 4. la vue partielle (celle-ci) utilise les données reçues pour générer son contenu
    // 5. dans le "success" ou "then" de Ajax (recherche_vue_partielle) on REMPLACE le contenu d'un (dans 'recherche_vue_partielle)
    // par le contenu de la vue partielle (celle ci-dessous: ajax_vue_partielle)

    
    // On ne peut pas retourner les headers HTTP, 
    // alors on utilise renderView au lieu du render (voir le return). Dans la vue qu'on retourne
    // il y aura juste le code qu'on veut incruster. Ici la vue est:
    // ajax_vue_partielle_rendu.html.twig
    #[Route('/navigation/ajax/vue/partielle', name: 'ajax_vue_partielle')]
    public function ajaxVuePartielle(Request $req)
    {

        $repo = $this->getDoctrine()->getManager()->getRepository(Film::class);
        $films = $repo->findAll();
        $vars = ['films'=>$films];

        return new Response($this->renderView("navigation/ajax_vue_partielle.html.twig", $vars));
    }






////////////////////////////////




    // actions liées au deuxième lien (API, deserialisation...)
    #[Route('/navigation/pays', name: 'pays_api')]
    public function getPays(HttpClientInterface $client, SerializerInterface $serializer): Response
    {
        // Api sans token
        // Notes: https://symfony.com/doc/current/http_client.html#basic-usage
        $response = $client->request(
            'GET',
            'https://countriesnow.space/api/v0.1/countries/'
        );

        // deserialisation
        $arrayPays = $serializer->deserialize($response->getContent(), RacineResponse::class, "json")->getData();

        // dd($arrayPays);
        $em = $this->getDoctrine()->getManager();
        for ($i = 0; $i < 10; $i++) {
            $em->persist($arrayPays[$i]);
        }
        $em->flush(); // rajouter cascade persist dans le OneToMany de Pays


        return $this->render("navigation/navigation_pays.html.twig");
    }





    // PROBLEMES: le normalizer du serializer
    // fait appel aux addCities et setCities!
    // il faudrait configurer le serializer en détail (exemple ailleurs)
    // #[Route('/navigation/country', name: 'country_api')]
    // public function getCountries(HttpClientInterface $client, SerializerInterface $serializer): Response
    // {
    //     // Api sans token
    //     // Notes: https://symfony.com/doc/current/http_client.html#basic-usage
    //     $response = $client->request(
    //         'GET',
    //         'https://countriesnow.space/api/v0.1/countries/' 
    //     );

    //     // deserialisation
    //     $countries = $serializer->deserialize($response->getContent(),ResponseContainerCountry::class,"json");


    //     // $premierPays = $arrayObjets->getData()[0]; // un pays
    //     dd ($countries); // les villes

    //     return $this->render('navigation/countries.html.twig');
    // }
}
