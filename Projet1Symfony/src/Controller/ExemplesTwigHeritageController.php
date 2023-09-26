<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ExemplesTwigHeritageController extends AbstractController
{
    #[Route("/exemples/twig/heritage/contenu1/master/page1")]
    public function contenu1MasterPage1()
    {
        return $this->render('exemples_twig_heritage/contenu_1_master_page_1.html.twig');
    }

    #[Route("/exemples/twig/heritage/contenu2/master/page1")]
    public function contenu2MasterPage1()
    {
        return $this->render('exemples_twig_heritage/contenu_2_master_page_1.html.twig');
    }

    #[Route("/exemples/twig/heritage/contenu1/master/page2")]
    public function contenu1MasterPage2()
    {
        return $this->render('exemples_twig_heritage/contenu_1_master_page_2.html.twig');
    }

    #[Route("/exemples/twig/heritage/contenu2/master/page2")]
    public function contenu2MasterPage2()
    {
        return $this->render('exemples_twig_heritage/contenu_2_master_page_2.html.twig');
    }

    #[Route("/exemples/twig/heritage/exercice/livre", name: "exerciceLivre")]
    public function exerciceLivre()
    {
        return $this->render('exemples_twig_heritage/exercice_livre.html.twig', ['livre' => [
            'titre' => 'Otello',
            'auteur' => 'Shakespeare'
        ]]);
    }
}
