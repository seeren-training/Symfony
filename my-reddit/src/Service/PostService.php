<?php

namespace App\Service;

use App\Entity\Post;
use App\Exception\InvalidFormException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class PostService
{

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param FormInterface $form
     * @param UserInterface $user
     * @return Post
     *
     * @throws InvalidFormException
     */
    public function new(FormInterface $form, UserInterface $user): Post
    {
        if (!$form->isSubmitted() || !$form->isValid()) {
            throw new InvalidFormException();
        }
        $post = $form->getData();
        $post->setUser($user);
        $post->setTotal(0);
        $post->setCreatedAt(new \DateTime());
        $this->entityManager->persist($post);
        $this->entityManager->flush();
        return $post;
    }

}
