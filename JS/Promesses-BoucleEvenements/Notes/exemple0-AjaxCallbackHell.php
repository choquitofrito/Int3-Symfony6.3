<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promises</title>
</head>

<body>
    <script>
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "./obtenirFilm.php?id=1"); // appel AJAX .......
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {

                // résultat du premier appel AJAX ...
                let film = JSON.parse(xhr.responseText);
                // console.log(film);
                // on cherche maintenant tous les films de ce genre
                xhr = new XMLHttpRequest();
                xhr.open("GET", "./obtenirTousFilmsGenre.php?idGenre=" + film.idGenre); // appel AJAX .......
                xhr.onreadystatechange = function() {

                    if (xhr.readyState === 4 && xhr.status === 200) {

                        // résultat du deuxième appel
                        let filmsGenre = JSON.parse(xhr.responseText);
                        console.log(filmsGenre);
                        // si on veut utiliser ces données pour faire un autre appel
                        // on commence à créer une structure pyramidale dont on ne
                        // connait pas la fin: le callback hell


                    }
                }
                xhr.send();
            }
        }
        xhr.send();
    </script>
</body>

</html>