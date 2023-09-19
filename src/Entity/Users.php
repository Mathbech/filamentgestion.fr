<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\OneToMany(mappedBy: 'username', targetEntity: Imprimantes::class)]
    private Collection $imprimantes;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Impressions::class)]
    private Collection $impressions;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Bobines::class)]
    private Collection $bobines;

    public function __construct()
    {
        $this->imprimantes = new ArrayCollection();
        $this->impressions = new ArrayCollection();
        $this->bobines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return Collection<int, Imprimantes>
     */
    public function getImprimantes(): Collection
    {
        return $this->imprimantes;
    }

    public function addImprimante(Imprimantes $imprimante): static
    {
        if (!$this->imprimantes->contains($imprimante)) {
            $this->imprimantes->add($imprimante);
            $imprimante->setUsername($this);
        }

        return $this;
    }

    public function removeImprimante(Imprimantes $imprimante): static
    {
        if ($this->imprimantes->removeElement($imprimante)) {
            // set the owning side to null (unless already changed)
            if ($imprimante->getUsername() === $this) {
                $imprimante->setUsername(null);
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
            $impression->setUtilisateur($this);
        }

        return $this;
    }

    public function removeImpression(Impressions $impression): static
    {
        if ($this->impressions->removeElement($impression)) {
            // set the owning side to null (unless already changed)
            if ($impression->getUtilisateur() === $this) {
                $impression->setUtilisateur(null);
            }
        }

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
            $bobine->setUtilisateur($this);
        }

        return $this;
    }

    public function removeBobine(Bobines $bobine): static
    {
        if ($this->bobines->removeElement($bobine)) {
            // set the owning side to null (unless already changed)
            if ($bobine->getUtilisateur() === $this) {
                $bobine->setUtilisateur(null);
            }
        }

        return $this;
    }
}
