<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadHelper
{
    private string $dossierUpload;

    public function __construct (string $dossierUpload){
        $this->dossierUpload = $dossierUpload;
    }

    public function uploadImage(UploadedFile $fichier): string
    {

        // obtenir un nom de fichier unique pour éviter les doublons dans le dossierUpload
        $nomFichierServeur = md5(uniqid()) . "." . $fichier->guessExtension();
        // stocker le fichier dans le serveur (on peut préciser encore plus le dossier)
        $fichier->move($this->dossierUpload . "/", $nomFichierServeur);
        return $nomFichierServeur;
    }

    

}
