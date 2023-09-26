<?php

namespace App\Service;

use App\Message\ResizeImage;
use Symfony\Component\Messenger\MessageBusInterface;

// ce service permet de changer la taille d'une image.
// l'image originale sera modifiée dans le disque
class ImageHelper {
    

    // on injecte le bus de messages auquel on enverra de messages
    private $messageBus;
    private $dossierUpload;
    
    
    public function __construct (MessageBusInterface $messageBus, string $dossierUpload){
        $this->dossierUpload = $dossierUpload;
        $this->messageBus = $messageBus;        
    }

    public function resize (string $path, int $width, int $height){
        // on envoie le message au bus. Le handler le traitera à son tour
        $this->messageBus->dispatch(new ResizeImage(
            $this->dossierUpload . "/" . $path, 
            $width, 
            $height));

    } 

}