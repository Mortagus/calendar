<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JarItemRepository")
 */
class JarItem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jar", inversedBy="jarItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jar;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getJar(): ?Jar
    {
        return $this->jar;
    }

    public function setJar(?Jar $jar): self
    {
        $this->jar = $jar;

        return $this;
    }
}
