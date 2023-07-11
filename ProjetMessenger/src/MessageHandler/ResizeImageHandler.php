<?php


namespace App\MessageHandler;

use App\Message\ResizeImage;
use Intervention\Image\ImageManager;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;


// Annotation qui permet à Symfony de considérer cette class comme Handler
// Dans /config/packages/messenger.yaml on indique la correspondence entre 
// handlers y messages
#[AsMessageHandler]
class ResizeImageHandler {

    private $imageManager;

    // on injecte l'ImageManager
    public function __construct (ImageManager $imageManager){
        // librairie externe, on ne peux pas 
        // l'injecter sans le configurer
        $this->imageManager = $imageManager;

    }

    public function __invoke (ResizeImage $message){
        dump ("Path du fichier: " . $message->getPath()); // voir dans la console où vous avez lancé le worker
        // delai provoqué exprès
        sleep (10);
        // traitement de l'image
        $image = $this->imageManager->make ($message->getPath());
        $image->resize ($message->getWidth(), $message->getHeight());
        // enregistrer l'image sur le disque
        $image->save();
    }
}