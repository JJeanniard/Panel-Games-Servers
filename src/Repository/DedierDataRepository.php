<?php

namespace App\Repository;

use App\Entity\DedierData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DedierData|null find($id, $lockMode = null, $lockVersion = null)
 * @method DedierData|null findOneBy(array $criteria, array $orderBy = null)
 * @method DedierData[]    findAll()
 * @method DedierData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DedierDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DedierData::class);
    }

    // /**
    //  * @return DedierData[] Returns an array of DedierData objects
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
    public function findOneBySomeField($value): ?DedierData
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
