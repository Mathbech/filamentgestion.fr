<?php

namespace App\Repository;

use App\Entity\Imprimantes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Imprimantes>
 *
 * @method Imprimantes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Imprimantes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Imprimantes[]    findAll()
 * @method Imprimantes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImprimantesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Imprimantes::class);
    }

    //    /**
    //     * @return Imprimantes[] Returns an array of Imprimantes objects
    //     */

    public function getTotalprinters()
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getPrintersUsers($username)
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->andWhere('i.username = :user_id')
            ->setParameter('user_id', $username)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getPrintersaUsers($username)
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->andWhere('i.username = :user_id')
            ->andWhere('i.deleted IS NULL')
            ->setParameter('user_id', $username)
            ->getQuery()
            ->getSingleScalarResult();
    }
    //    public function findOneBySomeField($value): ?Imprimantes
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
