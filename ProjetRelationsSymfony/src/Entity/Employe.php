<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'superviseurs')]
    private $supervises;

    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'supervises')]
    private $superviseurs;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $prenom;

    public function __construct()
    {
        $this->supervises = new ArrayCollection();
        $this->superviseurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|self[]
     */
    public function getSupervises(): Collection
    {
        return $this->supervises;
    }

    public function addSupervise(self $supervise): self
    {
        if (!$this->supervises->contains($supervise)) {
            $this->supervises[] = $supervise;
        }

        return $this;
    }

    public function removeSupervise(self $supervise): self
    {
        $this->supervises->removeElement($supervise);

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getSuperviseurs(): Collection
    {
        return $this->superviseurs;
    }

    public function addSuperviseur(self $superviseur): self
    {
        if (!$this->superviseurs->contains($superviseur)) {
            $this->superviseurs[] = $superviseur;
            $superviseur->addSupervise($this);
        }

        return $this;
    }

    public function removeSuperviseur(self $superviseur): self
    {
        if ($this->superviseurs->removeElement($superviseur)) {
            $superviseur->removeSupervise($this);
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
