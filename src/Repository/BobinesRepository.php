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

    /**
     * Affichage des bobines avec une pagination
     * @param int $user
     * @param int $page
     * @return object
     * @author Mathieu Bechade
     */
    public function getBobinesByUser($user, $page = 1)
    {
        $query = $this->createQueryBuilder('b')
            ->andWhere('b.gestionnaire = :user_id')
            ->setParameter('user_id', $user)
            ->orderBy('b.date_ajout', 'DESC');

        if ($page > 0) {
            return $query->getQuery()->setFirstResult(($page - 1) * Bobines::RESULT_PER_PAGE) // Define the offset
                ->setMaxResults(Bobines::RESULT_PER_PAGE) // Define the limit
                ->getResult();
        }
        return $query->getQuery()->getResult();

    }

    /**
     * Summary of getBobinesByUserCount
     * @param mixed $user
     * @return int
     * @author Mathieu Bechade
     */
    public function getBobinesByUserCount($user)
    {
        return $this->createQueryBuilder('b')
            ->select('count(b.id)')
            ->andWhere('b.gestionnaire = :user_id')
            ->setParameter('user_id', $user)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getExpensetUsers($user)
    {
        return $this->createQueryBuilder('b')
            ->select('sum(b.prix)')
            ->andWhere('b.gestionnaire = :user_id')
            ->setParameter('user_id', $user->getId())
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getExpensemUsers($user)
    {
        return $this->createQueryBuilder('b')
            ->select('sum(b.prix)')
            ->andWhere('b.gestionnaire = :user_id')
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
    ): array {
        return $this->createQueryBuilder('b')
            ->select('SUM(b.prix) as prix, DATE(b.date_ajout) as week')
            ->groupBy('week')
            ->andWhere('b.gestionnaire = :user_id')
            ->andWhere('b.date_ajout >= :date')
            ->setParameter('user_id', $user->getId())
            ->setParameter('date', Date('m,j,Y, H:i:s', strtotime('-30 day')))
            ->getQuery()
            ->getResult();
    }
}
