<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $email;

    #[Assert\EqualTo(propertyPath:"email", message:"Vous n'avez pas indiquer le même email")]
    public $confirm_email;

    #[ORM\Column(type: 'boolean')]
    private $AddAnotherDeliveryAdress;

    #[ORM\ManyToOne(targetEntity: BilingAdress::class, inversedBy: 'orders')]
    private $userInformations;

    #[ORM\ManyToOne(targetEntity: DeliveryAdress::class, inversedBy: 'orders')]
    private $shipping;

    #[ORM\ManyToOne(targetEntity: Payment::class, inversedBy: 'orders')]
    private $payment;

    #[ORM\ManyToOne(targetEntity: ItemChose::class, inversedBy: 'orders')]
    private $item;

    public function getId(): ?int
    {
        return $this->id;
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

    public function isAddAnotherDeliveryAdress(): ?bool
    {
        return $this->AddAnotherDeliveryAdress;
    }

    public function setAddAnotherDeliveryAdress(bool $AddAnotherDeliveryAdress): self
    {
        $this->AddAnotherDeliveryAdress = $AddAnotherDeliveryAdress;

        return $this;
    }

    public function getUserInformations(): ?BilingAdress
    {
        return $this->userInformations;
    }

    public function setUserInformations(?BilingAdress $userInformations): self
    {
        $this->userInformations = $userInformations;

        return $this;
    }

    public function getShipping(): ?DeliveryAdress
    {
        return $this->shipping;
    }

    public function setShipping(?DeliveryAdress $shipping): self
    {
        $this->shipping = $shipping;

        return $this;
    }
    public function getPayment(): ?Payment
    {
        return $this->payment;
    }

    public function setPayment(?Payment $payment): self
    {
        $this->payment = $payment;

        return $this;
    }
    public function getItem(): ?ItemChose
    {
        return $this->item;
    }

    public function setItem(?ItemChose $item): self
    {
        $this->item = $item;

        return $this;
    }
}
