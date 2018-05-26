<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $mobile_number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $skype_nickmane;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook_url;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ContactAddress", cascade={"persist", "remove"})
     */
    private $address;

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(?string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getMobileNumber(): ?string
    {
        return $this->mobile_number;
    }

    public function setMobileNumber(?string $mobile_number): self
    {
        $this->mobile_number = $mobile_number;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSkypeNickmane(): ?string
    {
        return $this->skype_nickmane;
    }

    public function setSkypeNickmane(?string $skype_nickmane): self
    {
        $this->skype_nickmane = $skype_nickmane;

        return $this;
    }

    public function getFacebookUrl(): ?string
    {
        return $this->facebook_url;
    }

    public function setFacebookUrl(?string $facebook_url): self
    {
        $this->facebook_url = $facebook_url;

        return $this;
    }

    public function getAddress(): ?ContactAddress
    {
        return $this->address;
    }

    public function setAddress(?ContactAddress $address): self
    {
        $this->address = $address;

        return $this;
    }
}
