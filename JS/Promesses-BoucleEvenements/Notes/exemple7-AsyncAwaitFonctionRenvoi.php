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
        let idFilm = 1; // on le fixe, ça peut venir de n'importe où

        // on simplifie la fonction qui renvoie la promesse
        // avec async-await car on n'enchaîne pas avec then.
        
        // ici on a un appel à une fonction asynchrone (le code continue après appelAjax)
        // mais à son intérieur le code est synchrone à cause des await.
        // C'est un possible objectif: avoir une suite d'opérations asynchrones enchainées d'une manière synchrone 
        async function appelsAjax() {
            
            let response = await fetch("./obtenirFilm.php?id=" + idFilm);
            // on attend ici...
            let film = await response.json();
            // on attend ici...
            response = await fetch("./obtenirTousFilmsGenre.php?idGenre=" + film.idGenre);
            // on attend ici...
            let films = await response.json();
            // on attend ici...
            return films;

        };

        appelsAjax().then((films) => {
            console.log(`Voici les films:`);
            console.log (films);
        });
        console.log("je continue... sans attendre");
    </script>
</body>

</html>