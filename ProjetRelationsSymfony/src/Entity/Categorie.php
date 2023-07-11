<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nom;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'sousCategorie')]
    private $categorieParent;

    #[ORM\OneToMany(mappedBy: 'categorieParent', targetEntity: self::class)]
    private $sousCategorie;

    public function __construct()
    {
        $this->sousCategorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCategorieParent(): ?self
    {
        return $this->categorieParent;
    }

    public function setCategorieParent(?self $categorieParent): self
    {
        $this->categorieParent = $categorieParent;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getSousCategorie(): Collection
    {
        return $this->sousCategorie;
    }

    public function addSousCategorie(self $sousCategorie): self
    {
        if (!$this->sousCategorie->contains($sousCategorie)) {
            $this->sousCategorie[] = $sousCategorie;
            $sousCategorie->setCategorieParent($this);
        }

        return $this;
    }

    public function removeSousCategorie(self $sousCategorie): self
    {
        if ($this->sousCategorie->removeElement($sousCategorie)) {
            // set the owning side to null (unless already changed)
            if ($sousCategorie->getCategorieParent() === $this) {
                $sousCategorie->setCategorieParent(null);
            }
        }

        return $this;
    }
}
