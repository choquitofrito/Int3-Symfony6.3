<?php

namespace App\Controller;

use App\Entity\Livre;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseAxiosController extends AbstractController {



    #[Route('/afficher/nav')]
    public function afficherNav (){
        return $this->render ("base_axios/afficher_nav.html.twig");
    } 

    // on a une interfaz où on clique sur un bouton et on obtient 
    // la liste de Livres
    #[Route('/afficher/livres', 'lien1')]
    public function exempleGet (ManagerRegistry $doctrine){
        $em = $doctrine->getManager();
        $arrObjLivres = $em->getRepository(Livre::class)->findAll();
        dd($arrObjLivres);
    }


}