<?php

namespace App\Entity;

use App\Repository\MealRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=MealRepository::class)
 */
class Meal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @Assert\Range(min = 1, max = 10)
     * @ORM\Column(type="smallint")
     */
    private $maxAttendees;

    /**
     * @Assert\NotBlank
     * @Assert\Range(min = "+12 hour", max = "1 years")
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @Assert\NotBlank
     * @Assert\Length(min = 2, max = 255)
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Assert\NotBlank
     * @Assert\Length(min = 32, max = 255)
     * @ORM\Column(type="text")
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaxAttendees(): ?int
    {
        return $this->maxAttendees;
    }

    public function setMaxAttendees(int $maxAttendees): self
    {
        $this->maxAttendees = $maxAttendees;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

}
