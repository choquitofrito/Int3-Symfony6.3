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

        // cette fonction reçoit le callback
        // (opération à réaliser dans ce cas)
        const calculatrice = (v1, v2, callback) => {
            return callback(v1, v2);
        }

        calculatrice(4, 5, somme);

        calculatrice(4, 5, sust);

        // appel avec fonction anonyme
        calculatrice(4, 5, (v1, v2) => {
            return v1 * v2;
        });


        // callback hell
        // exemple d'enchaînement sans promesse
        // tout ok
        console.log("exemple appel simple:");
        console.log(calculatrice(5, 5, somme));


        // on va faire maintenant 100 / ( 2 * (20 + 5) )  
        // callback hell !!
        console.log("exemple appel chaîne:");
        console.log(
            calculatrice(100,
                calculatrice(2,
                    calculatrice(20, 5, somme), mult),
                div)
        );
    </script>




</body>

</html>