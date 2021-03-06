<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @Assert\Email
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = ['ROLE_USER'];

    /**
     * @Assert\NotBlank
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $pseudo;

    /**
     * @ORM\OneToMany(targetEntity=VotePost::class, mappedBy="user")
     */
    private $votePosts;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="user")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity=VoteComment::class, mappedBy="user")
     */
    private $voteComments;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->votePosts = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->voteComments = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return $this
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string)$this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        return array_unique($this->roles);
    }

    /**
     * @param array $roles
     * @return $this
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string)$this->password;
    }

    /**
     * @param string|null $password
     * @return $this
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return string|null
     */
    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    /**
     * @param string|null $pseudo
     * @return $this
     */
    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * @return Collection|VotePost[]
     */
    public function getVotePosts(): Collection
    {
        return $this->votePosts;
    }

    /**
     * @param VotePost $votePost
     * @return $this
     */
    public function addVotePost(VotePost $votePost): self
    {
        if (!$this->votePosts->contains($votePost)) {
            $this->votePosts[] = $votePost;
            $votePost->setUser($this);
        }

        return $this;
    }

    /**
     * @param VotePost $votePost
     * @return $this
     */
    public function removeVotePost(VotePost $votePost): self
    {
        if ($this->votePosts->contains($votePost)) {
            $this->votePosts->removeElement($votePost);
            // set the owning side to null (unless already changed)
            if ($votePost->getUser() === $this) {
                $votePost->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    /**
     * @param Comment $comment
     * @return $this
     */
    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setUser($this);
        }

        return $this;
    }

    /**
     * @param Comment $comment
     * @return $this
     */
    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getUser() === $this) {
                $comment->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|VoteComment[]
     */
    public function getVoteComments(): Collection
    {
        return $this->voteComments;
    }

    /**
     * @param VoteComment $voteComment
     * @return $this
     */
    public function addVoteComment(VoteComment $voteComment): self
    {
        if (!$this->voteComments->contains($voteComment)) {
            $this->voteComments[] = $voteComment;
            $voteComment->setUser($this);
        }

        return $this;
    }

    /**
     * @param VoteComment $voteComment
     * @return $this
     */
    public function removeVoteComment(VoteComment $voteComment): self
    {
        if ($this->voteComments->contains($voteComment)) {
            $this->voteComments->removeElement($voteComment);
            // set the owning side to null (unless already changed)
            if ($voteComment->getUser() === $this) {
                $voteComment->setUser(null);
            }
        }

        return $this;
    }

}
