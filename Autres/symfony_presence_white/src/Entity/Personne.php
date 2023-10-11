<?php

namespace App\Entity;

use App\Entity\Equipe;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
class Personne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contact1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contact2 = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateNaissance = null;

    #[JoinTable('equipeCoach')]
    #[ORM\ManyToMany(targetEntity: Equipe::class, inversedBy: 'coaches')]
    private Collection $equipesCoaches;

    #[JoinTable('equipeJoueur')]
    #[ORM\ManyToMany(targetEntity: Equipe::class, inversedBy: 'joueurs')]
    private Collection $equipesJoueur;

    #[ORM\OneToMany(mappedBy: 'joueur', targetEntity: Presence::class, orphanRemoval: true)]
    private Collection $presences;

    #[ORM\OneToOne(mappedBy: 'person', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function __construct()
    {
        $this->equipesCoaches = new ArrayCollection();
        $this->equipesJoueur = new ArrayCollection();
        $this->presences = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getContact1(): ?string
    {
        return $this->contact1;
    }

    public function setContact1(?string $contact1): static
    {
        $this->contact1 = $contact1;

        return $this;
    }

    public function getContact2(): ?string
    {
        return $this->contact2;
    }

    public function setContact2(?string $contact2): static
    {
        $this->contact2 = $contact2;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }


    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipesCoaches(): Collection
    {
        return $this->equipesCoaches;
    }

    public function addEquipesCoach(Equipe $equipesCoach): static
    {
        if (!$this->equipesCoaches->contains($equipesCoach)) {
            $this->equipesCoaches->add($equipesCoach);
        }

        return $this;
    }

    public function removeEquipesCoach(Equipe $equipesCoach): static
    {
        $this->equipesCoaches->removeElement($equipesCoach);

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipesJoueur(): Collection
    {
        return $this->equipesJoueur;
    }

    public function addEquipesJoueur(Equipe $equipesJoueur): static
    {
        if (!$this->equipesJoueur->contains($equipesJoueur)) {
            $this->equipesJoueur->add($equipesJoueur);
        }

        return $this;
    }

    public function removeEquipesJoueur(Equipe $equipesJoueur): static
    {
        $this->equipesJoueur->removeElement($equipesJoueur);

        return $this;
    }

    /**
     * @return Collection<int, Presence>
     */
    public function getPresences(): Collection
    {
        return $this->presences;
    }

    public function addPresence(Presence $presence): static
    {
        if (!$this->presences->contains($presence)) {
            $this->presences->add($presence);
            $presence->setJoueur($this);
        }

        return $this;
    }

    public function removePresence(Presence $presence): static
    {
        if ($this->presences->removeElement($presence)) {
            // set the owning side to null (unless already changed)
            if ($presence->getJoueur() === $this) {
                $presence->setJoueur(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): static
    {
        // set the owning side of the relation if necessary
        if ($user->getPerson() !== $this) {
            $user->setPerson($this);
        }

        $this->user = $user;

        return $this;
    }
}
