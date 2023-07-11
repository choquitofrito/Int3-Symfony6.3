<?php

namespace App\Repository;

use App\Entity\Livre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Livre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livre[]    findAll()
 * @method Livre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livre::class);
    }

    // DQL: obtenir les livres entre deux prix 
    public function livresEntreDeuxPrixDQL($pmin, $pmax)
    {
        $em = $this->getEntityManager();
        // avec cette requête on obtient un array
        $query = $em->createQuery('SELECT livre FROM App\Entity\Livre livre WHERE livre.prix >= :pmin AND ' .
            'livre.prix <= :pmax');
        $query->setParameter('pmin', $pmin);
        $query->setParameter('pmax', $pmax);
        $resultat = $query->getResult();
        // cette méthode renvoie le résultat de la requête
        return $resultat;
    }


    // QUERYBUILDER: obtenir les livres entre deux prix
    // obtenir les livres entre deux prix, version QueryBuilder
    public function getEntreDeuxPrix($min, $max)
    {
        $qb = $this->createQueryBuilder("u"); // u est un nom générique
        $query = $qb->select('u')
            ->where('u.prix >= :min')
            ->andWhere('u.prix <= :max')
            ->setParameter('min', $min)
            ->setParameter('max', $max)
            ->getQuery();
        $res = $query->getResult();
        //var_dump ($res);

        return $res;
    }

    // /**
    //  * @return Livre[] Returns an array of Livre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Livre
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
