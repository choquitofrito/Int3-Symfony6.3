<?php

namespace App\Entity;

use App\Repository\AeroportRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;


#[Entity(repositoryClass: AeroportRepository::class)]
class Aeroport
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: "integer")]
    private $id;

    #[Column(type: "string", length: 255)]
    private $nom;

    #[Column(type: "string", length: 255)]
    private $code;

    #[Column(type: "date", nullable: true)]
    private $dateMiseEnService;

    #[Column(type: "time", nullable: true)]
    private $heureMiseEnService;

    #[Column(type: "text")]
    private $description;

    public function hydrate(array $init)
    {
        foreach ($init as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function __construct(array $arrayInit = [])
    {
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

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getDateMiseEnService(): ?\DateTimeInterface
    {
        return $this->dateMiseEnService;
    }

    public function setDateMiseEnService(?\DateTimeInterface $dateMiseEnService): self
    {
        $this->dateMiseEnService = $dateMiseEnService;

        return $this;
    }

    public function getHeureMiseEnService(): ?\DateTimeInterface
    {
        return $this->heureMiseEnService;
    }

    public function setHeureMiseEnService(?\DateTimeInterface $heureMiseEnService): self
    {
        $this->heureMiseEnService = $heureMiseEnService;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
