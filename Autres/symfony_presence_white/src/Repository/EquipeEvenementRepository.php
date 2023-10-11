<?php

namespace App\Repository;

use App\Entity\EquipeEvenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EquipeEvenement>
 *
 * @method EquipeEvenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipeEvenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipeEvenement[]    findAll()
 * @method EquipeEvenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipeEvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipeEvenement::class);
    }

//    /**
//     * @return EquipeEvenement[] Returns an array of EquipeEvenement objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EquipeEvenement
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
