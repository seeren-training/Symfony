<?php

namespace App\Service;

use App\Entity\Post;
use App\Repository\PostRepository;
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
     * @var PostRepository
     */
    private PostRepository $repository;

    /**
     * @param EntityManagerInterface $entityManager
     * @param PostRepository $repository
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        PostRepository $repository
    )
    {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    /**
     * @param FormInterface $form
     * @param UserInterface $user
     * @return Post
     */
    public function new(FormInterface $form, UserInterface $user): Post
    {
        $post = $form->getData();
        $post->setUser($user);
        $post->setTotal(0);
        $post->setCreatedAt(new \DateTime());
        $this->entityManager->persist($post);
        $this->entityManager->flush();
        return $post;
    }

    public function retrieve(): array
    {
        return $this->repository->findBy([], ["id" => "DESC"], 10);
    }

}
