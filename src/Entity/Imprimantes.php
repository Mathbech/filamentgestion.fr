<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ImprimantesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImprimantesRepository::class)]
#[ApiResource]
class Imprimantes
{

    public function __toString(): String{
        return $this->getNomImprimante();
    }
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type_imprimante = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_imprimante = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $deleted = null;

    #[ORM\OneToMany(mappedBy: 'imprimantes', targetEntity: Impressions::class)]
    private Collection $impression;

    #[ORM\ManyToOne(inversedBy: 'imprimantes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $username = null;

    #[ORM\Column(length: 255)]
    private ?string $marque = null;

    public function __construct()
    {
        $this->impression = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeImprimante(): ?string
    {
        return $this->type_imprimante;
    }

    public function setTypeImprimante(string $type_imprimante): static
    {
        $this->type_imprimante = $type_imprimante;

        return $this;
    }

    public function getNomImprimante(): ?string
    {
        return $this->nom_imprimante;
    }

    public function setNomImprimante(string $nom_imprimante): static
    {
        $this->nom_imprimante = $nom_imprimante;

        return $this;
    }

    public function getDeleted(): ?\DateTimeInterface
    {
        return $this->deleted;
    }

    public function setDeleted(?\DateTimeInterface $deleted): static
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * @return Collection<int, Impressions>
     */
    public function getImpression(): Collection
    {
        return $this->impression;
    }

    public function addImpression(Impressions $impression): static
    {
        if (!$this->impression->contains($impression)) {
            $this->impression->add($impression);
            $impression->setImprimantes($this);
        }

        return $this;
    }

    public function removeImpression(Impressions $impression): static
    {
        if ($this->impression->removeElement($impression)) {
            // set the owning side to null (unless already changed)
            if ($impression->getImprimantes() === $this) {
                $impression->setImprimantes(null);
            }
        }

        return $this;
    }

    public function getUsername(): ?Users
    {
        return $this->username;
    }

    public function setUsername(?Users $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }
}
