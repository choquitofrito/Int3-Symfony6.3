<?php

namespace App\Entity;

use App\Repository\PersonneHRepository;
use Doctrine\ORM\Mapping as ORM;


// n'oubliez pas d'importer ces annotations
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;




// ancien format annotations, ne fonctionne plus par défaut
// /**
//  * @ORM\Entity(repositoryClass=PersonneHRepository::class)
//  * @InheritanceType("SINGLE_TABLE")
//  * @DiscriminatorColumn(name="discr",type="string")
//  * @DiscriminatorMap({"personneH"="PersonneH","auteurH"="AuteurH","clientH"="ClientH"})]
//  */

// ATTENTION!: format attributs PHP
#[ORM\Entity(repositoryClass: PersonneHRepository::class)]
#[InheritanceType("SINGLE_TABLE")]
#[DiscriminatorColumn(name: "discr", type: "string")]
#[DiscriminatorMap(["personne" => "PersonneH", "auteurH" => "AuteurH", "clientH" => "ClientH"])]
class PersonneH
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $prenom;

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
}
