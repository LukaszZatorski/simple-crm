<?php

namespace App\Entity;

use App\Repository\AccountRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccountRepository::class)]
class Account
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $billing_street = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $billing_city = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $billing_state = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $billing_zip = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $billing_country = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tax_number = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $website = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\ManyToOne(inversedBy: 'accounts')]
    private ?User $assigned_to = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getBillingStreet(): ?string
    {
        return $this->billing_street;
    }

    public function setBillingStreet(?string $billing_street): static
    {
        $this->billing_street = $billing_street;

        return $this;
    }

    public function getBillingCity(): ?string
    {
        return $this->billing_city;
    }

    public function setBillingCity(?string $billing_city): static
    {
        $this->billing_city = $billing_city;

        return $this;
    }

    public function getBillingState(): ?string
    {
        return $this->billing_state;
    }

    public function setBillingState(?string $billing_state): static
    {
        $this->billing_state = $billing_state;

        return $this;
    }

    public function getBillingZip(): ?string
    {
        return $this->billing_zip;
    }

    public function setBillingZip(?string $billing_zip): static
    {
        $this->billing_zip = $billing_zip;

        return $this;
    }

    public function getBillingCountry(): ?string
    {
        return $this->billing_country;
    }

    public function setBillingCountry(?string $billing_country): static
    {
        $this->billing_country = $billing_country;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTaxNumber(): ?string
    {
        return $this->tax_number;
    }

    public function setTaxNumber(?string $tax_number): static
    {
        $this->tax_number = $tax_number;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): static
    {
        $this->website = $website;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getAssignedTo(): ?User
    {
        return $this->assigned_to;
    }

    public function setAssignedTo(?User $assigned_to): static
    {
        $this->assigned_to = $assigned_to;

        return $this;
    }
}
