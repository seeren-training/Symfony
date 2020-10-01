<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Post::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $post;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Comment::class, inversedBy="comments")
     */
    private $comment;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="comment")
     */
    private $comments;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\OneToMany(targetEntity=VoteComment::class, mappedBy="comment")
     */
    private $voteComments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->voteComments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): self
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

    public function getComment(): ?self
    {
        return $this->comment;
    }

    public function setComment(?self $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(self $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setComment($this);
        }

        return $this;
    }

    public function removeComment(self $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getComment() === $this) {
                $comment->setComment(null);
            }
        }

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Collection|VoteComment[]
     */
    public function getVoteComments(): Collection
    {
        return $this->voteComments;
    }

    public function addVoteComment(VoteComment $voteComment): self
    {
        if (!$this->voteComments->contains($voteComment)) {
            $this->voteComments[] = $voteComment;
            $voteComment->setComment($this);
        }

        return $this;
    }

    public function removeVoteComment(VoteComment $voteComment): self
    {
        if ($this->voteComments->contains($voteComment)) {
            $this->voteComments->removeElement($voteComment);
            // set the owning side to null (unless already changed)
            if ($voteComment->getComment() === $this) {
                $voteComment->setComment(null);
            }
        }

        return $this;
    }

}
