<?php

namespace App\Repository;

use App\Entity\Joeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Joeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Joeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Joeur[]    findAll()
 * @method Joeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JoeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Joeur::class);
    }

    // /**
    //  * @return Joeur[] Returns an array of Joeur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Joeur
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
