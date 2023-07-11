<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Livre;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Doctrine\Persistence\ManagerRegistry;


class SerialisationController extends AbstractController
{

    // Action a lancer dans le navigateur
    #[Route('/serialisation/affiche/boutons', name: 'affiche_boutons')]
    public function afficheBoutonsObtenirLivres(): Response
    {
        return $this->render('serialisation/affiche_boutons.html.twig');
    }


    // Action réponse: Envoyer les livres tels qu'objets PHP
    #[Route('/serialisation/action1', name: 'action1')]
    public function action1(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $livres = $em->getRepository(Livre::class)->findAll();
        $vars = ['livres' => $livres];
        return $this->render('serialisation/action1.html.twig', $vars);
    }

    // Action réponse: Envoyer les livres encodés en JSON (juste pour tester, mais ça ne fonctionne pas)
    #[Route('/serialisation/action2', name: 'action2')]
    public function action2(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $livres = $em->getRepository(Livre::class)->findAll();
        $jsonLivres = json_encode($livres);
        $vars = ['livres' => $jsonLivres];
        return $this->render('serialisation/action2.html.twig', $vars);
    }


   

    ///////////////////////////////////////////



    // Serialisation avec AJAX. Action qui affiche un bouton: quand on clique on fait une requête AXIOS au serveur
    // Le serveur envoie une JSonResponse qu'on parse et on affiche en JS.
    // Voici la façon de "passer des objets de PHP à JS" 
    #[Route('/serialisation/affiche/boutons/div/ajax', name: 'affiche_boutons_div_ajax')]
    public function afficheBoutonsDivAjax(): Response
    {
        return $this->render('serialisation/affiche_boutons_div_ajax.html.twig');
    }

    // Envoyer les livres encodés en JSON serialisés. TRÈS SIMPLE avec JSonResponse
    // Le serialiser fait la normalization (passage objet-array) et l'encodage (passage array-json)
    #[Route('/serialisation/action4', name: 'action4')]
    public function action4(SerializerInterface $serializer, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $livres = $em->getRepository(Livre::class)->findAll();


        if (count($livres) > 0) {
            $jsonLivres = $serializer->serialize(
                $livres,
                'json',
                [AbstractNormalizer::IGNORED_ATTRIBUTES => ['exemplaires']]
            );
            // IGNORED_ATTRIBUTES empechera la serialisation des Exemplaires. 
            // C'est obligatoire car il y a des liens dans les deux 
            // sens (Livre<->Exemplaire), et on entre dans une Circular Reference.
            // On peut réaliser cette opération en incluant des annotations 
            // dans l'entité (projet CreationApi - LivresController)
            $vars = [
                'jsonLivres' => $jsonLivres,
            ];
        } else {
            $vars = ['jsonLivres' => ""];
        }
        
        // attention à la reponse!!
        return new JsonResponse($vars);
    }
}
