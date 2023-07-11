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
        // exemples d'utilisation de l'API FETCH

        let idFilm = 1; // on le fixe, ça peut venir de n'importe où

        fetch("./obtenirFilm.php?id=" + idFilm)
            .then((reponse) => { // reponse est un objet de la class Reponse. Le then "lance" (consomme) la promesse fournie par .fetch
                return reponse.json(); // la méthode json() renvoie un objet de la classe Promise, pas une chaîne json. 
            })
            .then((res) => { // le then "lance" (consomme) la promesse fournie par .json(). Dans son code interne, 
                // le "resolve" de cette promesse renvoie la chaîne (string) JSON. 
                console.log(res);
                // return (res);
            }) // info complementaire: tout THEN renvoie une promesse. 
        // Si on renvoie une valeur simple (comme "res" ci-dessous entre commentaires) 
        // then génére une promesse dont le resolve es la valeur du return.
        // On verrait "Object" dans le code suivant si on enleve tous les commentaires. 
        // Si on laisse le return commenté, la promesse resoudra en "undefined".
        // .then((res) => console.log(typeof(res)));

        // le code simplifié (et le plus utilisé :D) serait:
        fetch("./obtenirFilm.php?id=" + idFilm)
            .then(reponse => reponse.json(),
                err => { // ce callback onRejected est lancé s'il y a une erreur de reseau
                    // Testez en mettant http://casdcasdfasdfaf.com dans l'URL.

                    console.log(`Il y a eu une érreur de réseau`);
                    throw new Error(err); // on 'l'envoie' au catch, qui va le traiter
                }) // dans una arrow function: si un seul param, pas besoin de parenthéses. Si une seule instruction return, pas besoin des accolades
            .then(res => console.log(res) // on est en train de faire un "return console.log (res)", mais ce n'est pas un problème
            )
            // .then (res => console.log (res)) // ceci donnerai un "undefined". La valeur de résolution de la dernière promesse n'est pas "res" mais "console.log (res)"
            .catch(error => console.log(`Voici l'erreur: ${error}`));


        // à l'intérieur du code on aura quelque chose comme ci-dessous:
        //     const fetch = (url) => {
        //         .
        //         // code ajax....
        //         const promesse = new Promise ((resolve, reject) =>{
        //                    resolve (new Response (....))
        //         }
        //         .
        //         .
        //          return promesse;
        //      }

        //     const json = (...) { // json est une méthode de l'objet Response
        //         .
        //         .
        //         const promesse = new Promise ((resolve, reject) =>{
        //             resolve (données) // resolve de la promesse 
        //                              // donnera du JSON
        //         
        //         }
        //         return promesse;
        //      }
    </script>
</body>

</html>