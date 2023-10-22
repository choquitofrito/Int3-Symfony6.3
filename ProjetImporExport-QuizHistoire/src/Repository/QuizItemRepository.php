<?php

namespace App\Repository;

use App\Entity\QuizItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<QuizItem>
 *
 * @method QuizItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuizItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuizItem[]    findAll()
 * @method QuizItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuizItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuizItem::class);
    }

//    /**
//     * @return QuizItem[] Returns an array of QuizItem objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('q.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?QuizItem
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
