<?php

namespace App\Controller;


use App\Entity\Cours;
use App\Entity\Inscription;
use App\Entity\Stagiaire;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExemplesCrudController extends AbstractController
{
    #[Route('/exemples/crud/insert/stagiaire', name: 'insert_stagiaire')]
    public function insertStagiaire(ManagerRegistry $doctrine): Response
    {

        $stagiaire1 = new Stagiaire([
            'nom' => 'Grace',
            'email' => 'gracedupont@gmail.com',
        ]); // faire le hydrate dans Entity/Stagiaire

        $em = $doctrine->getManager();
        $em->persist($stagiaire1);
        $em->flush();
        // on envoie l'entité à la vue, elle doit avoir un id
        $vars = ['stagiaire' => $stagiaire1];
        return $this->render('exemples_crud/insert_stagiaire.html.twig', $vars);
    }

    #[Route('/exemples/crud/insert/cours', name: 'insert_cours')]
    public function insertCours(ManagerRegistry $doctrine): Response
    {

        $cours1 = new Cours([
            'titre' => 'PHP',
            'description' => 'Le cours lourd',
        ]); // faire le hydrate dans Entity/Stagiaire

        $em = $doctrine->getManager();
        $em->persist($cours1);
        $em->flush();
        // on envoie l'entité à la vue, elle doit avoir un id
        $vars = ['cours' => $cours1];
        return $this->render('exemples_crud/insert_cours.html.twig', $vars);
    }

    #[Route('/exemples/crud/insert/inscription', name: 'insert_inscription')]
    public function insertInscription(ManagerRegistry $doctrine): Response
    {
        // créer deux Stagiaires
        $s1 = new Stagiaire([
            'nom' => 'Marwa',
            'email' => 'marwa@gmail.com'
        ]);
        $s2 = new Stagiaire([
            'nom' => 'Caro',
            'email' => 'caro@gmail.com'
        ]);
        // créer un Cours
        $c1 = new Cours([
            'titre' => 'JS',
            'description' => 'cours de JavaScript. Langage de programmation'
        ]);
        // créer deux objets Inscription
        $i1 = new Inscription(['dateInscription' => new \DateTime('2022/2/11')]);
        $i1->setStagiaire($s2);
        $i1->setCours($c1);

        $i2 = new Inscription(['dateInscription' => new \DateTime('2022/2/12')]);
        $i2->setStagiaire($s1);  // $s1->addInscription($i1);
        $i2->setCours($c1); // $c1->addInscription($i1);


        $em = $doctrine->getManager();
        $em->persist($s1);
        $em->persist($s2);
        $em->persist($c1);
        $em->persist($i1);
        $em->persist($i2);
        $em->flush();

        dd("regardez la BD");
    }


    // action qui obtient le stagiaire et le cours de la BD
    #[Route('/exemples/crud/insert/inscription/bd', name: 'insert_inscription_bd')]
    public function insertInscriptionBd(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();

        // 1. Obtenir une stagiaire de la BD (normalement on aurait un User dans la session)
        $repS = $em->getRepository(Stagiaire::class); // pour ne pas devoir écrire ("App\Entity\Stagiaire")
        $stagiaire = $repS->find(1); // cherche dans la BD le stagiaire ayant l'id 1
        dump($stagiaire);

        // 2. Obtenir un cours de la BD (normalement le cours est choisi avec l'interface par la personne qui est connectée)
        $repC = $em->getRepository(Cours::class);


        $arrayCours = $repC->findAll(); // cette fois on obtient (juste pour l'exemple) tous les cours. 
        $unCours = $arrayCours[rand(0, count($arrayCours) - 1)]; // On va prendre un cours au hasard
        dump($unCours);

        // 3. Créer une inscription
        $i1 = new Inscription(['dateInscription' => new \DateTime()]);
        $stagiaire->addInscription($i1);
        $unCours->addInscription($i1);
        dump ("Inscription sans ID, pas encore dans la BD");
        dump ($i1); 

        // 4. Persister et Stocker l'inscription
        $em->persist($i1);
        $em->flush();
        dump ($i1);
        
        dd();
    }
}
