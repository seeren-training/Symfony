<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class UserService
{

    public function __construct(
        private EntityManagerInterface $entityManager,
        private HasherService          $hasherService)
    {
    }

    public function addUser(
        PasswordAuthenticatedUserInterface $user,
        string                             $plainPassword): bool
    {
        $user->setPassword($this->hasherService->hash($user, $plainPassword));
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return true;
    }

}
