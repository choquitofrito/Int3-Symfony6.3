<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $prenom;

    #[ORM\Column(type: 'text', nullable: true)]
    private $email;

    #[ORM\OneToOne(mappedBy: 'utilisateur', targetEntity: Avatar::class, cascade: ['persist', 'remove'])]
    private $avatar;

    #[ORM\ManyToOne(targetEntity: Adresse::class, inversedBy: 'clients')]
    private $adresse;

    
    
    // crée par nous mêmes, ainsi que le constructeur (vérifiez!)
    public function hydrate(array $init)
    {
        foreach ($init as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // constructeur modifié pour faire appel à hydrate
    public function __construct($arrayInit = [])
    {
        $this->exemplaires = new ArrayCollection();
        // appel au hydrate
        $this->hydrate($arrayInit);
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAvatar(): ?Avatar
    {
        return $this->avatar;
    }

    public function setAvatar(?Avatar $avatar): self
    {
        // unset the owning side of the relation if necessary
        if ($avatar === null && $this->avatar !== null) {
            $this->avatar->setUtilisateur(null);
        }

        // set the owning side of the relation if necessary
        if ($avatar !== null && $avatar->getUtilisateur() !== $this) {
            $avatar->setUtilisateur($this);
        }

        $this->avatar = $avatar;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    
}
