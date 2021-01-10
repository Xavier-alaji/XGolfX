<?php

namespace App\Repository;

use App\Entity\Hole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hole|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hole|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hole[]    findAll()
 * @method Hole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hole::class);
    }

    // /**
    //  * @return Hole[] Returns an array of Hole objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hole
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
