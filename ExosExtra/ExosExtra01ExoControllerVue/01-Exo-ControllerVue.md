# Exercice sur controllers et vues

## 1. Créez un nouveau projet
## 2. Créez un controller
## 3. Créez quatre actions!

<br>

### 3.1. Action capable d'afficher un message de bienvenue

<br>

### 3.2. Action capable d'afficher un message de bienvenue pour un nom tapé dans l'URL

<br>

### 3.3. Action qui affiche un message de bienvenue pour un nom tapé dans l'URL et le genre qui correspond normalement à ce nom. 

La vue affichera un message du type :
```
Bienvenue <nom>, vous êtes probablement <genre>
```  
 
Utilisez l'API **genderize**, capable de vous renvoyer des infos sur le genre probable d'un nom.
Vous devez faire des appels à l'API dans ce format:

https://api.genderize.io/?name=luisa

Essayez dans votre navigateur avec de noms différents.
Qu'est-ce que l'API renvoie? observez bien votre navigateur! 

Pour pouvoir faire un appel à l'API dans une action du controller dans Symfony, vous devez injecter un objet de la classe **HttpClientInterface** dans l'action (faites comme avec l'objet Request...)

Vous devez coder ces pas dans l'action du controller : 

1. Obtenir le **nom** qui a été tapé dans l'url
2. Faire l'appel à l'API
3. Obtenir le contenu du résultat de la requête (souvent du JSON)
4. Si le contenu est JSON, transformer ce contenu en array
5. Envoyer les infos dont vous avez besoin à la vue

Voici un exemple de code pour faire appel à une API fictive (pas 2 à 5), le reste vous devez savoir le faire:

```php
public function uneAction (Request $request, HttpClientInterface $client): Response {
    .
    .
    .
    $response = $client->request ("GET", "https://monapi.com/?parametre1=valeur1&parametre2=valeur2");
    $contenu = $response->getContent();
    $array = json_decode ($contenu, true);
    .
    .

}
```

<br>

### 3.4. Créez une nouvelle version de l'action précédente. Cette fois on affichera une image selon le genre dans la vue.

(les images se trouveront dans le dossier public, on n'a pas encore Webpack Encore)

### 3.5. Créez une action qui affiche une vue. Dans cette vue on va incruster la date actuelle, qui est une vue génére par une action.

