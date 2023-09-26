<?php

// renvoie un film à partir de son id

$id = $_GET['id'];

$films = [ 
    ['id' => 1,
    'titre' => 'Taxi Driver',
    'duree' => 120, 
    'idGenre' => 5],
    ['id' => 2,
    'titre' => '1984',
    'duree' => 130,
    'idGenre' => 3]
];

// fausse attente de 3 sec. :)
// sleep (3);

$i = 0;
$found = false;
while ($i < count($films) && $id != $films[$i]['id']){
    $i++;
}
if ($i<count($films)) {
    echo json_encode($films[$i]);
}
?>