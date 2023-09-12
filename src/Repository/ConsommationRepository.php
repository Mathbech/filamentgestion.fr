<?php

namespace App\Repository;

use App\Entity\Consommation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Consommation>
 *
 * @method Consommation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Consommation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Consommation[]    findAll()
 * @method Consommation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsommationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Consommation::class);
    }

//    /**
//     * @return Consommation[] Returns an array of Consommation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Consommation
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
