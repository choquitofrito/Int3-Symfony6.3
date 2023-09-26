<?php

namespace App\Repository;

use App\Entity\PersonneH;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PersonneH|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonneH|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonneH[]    findAll()
 * @method PersonneH[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonneHRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonneH::class);
    }

    // /**
    //  * @return PersonneH[] Returns an array of PersonneH objects
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
    public function findOneBySomeField($value): ?PersonneH
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
