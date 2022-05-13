<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentRepository::class)]
class Payment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $refComande;

    #[ORM\Column(type: 'string', length: 255)]
    private $adressClient;

    #[ORM\Column(type: 'string', length: 255)]
    private $client;

    #[ORM\Column(type: 'string', length: 255)]
    private $product;

    #[ORM\Column(type: 'string', length: 255)]
    private $amount;

    #[ORM\Column(type: 'string', length: 255)]
    private $status;

    #[ORM\Column(type: 'string', length: 255)]
    private $delivery;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefComande(): ?string
    {
        return $this->refComande;
    }

    public function setRefComande(string $refComande): self
    {
        $this->refComande = $refComande;

        return $this;
    }

    public function getAdressClient(): ?string
    {
        return $this->adressClient;
    }

    public function setAdressClient(string $adressClient): self
    {
        $this->adressClient = $adressClient;

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(string $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(string $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDelivery(): ?string
    {
        return $this->delivery;
    }

    public function setDelivery(string $delivery): self
    {
        $this->delivery = $delivery;

        return $this;
    }
}
