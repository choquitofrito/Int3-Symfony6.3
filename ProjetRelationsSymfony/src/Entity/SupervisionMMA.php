<?php

namespace App\Entity;

use App\Repository\SupervisionMMARepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SupervisionMMARepository::class)]
class SupervisionMMA
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: EmployeMMA::class, inversedBy: 'supervisionsSuperviseur')]
    private $superviseur;

    #[ORM\ManyToOne(targetEntity: EmployeMMA::class, inversedBy: 'supervisionsSupervisee')]
    private $supervisee;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSuperviseur(): ?EmployeMMA
    {
        return $this->superviseur;
    }

    public function setSuperviseur(?EmployeMMA $superviseur): self
    {
        $this->superviseur = $superviseur;

        return $this;
    }

    public function getSupervisee(): ?EmployeMMA
    {
        return $this->supervisee;
    }

    public function setSupervisee(?EmployeMMA $supervisee): self
    {
        $this->supervisee = $supervisee;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }
}
