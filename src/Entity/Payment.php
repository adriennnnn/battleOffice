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
    private $amount;

    #[ORM\Column(type: 'string', length: 255)]
    private $status;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $methodOfPayment;

    public function getId(): ?int
    {
        return $this->id;
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