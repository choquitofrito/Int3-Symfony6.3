<?php

namespace App\Controller;

use App\Entity\Pays;
use App\Form\PaysType;
use App\Service\ImageHelper;
use App\Service\UploadHelper;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UploadAsyncController extends AbstractController
{



    // action pour uploader une image et la traiter en utilisant messenger
    // Le traitement de l'image se fait de façon asynchrone (ASYNC). 
    #[Route("/upload/async")]
    public function uploadAsync(Request $request, ManagerRegistry $doctrine, UploadHelper $uploader, ImageHelper $imageHelper)
    {
        $pays = new Pays();

        $formulairePays = $this->createForm(PaysType::class, $pays);
        $formulairePays->handleRequest($request);

        if ($formulairePays->isSubmitted() && $formulairePays->isValid()) {

            $fichier = $formulairePays['image']->getData();
            if ($fichier) {
                $nomFichierServeur = $uploader->uploadImage($fichier);
                $pays->setImage($nomFichierServeur);
            }

            // on a l'image et on va changer sa taille dans le disque: on appelle le service 
            // ImageHelper qui, à son tour, envoie un message à ResizeImageHandler
            $imageHelper->resize($nomFichierServeur, 30,30);


            $em = $doctrine->getManager();
            $em->persist($pays);  // pas besoin
            $em->flush();
            return new Response("Entité mise à jour dans la BD. Si le fichier a été selectionné, upload ok!");
        } else {
            return $this->render(
                "/upload_async/affichage_form_upload.html.twig",
                ['formulaire' => $formulairePays->createView()]
            );
        }
    }
}
