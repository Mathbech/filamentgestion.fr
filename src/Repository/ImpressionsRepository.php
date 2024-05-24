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


    /**
     * Summary of getPrintersByUser
     * @param int $user
     * @param int $page
     * @return object
     * @author Mathieu Bechade
     */
    public function getImpressionsByUser($user, int $page = 1)
    {
        $query = $this->createQueryBuilder('i')
            ->andWhere('i.utilisateur = :user_id')
            ->setParameter('user_id', $user)
            ->orderBy('i.date', 'DESC');

        if ($page > 0) {
            return $query->getQuery()->setFirstResult(($page - 1) * Impressions::RESULT_PER_PAGE) // Define the offset
                ->setMaxResults(Impressions::RESULT_PER_PAGE) // Define the limit
                ->getResult();
        }
        return $query->getQuery()->getResult();

    }


    /**
     * Summary of getCountImpressionsByUser
     * @param int $user
     * @return int
     * @author Mathieu Bechade
     */
    public function getCountImpressionsByUser($user)
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->andWhere('i.utilisateur = :user_id')
            ->setParameter('user_id', $user)
            ->getQuery()
            ->getSingleScalarResult();
    }


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
