<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CouleurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CouleurRepository::class)]
#[ApiResource(security: "is_granted('ROLE_USER')")]
class Couleur
{
    public function __toString(): String{
        return $this->getNom();
    }


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'couleur', targetEntity: Bobines::class)]
    private Collection $bobines;

    #[ORM\OneToMany(mappedBy: 'couleur', targetEntity: Impressions::class)]
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

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
            $bobine->setCouleur($this);
        }

        return $this;
    }

    public function removeBobine(Bobines $bobine): static
    {
        if ($this->bobines->removeElement($bobine)) {
            // set the owning side to null (unless already changed)
            if ($bobine->getCouleur() === $this) {
                $bobine->setCouleur(null);
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
            $impression->setCouleur($this);
        }

        return $this;
    }

    public function removeImpression(Impressions $impression): static
    {
        if ($this->impressions->removeElement($impression)) {
            // set the owning side to null (unless already changed)
            if ($impression->getCouleur() === $this) {
                $impression->setCouleur(null);
            }
        }

        return $this;
    }
}
