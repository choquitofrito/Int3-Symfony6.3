<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Pays;
use App\Form\PaysType;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;

// on doit inclure le service pour pouvoir l'utiliser
use App\Service\UploadHelper;

class ExemplesFormulaireUploadController extends AbstractController
{
    #[Route("/exemples/formulaire/upload/exemple")]
    public function upload(Request $request, ManagerRegistry $doctrine)
    {
        // créer une nouvelle entité vide
        $pays = new Pays();
        // créer un formulaire associé à cette entité
        $formulairePays = $this->createForm(PaysType::class, $pays);
        // gérer la requête (et hydrater l'entité)
        $formulairePays->handleRequest($request);
        // vérifier que le formulaire a été envoyé (isSubmitted) et que les données sont valides
        if ($formulairePays->isSubmitted() && $formulairePays->isValid()) {
            // obtenir le fichier à la main
            $fichier = $formulairePays['image']->getData();

            $dossier = $this->getParameter('kernel.project_dir') . '/public/dossierFichiers';

            if ($fichier) {
                // obtenir un nom de fichier unique pour éviter les doublons dans le dossier
                $nomFichierServeur = md5(uniqid()) . "." . $fichier->guessExtension();
                // stocker le fichier dans le serveur (on peut indiquer un dossier)
                $fichier->move($dossier, $nomFichierServeur);
                // affecter le nom du fichier de l'entité. Ça sera le nom qu'on
                // aura dans la BD (un string, pas un objet UploadedFile cette fois)
                $pays->setImage($nomFichierServeur);
            }
            // stocker l'objet dans la BD, ou faire update
            $em = $doctrine->getManager();
            $em->persist($pays);
            $em->flush();
            return new Response("Entité mise à jour dans la BD. Si le fichier a été selectionné, upload ok!");
        } else {
            return $this->render(
                "/exemples_formulaires_upload/affichage.html.twig",
                ['formulaire' => $formulairePays->createView()]
            );
        }
    }

    #[Route("/exemples/formulaire/upload/avec/service/exemple")]
    public function uploadAvecService (Request $request, ManagerRegistry $doctrine, UploadHelper $uploader)
    {
        // créer une nouvelle entité vide. 
        // Cette action enregistre une nouvelle entité, mais on pourrait 
        // très bien l'utiliser pour faire update d'un pays.
        $pays = new Pays();
        // créer un formulaire associé à cette entité
        $formulairePays = $this->createForm(PaysType::class, $pays);
        // gérer la requête (et hydrater l'entité)
        $formulairePays->handleRequest($request);
        // vérifier que le formulaire a été envoyé (isSubmitted) et que les données sont valides
        if ($formulairePays->isSubmitted() && $formulairePays->isValid()) {
            // obtenir le fichier à la main
            $fichier = $formulairePays['image']->getData();


            if ($fichier) {
                // ici on utilise le Service
                $nomFichierServeur = $uploader->uploadImagePays($fichier);
                $pays->setImage($nomFichierServeur);
            }
            // stocker l'objet dans la BD, ou faire update
            $em = $doctrine->getManager();
            $em->persist($pays);
            $em->flush();
            return new Response("Entité mise à jour dans la BD. Si le fichier a été selectionné, upload ok!");
        } else {
            return $this->render(
                "/exemples_formulaires_upload/affichage.html.twig",
                ['formulaire' => $formulairePays->createView()]
            );
        }
    }


    #[Route("/exemples/formulaire/upload/avec/service/{id}/edit")]
    public function uploadAvecServiceEdit (Pays $pays, Request $request, ManagerRegistry $doctrine, UploadHelper $uploader)
    {
        // créer une nouvelle entité vide. 
        // pas besoin! on reçcoit l'entité à modifier
        // $pays = new Pays();

        // ParamConverter prend l'id de la route et obtient le Pays de la BD!

        // créer un formulaire associé à cette entité
        $formulairePays = $this->createForm(PaysType::class, $pays);
        // gérer la requête (et hydrater l'entité)
        $formulairePays->handleRequest($request);
        // vérifier que le formulaire a été envoyé (isSubmitted) et que les données sont valides
        if ($formulairePays->isSubmitted() && $formulairePays->isValid()) {
            // obtenir le fichier à la main
            $fichier = $formulairePays['image']->getData();


            if ($fichier) {
                $nomFichierServeur = $uploader->uploadImagePays($fichier);
                $pays->setImage($nomFichierServeur);
            }
            // stocker l'objet dans la BD, ou faire update
            $em = $doctrine->getManager();
            // $em->persist($pays);  // pas besoin
            $em->flush();
            return new Response("Entité mise à jour dans la BD. Si le fichier a été selectionné, upload ok!");
        } else {
            return $this->render(
                "/exemples_formulaires_upload/affichage.html.twig",
                ['formulaire' => $formulairePays->createView()]
            );
        }
    }
}
