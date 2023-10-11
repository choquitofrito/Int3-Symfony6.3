<?php

namespace App\Entity;

use App\Repository\PresenceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PresenceRepository::class)]
class Presence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\Column(length: 255)]
    private ?string $complement = null;

    #[ORM\ManyToOne(inversedBy: 'presences')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Evenement $evenement = null;

    #[ORM\ManyToOne(inversedBy: 'presences')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Personne $joueur = null;

    public function hydrate(array $vals)
    {
        foreach ($vals as $cle => $valeur) {
            if (isset($vals[$cle])) {
                $nomSet = "set" . ucfirst($cle);
                $this->$nomSet($valeur);
            }
        }
    }
    public function __construct(array $init = [])
    {
        $this->hydrate($init);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getComplement(): ?string
    {
        return $this->complement;
    }

    public function setComplement(string $complement): static
    {
        $this->complement = $complement;

        return $this;
    }


    public function getEvenement(): ?Evenement
    {
        return $this->evenement;
    }

    public function setEvenement(?Evenement $evenement): static
    {
        $this->evenement = $evenement;

        return $this;
    }

    public function getJoueur(): ?Personne
    {
        return $this->joueur;
    }

    public function setJoueur(?Personne $joueur): static
    {
        $this->joueur = $joueur;

        return $this;
    }
}
