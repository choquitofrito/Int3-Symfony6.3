<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ContactsController extends AbstractController
{

    #[Route("/contacts/afficher/tous")]
    public function afficherTous()
    {
        $noms = [
            'Lucy', 'Juan', 'Salima', 'Mar', 'Lupita',
            'Marie'
        ];
        $strNoms = implode(",", $noms);
        return new Response($strNoms);
    }

    #[Route("/contacts/message/response")]
    public function messageResponse()
    {
        $contenu = "<h1>Je vais être le contenu d'un objet
        Response</h1>";
        $reponse = new Response();
        $reponse->setExpires(new \DateTime('2025/3/8'));
        $reponse->headers->set('Content-Type', 'text/html');
        $reponse->setContent($contenu);
        return $reponse;
    }

    // L'objet Request rajouté dans la signature de l'action contiendra les données
    // de la requête faite au serveur. En ce qui nous concerne maintenant,il 
    // contiendra les valeurs des paramètres de l'URL.
    #[Route("/contacts/message/request/{prenom}/{profession}")]
    public function messageRequest(Request $objetRequest)
    {
        echo "Je suis dans le controller, action 'afficher'";
        // on obtient les valeurs des paramètres de l'url,
        // on fait appel à la méthode get de l'objet Request
        $lePrenom = $objetRequest->get("prenom");
        $laProfession = $objetRequest->get("profession");
        return new Response("<br>Le prénom dans l'URL est:" . $lePrenom . "<br>La profession dans l'URL est:" . $laProfession);
    }
}
