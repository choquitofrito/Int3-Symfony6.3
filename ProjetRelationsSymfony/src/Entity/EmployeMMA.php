<?php

namespace App\Entity;

use App\Repository\EmployeMMARepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeMMARepository::class)]
class EmployeMMA
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToMany(mappedBy: 'superviseur', targetEntity: SupervisionMMA::class)]
    private $supervisionsSuperviseur;

    #[ORM\OneToMany(mappedBy: 'supervisee', targetEntity: SupervisionMMA::class)]
    private $supervisionsSupervisee;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $prenom;

    public function __construct()
    {
        $this->supervisionsSuperviseur = new ArrayCollection();
        $this->supervisionsSupervisee = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|SupervisionMMA[]
     */
    public function getSupervisionsSuperviseur(): Collection
    {
        return $this->supervisionsSuperviseur;
    }

    public function addSupervisionsSuperviseur(SupervisionMMA $supervisionsSuperviseur): self
    {
        if (!$this->supervisionsSuperviseur->contains($supervisionsSuperviseur)) {
            $this->supervisionsSuperviseur[] = $supervisionsSuperviseur;
            $supervisionsSuperviseur->setSuperviseur($this);
        }

        return $this;
    }

    public function removeSupervisionsSuperviseur(SupervisionMMA $supervisionsSuperviseur): self
    {
        if ($this->supervisionsSuperviseur->removeElement($supervisionsSuperviseur)) {
            // set the owning side to null (unless already changed)
            if ($supervisionsSuperviseur->getSuperviseur() === $this) {
                $supervisionsSuperviseur->setSuperviseur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SupervisionMMA[]
     */
    public function getSupervisionsSupervisee(): Collection
    {
        return $this->supervisionsSupervisee;
    }

    public function addSupervisionsSupervisee(SupervisionMMA $supervisionsSupervisee): self
    {
        if (!$this->supervisionsSupervisee->contains($supervisionsSupervisee)) {
            $this->supervisionsSupervisee[] = $supervisionsSupervisee;
            $supervisionsSupervisee->setSupervisee($this);
        }

        return $this;
    }

    public function removeSupervisionsSupervisee(SupervisionMMA $supervisionsSupervisee): self
    {
        if ($this->supervisionsSupervisee->removeElement($supervisionsSupervisee)) {
            // set the owning side to null (unless already changed)
            if ($supervisionsSupervisee->getSupervisee() === $this) {
                $supervisionsSupervisee->setSupervisee(null);
            }
        }

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }
}
