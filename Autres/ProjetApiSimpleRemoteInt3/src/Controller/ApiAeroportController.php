<?php

namespace App\Controller;

use App\Repository\AeroportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/api', name: 'api')]
class ApiAeroportController extends AbstractController
{
    


    // créer les actions pour l'API
    // GET - Select all
    // GET + id - Select simple
    // POST - Insert
    // DELETE - Delete
    // PUT - Update entité complete
    // PATCH - Update partiel (un ou plusieurs champs de l'entité, on garde le reste de valeurs)


    #[Route('/aeroports', name: 'app_api_aeroports', methods: ['GET'])]
    public function getAll(AeroportRepository $rep): Response
    {

        $aeroports = $rep->findAll();

        $res = [];
        foreach ($aeroports as $aeroport) {
            // normalization à la main (on aurait pu utiliser une autre méthode)
            $res[] = [
                'nom' => $aeroport->getNom(),
                'code' => $aeroport->getCode(),
                'id' => $aeroport->getId()
            ];
        }
        return $this->json($res);
    }

    
}
