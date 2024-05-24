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


   

    /**
     * Summary of getPrintersByUser
     * @param int $user
     * @param int $page
     * @return object
     * @author Mathieu Bechade
     */
    public function getPrintersByUser($user, int $page = 1)
    {
        $query = $this->createQueryBuilder('i')
            ->andWhere('i.username = :user_id')
            ->setParameter('user_id', $user)
            ->orderBy('i.date_ajout', 'DESC');

        if ($page > 0) {
            return $query->getQuery()->setFirstResult(($page - 1) * Imprimantes::RESULT_PER_PAGE) // Define the offset
                ->setMaxResults(Imprimantes::RESULT_PER_PAGE) // Define the limit
                ->getResult();
        }
        return $query->getQuery()->getResult();

    }
    
    /**
         * Summary of getCountPrintersByUser
         * @param int $user
         * @return int
         * @author Mathieu Bechade
         */
        public function getCountPrintersByUser($user)
        {
            return $this->createQueryBuilder('i')
                ->select('count(i.id)')
                ->andWhere('i.username = :user_id')
                ->setParameter('user_id', $user)
                ->getQuery()
                ->getSingleScalarResult();
        }
    public function getTotalprinters()
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getPrintersUsers($user)
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->andWhere('i.username = :user_id')
            ->setParameter('user_id', $user->getId())
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getPrintersaUsers($user)
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->andWhere('i.username = :user_id')
            ->andWhere('i.deleted IS NULL')
            ->setParameter('user_id', $user->getId())
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function desactiverImprimante($id)
    {
        $query = $this->createQueryBuilder('i')
            ->update()
            ->set('i.deleted', ':now')
            ->setParameter('now', new \DateTime())
            ->where('i.id = :id')
            ->setParameter('id', $id)
            ->getQuery();
        return $query->execute();
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
