<?php

namespace App\Repository;

use App\Entity\SupervisionMMA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SupervisionMMA|null find($id, $lockMode = null, $lockVersion = null)
 * @method SupervisionMMA|null findOneBy(array $criteria, array $orderBy = null)
 * @method SupervisionMMA[]    findAll()
 * @method SupervisionMMA[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SupervisionMMARepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SupervisionMMA::class);
    }

    // /**
    //  * @return SupervisionMMA[] Returns an array of SupervisionMMA objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SupervisionMMA
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
