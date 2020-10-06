<?php

namespace App\Repository;

use App\Entity\VoteComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class VoteCommentRepository extends ServiceEntityRepository
{

    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VoteComment::class);
    }

}
