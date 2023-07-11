<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Livre;
use App\Entity\Exemplaire;
use App\Entity\Client;
use App\Entity\Adresse;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

class ExemplesCascadeController extends AbstractController
{
    #[Route("/exemples/cascade/exemple/sans/encapsulation")]
    public function exempleSansEncapsulation(ManagerRegistry $doctrine){

        $em = $doctrine->getManager();
        // on crée un livre
        $livre = new Livre();
        $livre->setTitre("Confesión de un asesino");
        $livre->setPrix(20);
        $livre->setDescription("Roman");
        $livre->setDatePublication(new \DateTime("1968:10:10 00:00:00"));
        $livre->setIsbn("234234234234");
        // on crée deux exemplaires de ce Livre
        $exemplaire1 = new Exemplaire();
        $exemplaire1->setEtat("tache de chocolat");
        $exemplaire2 = new Exemplaire();
        $exemplaire2->setEtat("très vieux");
        $livre->addExemplaire($exemplaire1);
        $livre->addExemplaire($exemplaire2);

        // Observez que l'exemplaire fait référence à son livre 
        // grâce au code généré par l'assistant dans "addExemplaire"
        // car on a choisi de créer une association bidirectionnelle!

        //dump ($exemplaire1->getLivre());
        //die();

        // nous n'avons pas besoin d'indiquer nous-mêmes qui est 
        // le livre de chaque exemplaire! (lien one-to-many)
        // Observez le code de addExemplaire pour comprendre la raison

        // $exemplaire1->setLivre($livre);   // pas besoin
        // $exemplaire2->setLivre($livre);   // pas besoin

        // $em->persist ($exemplaire1);
        // $em->persist ($exemplaire2);

        $em->persist($livre);
        $em->flush();

        return $this->render("exemples_cascade/exemple_sans_encapsulation.html.twig");
    }


    // exercice 1: provoquer la suppression en cascade des exemplaires d'un livre
    // Il faut rajouter "cascade-remove" dans l'entité
    #[Route("/exemples/cascade/exercice/cascade/remove")]
    public function exerciceCascadeRemove(ManagerRegistry $doctrine)
    {

        // d'abord on va créer un livre et deux exemplaires et on va les 
        // insérer

        $em = $doctrine->getManager();
        // on crée un livre
        $livre = new Livre();
        $livre->setTitre("Livre Exercice");
        $livre->setPrix(20);
        $livre->setDescription("Roman");
        $livre->setDatePublication(new \DateTime("1968:10:10 00:00:00"));
        $livre->setIsbn("31512512532135");
        // on crée deux exemplaires de ce Livre
        $exemplaire1 = new Exemplaire();
        $exemplaire1->setEtat("tache de chocolat");
        $exemplaire2 = new Exemplaire();
        $exemplaire2->setEtat("très vieux");
        $livre->addExemplaire($exemplaire1);
        $livre->addExemplaire($exemplaire2);

        // on stocke les livres
        $em->persist($livre);
        $em->flush();

        // maintenant on va obtenir le livre de la BD et l'effacer
        // ses exemplaires dévraient être effacés car on a rajouté
        // "remove" dans la propriété "cascade" dans l'association:
        // @ORM\OneToMany(targetEntity=Exemplaire::class, mappedBy="livre",cascade={"persist","remove"})

        $rep = $em->getRepository(Livre::class);
        $livre = $rep->findOneBy(array("titre" => "Livre Exercice"));
        $em->remove($livre);
        $em->flush();

        return $this->render("exemples_cascade/exercice_cascade_remove.html.twig");
    }

    // exercice 2    
    #[Route("/exemples/cascade/exercice/rajout/clients/adresse")]
    public function exerciceRajoutClientsAdresse(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        // on a édité les constructeurs et rajouté hydrate
        // dans Client et Adresse
        $client1 = new Client([
            "nom" => "Martin",
            "prenom" => "Loulou",
            "email" => "lou@skynet.com"
        ]);
        $client2 = new Client([
            "nom" => "Martin",
            "prenom" => "Marie",
            "email" => "mar@fastnet.com"
        ]);

        $adresse = new Adresse([
            "rue" => "Rue de la Sardine",
            "numero" => 33,
            "codePostal" => 1200,
            "ville" => "Bruxelles",
            "pays" => "Belgique"
        ]);
        

        // Si on utilise cette méthode, on doit rajouter cascade="persist"
        // dans Adresse pour que les Clients soient aussi insérés dans la BD
        // quand on fait flush (c'est l'équivalent Livre-Exemplaire)

        $adresse->addClient($client1);
        $adresse->addClient($client2);
        
        $em->persist($adresse);

        // Autre méthode: on affecte en partant du côté plusieurs
        // et on rajouté cascade="persist" dans Client. 
        // l'adresse sera crée dans la BD aussi quand on fera flush()

        // Limitation: setAdresse du Client (set dans une entité du côté 'n') 
        // ne rajoute pas le propre Client ($client1) dans la liste de l'objet côté 1 ($adresse)
        // En général:
        // Le set dans une entité du côté 'n' ne rajoute pas l'entité du côté 1 à sa liste
        // à la liste du côté 1 ($adresse)  
        // $client1->setAdresse($adresse);
        // $client2->setAdresse($adresse);
        // $em->persist($client1);
        // $em->persist($client2);

        $em->flush();
        // on va s'épargner la vue...
        return new Response("Tout ok, révisez la BD");
    }


    // exercice 3
    #[Route("/exemples/cascade/exercice/effacer/clients/adresse")]
    public function exerciceEffacerClientsAdresse(ManagerRegistry $doctrine)
    {
        // on va rajouter deux clients et une adresse pour les 
        // obtenir et les supprimer après

        $em = $doctrine->getManager();
        // on a édité le constructeur et rajouté une méthode hydrate
        // dans Client
        $client1 = new Client(array(
            "nom" => "Mehidi",
            "prenom" => "Salima",
            "email" => "salima@skynet.com"
        ));
        $client2 = new Client(array(
            "nom" => "Mehidi",
            "prenom" => "Hinde",
            "email" => "hinde@fastnet.com"
        ));

        $adresse = new Adresse(array(
            "rue" => "Rue de la Musique",
            "numero" => 99,
            "codePostal" => 2080,
            "ville" => "Namur",
            "pays" => "Belgique"
        ));

        // Si on utilise cette méthode, on doit rajouter cascade="persist"
        // dans Adresse
        $adresse->addClient($client1);
        $adresse->addClient($client2);


        $em->persist($adresse);
        $em->flush();

        
        // on cherche un de clients. On veut l'effacer ainsi que son 
        // adresse mais on ne pourra pas car l'adresse est partagée
        // par plusieurs clients. 

        $clientRecherche1 = $em->getRepository(Client::class)
            ->findOneBy(array("email" => "salima@skynet.com"));

        $em->remove($clientRecherche1);

        $clientRecherche2 = $em->getRepository(Client::class)
            ->findOneBy(array("email" => "hinde@fastnet.com"));

        $em->remove($clientRecherche2);

        $em->flush();


        // Ce code ne fonctionnera pas pour effacer l'adresse: 
        // Doctrine n'efface pas le côté One
        // même si on indique "remove" dans la cascade de côté Many
        // On peut effacer l'adresse à la main ensuite:
        $em->remove($adresse);
        $em->flush();


        // on va s'épargner la vue...
        return new Response("Tout ok, révisez la BD");
    }
}
