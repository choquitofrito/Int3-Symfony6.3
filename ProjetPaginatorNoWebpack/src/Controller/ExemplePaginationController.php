<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Livre;

class ExemplePaginationController extends AbstractController {

    #[Route("/exemple/pagination", name:"exemple_pagination")]
    public function exemplePagination(PaginatorInterface $paginator, Request $request)
    {

        $livres = $this->getDoctrine()->getRepository(Livre::class)->findAll();
        
        // Cette méthode est plus rapide que findAll
        // $livres = $this->getDoctrine()->getRepository(Livre::class)->createQueryBuilder('l')->getQuery();

        $numeroPage = $request->query->getInt('page', 1); // 1 par défaut, s'il n'y a pas de page dans l'URL

        $paginationLivres = $paginator->paginate(
            $livres,
            $numeroPage,
            5 // résultats affichés par page
        );
        return $this->render(
            'exemple_pagination/exemple_pagination.html.twig',
            ['paginationLivres' => $paginationLivres]
        );
    }
}