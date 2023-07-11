<?php

namespace App\Entity;

use App\Entity\Livre;
use App\Entity\Emprunt;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ExemplaireRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ExemplaireRepository::class)
 */
class Exemplaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("livre:read")
     */
    private $etat;
    
    /**
     * @ORM\ManyToOne(targetEntity=Livre::class, inversedBy="exemplaires")
     */
    private $livre;

    /**
     * @ORM\OneToMany(targetEntity=Emprunt::class, mappedBy="exemplaireEmprunte")
     */
    private $emprunts;

    public function __construct()
    {
        $this->emprunts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
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
     * @return Collection|Emprunt[]
     */
    public function getEmprunts(): Collection
    {
        return $this->emprunts;
    }

    public function addEmprunt(Emprunt $emprunt): self
    {
        if (!$this->emprunts->contains($emprunt)) {
            $this->emprunts[] = $emprunt;
            $emprunt->setExemplaireEmprunte($this);
        }

        return $this;
    }

    public function removeEmprunt(Emprunt $emprunt): self
    {
        if ($this->emprunts->removeElement($emprunt)) {
            // set the owning side to null (unless already changed)
            if ($emprunt->getExemplaireEmprunte() === $this) {
                $emprunt->setExemplaireEmprunte(null);
            }
        }

        return $this;
    }
}
