<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ImpressionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImpressionsRepository::class)]
#[ApiResource]
class Impressions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $temps = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\OneToMany(mappedBy: 'impressions', targetEntity: Consommation::class)]
    private Collection $consommation;

    #[ORM\ManyToOne(inversedBy: 'impression')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Imprimantes $imprimantes = null;

    #[ORM\ManyToOne(inversedBy: 'impressions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $utilisateur = null;

    public function __construct()
    {
        $this->consommation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemps(): ?\DateTimeInterface
    {
        return $this->temps;
    }

    public function setTemps(\DateTimeInterface $temps): static
    {
        $this->temps = $temps;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection<int, Consommation>
     */
    public function getConsommation(): Collection
    {
        return $this->consommation;
    }

    public function addConsommation(Consommation $consommation): static
    {
        if (!$this->consommation->contains($consommation)) {
            $this->consommation->add($consommation);
            $consommation->setImpressions($this);
        }

        return $this;
    }

    public function removeConsommation(Consommation $consommation): static
    {
        if ($this->consommation->removeElement($consommation)) {
            // set the owning side to null (unless already changed)
            if ($consommation->getImpressions() === $this) {
                $consommation->setImpressions(null);
            }
        }

        return $this;
    }

    public function getImprimantes(): ?Imprimantes
    {
        return $this->imprimantes;
    }

    public function setImprimantes(?Imprimantes $imprimantes): static
    {
        $this->imprimantes = $imprimantes;

        return $this;
    }

    public function getUtilisateur(): ?Users
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Users $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
