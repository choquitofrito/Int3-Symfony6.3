<?php

namespace App\Controller;
use App\Entity\Equipe;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EquipeListController extends AbstractController
{   
    #[Route('/equipe/list/{id}', name: 'equipe_list')]
    public function listjoueurs(ManagerRegistry $doctrine, Request $req)
    {
        $em = $doctrine->getManager();

        // obtenir l'equipe qui correspond au paramètre nom
        $rep = $em->getRepository(Equipe::class);

        $equipe = $rep ->find($req->get('id'));

        //obtenir la liste des joueurs de l'equipe
        $listJoueurs = $equipe->getJoueurs();
        //dd($listJoueurs[0]);

        // afficher ds la vue la liste des joueurs
        $vars = ['listJoueurs' => $listJoueurs];

        return $this->render('equipe_list/index.html.twig', $vars);
    }
}
