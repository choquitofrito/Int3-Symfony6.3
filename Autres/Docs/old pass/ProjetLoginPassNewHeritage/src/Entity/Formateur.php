<?php

namespace App\Entity;

use App\Entity\Utilisateur;

use App\Repository\FormateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormateurRepository::class)]
class Formateur extends Utilisateur // heritage!!
{
 
    // l'id vient de la classe parent
 
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column(type: 'integer')]
    // private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $specialite;

    // hérité
    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }
}
