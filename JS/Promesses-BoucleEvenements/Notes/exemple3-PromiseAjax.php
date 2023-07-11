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
        const promesseObtenirFilm = new Promise((resolve, reject) => {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "./obtenirFilm.php?id=1");
            xhr.onreadystatechange = function() {
                // success: resolve
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let res = JSON.parse(xhr.responseText);
                    // ok! on appel "resolve" et on lui envoie le résultat obtenu 
                    // avec AJAX à la fonction
                    // Resolve est un callback reçu en paramètre et défini 
                    // au moment de consommer la promesse (section 'then')
                    resolve(res);
                    // Observez la différence: ici on n'est pas en train de définir "quoi faire"
                    // car on n'a pas défini encore le callback resolve.
                    // On va le faire quand on consomme la promesse
                };
                if (xhr.status != 200) {
                    // erreur : reject. On peut utiliser le résultat 
                    // quand on consomme la promesse (section 'catch')
                    reject("error ajax");
                }
            }
            xhr.send();
        });

        // exemple base pour afficher juste le film
        let idFilm = 1; // on le fixe, ça peut venir de n'importe où

        // consommation de la promesse!
        promesseObtenirFilm
            .then(
                (resResolve) => {
                    console.log(resResolve);
                },
                (resReject) => {
                    console.log(resReject);
                }
            )
            .catch((error) => { // le catch est lancé si on fait appel à reject 
                // et on n'a pas défini une fonction onReject 
                // dans le then (ce cas!), ou si une autre erreur 
                // s'est produite pendant l'exécution
                console.log(error);
            });
    </script>
</body>

</html>