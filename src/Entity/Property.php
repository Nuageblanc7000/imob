<?php

namespace App\Entity;

use App\Repository\PropertyRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PropertyRepository::class)]
class Property
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 20, scale: 2)]
    private ?string $price = null;

    #[ORM\Column]
    private ?int $bedroom = null;

    #[ORM\Column(nullable: true)]
    private ?int $bathroom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $year = null;

    #[ORM\Column(nullable: true)]
    private ?int $floor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $buildingCondition = null;

    #[ORM\Column(nullable: true)]
    private ?int $livingArea = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $kitchenType = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $energyClass = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numberClass = null;

    #[ORM\ManyToOne(inversedBy: 'properties')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getBedroom(): ?int
    {
        return $this->bedroom;
    }

    public function setBedroom(int $bedroom): self
    {
        $this->bedroom = $bedroom;

        return $this;
    }

    public function getBathroom(): ?int
    {
        return $this->bathroom;
    }

    public function setBathroom(?int $bathroom): self
    {
        $this->bathroom = $bathroom;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(?\DateTimeInterface $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getFloor(): ?int
    {
        return $this->floor;
    }

    public function setFloor(?int $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    public function getBuildingCondition(): ?string
    {
        return $this->buildingCondition;
    }

    public function setBuildingCondition(?string $buildingCondition): self
    {
        $this->buildingCondition = $buildingCondition;

        return $this;
    }

    public function getLivingArea(): ?int
    {
        return $this->livingArea;
    }

    public function setLivingArea(?int $livingArea): self
    {
        $this->livingArea = $livingArea;

        return $this;
    }

    public function getKitchenType(): ?string
    {
        return $this->kitchenType;
    }

    public function setKitchenType(?string $kitchenType): self
    {
        $this->kitchenType = $kitchenType;

        return $this;
    }

    public function getEnergyClass(): ?string
    {
        return $this->energyClass;
    }

    public function setEnergyClass(?string $energyClass): self
    {
        $this->energyClass = $energyClass;

        return $this;
    }

    public function getNumberClass(): ?string
    {
        return $this->numberClass;
    }

    public function setNumberClass(?string $numberClass): self
    {
        $this->numberClass = $numberClass;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
