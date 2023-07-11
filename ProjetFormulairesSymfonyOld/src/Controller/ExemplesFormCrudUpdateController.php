<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\LivreType;
use App\Repository\LivreRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ExemplesFormCrudUpdateController extends AbstractController
{
    #[Route('/liste/livres', name: 'liste_livres')]
    public function listeLivres(LivreRepository $rep): Response
    {
        $livres = $rep->findAll();
        $vars = ['livres' => $livres];
        return $this->render('exemples_form_crud_update/liste_livres.html.twig', $vars);
    }


    #[Route('/livre/update/{id}', name: 'livre_update')]
    public function listeUpdate(Livre $livre, ManagerRegistry $doctrine, Request $req): Response
    {
        // il suffit d'envoyer l'id dans l'URL et d'injecter un objet Livre.
        // Symfony (ParamConverter) obtient le repo et fait un findBy (id)

        // $livre = new Livre(); cette fois notre entité n'est pas vide. On la reçcoit pour pré-remplir le form

        // 2. Création du formulaire du type souhaité (pas 'affichage'!)
        // pour héberger les données de l'entité
        $formulaireLivre = $this->createForm(
            LivreType::class,
            $livre // voici le pré-remplissage
        );

        // 3. Analyse de l'objet Request du navigateur, remplissage de l'entité
        $formulaireLivre->handleRequest($req);

        // 4. Vérification: handleRequest indique qu'on vient d'un submit ou pas? Si on vient d'un submit, handleRequest remplira les données de l'entité avec les données du $_POST (ou $_GET, selon le type de form). Cet état sera enregistré dans l'objet formulaire, et isSubmitted renverra TRUE

        // si submit et données valides, on entre dans l'if. Les données sont toujours valides si on n'a pas mis des regles de validation (notre cas)
        if ($formulaireLivre->isSubmitted() && $formulaireLivre->isValid()) {
            // on peut toujours accèder aux données du form à la main
            // (utile quand le form contient plus ou moins de champs que l'entité)
            // $data = $formulaireLivre->getData(); 

            // On va faire un CRUD pour mettre à jour l'entité, puis une rédirection à la liste de Livres
            $em = $doctrine->getManager();
            $em->persist($livre);
            $em->flush();

            return $this->redirectToRoute('liste_livres');


            // return $this->render(
            //     '/exemples_formulaires_traitement/traitement_formulaire_livre.html.twig',
            //     ['livre' => $livre]
            // );
        }
        // si votre formulaire n'est pas correct, vous n'entrerez pas dans l'if précédent
        // afficher les possibles erreurs en utilisant dd ($form->getErrors())

        // si non, on doit juste faire le rendu du formulaire
        else {
            return $this->render(
                '/exemples_formulaires_traitement/affichage_formulaire_livre.html.twig',
                ['formulaireLivre' => $formulaireLivre->createView()]
            );
        }
    }
}

