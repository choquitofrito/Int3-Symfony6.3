<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\SearchLivrePrixType;
use App\Repository\LivreRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseAxiosController extends AbstractController
{



    #[Route('/')]
    public function afficherNav()
    {
        // on crée le formulaire juste pour l'afficher. 
        // Le traitement sera fait par une action AJAX
        $form = $this->createForm(SearchLivrePrixType::class);
        $vars = ['formulaire' => $form];

        return $this->render("base_axios/index.html.twig", $vars);
    }

    // on a une interfaz où on clique sur un lien et on obtient 
    // la liste de Livres
    #[Route('/afficher/livres', 'lien1')]
    public function exempleGet(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $arrObjLivres = $em->getRepository(Livre::class)->findAll();
        $vars = ['arrObjLivres' => $arrObjLivres];

        return $this->render('base_axios/afficher_livres.html.twig', $vars);
    }

    // action qui traite le click du btn_ajax1
    #[Route('/obtenir/message')]
    public function obtenirMessage()
    {

        return new JsonResponse("hello je suis l'action pour le btn1");
    }



    // action qui traite le click du btn_liste_livres
    #[Route('/obtenir/liste/livres')]
    public function obtenirListeLivres(ManagerRegistry $doctrine, SerializerInterface $serializer)
    {
        // obtenir quoi qui ce soit de la BD
        $em = $doctrine->getManager();
        $arrObjLivres = $em->getRepository(Livre::class)->findAll();
        

        // transformer en JSON ce que j'obtient. Attention à éviter les références circulaires
        $arrObjLivresJSON = $serializer->serialize(
            $arrObjLivres,
            'json',
            [AbstractNormalizer::IGNORED_ATTRIBUTES => ['exemplaires', 'auteurs']]
        );
       
        return new JsonResponse($arrObjLivresJSON);
    }


    // action pour afficher le détail d'un Livre (rien à voir avec AJAX)
    #[Route('/livre/detail/{id}')]
    public function afficheDetail (LivreRepository $rep, Request $req){

        $id = $req->get('id');
        $livre = $rep->find ($id);
        $vars = ['livre' => $livre];

        return $this->render ("base_axios/livre_detail.html.twig", $vars);
    }

    public function formLike (){
        // prendre l'id du Livre sur lequel on a fait like

        // obtenir Livre de la bd avec find ($id)
        // $user = $this->getUser(); 
        // $user->addLivreLikes ($livre)
        // persist 
        // flush
    }    

    

}
