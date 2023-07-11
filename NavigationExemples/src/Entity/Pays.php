<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

// attention
use Symfony\Component\Serializer\Annotation\SerializedName;
use App\Entity\Ville;

// annotations:
// Attributes (SerializedName et var)
// methodes get et set (return et param)
// rajouter méthode SET 


/**
 * @ORM\Entity(repositoryClass=PaysRepository::class)
 */
class Pays
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @SerializedName ("country")
     * @var string
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Ville::class, mappedBy="pays",cascade={"persist"})
     */
    private $villes;


    /**
     * @SerializedName ("cities")
     * @var array
     */
    private $tempVilles;


    /**
     * @return array | null
     */    
    public function gettempVilles()
    {
        return $this->tempVilles;
    }



    // cette méthode doit remplir la collection de la rélation
    // à partir de l'array, en créant un objet pour chaque élément
    // de l'array. Le deserializer ne sait pas faire 
    // la correspondance entre un array indexé de strings (cities) et 
    // un array d'objets Ville
    // Le cas est différent à la transformation de l'array d'objets
    // data, car chaque element de data est un objet, pas un string ou 
    // un int.
    // En gros, on ne peut pas deserialiser un array de scalar 
    // en array d'objets automatiquement. Dans cette méthode
    // on parcourt l'array de scalar et on crée un objet 
    // pour chaque élément 

    /**
     * @param array $tempVilles
     */
    public function settempVilles($tempVilles)
    {

        $this->tempVilles = $tempVilles;

        // créer un objet pour chaque élément de l'array cities
        foreach ($this->tempVilles as $cityString){
            $this->addVille(new Ville(['nom'=>$cityString]));
        }
        

        return $this;
    }




    

    public function __construct()
    {

        $this->villes = new ArrayCollection();
        
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Get the value of nom
     *
     * @return  string | null
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @param  string  $nom
     *
     */
    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Ville[]|null
     */
    public function getVilles()
    {
        return $this->villes;
    }


    public function addVille(Ville $ville): self
    {
        if (!$this->villes->contains($ville)) {
            $this->villes[] = $ville;
            $ville->setPays($this);
        }

        return $this;
    }

    public function removeVille(Ville $ville): self
    {
        if ($this->villes->removeElement($ville)) {
            // set the owning side to null (unless already changed)
            if ($ville->getPays() === $this) {
                $ville->setPays(null);
            }
        }

        return $this;
    }



    /**
     * @param Ville[]  $villes
     */
    public function setVilles(array $villes)
    {
        $this->villes = $villes;
    }


}
