<?php

namespace App\Entity;

use App\Repository\ItemChoseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemChoseRepository::class)]
class ItemChose
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $itemName;

    #[ORM\Column(type: 'string', length: 255)]
    private $ItemPrice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemName(): ?string
    {
        return $this->itemName;
    }

    public function setItemName(string $itemName): self
    {
        $this->itemName = $itemName;

        return $this;
    }

    public function getItemPrice(): ?string
    {
        return $this->ItemPrice;
    }

    public function setItemPrice(string $ItemPrice): self
    {
        $this->ItemPrice = $ItemPrice;

        return $this;
    }
}
