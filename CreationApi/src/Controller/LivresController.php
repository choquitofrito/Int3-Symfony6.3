<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Repository\LivreRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class LivresController extends AbstractController
{
    /**
     * @Route("/api/livre", name= "api_livre_index", methods= {"GET"})
     */

    // * @Goups("livre:read")
    public function index(LivreRepository $rep)
    {
        $livres = $rep->findAll();

        // $this->json est expliqué dans SerialisationController (projet NavigationExemples)
        $response = $this->json($livres, 200, [], ['groups' => 'livre:read']);

        return $response;
    }

    /**
     * @Route("/api/livre", name= "api_livre_enregistrer", methods= {"POST"})
     */
    public function enregistrer(Request $req, SerializerInterface $serializer, EntityManagerInterface $em, ValidatorInterface $validator)
    {

        try {
            $jsonParam = $req->getContent();
            $livre = $serializer->deserialize($jsonParam, Livre::class, 'json');

            $errors = $validator->validate($livre);
            if (count($errors) > 0) {
                return $this->json(
                    [
                        'errors'=> $errors
                    ],
                    400
                );
            }

            $em->persist($livre);
            $em->flush();
            return $this->json($livre, 201, [], ['groups' => 'livre:read']);
        } catch (NotEncodableValueException $e) {
            return $this->json(
                [
                    'status' => 400,
                    'message' => $e->getMessage()
                ],
                400
            );
        }
        // $response = $this->json($livres, 200, [], ['groups' => 'livre:read']);

        // return $response;
    }
}
