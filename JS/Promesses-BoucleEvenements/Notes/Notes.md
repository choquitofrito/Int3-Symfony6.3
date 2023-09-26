# Documentation de base sur les promesses

- [Documentation de base sur les promesses](#documentation-de-base-sur-les-promesses)
- [1. Boucle d'événements, exemples de base](#1-boucle-dévénements-exemples-de-base)
- [2. Callback Hell](#2-callback-hell)
- [3. Les Promesses : la solution](#3-les-promesses--la-solution)
  - [3.1. Création, production et consommation d’une promesse](#31-création-production-et-consommation-dune-promesse)
  - [3.2. API FETCH](#32-api-fetch)
  - [3.3. ASYNC-AWAIT](#33-async-await)


<br>

# 1. Boucle d'événements, exemples de base

<br>
Pour comprendre les promesses on doit d'abord avoir certains notions sur la boucle d'événements de JS.

La **boucle d'événements** (Event Loop en anglais) est un concept clé en JavaScript qui permet à l'exécution du code d'être gérée de manière asynchrone. Cela signifie que le code JavaScript peut continuer à s'exécuter même si des tâches longues ou des opérations de réseau sont en cours d'exécution.

Voici un exemple simple d'utilisation de la boucle d'événements :

```js
console.log("Début du script");

setTimeout(() => {
    console.log("Exécution d'une tâche longue");
}, 3000);

console.log("Fin du script");
```

Sortie: 

```
Début du script
Fin du script
Exécution d'une tâche longue
```

La fonction **setTimeout** est une fonction **asynchrone** qui **ajoute une tâche à la pile d'événements de la boucle d'événements**. Le temps indiqué est le temps **minimum** après lequel JS essayera de lancer le callback, mais ce temps **n'est pas garanti**. Le code sera lancé uniquement si il **n'y a rien dans la pile d'exécution**.

**Le code synchrone est ajouté à la pile d'exécution, les événements sont ajoutés à la pile d'événements. Aucun événement n'est lancé si la pile d'exécution n'est pas vide.**

Le moteur JS essaie de lancer setTimeout après trois secondes. Dans ce cas, l'execution se passe de cette manière:

1. lancer le prémier console.log
2. enregistrer le callback pour setTimeout
3. **continuer le code** et lancer l'autre console.log
4. après 3s. , le moteur regarde s'il n'y a rien dans la pile d'éxécution. Il n'y a rien, car le deuxième console.log a pris moins de 3s. pour s'executer.
Il prend le prémier (et seul, dans ce cas) événement de la pile d'événements et lance le callback associé (console.log ("Exécution...."))

Considérons un autre exemple:
 
```js

console.log("Début du script");
// on "enregistre" le setTimeout et on continue l'exécution du script (le for plus bas)
// le moteur js essaiera de lancer ce code dans 3 sec.
// il ne pas car la suite du code dure plus de 3 sec.
setTimeout(() => {
    console.log("Exécution d'une tâche longue");
}, 3000);

// operation qui prends longtemps, plus de 3 sec.
for (let i = 0; i < 10000000000; i++) {
    let val = i * 2;
}

console.log("Fin du script");

```

1. lancer le prémier console.log
2. enregistrer le callback pour setTimeout
3. **continuer le code** et lancer le for, **qui va prendre plein du temps**
4. après 3s. , le moteur regarde s'il n'y a rien dans la pile d'éxécution. Le for est toujours en train d'être exécuté, pas moyen de lancer le callback!
5. attendre la fin du for  
6. attendre l'exécution du dernier console.log. Fin du code, pile d'éxécution vide!
7. prendre le prémier et seul événement de la pile d'événements et lancer le callback ("Exécution....")
   

En gros on a deux taches longues, une asynchrone qui ne bloque pas le code (setTimeout) et une synchrone (la boucle) qui carrement bloque le code.
Quand le moment d'être lancé est arrivé pour la tâche asynchrone (setTimeout) elle doit **quand-même attendre** que la pile d'exécution soit vide.

<br>

# 2. Callback Hell

<br>

**Callback Hell** est un terme utilisé pour décrire une situation où vous avez **des appels de retour imbriqués les uns dans les autres**, ce qui peut rendre le code difficile à lire et à maintenir. Voici un exemple de "Callback Hell" en utilisant du JavaScript vanilla:


```js
// Appel AJAX a une URL (peut-être une API ou une page dans notre propre app où, par exemple, on fait une requête à une BD)
// Ici on veut obtenir le genre d'un film (id=5) pour après obtenir 
// tous les films de ce genre. On doit faire deux appel AJAX
var xhr = new XMLHttpRequest();
xhr.open("GET", "obtenirGenreFilm.php?id=5");
xhr.onreadystatechange = function() {

    if (xhr.readyState === 4 && xhr.status === 200) {

        // résultat du premier appel AJAX ...
        let idGenre = JSON.parse(xhr.responseText);
        
        // ... qu'on utilise pour faire un autre appel AJAX!
        xhr = new XMLHttpRequest();
        xhr.open("GET", "obtenirTousFilmsGenre.php?id=" + idGenre);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {

                // résultat du deuxième appel
                let filmsGenre = JSON.parse(xhr.responseText);
            
                // si on veut utiliser ces données pour faire un autre appel
                // on commence à créer une structure pyramidale dont on ne
                // connait pas la fin: le callback hell
        

            }
        }
        xhr.send();
    }
};
xhr.send();
```

Voici une ré-formulation du callback hell où on peut voir encore plus claire la pyramide:

```js

// Fonction qui fait l'appel AJAX à une URL reçue
function getData(url, callback) {
    // Faire une requête AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            callback(JSON.parse(xhr.responseText)); // paramètre envoyée dans le callback plus bas
        }
    };
    xhr.send();
}
// Exemple base, tout va bien!
getData("https://example.com/obtenirGenreFilm.php?id=5", function(resultatAjax) {
    console.log (resultatAjax);
});



// Callback hell : Utiliser les données obtenues pour obtenir d'autres données
getData("https://example.com/page1.php", function(data1) {
    getData("https://example.com/page2.php?id=" + data1.id, function(data2) {
        getData("https://example.com/page3.php?id=" + data2.id, function(data3) {
            // Utiliser les données finales
            console.log(data3);
        });
    });
});
```

<br>

# 3. Les Promesses : la solution

<br>

Une **promise** (promesse) est un objet qui: 

- **surveille la finalisation d’un certain événement asynchrone** (timer, AJAX, accès à une BD, etc…) dans l’application et
- **détermine quoi faire après cette finalisation** de l'action asynchrone 

**La promesse détermine quoi faire avec une valeur qu’on recevra dans le futur** (ex: données d'une API, données d'un BD de la propre app...)  

**Exemple:** demander la transformation d'une image qui se trouve dans le serveur. Quand l’image sera transformée et reçue, une action sera réalisée (resolve). Si la demande échoue, une autre action sera lancée (reject) 

Une promese peut se trouver dans les états suivants : 

1. **Pending** - en attente, elle n'a pas finie son exécution
2. Si elle a fini son exécution et elle sera alors :

    a. **Resolved** - succes dans l’execution, résultat disponible

    b. **Rejected** - erreur dans l’execution, le résultat n'est pas disponible 


<br>


## 3.1. Création, production et consommation d’une promesse

<br>

Nous allons voir la structure de base d’une promesse pour avoir un modèle général. On testera des exemples dans la section suivante. 
Pour utiliser une promesse, on doit la **créer** et la **consommer**: 

1. **Création** d’une promesse : le constructeur de la promesse reçoit une function, l’**executor**, qui lancera l’opération asynchrone à réaliser (AJAX, BD, etc…) et qui reçoit deux callbacks (resolve et reject). Observez le code:

```js
const obtenirFilm = new Promise ((resolve, reject) => {
    // ici il y aura un code qui prendra du temps
    // et qui renverra un résultat dans le cas de succés
    // et un autre différent dans le cas d'échec

    // si l'exécution est ok on fait appel à resolve
    if (...){
        resolve (resultatResolve);
    }
    // autrement on fait appel à reject
    else {
        reject(resultatReject);
    }
})
```
La fonction anonyme dans le constructeur est l'**executor**
L'appel à resolve renvoie la variable **resultatResolve**
L'appel à reject renvoie la variable **resultatReject**.

**Resolve** et **reject** sont reçues en paramètres. C'est l'appel à la promesse ("consommer la promesse") qui envoie ces fonctions.


```js
obtenirFilm
.then (
    // méthode onResolve 
    (resResolve) => {
        // faire quoi qui ce soit avec le résultat du success
        // de l'opération asynchrone    
        },
    // méthode onRejected FACULTATIF. 
    // Si pas défini, reject génére une exception
    (resReject) => {
        // faire quoi qui ce soit avec le résultat du échec 
        // de l'operation asynchrone
    }
);
```

On lance la consommation de la promesse quand on fait appel à **then**. La méthode **then** reçoit un callback **onResolve** (quoi faire si la promesse est accomplie correctement). On peut aussi envoyer une autre méthode  **onRejected** (quoi faire si la promesse échoue). 

Voici un exemple qui montre les deux possibilités:

```js
// la promesse renvoie une valeur dans ce cas
const promesse = new Promise((resolve, reject) => {

    // ici on aura une opération ASYNCHRONE qui consomme du temps.
    // Dans un example réel on aura un appel AJAX
    // L'opération doit être non-bloquante 
    // (ex: appel AJAX, setTimeout etc...)

    // juste pour montrer la syntaxe resolve et reject 
    // on va générer un résultat aléatoire
    // (random). Ce résultat doit venir de l'opération asynchrone (qu'on n'a pas lancé dans cet exemple théorique)
    let val = Math.floor(Math.random() * 2);
    if (val == 1) {
        resolve("tout ok");
    } else {
        reject("oh non!"); // produira une exception si on n'a pas défini un callback pour resolve ni un catch
    }
});


// Syntaxe de base:
// nomPromesse.then (onResolved, onRejected)
// ou
// nomPromesse.then (onResolved)
console.log("appel 1");
promesse
    .then(
        (resResolve) => {
            console.log(resResolve);
        },
        (error) => {
            console.log(error);
        });
console.log("le code continue");

// Syntaxe la plus utilisée:
// nomPromesse.then (onResolve)
console.log("appel 2");
promesse
    .then((resResolve) => {
        console.log(resResolve)
    }); // on aura une exception en cas de reject

```

Si on ne défini pas **onRejected** et la promesse est **rejected** (appel à **reject** dans le code), **une exception sera affichée**. On peut toujours traiter cette exception en utilisant la méthode **catch**. 

On va voir un exemple mais d'abord on doit faire une **précision** sur le fonctionnement de la méthode **then**.
1. **then** **renvoie** **toujours une promesse**
2. cette promesse aura, comme valeur du resolve, ce qu'on met dans le **return**.   
3. dans l'absence de **return**, js renverra **undefined**

Voici un exemple:
```js
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
```


Continuons alors avec nos exemple de **reject** , cette fois avec un **catch** :


```js
// la promesse renvoie une valeur dans ce cas
const promesse = new Promise((resolve, reject) => {

    // ici on aura une opération ASYNCHRONE qui consomme du temps.
    // Dans un example réel on aura un appel AJAX
    // L'opération doit être non-bloquante 
    // (ex: appel AJAX, setTimeout etc...)

    // juste pour montrer la syntaxe resolve et reject 
    // on va générer un résultat aléatoire
    // (random). Ce résultat doit venir de l'opération asynchrone (qu'on n'a pas lancé dans cet exemple théorique)
    let val = Math.floor(Math.random() * 2);
    if (val == 1) {
        resolve("tout ok");
    } else {
        reject("oh non!"); // produira une exception si on n'a pas défini un callback pour resolve ni un catch
    }
});


// Syntaxe la plus utilisée:
// nomPromesse.then (onResolve)
console.log("appel");
promesse
    .then((resResolve) => {
        return (resResolve);
    }) // on va enchaîner les then, juste pour tester
    .then((res) => { 
        console.log ("On enchaine: ");
        console.log(res);
    })
    .catch((erreur) => {
        console.log(`Erreur traité avec catch : ${erreur}`);
    })

// on aura une exception en cas de reject,
// on la capture avec le catch.
console.log("le code continue");
```

Dans beaucoup de cas vous allez voir que le callback **onRejected** ne sera pas défini mais il y aura un **catch**. C'est le cas, par exemple, de l'API **fetch** car elle génére une exception **seulement en cas d'érreur de réseau** (on verra un exemple plus tard). 

Si on avait enchaîné d'autres **.then**, le **catch** capturerait le reject de n'importe quelle promesse précedante. Ou même d'une erreur de programmation à l'intérieur des "then". Essayez vous-même: faites une erreur de syntaxe dans le deuxième **then**.

Voici un autre exemple. Celui ici réfuse la promesse et capture l'exception avec le **catch**:

```js
const obtenirDesDonneesDeApi = () => {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "https://api.example.com/data");
    xhr.onload = () => {
      if (xhr.status === 200) {
        resolve(xhr.responseText); 
      } else {
        reject(`La requête a échoué avec le code de statut ${xhr.status}`); // érreur (404, 500, etc...)
      }
    };
    xhr.onerror = () => reject("La requête a échoué en raison d'une erreur de réseau");
    xhr.send();
  });
};

obtenirDesDonneesDeApi()
  .then((data) => {
    console.log(`Données reçues : ${data}`);
  })
  .catch((error) => {
    console.error(`Erreur : ${error}`);
  });


```

<br>


En résumé, **reject** est utilisé pour signaler qu'une promesse ne peut pas être remplie, et **onRejected** et **catch** sont utilisés pour gérer ces promesses rejetées et prendre les mesures appropriées. C'est à nous de définir un **onRejected** ou de tout traiter avec **catch**.



<br>

## 3.2. API FETCH

<br>

**fetch()** est une méthode JavaScript standard qui permet de récupérer des données à partir d'une URL. Elle **renvoie une promesse qui résout avec les données de la réponse de la requête HTTP** (dans son code il y aura alors un 'resolve (...)'. 
Vous pouvez utiliser cette méthode pour envoyer des requêtes HTTP et récupérer des données depuis un serveur, un fichier, ou toute autre source.

Voici quelques exemples d'utilisation de **fetch()** :

<br>

**1. Récupérer de données** 

```js
fetch('https://example.com/data')
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.log(error));
```


**Fetch** renvoie une promesse qu'on peut consommer. La résolution de cette promesse nous donne un objet Response.
On peut enchaîner avec then et faire appel à la fonction response.json, qui renvoie à son tour une promesse qu'on pourra consommer et dont le resolve nous donne du JSON.

La résolution de cette promesse nous donnera le contenu json de cet objet Response (.json parcourt l'objet et extrait le contenu JSON).

On peut alors la résoudre et obtenir les données (ici "data") pour faire quoi qui ce soit.

Voici une requête GET :

```js
// le code simplifié (et le plus utilisé :D) serait:
fetch("./obtenirFilm.php?id=" + idFilm)
    .then(reponse => reponse.json(),
        err => { // ce callback onRejected est lancé s'il y a une erreur de reseau
                // Testez en mettant http://casdcasdfasdfaf.com dans l'URL.
                
            console.log(`Il y a eu une érreur de réseau`);
            throw new Error(err); // on 'l'envoie' au catch, qui va le traiter
        }) // dans una arrow function: si un seul param, pas besoin de parenthéses. Si une seule instruction return, pas besoin des accolades
    .then(res => console.log(res) // on est en train de faire un return "console.log (res)", mais ce n'est pas un problème
    )
    .catch(error => console.log(`Voici l'erreur: ${error}`));
```

**fetch** ne gére pas les **reject** des promesses sauf s'il y a une érreur de réseau. Tout ce qu'on peut faire est créer un bloc try-catch pour capturer les exceptions. **fetch ne lance pas des exceptions pour les erreurs HTTP**, il les lance uniquement quand il y a une erreur de réseau: https://developer.mozilla.org/en-US/docs/Web/API/fetch#exceptions

On peut quand-même toujours faire le reject à la main dans notre code:

```js
fetch(url).then((response) => {
  if (// condition de notre réponse ok) {
    return response.json();
  }
  // on lance une exception ad-hoc
  throw new Error('Il y a eu un problème X');
})
.then((responseJson) => {
  // Do something with the response
})
.catch((error) => {
  console.log(error) // celle-ci capture uniquement les erreurs de réseau
});
```


<br>

## 3.3. ASYNC-AWAIT 

<br>

Une fonction **async** est une fonction JavaScript spéciale qui permet d'écrire des code asynchrone de manière plus simple et plus lisible, et permet l'utilisation d'**await**.

**await** est **utilisé à l'intérieru de la fonction asynchrone pour attendre la résolution d'une promesse avant de continuer l'exécution du code**. Il ne peut être utilisé que dans une fonction dé déclaré avec async (sauf dans certains cas particulières)

Une **fonction async renvoie toujours une promesse** qui résout avec ce qu'on met dans le return (si pas de return, la promesse résout à undefined).

**Notez que quand on fait appel à une function async, le reste du code continue son exécution.**
Une utilisation de base peut être :

```js
async function getData() {
    // l'attente se passe uniquement entre les 
    // appels asynchrones ici
    const response = await fetch('https://example.com/data');
    const data = await response.json();
    console.log(data);
    // la promesse résout à undefined. On peut mettre un return ici
    // et la consommer avec then.
}

getData();
console.log ("on continue..."); // ce code se lance sans attendre!
``` 

Voici un exemple plus élaboré:
```js
let idFilm = 1; // on le fixe, ça peut venir de n'importe où

// on simplifie la fonction qui renvoie la promesse
// avec async-await car on n'enchaîne pas avec then.

// ici on a un appel à une fonction asynchrone (le code continue après appelAjax)
// mais à son intérieur le code est synchrone à cause des await

// C'est un possible objectif: avoir une suite d'opérations asynchrones enchainées d'une manière synchrone 
async function appelsAjax() {
    
    let response = await fetch("./obtenirFilm.php?id=" + idFilm);
    // on attend ici...
    let idGenre = await response.json();
    // on attend ici...
    response = await fetch("./obtenirTousFilmsGenre.php?idGenre=" + idGenre);
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
```


**Await** ne bloque pas l'exécution du code, mais il permet de synchroniser l'exécution du code asynchrone (établir un ordre séquentiel).

Lorsque vous utilisez **await** **pour attendre la fin d'une tâche asynchrone**, **le code qui suit l'instruction await ne s'exécute pas tant que la tâche asynchrone n'est pas terminée**. Cela permet de synchroniser l'exécution du code avec la fin de la tâche asynchrone, mais cela ne bloque pas l'exécution d'autres tâches qui peuvent s'exécuter en parallèle (**car le code qui se trouve après l'appel à la fonction asyncrone se exécute immediatement**).

En résumé, **await** ne bloque pas l'exécution du code, mais il permet de synchroniser l'exécution du code asynchrone. Il permet d'attendre la fin d'une tâche asynchrone avant de continuer à exécuter le code suivant, sans bloquer l'exécution d'autres tâches.

