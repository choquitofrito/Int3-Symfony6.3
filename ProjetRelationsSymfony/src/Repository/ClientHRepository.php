<?php

namespace App\Repository;

use App\Entity\ClientH;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClientH|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClientH|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClientH[]    findAll()
 * @method ClientH[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientHRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClientH::class);
    }

    // /**
    //  * @return ClientH[] Returns an array of ClientH objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ClientH
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
