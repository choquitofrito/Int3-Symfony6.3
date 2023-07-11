<?php

namespace App\Controller;

use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExemplesAppelApiController extends AbstractController
{

    // la vue associée fait appel aux différentes méthodes de l'API
    #[Route('/exemples/appel/api', name: 'app_exemples_appel_api')]
    public function exemples(): Response
    {
        return $this->render('exemples_appel_api/exemples.html.twig');
    }

    // Exemple d'appel dans le serveur et renvoie du résultat au client
    // On envoie un array d'objets à la vue et on l'affichera
    // sans devoir utiliser du JS pour manipuler le DOM

    // ATTENTION: Symfony n'est pas capable de gérer deux appels simultanés 
    // au serveur (l'action et l'API) et provoquera un blocage
    // Vous devez alors allumer deux serveurs: Apache et le local
    // Un pour charger l'action et l'autre pour recevoir l'appel à l'API
    // Pour utiliser Apache avec Symfony, installez d'abord ces extensions:
    //
    //          composer require symfony/apache-pack
    //
    // - Puis allumez le serveur Apache (port 80, par défaut)
    // - Puis lancez le serveur local dans un autre port (ex: 8080)
    // 
    //          symfony server:start --port 8080

    // L'appel à l'action qui se trouve ci-dessous se fera dans le 80 (Apache) en utilisant une URL
    // de la forme:
    //
    // http://localhost/<dossierDeVotreProjet>/public/index.php/<route spécifiée dans le controller>
    // 
    // Par exemple, pour appeler l'action ci-dessous (ici le projet est dans xampp/htdocs/SymfonyWad22/ProjetApiSimple):
    //
    // http://localhost/SymfonyWad22/ProjetApiSimple/public/index.php/exemples/appel/api/back
    // L'appel à l'API dans l'action se fera dans le port 8080 (serveur local)
    // http://localhost:8080/api/aeroports (voir code ci-dessous)

    #[Route('/exemples/appel/api/back', name: 'app_exemples_appel_api_back')]
    public function exempleAppelBack(HttpClientInterface $client, SerializerInterface $serializer)
    {
        $response = $client->request(
            'GET',
            'http://localhost:8080/api/aeroports' // pas de spécification de dossier, le serveur de Symfony est local au projet
        );
        // on reçoit une réponse. On va extraire le contenu et le transformer en Array (décoder)
        $content = $response->getContent();

        // $statusCode = $response->getStatusCode();
        // $statusCode = 200, juste pour l'info
        // dd($statusCode);
        // $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json' , juste pour l'info
        // dd($contentType);

        // deserialization: vu qu'on a un array d'objets, on doit configurer 
        // le serialiser pour l'accepter. Autrement on doit deserializer chaque objet en parcourant l'array avec une boucle.
        // Ici on utilise le composant JMSSerializerBundle
        // http://jmsyst.com/bundles/JMSSerializerBundle 
        // qui nous facilite la tâche par rapport au Serializer de base de Symfony. Installez-le:
        //
        //  composer require jms/serializer-bundle
        //
        // On indique que notre json contient un array d'objets.
        $aeroports = $serializer->deserialize($content, 'array<App\Entity\Aeroport>', 'json');
        $vars = ['aeroports' => $aeroports];
        return $this->render('exemples_appel_api/appel_back.html.twig', $vars);
    }
}
