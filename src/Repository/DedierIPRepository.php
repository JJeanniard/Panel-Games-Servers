<?php

namespace App\Repository;

use App\Entity\DedierIP;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DedierIP|null find($id, $lockMode = null, $lockVersion = null)
 * @method DedierIP|null findOneBy(array $criteria, array $orderBy = null)
 * @method DedierIP[]    findAll()
 * @method DedierIP[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DedierIPRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DedierIP::class);
    }

    // /**
    //  * @return DedierIP[] Returns an array of DedierIP objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DedierIP
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
