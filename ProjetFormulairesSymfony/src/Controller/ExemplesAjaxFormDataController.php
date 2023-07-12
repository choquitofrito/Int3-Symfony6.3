<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

// entité Livre
use App\Entity\Livre;
// classe du formulaire
use App\Form\LivreType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Doctrine\Persistence\ManagerRegistry;

class ExemplesAjaxFormDataController extends AbstractController
{


    // exemple simple d'utilisation d'AJAX Vanilla sans promises
    #[Route("/exemples/ajax/form/data/exemple1/affichage")]
    public function exemple1Affichage()
    {
        return $this->render("/exemples_ajax_form_data/exemple1_affichage.html.twig");
    }

    #[Route("/exemples/ajax/form/data/exemple1/traitement")]
    // action qui traite la commande AJAX, elle n'a pas une vue associée
    public function exemple1Traitement(Request $requeteAjax)
    {
        $valeurNom = $requeteAjax->get('nom');
        $arrayReponse = ['message' => 'Bienvenu, ' . $valeurNom];
        return new JsonResponse($arrayReponse);
    }


    // exemple d'utilisation d'AJAX avec de blocs ("master page")
    #[Route ("/exemples/ajax/form/data/exemple1/affichage/master/page")]
    public function exemple1AffichageMasterPage()
    {
        return $this->render("/exemples_ajax_form_data/exemple1_affichage_master_page.html.twig");
    }

    #[Route ("/exemples/ajax/form/data/exemple1/traitement/master/page")]
    // action qui traite la commande AJAX, elle n'a pas une vue associée
    public function exemple1TraitementMasterPage(Request $requeteAjax)
    {
        $valeurNom = $requeteAjax->get('nom');
        $arrayReponse = ['message' => 'Bienvenu, ' . $valeurNom];
        return new JsonResponse($arrayReponse);
    }



    // exemple d'utilisation d'AJAX avec de blocs ("master page")
    // et fichier JS externe 
    #[Route ("/exemples/ajax/form/data/exemple1/affichage/master/page/script/externe")]
    public function exemple1AffichageMasterPageScriptExterne()
    {
        return $this->render("/exemples_ajax_form_data/exemple1_affichage_master_page_script_externe.html.twig");
    }

    // action qui traite la commande AJAX, elle n'a pas une vue associée

    
    /**
     * @Route ("/exemples/ajax/form/data/exemple1/traitement/master/page/script/externe", name= "exemple1_traitement_externe_ajax_form_data",options= {"expose"=true})
     */
    public function exemple1TraitementMasterPageScriptExterne(Request $requeteAjax)
    {
        $valeurNom = $requeteAjax->get('nom');
        $arrayReponse = ['leMessage' => 'Bienvenu, ' . $valeurNom];
        return new JsonResponse($arrayReponse);
    }
    //
    //    
    //    // AJAX avec des arrays d'objets
    //    //    
    //    //    
    //    
    //    /**
    //     * @Route ("/exemples/ajax/form/data/exemple/renvoi/entite");
    //     */
    //    
    //    // on affiche un input pour chercher les livres qui portent un titre
    //    public function exempleRenvoiEntite(){
    //        return $this->render ("/exemples/ajax/form/data/exemple_renvoi_entite.html.twig");
    //    }
    //    
    //    /**
    //     * @Route ("/exemples/ajax/form/data/exemple/renvoi/entite/traitement");
    //     */
    //    
    //    // action qui traite une commande AJAX, elle a une vue associée
    //    public function exempleRenvoiEntiteTraitementAjax (ManagerRegistry $doctrine,Request $requeteAjax){
    //        // on obtient ce qui se trouve dans l'input
    //        $titre = $requeteAjax->get ('titre');
    //        $em= $doctrine->getManager();
    //        $query = $em->createQuery ("SELECT livre FROM App\Entity\Livre livre WHERE".
    //                                " livre.titre LIKE :titre");
    //        $query->setParameter ('titre', '%'.$titre.'%');
    //        
    //        // $resultat = $query->getResult();
    //        // dump ($resultat);
    //        // die();
    // 
    //        // avec getResult() on obtient un array contenant toutes les entités Livre 
    //        // qui contiennent dans son titre le text saisi dans l'input
    //        // Chaque entité contient toutes ses propriétés et
    //        // les références à d'autres entités: JSON.parse ne pourra pas l'interpreter ...
    //       
    //        // ... mais si on change getResult par getArrayResult on recevra un array 
    //        // contenant (dans ce cas) la réprésentation d'array de chaque entité 
    //        // contenant uniquement les propriétés de base propres à l'objet 
    //        // (pas les "rélations" ni d'autres propriétés)
    //        $livreEnArray = $query->getArrayResult();
    //       
    //        // Pour mieux comprendre faites un dump ici et regardez la 
    //        // réponse du serveur. 
    //
    //        // dump ($resultat);
    //        // die();
    //
    //        // Notez que JSON.parse n'arrivera à interpreter la réponse si vous faites dump ou 
    //        // echo ici, car votre réponse ne sera plus du pur JSON
    //        // dump ($objetLivre);
    //        
    //        return new JsonResponse ($livreEnArray);
    //        
    //    }
    //
    //    



}
