<?php

namespace App\Entity;

use App\Entity\Vol;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AeroportRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;


#[ORM\Entity(repositoryClass: AeroportRepository::class)]
class Aeroport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;

    #[ORM\OneToMany(mappedBy: 'aeroportDepart', targetEntity: Vol::class)]
    private Collection $volsDepart;

    #[ORM\OneToMany(mappedBy: 'aeroportArrivee', targetEntity: Vol::class)]
    private Collection $volsArrivee;

    public function __construct(array $vals = [])
    {
        $this->hydrate($vals);
        $this->volsDepart = new ArrayCollection();
        $this->volsArrivee = new ArrayCollection();
    }

    public function hydrate(array $vals = [])
    {
        foreach ($vals as $key => $val) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($val);
            }
        }
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection<int, Vol>
     */
    public function getVolsDepart(): Collection
    {
        return $this->volsDepart;
    }

    public function addVolDepart(Vol $volsDepart): self
    {
        if (!$this->volsDepart->contains($volsDepart)) {
            $this->volsDepart->add($volsDepart);
            $volsDepart->setAeroportDepart($this);
        }

        return $this;
    }

    public function removeVolDepart(Vol $volsDepart): self
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
     * @return Collection<int, Vol>
     */
    public function getVolsArrivee(): Collection
    {
        return $this->volsArrivee;
    }

    public function addVolArrivee(Vol $volsArrivee): self
    {
        if (!$this->volsArrivee->contains($volsArrivee)) {
            $this->volsArrivee->add($volsArrivee);
            $volsArrivee->setAeroportArrivee($this);
        }

        return $this;
    }

    public function removeVolArrivee(Vol $volsArrivee): self
    {
        if ($this->volsArrivee->removeElement($volsArrivee)) {
            // set the owning side to null (unless already changed)
            if ($volsArrivee->getAeroportArrivee() === $this) {
                $volsArrivee->setAeroportArrivee(null);
            }
        }

        return $this;
    }

    public function addVolsDepart(Vol $volsDepart): self
    {
        if (!$this->volsDepart->contains($volsDepart)) {
            $this->volsDepart->add($volsDepart);
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

    public function addVolsArrivee(Vol $volsArrivee): self
    {
        if (!$this->volsArrivee->contains($volsArrivee)) {
            $this->volsArrivee->add($volsArrivee);
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
