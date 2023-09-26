<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ClientH;
use App\Entity\AuteurH;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;


class ExemplesHeritageController extends AbstractController
{

    #[Route("/exemples/heritage/inserer/client/auteur")]
    public function insererClientAuteur(ManagerRegistry $doctrine){
        $em = $doctrine->getManager();

        // créer l'objet
        $client = new ClientH();
        $client->setNom("López");
        $client->setPrenom("Jean");
        $client->setEmail ("jean.lopez@lala.de");
        $client->setNumero(200);
        $auteur = new AuteurH();
        $auteur->setNom("Lucas");
        $auteur->setPrenom("George");
        $auteur->setNationalite("USA");
        
        // lier les objets avec la BD
        $em->persist($client);
        $em->persist($auteur);
        
        // écrire les objets dans la BD
        $em->flush();
        return new Response ("Ok, objets insérés");
    }
}
