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
        // Si on veut généraliser le code pour pouvoir 
        // faire appel à une URL de notre choix,
        // on peut juste créer une fonction qui reçoit 
        // l'URL et renvoie la promesse "personnalisée"

        // La fonction appelAjax n'utilise pas le résultat 
        // de l'appel AJAX elle même 

        // appelAJAX crée et renvoie un promesse qui: 
        // - fait l'appel AJAX 
        // - fixe les résultats por resolve (succés) et reject (échec)
        // resolve et reject sont définies plus tard (then)

        const appelAjax = (url) => {

            // crée et envoie une promesse, consommée à l'extérieur
            const promesseAjax = new Promise((resolve, reject) => {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", url);
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
            // renvoie la promesse
            return promesseAjax;
        }

        // exemple base pour afficher juste le film
        let idFilm = 1; // on le fixe, ça peut venir de n'importe où

        // consommation de la promesse pour obtenir
        // uniquement le film
        appelAjax("./obtenirFilm.php?id=" + idFilm)
            .then(
                (resAjax) => {
                    console.log(resAjax);
                },
                (resReject) => {
                    console.log("erreur!");
                })
            .catch(
                (erreur) => {
                    // le catch est lancé si on fait appel à reject 
                    // et on n'a pas défini une fonction onReject 
                    // dans le then (ce cas!), ou si une autre erreur s'est produite
                    console.log("erreur capturé par catch");
                    console.log(erreur);
                }
            );


        // consommation de la promesse pour obtenir
        // obtenir tous le films du même genre que le film choisi.
        // Au revoir Callback Hell!
        appelAjax("./obtenirFilm.php?id=" + idFilm)
            .then((film) => {
                return appelAjax("./obtenirTousFilmsGenre.php?idGenre=" + film.idGenre);
                // cette nouvel appel renvoie une promesse aussi, je peux enchainer avec then
                // attention à éviter le callback hell: on pourrait être temptés de faire:
                // appelAjax("./obtenirTousFilmsGenre.php?idGenre=" + idGenre)
                // .then ..... 
                // mais on entre vite dans le callback hell
            })
            .then((res) => {
                console.log(res);
                // ou un autre appelAjax qui aura son .then en bas...
                // return appelAjax("./uneAutreAction.php?id=" + ...);

            })
        // .then((resX) => {
        //     console.log(resX);
        // })
        // .then ()
        // .then ()
        // .then .....
        // .catch((error) => {
        //     console.log(error);
        // });
    </script>
</body>

</html>