<?php

namespace App\Services;

class Bonjour
{

    public function __construct(private string $langue)
    {
        $this->langue = $langue;
    }
    // service contenant un paramètre
    public function obtenirMessage()
    {
        // array fake... juste pour essayer le service
        $messages = [
            'fr' => 'Bonjour à tous!!',
            'en' => 'Hello everybody!!'
        ];
        // on obtient le paramètre du propre service
        $langue = $this->langue;
        return ($messages[$langue]);
    }
}
