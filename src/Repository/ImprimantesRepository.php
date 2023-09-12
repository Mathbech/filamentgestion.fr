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
