<?php

namespace App\Repository;

use App\Entity\VotePost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VotePost|null find($id, $lockMode = null, $lockVersion = null)
 * @method VotePost|null findOneBy(array $criteria, array $orderBy = null)
 * @method VotePost[]    findAll()
 * @method VotePost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VotePostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VotePost::class);
    }

    // /**
    //  * @return VotePost[] Returns an array of VotePost objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VotePost
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
