<?php

namespace App\Controller;

use App\Entity\Aeroport;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/api', name: 'api_')]
class AeroportController extends AbstractController
{

    // créer les actions pour l'API
    // GET - Select all
    // GET + id - Select simple
    // POST - Insert
    // DELETE - Delete
    // PUT - Update entité complete
    // PATCH - Update partiel (un ou plusieurs champs de l'entité, on garde le reste de valeurs)


    #[Route('/aeroports', name: 'aeroport_index', methods: ['GET'])]
    public function index(ManagerRegistry $doctrine): Response
    {

        $aeroports = $doctrine->getRepository(Aeroport::class)->findAll();
        $res = [];

        foreach ($aeroports as $aeroport) {
            $res[] = [
                'id' => $aeroport->getId(),
                'nom' => $aeroport->getNom(),
                'code' => $aeroport->getCode()
            ];
        }

        return $this->json($res); // renvoie code 200 par défaut
    }


    #[Route('/aeroport/{id}', name: 'aeroport_show', methods: ['GET'])]
    public function show(ManagerRegistry $doctrine, Request $req): Response
    {

        $id = $req->get('id');
        $aeroport = $doctrine->getRepository(Aeroport::class)->find($id);

        if (!$aeroport) {
            return $this->json("L'aéroport " . $id . " n'existe pas", 404);
        } else {
            $res = [
                'id' => $aeroport->getId(),
                'nom' => $aeroport->getNom(),
                'code' => $aeroport->getCode()
            ];
            return $this->json($res); // renvoie code 200 par défaut

        }
    }


    #[Route('/aeroport', name: 'aeroport_new', methods: ['POST'])]
    public function new(ManagerRegistry $doctrine, Request $req): Response
    {

        $em = $doctrine->getManager();
        $aeroport = new Aeroport();
        $aeroport->setNom($req->request->get('nom'));
        $aeroport->setCode($req->request->get('code'));
        $em->persist($aeroport);
        $em->flush();

        return $this->json("Aéroport crée"); // renvoie code 200 par défaut
    }

    // update
    #[Route('/aeroport/{id}', name: 'aeroport_edit', methods: ['PUT'])]
    public function edit(ManagerRegistry $doctrine, Request $req, int $id): Response
    {
        $em = $doctrine->getManager();
        $aeroport = $em->getRepository(Aeroport::class)->find($id);
        if (!$aeroport) {
            return $this->json("L'aéroport " . $id . " n'existe pas", 404);
        } else {
            if ($req->request->get('nom')) {
                $aeroport->setNom($req->request->get('nom'));
            }
            if ($req->request->get('code')) {
                $aeroport->setCode($req->request->get('code'));
            }
            $em->persist($aeroport);
            $em->flush();

            $res = [
                'id' => $aeroport->getId(),
                'nom' => $aeroport->getNom(),
                'code' => $aeroport->getCode()
            ];
            return $this->json($res);
        }
    }

    #[Route('/aeroport/{id}', name: 'aeroport_delete', methods: ['DELETE'])]
    public function delete(ManagerRegistry $doctrine, int $id): Response
    {
        $em = $doctrine->getManager();
        $aeroport = $em->getRepository(Aeroport::class)->find($id);
        if (!$aeroport) {
            return $this->json("L'aéroport " . $id . " n'existe pas", 404);
        } else {
            $em->remove($aeroport);
            $em->flush();
            return $this->json("L'aéroport " . $id . " a été effacé");
        }
    }
}
