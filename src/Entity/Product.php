<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sweet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $energy;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Consumption", mappedBy="product", orphanRemoval=true)
     */
    private $consumptions;

    public function __construct()
    {
        $this->consumptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSweet(): ?bool
    {
        return $this->sweet;
    }

    public function setSweet(bool $sweet): self
    {
        $this->sweet = $sweet;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getEnergy(): ?int
    {
        return $this->energy;
    }

    public function setEnergy(int $energy): self
    {
        $this->energy = $energy;

        return $this;
    }

    /**
     * @return Collection|Consumption[]
     */
    public function getConsumptions(): Collection
    {
        return $this->consumptions;
    }

    public function addConsumption(Consumption $consumption): self
    {
        if (!$this->consumptions->contains($consumption)) {
            $this->consumptions[] = $consumption;
            $consumption->setProduct($this);
        }

        return $this;
    }

    public function removeConsumption(Consumption $consumption): self
    {
        if ($this->consumptions->contains($consumption)) {
            $this->consumptions->removeElement($consumption);
            // set the owning side to null (unless already changed)
            if ($consumption->getProduct() === $this) {
                $consumption->setProduct(null);
            }
        }

        return $this;
    }
}
