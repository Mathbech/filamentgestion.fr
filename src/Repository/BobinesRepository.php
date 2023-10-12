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


    public function getComptesUsers($username)
    {
        return $this->createQueryBuilder('b')
            ->select('sum(b.prix)')
            ->andWhere('b.utilisateur = :user_id')
            ->setParameter('user_id', $username)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
