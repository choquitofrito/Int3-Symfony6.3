<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
        const somme = (v1, v2) => {
            return v1 + v2;
        }

        const sust = (v1, v2) => {
            return v1 - v2;
        }

        const mult = (v1, v2) => {
            return v1 * v2;
        }

        const div = (v1, v2) => {
            return v1 / v2;
        }

        // Les promesses permettent de gérer les erreurs de manière plus propre et de chaîner des opérations asynchrones de manière plus simple
        // Nous allons le montrer avec un exemple simple qui n'utilise 
        // même pas un code asynchrone mais qui est assez clair.

        // exemple d'enchaînement avec de promesses
        console.log("exemple promesse");

        // cette fonction reçoit les deux valeurs pour opérer et l'opération à réaliser 
        // (une fonction = callback)
        // MAIS elle ne renvoie pas le résultat d'appliquer la fonction:
        // elle crée et renvoie une promesse à consommer avec "then".
        // C'est à l'intérieur du then où crée la fonctión qui reçoit et utilise la valeur 
        const calculatriceP = (v1, v2, callback) => {
            const promesse = new Promise((resolve, reject) => {
                resolve(callback(v1, v2));
            });
            return promesse;
        }

        // au revoir callback hell! pas de code pyramide mais vertical
        // à chaque then on reçoit une promesse auquelle on peut appliquer la fonction .then à nouveau
        calculatriceP(20, 5, somme)
            .then((res) => {
                return (calculatriceP(2, res, mult));
            })
            .then((res) => {
                return (calculatriceP(100, res, div))
            })
            .then((res) => {
                console.log(res);
            })
    </script>

</body>

</html>