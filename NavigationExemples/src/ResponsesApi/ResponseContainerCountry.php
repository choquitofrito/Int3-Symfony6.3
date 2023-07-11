<?php

namespace App\ResponsesApi;

// attention
use Symfony\Component\Serializer\Annotation\SerializedName;

use App\Entity\Country;


class ResponseContainerCountry {

    /**
     * @SerializedName ("data")
     * @var Country[]
     */
    private $data;

    /**
     * @return Country[]|null  
     */    
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param Country[] $data
     */
    public function setData(array $data)
    {
        $this->data = $data;

    }
}