<?php

namespace App\Entity;

use App\Repository\ExemplaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExemplaireRepository::class)]
class Exemplaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $etat;

    #[ORM\ManyToOne(targetEntity: Livre::class, inversedBy: 'exemplaires')]
    #[ORM\JoinColumn(nullable: false)]
    private $livre;

    #[ORM\ManyToMany(targetEntity: Client::class, mappedBy: 'emprunts')]
    private $emprunteurs;

    public function __construct()
    {
        $this->emprunteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getLivre(): ?Livre
    {
        return $this->livre;
    }

    public function setLivre(?Livre $livre): self
    {
        $this->livre = $livre;

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getEmprunteurs(): Collection
    {
        return $this->emprunteurs;
    }

    public function addEmprunteur(Client $emprunteur): self
    {
        if (!$this->emprunteurs->contains($emprunteur)) {
            $this->emprunteurs[] = $emprunteur;
            $emprunteur->addEmprunt($this);
        }

        return $this;
    }

    public function removeEmprunteur(Client $emprunteur): self
    {
        if ($this->emprunteurs->removeElement($emprunteur)) {
            $emprunteur->removeEmprunt($this);
        }

        return $this;
    }
}
