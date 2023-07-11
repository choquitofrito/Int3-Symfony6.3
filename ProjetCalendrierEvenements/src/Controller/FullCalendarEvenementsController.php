<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Repository\EvenementRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FullCalendarEvenementsController extends AbstractController
{
    #[Route('/afficher/calendrier/utilisateur', name: 'afficher_calendrier_utilisateur')]
    public function afficherCalendrierUtilisateur(SerializerInterface $serializer): Response
    {
        // obtenir les dates d'un calendrier d'un Utilisateur
        // qui ont été déjà sélectionnées et les envoyer en JSON à la vue pour que fullcalendar les affiche.
        // C'est un objet Serializer qui transformera en JSON l'array d'Evenement

        // l'Utilisateur doit être connecté, on va obtenir tous ses evenements (rajoutés avec de Fixtures)
        $utilisateur = $this->getUser(); // ATTENTION: la méthode getUser est du CONTROLLER et portera toujours ce nom, même si notre classe est Utilisateur
        // si pas d'Utilisateur, on va au login
        if (is_null($utilisateur)) {
            return $this->redirectToRoute("app_login");
        }

        // sinon, on continue. On obtient tous les Evenement de cet utilisateur
        $evenements = $utilisateur->getEvenements();
        // pour debugger, vous pouvez faire de dumps. Attention: un dd($evenements)
        // dump ($evenements);
        // dump($evenements[0]);
        // dd($evenements[1]); // etc...


        // Serialiser = Normaliser (passer objet ou array d'objets à array) et Encoder (passer array à JSON)
        // https://symfony.com/doc/current/components/serializer.html (regardez le dessin)
        // Si vous avez de problèmes de CIRCULAR REFERENCE, utilisez IGNORED_ATTRIBUTS pour ne pas 
        // serialiser les propriétés qui constituent une rélation (ex: serialiser Livre sans serialiser les Exemplaires)
        // $evenementsJSON = $serializer->serialize($evenements, 'json',[AbstractNormalizer::IGNORED_ATTRIBUTES => ['utilisateur']]);
        // $evenementsJSON = $serializer->serialize($evenements, 'json',[AbstractNormalizer::ATTRIBUTES => ['start','title']]);
        $evenementsJSON = $serializer->serialize($evenements, 'json', [AbstractNormalizer::IGNORED_ATTRIBUTES => ['utilisateur']]);
        $vars = ['evenementsJSON' => $evenementsJSON];
        return $this->render('full_calendar_evenements/afficher_calendrier_utilisateur.html.twig', $vars);
    }

    #[Route('/add/evenement', name: 'add_evenement')]
    public function addEvenement(
        Request $req,
        SerializerInterface $serializer,
        ManagerRegistry $doctrine
    ): Response {

        // Deserialiser = decoder (passer du JSON à Array) + denormaliser (passer d'Array à Objet ou array d'objets)
        $objetEvenement = $serializer->deserialize($req->getContent(), Evenement::class, 'json');

        // ici on aura déjà un objet Evenement, qui 
        // contient que la date choisie

        // on rajoute l'Utilisateur 
        $objetEvenement->setUtilisateur($this->getUser());

        // on va le stocker dans la BD!
        $em = $doctrine->getManager();
        $em->persist($objetEvenement);
        $em->flush();
        return new JsonResponse([
            'id' => $objetEvenement->getId(),
            'status' => "Evenement stocké"
        ], 201); // pas de render!!!


    }



    #[Route('/effacer/evenement', name: 'effacer_evenement')]
    public function effacerEvenement(
        Request $req,
        ManagerRegistry $doctrine
    ): Response {

        // on transforme le JSON en objet
        // de la classe Standard
        $objet = json_decode($req->getContent());
        $idEffacer = $objet->id;
        // on obtient l'Evenement et on l'efface de la BD
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Evenement::class);
        $evenement = $rep->find($idEffacer);
        $em->remove($evenement);
        $em->flush();

        return new Response("Evenement effacé", 200); // pas de render!!!
    }
}
