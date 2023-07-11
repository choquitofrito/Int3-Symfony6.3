<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Livre;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use DoctrineExtensions\Query\Mysql\Month;


class ExemplesDqlController extends AbstractController
{
    
    // Exemple de SELECT uniquement des titres des livres 
    // qui coutent plus de 15 euros en DQL, 
    // on obtient un array de strings, pas d'objets 

    #[Route ("/exemples/dql/exemple/select/array/arrays")]
    public function exempleSelectArrayArrays (ManagerRegistry $doctrine){
        $em= $doctrine->getManager();
        $query = $em->createQuery ("SELECT livre.titre, livre.prix FROM App\Entity\Livre livre ".
                                "WHERE livre.prix>15");
        $resultat = $query->getResult();
        $vars = ['livres'=> $resultat];
        return $this->render ("exemples_dql/exemple_select_array_arrays.html.twig", $vars);
    }
    
    
    
    // SELECT des Livres complets en DQL, 
    // on obtient un array d'objets! 
    
    #[Route ("/exemples/dql/exemple/select/array/objets")]
    public function exempleSelectArrayObjets (ManagerRegistry $doctrine){
        $em= $doctrine->getManager();
        // avec cette requête on obtient un array d'objets
        $query = $em->createQuery ('SELECT livre FROM App\Entity\Livre livre WHERE livre.prix >15');
        $resultat = $query->getResult();
        $vars = ['livres'=> $resultat];
        return $this->render ("exemples_dql/exemple_select_array_objets.html.twig", $vars);   
    }

    
    
    
    // Regular Join
    #[Route ("/exemples/dql/exemple/regular/join")]
    public function exempleRegularJoin(ManagerRegistry $doctrine){
        $em= $doctrine->getManager();
        $query = $em->createQuery ('SELECT livre FROM App\Entity\Livre livre JOIN '
                . 'livre.exemplaires exemplaires');
        $resultats = $query->getResult();
        // observez que les exemplaires sont vides
        $resultat = $query->getResult();
        // observez que les exemplaires sont remplis dans le dump de la vue
        $vars = ['livres'=> $resultat];
        return $this->render ("exemples_dql/exemple_regular_join.html.twig", $vars);
        
    }

    

    // Fetch Join
    #[Route ("/exemples/dql/exemple/fetch/join")]
    public function exempleFetchJoin(ManagerRegistry $doctrine){
        $em= $doctrine->getManager();
        // si on indique juste "SELECT livre" on obtient les objets de cette entité
        $query = $em->createQuery ('SELECT livre, exemplaires FROM App\Entity\Livre livre '
                . 'JOIN livre.exemplaires exemplaires');
        $resultat = $query->getResult();
        // observez que les exemplaires sont remplis dans le dump de la vue
        $vars = ['livres'=> $resultat];
        return $this->render ("exemples_dql/exemple_fetch_join.html.twig", $vars);
    }
    

    #[Route ("/exemples/dql/exemple/date")]
    public function exempleDate(ManagerRegistry $doctrine){
        $em= $doctrine->getManager();
        $query = $em->createQuery("SELECT MONTH(l.datePublication) AS mois, YEAR(l.datePublication) AS annee FROM App\Entity\Livre l");
        $resultat = $query->getResult();
        dd ($resultat);
    }


    // UPDATE
    #[Route ("/exemples/dql/exemple/update/{titre}")]
    public function exempleUpdate (Request $req,ManagerRegistry $doctrine){

        $em= $doctrine->getManager();
        $titre = $req->get('titre');

        $query = $em->createQuery ('UPDATE App\Entity\Livre l SET l.prix = l.prix - :montant WHERE l.titre = :titre');

        // pour simplifier on fixe ici le montant à déduire 
        $montant = 0.5; 
        
        $query->setParameter ('montant',$montant);
        $query->setParameter ('titre',$titre);
        $query->execute(); // pas getResult!
        return $this->render ("exemples_dql/exemple_update.html.twig"); 

    }

    


    
}
