<?php

// Classe qui contient des annotations pour adapter le Json de l'API vers l'entité
// message: un string - message (le nim dans le json - SerializedName est "message")
// data: le contenu, qui sera deserialisé sur la forme d'un array de Pays (le nim dans le json est "data")
// (on peut mettre le nim de notre choix dans l'entité)
// (voir les annotations dans Pays)

namespace App\ResponsesApi;


// attention
use Symfony\Component\Serializer\Annotation\SerializedName;

use App\Entity\Pays;

class RacineResponse
{

    /**
     * @SerializedName ("msg")
     * @var string
     */
    private $message;

    /**
     * @SerializedName ("data")
     * @var Pays[]
     */
    private $data;



    /** 
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }


    /**
     * @return Pays[]|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param Pays[] $data
     */
    public function setData(array $data)
    {
        
        $this->data = $data;
        
    }
}
