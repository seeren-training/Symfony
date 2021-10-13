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
     * @ORM\Column(type="integer", unique=true)
     */
    private $multiverse_id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $manaCoast;

    /**
     * @ORM\Column(type="text")
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

    public function getMultiverseId(): ?int
    {
        return $this->multiverse_id;
    }

    public function setMultiverseId(int $multiverse_id): self
    {
        $this->multiverse_id = $multiverse_id;

        return $this;
    }

    public function getManaCoast(): ?string
    {
        return $this->manaCoast;
    }

    public function setManaCoast(string $manaCoast): self
    {
        $this->manaCoast = $manaCoast;

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

    /**
     * @return Collection|Color[]
     */
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

    /**
     * @return Collection|Type[]
     */
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
}
