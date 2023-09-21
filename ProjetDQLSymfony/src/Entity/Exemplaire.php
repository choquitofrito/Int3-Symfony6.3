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
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $etat = null;

    #[ORM\ManyToOne(inversedBy: 'exemplaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Livre $livre = null;

    #[ORM\OneToMany(mappedBy: 'exemplaire', targetEntity: Emprunt::class, orphanRemoval: true)]
    private Collection $emprunts;


    public function hydrate (array $vals){
        foreach ($vals as $cle => $valeur){
            if (isset ($vals[$cle])){
                $nomSet = "set" . ucfirst($cle);
                $this->$nomSet ($valeur);
            }
        }
    }
    public function __construct(array $init =[])
    {
        $this->hydrate($init);
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

    public function setEtat(?string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getLivre(): ?Livre
    {
        return $this->livre;
    }

    public function setLivre(?Livre $livre): static
    {
        $this->livre = $livre;

        return $this;
    }

    /**
     * @return Collection<int, Emprunt>
     */
    public function getEmprunts(): Collection
    {
        return $this->emprunts;
    }

    public function addEmprunt(Emprunt $emprunt): static
    {
        if (!$this->emprunts->contains($emprunt)) {
            $this->emprunts->add($emprunt);
            $emprunt->setExemplaire($this);
        }

        return $this;
    }

    public function removeEmprunt(Emprunt $emprunt): static
    {
        if ($this->emprunts->removeElement($emprunt)) {
            // set the owning side to null (unless already changed)
            if ($emprunt->getExemplaire() === $this) {
                $emprunt->setExemplaire(null);
            }
        }

        return $this;
    }
}
