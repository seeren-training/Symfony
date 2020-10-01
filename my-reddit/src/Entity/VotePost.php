<?php

namespace App\Entity;

use App\Repository\VotePostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VotePostRepository::class)
 */
class VotePost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=post::class, inversedBy="votePosts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $post;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="votePosts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $vote;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPost(): ?post
    {
        return $this->post;
    }

    public function setPost(?post $post): self
    {
        $this->post = $post;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getVote(): ?bool
    {
        return $this->vote;
    }

    public function setVote(bool $vote): self
    {
        $this->vote = $vote;

        return $this;
    }

}
