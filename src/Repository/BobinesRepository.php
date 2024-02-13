<?php

namespace App\Repository;

use App\Entity\Bobines;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bobines>
 *
 * @method Bobines|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bobines|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bobines[]    findAll()
 * @method Bobines[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BobinesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bobines::class);
    }

    //    /**
    //     * @return Bobines[] Returns an array of Bobines objects
    //     */

    
    public function getExpensetUsers($user)
    {
        return $this->createQueryBuilder('b')
            ->select('sum(b.prix)')
            ->andWhere('b.utilisateur = :user_id')
            ->setParameter('user_id', $user->getId())
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getExpensemUsers($user)
    {
        return $this->createQueryBuilder('b')
            ->select('sum(b.prix)')
            ->andWhere('b.utilisateur = :user_id')
            ->andWhere('b.date_ajout >= :date')
            ->setParameter('user_id', $user->getId())
            ->setParameter('date', Date('m,j,Y, H:i:s', strtotime('-30 day')))
            ->getQuery()
            ->getSingleScalarResult();
    }
    /**
     * Summary of getExpensesCharts
     * @param mixed $user
     * @return bool|float|int|string|null
     * @author Mathieu Bechade
     */
    public function getExpensesCharts(
        $user
    ) :array {
        return $this->createQueryBuilder('b')
            ->select('SUM(b.prix) as prix, DATE(b.date_ajout) as week')
            ->groupBy('week')
            ->andWhere('b.utilisateur = :user_id')
            ->andWhere('b.date_ajout >= :date')
            ->setParameter('user_id', $user->getId())
            ->setParameter('date', Date('m,j,Y, H:i:s', strtotime('-30 day')))
            ->getQuery()
            ->getResult();
    }
}
