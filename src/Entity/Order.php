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

    #[ORM\Column(type: 'string', length: 255)]
    private $commande;

    #[ORM\Column(type: 'string', length: 255)]
    private $deliveryAdress;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $billingAdress;

    #[ORM\Column(type: 'string', length: 255)]
    private $nameUser;

    #[ORM\Column(type: 'string', length: 255)]
    private $firstnameUser;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    private $productBY;

    #[ORM\Column(type: 'string', length: 255)]
    private $methodOfPayment;

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

}
