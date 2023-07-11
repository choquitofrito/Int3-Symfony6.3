<?php

namespace App\Repository;

use App\Entity\PersonneMMA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PersonneMMA|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonneMMA|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonneMMA[]    findAll()
 * @method PersonneMMA[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonneMMARepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonneMMA::class);
    }

    // /**
    //  * @return PersonneMMA[] Returns an array of PersonneMMA objects
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
    public function findOneBySomeField($value): ?PersonneMMA
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
