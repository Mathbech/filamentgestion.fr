<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ConsommationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsommationRepository::class)]
#[ApiResource]
class Consommation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $poids = null;

    #[ORM\Column(length: 255)]
    private ?string $couleur = null;

    #[ORM\ManyToOne(inversedBy: 'consommation')]
    private ?Impressions $impressions = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): static
    {
        $this->poids = $poids;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getImpressions(): ?Impressions
    {
        return $this->impressions;
    }

    public function setImpressions(?Impressions $impressions): static
    {
        $this->impressions = $impressions;

        return $this;
    }
}
