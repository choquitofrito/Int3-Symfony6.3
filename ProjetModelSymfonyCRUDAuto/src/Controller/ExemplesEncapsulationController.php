<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Livre;
use Doctrine\Persistence\ManagerRegistry;

class ExemplesEncapsulationController extends AbstractController
{
    /**
     * @Route("/exemples/encapsulation/rajouter/livre/exemplaires/encapsulation")
     */
    public function rajouterLivreExemplairesEncapsulation(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        // on crée un livre
        $livre = new Livre(['titre'=>"Currucucu Paloma",
                            'prix'=>20,
                            'datePublication' => new \DateTime("1968:10:10 00:00:00"),
                            'isbn'=>"321423142134"]);


        // on ne crée pas ici les exemplaires. On envoie les données 
        // necessaires pour créer les objets Exemplaire à la nouvelle méthode
        // de l'entité Livre
        // Cette méthode mettra à jour les deux côtés de la relation
        // car elle fait appel à addExemplaire
        $livre->addExemplaireNoClass("tache de chocolat", "15A");
        $livre->addExemplaireNoClass("très vieux", "13B");

        $em->persist($livre);
        $em->flush();
        return $this->render("exemples_encapsulation/rajouter_livre_exemplaires_encapsulation.html.twig");
    }
}
