<?php

namespace App\Service;

use App\Exception\EmailExistsException;
use App\Exception\InvalidFormException;
use App\Exception\PseudoExistsException;
use App\Repository\UserRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserService
{

    /**
     * @var UserRepository
     */
    private UserRepository $repository;

    /**
     * @var UserPasswordEncoderInterface
     */
    private UserPasswordEncoderInterface $encoder;

    /**
     * @param UserRepository $repository
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(
        UserRepository $repository,
        UserPasswordEncoderInterface $encoder
    )
    {
        $this->repository = $repository;
        $this->encoder = $encoder;
    }

    /**
     * @param FormInterface $form
     * @return UserInterface
     *
     * @throws EmailExistsException
     * @throws InvalidFormException
     * @throws PseudoExistsException
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function new(FormInterface $form): UserInterface
    {
        if (!$form->isSubmitted() || !$form->isValid()) {
            throw new InvalidFormException();
        }
        $user = $form->getData();
        try {
            $encodedPassword = $this->encoder->encodePassword($user, $user->getPassword());
            $this->repository->upgradePassword($user, $encodedPassword);
        } catch (UniqueConstraintViolationException $e) {
            throw stripos($e->getMessage(), "Duplicate entry '" . $user->getUsername() . "'")
                ? new EmailExistsException ()
                : new PseudoExistsException();
        }
        return $user;
    }

}