<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpruntRepository::class)
 */
class Emprunt
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateEmprunt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateRetour;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaires;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="emprunts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $clientEmprunteur;

    /**
     * @ORM\ManyToOne(targetEntity=Exemplaire::class, inversedBy="emprunts")
     */
    private $exemplaireEmprunte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEmprunt(): ?\DateTimeInterface
    {
        return $this->dateEmprunt;
    }

    public function setDateEmprunt(?\DateTimeInterface $dateEmprunt): self
    {
        $this->dateEmprunt = $dateEmprunt;

        return $this;
    }

    public function getDateRetour(): ?\DateTimeInterface
    {
        return $this->dateRetour;
    }

    public function setDateRetour(?\DateTimeInterface $dateRetour): self
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    public function getCommentaires(): ?string
    {
        return $this->commentaires;
    }

    public function setCommentaires(?string $commentaires): self
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    public function getClientEmprunteur(): ?Client
    {
        return $this->clientEmprunteur;
    }

    public function setClientEmprunteur(?Client $clientEmprunteur): self
    {
        $this->clientEmprunteur = $clientEmprunteur;

        return $this;
    }

    public function getExemplaireEmprunte(): ?Exemplaire
    {
        return $this->exemplaireEmprunte;
    }

    public function setExemplaireEmprunte(?Exemplaire $exemplaireEmprunte): self
    {
        $this->exemplaireEmprunte = $exemplaireEmprunte;

        return $this;
    }
}
