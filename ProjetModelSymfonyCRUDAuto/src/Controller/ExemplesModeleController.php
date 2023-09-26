<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Livre;
use App\Entity\Exemplaire;
use App\Entity\Client;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

use function PHPSTORM_META\map;

class ExemplesModeleController extends AbstractController
{


    // INSERT
    #[Route("exemples/modele/exemple/insert")]
    public function exempleInsert(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();

        // créer l'objet
        $livre = new Livre();
        $livre->setTitre("Guerre et paix");
        $livre->setDatePublication(new \DateTime("1865-1-1"));
        $livre->setPrix(20);
        $livre->setDescription(" l’histoire de la Russie à l’époque de Napoléon Ier, notamment la campagne de Russie en 1812. Léon Tolstoï y développe une théorie fataliste de l’histoire, où le libre arbitre n’a qu’une importance mineure et où tous les événements n’obéissent qu’à un déterminisme historique inéluctable. ");
        $livre->setIsbn("2131231123");
        // lier l'objet avec la BD
        $em->persist($livre);
        // écrire l'objet dans la BD
        $em->flush();

        return $this->render("exemples_modele/exemple_insert.html.twig");
    }

    #[Route("/exemples/modele/exemple/find/one/by")]
    public function exempleFindOneBy(ManagerRegistry $doctrine)
    {
        // obtenir le entity manager
        $em = $doctrine->getManager();
        // obtenir le repository
        $rep = $em->getRepository(Livre::class);

        // on obtient l'objet, le filtre est envoyé sous la forme d'un array
        // (on peut rajouter de clés qui provoqueront an AND)
        $livre = $rep->findOneBy([
            'titre' => 'Guerre et paix',
            'prix' => 20
        ]);

        // on stocke le résultat dans un array associatif 
        // pour l'envoyer à la vue comme d'habitude
        $vars = ['unLivre' => $livre];

        // on renvoie l'objet à la vue, rien ne change ici
        return $this->render("exemples_modele/exemple_find_one_by.html.twig", $vars);
    }




    // SELECT: find (chercher par id)
    #[Route("exemples/modele/exemple/find")]
    public function exempleFind(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();

        $rep = $em->getRepository(Livre::class);

        $livre = $rep->find(1);
        $vars = ['unLivre' => $livre];
        return $this->render("exemples_modele/exemple_find.html.twig", $vars);
    }


    // SELECT: findBy (chercher par un ou plusieurs champs, filtre array)
    #[Route("exemples/modele/exemple/find/by")]
    public function exempleFindBy(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();

        $rep = $em->getRepository(Livre::class);

        // notez que findBy renverra toujours un array même s'il trouve 
        // qu'un objet
        $livres = $rep->findBy(['prix' => 20]);
        $vars = ['livres' => $livres];
        return $this->render("exemples_modele/exemple_find_by.html.twig", $vars);
    }


    

    // SELECT: findAll (chercher par un ou plusieurs champs, filtre array)
    #[Route("exemples/modele/exemple/find/all")]
    public function exempleFindAll(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();

        $rep = $em->getRepository(Livre::class);

        // notez que findBy renverra toujours un array même s'il trouve 
        // qu'un objet
        $livres = $rep->findAll();
        $vars = ['livres' => $livres];

        return $this->render("exemples_modele/exemple_find_all.html.twig", $vars);
    }


    // EXEMPLE UTILISATION HYDRATE 
    #[Route("exemples/modele/exemple/hydrate")]
    public function exempleHydrate(ManagerRegistry $doctrine)
    {
        $livre = new Livre([
            'titre' => 'Lalala',
            'prix' => 40,
            'description' => 'Blablablabalablablablabla'
        ]);
        dump ($livre);
        // changer deux propriétés
        $livre->hydrate(['titre' => 'Lolololo',
                        'prix' => 10]);
        dd($livre);
    }


    
    // UPDATE (attention à avoir une copie de la BD originale!)
    #[Route("exemples/modele/exemple/update")]
    public function exempleUpdate(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();

        // on obtient d'abord un livre
        $unLivre = $em->getRepository(Livre::class)->findOneBy(array("titre" => "Guerre et paix"));

        $unLivre->setTitre("Toto est content");
        // pas besoin de persist 
        // quand on obtient un objet de la BD
        // $em->persist ($unLivre); 
        $em->flush();
        return $this->render("exemples_modele/exemple_update.html.twig");
    }

    // DELETE (attention!!!)
    #[Route("exemples/modele/exemple/delete")]
    public function exempleDelete(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();

        $unLivre = $em->getRepository(Livre::class)->findOneBy(array("titre" => "Toto est content"));
        // pas besoin de persist
        // quand on obtient un objet de la BD il se trouvera déjà dans la unit of work 
        // $em->persist ($unLivre); 
        $em->remove($unLivre);
        $em->flush();
        return $this->render("exemples_modele/exemple_delete.html.twig");
    }


    // Clear
    #[Route("/exemples/modele/exemple/clear")]
    public function exempleClear(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();

        $livre = $em->getRepository(Livre::class)->findOneBy(array("titre" => "Moby Dick"));
        $livre->setTitre("Totorito");
        $em->clear();
        // ce flush ne fera rien, les entités on été enlevées de l'unité du travail
        $em->flush();

        return $this->render("exemples_modele/exemple_clear.html.twig");
    }



    // Refresh
    #[Route("/exemples/modele/exemple/refresh")]
    public function exempleRefresh(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();

        $unLivre = $em->getRepository(Livre::class)->findOneBy(array("titre" => "Guerre et paix"));
        // on modifie le Livre obtenu de la BD
        $unLivre->setTitre("La vie est belle");
        // on affiche le livre après la modification (domaine objets)
        dump($unLivre);

        // recharge le livre de la BD, il y aura le titre original
        $em->refresh($unLivre);

        // de-commentez cette ligne pour vérifier que l'objet a à nouveau le titre original
        dd($unLivre); // dd est dump and die!

        $em->persist($unLivre);
        // rien ne change dans la BD
        $em->flush();
        return $this->render("exemples_modele/exemple_refresh.html.twig");
    }


    // exemple de findOneBy. Pour créer le filtre de recherche
    // on utilise le hydrate (il faut le créer dans l'entity!)
    #[Route("/exemples/modele/exemple/update/hydrate")]
    public function exempleUpdateHydrate(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();


        $rep = $em->getRepository(Livre::class);
        $livre = $rep->findOneBy(['titre' => 'Guerre et paix']);

        // on ne fera pas plein de sets
        // $livre->setPrix (60);
        // $livre->setTitre ("The Shining");
        // $livre->setTitre ("43524352435");
        $livre->hydrate([
            'titre' => 'The Shining',
            'ISBN' => '5050505050'
        ]);

        $em->flush();

        return new Response("objet modifié (s'il existe!)");
    }


    // INSERT d'un objet crée avec hydrate. On s'épargne les sets!
    #[Route("/exemples/modele/exemple/insert/hydrate")]
    public function exempleInsertHydrate(ManagerRegistry $doctrine)
    {
        $livre = new Livre([
            'titre' => 'Les misérables',
            'prix' => 80,
            'description' => 'nananana',
            'ISBN' => '33243234234',
            'datePublication' => new \DateTime("2000/2/20")
        ]);
        $em = $doctrine->getManager();

        $em->persist($livre);
        $em->flush();

        return new Response("insert ok hydrate");
    }

    // exercices: attention car de données doivent exister dans la BD (importez les fichiers dans /Entity/sql ou créez vos propres données)

    #[Route('/exemples/modele/exercice1')]
    public function exercice1(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();

        $rep = $em->getRepository(Livre::class);

        $livre = $rep->findOneBy([
            'titre' => 'Moby Dick',
            'prix' => 20
        ]);
        // SELECT * FROM Livre WHERE titre = "Moby Dick" AND prix = 20

        $vars = [
            'livre' => $livre
        ];
        return $this->render('exemples_modele/exercice_1.html.twig', $vars);
    }


    #[Route('/exemples/modele/exercice2')]
    public function exercice2(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();

        $rep = $em->getRepository(Client::class);

        $arrClients = $rep->findAll();
        $vars = ['arrClients' => $arrClients];
        return $this->render('exemples_modele/exercice_2.html.twig', $vars);
    }



    #[Route('/exemples/modele/exercice3')]
    public function exercice3(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();

        $rep = $em->getRepository(Client::class);

        $arrClients = $rep->findBy([
            'nom' => 'Lipowska',
            'prenom' => 'Joanna'
        ]);
        $vars = ['arrClients' => $arrClients];
        return $this->render('exemples_modele/exercice_3.html.twig', $vars);
    }

    #[Route('/exemples/modele/exercice4')]
    public function exercice4(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();

        $rep = $em->getRepository(Client::class);

        $client = $rep->find(3);
        $vars = ['client' => $client];
        return $this->render('exemples_modele/exercice_4.html.twig', $vars);
    }
}
