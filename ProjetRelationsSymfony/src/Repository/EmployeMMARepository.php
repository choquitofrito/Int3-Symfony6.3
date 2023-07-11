<?php

namespace App\Repository;

use App\Entity\EmployeMMA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EmployeMMA|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmployeMMA|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmployeMMA[]    findAll()
 * @method EmployeMMA[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeMMARepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmployeMMA::class);
    }

    // /**
    //  * @return EmployeMMA[] Returns an array of EmployeMMA objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EmployeMMA
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
