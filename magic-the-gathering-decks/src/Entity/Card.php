<?php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CardRepository::class)
 */
class Card
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;

    /**
     * @ORM\ManyToMany(targetEntity=Color::class, inversedBy="cards")
     */
    private $colors;

    /**
     * @ORM\ManyToMany(targetEntity=Type::class, inversedBy="cards")
     */
    private $types;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $manaCost;

    /**
     * @ORM\Column(type="integer", unique=true)
     */
    private $multiverseId;

    public function __construct()
    {
        $this->colors = new ArrayCollection();
        $this->types = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getColors(): Collection
    {
        return $this->colors;
    }

    public function addColor(Color $color): self
    {
        if (!$this->colors->contains($color)) {
            $this->colors[] = $color;
        }
        return $this;
    }

    public function removeColor(Color $color): self
    {
        $this->colors->removeElement($color);
        return $this;
    }

    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Type $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types[] = $type;
        }
        return $this;
    }

    public function removeType(Type $type): self
    {
        $this->types->removeElement($type);
        return $this;
    }

    public function getManaCost(): ?string
    {
        return $this->manaCost;
    }

    public function setManaCost(string $manaCost): self
    {
        $this->manaCost = $manaCost;
        return $this;
    }

    public function getMultiverseId(): ?int
    {
        return $this->multiverseId;
    }

    public function setMultiverseId(int $multiverseId): self
    {
        $this->multiverseId = $multiverseId;
        return $this;
    }

}
