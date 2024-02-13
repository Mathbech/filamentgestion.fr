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
    /**
     * Summary of getProfitt
     * @param mixed $user
     * @return bool|float|int|string|null
     * @author Mathieu Bechade
     */
    public function getProfitt($user)
    {
        return $this->createQueryBuilder('v')
            ->select('SUM(v.prix_produit)')
            ->andWhere('v.vendeur = :user')
            ->setParameter('user', $user->getId())
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }
    /**
     * Summary of getProfitm
     * @param mixed $user
     * @return bool|float|int|string|null
     * @author Mathieu Bechade
     */
    public function getProfitm($user)
    {
        return $this->createQueryBuilder('v')
            ->select('SUM(v.prix_produit)')
            ->andWhere('v.vendeur = :user')
            ->andWhere('v.date_vente >= :date')
            ->setParameter('user', $user->getId())
            ->setParameter('date', new \DateTime('-30 days'))
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    /**
     * Summary of getVentesChart
     * @param mixed $user
     * @return array
     * @author Mathieu Bechade
     */
    public function getVentesChart($user): array
    {
        return $this->createQueryBuilder('v')
            ->select('COUNT(v.id) as product_count, DATE(v.date_vente) as week')
            ->andWhere('v.vendeur = :user')
            ->setParameter('user', $user->getId())
            ->andWhere('v.date_vente >= :date')
            ->setParameter('date', new \DateTime('-30 days'))
            ->groupBy('week')
            ->getQuery()
            ->getResult()
        ;
    }

    public function getRevenusChart(
        $user,
    ): array
    {
        return $this->createQueryBuilder('v')
            ->select('SUM(v.prix_produit) as prix, DATE(v.date_vente) as week')
            ->andWhere('v.vendeur = :user')
            ->setParameter('user', $user->getId())
            ->andWhere('v.date_vente >= :date')
            ->setParameter('date', new \DateTime('-30 days'))
            ->groupBy('week')
            ->getQuery()
            ->getResult()
        ;
    }
}
