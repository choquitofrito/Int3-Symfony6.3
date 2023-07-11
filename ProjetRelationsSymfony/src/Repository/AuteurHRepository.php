<?php

namespace App\Repository;

use App\Entity\AuteurH;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AuteurH|null find($id, $lockMode = null, $lockVersion = null)
 * @method AuteurH|null findOneBy(array $criteria, array $orderBy = null)
 * @method AuteurH[]    findAll()
 * @method AuteurH[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuteurHRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AuteurH::class);
    }

    // /**
    //  * @return AuteurH[] Returns an array of AuteurH objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AuteurH
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
