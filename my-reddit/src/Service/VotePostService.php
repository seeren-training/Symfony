<?php

namespace App\Service;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\VotePost;
use App\Repository\VotePostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class VotePostService
{

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $manager;

    /**
     * @var VotePostRepository
     */
    private VotePostRepository $repository;

    /**
     * @var UserInterface|null
     */
    private UserInterface $user;

    /**
     * @param EntityManagerInterface $manager
     * @param VotePostRepository $repository
     * @param Security $security
     */
    public function __construct(
        EntityManagerInterface $manager,
        VotePostRepository $repository,
        Security $security
    )
    {
        $this->user = $security->getUser() ?? new User();
        $this->manager = $manager;
        $this->repository = $repository;
    }

    /**
     * @param Post $post
     * @param bool $vote
     * @return VotePost
     */
    public function vote(Post $post, bool $vote): VotePost
    {
        $votePost = $this->retrieve($post);
        if (!$votePost) {
            $votePost = new VotePost();
            $votePost->setPost($post);
            $votePost->setUser($this->user);
            $votePost->setVote($vote);
            $post->setTotal($post->getTotal() + ($vote ? 1 : -1));
            $this->manager->persist($votePost);
        } else {
            $votePost->getVote() === $vote ? $this->remove($votePost) : $this->toggle($votePost);
        }
        $this->manager->flush();
        return $votePost;
    }

    /**
     * @param Post $post
     * @return VotePost|null
     */
    public function retrieve(Post $post): ?VotePost
    {
        return $this->repository->findOneBy([
            "user" => $this->user,
            "post" => $post
        ]);
    }

    /**
     * @param VotePost $votePost
     * @return VotePost
     */
    public function remove(VotePost $votePost): VotePost
    {
        $this->manager->remove($votePost);
        $votePost->getPost()->setTotal($votePost->getPost()->getTotal() + ($votePost->getVote() ? -1 : 1));
        return $votePost;
    }

    /**
     * @param VotePost $votePost
     * @return VotePost
     */
    public function toggle(VotePost $votePost): VotePost
    {
        $votePost->setVote(!$votePost->getVote());
        $votePost->getPost()->setTotal($votePost->getPost()->getTotal() + ($votePost->getVote() ? 2 : -2));
        return $votePost;
    }

}