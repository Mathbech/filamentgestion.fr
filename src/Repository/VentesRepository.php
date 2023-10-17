<?php

namespace App\Repository;

use App\Entity\Ventes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ventes>
 *
 * @method Ventes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ventes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ventes[]    findAll()
 * @method Ventes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VentesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ventes::class);
    }

//    /**
//     * @return Ventes[] Returns an array of Ventes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Ventes
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function getProfitt($user)
    {
        return $this->createQueryBuilder('v')
            ->select('SUM(v.prix_produit)')
            ->andWhere('v.clients = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    public function getProfittm($user)
    {
        return $this->createQueryBuilder('v')
            ->select('SUM(v.prix_produit)')
            ->andWhere('v.clients = :user')
            ->andWhere('v.date_vente >= :date')
            ->setParameter('user', $user)
            ->setParameter('date', new \DateTime('-30 days'))
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }
}
