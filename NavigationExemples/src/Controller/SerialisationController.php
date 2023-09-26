<?php

namespace App\Controller;

use Normalizer;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Film;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;

class SerialisationController extends AbstractController
{

    // note: Tous les objets qu'on utilise ici 
    // (Normalizers, Serializers etc...) peuvent être injectés dans les actions ou dans le constructeur
    // pour éviter leur création dans chaque action (voir chapitre de Services - Injection dans le constructeur)
    // Ici tout le code est repété pour faciliter la visualisation

    // exemple de serialisation en deux pas : Normalizer + encoder -> json
    #[Route('/serialisationDeuxPas')]
    public function serialisationDeuxPas(): Response
    {
        $film1 = new Film([
            'titre' => 'La Haut',
            'duree' => 90,
            'annee' => 2005
        ]);

        // 0. Objet Film
        dump("0. Film objet:");
        dump($film1);
        // 1. Normalization d'un objet
        $normalizer = new ObjectNormalizer();
        dump("1. Film normalisé: array");
        $filmNormalise = $normalizer->normalize($film1);
        dump($filmNormalise);

        // 2. Encodage de l'array en JSON
        $filmJson = json_encode($filmNormalise);
        dump("2. Film JSON");
        dump($filmJson);

        // Encodage direct avec json_encode... pas sufissant!
        // dump (json_encode($film1)); // json_encode peut encoder un objet directement, MAIS il ne peut pas accéder aux propriétés privées!
        dd();
    }


    // exemple de serialisation en utilisant un Serializer (qui inclut Normalizer + Encoder) -> json
    #[Route('/serialisationAvecSerialiser')]
    public function serialisationAvecSerialiser()
    {
        // un serializer fera tout le procés (normalization + encodage)
        // on doit juste le configurer: lui indiquer un ou plusieurs normalizers et encoders

        // pour normalizer/denormalizer : passer d'array à objet et à l'invers 
        $normalizers = [new ObjectNormalizer()];
        // pour encoder/decoder : passer du JSON à array et à l'invers (ici on va pouvoir choisir entre Json et Xml)                          
        $encoders = [new JsonEncoder(), new XmlEncoder()];

        $serializer = new Serializer($normalizers, $encoders);

        $film1 = new Film([
            'titre' => 'La Haut',
            'duree' => 90,
            'annee' => 2005
        ]);

        // 0. Objet Film
        dump("0. Film objet:");
        dump($film1);
        // 1. Serialisation
        dump("1. Film objet en JSON et en XML:");
        $filmJson = $serializer->serialize($film1, 'json');
        dump($filmJson);
        $filmXML = $serializer->serialize($film1, 'xml');
        dump($filmXML);

        // ici vous envoyer une réponse au serveur.
        dd();
    }


    // route qui affiche un bouton: appel AJAX et affichage du résultat de "serializer_traitement"
    #[Route('/useSerialiserAffichage', name: 'serializer_affichage')]
    public function useSerialiserAffichage()
    {
        return $this->render("serialisation/use_serializer_affichage.html.twig");
    }

    // action qui serialise un objet (avec un Serializer) et le renvoie en JSON
    // LISEZ ATTENTIVEMENT LES COMMENTAIRES 
    #[Route('/useSerialiserTraitement', name: 'serializer_traitement')]
    public function useSerialiserTraitement()
    {
        $normalizers = [new ObjectNormalizer()];
        $encoders = [new JsonEncoder(), new XmlEncoder()];
        $serializer = new Serializer($normalizers, $encoders);

        $film1 = new Film([
            'titre' => 'La Haut',
            'duree' => 90,
            'annee' => 2005
        ]);

        // ces deux lignes: 
        $filmJson = $serializer->serialize($film1, 'json');
        // on ne doit plus envoyer une JSonResponse car le serialiser a crée déjà du JSON
        return new Response($filmJson);

        // auront le même effet que:
        // return $this->json ($film1); // appel au serializer avec ObjectNormalizer + json_encode (params. par défaut)

        // mais pas le même effet que:
        // return new JsonResponse($film1); // car new JsonResponse appelle uniquement à json_encode. Dans la vue on obtient un objet vide, car 
        // nous n'avons pas normalisé l'objet en array proprement (json_encode ignore les privates)
        // Si on a juste des arrays simples (sans objets), $this->json ($monArray) == new JsonResponse ($monArray)
        // car ... les arrays n'ont pas besoin d'être normalisés!!!
    }

    // deserialisation en deux pas : Normalizer + encoder -> json
    #[Route('/deserialisationDeuxPas')]
    public function deserialisationDeuxPas(): Response
    {
        // Nous partons d'un json et on aura un objet

        // Respectez les guillemets doubles!
        $filmJson  = '{ "titre": "La Haut",
                        "duree": 90,
                        "annee": 2005}';
        dump("Json de départ (car. extra à cause du dump) :");
        dump($filmJson);


        $filmArray = json_decode($filmJson, true); // Passer du JSon à tableau
        $normalizer = new ObjectNormalizer(); // Passer du tableau à objet. Le Normalizer sert aussi à Denormaliser
        $filmObjet = $normalizer->denormalize($filmArray, Film::class);
        dump("Objet d'arrivée:");
        dd($filmObjet); // genial, on a un objet Film tout nouveau

        // je vais m'epargner le return :D
        // $vars = ['film'=> $filmObjet];
        // etc....


    }


    // exemple de dé-serialisation en utilisant un Serializer 
    #[Route('/deserialisationAvecSerialiser')]
    public function deserialisationAvecSerialiser()
    {
        // Nous partons d'un json et on aura un objet

        // Respectez les guillemets doubles!
        $filmJson  = '{ "titre": "La Haut",
            "duree": 90,
            "annee": 2005}';
        dump("Json de départ (car. extra à cause du dump) :");
        dump($filmJson);


        
        // La config. est la même que pour serializer




        // pour normalizer/denormalizer : passer d'array à objet et à l'invers 
        $normalizers = [new ObjectNormalizer()];
        // pour encoder/decoder : passer du JSON à array et à l'invers (ici on va pouvoir choisir entre Json et Xml)                          
        $encoders = [new JsonEncoder(), new XmlEncoder()];

        // à la fin ce sont juste deux lignes de code!
        $serializer = new Serializer($normalizers, $encoders);
        $filmObject = $serializer->deserialize($filmJson, Film::class, 'json');

        dump("Objet d'arrivée:");
        dump($filmObject);


        dd();
    }


    


}
