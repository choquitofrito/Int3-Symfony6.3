# Concepts d'API et de REST

Une API est un interface, un moyen de communication. Dans notre cas la communication se fait entre un ordinateur client et un ordinateur serveur.

REST : transfert d'état représentatif et 

Une API est REST si elle a ces caractéristiques :

1. Client-Serveur (elle permet la communication entre un cient et un serveur)
2. Sans état – Une fois que le serveur a terminé une requête HTTP, aucune information de session n'est conservée sur le serveur.
Quand on fait une demande concrete on obtient toujours le même résultat, indépendamment des requêtes qu'on a pu faire avant.
3. Interface uniforme - L'API a un ensemble de contraintes concernant la façon de l'accéder aux données (le format de l'URL) de de les renvoyer 
4. Cacheable – La réponse du serveur peut être cacheable (pour accélerer l'obtention des données concernant les requêtes posterieures) ou non cacheable.
5. Système en couches - L'API peut avoir des intermédiaires entre le client et le serveur comme les serveurs proxy, les serveurs de cache, etc.
6. Code à la demande (facultatif) -l'API peut avoir la capacité du serveur à envoyer des codes exécutables au client comme des applets Java ou du code JavaScript, etc.


# Procedure de création d'une API simple

## 1. Créer un projet Symfony

<br>

## 2. Installer ces packages

<br>

```
composer require jms/serializer-bundle
composer require friendsofsymfony/rest-bundle
composer require symfony/maker-bundle     
composer require symfony/orm-pack
symfony console req orm-fixtures
```


Le prémier package facilite la sérialisation et déserialisation des données:

https://github.com/schmittjoh/serializer

Le deuxième facilite la création des méthodes de l'API

https://github.com/FriendsOfSymfony/FOSRestBundle

<br>

## 3. Créer l'entité Aeroport (nom - string, code - string)

Voir code dans Entity

## 4. Créer un controller et les méthodes GET, POST, PUT et DELETE de l'API


Voir code AeroportController.php


## 5. Testez l'API avec Postman ou avec du code

Voir exemples de l'API fetch dans l'action exemples du controller ExemplesAppelApi du repo

