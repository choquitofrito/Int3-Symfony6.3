<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\RechercheiltreLivresType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class FormRechercheLivresFiltresAjaxController extends AbstractController
{
    #[Route('/form/search/livres/filtres/ajax', name: 'recherche_livres_filtres')]
    public function rechercheLivresFiltres(Request $req, ManagerRegistry $doctrine, SerializerInterface $serializer): Response
    {


        $form = $this->createForm(RechercheiltreLivresType::class);

        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) {
            $rep = $doctrine->getRepository(Livre::class);
            $resultats = $rep->rechercheLivresFiltres($form->getData());

            // Si on veut juste les livres, on serialise et on ignore les rélations pour éviter les références circulaires
            // $response = $serializer->serialize ($resultats, 'json', [AbstractNormalizer::IGNORED_ATTRIBUTES=> ['exemplaires']]) ;
            // Puis on renvoie le résultat JSON
            // return new Response ($response);

            // MAIS dans ce cas on a besoin aussi de l'auteur, alors on doit construire nous mêmes l'array ou définir
            // un serialiser personnalisé. Ici on va le faire à la main (construire nous mêmes l'array)

            $livresAvecNomsAuteurs = [];
            foreach ($resultats as $livre) {
                $arrLivre = [];
                
                $arrLivre['titre'] = $livre->getTitre();
                $arrLivre['prix'] = $livre->getPrix();
                // etc...
                // créer la clé "nomsAuteur" 
                $arrLivre['nomsAuteurs'] = [];
                foreach ($livre->getAuteurs() as $auteur) {
                    // rajouter le nom de l'auteur à l'array
                    $arrLivre['nomsAuteurs'][] = $auteur->getNom();
                }
                // rajouter le livre ayant l'array d'auteurs incrusté
                $livresAvecNomsAuteurs[] = $arrLivre;
            }
            
            // on sérialise l'array qu'on vient de créer. On ignore les rélations, mais on 
            // a incrusté l'array "nomsAuteurs". Sérialiser l'array ne posera aucun problème
            // dd($livresAvecNomsAuteurs); // debuggez pour les voir...
            $response = $serializer->serialize($livresAvecNomsAuteurs, 'json', [AbstractNormalizer::IGNORED_ATTRIBUTES => ['exemplaires','auteurs']]);
            // dd ($response);    

            return new Response ($response);
        }

        $vars = ['form' => $form];
        return $this->render('form_recherche_livres_filtres_ajax/recherche_livres_filtres.html.twig', $vars);
    }
}
