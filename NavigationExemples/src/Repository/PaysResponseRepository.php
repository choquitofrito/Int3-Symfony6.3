<?php

namespace App\Repository;

use App\Entity\PaysResponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PaysResponse|null find($id, $lockMode = null, $lockVersion = null)
 * @method PaysResponse|null findOneBy(array $criteria, array $orderBy = null)
 * @method PaysResponse[]    findAll()
 * @method PaysResponse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaysResponseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PaysResponse::class);
    }

    // /**
    //  * @return PaysResponse[] Returns an array of PaysResponse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PaysResponse
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
