<?php

namespace App\Repository;

use App\Entity\Foo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Foo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Foo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Foo[]    findAll()
 * @method Foo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FooRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Foo::class);
    }

    // /**
    //  * @return Foo[] Returns an array of Foo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Foo
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
