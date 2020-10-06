<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{

    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @param UserInterface $user
     * @param string $newEncodedPassword
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws OptimisticLockException
     */
    public function upgradePassword(
        UserInterface $user,
        string $newEncodedPassword
    ): void
    {
        $user->setPassword($newEncodedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

}
