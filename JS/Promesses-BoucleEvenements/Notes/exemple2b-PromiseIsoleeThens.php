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
        // la promesse renvoie une valeur dans ce cas
        const promesse = new Promise((resolve, reject) => {
            resolve("j'aime trop les frites");
        });
        // Syntaxe la plus utilisée:
        // nomPromesse.then (onResolve)
        console.log("chaîne de thens");
        promesse
            .then((resResolve) => {
                return resResolve;
            })
            // ce then renvoie une promesse dans la valeur pour
            // le resolve est le contenu du return 
            .then((res2) => {
                console.log("then nr.2");
                return res2 + " et la bière";
            })
            .then((res3) => { // renvoie une promesse
                console.log("then nr.3");
                return res3 + " et le chocolat";
            })
            .then((res4) => { // ne renvoie rien: js crée une promesse 
                // dont la valeur de résolution est undefined
                console.log("then nr.4");
                console.log(res4);
            })
            .then((res5) => { // renvoie
                console.log("then nr.5");
                console.log("Mais enfin! il manque un return... j'en ai rien ici!");
                console.log(res5);
            })
    </script>

</body>

</html>