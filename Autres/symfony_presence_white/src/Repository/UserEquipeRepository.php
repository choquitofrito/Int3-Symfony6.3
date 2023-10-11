<?php

namespace App\Repository;

use App\Entity\UserEquipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserEquipe>
 *
 * @method UserEquipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserEquipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserEquipe[]    findAll()
 * @method UserEquipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserEquipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserEquipe::class);
    }

//    /**
//     * @return UserEquipe[] Returns an array of UserEquipe objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UserEquipe
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
