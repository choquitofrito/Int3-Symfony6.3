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

        // cette fonction reçoit le callback
        // (opération à réaliser dans ce cas)
        const calculatrice = ( v1, v2, callback) => {
            console.log (callback (v1,v2));
        }

        // 1. Faites appel à la fonction calculatrice pour qu'elle affiche la somme de deux valeurs (ex: 10 et 20)
        // 2. Créez une nouvelle fonction mult et utilisez-la
        // 3. Faites appel à la fonction calculatrice pour qu'elle affiche la division de deux valeurs. La fonction
        // qui calcule la division sera anonyme, elle n'est pas crée à part
        // 4. Enchaînez des appels à la fonction calculatrice pour calculer le résultat de 100 / ( 2 * (20 + 5).
        // Créez les fonctions manquantes pour arriver à l'objectif
        
        
    </script>

    


</body>

</html>