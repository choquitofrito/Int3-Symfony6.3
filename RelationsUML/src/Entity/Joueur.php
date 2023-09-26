<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JoueurRepository::class)]
class Joueur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\ManyToMany(targetEntity: Partie::class, inversedBy: 'participants')]
    private $partiesParticipation;

    #[ORM\OneToMany(mappedBy: 'createur', targetEntity: Partie::class, orphanRemoval: true)]
    private $partiesCreation;


    public function __construct()
    {
        $this->partiesParticipation = new ArrayCollection();
        $this->partiesCreation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Partie[]
     */
    public function getPartiesParticipation(): Collection
    {
        return $this->partiesParticipation;
    }

    public function addPartieParticipation(Partie $partiesParticipation): self
    {
        if (!$this->partiesParticipation->contains($partiesParticipation)) {
            $this->partiesParticipation[] = $partiesParticipation;
        }

        return $this;
    }

    public function removePartieParticipation(Partie $partiesParticipation): self
    {
        $this->partiesParticipation->removeElement($partiesParticipation);

        return $this;
    }

    /**
     * @return Collection|Partie[]
     */
    public function getPartiesCreation(): Collection
    {
        return $this->partiesCreation;
    }

    public function addPartieCreation(Partie $partiesCreation): self
    {
        if (!$this->partiesCreation->contains($partiesCreation)) {
            $this->partiesCreation[] = $partiesCreation;
            $partiesCreation->setCreateur($this);
        }

        return $this;
    }

    public function removePartieCreation(Partie $partiesCreation): self
    {
        if ($this->partiesCreation->removeElement($partiesCreation)) {
            // set the owning side to null (unless already changed)
            if ($partiesCreation->getCreateur() === $this) {
                $partiesCreation->setCreateur(null);
            }
        }

        return $this;
    }

}
