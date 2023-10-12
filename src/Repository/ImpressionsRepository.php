<?php

namespace App\Repository;

use App\Entity\Impressions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Impressions>
 *
 * @method Impressions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Impressions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Impressions[]    findAll()
 * @method Impressions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImpressionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Impressions::class);
    }

//    /**
//     * @return Impressions[] Returns an array of Impressions objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

public function getTotalpieces()
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getUserstpieces($user)
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->andWhere('i.utilisateur = :user_id')
            ->setParameter('user_id', $user->getId())
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getUsersmpieces($user)
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->andWhere('i.utilisateur = :user_id')
            ->andWhere('i.date >= :date')
            ->setParameter('user_id', $user->getId())
            ->setParameter('date', Date('m,j,Y, H:i:s', strtotime('-30 day')))
            ->getQuery()
            ->getSingleScalarResult();
    }

//    public function findOneBySomeField($value): ?Impressions
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
