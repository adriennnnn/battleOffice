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

    #[ORM\Column(type: 'integer')]
    private $itemPrice;

    #[ORM\Column(type: 'string', length: 255)]
    private $img;

    #[ORM\Column(type: 'integer')]
    private $pricePromo;

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

    public function getItemPrice(): ?int
    {
        return $this->itemPrice;
    }

    public function setItemPrice(string $itemPrice): self
    {
        $this->itemPrice = $itemPrice;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getPricePromo(): ?int
    {
        return $this->pricePromo;
    }

    public function setPricePromo(int $pricePromo): self
    {
        $this->pricePromo = $pricePromo;

        return $this;
    }

}
