<?php

namespace App\Service\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserEntityService
{

    private UserRepository $userRepository;

    private UserPasswordHasherInterface $userPasswordHasher;

    public function __construct(
        UserRepository              $userRepository,
        UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userRepository = $userRepository;
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function insertRegistrationForm(FormInterface $form): bool
    {
        try {

            $this->userRepository->upgradePassword(
                $form->getData(),
                $this->userPasswordHasher->hashPassword(
                    $form->getData(),
                    $form->get('plainPassword')->getData()
                )
            );
            return true;
        } catch (OptimisticLockException | ORMException) {
            // TODO add error message in form
            return false;
        }
    }

}