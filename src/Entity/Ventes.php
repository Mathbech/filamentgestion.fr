<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VentesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VentesRepository::class)]
#[ApiResource]
class Ventes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_produit = null;

    #[ORM\Column(length: 255)]
    private ?string $description_produit = null;

    #[ORM\Column]
    private ?float $prix_produit = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_vente = null;

    #[ORM\ManyToMany(targetEntity: Clients::class, inversedBy: 'ventes')]
    private Collection $clients;

    #[ORM\ManyToMany(targetEntity: Users::class, inversedBy: 'vente')]
    private Collection $vendeur;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
        $this->vendeur = new ArrayCollection();
    }

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProduit(): ?string
    {
        return $this->nom_produit;
    }

    public function setNomProduit(string $nom_produit): static
    {
        $this->nom_produit = $nom_produit;

        return $this;
    }

    public function getDescriptionProduit(): ?string
    {
        return $this->description_produit;
    }

    public function setDescriptionProduit(string $description_produit): static
    {
        $this->description_produit = $description_produit;

        return $this;
    }

    public function getPrixProduit(): ?float
    {
        return $this->prix_produit;
    }

    public function setPrixProduit(float $prix_produit): static
    {
        $this->prix_produit = $prix_produit;

        return $this;
    }

    public function getDateVente(): ?\DateTimeInterface
    {
        return $this->date_vente;
    }

    public function setDateVente(\DateTimeInterface $date_vente): static
    {
        $this->date_vente = $date_vente;

        return $this;
    }

    /**
     * @return Collection<int, Clients>
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Clients $client): static
    {
        if (!$this->clients->contains($client)) {
            $this->clients->add($client);
        }

        return $this;
    }

    public function removeClient(Clients $client): static
    {
        $this->clients->removeElement($client);

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getVendeur(): Collection
    {
        return $this->vendeur;
    }

    public function addVendeur(Users $vendeur): static
    {
        if (!$this->vendeur->contains($vendeur)) {
            $this->vendeur->add($vendeur);
        }

        return $this;
    }

    public function removeVendeur(Users $vendeur): static
    {
        $this->vendeur->removeElement($vendeur);

        return $this;
    }
}
