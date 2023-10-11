<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $categorieAge = null;

    #[ORM\Column(length: 20)]
    private ?string $categorieGenre = null;



    #[ORM\ManyToMany(targetEntity: Evenement::class, inversedBy: 'equipes')]
    private Collection $evenements;

    #[ORM\ManyToMany(targetEntity: Personne::class, mappedBy: 'equipesCoaches')]
    private Collection $coaches;

    #[ORM\ManyToMany(targetEntity: Personne::class, mappedBy: 'equipesJoueur')]
    private Collection $joueurs;



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

        $this->evenements = new ArrayCollection();
        $this->coaches = new ArrayCollection();
        $this->joueurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCategorieAge(): ?int
    {
        return $this->categorieAge;
    }

    public function setCategorieAge(int $categorieAge): static
    {
        $this->categorieAge = $categorieAge;

        return $this;
    }

    public function getCategorieGenre(): ?string
    {
        return $this->categorieGenre;
    }

    public function setCategorieGenre(string $categorieGenre): static
    {
        $this->categorieGenre = $categorieGenre;

        return $this;
    }



    /**
     * @return Collection<int, Evenement>
     */
    public function getEvenement(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): static
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements->add($evenement);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): static
    {
        $this->evenements->removeElement($evenement);

        return $this;
    }

    /**
     * @return Collection<int, Personne>
     */
    public function getCoaches(): Collection
    {
        return $this->coaches;
    }

    public function addCoach(Personne $coach): static
    {
        if (!$this->coaches->contains($coach)) {
            $this->coaches->add($coach);
            $coach->addEquipesCoach($this);
        }

        return $this;
    }

    public function removeCoach(Personne $coach): static
    {
        if ($this->coaches->removeElement($coach)) {
            $coach->removeEquipesCoach($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Personne>
     */
    public function getJoueurs(): Collection
    {
        return $this->joueurs;
    }

    public function addJoueur(Personne $joueur): static
    {
        if (!$this->joueurs->contains($joueur)) {
            $this->joueurs->add($joueur);
            $joueur->addEquipesJoueur($this);
        }

        return $this;
    }

    public function removeJoueur(Personne $joueur): static
    {
        if ($this->joueurs->removeElement($joueur)) {
            $joueur->removeEquipesJoueur($this);
        }

        return $this;
    }
}
