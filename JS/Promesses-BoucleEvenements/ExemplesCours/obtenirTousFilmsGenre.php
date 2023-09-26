<?php



// contenu fake, on renvoie à chaque fois la même liste.
$filmsGenre1 = [ 
    ['id' => 30,
    'titre' => 'Godfather',
    'duree' => 120, 
    'idGenre' => 1],
    ['id' => 32,
    'titre' => 'Vertigo',
    'duree' => 130,
    'idGenre' => 1]
];

echo json_encode ($filmsGenre1);
