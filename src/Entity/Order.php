<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $commande;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $deliveryAdress;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $billingAdress;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nameUser;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $firstnameUser;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $email;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $productBY;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $methodOfPayment;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $country;

    #[ORM\Column(type: 'string', length: 255)]
    private $ComplementAdress;

    #[ORM\Column(type: 'string', length: 255)]
    private $City;

    #[ORM\Column(type: 'string', length: 255)]
    private $postalCode;

    #[ORM\Column(type: 'string', length: 255)]
    private $phone;

    #[ORM\Column(type: 'boolean')]
    private $AddAnotherDeliveryAdress;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommande(): ?string
    {
        return $this->commande;
    }

    public function setCommande(string $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function getDeliveryAdress(): ?string
    {
        return $this->deliveryAdress;
    }

    public function setDeliveryAdress(string $deliveryAdress): self
    {
        $this->deliveryAdress = $deliveryAdress;

        return $this;
    }

    public function getBillingAdress(): ?string
    {
        return $this->billingAdress;
    }

    public function setBillingAdress(?string $billingAdress): self
    {
        $this->billingAdress = $billingAdress;

        return $this;
    }

    public function getNameUser(): ?string
    {
        return $this->nameUser;
    }

    public function setNameUser(string $nameUser): self
    {
        $this->nameUser = $nameUser;

        return $this;
    }

    public function getFirstnameUser(): ?string
    {
        return $this->firstnameUser;
    }

    public function setFirstnameUser(string $firstnameUser): self
    {
        $this->firstnameUser = $firstnameUser;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getProductBY(): ?string
    {
        return $this->productBY;
    }

    public function setProductBY(string $productBY): self
    {
        $this->productBY = $productBY;

        return $this;
    }

    public function getMethodOfPayment(): ?string
    {
        return $this->methodOfPayment;
    }

    public function setMethodOfPayment(string $methodOfPayment): self
    {
        $this->methodOfPayment = $methodOfPayment;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getComplementAdress(): ?string
    {
        return $this->ComplementAdress;
    }

    public function setComplementAdress(string $ComplementAdress): self
    {
        $this->ComplementAdress = $ComplementAdress;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function isAddAnotherDeliveryAdress(): ?bool
    {
        return $this->AddAnotherDeliveryAdress;
    }

    public function setAddAnotherDeliveryAdress(bool $AddAnotherDeliveryAdress): self
    {
        $this->AddAnotherDeliveryAdress = $AddAnotherDeliveryAdress;

        return $this;
    }

}
