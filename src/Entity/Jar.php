<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JarRepository")
 */
class Jar
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JarItem", mappedBy="jar")
     */
    private $jarItems;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $rate;

    /**
     * @ORM\Column(type="integer")
     */
    private $originalAmount;

    public function __construct()
    {
        $this->jarItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|JarItem[]
     */
    public function getJarItems(): Collection
    {
        return $this->jarItems;
    }

    public function addJarItem(JarItem $jarItem): self
    {
        if (!$this->jarItems->contains($jarItem)) {
            $this->jarItems[] = $jarItem;
            $jarItem->setJar($this);
        }

        return $this;
    }

    public function removeJarItem(JarItem $jarItem): self
    {
        if ($this->jarItems->contains($jarItem)) {
            $this->jarItems->removeElement($jarItem);
            // set the owning side to null (unless already changed)
            if ($jarItem->getJar() === $this) {
                $jarItem->setJar(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getRate(): ?int
    {
        return $this->rate;
    }

    public function setRate(int $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getOriginalAmount(): ?int
    {
        return $this->originalAmount;
    }

    public function setOriginalAmount(int $originalAmount): self
    {
        $this->originalAmount = $originalAmount;

        return $this;
    }

    public function getAmount(): int
    {
        $totalAmount = $this->getOriginalAmount();

        foreach ($this->getJarItems() as $jarItem) {
            $totalAmount += $jarItem->getAmount();
        }

        return $totalAmount;
    }
}
