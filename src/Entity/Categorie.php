<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
#[ApiResource]
class Categorie
{
    public function __toString(): String{
        return $this->getNomType();
    }


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_type = null;

    #[ORM\Column(length: 255)]
    private ?string $propriete = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Bobines::class)]
    private Collection $bobines;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Impressions::class)]
    private Collection $impressions;

    public function __construct()
    {
        $this->bobines = new ArrayCollection();
        $this->impressions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomType(): ?string
    {
        return $this->nom_type;
    }

    public function setNomType(string $nom_type): static
    {
        $this->nom_type = $nom_type;

        return $this;
    }

    public function getPropriete(): ?string
    {
        return $this->propriete;
    }

    public function setPropriete(string $propriete): static
    {
        $this->propriete = $propriete;

        return $this;
    }

    /**
     * @return Collection<int, Bobines>
     */
    public function getBobines(): Collection
    {
        return $this->bobines;
    }

    public function addBobine(Bobines $bobine): static
    {
        if (!$this->bobines->contains($bobine)) {
            $this->bobines->add($bobine);
            $bobine->setCategorie($this);
        }

        return $this;
    }

    public function removeBobine(Bobines $bobine): static
    {
        if ($this->bobines->removeElement($bobine)) {
            // set the owning side to null (unless already changed)
            if ($bobine->getCategorie() === $this) {
                $bobine->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Impressions>
     */
    public function getImpressions(): Collection
    {
        return $this->impressions;
    }

    public function addImpression(Impressions $impression): static
    {
        if (!$this->impressions->contains($impression)) {
            $this->impressions->add($impression);
            $impression->setCategorie($this);
        }

        return $this;
    }

    public function removeImpression(Impressions $impression): static
    {
        if ($this->impressions->removeElement($impression)) {
            // set the owning side to null (unless already changed)
            if ($impression->getCategorie() === $this) {
                $impression->setCategorie(null);
            }
        }

        return $this;
    }
}
