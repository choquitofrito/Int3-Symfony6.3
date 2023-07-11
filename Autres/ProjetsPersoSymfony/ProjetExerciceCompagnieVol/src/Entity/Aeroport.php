<?php

namespace App\Entity;

use App\Repository\AeroportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AeroportRepository::class)
 */
class Aeroport
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity=Vol::class, mappedBy="aeroportDepart")
     */
    private $volsDepart;

    /**
     * @ORM\OneToMany(targetEntity=Vol::class, mappedBy="aeroportArrivee")
     */
    private $volsArrivee;


    public function __construct()
    {
        $this->volsDepart = new ArrayCollection();
        $this->volsArrivee = new ArrayCollection();
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection|Vol[]
     */
    public function getVolsDepart(): Collection
    {
        return $this->volsDepart;
    }

    public function addVolsDepart(Vol $volsDepart): self
    {
        if (!$this->volsDepart->contains($volsDepart)) {
            $this->volsDepart[] = $volsDepart;
            $volsDepart->setAeroportDepart($this);
        }

        return $this;
    }

    public function removeVolsDepart(Vol $volsDepart): self
    {
        if ($this->volsDepart->removeElement($volsDepart)) {
            // set the owning side to null (unless already changed)
            if ($volsDepart->getAeroportDepart() === $this) {
                $volsDepart->setAeroportDepart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vol[]
     */
    public function getVolsArrivee(): Collection
    {
        return $this->volsArrivee;
    }

    public function addVolsArrivee(Vol $volsArrivee): self
    {
        if (!$this->volsArrivee->contains($volsArrivee)) {
            $this->volsArrivee[] = $volsArrivee;
            $volsArrivee->setAeroportArrivee($this);
        }

        return $this;
    }

    public function removeVolsArrivee(Vol $volsArrivee): self
    {
        if ($this->volsArrivee->removeElement($volsArrivee)) {
            // set the owning side to null (unless already changed)
            if ($volsArrivee->getAeroportArrivee() === $this) {
                $volsArrivee->setAeroportArrivee(null);
            }
        }

        return $this;
    }

}
