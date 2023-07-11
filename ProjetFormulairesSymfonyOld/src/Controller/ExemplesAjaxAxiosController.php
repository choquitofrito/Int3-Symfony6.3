<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\LivreType;

// entité Livre
use App\Entity\Aeroport;
// classe du formulaire
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Serializer;

use Doctrine\Persistence\ManagerRegistry;

// attention, ne pas les oublier!
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class ExemplesAjaxAxiosController extends AbstractController
{

    // exemple simple d'utilisation d'Ajax (Axios)

    #[Route("/exemples/ajax/axios/exemple1/affichage")]
    public function exemple1Affichage()
    {
        return $this->render("/exemples_ajax_axios/exemple1_affichage.html.twig");
    }

    #[Route("/exemples/ajax/axios/exemple1/traitement")]
    // action qui traite la commande AJAX, elle n'a pas une vue associée
    public function exemple1Traitement(Request $requeteAjax)
    {

        $valeurNom = $requeteAjax->get('nom');
        $arrayReponse = [
            'leMessage' => 'Bienvenu, ' . $valeurNom,
            'autreCle' => 'je suis une autre valeur'
        ];
        return new JsonResponse($arrayReponse);
    }


    #[Route("/exemples/ajax/axios/form/entite/afficher", name: "exemple_axios_form_entite_afficher")]
    public function exempleAjaxAxiosFormEntiteAfficher(Request $req)
    {
        // si on veut le pré-remplir on peut remplir cette entité. 
        // Autrement on peut l'envoyer vide ou juste envoyer null dans le paramètre dans createForm
        $livre = new Livre();

        // ATTENTION!: il faut donner un id au formulaire pour pouvoir le manipuler avec JS!!
        $formulaireLivre = $this->createForm(
            LivreType::class,
            $livre,
            [    // pas d'action. On gére le click avec JS et on fait l'appel AXIOS
                'method' => 'POST',
                'attr' => ['id' => 'formulaireLivre']
            ],
        );

        // ici la vue de l'affichage est une vue complete (recharge URL). Si cette action avait été appelée par 
        // AJAX, on aurait pu faire $this->renderView pour renvoyer uniquement le rendu de la vue 
        // et l'incruster dans un DIV
        $vars = ['formulaireLivre' => $formulaireLivre->createView()];
        return $this->render("/exemples_ajax_axios/form_entite_afficher.html.twig", $vars);
    }


    #[Route("/exemples/ajax/axios/form/entite/traiter", name: "exemple_axios_form_entite_traiter")]
    public function exempleAjaxAxiosFormEntiteTraiter(Request $req, SerializerInterface $serializer)
    {
        // ATTENTION à comment créer l'entité à partir du FormData!!!
        // Quand on utilise un FormData on doit passer par handleRequest, car FormData envoie tout en string
        // et nous avons besoin de DateTime pour le Dates. HandleRequest fait l'hydrate proprement pour nous
        // C'est le même code que quand on traite un form sans Ajax, juste qu'ici l'affichage
        // et le traitement sont separés

        $livre = new Livre();

        // On crée un objet formulaire pour traiter les données, mais ici on n'affiche rien
        $formulaireLivre = $this->createForm(
            LivreType::class,
            $livre,
            [    // pas d'action. On gére le click avec JS et on fait l'appel AXIOS
                'method' => 'POST',
                'attr' => ['id' => 'formulaireLivre']
            ],
        );

        $formulaireLivre->handleRequest($req);

        // Maintenant il faut envoyer quoi qui ce soit à la page qui appelle. Deux cas de figures standards,
        // où le controller renvoie: 

        // 1. Juste de données: un simple JSON (messages, objets....) à incruster dans un div de form_entite_afficher.html.twig. 
        // Pas de recharge d'URL

        // Note: On a besoin de l'entité en JSON. On doit la serialiser avant de l'envoyer (seule manière propre), en ignorant les exemplaires 
        $livreJson = $serializer->serialize($livre, 'json', [AbstractNormalizer::IGNORED_ATTRIBUTES => ['exemplaires']]);

        // On rajoute les exemplaires dans IGNORED_ATTRIBUTES pour éviter les références circulaires
        // (livre->exemplaires->livre->exemplaires...)
        // Important: nous pourrions utiliser un système équivalent pour la serialisation avec des annotations, ou utiliser ATTRIBUTES au lieu d'IGNORED_ATTRIBUTES et sélectionner ce qu'on veut serialiser : 
        // Projet CreationApi, controller LivresController, annotations entité Livre (Groups)

        // ici on a envoyé une JsonResponse où on inclut une clé-valeur livre. 
        // $livreJson est déjà du JSON. Le fait de le renvoyer dans 
        // une JSonResponse l'encodera encore une fois! 
        // on devra alors lancer JSON.parse dans la vue pour revertir ce changement (voir code du "then" dans la vue) 

        // On aurait pu renvoyer juste new Response ($livreJson) mais on doit envoyer aussi message et noms alors on a envoyé une JSonReponse.
        // Le ré-encodage du json du livre est défait dans la vue (JSON.parse)
        return new JsonResponse([
            'message' => 'Tout ok!',
            'noms' => ['Lola', 'Iza'],
            'livre' => $livreJson // lisez le code du "then" dans la vue
        ]);

        // 2. Le rendu d'une autre view, à incruster dans un div dans form_entite_afficher.html.twig. 
        // Pas de recharge d'URL non plus!
        // Ceci est lourd car il s'agit de remplacer carrement du contenu d'une partie de la page (ex: div)
        // au lieu d'envoyer de données et les placer dans la vue 
        // return $this->renderView ("/exemples_ajax_axios/autre.html.twig", $vars) 

    }


    // exemple d'utilisation d'AJAX avec de blocs ("master page")
    #[Route("/exemples/ajax/axios/exemple1/affichage/master/page")]
    public function exemple1AffichageMasterPage()
    {
        return $this->render("/exemples_ajax_axios/exemple1_affichage_master_page.html.twig");
    }

    #[Route("/exemples/ajax/axios/exemple1/traitement/master/page")]
    // action qui traite la commande AJAX, elle n'a pas une vue associée
    public function exemple1TraitementMasterPage(Request $requeteAjax)
    {
        $valeurNom = $requeteAjax->get('nom');
        $arrayReponse = ['message' => 'Bienvenu, ' . $valeurNom];
        return new JsonResponse($arrayReponse);
    }



    // exemple d'utilisation d'AJAX avec de blocs ("master page")
    // et fichier JS externe (/public/assets/js/exemple1Ajax.js)

    #[Route("/exemples/ajax/axios/exemple1/affichage/master/page/script/externe")]
    public function exemple1AffichageMasterPageScriptExterne()
    {
        return $this->render("/exemples_ajax_axios/exemple1_affichage_master_page_script_externe.html.twig");
    }

    // action qui traite la commande AJAX, elle n'a pas une vue associée
    /**
     * @Route ("/exemples/ajax/axios/exemple1/traitement/master/page/script/externe", name= "exemple1_traitement_externe_ajax_axios",options= {"expose"=true})
     */
    public function exemple1TraitementMasterPageScriptExterne(Request $requeteAjax)
    {
        $valeurNom = $requeteAjax->get('nom');
        $arrayReponse = ['leMessage' => 'Bienvenu, ' . $valeurNom];
        return new JsonResponse($arrayReponse);
    }

    #[Route("/exemples/ajax/axios/exemple/affichage/objets/repo")]
    public function exempleAffichageObjetsRepo()
    {

        return $this->render('/exemples_ajax_axios/exemple_affichage_objets_repo.html.twig');
    }


    #[Route("/exemples/ajax/axios/exemple/affichage/objets/dql")]
    public function exempleAffichageObjetsDql()
    {
        return $this->render('/exemples_ajax_axios/exemple_affichage_objets_dql.html.twig');
    }

    // 1. action de traitement du AJAX, on utilise les méthodes du repository (findBy, findAll, etc...)
    // nous devons serialiser le résultat (le transformer en json dans ce cas) et envoyer une Reponse normale

    #[Route("/exemples/ajax/axios/exemple/affichage/objets/traitement/repo", name: "exemple_objets_traitement_repo")]
    public function exempleAffichageObjetsTraitementRepo(ManagerRegistry $doctrine, Request $req)
    {

        $em = $doctrine->getManager();
        $rep = $em->getRepository(Aeroport::class);
        $code = $req->get('code');
        $aeroports = $rep->findBy(['code' => $code]); // renvoie un array même s'il y a un seul objet
        // Si on utilise les méthodes de base du Repository (find, findBy, findAll...)
        // nous devons serializer à la main en utilisant la méthode "serialize", puis 
        // envoyer une réponse normale. En DQL on peut utiliser getArrayResult, mais pas ici  
        $aeroports = $this->get('serializer')->serialize($aeroports, 'json');
        return new Response($aeroports);
    }


    // 2. action de traitement du AJAX, on utilise DQL
    // La méthode getArrayResult créera un array manipulable par JsonResponse
    // Dans ce cas on renvoie un JsonResponse au lieu d'une Response

    #[Route("/exemples/ajax/axios/exemple/affichage/objets/traitement/dql", name: "exemple_objets_traitement_dql")]
    public function exempleAffichageObjetsTraitementDql(ManagerRegistry $doctrine,Request $req)
    {

        $em = $doctrine->getManager();
        $query = $em->createQuery("SELECT aeroport FROM App\Entity\Aeroport aeroport WHERE aeroport.code LIKE :code");
        $code = $req->get('code');
        $query->setParameter("code", '%' . $code . '%');


        // avec getResult() on obtient un array contenant toutes les entités Livre 
        // qui contiennent dans son titre le texte saisi dans l'input

        // Chaque entité contient toutes ses propriétés et
        // les références à d'autres entités: JSON.parse ne pourra pas l'interpreter ...

        // ... mais si on change getResult par getArrayResult on recevra un array 
        // contenant (dans ce cas) la représentation d'array de chaque entité 
        // contenant uniquement les propriétés de base propres à l'objet 
        // (pas les "rélations" ni d'autres propriétés)
        $aeroports = $query->getArrayResult();

        // Pour mieux comprendre faites un dump ici et regardez la 
        // réponse du serveur. 

        // dd ($resultat);

        // Notez que JSON.parse n'arrivera à interpréter la réponse si vous faites dump ou 
        // echo ici, car votre réponse ne sera plus du pur JSON
        // dump ($objetLivre);

        return new JsonResponse($aeroports);

        // SELECT aeroport FROM App\Entity\Aeroport aeroport WHERE aeroport.code = 'CLR'
        // SELECT aeroport FROM App\Entity\Aeroport aeroport WHERE aeroport.code LIKE 'CLR%'
        // SELECT aeroport FROM App\Entity\Aeroport aeroport WHERE aeroport.code LIKE '%CLR%'
        // SELECT aeroport FROM App\Entity\Aeroport aeroport WHERE aeroport.code LIKE :code
        // SELECT aeroport FROM App\Entity\Aeroport aeroport WHERE aeroport.code LIKE %:code% // non!!!
        // SELECT aeroport FROM App\Entity\Aeroport aeroport WHERE aeroport.code LIKE %'CLR'% // non!!! le % ne vas pas avant les ""
        // Nous devons rajouter les % dans setParameter. Attention, il n'y a pas de ":" dans l'appel à cette fonction

    }
}
