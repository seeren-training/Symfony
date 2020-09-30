<?php

namespace App\Repository;

use App\Entity\VoteComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VoteComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method VoteComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method VoteComment[]    findAll()
 * @method VoteComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoteCommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VoteComment::class);
    }

    // /**
    //  * @return VoteComment[] Returns an array of VoteComment objects
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
    public function findOneBySomeField($value): ?VoteComment
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
