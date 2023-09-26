<?php

namespace App\Entity;

use App\Repository\PartieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartieRepository::class)]
class Partie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'boolean')]
    private $actif;

    #[ORM\ManyToMany(targetEntity: Joueur::class, mappedBy: 'partiesParticipation')]
    private $participants;

    #[ORM\ManyToOne(targetEntity: Joueur::class, inversedBy: 'partiesCreation')]
    #[ORM\JoinColumn(nullable: false)]
    private $createur;


    public function __construct()
    {
        $this->participants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * @return Collection|Joueur[]
     */
    public function getParticipants(): Collection
    {
        return $this->participants;
    }

    public function addParticipant(Joueur $participant): self
    {
        if (!$this->participants->contains($participant)) {
            $this->participants[] = $participant;
            $participant->addPartieParticipation($this);
        }

        return $this;
    }

    public function removeParticipant(Joueur $participant): self
    {
        if ($this->participants->removeElement($participant)) {
            $participant->removePartieParticipation($this);
        }

        return $this;
    }

    public function getCreateur(): ?Joueur
    {
        return $this->createur;
    }

    public function setCreateur(?Joueur $createur): self
    {
        $this->createur = $createur;

        return $this;
    }

 
}
