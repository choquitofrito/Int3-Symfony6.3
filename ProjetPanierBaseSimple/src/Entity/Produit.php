<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $prix;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lien;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: DetailCommande::class, cascade: ['persist', 'remove'])]
    private $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(?string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * @return Collection<int, DetailCommande>
     */
    public function getDetailsCommande(): Collection
    {
        return $this->details;
    }

    public function addDetail(DetailCommande $details): self
    {
        if (!$this->details->contains($details)) {
            $this->details[] = $details;
            $details->setProduit($this);
        }

        return $this;
    }

    public function removeDetail(DetailCommande $details): self
    {
        if ($this->details->removeElement($details)) {
            // set the owning side to null (unless already changed)
            if ($details->getProduit() === $this) {
                $details->setProduit(null);
            }
        }

        return $this;
    }
}
