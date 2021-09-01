<?php

namespace App\Repository;

use App\Entity\Dummy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dummy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dummy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dummy[]    findAll()
 * @method Dummy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DummyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dummy::class);
    }

    // /**
    //  * @return Dummy[] Returns an array of Dummy objects
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
    public function findOneBySomeField($value): ?Dummy
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
