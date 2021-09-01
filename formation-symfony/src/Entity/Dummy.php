<?php

namespace App\Entity;

use App\Repository\DummyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DummyRepository::class)
 */
class Dummy
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
    private $foo;

    /**
     * @ORM\Column(type="string", length=90)
     */
    private $bar;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFoo(): ?string
    {
        return $this->foo;
    }

    public function setFoo(string $foo): self
    {
        $this->foo = $foo;

        return $this;
    }

    public function getBar(): ?string
    {
        return $this->bar;
    }

    public function setBar(string $bar): self
    {
        $this->bar = $bar;

        return $this;
    }
}
