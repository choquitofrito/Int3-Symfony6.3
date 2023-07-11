## Pratique de base avec FETCH

<br>

L'API jsonplaceholder est un API est une api 'fake' qui fournit de données:

    /posts 	100 posts
    /comments 	500 comments
    /albums 	100 albums
    /photos 	5000 photos
    /todos 	200 todos
    /users 	10 users


C'est une API **très utile** pour nous car elle implement toutes les méthode d'une API REST :

- GET - obtenir de données
- POST - envoyér une donnée (ex: envoyer les données d'une commande dans une application d'e-commerce. Ce n'est pas nécessairement enregistré dans la BD)
- PUT - créer une donnée (ex: créer un produit dans une application d'e-commerce, il sera enregistré dans la BD)
- PATCH - modifier une partie d'une donnée dans le serveur (ex: modifier le prix d'un produit)
- DELETE - effacer une donnée

Voici le guide:

https://jsonplaceholder.typicode.com/guide/

Regardez la doc et pratiquez des appels en utilisant **fetch**.
Regardez aussi la section **Resources** ici : https://jsonplaceholder.typicode.com/


<br>

## Exercices: 

<br>

1. AFfichez trois photos choisies au hasard
2. Postez un nouveau commentaire et observez la réponse du serveur pour savoir si l'appel à été faite correctement
3. Obtenez tous les posts de l'utilisateur numéro 5. Affichez dans le DOM le nom de l'utilisateur et le contenu de chaque post
4. Effacez un user et observez la réponse du serveur pour savoir si l'appel à été faite correctement
5. Obtenez le nom de l'utilisateur qui a posté le post numéro 30. Attention car quand vous faites un appel à l'API pour obtenir un post où un user vous allez obtenir un array même s'il y a, par exemple, un seul post qui porte un id. Vous obtenez alors un array contenant un seul élément... mais c'est un array!


<br>

## Utilisation des APIs de votre choix

<br>

**En JS:** 

Pratiquez par vous-mêmes des appels fetch à des APIs qui ne demandent pas une key. Normalement vous allez faire des appels GET car vous ne pouvez pas modifier le contenu de la base de données du serveur. 

Voici quelques-unes faciles à utiliser:

**Star Wars API:** https://swapi.dev/documentation
**Random dogs:** https://random.dog/woof.json

Mais voici une liste bien large!

https://mixedanalytics.com/blog/list-actually-free-open-no-auth-needed-apis/



**En PHP avec Symfony:**

Suivez cette doc:

https://symfony.com/doc/current/http_client.html#basic-usage

https://symfony.com/doc/current/http_client.html

<br>

## Promesses isolées

<br>

Créez un jeu où la personne doit deviner un chiffre entre 1 et 10 dans un delai de 10 sec.
Le chiffre est générée automatiquement et la personne la tape dans un input.
Affichez le résultat après 10 secondes.
Utilisez setTimeout (vous pouvez rajouter aussi setInterval pour montrer un compte à rebours, mais faites d'abord une version simple).

Une fois que vous avez réalisé l'exercice, **faites une version avec de promesses**:
Créez une fonction qui renvoie une promesse qui sera resolue une fois que le timeout aura expire.
Si vous êtes perdu, utilisez le code de l'exemple4 comme guide (fonction qui renvoie une promesse).
