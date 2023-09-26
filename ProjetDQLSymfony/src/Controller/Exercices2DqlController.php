<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class Exercices2DqlController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    // Chercher de clients par email
    #[Route('/clients/par/email/{email}', name: 'clients_by_email')]
    public function clientsByEmail($email)
    {
        $query = $this->entityManager->createQuery(
            'SELECT c FROM App\Entity\Client c WHERE c.email = :email'
        );
        $query->setParameter('email', $email);

        dd($query->getResult());
    }

    // Compter le nombre d'emprunts d'un client
    #[Route('/total/emprunts/{clientId}', name: 'emprunts_count')]
    public function empruntsCount($clientId)
    {
        $query = $this->entityManager->createQuery(
            'SELECT COUNT(e) FROM App\Entity\Emprunt e WHERE e.client = :clientId'
        );
        $query->setParameter('clientId', $clientId);

        dd($query->getSingleScalarResult());
    }

    #[Route('/livres/{minPages}/{maxPages}', name: 'livres_par_pages')]
    public function livresByPages($minPages, $maxPages)
    {
        $query = $this->entityManager->createQuery(
            'SELECT l FROM App\Entity\Livre l
            WHERE l.nombrePages BETWEEN :minPages AND :maxPages'
        );
        $query->setParameter('minPages', $minPages);
        $query->setParameter('maxPages', $maxPages);

        dd($query->getResult());
    }

    #[Route('/emprunts-by-date/{date}', name: 'emprunts_par_date')]
    public function empruntsByDate($date)
    {
        $query = $this->entityManager->createQuery(
            'SELECT e FROM App\Entity\Emprunt e WHERE e.dateEmprunt = :date'
        );
        $query->setParameter('date', $date);

        dd($query->getResult());
    }


    #[Route('/emprunts-overdue', name: 'emprunts_overdue')]
    public function empruntsOverdue()
    {
        $query = $this->entityManager->createQuery(
            'SELECT e FROM App\Entity\Emprunt e
            WHERE e.dateRetourPrevu < CURRENT_DATE()'
        );

        dd($query->getResult());
    }


}
