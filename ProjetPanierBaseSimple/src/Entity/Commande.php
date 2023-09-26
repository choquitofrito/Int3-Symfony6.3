<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $dateCreation;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $etat;


    #[ORM\Column(type: 'date', nullable: true)]
    private $dateModification;

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: DetailCommande::class, orphanRemoval: true, cascade: ['persist', 'remove'])]
    private $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
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

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->dateModification;
    }

    public function setDateModification(?\DateTimeInterface $dateModification): self
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * @return Collection<int, DetailCommande>
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }


    // si le détail existe déjà, on doit incrementer la quantité.
    // la méthode equals compare deux détails (méthode dans DetailCommande)
    public function addDetail(DetailCommande $detailRajouter): self
    {
        // on doit parcourir tous les détails pour voir si le produit du détail à rajouter se trouve déjà dans la commande.
        // Si c'est le cas, on doit augmenter la quantité du détail du produit et pas le rajouter à nouveau
        // ex: on a déjà 5 gsms dans la commande: si on rajoute 3 on doit avoir un seul détail de 8 gsms et pas deux détails de 5 et 3
        foreach ($this->getDetails() as $detailExistant) {
            if ($detailRajouter->equals($detailExistant)) {
                // le produit est déjà là
                $detailExistant->setQuantite($detailExistant->getQuantite() + $detailRajouter->getQuantite());
                return $this;
            }    
        }
        // le produit n'est pas encore dans la commande
        $this->details[] = $detailRajouter;
        $detailRajouter->setCommande($this);

        return $this;
    }

    public function removeDetail(DetailCommande $detail): self
    {
        if ($this->details->removeElement($detail)) {
            // set the owning side to null (unless already changed)
            if ($detail->getCommande() === $this) {
                $detail->setCommande(null);
            }
        }

        return $this;
    }

    // pour effacer tous les détails
    public function removeDetails(): self
    {
        foreach ($this->getDetails() as $detail) {
            $this->removeDetail($detail);
        }
        return ($this);
    }

    // obtenir le prix de la commande
    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->getDetails() as $detail){
            $total = $total + $detail->getTotal();
        }
        return $total;
    }
}
