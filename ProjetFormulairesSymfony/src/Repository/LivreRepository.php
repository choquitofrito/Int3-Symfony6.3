<?php

namespace App\Repository;

use App\Entity\Livre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Livre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livre[]    findAll()
 * @method Livre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livre::class);
    }

    // méthode propre: recherche par filtres
    public function rechercheLivresFiltres($filtres)
    {

        $em = $this->getEntityManager();

        $query = $em->createQuery (
                "SELECT l FROM App\Entity\Livre l WHERE 
                (l.titre LIKE :titre OR :titre IS NULL) AND 
                (l.prix >= :minPrix OR :minPrix IS NULL) AND
                (l.prix <= :maxPrix OR :maxPrix IS NULL)"
        );
        $query->setParameter("titre", "%" . $filtres['titre'] . "%");
        $query->setParameter("minPrix", $filtres['minPrix']);
        $query->setParameter("maxPrix", $filtres['maxPrix']);




        $res = $query->getResult();
        dd($res);
        return $res;
    }


    // /**
    //  * @return Livre[] Returns an array of Livre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Livre
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
