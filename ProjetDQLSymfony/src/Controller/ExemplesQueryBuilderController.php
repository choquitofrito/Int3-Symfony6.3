<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Livre;
use App\Entity\Client;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class ExemplesQueryBuilderController extends AbstractController
{
    
    #[Route ("/exemples/query/builder/utilise/repo/livres/entre/deux/prix/{prixMin}/{prixMax}")]
    public function utiliseRepoLivresEntreDeuxPrix (Request $req, ManagerRegistry $doctrine){
    
        $prixMin = $req->get("prixMin");
        $prixMax = $req->get("prixMax");
        
        $em = $doctrine->getManager();
        $livresRepo = $em->getRepository(Livre::class);
        $livres = $livresRepo->livresEntreDeuxPrixDQL($prixMin, $prixMax);
        dump ($livres);
        die();
        
        // return new Response .....
    }    

    #[Route ("/exemples/query/builder/trouver/client/par/mail/{email}")]
    public function trouverClientParMail(Request $req, ManagerRegistry $doctrine){
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Client::class);
        // on fait appel à la méthode du Repository
        $objetClient = $rep->getParEmail($req->get ("email"));
        // on affiche les données du Client, on a obtenu un objet
        dump ($objetClient);
        
        die ();
        // return new Response .....
    }  
}
