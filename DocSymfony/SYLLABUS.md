<!-- TOC tocDepth:2..3 chapterDepth:2..6 -->

- [1. Configuration de base : Composer, Git, XDebug, Visual Studio](#1-configuration-de-base--composer-git-xdebug-visual-studio)
- [2. Installation des outils de base de Symfony](#2-installation-des-outils-de-base-de-symfony)
  - [2.1. Installation du client sur OSX et création d'un projet](#21-installation-du-client-sur-osx-et-création-dun-projet)
- [3. Création d'un projet de base (squelette)](#3-création-dun-projet-de-base-squelette)
- [4. Routing](#4-routing)
  - [4.1. Les bases du routing](#41-les-bases-du-routing)
  - [4.2. Création d'un controller de base et des routes](#42-création-dun-controller-de-base-et-des-routes)
    - [Exercices : création des actions](#exercices--création-des-actions)
    - [4.2.1. Les routes contenant de paramètres](#421-les-routes-contenant-de-paramètres)
    - [Exercices : création d'actions contenant de paramètres](#exercices--création-dactions-contenant-de-paramètres)
    - [4.2.2. Les contraintes dans les routes](#422-les-contraintes-dans-les-routes)
    - [Exercices : création de contraintes dans les paramètres des routes](#exercices--création-de-contraintes-dans-les-paramètres-des-routes)
    - [4.2.3. Les valeurs par défaut](#423-les-valeurs-par-défaut)
    - [Exercices : utilisation de valeurs par défaut](#exercices--utilisation-de-valeurs-par-défaut)
    - [4.2.4. Paramètres optionnels](#424-paramètres-optionnels)
    - [4.2.5. Les valeurs alternatives pour les paramètres](#425-les-valeurs-alternatives-pour-les-paramètres)
- [5. Controllers](#5-controllers)
  - [5.1. Création d'un controller sans assistant](#51-création-dun-controller-sans-assistant)
    - [Exercices : création de Controllers](#exercices--création-de-controllers)
  - [5.2. Création d'un controller avec l'assistant](#52-création-dun-controller-avec-lassistant)
    - [Exercices : utilisation de paramètres](#exercices--utilisation-de-paramètres)
  - [5.3. L'objet Response (opt)](#53-lobjet-response-opt)
  - [5.4. L'objet Request (opt)](#54-lobjet-request-opt)
  - [5.5. Types de réponses d'un controller: render, redirect, redirectToRoute, forward, renderView](#55-types-de-réponses-dun-controller-render-redirect-redirecttoroute-forward-renderview)
    - [5.5.1. Redirect (opt)](#551-redirect-opt)
    - [5.5.2. RedirectToRoute (opt)](#552-redirecttoroute-opt)
    - [5.5.3. Forward (opt)](#553-forward-opt)
    - [5.5.4. Render](#554-render)
- [6. Les Vues. Le moteur de templates TWIG](#6-les-vues-le-moteur-de-templates-twig)
  - [6.1. Création d'un template Twig](#61-création-dun-template-twig)
      - [**Exercices** : création d'une action et un template](#exercices--création-dune-action-et-un-template)
  - [6.2. Les variables TWIG](#62-les-variables-twig)
    - [Exercices : création de vues](#exercices--création-de-vues)
  - [6.3. Les conditions](#63-les-conditions)
    - [Exercices : conditions IF dans Twig](#exercices--conditions-if-dans-twig)
  - [6.4. Les boucles](#64-les-boucles)
    - [Exercices : communication Controller-Vue](#exercices--communication-controller-vue)
  - [6.5. Les filtres](#65-les-filtres)
  - [6.6. Héritage de templates en TWIG (I)](#66-héritage-de-templates-en-twig-i)
    - [Exercices : création de master pages](#exercices--création-de-master-pages)
  - [6.7. Héritage de Templates en TWIG (II)](#67-héritage-de-templates-en-twig-ii)
    - [Exercices : création de Master Pages](#exercices--création-de-master-pages-1)
  - [6.8. Vider un bloc hérité d'un template](#68-vider-un-bloc-hérité-dun-template)
  - [6.9. Incruster le rendu d'une autre action du controller dans une vue ('vue partielle')](#69-incruster-le-rendu-dune-autre-action-du-controller-dans-une-vue-vue-partielle)
    - [Exercices : incruster une action du controller dans une section de la vue](#exercices--incruster-une-action-du-controller-dans-une-section-de-la-vue)
  - [6.10. Faire appel à une action depuis la vue](#610-faire-appel-à-une-action-depuis-la-vue)
    - [Exercices: création de liens dans la vue (vers des actions)](#exercices-création-de-liens-dans-la-vue-vers-des-actions)
- [7. Gestion basique d'erreurs dans la réponse du serveur](#7-gestion-basique-derreurs-dans-la-réponse-du-serveur)
  - [7.1. Créer une vue pour chaque erreur à gérer en utilisant les conventions de Symfony](#71-créer-une-vue-pour-chaque-erreur-à-gérer-en-utilisant-les-conventions-de-symfony)
    - [Exercices : traitement d'erreurs](#exercices--traitement-derreurs)
  - [7.2. Modifier la réponse http du serveur](#72-modifier-la-réponse-http-du-serveur)
  - [7.3. Lancer une exception](#73-lancer-une-exception)
- [8. Les environnements de développement et production](#8-les-environnements-de-développement-et-production)
  - [8.1. La base des environnements de travail](#81-la-base-des-environnements-de-travail)
- [8.2. Les fichiers .env et .env.local](#82-les-fichiers-env-et-envlocal)
- [9. Le Web Profiler](#9-le-web-profiler)
  - [9.1. Afficher le contenu des variables avec dump](#91-afficher-le-contenu-des-variables-avec-dump)
- [10. Les Services](#10-les-services)
  - [10.1. Concept de Service](#101-concept-de-service)
  - [10.2. Utilisations des services inclus dans Symfony](#102-utilisations-des-services-inclus-dans-symfony)
    - [Exercices : utilisation de Services](#exercices--utilisation-de-services)
  - [10.3. Création de nos propres services](#103-création-de-nos-propres-services)
    - [Exercices : création de services](#exercices--création-de-services)
  - [10.4. Injecter les services dans le controller](#104-injecter-les-services-dans-le-controller)
  - [10.5. Injection de paramètres dans le service (I)](#105-injection-de-paramètres-dans-le-service-i)
  - [10.6. Utiliser un service dans un autre service](#106-utiliser-un-service-dans-un-autre-service)
  - [10.7. Accéder au modèle dans un Service](#107-accéder-au-modèle-dans-un-service)
  - [10.8. Injection de paramètres dans le service (II)](#108-injection-de-paramètres-dans-le-service-ii)
  - [10.9. Cas pratique: création d'un service pour uploader des fichiers](#109-cas-pratique-création-dun-service-pour-uploader-des-fichiers)
- [11. Le Modèle](#11-le-modèle)
  - [11.1. Présentation de Doctrine](#111-présentation-de-doctrine)
  - [11.2. Installation de Doctrine dans un projet](#112-installation-de-doctrine-dans-un-projet)
  - [11.3. Installation de Doctrine. Création de la BD](#113-installation-de-doctrine-création-de-la-bd)
  - [11.4. Création des entités et mise à jour de la BD](#114-création-des-entités-et-mise-à-jour-de-la-bd)
  - [11.5. Rajouter/effacer des propriétés d'une entité](#115-rajoutereffacer-des-propriétés-dune-entité)
    - [Exercices : création et manipulation des entités](#exercices--création-et-manipulation-des-entités)
  - [11.6. Le modèle : les relations](#116-le-modèle--les-relations)
    - [11.6.1. Relation Many-To-One (= One-To-Many)](#1161-relation-many-to-one--one-to-many)
    - [11.6.2. Explication du code généré par l'assistant](#1162-explication-du-code-généré-par-lassistant)
    - [Exercices : création d'entités et de relations](#exercices--création-dentités-et-de-relations)
    - [11.6.3. Relation Many-To-Many](#1163-relation-many-to-many)
    - [Exercices : création d'une relation de plusieurs à plusieurs](#exercices--création-dune-relation-de-plusieurs-à-plusieurs)
    - [11.6.4. Relation One-To-One](#1164-relation-one-to-one)
    - [11.6.5. Relation réflexive (self-association)](#1165-relation-réflexive-self-association)
- [12. Le modèle : accès à la BD avec Doctrine](#12-le-modèle--accès-à-la-bd-avec-doctrine)
  - [12.1. INSERT](#121-insert)
  - [12.2. SELECT](#122-select)
    - [12.2.1. SELECT: findOneBy](#1221-select-findoneby)
    - [12.2.2. Serialization](#1222-serialization)
    - [12.2.3. SELECT: findBy](#1223-select-findby)
    - [12.2.4. SELECT: find](#1224-select-find)
    - [12.2.5. SELECT: findAll](#1225-select-findall)
    - [Exercices : utilisation du CRUD (select)](#exercices--utilisation-du-crud-select)
  - [12.3. UPDATE et DELETE](#123-update-et-delete)
    - [12.3.2. UPDATE](#1232-update)
    - [12.3.3. DELETE](#1233-delete)
    - [Exercices: utilisation du CRUD (insert, delete)](#exercices-utilisation-du-crud-insert-delete)
- [13. Le modèle : Persistance](#13-le-modèle--persistance)
- [14. Le Modèle : Transitivité en Cascade](#14-le-modèle--transitivité-en-cascade)
    - [Exercices : actions en cascade](#exercices--actions-en-cascade)
- [15. Le Modèle : Encapsulation](#15-le-modèle--encapsulation)
- [16. Le Modèle : Héritage de classes](#16-le-modèle--héritage-de-classes)
  - [16.1. Single Table Inheritance](#161-single-table-inheritance)
  - [16.2. Class Table Inheritance](#162-class-table-inheritance)
- [17. Fixtures pour remplir la BD](#17-fixtures-pour-remplir-la-bd)
  - [17.1. Fixtures multi-entity et ordre d'exécution](#171-fixtures-multi-entity-et-ordre-dexécution)
  - [17.2. Fixtures dans un Many-to-Many décomposé en deux One-To-Many](#172-fixtures-dans-un-many-to-many-décomposé-en-deux-one-to-many)
  - [17.3. Fixtures basées sur un fichier .sql](#173-fixtures-basées-sur-un-fichier-sql)
  - [17.4. Exclure un ou plusieurs tableaux du purge](#174-exclure-un-ou-plusieurs-tableaux-du-purge)
    - [Exercices :](#exercices-)
  - [17.5. Fichier de reinitialisation de la BD et les fixtures, migration](#175-fichier-de-reinitialisation-de-la-bd-et-les-fixtures-migration)
- [18. Accès à la BD avec DQL](#18-accès-à-la-bd-avec-dql)
  - [18.1. SELECT](#181-select)
    - [18.1.1. Requête qui renvoi un array d'arrays](#1811-requête-qui-renvoi-un-array-darrays)
    - [18.1.2. Requête qui renvoi un array d'objets](#1812-requête-qui-renvoi-un-array-dobjets)
    - [18.1.3. Exemples de requêtes](#1813-exemples-de-requêtes)
  - [18.2. Regular Joins et Fetch Joins](#182-regular-joins-et-fetch-joins)
    - [18.2.1. Regular Join](#1821-regular-join)
    - [18.2.2. Fetch Join](#1822-fetch-join)
    - [18.3. Fonctions Year, Month et Day](#183-fonctions-year-month-et-day)
  - [18.4. UPDATE](#184-update)
    - [Exercices DQL](#exercices-dql)
- [19. Accès à la BD avec DQL en utilisant les classes Repositoires](#19-accès-à-la-bd-avec-dql-en-utilisant-les-classes-repositoires)
    - [Exercices :](#exercices--1)
- [20. Accès à la BD avec Query Builder](#20-accès-à-la-bd-avec-query-builder)
- [21. Formulaires en Symfony](#21-formulaires-en-symfony)
  - [21.1. Création d'un formulaire indépendant](#211-création-dun-formulaire-indépendant)
  - [21.2. Création d'un formulaire associé à une entité](#212-création-dun-formulaire-associé-à-une-entité)
    - [Exercice : création d'un formulaire associé à une entité](#exercice--création-dun-formulaire-associé-à-une-entité)
  - [21.3. Création d'un formulaire pré-rempli avec les données d'une entité](#213-création-dun-formulaire-pré-rempli-avec-les-données-dune-entité)
  - [21.4. Action et Propriétés des champs du formulaire](#214-action-et-propriétés-des-champs-du-formulaire)
    - [21.4.1. Les boutons... où les mettre?](#2141-les-boutons-où-les-mettre)
    - [Exercice :](#exercice-)
  - [21.5. Rendu du formulaire dans la vue](#215-rendu-du-formulaire-dans-la-vue)
  - [21.6. Résumé de la création et personnalisation de base d'un formulaire](#216-résumé-de-la-création-et-personnalisation-de-base-dun-formulaire)
  - [21.7. Traitement des données du formulaire](#217-traitement-des-données-du-formulaire)
    - [Exercice :](#exercice--1)
  - [21.8. Exemple de traitement avec CRUD - UPDATE](#218-exemple-de-traitement-avec-crud---update)
  - [21.9. Bonnes pratiques pour créer de formulaires en Symfony](#219-bonnes-pratiques-pour-créer-de-formulaires-en-symfony)
  - [21.10. Style de base pour les formulaires (opt - on va utiliser Webpack)](#2110-style-de-base-pour-les-formulaires-opt---on-va-utiliser-webpack)
  - [21.11. Formulaires concernant plusieurs entités](#2111-formulaires-concernant-plusieurs-entités)
    - [21.11.1. One-To-Many](#21111-one-to-many)
    - [21.11.2. Many-To-Many](#21112-many-to-many)
  - [21.12. (à faire encore, on le laisse pour plus tard) Formulaire contenant une liste déroulante d'entités filtrées](#2112-à-faire-encore-on-le-laisse-pour-plus-tard-formulaire-contenant-une-liste-déroulante-dentités-filtrées)
  - [21.12. Upload de fichiers en utilisant un formulaire](#2112-upload-de-fichiers-en-utilisant-un-formulaire)
    - [21.12.1. Stockage dans le serveur d'une seule image pour chaque entité](#21121-stockage-dans-le-serveur-dune-seule-image-pour-chaque-entité)
    - [21.12.2. Possibles problèmes dans l'upload](#21122-possibles-problèmes-dans-lupload)
  - [21.13. AJAX en Symfony avec Axios (formulaire indépendant)](#2113-ajax-en-symfony-avec-axios-formulaire-indépendant)
  - [21.14. Formulaire associé à une entité avec Axios](#2114-formulaire-associé-à-une-entité-avec-axios)
      - [Explication de base:](#explication-de-base)
    - [21.14.1. Exemples extra AJAX (Axios)](#21141-exemples-extra-ajax-axios)
  - [21.15. Utilisation de blocs dans twig avec AJAX](#2115-utilisation-de-blocs-dans-twig-avec-ajax)
    - [Exercices : Ajax avec Axios](#exercices--ajax-avec-axios)
  - [21.16. Ajax et Axios dans un script JS. Indispensable si script externe au Twig](#2116-ajax-et-axios-dans-un-script-js-indispensable-si-script-externe-au-twig)
    - [21.16.1. Utilisation de FOSJsRoutingBundle pour générer les routes diréctement en JS](#21161-utilisation-de-fosjsroutingbundle-pour-générer-les-routes-diréctement-en-js)
  - [21.17. AJAX en Symfony (Vanilla JS - juste théorie)](#2117-ajax-en-symfony-vanilla-js---juste-théorie)
  - [21.18. Utilisation de blocs dans twig avec AJAX (Vanilla)](#2118-utilisation-de-blocs-dans-twig-avec-ajax-vanilla)
    - [Exercices : utilisation d'AJAX Vanilla](#exercices--utilisation-dajax-vanilla)
  - [21.19. DateTime et datepicker (Bootstrap)](#2119-datetime-et-datepicker-bootstrap)
  - [21.20. Validation des formulaires](#2120-validation-des-formulaires)
- [22. Response JSON en Symfony](#22-response-json-en-symfony)
  - [22.1. Renvoi JSON d'un array d'objets depuis le controller](#221-renvoi-json-dun-array-dobjets-depuis-le-controller)
  - [22.2. Renvoi JSON d'un array d'objets obtenu avec DQL](#222-renvoi-json-dun-array-dobjets-obtenu-avec-dql)
- [23. Mail](#23-mail)
- [24. Authentification : inscription et login/password](#24-authentification--inscription-et-loginpassword)
  - [2.4.1. Configuration de la sécurité et création d'un formulaire de login](#241-configuration-de-la-sécurité-et-création-dun-formulaire-de-login)
  - [24.2. Création d'un formulaire d'inscription](#242-création-dun-formulaire-dinscription)
  - [24.3. Logout](#243-logout)
- [25. Accès à l'objet app.user](#25-accès-à-lobjet-appuser)
- [26. Authentication et Rôles](#26-authentication-et-rôles)
  - [26.1. Gestion des rôles](#261-gestion-des-rôles)
  - [26.2. Contrôle d'accès par rôles](#262-contrôle-daccès-par-rôles)
    - [26.2.1. Dans security.yaml](#2621-dans-securityyaml)
    - [26.2.2. Dans le controller](#2622-dans-le-controller)
    - [26.2.3. Restriction d'accès dans la vue](#2623-restriction-daccès-dans-la-vue)
  - [26.3. Gestion de l'erreur "Access Denied" (exception) en utilisant une classe propre](#263-gestion-de-lerreur-access-denied-exception-en-utilisant-une-classe-propre)
  - [26.4. Fenêtre modale pour le login avec AJAX (assurez-vous de bien gérer AJAX avant)](#264-fenêtre-modale-pour-le-login-avec-ajax-assurez-vous-de-bien-gérer-ajax-avant)
    - [Adaptation à Ajax et fenêtre modale](#adaptation-à-ajax-et-fenêtre-modale)
- [27. Pagination (sans AJAX)](#27-pagination-sans-ajax)
  - [27.1. Installation et exemple pratique](#271-installation-et-exemple-pratique)
  - [27.2. Filtres et pagination (sans Ajax)](#272-filtres-et-pagination-sans-ajax)
- [28. JS et CSS avec Webpack encore](#28-js-et-css-avec-webpack-encore)
  - [28.1. Installation de Webpack Encore et de Node](#281-installation-de-webpack-encore-et-de-node)
  - [28.2. Configurer Webpack Encore](#282-configurer-webpack-encore)
  - [28.3. Lancer Webpack](#283-lancer-webpack)
  - [28.4. Importer les scripts dans les vues](#284-importer-les-scripts-dans-les-vues)
  - [28.5. Exemple d'utilisation de Webpack avec un fichier pour une vue specifique](#285-exemple-dutilisation-de-webpack-avec-un-fichier-pour-une-vue-specifique)
  - [28.6. Encore et Bootstrap](#286-encore-et-bootstrap)
  - [28.7. Gestions des images (en cours)](#287-gestions-des-images-en-cours)
- [29. Symfony avec Apache. Configuration des Virtual Hosts](#29-symfony-avec-apache-configuration-des-virtual-hosts)
  - [29.1. Explication de base](#291-explication-de-base)
  - [29.2. Création d'un serveur virtuel (virtual host) pour un projet en Windows](#292-création-dun-serveur-virtuel-virtual-host-pour-un-projet-en-windows)
    - [Exercice : création d'un projet contenant l'application skeleton](#exercice--création-dun-projet-contenant-lapplication-skeleton)
- [30. Intégration de boutons de paiement Paypal](#30-intégration-de-boutons-de-paiement-paypal)
- [31. Création de commandes de console (en cours)](#31-création-de-commandes-de-console-en-cours)
- [31. (EN COURS, A NE PAS SUIVRE) Deserialization (transformation de JSON, CSV... en objets)](#31-en-cours-a-ne-pas-suivre-deserialization-transformation-de-json-csv-en-objets)
- [END](#end)
  - [jQuery](#jquery)
- [4. Installation de packages dans un projet Symfony Flex](#4-installation-de-packages-dans-un-projet-symfony-flex)
- [(En cours, cette doc. appartient à Symfony 4) Traduction des messages de succès/erreur](#en-cours-cette-doc-appartient-à-symfony-4-traduction-des-messages-de-succèserreur)
  - [Annexe (en cours, brouillon): les pas pour la création d'un projet](#annexe-en-cours-brouillon-les-pas-pour-la-création-dun-projet)
    - [Analyse](#analyse)
    - [Implementation](#implementation)
    - [1. Modèle](#1-modèle)
    - [2. Controllers et vues](#2-controllers-et-vues)

<!-- /TOC -->

<br>
<br>



# 1. Configuration de base : Composer, Git, XDebug, Visual Studio

- Installez **Composer**

- Installez **Git**

- Installez **XDebug** (voir guide)

- Installez **Visual Studio Code**

Puis, installex ces extensions :

  [Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client)

  [PHP NameSpace
        Resolver](https://marketplace.visualstudio.com/items?itemName=MehediDracula.php-namespace-resolver)

[Twig](https://marketplace.visualstudio.com/items?itemName=whatwedo.twig)

[Twig Language 2](https://marketplace.visualstudio.com/items?itemName=mblode.twig-language-2)

<br>

# 2. Installation des outils de base de Symfony 


-   Allez sur :

<https://symfony.com/download>

L'installation de Symfony est juste l'installation d'un fichier executable. 
Dans Windows, le fichier porte le nom **symfony.exe** et peut être teléchargé de plusieurs manières.

Ceci est un lien direct : https://github.com/symfony-cli/symfony-cli/releases/download/v5.5.6/symfony-cli_windows_amd64.zip

Decompressez le fichier dans un dossier de votre choix. 
Vu qu'on doit faire appel à ce fichier depuis la console, le plus simple est de le copier dans xampp/php (qui se trouve déjà dans le path).


Autrement vous pouvez suivre les instructions dans la section qui correspond à votre système d'explotation (ex: utiliser Scoop dans Windows)

**Ce fichier exécutable permet de lancer un certain ensemble d'actions concernant le framework** (ex : créer un projet Symfony, lancer un serveur local propre pour ne pas dependre d'Apache...).

<br>

## 2.1. Installation du client sur OSX et création d'un projet

<br>
Installez le client Symfony (équivalent à symfony.exe en Windows):

```console
brew install symfony-cli/tap/symfony-cli
```

Si cette procédure ne fonctionne pas, téléchargez le client de GitHub


```console
https://github.com/symfony-cli/symfony-cli/releases/download/v6.3/symfony-cli_darwin_all.tar.gz
```

Faites l'extraction et rendez le fichier symfony executable

```chmod
chmod +x symfony
```

Deplacez ce fichier dans un dossier contenu dans le PATH
(ex: /Applications/xampp/xamppfiles/bin, le dossier de l'interprete de PHP)


<br>

Pour changer le PATH en OSX

https://techpp.com/2021/09/08/set-path-variable-in-macos-guide/


<br>

# 3. Création d'un projet de base (squelette)

Créons notre premier projet Symfony!

Allez dans votre dossier htdocs (ou un autre dossier de votre choix) et 

- Créez un projet squelette:  

```console
symfony new --webapp Projet1Symfony
```

Cette ligne créera un dossier contenant la structure d'un projet de base Symfony.

**Note** : si vous ne voulez pas installer **symfony.exe** vous pouvez toujours créer vos projets en utilisant composer directement

```console
composer create-project symfony/website-skeleton Projet1Symfony
```


- Lancez le **serveur web interne** de Symfony depuis la console **et dans le dossier du projet** pour tester son bon fonctionnement (on utilisera ce serveur au lieu d'Apache dans la phase de dev). Allez dans le dossier de votre projet et tapez :

````console
cd Projet1Symfony
symfony server:start
```` 

ou l'équivalent

````console
cd Projet1Symfony
symfony serve
```` 

- Testez le bon fonctionnement du serveur en regardant les messages sur la console et en tapant l'adresse suivante dans le navigateur : http://localhost:8000/
  Vous devriez être dirigé à une page d'accueil.

Vous pouvez aussi ouvrir un navigateur depuis la console 
```` 
symfony open:local
````

- Ouvrez le dossier de ce projet en Visual Studio et créez un fichier de workspace.

<br>

<br>



# 4. Routing

**Objectif** : comprendre l'utilité et le fonctionnement de base des routes dans un framework (Symfony) et être capable de créer des routes
vers les actions des controllers

La documentation complete se trouve ici: https://symfony.com/doc/current/routing.html


Nous avons une application vide et le serveur interne fonctionne... maintenan on peut créer un controller et une action (pas de vues ni de modèles pour le moment!). Mais d'abord on doit comprendre un minimum sur le fonctionnement du **routing** dans Symfony (valable pour tous les autres frameworks!)

## 4.1. Les bases du routing

<br>

Une **route** nous **sert à accéder à une ressource** de l'application
(une action, une page, une image). Pour accéder aux ressources d'une
application web de base **nous sommes habitués à saisir une page PHP
dans l**'**URL** (avec de paramètres, éventuellement) **qui corresponde
à un fichier qui existe dans le serveur**.

**Exemples :**

Adresses standards vers de pages .php:

http://localhost/appAgenda/pages/afficherContacts.php

http://localhost/videoClub/films/rechercherFilm.php?nom=Alien&genre=Scifi&tutu=blablabla

Dans de vraies applications nous devons créer des URLs plus simples, pas seulement pour soigner l'esthétique
mais aussi pour faciliter la saisie et pour la sécurité du site. En général nous voulons taper une
URL sur le navigateur et charger un fichier qui ne corresponde pas
forcement au chemin qu'on tape sur l'URL.

**Exemple :** pour charger la page

http://netflox.localhost/recherche.php?prix=5000&category=four

Nous voulons juste taper :

http://netflox.localhost/recherche/5000/4

Pour ce faire, on utilise une technique qui s'appelle **réécriture
d'URL**.

**Nous allons définir toutes les routes d'un projet nous-mêmes**. Une route
indiquera la correspondance entre ce qu'on tape dans le navigateur et
le code qui sera lancé (dans notre cas une **action d'un controller**, car on utilise le **MVC**) .

Les routes sont définies **dans le code des controllers** (une route pour chaque action). Pour définir une route de Symfony nous pouvons utiliser quatre systèmes :
**annotations, attributs de PHP8, YAML ou  XML**

Suivant les bonnes pratiques de Symfony on
utilisera les **attributs de PHP8** (https://stitcher.io/blog/attributes-in-php-8) ou les **annotations**

Les **annotations** existent dans plein de langages et spécifient des informations extra **(meta-data)** pour de classes, méthodes, variables etc...

À partir de PHP8 on peut exprimer ces mêmes meta-données en utilisant des **attributs**. La notation est:

```php
#[Route("/exemple/affiche/vue1")]
``` 

On doit connaitre ces deux systèmes (annotations et attributs) car dans plein de tutos et documentation on verra encore les annotations.

Les attributs font partie de PHP8 et pour utiliser les annotations il faut installer un module dans le projet. Lancez :

```console
        symfony composer req annotations
```
Si le module a été déjà installé composer vous notifiera.
Tous les deux vont nous servir à la même chose!

<br>

## 4.2. Création d'un controller de base et des routes

<br>

Nous allons créer maintenant un **controller** **à la main** (expliqué en détail dans les sections qui suivent) contenant une route créée avec **des attributs PHP** :

Créez le fichier **ExemplesRoutingController.php** dans le dossier *src/Controller* du projet **Projet1Symfony**.

```php
<?php

namespace App\Controller;

// classe de laquelle on doit hériter pour que notre classe soit un controller
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// classe pour créer une Réponse à envoyer au client
use Symfony\Component\HttpFoundation\Response;
// classe qui nous permet de créer de routes
use Symfony\Component\Routing\Annotation\Route;

// notre classe hérite de AbstractController pour être un controller
class ExemplesRoutingController extends AbstractController
{
    // voici la route sous la forme d'attribut PHP8
    
    #[Route('/exemples/routing/accueil')]
    public function afficherMessageAccueil ()
    {
        // la façon la plus simple (pas la seule!) d'envoyer un contenu au client: créer un objet Response et envoyer du HTML dans le constructeur
        return new Response(
            '<html><body>Je suis une action du controller ExemplesRoutingController.</body></html>'
        );
    } 

}
```
La ligne:
```php
#[Route('/exemples/routing/accueil')]
```
qui crée la correspondance entre
ce qu'on tape dans l'url :

http://projet1symfony.localhost/exemples/routing/accueil

et l'action à lancer (la méthode qui se trouve juste après
l'annotation) : **afficherMessageAccueil**


**IMPORTANT**: 

**Si vous utilisez les annotations, attention car vous devez utiliser les doubles guillemets partout!**

**IMPORTANT** pour l'erreur "Route Not Found": 

Si vous avez une erreur de "Route not found" et vous êtes completement certaines que vos routes sont bonnes, videz la caché de Symfony et ré-essayez.

```console
symfony console cache:clear --env dev
```

```php
// notre classe hérite de AbstractController pour être un controller
class ExemplesRoutingController extends AbstractController
{
    // voici la route sous la forme d'attribut PHP8
    #[Route('/exemples/routing/accueil')]
    
    public function afficherMessageAccueil ()
    {
        // la façon la plus simple (pas la seule!) d'envoyer un contenu au client: créer un objet Response et envoyer du HTML dans le constructeur
        return new Response(
            '<html><body>Je suis une action du controller ExemplesRoutingController.</body></html>'
        );
    } 

}
```

Une route indiquera alors une **action à lancer (méthode d'une classe) qui se trouve dans un controller (la classe, dans un fichier .php)**

**Note:** on a choisit d'inclure le nom du controller dans la route. Ce n'est pas obligatoire, la route précédente aurait pu être :

```php
    #[Route('/louloulou/accueil')]
```
Mais le fait d'inclure le nom du controller est souvent une bonne manière de faciliter la lecture du code.


Vous pouvez afficher toutes les routes de votre projet en tapant dans la
console cette ligne :

```console
symfony console debug:route
``` 

L'outil **bin/console** vous permet de générer des bases de données à
partir des entités, d'obtenir information du debugging et de plein
d'autres opérations

Tel que l'on a dit, dans les exemples successifs la route
contiendra souvent le nom de l'action. Le camel-case sera transformé selon
le critère ci-dessous :

```php
public function monAction1() 
```
devient:

```php
"/exemples/routing/mon/action1"
```

Dans le controller ci-dessus on a juste envoyé du code HTML directement
au client en utilisant l'objet **Response**, sans passer par une vue. Mais cette méthode est impossible d'utiliser si on veut créer toute une page
HTML... on ne va pas mettre tout le code HTML dans l'action du controller car on ne respecterait pas la séparation du MVC! La solution est de créer une **vue** qui s'en charge du rendu de la page.

Un action d'un un controller a souvent une vue associé. On étudiera les vues plus tard.

La structure complète du controller, ainsi que l'objet **Response**,
seront expliqués aussi plus tard, il faut juste savoir que Response nous
sert à envoyer une réponse directement au navigateur **sans passer par
une vue**.


### Exercices : création des actions

1.  Créez une nouvelle action monAction1 qui affiche le message "Ce controller est en charge du répertoire de l'application et je suis juste une action à l'intérieur"

2.  Créez une nouvelle action monAction2 qui affiche la date actuelle. Le path pour la route peut (ou pas) correspondre au nom de l'action, c'est à vous de choisir selon les circonstances et votre critère

<br>

### 4.2.1. Les routes contenant de paramètres
<br>

**Objectif** : créer une action qui puisse accéder aux paramètres
envoyés dans l'URL de la même façon qu'on fait en utilisant $_GET
dans un code PHP normal

Nous avons déjà mentionné que, grâce à la réécriture des URLs nous
n'utiliserons plus le format habituel de passage de paramètres dans
l'URL :

http://netflox.localhost/recherche.php?prix=5000&category=four

Les routes contenant de paramètres auront ce format à partir de maintenant :

<http://netflox.localhost/recherche/5000/four>

On va configurer de routes pour pouvoir accéder facilement à ces
paramètres.

En général le format de routes sera :

**serveur/action/valeurParam1/valeurParam2/...**

Voici un autre exemple :

[http://jamazon.com/produits/add/**5000**/galaxy-s25](http://jamazon.localhost/produits/add/5000/galaxy-s25)

Cette ligne appelle l'action **add** du controller **produits** et lui
envoie les valeurs des deux variables. Voici un exemple pratique.


**Exemple :** Rajoutons à notre controller une action "afficherContact" qui reçoit un prénom et le nom d'une profession

http://localhost:8000/exemples/afficher/contact/Marie/formatrice

et affiche un message de "Je suis Marie et je suis formatrice". 

L'action doit obtenir les valeurs reçues dans l'URL en
utilisant un nouvel objet: **Request** (au lieu de l'array `$_GET` ou `$_POST` qu'on utilise normalement en PHP)


**Procédure :**


1.  **Créez l'action** afficherAction dans le controller **Exemples**. 

Importez d'abord l'objet **Request** pour pouvoir obtenir les paramètres de l'url.
```php
use Symfony\Component\HttpFoundation\Request;
```

2. Créez l'attribut php pour **spécifier la route** et puis le **code de 'action**.

```php
#[Route("/exemples/routing/afficher/contact/{prenom}/{profession}")]
public function afficherContact(Request $objetRequest)
{
    // on obtient les valeurs des paramètres de l'url grâce à la méthode "get" de l'objet Request
    $lePrenom = $objetRequest->get("prenom");
    $laProfession = $objetRequest->get("profession");
    return new Response("<br>Je suis " . $lePrenom . ", " . $laProfession);
}
```

Dans ce cas nous n'avons pas une vue, on renvoi la réponse HTML
directement au client en utilisant l'objet Response

3. **Lancez l'action** en tapant l'URL

[http://projet1symfony.localhost/exemples/afficher/Marie/formatrice](http://projet1symfony.localhost/agenda/afficher/Marie/formatrice)

<br>

### Exercices : création d'actions contenant de paramètres

1.  Créez une nouvelle action afficheTVAC qui reçoit un prix et affiche le prix TVAC 

2.  Créez une autre action qui reçoit trois valeurs et affiche la moyenne 

<br>

### 4.2.2. Les contraintes dans les routes 

<br>

Nous pouvons limiter les caractères qui peuvent apparaitre dans les paramètres d'une route (pour limiter la saisie dans la barre d'adresse
du navigateur, par exemple).

**Exemple :** dans l'action suivant nous voulons forcer le paramètre
**âge** à contenir uniquement un ou plusieurs caractères uniquement
numériques et pas de lettres

```php
#[Route("/exemples/routing/bienvenue/age/{age}",requirements:['age'=>'\d+'])]
public function bienvenueAge (Request $objRequest){
    return new Response ("Bienvenue au site, vous avez ".$objRequest->get ("age")." ans");
    
}
```
On a utilisé la balise **requirements** et on rajoute une expression
régulière (ici **\d+**). Si vous voulez commencer à créer des
expressions régulières pour vos propres routes, vous pouvez utiliser ce
résumé :

<http://jkorpela.fi/perl/regexp.html>

Nous pouvons aussi choisir un autre format ou on n'utilisera pas la
balise **requirements**. On rajouter l'expression régulière dans de
balises **<>** :

```php
#[Route("/exemples/routing/bienvenue/age/{age<\d+>}")]
public function bienvenueAge (Request $objRequest){
    return new Response ("Bienvenue au site, vous avez ".$objRequest->get ("age")." ans");    
}
```

Si vous ne respectez le format, Symfony affichera **une erreur de route
introuvable**. Pour le moment nous sommes en mode de **développement
(dev)** et Symfony nous montrera l'erreur dans le **Symfony Profiler**
(outil de Symfony pour faciliter le debugging, expliqué plus tard).
Quand on changera au mode **production (prod)** on verra juste un simple
message d'erreur 404 -- page introuvable.


<br>

### Exercices : création de contraintes dans les paramètres des routes

<br>

En utilisant la documentation sur les expressions régulières :

1.  Créez une action "afficheVille" qui reçoit le nom d'une ville. Le
    nom doit contenir uniquement de lettres ou de chiffres mais pas
    d'autres caractères (voir $, %, ^ etc...)

2.  Modifiez l'action précédant pour que le paramètre "ville" puis
    avoir une taille maximale de 15 caractères

3.  Créez une action de votre choix contenant de restrictions pour
    le/les paramètres

<br>

### 4.2.3. Les valeurs par défaut

<br>

Nous pouvons facilement établir une valeur par défaut pour nos
paramètres en rajoutant **?** et puis la valeur dans l'annotation.

**Exemple :** donner une valeur par défaut au paramètre TVA de l'action
qui calcule la TVA

```php
#[Route ("/exemples/routing/affiche/prix/defaut/tvac/{prix}/{tauxTVA?21}")]
public function affichePrixDefautTvac(Request $objetRequest)
{
    $prix = $objetRequest->get("prix");
    $tauxTVA = $objetRequest->get("tauxTVA");
    return new Response("<br>Le produit coûte ".$prix. " euros, ".($prix * (1 + $tauxTVA / 100)). " TVAC");

}  
```


<br>

### Exercices : utilisation de valeurs par défaut


<br>
Créez une action "afficheMessage" qui affiche un message un certain
nombre de fois à l'utilisateur. Le message est reçu dans l'url, ainsi
que le nombre de fois. Si le nombre de fois n'est pas indiqué,
l'action l'affichera 10 fois. Le paramètre qui contienne le nombre de
fois doit être numérique

Pour avoir plus information sur la gestion de routes, allez sur la
documentation de Symfony :

<https://symfony.com/doc/current/routing.html>

<br>

### 4.2.4. Paramètres optionnels

<br>

Vous pouvez créer une route contenant des paramètres optionnels. Il **suffit de rajouter '?' après le nom du paramètre**.

**Exemple** :

```php
#[Route ("/exemples/routing/affiche/prix/opt/tvac/{prix}/{tauxTVA?}")]
public function afficheOptPrixTaux (Request $objetRequest){
    $prix = $objetRequest->get ("prix");
    $tauxTVA = $objetRequest->get ("tauxTVA");
    if (!isset($tauxTVA)){
        $tauxTVA = 21;
    }
    return new Response ("Prix TVAC : " . $prix * (1+$tauxTVA/100));
}
```
<br>

### 4.2.5. Les valeurs alternatives pour les paramètres

<br>

Vous pouvez obliger à un paramètre à avoir une valeur parmi un ensemble de valeurs de votre choix en utilisant l'opérateur OR dans la route.

**Exemple**: le paramètre "disponibilité" peut prendre trois valeur (et en plus il est optionnel !)

```php
#[Route ("/exemples/routing/affiche/disponibilite/{disponibilite<oui|non|en attente>?}")]
public function afficheDisponibilite(Request $objRequest)
{
    return new Response("Le produit est " . $objRequest->get("disponibilite"));
}
```
<br>


# 5. Controllers 

## 5.1. Création d'un controller sans assistant

<br>

**1**.  **Créez la classe vide du controller dans le Namespace App\Controller**

**Exemple** : **ContactsController**. La classe doit se trouver dans un fichier ContactsController.php. Utilisez le
NameSpace qui lui correspond (App\Controller par défaut)

```php
<?php
namespace App\Controller;

class ContactsController extends AbstractController{

// ici les actions

}
```
<br>

**2**.  **Importez la classe AbstractController car votre controller
    héritera cette classe (extends)**. Si vous allez utiliser les
    classes **Response** et **Request** importez-les aussi. Importez la
    classe **Annotations** pour pouvoir créer les routes

```php
<?php
namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// pour pouvoir utiliser de routes, même si on n'utilise pas des annotations mais de paramètres PHP
use Symfony\Component\Routing\Annotation\Route;

class ContactsController extends AbstractController{

// ici les actions

}
```
<br>

**3**.  **Créez les actions de votre choix dans le controller (dans la classe)**

```php
public function afficherTous (){
    $noms = ['Lucy', 'Juan', 'Salima', 'Mar', 'Lupita',
    'Marie'];
    $strNoms = implode (",", $noms);
    return new Response ($strNoms);
}
```

**4**.  Rajoutez une route pour chaque action que vous venez de créer (avec de paramètres PHP8 ou avec des annotations)

```php
// paramètres PHP8
#[Route ("/contacts/afficher/tous")]
public function afficherTous (){
    $noms = ['Lucy', 'Juan', 'Salima', 'Mar', 'Lupita',
    'Marie'];
    $strNoms = implode (",", $noms);
    return new Response ($strNoms);
}
```

```php
// annotations
/**
 * @Route ("/contacts/afficher/tous")
 */
```


**5**.  **Lancez l'action**

<http://localhost:8000/contacts/afficherTous>

Le code final du controller sera :

```php
<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ContactsController extends AbstractController
{

    // ici les actions
    #[Route("/contacts/afficher/tous")]
    public function afficherTous()
    {
        $noms = [
            'Lucy', 'Juan', 'Salima', 'Mar', 'Lupita',
            'Marie'
        ];
        $strNoms = implode(",", $noms);
        return new Response($strNoms);
    }
}
```

### Exercices : création de Controllers

Créez un controller **Exercice1Controller**. Créez deux actions pour ce controller. Utilisez de paramètres dans au moins une des actions

<br>


## 5.2. Création d'un controller avec l'assistant

Vous pouvez utiliser la commande


```console
symfony composer req maker --dev
```

pour installer un module de Symfony capable de créer la structure de base d'un controller (si vous ne voulez pas le faire à la main)

Ce module permet de lancer la commande suivante en console :

```console
symfony console make:controller MonNouveauController
```


et générer automatiquement le squelette d'un controller. Symfony génère le fichier du controller, une action route ainsi qu'une vue associée (dans un dossier dans **templates**). Testez-le par vous-mêmes.

### Exercices : utilisation de paramètres

Créez un controller **Exercice2Controller**. Créez deux actions pour ce controller. Utilisez de paramètres dans au moins une des actions

<br>

## 5.3. L'objet Response (opt)

<br>

Dans les exemples précédents, les actions **gêneraient** **un contenu
HTML manuellement et l'envoyaient au navigateur en utilisant un objet
de la classe Response**

Un objet **Response** contient toutes les propriétés et les méthodes
pour **définir la réponse au client** (en plus du contenu HTML), mais
ici on va se concentrer sur les plus basiques et indispensables :

-   Le **content** (contenu envoyé au client : un **code HTML**, un
    **contenu JSON**...) et

-   Les **headers** (entêtes http pour indiquer, entre autre, le type de
    réponse qu'on envoie au client -- **HTML, JSON**...). Voici un
    exemple dans une action :

**Exemple** : création d'une action qui utilise l'objet Response (ExemplesReponsesController.php)

N'oubliez pas de rajouter la route !!

```php
#[Route ("/contacts/message/response")]
public function messageResponse(){
    $contenu = "<h1>Je vais être le contenu d'un objet
    Response</h1>";
    $reponse = new Response ();
    $reponse->setExpires(new \DateTime('2025/3/8'));
    $reponse->headers->set ('Content-Type','text/html');
    $reponse->setContent($contenu);
    return $reponse;
}
```
<br>

## 5.4. L'objet Request (opt)

Quand on fait appel à une action du controller on est en train de
**faire une requête au controller** (rien à voir avec les requêtes de BD
!). Les informations concernant cette requête (ex : les valeurs des
paramètres dans la URL) sont accessibles via l'objet **Request**.

L'objet **Request** nous permet d'accéder aux variables super-globales
telles que **`$_POST`**, **`$_GET`**, **`$_SERVER`** , **`$_FILES`**.
Regardez cette documentation pour savoir comment accéder à chaque
variable :

<https://symfony.com/doc/current/components/http_foundation.html>

Pour qu'une action puisse accéder à l'objet Request **on doit
juste rajouter un paramètre du type Request dans la signature de
l'action (injecter l'objet Request)**.

On doit importer la classe : 
```php
use Symfony\Component\HttpFoundation\Request;
```


**Exemple** : Utilisation de l'objet Request

Créez l'action suivante dans le controller ContactsController (rajoutez
la route !) et lancez-la dans le navigateur

```php
// L'objet Request rajouté dans la signature de l'action contiendra les données
// de la requête faite au serveur. En ce qui nous concerne maintenant,il 
// contiendra les valeurs des paramètres de l'URL.

#[Route("/contacts/message/request/{prenom}/{profession}")]
public function messageRequest(Request $objetRequest)
{
    echo "Je suis dans le controller, action 'afficher'";
    // on obtient les valeurs des paramètres de l'url,
    // on fait appel à la méthode get de l'objet Request
    $lePrenom = $objetRequest->get("prenom");
    $laProfession = $objetRequest->get("profession");
    return new Response("<br>Le prénom dans l'URL est:" . $lePrenom . "<br>La profession dans l'URL est:" . $laProfession);
}
```

Par la suite on verra comment créer de vues qui reçoivent de données
depuis le controller.

<br>

## 5.5. Types de réponses d'un controller: render, redirect, redirectToRoute, forward, renderView

<br>

Une action dans un controller peut générer du HTML, JSON, XML, le
téléchargement d'un fichier, une redirection vers une autre action, une
erreur 404 ou plein d'autres résultats : tout dépend de nos besoins.
Parmi les actions principales on a :

**render** permet d'afficher une vue

**redirect** permet de rediriger le navigateur vers une autre adresse,
sans ou avec de paramètres

**redirectToRoute** permet de lancer une action mais en utilisant le nom
(**name**) d'une route. On va voir des exemples dans ce chapitre

**forward** permet de déléguer l'action (pas d'erreur http)

**renderView** permet d'obtenir le rendu d'une vue sans les en-têtes HTML. C'est à dire c'est une action qui ne chargera pas une page (à différence de toutes les précédentes)... elle nous donne simplement le HTML qui correspond à la vue choisie. C'est utile si on utilise AJAX. 

Note : Pour comprendre le fonctionnement de ces réponses, on va créer
des actions dans un nouveau controller ExemplesReponsesController

<br>

### 5.5.1. Redirect (opt)

<br>

La méthode redirect nous permet d'appeler une autre action dans un
autre controller ou rediriger vers une autre adresse web

**Exemple :** redirection vers une autre adresse avec de paramètres

```php
// cette action reçoit un titre de film et réalise une redirection vers imdb
// pour chercher le film

#[Route ("/exemples/reponses/exemple/redirect/{titreFilm}")]
public function exempleRedirect(Request $req)
{
    $titreFilm = $req->get("titreFilm");
    $url = "http://www.imdb.com/find?ref_=nv_sr_fn&q=".$titreFilm;
    // maintenant redirige vers un site externe
    return $this->redirect($url);

}
```

<br>

### 5.5.2. RedirectToRoute (opt)

<br>


Pareil que "Redirect" mais au lieu de spécifier la route complète on
utilisera sa propriété **name**. Nous pouvons envoyer de paramètres à la
nouvelle route.

**Exemple** : Redirection vers une nouvelle route sans paramètres

```php
// Cette action est juste un exemple qui montre comment une action peut
// rediriger vers une autre en utilisant la propriété "name"

#[Route ("/exemples/reponses/redirection/avec/name")]
public function redirectionAvecName(Request $req)
{
    // faire quoi qui ce soit ici....
    // et rediriger après vers une autre route en lui envoyant de paramètres
    return $this->redirectToRoute("spaghettiCarbonara");
}

#[Route ("/exemples/reponses/action/avec/name",name:"spaghettiCarbonara")]
public function actionAvecName(Request $req)
{
    return new Response("Je suis une action qui a été appelée par une autre, je porte un nom");
}
```

<br>

**Exemple** : Redirection vers une nouvelle route avec de paramètres (l'action cible reçoit les paramètres dans l'URL)

```php
// Cette action redirige vers une autre en utilisant la propriété "name" de la 
// deuxième et en lui envoyant de paramètres sous la forme d`array 

#[Route ("/exemples/reponses/redirection/avec/name/params")]
public function redirectionAvecNameParams(Request $req)
{
    // faire quoi qui ce soit ici....
    // et rediriger après vers une autre route
    return $this->redirectToRoute("spaghettiBolognese",
    ['type'=>'bio',
    'prix'=>'10']);
}

#[Route("/exemples/reponses/action/avec/name/params/{type}/{prix}",name:"spaghettiBolognese")]
public function actionAvecNameParams(Request $req)
{
    $type = $req->get("type");
    $prix = $req->get("prix");
    return new Response("Je suis une action qui a été appelée par
    une "
    . "autre, je porte un nom et je reçoit des valeurs: ".$type."
    ".$prix);
}
```
<br>

### 5.5.3. Forward (opt)

<br>

Forward nous permet d'appeler une autre action **d'un autre controller**

**Exemple** : Appel à une autre action d'un autre controller

Ici on a créé l'action "forwardExemple" (n'oubliez pas la route !)
dans le controller

```php
// utilisation de forward pour appeler une action du controller ContactsController

#[Route("/exemples/reponses/forward/exemple")]
public function forwardExemple()
{
    return $this->forward(
        'App\Controller\ContactsController::afficherTous'
        // Le forward peut avoir aussi des paramètres 
        // , ['param1' => $val1,
        // 'param2' => $val2 , etc... ] );
    );
}
```
<br>

### 5.5.4. Render

<br>

La méthode **render** prend le nom de la vue (.twig) et optionnellement
une variable contenant de données. L'idée est de passer de données du
controller à la vue.

Par exemple : le controller accède à une BD, obtient un array ou des
objets contenant les données d'un tableau et l'envoie à la vue pour
qu'elle puisse les afficher.

On va étudier cette méthode dans la section qui suit.

<br>


# 6. Les Vues. Le moteur de templates TWIG

<br>

En Symfony nous pourrions générer les vues en utilisant du HTML et PHP pur, mais l'utilisation de TWIG comme **moteur de templates** nous facilitera beaucoup la tâche. **Un moteur de templates sert à générer les vues (HTML + JS) à partir d'un fichier de base (template).** On part du principe que tout ce qui concerne la présentation (les vues) se trouvera
dans les templates (jamais dans le controller et encore moins dans le modèle!).

**Note:** Exemples dans **ExemplesTwigController** dans **Projet1Symfony**

Le moteur TWIG est un **composant** de Symfony mais on pourrait l'utiliser dans n'importe quel projet ailleurs.

Les principaux avantages de TWIG sont :

1.  Il **masque le langage de programmation** des vues : il n'y a pas du PHP dans les templates !

2.  Il fournit une **bonne interface avec les contrôleurs** (ex: recevoir et envoyer des structures de données)

3.  Il nous permet de créer des **hiérarchies de templates** (en détail plus tard, mais on peut déjà mentionner que c'est très utile pour créer une master page)

4.  On peut le lier avec modèle en utilisant **Doctrine** (en détail plus tard)

5.  On peut utiliser un squelette twig **avec d'autres langages de programmation** (ex : python)

Quand on lance la méthode **render** depuis un controller, Symfony parcourt le fichier **.twig** correspondant et génère un objet **Response** à partir de ce fichier. Cet objet génère le HTML+JS qui sera renvoyé au serveur.

Attention : les fichiers .twig utilisent la notation snake case. Ex: Le template pour une action mangeonsDuChocolat sera un fichier portant le
nom mangeons_du_chocolat.html.twig

Notes de base sur Twig :

<https://twig.symfony.com/doc/3.x/>

La documentation complete sur les vues en Symfony se trouve ici :

<https://symfony.com/doc/current/templates.html>

<br>

## 6.1. Création d'un template Twig

<br>

On va créer un template Twig qui génèrera notre vue. Le template reçoit un tableau qui a été créé dans le controller et l'affichera. Normalement le controller accédera à une base de données, mais pour simplifier notre exemple on crée juste un tableau. Faisons un exemple en partant de zéro:

1.  **Créez un controller** ExemplesTwigController
```console
    symfony console make:controller ExemplesTwig
```
L'assistant créera le fichier du controller dans
src/Controller, ainsi qu'un dossier exemples_twig dans le dossier **Templates**. Ce dossier contiendra toutes les templates twig liées aux
actions de ce controller. Par défaut il y aura déjà une action **index** et un template **index.html.twig**

Vous pouvez faire appel à cette action pour afficher la vue en tapant la route dans le navigateur :

    http://localhost:8000/exemples/twig

car la route définie dans l'action est :

```php
#[Route('/exemples/twig', name: 'exemples_twig')]
```


2.  Créez une **action** exemple1 dans ce controller. Dans l'action
    vous devez indiquer à Symfony de renvoyer au navigateur le rendu de
    la vue qu'on va créer :

```php
#[Route ('/exemples/twig/exemple1',name:'exemple1Twig')]
public function exemple1 (){
    return $this->render ('exemples_twig/exemple_1.html.twig');
}
```

3.  Créez le **template twig** : templates/<nom_du_controller>/<nom_du_template>

Ici il s'agit de **templates/exemples_twig/exemple_1.html.twig**
Attention à la transformation vers snake case!

Le nom du fichier du template sera le nom spécifié dans l'appel à render du controller


```twig
{% extends 'base.html.twig' %}
{% block body %}
Bonjour! je suis un template!
{% endblock %}
```

**Important**: effacez les lignes 9 et 13 qui font référence à **encore**. On traitera ce sujet plus tard.

Lancez maintenant l'action dans le navigateur.

```console
localhost:8000/exemples/twig/exemple1
```

Le mot **extends** indique que le template de notre vue **hérite** du template **base.html.twig**.
**base.html.twig** est un **layout** qui contient de blocs (du HTML, JS, CS... ).
Dans nos vues on spécifie le contenu d'un certain bloc du layout (ici, le plus simple : block **body** en bas de la page).

C'est un système très utile car il nous epargne du code (repétition de balises html,js, css... et tout ce qu'on repéte dans plusieurs vues du site).

Voici le contenu de **base.html.twig**:
```twig
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{% block title %}Vive les wads!{% endblock %}</title>
        <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>">
        {# Run `composer require symfony/webpack-encore-bundle` to start using Symfony UX #}
        {% block stylesheets %}
            {# {{ encore_entry_link_tags('app') }} #}
        {% endblock %}

        {% block javascripts %}
            {# {{ encore_entry_script_tags('app') }} #}
        {% endblock %}
    </head>
    <body>
        {% block body %}
        Contenu de base 
        {% endblock %}
    </body>
</html>
```
On peut avoir autant de blocks qu'on veut.
Par exemple (fichier **base.html.twig**):
```twig
.
.

        {% block body %}
        Contenu de base 
        {% endblock %}
        <h4>Contenu du layout au milieu de deux blocs</h4>
        {% block extra %}
        Contenu extra
        {% endblock %}
.
.

```

Et utilisation dans une vue:
```twig
{% extends 'base.html.twig' %}

{% block body %}
je suis une autre view, mais dans un layout
<br>
tout ce que je veux!
{% endblock %}

{# contenu au milieu de deux blocs dans la vue, pas possible!
On doit mettre la totalité du contenu dans de blocs si on 
hérite d'un layout  #}

{% block extra %}
<br>
Le block extra de la vue
{% endblock %}
```








Conservez cette structure de blocs dans vos twigs et remplissez à chaque fois le contenu du block body. On étudiera plus tard comment utiliser les blocs pour enrichir la structure d'un template twig. Lancez la page juste pour tester si tout est en ordre, puis continuez la lecture.

#### **Exercices** : création d'une action et un template

Créez une deuxième action afficheclient et un template qui affiche "vive la Belgique"

<br>

## 6.2. Les variables TWIG

<br>

Twig peut utiliser des **variables**, ce qui nous permet d'accéder d'une façon très simple aux données envoyées au template par le controller. Pour accéder à une **variable** nous devons utiliser cette notation :

```twig
{{ nom }}
```
Pour accéder aux propriétés d'un **objet** on utilisera cette notation :

```twig
{{ client.nom }}
```
Ces variables proviennent du controller. Voyons un exemple. Créez cette action dans le controller :

```php
#[Route('/exemples/twig/affiche/ville', name: 'afficheVille')]
public function afficheVille()
{
    // nous créons une structure de données
    $vars = [
        'nom' => 'Bruxelles',
        'population' => 1500000,
        'pays' => 'Belgique'
    ];
    // render reçoit l'array associatif et renvoie l'objet Response
    // on accédera à cette array depuis la vue
    return $this->render(
        'exemples_twig/affiche_ville.html.twig',
        $vars
    );
}
```

Nouvenons de rajouter un paramètre à l'appel **render**. Cela nous permet d'envoyer de valeurs à la vue. Le format est **d'un array associatif dont les clés deviennent de variables** accessibles dans le twig. Ici on l'a appelé $vars mais le nom n'a aucune importance.

On va utiliser maintenant ces variables dans le template twig. **Notez que pour accéder aux variables on a juste utilisé les clés de l'array**


```twig

{% block body %}

Le nom de la ville est:
{{ nom }}
La population est:
{{ population }}
Cette ville se trouve dans ce client:
{{ client }}

{% endblock %}
```
Faites appel à l'action et observez le résultat.

Nous avons envoyé un array associatif dans le controller. Si on a juste une valeur simple à envoyer c'est encore plus simple :

```php
return $this->render ('exemples_twig/blablabla.html.twig',
['cinema'=> 'Aventura']);
```
et on accède dans le template twig:
```twig
{{ cinema }}
```

Si on veut envoyer un array indexé il faudra lui "donner" une clé pour qu'il soit accessible dans le fichier twig. Par exemple :

```php
$lesStagiaires = ['Lucie','Salima','Doris'];
```

Render enverra un array associatif contenant **une clé** dont le contenu est l'array complet :

```php
$vars = ['lesStagiaires' => $lesStagiaires ]
```
Dans le fichier twig on pourra accéder en utilisant la notation normale
d'array :

```twig
{{ lesStagiaires[0] }}
{{ lesStagiaires[1] }}
{{ lesStagiaires[2] }}
```
Pour les objets **c'est exactement la même chose mais on utilisera la
notation de "."** dans le fichier twig pour pouvoir accéder ses
propriétés (pas la flèche de PHP!)

Exemple : envoyer des objets 

```php 

// dans le controller
.
.
.

    // action qui renvoie un objet à la vue
    #[Route('/exemples/twig/afficher/objet')]
    public function afficherObjet()
    {
        $v1 = new Voiture("Renault");
        $vars = ['objetVoiture' => $v1];
        return $this->render('exemples_twig/afficher_objet.html.twig', $vars);
    }


    // action qui renvoie un array d'objets à la vue
    #[Route('/exemples/twig/afficher/array/objet')]
    public function afficherArrayObjet()
    {
        $v1 = new Voiture("Renault");
        $v2 = new Voiture("AUDI");
        $v3 = new Voiture("Porsche");
        
        $vars = ['arrayObjetsVoiture' => [ $v1, $v2, $v3] ];
        return $this->render('exemples_twig/afficher_array_objet.html.twig', $vars);
    }
}

// à ne pas faireici, c'est juste un exemple!
class Voiture
{
    public string $marque;
    public function __construct(string $marque)
    {
        $this->marque = $marque;
    }
    public function getMarque(): string
    {
        return $this->marque;
    }
}
.
.

```

Le code des vues:

- Pour afficher un objet: 
```twig
{% extends "base.html.twig" %}
{% block body %}
La voiture : 
{{  objetVoiture.getMarque }}
{% endblock %}
```
- Pour afficher un array d'objets
```twig
{% extends "base.html.twig" %}
{% block body %}
Les voitures : 
{{ arrayObjetsVoiture[1].getMarque }}
{{ arrayObjetsVoiture[0].getMarque }}
{{ arrayObjetsVoiture[2].getMarque }}
{% endblock %}
```


Vous pouvez aussi **créer de variables dans twig**.

```twig
{{ set nomVar = 5 }}
{{ set tab = [4,5,6] }}
```

<br>


### Exercices : création de vues 

<br>

Créez un controller ExercicesVuesController.php

<br>

1.  Créez une nouvelle action afficheTvacTwig qui reçoit une valeur d'un prix dans l'URL et une valeur de TVA et calcule le prix Tvac. Créez un twig qui affiche "Le prix TVAC est xxx"

2.  Créez une nouvelle version de l'exercice précédent qui puisse
    afficher "Le prix xxxx euros avec le taux de TVA de xxxx % est x
    xxx"

3.  Créez une nouvelle action qui affiche un array de trois villes
    belges. Les villes sont fixées et se trouvent dans la vue, ne sont
    pas envoyées par le controller à la vue

4.  Créez une nouvelle version de l'exercice précédent où la liste de
    villes est envoyée depuis le controller à la vue dans un array

5.  Créez une nouvelle version de l'exercice 4. Cette fois l'action
    reçoit la langue d'affichage dans l'URL (FR ou NL). Le choix de la langue se fait grâce à un paramètre reçu par l'action.

6.  Affichez la date actuelle dans la vue. Utilisez la classe DateTime
    et envoyez l'objet à la vue. Dans la vue, utilisez la méthode
    **format** de la classe DateTime pour afficher la date proprement

<br>

## 6.3. Les conditions

<br>

Note: ces exemples se trouvent dans **ExemplesTwigIfController.php** dans **Projet1Symfony**

<br>

Le langage de TWIG inclut aussi les **conditions**. Voici un exemple:

```twig
{% if age > 18 and age < 60 %}
<p>Pas de réduction</p>
{% endif %}
```

Voici la documentation pour avoir plus de détails :

<https://twig.symfony.com/doc/3.x/tags/if.html>

### Exercices : conditions IF dans Twig

1)  Créez une action qui reçoit un prix dans l'URL. Cette  action reçoit le prix et le multiplie fois deux. Vérifiez dans la vue (pas dans le controller) que le prix ne dépasse pas 100 euros en utilisant une condition

<br>

## 6.4. Les boucles

<br>

Note: ces exemples se trouvent dans **ExemplesTwigBouclesController.php** dans **Projet1Symfony**
<br>


Nous pouvons aussi créer **de boucles du type "foreach" sur des éléments Iterables** (**arrays**, par exemple). Son utilisation est
assez simple :

1.  Créez l'élément à parcourir dans une action et renvoyez-le à la vue

2.  Utilisez la syntaxe **for - in** dans la vue pour parcourir l'élément

La syntaxe est très simple: 
```twig
{% for cle, valeur in tableau %}
voici la clé: {{ cle }}
<br>
voici la valeur: {{ valeur }}
<br>
{% endfor %}
```

La documentation sur les boucles se trouve ici :

https://twig.symfony.com/doc/3.x/tags/for.html


**Exemple** : création d'un array dans le controller et affichage dans la vue en utilisant une boucle

1.  Voici l'action. On a créé un array associatif

```php
#[Route("/exemples/twig/boucles/exemple1")]
public function exemple1 (){
    $vars = [
        'ville' => ['nom' => 'Bruxelles',
                    'population' => 1500000,
                    'pays' => 'Belgique']
    ];

    return $this->render ('exemples_twig_boucles/exemple_1.html.twig', $vars);

}
```

2.  Voici le contenu de la vue

```twig
L données dans l'array sont :
<table>
{% for cle, valeur in ville %}
<tr><td>{{ cle }}</td><td>{{ valeur }}</td></tr>
{% endfor %}
</table>
```

Si nous avons besoin de **parcourir un objet on doit le transformer en
array**. Cette conversion crée un array associatif dont les **clés**
sont les **propriétés de l'objet** et les **valeurs** sont les
**valeurs de ces propriétés**. Voici un exemple :

**Exemple** : parcourir un objet avec une boucle dans la vue

Nous créons un objet Film et on le renvoie à la vue. Nous devons convertir cet objet en array :

```php
#[Route("/exemples/twig/boucles/exemple2")]
public function exemple2 (){
    // les objets ne sont pas itérables mais les arrays oui,
    // on peut faire une conversion en utilisant le mot (array)
    $l1 = new Film ("Blade Runner", "Ridley Scott");
    // attention: on force la conversion d'objet en array.
    // cette conversion crée un array associatif dont les clés 
    // sont les propriétés de l'objet et les valeurs sont 
    // les valeurs de ces propriétés
    $vars = [ 'film' => (array)$l1];
    return $this->render ('exemples_twig_boucles/exemple_2.html.twig', $vars);
}


```

**Note:** Cette solution n'est pas terrible car la transformation en array ne se fera pas proprement dans plein de cas (ex: si on a un objet qui contient d'autres objets, tel que dans le cas de Livre et Exemplaires). 
En plus on ne peut pas utiliser les objets PHP dans les scripts JS, et si on utilise tout simplement json_encode (pour créer le JSON pour le client) on aura pas mal de problèmes (le plus important est que **json_encode encode uniquement les propriétés publiques des entités**).

Voici quelques exemples qui montrent l'encodage et la sérialisation: 

```php
// exemples simples encodage en JSON et limitations de json_encode
        
// simple array
$arr = [4, 5, 7];
$json = json_encode ($arr);
dd($json); // ok 

// array assoc
$arr = ['nom'=>'Lola',
        'age'=> 20];
$json = json_encode ($arr);
dd ($json); // ok

// objet Evenement
$obj = new Evenement();
$obj->setTitle ("repas");
$obj->setStart (new DateTime());
$json = json_encode ($obj);
dd ($json); // pas ok : json_encode n'encode pas des attributs private


// objet Evenement serialisé avec Serializer
$objEvenement = new Evenement();
$objEvenement->setTitle ("repas");
$objEvenement->setStart (new DateTime());
$objEvenement->setUtilisateur($utilisateur); // on affecte les références
$utilisateur->addEvenement ($objEvenement);
$json = $serializer->serialize($objEvenement,'json'); // erreur de référence circulaire 
// si on donne un Utilisateur à l'Evenement, il faut l'arranger
dd ($json);    
// même si vous lancez $this->json (raccourci pour faire appel au serialiser) vous allez avoir la même erreur


$evenementsJSON = $serializer->serialize($evenements, 'json', [AbstractNormalizer::IGNORED_ATTRIBUTES=> ['utilisateur'] ]); // ok! on ignore les références et il n'y a une référence circulaire Evenement->Utilisateur->Evenement
dd($json);

// Si vous voulez indiquer quoi serialiser au lieu de quoi ignorer, utilisez ATTRIBUTES
$evenementsJSON = $serializer->serialize($evenements, 'json',[AbstractNormalizer::ATTRIBUTES => ['start','title']]);
dd($json);
```        



Heureusement on a de composants de Symfony consacrés à la **Serialization**.  Regardez le chapitre consacré à ce sujer pour voir une solution propre.

Pour lancer ce code la classe Film doit exister (juste pour cet exemple créez la classe juste après la classe du controller, bien qu'on n'aura jamais deux classes dans le même fichier) :

```php
// une classe ne devra jamais être ici, c'est juste pour l'exemple!!
class Film 
{
    public $titre;
    public $auteur;

    function __construct($titre, $auteur) {
        $this->titre = $titre;
        $this->auteur = $auteur;
    }
}

```

### Exercices : communication Controller-Vue

1)  Créez une nouvelle action contenant un array d'objets (Films).
    Envoyez-le à la vue et affichez le contenu de chaque Film dans un
    tableau HTML

<br>

## 6.5. Les filtres

<br>

Note: ces exemples se trouvent dans **ExemplesTwigFiltresController.php** dans **Projet1Symfony**
<br>

Un filtre est une action sur une variable : mettre la variable
en majuscules, enlever les espaces dans une variable string, enlever les caractères spéciaux, renvoyer la taille d'un string ou un array...

La syntaxe des filtres est :

```twig
{{ variable | filtre }}
```
Cette expression renvoie le résultat d'appliquer le filtre à la
variable, par exemple :
```twig
{{ titre | lower }}
```
Affichera le titre en minuscules. Vous pouvez une liste **de filtres**
[ici](https://twig.symfony.com/doc/2.x/filters/index.html)

Voici un exemple de vue qu'utilise de filtres.

**Exemple 1** : action qui renvoie un array, vue qu'utilise un filtre pour mettre en majuscules la première lettre de chaque propriété de l'array

```php
#[Route("/exemples/twig/filtres/exemple1",name:"exemples_twig_filtres1")]
public function exemple1()
{
    
    $ville = ['nom' => 'Bruxelles',
            'population' => 1500000,
            'client' => 'Belgique'
    ];

    return $this->render('exemples_twig_filtres/exemple_1.html.twig', [
        'controller_name' => 'ExemplesTwigFiltresController',
        'ville' => $ville
    ]);
}
```
Voici le template
```twig
{% block body %}
{% if ville | length > 1 %}
Le tableau n'est pas vide
{% endif %}
<table>
    {% for cle, valeur in ville %}
    <!-- capitalize renvoie la variable en majuscules -->
    <tr>
        <td>{{ cle | capitalize }}</td>
        <td>{{ valeur }}</td>
    </tr>
    {% endfor %}
</table>
{% endblock %}
```

**Exemple 2** : Action qui renvoie un array à la vue. Utilisation du filtre "join". Rien ne change dans l'action, on change juste le template.

Le filtre "join" crée une chaine de caractères contenant tous les
éléments d'un array séparés par un "séparateur" choisi par
nous-mêmes. Voici un exemple où on enchaine les filtres "join" et
"upper" :

```twig
{% block body %}
{% if ville | length > 1 %}
Le tableau n'est pas vide, voici son contenu
{{ ville | join (" - ") | upper }}
{% endif %}
{% endblock %}
```

**Exemple 3** : Execution de plusieurs filtres sur les éléments d'un array


**Controller**
```php
#[Route('/exemples/twig/filtres/array')]
    public function filtresArray (){
        $vars = ['monArray'=> ['Madrid', 'Bruxelles', 'Tokyo']];
        return $this->render ('/exemples_twig_filtres/filtres_array.html.twig', $vars);
    }
```
**Vue** (**/exemples_twig_filtres/filtres_array.html.twig**)

```twig
{% extends "base.html.twig" %}

{% block body %}

{{ monArray[0] | upper }}
<br>
{{ monArray[1] | capitalize }}
<br>

{% for cle, val in monArray %}
{{ val | capitalize }}
{% endfor %}



<br>Le nombre de villes est : {{ monArray | length }}

{% if monArray | length > 2 %}
<br>Il y a plus de 2 villes
{% endif %}

<br>
{% for cle, val in monArray %}
{{ val | slice (0,3) }}
{% endfor %}

{% endblock %}
```


**Exercice 1:**  

Créez une action qui reçoit un nom et l'envoie à la vue. Dans la vue, faites le traitement suivant:

Si le nom contient la suite de lettres 'van ', affichez "`nom` est possiblement néerlandais". <br>
Si le nom finit pas la suite de lettres 'ska' ou 'ski' affichez un message: "`nom` est possiblement un nom de famille polonais!".<br> 
Si le nom finit la suite de lettres 'ani' ou 'oni', affichez "`nom` est possiblement italien".<br> 
Autrement, affichez "On ne sait pas vraiment d'òu il vient le nom <nom>"

Utilisez la doc! :

https://twig.symfony.com/doc/3.x/

(opérateur **in**, filtre **slice** en utilisant la notation **[]** - testez avec des indexes négatifs 'à la Python' pour obtenir les derniers caractères d'un string)

**Exercice 2**:

Créez une nouvelle version de l'exercice 1 où la vue reçoit un array de noms et traite chaque nom


<br>

## 6.6. Héritage de templates en TWIG (I)

<br>

Pour les sites qui contiennent un ensemble de pages qui partagent le
même contenu (ex: header, nav et footer) le moteur de TWIG possède un
**système d'héritage** qui nous permet de créer une sorte de master
page qui contiendra des blocs variables.

**Exemple** : création d'un squelette de master page et inclusion du contenu dans sa section principale (main)

	
1. Créez un controller ExemplesTwigHeritage et **template twig contenant le squelette d'une master page** : **master_page_1.html.twig**

```twig
<html>
<head></head>
<body>
    <header>
        <h1>Voici le header de la page</h1>
    </header>
    <main>
	  <!-- on indique que un bloc "contenuPrincipal" sera incrusté ici-->
        {% block contenuPrincipal %}{% endblock %}
    </main>
    <footer>
        <nav>
            <ul>
                <li>Option footer 1</li>
                <li>Option footer 2</li>
            </ul>
        </nav>
    </footer>
</body>
</html>
```

2.  **Créez deux templates pour les contenus** (ex:
    *contenu_1_master_page_1.html.twig* et
    *contenu_2_master_page_1.html.twig*) **qui héritent** de
    *master_page_1.html.twig* **en utilisant extends**. Délimitez le
    contenu de votre vue par les directives block .

*contenu_1_master_page_1.html.twig*

```twig
{% extends "exemples_twig_heritage/master_page_1.html.twig" %}

{% block contenuPrincipal %}
Je voudrais manger de champignons dans le contenu 1 !
{% endblock %}
```

*contenu_2_master_page_1.html.twig*

```twig
{% extends "exemples_twig_heritage/master_page_1.html.twig " %}

{% block contenuPrincipal %}
Je voudrais manger de carottes dans le contenu 2 !
{% endblock %}
```

3.  Créez **les actions** (et les **routes**) qui rendront cette vue et
    lancez chacune dans votre navigateur. Vous observerez que le contenu
    de cette vue sera incrusté dans la page.

```php
#[Route("/exemples/twig/heritage/contenu1/master/page1")]
public function contenu1MasterPage1()
{
    return $this->render('exemples_twig_heritage/contenu_1_master_page_1.html.twig');
}

#[Route("/exemples/twig/heritage/contenu2/master/page1")]
public function contenu2MasterPage1()
{
    return $this->render('exemples_twig_heritage/contenu_2_master_page_1.html.twig');
}
```

**Important** : **extends** doit être **la première balise** d'un template

### Exercices : création de master pages

Codez une nouvelle 'vue' (template) qui hérite de la master page précédente. Cette nouvelle vue reçoit un array contenant les infos d'un livre et les affiche dans la section "contenuPrincipal"

<br>


## 6.7. Héritage de Templates en TWIG (II)

<br>

Nous pouvons simplifier encore la structure de la page si on utilise la
directive **include**, qui nous permet d'inclure le contenu d'autres
fichiers twigs où on le souhaite.

Voici un exemple :

**Exemple** : simplification de la master page en utilisant include pour importer le header et le footer

1.  **Creéz une nouvelle master page master_page_2.html.twig**

```twig
<html>
<head>
<body>
    <header>
        {% include "exemples_twig_heritage/header.html.twig" %}
    </header>
    <main>
        {% block contenuPrincipal %}{% endblock %}
    </main>
    <footer>
        {% include "exemples_twig_heritage/footer.html.twig" %}
    </footer>
</body>
</html>
```

2.  Créez les twigs **header.html.twig** et **footer.html.twig** dans le
    dossier de la master page

**header.html.twig :**
```twig
<h1>Je suis le header</h1>
```
**footer.html.twig**
```twig
<nav>
    <ul>
        <li>Option footer 1</li>
        <li>Option footer 2</li>
    </ul>
</nav>

```

3.  Créez **les actions et les routes**

```php
#[Route("/exemples/twig/heritage/contenu1/master/page2")]
public function contenu1MasterPage2()
{
    return $this->render('exemples_twig_heritage/contenu_1_master_page_2.html.twig');
}

#[Route("/exemples/twig/heritage/contenu2/master/page2")]
public function contenu2MasterPage2()
{
    return $this->render('exemples_twig_heritage/contenu_2_master_page_2.html.twig');
}
```


Notez que les includes ne doivent pas servir uniquement à la création d'une master page. Nous pouvons utiliser cet outil dans n'importe quelle fichier twig. Cela nous permet d'inclure des fragments de la page qui se trouvent dans d'autres fichiers et qui deviennent ainsi partageables par toutes les vues (ex: vues partielles)

### Exercices : création de Master Pages

Créez une master page en utilisant twig. La master page contiendra une barre de navigation contenant trois liens. Chaque lien appelle une action d'un controller

Aidez-vous de cette documentation :

<https://symfony.com/doc/current/templates.html#linking-to-pages>

<br>

## 6.8. Vider un bloc hérité d'un template

<br>

Dans certaines pages il se peut qu'on hérite d'un template qui contienne une section qui ne nous intéresse pas (ex : la barre de navigation du contenu du site dans une page de login, par exemple). La solution à ce problème est simple : on doit déclarer le bloc dans notre page et le laisser vide.

**Exemple** : on hérite un menu d'un template base qu'on ne souhaite pas avoir dans notre template login

Il suffira d'inclure (dans la page qui hérite le template)

```twig
{% block menu %}{% endblock %}
```

Et le block sera vide. Si on ne mentionne pas le block, il sera hérité de la master page et aura son contenu (si, eventuellement, il y a un contenu dans la master page)

<br>

## 6.9. Incruster le rendu d'une autre action du controller dans une vue ('vue partielle')

<br>


Considérez le cas générique d'un site où plusieurs vues qui, en plus de
son propre contenu, contiennent une section (un div, par exemple). Considérez qu'on veut charger dans cette section le contenu d'une BD (ex : latest news, dernières offres, information dernière minute etc...).

**Exemple** : Vue1 et Vue 2 ont une section dynamique commune (le code est dans *ExempleControllerDansVueController.php*, actions *afficheVue1* et *afficheVue2*)

![vue 1](./images/i001.png)
![vue 2](./images/i002.png)


**Le code pour charger le contenu de cette section dans chacune de ces
pages devra alors se répéter dans chaque action du controller, ce qui
casse le principe du DRY.** On pourrait se dire d'utiliser **include**,
mais le problème est que le contenu doit être généré par une action, il
ne suffit pas d'inclure un autre template !

On peut résoudre ce problème assez facilement : on peut **incruster (embed) l'appel d'un controller dans chaque template et créer une seule action**. Cette action (*genererContenuDynamique*) n'a pas de route car elle sera uniquement utilisée depuis les templates.

On aura alors :

-   Une **action pour générer chaque template**

-   Une **action sans route pour générer le contenu de la section commune**

-   Un **appel à cette action dans chaque template** là où on veut réaliser le rendu (**embed** le controller)

L'appel au controller depuis la vue se fait de cette manière :

```twig
<div id='container2'>
{#on incruste l'action du controller ici#}
    {{ render (controller (
        'App\\Controller\\ExempleControllerDansVueEmbedController::sectionNouvellesDynamique',{ 'nombreNouvelles':3 }
        ))
    }}  
</div>
```
Observez que si on utilise la syntaxe "\\", on doit échapper les back slash. On peut aussi envoyer de paramètres à l'action (si besoin).

Vous avez un exemple fonctionnel et commenté dans **ExempleControllerDansVueEmbedController.php** et les templates associés.

### Exercices : incruster une action du controller dans une section de la vue

Créez un nouveau controller.

Créez un site contenant deux pages. Dans les deux pages on doit avoir une section commune qui affiche une blague aléatoire sur Chuck Norris.

Utilisez cette api : https://api.chucknorris.io/

Pour faire appel à une API depuis Symfony, installez le client http :

```php
symfony composer req symfony/http-client
```

Si l'API n'a pas d'authentification, il suffit d'utiliser la syntaxe qui suit.

```php
$client = HttpClient::create();

$response = $client->request ('GET',
'https://api.chucknorris.io/jokes/random');
```

Pour savoir plus sur l'appels aux Apis dans Symfony :

<https://symfony.com/doc/current/components/http_client.html#making-requests>

Regardez aussi la section "Processing réponses". Utilisez **dump** pour vérifier ce que vous obtenez.

<br>


## 6.10. Faire appel à une action depuis la vue

<br>

Vous pouvez créer de liens pour faire appel à une action d'un
controller dans votre template Twig en utilisant la méthode **path**, sans ou avec de paramètres. Cette méthode créera la URL (vous pouvez la visualiser dans le code HTML de la page). Elle utilise le **name** de la route pour générer le chemin. 

Vous avez un exemple pratique dans **Projet1Symfony**, controller **ExemplesParamsTwigToController**, où un
template fait appel à un autre en lui envoyant un paramètre.

Le fonctionnement est simple :

1.  Sans paramètres :

```twig
<a href="{{ path ('action2_recoit_params') }}">lien vers action 2 sans params</a>
```
2.  Avec de paramètres (tel que l'exemple dans le projet) :
```twig
<a href="{{ path ('action2_recoit_params',{nom: 'Luca',ville: 'Rome'}) }}">lien vers action 2 avec params</a>
```

### Exercices: création de liens dans la vue (vers des actions)

Créez un template qui contient une mini-nav avec trois liens href. Chaque lien fera appel à une action du controller.


<br><br>

# 7. Gestion basique d'erreurs dans la réponse du serveur

<br>

Pour gérer proprement les erreurs dans une application Web nous avons plusieurs possibilités :

-   **Modifier la réponse HTTP** du serveur (ex: envoyer une réponse de 404 - Not Found quand on le souhaite, même si la page existe)

-  Créer de vues personnalisées pour les erreurs de base (500, 404 etc...) en utilisant les conventions de Symfony


-   **Lancer une exception** du système ou une personnalisée

<br>

## 7.1. Créer une vue pour chaque erreur à gérer en utilisant les conventions de Symfony

Cette méthode s'applique dans l'environnement de **prod**, car dans l'environnement de **dev** le Symfony Profiler est activé. Changez alors **dev** en **prod** dans le fichier **.env**. Une fois le changement est fait :

1.  Créez cette **structure de dossiers** dans le dossier **templates**


![](./images/i003.png)


1.  Créez **une vue pour chaque erreur à gérer** (.html.twig) suivant la convention **errorXXX.html.twig dans le dossier Exception** (ex: error500.html.twig)

2.  Créez le **contenu personnalisé de la vue** pour chaque erreur que
    vous voulez traiter

<br>

**Exemple** : gestion de l'erreur 500

Voici un exemple de gestion de l'erreur 500. L'action **exempleActionProvoqueErreur** du controller **ExemplesErreursController** provoque une erreur 500 :

```php
#[Route("/exemple/action/provoque/erreur")]
public function exempleActionProvoqueErreur()
{
    // Decommentez la ligne suivante pour provoquer l'erreur:
    // blablabla   
}
```



Créez alors un fichier **erreur500.html.twig** dans le dossier
**Exception** contenant un texte (par exemple : "Erreur interne !"). Relancez l'action pour que le nouveau message d'erreur s'affiche. Si vous obtenez l'erreur original au lieu de la vue que vous avez créé, nettoyez la cache depuis la console et relancez l'action. Pour nettoyer la cache

```console
symfony console cache:clear
```

### Exercices : traitement d'erreurs

Traitez l'erreur 404 en utilisant ce système

<br>

## 7.2. Modifier la réponse http du serveur

<br>

Voici un exemple de comment envoyer un code d'erreur au navigateur en modifiant la réponse HTTP: 


```php
#[Route("/erreurs/erreur/pas/trouve")]
// réponse HTTP modifiée : dans cet exemple, on renvoie au navigateur une réponse "404: NOT FOUND"
// si la variable de session "login" n'existe pas. 
// De-commentez la ligne du "set"
// pour établir sa valeur une première fois,
// puis commentez la ligne, fermez le navigateur et  
// et relancez la page
public function erreurPasTrouveAction(Request $req)
{
    $session = $req->getSession();
    
    // $session->set("login", "Marie");
    $reponse = new Response();
    
    if ($session->get("login") == null) {
        $reponse->setStatusCode(Response::HTTP_NOT_FOUND);
        $reponse->setContent("Page non trouvée!");
        // autre exemple:
        // $reponse->setStatusCode(Response::HTTP_BAD_GATEWAY);
    } else {
        $reponse->setContent("Bienvenu " . $session->get("login"));
    }
    
    return ($reponse);
}

```
<br>

## 7.3. Lancer une exception

<br>

Au lieu de rediriger vers une autre page du site on peut carrément lancer une exception. C'est à nous de voir qu'est-ce que nous convient selon les besoins du projet.


```php
#[Route("/erreurs/erreur/pas/trouve/avec/exception")]
public function errorPasTrouveAvecExceptionAction(Request $req)
{
    $session = $req->getSession();
    // on lance cette ligne une seule fois, puis commentez-la et relancez le navigateur et l'action");
    // $session->set ("login","Lola");
    $reponse = new Response();
    if ($session->get("login")==null) {
        throw $this->createNotFoundException("Non trouvée");
    } 
    else {
        $reponse->setContent("Hello " . $session->get("login"));
    }
    return ($reponse);
}

```

<br>


# 8. Les environnements de développement et production


## 8.1. La base des environnements de travail

Dans un projet Symfony nous pouvons choisir **l'environnement de travail**. Les choix possibles sont **prod, dev** et **test**. Tant Symfony comme les "packages" de tiers contient de fichiers de configuration qui déterminent son comportement selon le mode de travail.

Ces fichiers varient selon le mode de travail qu'on choisit.

Si nous choisissons le mode **dev** (par défaut) Symfony chargera le
module **web_profiler,** qui facilite le debugging de l'application en
affichant plein d'information sur notre application (entre autre les
erreurs de toute sorte : typographie, connexion de bases de données,
pages introuvable...). En mode **prod** le web profiler ne sera pas
chargé car nous ne voulons pas donner au client plus d'informations que
nécessaire (ex : le nom de la base de données).

Nous pouvons aussi avoir de modules (packages) de tiers ou faites par
nous-mêmes dont la configuration change selon nous soyons dans le mode
**dev**, **prod** ou **test** :

<br>

![](./images/i004.png)

<br>
<br>

Observez que nous avons, par exemple, trois fichiers de configuration pour **monolog** (génération de messages de logging dans le serveur).

Les logs seront générés d'une façon différente selon le mode où on se
trouve. Il y a d'autres packages qui sont désactivés dans un mode et
actives dans d'autres.

(La localisation de ces fichiers est définie dans src/kernel.php)

**Vous pouvez changer d'environnement en modifiant le fichier *.env* qui se trouve dans la racine du projet (APP_ENV peut être prod, dev ou test)**

```php
###> symfony/framework-bundle ###
APP_ENV=dev
```

Le **kernel** de Symfony - code qui est en charge de recevoir les requêtes de l'utilisateur et envoyer une réponse au navigateur - agira d'une façon ou l'autre selon la valeur de APP_ENV. **Le kernel chargera tous les services** qui correspondent au mode choisi, ainsi que
leur **configuration** (qui varie entre dev, prod et test).

Dans la page index.php on peut observer la manière dont le kernel est créé.

Dans le fichier **config/bundles.php** vous pouvez voir quels sont les
services disponibles pour chaque mode.

<br>

# 8.2. Les fichiers .env et .env.local


**Attention: https://symfony.com/blog/new-in-symfony-flex-1-2**

<br>

Par défaut Symfony lit le contenu du fichier **.env**. **Ce fichier sera pris en compte par GIT et mis dans le repository si vous faites push**.
Si on veut développer localement (avec les paramètres de BD locaux et tout le reste de la configuration) on a l'option de créer un fichier **.env.local**. Ce fichier peut être un copie modifiée du fichier **.env** où, par exemple, on choisit la valeur **dev** pour **APP_DEV**.

Ce fichier:

-   Est prioritaire sur le fichier **.env** mais ...

-   **est ignoré par GIT** (voir git.ignore dans le projet)

Ce mécanisme nous permet de travailler avec une configuration
particulière en local qui ne sera pas copié dans le serveur de
production (car uniquement **.env** se trouvera dans le serveur).

Vous pouvez utiliser aussi :

```console
composer install --no-dev --optimize-autoloader
```

qui effacera les packages qui ne sont pas nécessaires en production.

Si vous voulez mettre un projet en production, créez un fichier **env.local** avec les paramètres sensibles **dans le serveur de production**. On ne veut pas que notre fichier **.env** contenant le mot de pass de la bd soit posté dans github!

<br>

# 9. Le Web Profiler

Comme nous avons mentionné ci-dessus, le **web profiler est un outil de debugging** de Symfony. Si vous activez le mode **dev** et vous chargez une page, la barre du debugger du **web** **profiler** sera affichée **en bas de la fenêtre du navigateur** :

![](./images/i005.png)

<br>
<br>

Le profiler vous permet d'afficher beaucoup d'information concernant la requête qui a été faite au serveur. 
Pour que le profiler soit visible
on doit envoyer une page complète HTML depuis le controller. Il ne suffit de faire "return Response". 
Le twig devra hériter du template de base ou avoir ses propres balises html et body.

## 9.1. Afficher le contenu des variables avec dump

Vous pouvez afficher le contenu des variables dans les vues et les
controllers grâce à la fonction **dump**.

Exemple :

```
dump ($livre)
```

Cette fonction affiche le contenu complet de la variable d'une façon très complète. Utilisez-la au lieu de **var_dump** à partir de maintenant.

![](/images/i006.png)

La fonction **dd($variable** est encore plus utile car elle combine un **dump** et puis un **die**.

```
dd ($livre)
// affiche le contenu. L'action finira ici
```

<br>
<br>

# 10. Les Services

## 10.1. Concept de Service

<br>

Une **application WEB utilise une énorme quantité d'objets** pour réaliser plein de fonctionnalités : connecter à une BD, envoyer un mail, connecter avec une API à un autre site, écrire/lire de fichiers dans le disque, etc...

Certains parmi ces objets seront définis par nous (en créant de classes), certains se trouvent déjà dans la structure du framework et d'autres seront importés dans le projet.

Très **souvent on veut accéder à un de ces objets (qui réalise une certaine fonctionnalité) depuis de différents lieus dans notre projet**.

On veut, par exemple, connecter à une BD depuis plein d'actions qui ne se trouvent même pas dans le même controller. Cela implique qu'on devrait avoir une sorte de structure de "includes" ou de "autoload"
qui nous permettent de réaliser ces actions  facilement.

Symfony (et plein d'autres frameworks) **fournit un système qui nous permet d'accéder facilement à ces objets qu'on utilise dans plusieurs emplacements de notre projet** : **le** **Service Container**.

En fait, un objet qui sera utilisé de manière générale depuis n'importe quelle localisation dans notre projet portera le nom de **Service**.

Pour cette raison, On va parler du "service mailer", du "service logger", du "service DB" ou du "service maps".

<br>

**Note:**: on travaillera sur le projet Projet1Symfony



<br>

## 10.2. Utilisations des services inclus dans Symfony

<br>


**Symfony** **contient plein de services** **par défaut** même si pour le moment nous ne les avons pas vraiment utilisés (au moins consciemment!). Allez dans la console (dans le dossier de votre projet actuel) pour afficher tous les services actifs ainsi que la description de leur
fonctionnalité :

```console
symfony console debug:autowiring | more
```

(**Note** : la commande **"| more"** de la console permet d'arrêter l'affichage à chaque page.
Ça n'a rien à voir avec Symfony, c'est un vieil outil de la console. Tapez sur enter pour continuer à afficher le reste de services)

Nous pouvons utiliser ces services ainsi que rajouter nos propres
services (nous devons faire le code, bien sûr !)

La documentation sur les services et leur utilisation se trouve ici :

<https://symfony.com/doc/current/service_container.html>

Pour passer à la pratique, utilisons déjà un des services fournis par Symfony. Commençons par utiliser un service qui nous permet de créer de fichiers de **logs.**

**Exemple** : Utilisation du service **Logger** dans un controller

1.  **Créez un controller** *ExemplesServicesController* avec l'assistant

2.  **Rajoutez une action** **utiliseLogger** (ignorez ou effacez l'action index et sa vue)

3.  **Dans le prototype de l'action, rajoutez un paramètre de la classe LoggerInterface** (n'oubliez pas le use). 
Ceci **indique au Service Container** qu'il doit **injecter un objet Logger dans notre action** (rappelez-vous de l'injection de dépendances !!) pour qu'il soit utilisable à l'intérieur

4.  **Utilisez normalement le service.** Il n'y a pas besoin de créer une instance, car on la reçoit en paramètre ! Ici on montre deux exemples de base: info et error

Voici le code final de la classe controller :

```php
class ExemplesServicesController extends AbstractController
{   
    #[Route ("/exemples/services/utilise/logger")]
    public function utiliseLogger(LoggerInterface $monLogger){
        $monLogger->info ("On utilise le logger, c'est super!");
        $monLogger->error ("Hey! une erreur fake s'est produite!");
        return new Response ("J'ai fait mon boulot de logger!");      
    }   
    
    #[Route ("/exemples/services/utilise/session")]
    public function utiliseSession(SessionInterface $maSession){
        // stocker dans la session
        $maSession->set ("panier", ["oranges"=>3,
                                    "pommes"=>2,
                                    "citrons"=>1]);
        // obtenir de la session
        $panier = $maSession->get ("panier");
        
        // si on veut afficher la variable sans charger la vue
        // dump ($panier);
        // die();      
        // rendre la vue et lui envoyer la valeur obtenue de la session
        return $this->render ("exemples_services/utilise_session.html.twig", ['panier' => $panier]);
        
        // plus d'info sur les sessions ici
        // comme service : https://symfony.com/doc/current/controller.html#session-intro
        // comme objet: https://symfony.com/doc/current/components/http_foundation/sessions.html
    }
    
}

```
Pour vérifier que le log a été effectué, ouvrez le fichier
*/var/log/dev.log* de votre projet

On aurait pu rajouter d'autres services si on avait eu besoin dans le prototype de l'action. Il suffit de les séparer par virgules. Cette "magie" est réalisée grâce au système de **autowire** de Symfony, dont la configuration se trouve dans **config/services.yaml**

Si vous avez besoin de réaliser du logging dans votre application, vous avez plus d'info sur le sujet ici :

<https://symfony.com/doc/current/logging.html>

### Exercices : utilisation de Services

Symfony contient un service qui nous permet de gérer la session, **SessionInterface**. Appliquez la même procédure que dans l'exemple précédant pour l'obtenir. Dans votre action, créez une variable de session et affichez sa valeur. Le mécanisme de base de la session est simple : pour créer une variable de session on utilise la méthode **set (clé, valeur)** et pour la lire on utilise la méthode **get (clé)** de l'objet Session


<br>

## 10.3. Création de nos propres services

<br>

Nous avons mentionné **qu'on peut transformer nos propres objets en services**. 
Pour ce faire, on doit juste créer notre classe dans le dossier **/src/Services** (à créer s'il n'existe pas encore) et suivre la même procédure que dans les exemples précédents.

**Exemple** : Nous voulons un service permettant d'obtenir toutes les permutations possibles des éléments d'un array de noms (permutations = combinaisons où l'ordre compte)

1.  **Créez le dossier** **/src/Services** (s'il n'existe pas déjà)
    qui contiendra tous nos services

2.  **Créez le service : la classe qui réalise la fonctionnalité à l'intérieur de ce dossier**

Voici un code possible, où la méthode *permutations* reçoit un array et
renvoie un autre contenant le résultat :

```php
<?php
namespace App\Services;

class Statistiques {
    // calcule toutes les permutations possibles de valeurs d'un array
        function permutations($items, $perms = array( )) {
            if (empty($items)) {
                $return = array($perms);
            }  else {
                $return = array();
                for ($i = count($items) - 1; $i >= 0; --$i) {
                     $newitems = $items;
                     $newperms = $perms;
                 list($foo) = array_splice($newitems, $i, 1);
                     array_unshift($newperms, $foo);
                     $return = array_merge($return, $this->permutations($newitems, $newperms));
                 }
            }
            return $return;
        }
}
```


3.  Créez **une action dans un controller** (ici *ExemplesPropreService*)
    pour utiliser votre service, tel qu'on a fait dans les sections
    précédentes. Symfony le reconnaitra directement !

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Services\Statistiques;


// src/Controller/ExemplesPropreServiceController
class ExemplesPropreServiceController extends AbstractController
{
    #[Route("/exemples/propre/service/utilise/statistiques")]
    public function utiliseStatistiques(Statistiques $mesStats)
    {
        $arrayNoms = ['Lucas', 'Jean', 'Norah'];
        $permutationsNoms = $mesStats->permutations($arrayNoms);
        return $this->render('exemples_propre_service/utilise_statistiques.html.twig', ['permutationsNoms' => $permutationsNoms]);
    }
}
```
### Exercices : création de services

Créez à partir de zéro un service qui dit Bonjour. Le service portera le nom *BonjourSimple*. Créez une action pour montrer son fonctionnement


<br>

## 10.4. Injecter les services dans le controller

<br>

Nous pouvons injecter de services directement dans le controller en
utilisant son constructeur. Voici un exemple équivalent au code
précédant.

**Exemple** : injection d'un service dans le constructeur

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Services\Statistiques;

// src/Controller/ExemplesPropreServiceInjectionController.php
class ExemplesPropreServiceInjectionController extends AbstractController
{
                
        // on injecte le service diréctement dans le constructeur du controller
        public function __construct (private Statistiques $mesStats){
            $this->mesStats = $mesStats;
        }

        #[Route ("/exemples/propre/service/injection/utilise/statistiques")]        
        public function utiliseStatistiques (){
            
            $arrayNoms = ['Lisa','Jean','Norah'];
            $permutationsNoms = $this->mesStats->permutations($arrayNoms);
            return $this->render ('exemples_propre_service_injection/utilise_statistiques.html.twig', ['permutationsNoms'=> $permutationsNoms]);
        }
}
```

Cette méthode devient indispensable quand **on veut utiliser un service
dans un autre service, car la seule méthode où on pourra l'injecter
sera dans le constructeur !** On montre un exemple ci-dessous de ce cas
de figure. 

<br>

## 10.5. Injection de paramètres dans le service (I)

<br>

Nous pouvons rajouter de paramètres aux services en utilisant *services.yaml*. Dans ce fichier on configure la manière dont les
services deviendront accessibles dans nos controllers.

**Exemple** : un service Bonjour qui affiche "bonjour à tous" dans la langue parametrée dans services.yaml

D'abord on doit créer le service. Si on veut que le service soit paramétré **on rajoute un paramètre dans le constructeur et on le stocke dans une propriété** (on peut avoir autant de paramètres qu'on veut) :


```php
<?php

namespace App\Services;

class Bonjour
{
    public function __construct(private string $langue)
    {
        $this->langue = $langue;
    }
    // service contenant un paramètre
    public function obtenirMessage()
    {
        // array fake... juste pour essayer le service
        $messages = [
            'fr' => 'Bonjour à tous!!',
            'en' => 'Hello everybody!!'
        ];
        // on obtient le paramètre du propre service
        $langue = $this->langue;
        return ($messages[$langue]);
    }
}
```


On doit définir le parametre dans **config/services.yaml** :

```php
    # add more service definitions when explicit configuration is needed
    # please note that last definitions always *replace* previous ones
    App\Services\Bonjour:
        arguments:
            $langue: 'fr'
```

Finalement on peut utiliser le service dans un controller. Ici on a injecté le service dans le controller en suivant la méthode de la section précédente :

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Services\Bonjour;

// src/Controller/ExemplesServicesParamsController.php
class ExemplesServicesParamsController extends AbstractController
{   
    
    // on utilise la méthode d'injection du service dans le controller
    public function __construct (private Bonjour $bonjour){
        $this->bonjour = $bonjour;       
    }
    
    #[Route ("/exemples/propre/service/params")]
    public function utiliseBonjour(){
        return new Response ($this->bonjour->obtenirMessage());
        
    }
}
```

Si on veut qu'un paramètre soit utilisé par tous les services on a qu'a le rajouter à la section ***parameters*** qui se trouve tout en haut du fichier *services.yaml*

<br>


## 10.6. Utiliser un service dans un autre service

Si nous voulons utiliser un service dans un autre service on peut uniquement les injecter dans le constructeur (on ne peut pas injecter l'objet Logger dans une autre méthode, tel que "permutations"). **Si on veut utiliser un service dans un autre on est obligé de les injecter dans le constructeur. Ce n'est pas possible de les injecter dans une autre méthode. ** C'est uniquement dans le controller où on peut injecter les services dans n'importe quelle méthode.

**Exemple :** utiliser Logger dans le service Statistiques

```php
<?php
// src/Services/StatistiquesLog.php
namespace App\Services;

use Psr\Log\LoggerInterface;

class StatistiquesLog {
   
    
    function __construct (private LoggerInterface $logger){
        $this->logger = $logger;
    }
        
    function permutations($items, $perms = array( )) {
        if (empty($items)) {
            $res = array($perms);
        }  else {
            $res = array();
            for ($i = count($items) - 1; $i >= 0; --$i) {
                 $newitems = $items;
                 $newperms = $perms;
             list($foo) = array_splice($newitems, $i, 1);
                 array_unshift($newperms, $foo);
                 $res = array_merge($res, $this->permutations($newitems, $newperms));
             }
        }
        // on utilise le service de log
        $this->logger->info ("De permutations ont été calculées");
        return $res;
    }
}
```
Controller:

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Services\StatistiquesLog;


// src/Controller/ExemplesServiceUtiliseService.php
class ExemplesServiceUtiliseService extends AbstractController
{
    private $mesStats;
    // Le service StatistiquesLog utilise Logger
    public function __construct(StatistiquesLog $mesStats)
    {
        $this->mesStats = $mesStats;
    }

    #[Route("/exemples/propre/service/utilise/service")]
    public function utiliseStatistiques()
    {
        $arrayNoms = ['Lucas', 'Jean', 'Norah'];
        // calculera les permutations et créera une ligne de log
        $permutationsNoms = $this->mesStats->permutations($arrayNoms);

        return $this->render('exemples_service_utilise_service/utilise_statistiques.html.twig', ['permutationsNoms' => $permutationsNoms]);
    }
}
```

<br>


## 10.7. Accéder au modèle dans un Service

<br>

C'est exactement la même chose que la section précédente, mais vu que c'est une opération fréquente, on met un exemple ici.
Le service à injecter est **EntityManagerInterface**... et voilà!

```php
namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;

class EnumsJsonService {
    public function __construct (EntityManagerInterface $em){  
        $this->em = $em;
        .
        .
        .
        .
    }



```

<br>


## 10.8. Injection de paramètres dans le service (II)

<br>

Dans certains cas **nous utilisons un service dans un autre et le premier doit être paramétré**.

**Exemple :** rajouter l'envoi d'un mail dans notre service de Statistiques

Le service StatistiquesLogMail envoie un mail en plus de créer une ligne
de log quand on fait appel à la fonction de permutations.

Installez d'abord le module Mailer (service de mail qu'on configura plus tard). Si vous voulez apprendre à envoyer un mail d'une façon simple, allez dans la section [23. Mail](#23-mail) :

```console
symfony composer req symfony/mailer
```

Dans ce cas, le service a besoin d'un ou plusieurs paramètres pour être configuré (ici on va considérer le paramètre **$adresse** le destinataire du mail qui sera, par défaut, "yoyo@touloulou.com")

Voici notre service, qui inclut maintenant l'envoi d'un mail. On a dû injecter le Mailer dans le constructeur et on a décidé d'envoyer l'adresse mail en paramètre.

```php
<?php

// src/Services/StatistiquesLogMail.php
namespace App\Services;

use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class StatistiquesLogMail {
   
    function __construct (private LoggerInterface $logger, private MailerInterface $mailer, private $adresse){
        $this->logger = $logger;
        $this->mailer = $mailer;
        $this->adresse = $adresse;
    }
        
    function permutations($items, $perms = array( )) {
        if (empty($items)) {
            $res = array($perms);
        }  else {
            $res = array();
            for ($i = count($items) - 1; $i >= 0; --$i) {
                 $newitems = $items;
                 $newperms = $perms;
             list($foo) = array_splice($newitems, $i, 1);
                 array_unshift($newperms, $foo);
                 $res = array_merge($res, $this->permutations($newitems, $newperms));
             }
        }
        // on utilise le service de log
        $this->logger->info ("De permutations ont été calculées");
        // on envoie un mail
        $message = (new Email())
                ->from($this->adresse)
                ->to ("autre@gmail.com")
                ->subject('Le sujet')
                ->text('blablabla')
                ->html('<p>Aussi du HTML!</p>');
        // on doit envoyer ici le mail après avoir configuré le service

        // https://symfony.com/doc/current/email.html#configuration
        // dump ($message);
        // die();
        return $res;
    }
}

```

mais **cette solution ne suffit pas**. Inclure le paramètre parmi les
paramètres du constructeur provoque cette erreur :

<br>

![](./images/i007.png)

<br>

**C'est tout à fait logique, car quand on fait appel à notre service depuis le controller on n'indique pas ce paramètre extras.**

**Le service principal est juste injecté dans le constructeur sans paramètres** :

<br>

```php
<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Services\StatistiquesLogMail;
use App\Services\BonjourService;

// /src/controller/ExemplesPropreServiceInjectionParamsController.php
class ExemplesPropreServiceInjectionParamsController extends AbstractController
{
        // on injecte le service diréctement dans le constructeur du controller
        // sans paramètres!
        public function __construct (private StatistiquesLogMail $mesStats){
            $this->mesStats = $mesStats;
        }
        #[Route ("/exemples/propre/service/injection/utilise/statistiques/log/mail")]
        public function utiliseStatistiquesLogMail (){
            $arrayNoms = ['Lucas','Jean','Norah'];
            $permutationsNoms = $this->mesStats->permutations($arrayNoms);
            return $this->render ('exemples_propre_service_injection_params/utilise_statistiques_log_mail.html.twig', ['permutationsNoms'=> $permutationsNoms]);
        }
}
```


**Comment fixer alors l'adresse du mail si on ne peut pas l'envoyer en paramètre au service lors sa création ?**

Nous allons configurer de paramètres particulières de nos services dans
le fichier **services.yaml** :

```php
# add more service definitions when explicit configuration is needed
# please note that last definitions always *replace* previous ones
    App\Services\StatistiquesLogMail:
       arguments: 
           string $adresse: "yoyo@gmail.com"
```
**Le paramètre doit porter le même nom que celui qu'on a rajouté dans le constructeur, autrement on obtient une erreur.**

Si on voulait **changer l'adresse** on peut toujours créer de méthodes pour ce faire dans notre service, **rien nous empêche de créer une méthode pour ce faire dans notre service**. On vient d'arranger le problème d'avoir la valeur lors la création du service. En plus, le code reste plus propre car les paramètres de tous nos services seront centralisés dans **services.yaml**


<br><br>


## 10.9. Cas pratique: création d'un service pour uploader des fichiers

https://symfony.com/blog/new-in-symfony-6-2-improved-file-validator

Dans cette section on va créer un service capable de réaliser l'upload d'un fichier. 

Vous avez besoin de comprendre d'abord le mécanisme d'upload de fichiers. Allez dans la section correspondante du syllabus (voir index)

Pourquoi créer un service pour l'upload? Car le code pour faire un upload est long, et on ne veut pas le répéter dans chaque action de l'application qui a besoin de faire upload (ex: les actions de créer un utilisateur et de le mettre à jour son profile ont toutes les deux besoin de cette fonctionnalité)

Voici la procédure:

Ouvrez le projet ProjetFormulairesSymfony et le controller ExemplesFormulaireUploadController. Dans l'action **upload** du controller on a tout ce dont on a besoin.

Nous allons créer un Service qui contiendra basiquement le même code.

Le service doit: 
- recevoir l'objet UploadFile pour le stocker dans le serveur. 
- renvoyer le nom (string) crée pour le fichier (celui qui apparaitra dans la BD)

```php
<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadHelper
{
    public function __construct (private string $dossierUpload){
        $this->dossierUpload = $dossierUpload;
    }

    public function uploadImagePays(UploadedFile $fichier): string
    {

        // obtenir un nom de fichier unique pour éviter les doublons dans le dossierUpload
        $nomFichierServeur = md5(uniqid()) . "." . $fichier->guessExtension();
        // stocker le fichier dans le serveur (on peut préciser encore plus le dossier)
        $fichier->move($this->dossierUpload . "/pays", $nomFichierServeur);
        return $nomFichierServeur;
    }
}
```

Voici l'action du controller qui fait appel au service:

```php
#[Route("/exemples/formulaire/upload/avec/service/exemple")]
public function uploadAvecService (Request $request, ManagerRegistry $doctrine, UploadHelper $uploader)
{

    // créer une nouvelle entité vide
    $pays = new Pays();
    // créer un formulaire associé à cette entité
    $formulairePays = $this->createForm(PaysType::class, $pays);
    // gérer la requête (et hydrater l'entité)
    $formulairePays->handleRequest($request);
    // vérifier que le formulaire a été envoyé (isSubmitted) et que les données sont valides
    if ($formulairePays->isSubmitted() && $formulairePays->isValid()) {
        // obtenir le fichier à la main
        $fichier = $formulairePays['image']->getData();

        if ($fichier) {
            $nomFichierServeur = $uploader->uploadImagePays($fichier);
            $pays->setImage($nomFichierServeur);
        }
        // stocker l'objet dans la BD, ou faire update
        $em = $doctrine->getManager();
        $em->persist($pays);
        $em->flush();
        return new Response("Entité mise à jour dans la BD. Si le fichier a été selectionné, upload ok!");
    } else {
        return $this->render(
            "/exemples_formulaires_upload/affichage.html.twig",
            ['formulaire' => $formulairePays]
        );
    }
}
```
Le code est plus propre car la logique de l'upload est séparée dans un Service. Ce n'est pas seulement une question de s'épargner des lignes de code, mais de clarté.

On peut recycler pratiquement tout notre code pour créer une action d'edit pour l'entité Pays:

```php
#[Route("/exemples/formulaire/upload/avec/service/{id}/edit")]
public function uploadAvecServiceEdit (Pays $pays, Request $request, ManagerRegistry $doctrine, UploadHelper $uploader)
{
    // créer une nouvelle entité vide... pas besoin! on reçcoit l'entité à modifier
    // $pays = new Pays();

    // EntityValueResolver prend l'id de la route et obtient le Pays de la BD. On peut faire appel à cette action depuis un lien "update", par exemple
    // http://localhost:8000/exemples/formulaire/upload/avec/service/7/edit ("7" est l'id de l'entité dans la BD) 

    // créer un formulaire associé à cette entité
    $formulairePays = $this->createForm(PaysType::class, $pays);
    // gérer la requête (et hydrater l'entité)
    $formulairePays->handleRequest($request);
    // vérifier que le formulaire a été envoyé (isSubmitted) et que les données sont valides
    if ($formulairePays->isSubmitted() && $formulairePays->isValid()) {
        // obtenir le fichier à la main
        $fichier = $formulairePays['image']->getData();


        if ($fichier) {
            $nomFichierServeur = $uploader->uploadImagePays($fichier);
            $pays->setImage($nomFichierServeur);
        }
        // stocker l'objet dans la BD, ou faire update
        $em = $doctrine->getManager();
        // $em->persist($pays);  // pas besoin
        $em->flush();
        return new Response("Entité mise à jour dans la BD. Si le fichier a été selectionné, upload ok!");
    } else {
        return $this->render(
            "/exemples_formulaires_upload/affichage.html.twig",
            ['formulaire' => $formulairePays]
        );
    }
}
```

On aurait pu même fusioner les deux actions.

<br>


# 11. Le Modèle

<br>

Dans une application web, les classes qui contiennent les données de l'application s'appellent **entités** (les classes de notre diagramme de classes) et on doit les définir.

Normalement une entité serait définie à la main dans un fichier contenant une classe (ex: entité Personne -> classe Personne). On doit créer, en plus, une classe Repository pour gérer la persistance de l'entité dans la BD. Ça implique qu'on doit créer deux fichiers pour chaque classe du diagramme... un grand boulot ! Mais on peut se simplifier énormément la vie en utilisant un ORM...

<br>

## 11.1. Présentation de Doctrine

<br>

Pour créer le modèle de notre application web on va utiliser un ensemble de librairies de PHP qui portent le nom de  **Doctrine**. Doctrine est constitué d'un **ORM** (Objet Relational Mapping) et d'un **DBAL** (Database Abstraction Layer).

Le **DBAL** est un ensemble de librairies basées sur PDO qui facilite l'accès à la BD, tant à sa structure comme aux données.

**Doctrine** permet de créer une **correspondance entre les classes** de notre application (*domaine des objets*) et **les tableaux d'une BD** (*domaine de la BD*)

On peut créer les entités facilement avec un assistant et puis lancer la création automatique de la BD.

**Exemple**: nous avons une classe *Evenement* dans notre diagramme. On utilisera l'assistant de Doctrine (console) pour créer l'entité *Evenement*. Doctrine crée :

1. le code de l'entité 
2. le repository
3. le tableau de la BD où on stockera les données de cette entité. 
 
**En gros, un "objet" du domaine des objets sera stocké comme une ligne dans le tableau.**

La classe *Evenement* sera représentée dans la BD avec un tableau *evenement*. On pourra utiliser une méthode *select()*  (repo) qui nous renverra chaque ligne du tableau *evenements* sous la forme d'un objet *Evenement* (une *entité*) et pas sous la forme d'un array. 

On ne doit plus faire de requêtes à la main "SELECT * FROM ...." dans les requêtes les plus habituelles **CRUD** de base).

Pour le reste de requêtes (GROUP BY, JOIN, etc...) on créera des méthodes dans la classe Repository de l'entité.

**Documentation de Doctrine :
<https://symfony.com/doc/current/doctrine.html>**


Une fois crée le code des entités et le schéma de la BD, nous pouvons accéder à la BD depuis (en géneral depuis le controller) en utilisant un objet gestionnaire de Doctrine (**entity manager**). 

Comme nous l'avons déjà dit, Doctrine fournit les méthodes pour pouvoir **obtenir les données de la BD sous forme d'objets** (au lieu d'arrays associatifs) et **stocker des objets dans la BD** (qui seront stockés sous la forme d'un enregistrement, une ligne dans un tableau). La conversion est automatique.

<br>

## 11.2. Installation de Doctrine dans un projet

<br>

Nous allons créer un nouveau projet pour apprendre à utiliser Doctrine et les modèles en général:

``` console
symfony new --webapp ProjetModelSymfony
```

Créez un controller **ExemplesModele** vous-mêmes et une action de bienvenue. 

Documentation de Doctrine liée à Symfony :

<https://symfony.com/doc/current/doctrine.html>

<http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/working-with-objects.html>

<br>

## 11.3. Installation de Doctrine. Création de la BD

<br>

1.  **Rajoutez** les librairies de **Doctrine** à votre projet

```console
symfony composer req symfony/orm-pack
symfony composer req symfony/maker-bundle --dev
```
(Le maker bundle sert à générer du code)

2.  **Adaptez les paramètres de la BD** dans **le fichier .env** (racine du projet) à votre serveur et nom de base de données

```console
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
```
Notre base de données portera le nom **bibliotheque**, alors on obtient. Par défaut, l'installation de XAMPP utilise **root** comme user et aucun password. La chaîne de connexion sera alors :


```console
DATABASE_URL=mysql://root:@127.0.0.1:3306/bibliotheque
```

3. Allumez le serveur de BD (MySQL dans notre cas) et **créez la BD**


```console
symfony console doctrine:database:create
```
Vous pouvez vérifier en utilisant **phpmyadmin** ou **mysql en console** que la BD a été créé proprement.

Si vous engagez les services d'un hébergeur vous devez configurer la BD selon ces paramètres.


<br>

## 11.4. Création des entités et mise à jour de la BD

<br>

La BD est créée. On doit implémenter maintenant le diagramme de classes : les Entities.

Nous allons créer une Entity pour chaque classe dans le diagramme de classes, et puis créer les relations (associations ou héritage toujours) entre elles.

**Note**: Dans certains cas il peut y avoir de classes qui restent uniquement dans le domaine des objets : on ne crée pas un tableau dans la BD car on n'a pas besoin de stocker ses données dans la BD.

On va créer une première entité et générer son code.

1.  **Lancez l'assistant de création d'entités :**

```console
symfony console make:entity
```
L'assistant nous demandera le **nom de l'entité** (*Livre*) et **ses propriétés** (*titre, prix, description, datePublication*). D'abord il demande pour le nom de la propriété et puis pour le type. Les types de base (affichables en tapant "?") sont *string (255), decimal (8,2), text, datetime.* Pour certains types il nous demande aussi la taille. Nos propriétés seront nullables pour nous faciliter les manipulations dans les exemples.

L'assistant créera les fichiers **/Entity/Livre.php** (la classe entité!) et **/Repository/LivreRepository.php** (dévinez :D). **Si vous ratez la création de l'entité** sortez de l'assistant (CTRL-C), effacez les fichiers
**/Entity/Livre.php** et **/Repository/LivreRepository.php** et recommencez.


**Note:** On apprendra à éditer les entités dans la section 11.4 pour éviter de devoir recommencer à chaque fois qu'on se trompe, mais pour le moment recommencer est la meilleure option


Ouvrez le fichier Livre.php et observez qu'il s'agit d'une classe normale qui représente un livre et qui **contient des annotations qui décrivent certains de caractéristiques des champs**. **Ces annotations seront utilisées par Doctrine pour générer automatiquement la base de données selon les types de notre choix**. Pour plus d'information sur les types de doctrine, allez sur :

<http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/types.html>

L'assistant est juste un outil pour nous faciliter la tâche mais vous pouvez très bien créer/éditer les fichiers par vous-mêmes (rajouter/effacer des champs)

<br>

2.  **Réalisez la migration de la BD** (pour faire correspondre les entités avec la BD)

La BD est actuellement vide. Nous voulons que Doctrine crée un tableau **livre** à partir de notre entité **Livre**. 

De manière plus générale, **nous voulons que Doctrine mette à jour la BD pour qu'elle reflète les changements dans nos entités** **(nom des entités, types des champs, relations, etc...). Ces mises à jours, assez habituelles dans un projet, s'appellent migrations.**. Les migrations incluent souvent de données, pas uniquement la structure de la BD.

Nous allons réaliser cette procédure en deux étapes très simples :

- **Créer ou mettre à jour un historique de migrations** (tableau dans
    la BD) et un fichier qui contient le code pour mettre à jour la BD
    (dans src/Migrations)

```console
symfony console make:migration
```

  -  **Mettre à jour la BD en lançant ce code** (ceci créera déjà notre
    tableau "Livre")

```console
symfony console doctrine:migration:migrate
```
**Note :** Si vous le souhaitez, vous pouvez aussi créez les entités par
vous-mêmes à la main, ou utiliser d'autres systèmes de notations au
lieu des annotations tel que XML

<https://www.doctrine-project.org/projects/doctrine-orm/en/latest/reference/basic-mapping.html>

<br>

## 11.5. Rajouter/effacer des propriétés d'une entité

<br>

Nous pouvons modifier nos entités facilement. Nous pouvons éditer le fichier à notre aise ou lancer à nouveau make:entity si on veut juste rajouter de nouvelles propriétés. Si on édite le fichier de l'entité (ici Livre.php) **à la main, on doit absolument créer les getters, setters et annotations pour les nouvelles propriétés**.

Cette commande créera les getters et les setters pour nous:

```console
symfony console make:entity ---regenerate
```

Indiquez à Symfony le nom de l'entité avec son namespace: (ex : **App\Entity\Livre)**


**Cette action crée aussi les classes Repository si elles n'existent pas**
(appuyez sur Enter quand on vous demande un namespace et Symfony créera
tous les Repository )

Dans tous les cas vous devez toujours **migrer la BD** en lançant les
deux commandes déjà mentionnées :

```console
symfony console make:migration
```

```console
symfony console doctrine:migrations:migrate
```

**Si on efface une propriété il ne faut pas oublier d'effacer aussi ses
get et set, Symfony ne le fera pas automatiquement**

On peut utiliser aussi la commande :

```console
symfony console make:entity --overwrite
```
si on veut recréer tous les getters et les setters pour toutes les
propriétés!

<br>

### Exercices : création et manipulation des entités

1)  Créez une nouvelle propriété *isbn* (string - 30) et migrez la BD

2)  Créez une nouvelle propriété *dateEdition* (date) et migrez la BD.
    Supprimez-le et assurez-vous que la BD est toujours cohérente avec votre code

3)  Créez l'entité Client (nom, prenom, email) et Exemplaire (etat - string(10))

4)  Créez l'entité Auteur (nom, nationalite)

<br>

## 11.6. Le modèle : les relations 

<br>

Nous sommes capables maintenant de générer les tableaux qui
correspondent à nos entités. Cette section est consacrée à
l'implémentation des relations d'un schéma.

Vous trouverez les exemples décrits ci-dessous dans les projets
**ProjetModelSymfony** et **ProjetRelationsSymfony** (regardez le code
des entités !)

Documentation:
<https://symfony.com/doc/current/doctrine/associations.html>

<br>

### 11.6.1. Relation Many-To-One (= One-To-Many)

<br>

Considérons ce schéma Merise (MCD - base de données relationnelles) :

<br>

![](./images/many-to-one%20Merise.png)

<br>

Qui équivaut à ce schéma UML (POO) :

<br>

![](./images/many-to-one%20UML.png)


<br>

La transformation de ce modèle nous donne, si on la réalise à la main :

-   **Un tableau Livre dans la BD** qui ne change pas + un tableau
    Exemplaire qui contient une colonne id (qu'on va appeler
    *livre_id* pour faciliter la lecture)

-   **Dans le code** : 
    -   Une classe Livre contenant **un array** d'Exemplaires 
    -   Une classe Exemplaire qui contient un objet Livre
  
        (toujours en considérant que l'association est bidirectionnelle)

**Nous pouvons créer le code et modifier la BD à la main mais Doctrine va le faire pour nous**. 

**Exemple :**

Implémenter la partie correspondante aux associations dans le code des entités et créer les relations dans la BD

**Procédure :**

1.  **Rajoutez une propriété Many-to-One dans l'entité correspondante en utilisant l'assistant** (ici c'est l'entité *Exemplaire*)

```console
symfony console make:entity Exemplaire
```

La propriété portera le nom **livre** est du type **relation**, **ManyToOne.**
Dans ce cas, la propriété s'appellera **livre** et sera un objet de la classe Livre. 

On souhaite en plus rajouter une propriété et de méthodes dans Livre pour pouvoir obtenir les Exemplaires. On doit créer une association **bidirectionnelle** (pas seulement pouvoir obtenir le Livre qui correspond à un exemplaire mais aussi tous les exemplaires d'un livre !). 

On crée alors une propriété **exemplaires** et sera une collection qui contient tous les exemplaires d'un livre.
<br>

```console
C:\xampp\htdocs\Int3-WAD-Symfony6.3\ProjetModelSymfony>symfony console make:entity Exemplaire  

 Your entity already exists! So let's add some new fields!

 New property name (press <return> to stop adding fields):
 > livre

 Field type (enter ? to see all types) [string]:
 > relation

 What class should this entity be related to?:
 > Livre

What type of relationship is this?
 ------------ ----------------------------------------------------------------------- 
  Type         Description
 ------------ -----------------------------------------------------------------------
  ManyToOne    Each Exemplaire relates to (has) one Livre.
               Each Livre can relate to (can have) many Exemplaire objects

  OneToMany    Each Exemplaire can relate to (can have) many Livre objects.
               Each Livre relates to (has) one Exemplaire

  ManyToMany   Each Exemplaire can relate to (can have) many Livre objects.
               Each Livre can also relate to (can also have) many Exemplaire objects  

  OneToOne     Each Exemplaire relates to (has) exactly one Livre.
               Each Livre also relates to (has) exactly one Exemplaire.
 ------------ ----------------------------------------------------------------------- 

 Relation type? [ManyToOne, OneToMany, ManyToMany, OneToOne]:
 > ManyToOne

 Is the Exemplaire.livre property allowed to be null (nullable)? (yes/no) [yes]:
 > no

 Do you want to add a new property to Livre so that you can access/update Exemplaire objects from it - e.g. $livre->getExemplaires()? (yes/no) [yes]:
 > 

 A new property will also be added to the Livre class so that you can access the related Exemplaire objects from it.

 New field name inside Livre [exemplaires]:
 >

 Do you want to activate orphanRemoval on your relationship?
 A Exemplaire is "orphaned" when it is removed from its related Livre.
 e.g. $livre->removeExemplaire($exemplaire)

 NOTE: If a Exemplaire may *change* from one Livre to another, answer "no".

 Do you want to automatically delete orphaned App\Entity\Exemplaire objects (orphanRemoval)? (yes/no) [no]:
 > yes

 updated: src/Entity/Exemplaire.php
 updated: src/Entity/Livre.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 >



  Success!


 Next: When you're ready, create a migration with symfony console make:migration
```
C'est fait ! Nos entités sont mises à jour (explication dans la section suivante)

**Migrez** la BD pour que les relations soient créées dans la BD

```console
symfony console make:migration
```
```console
symfony console doctrine:migrations:migrate
```

**Vérifiez** que la BD a été mise à jour

Observez les changements dans le/les tableaux !

<br>

### 11.6.2. Explication du code généré par l'assistant

<br>

Les opérations réalisées ont généré ce code dans les entités
*Exemplaire* et *Livre*. Dans **Exemplaire.php** :

```php
.
.
.
    #[ORM\ManyToOne(targetEntity: Livre::class, inversedBy: 'exemplaires')]
    #[ORM\JoinColumn(nullable: false)]
    private $livre;

.
.
.
    public function getLivre(): ?Livre
    {
        return $this->livre;
    }

    public function setLivre(?Livre $livre): self
    {
        $this->livre = $livre;

        return $this;
    }

```


<br>

**Note importante** : ce code est la seule chose qui change dans la classe originale. Si vous **avez fait des erreurs** pendant la création des associations avec l'assistant, vous devez **effacer ces lignes et recommencez la création** des associations (pas créer les entités depuis zéro !)

**On a créé une association bidirectionnelle de Many-to-One.** Observez que dans Livre il y aura une collection d'exemplaires et que dans Exemplaire aura un objet Livre. **Doctrine a généré** :

-   Les **annotations** (**>PHP8**) pour indiquer le type d'association entre les deux classes (on utilise *inversedBy* du côté *plusieurs* et *mappedBy* du coté *un*)

-   Les **méthodes** get et set pour accéder aux objets des deux côtés de l'association. Dans le cas de la collection, de méthodes pour rajouter un élément à la collection et pour l'effacer de la collection.

    Notez que Doctrine efface la "s" quand il crée les méthodes !
    Notre propriété s'appelle **exemplaires** mais les méthodes crées
    s'appellent par exemple removeExemplaire au lieu de
    removeExemplaires !

Observez aussi que **les méthodes spécifient les types de retour**.
**Collection** est une interface de PHP qui assure que les objets qui
l'implémentent soient Countables, Transversables et qu'on puisse les
encoder en JSON avec json_encode (bien que de fois la seule solution est de **serialiser** les objets et les arrays avec les composants fournis par Symfony - voir chapitre )

**self** est une manière d'accéder au nom de la classe (ça aurait pu
être remplacé par le nom de la classe dans chaque cas où il apparait
dans le code)

**Le code est généré, ainsi que les tableaux et les relations**

Dans la base de données il y aura une colonne *livre_id* dans
Exemplaire. Le tableau Livre par contre ne changera pas car on ne peut
pas mettre une collection d'exemplaires dans une BD relationnelle ! ;)

<br>

### Exercices : création d'entités et de relations

1)  On va considérer qu'un Client de la bibliothèque a une Adresse (rue, numero, codePostal, ville) et qu'une adresse peut correspondre à plusieurs clients (ex: co-habitants dans un appartement) 

Créez la classe Client pour représenter les clients et la classe Adresse pour représenter l'adresse de chaque client. Implémentez-la en utilisant Doctrine tel qu'on vient de faire

2)  Implementez ce diagramme si vous êtes brave!

![](./images/diagramme-relations1.png)

3 Prennez des exemples du cours d'UML et implémentez les entités avec Doctrine dans un nouveau projet. Si vous êtes en train de planifier un projet pour vous, prenez plusieurs entités de votre schéma et implémentez-les avec Doctrine. Implémentez les associations aussi

<br>

### 11.6.3. Relation Many-To-Many

<br>


Considérons ce schéma Merise (MCD - base de données relationnelles) :

![](./images/many-to-many%20Merise.png)

Qui équivaut à ce schéma UML (POO) :

![](./images/many-to-many%20UML.png)

Nous sommes dans une association de plusieurs à plusieurs qui contient des attributs d'association. Symfony a son propre mécanisme pour
implémenter ces associations (<many-to-many>), toutefois on n'utilisera pas ce mécanisme **parce qu'il ne permet pas d'inclure d'attributs dans l'association !**

Mais la solution est simple : on peut transformer l'association dans
deux associations du type one-to-many :

![](/images/many-to-many-transform.png)

### Exercices : création d'une relation de plusieurs à plusieurs

Implémentez vous-même ce modèle dans **ProjetModelSymfony** pour avoir la relation entre les Clients et les Exemplaires !

Si vous êtes toujours intéressé à implémenter une association de plusieurs à plusieurs **sans attributs**, suivez les exemples de la documentation de Doctrine :

<https://www.doctrine-project.org/projects/doctrine-orm/en/latest/reference/association-mapping.html#many-to-many-bidirectional>

Voici un exemple :

Considérons qu'on a juste besoin de connaitre qui sont les clients qui ont emprunté un exemplaire et vice-versa (pas de dates d'emprunt ni rien d'autre). Nous avons ce schéma :

![](./images/clients-exemplaires.png)

**Important :**

Pour implementer cette rélation Many-To-Many sans attributs nous allons créer un **nouveau projet**  qui contiendra uniquement certains exemples des relations moins habituelles que le *One-To-Many (= Many-toOne)*.

**L'utilisation de ce projet pour un exemple/exercice sera toujours indiquée à l'avance**

Créez maintenant le projet **ProjetRelationsSymfony**, configurez la connexion vers une autre BD (ex: '**relations**'), rajoutez Doctrine lancez la création de la BD:

```console
symfony new --webapp ProjetRelationsSymfony

(puis créez le workspace)

(changez le fichier .env)
DATABASE_URL=mysql://root:@127.0.0.1:3306/relations

symfony console doctrine:database:create
``` 

1)  Créez les entités *Client*,*Exemplaire* et *Livre* **dans ProjetRelationsSymfony** à partir de zéro

Note: au lieu de partir de zéro vous auriez pu  aussi copier les entités du dossier Entity de **ProjetModelSymfony** (Client.php, Exemplaire.php, Livre.php) dans **ProjetRelationsSymfony**. Mais attention : 
- Il nous manquera les repositories que vous pouvez créer automatiquement avec **symfony console make:entity --regenerate**. 
- Comme nous allons faire une relation différente entre **Client** et **Exemplaire** (ManyToMany au lieu de OneToMany) nous devons supprimer les annotations concernant cette relation (directement dans le code) 
- Vous devez effacer les **sets** et **gets** concernés par la rélation - setExemplaires, getExemplaires.
   








2.  Créez une propriété du type *relation* et choisissez **Many-to-many**

```console
C:\xampp\htdocs\Int3-WAD-Symfony6.3\ProjetRelationsSymfony>symfony console make:entity

 Class name of the entity to create or update (e.g. VictoriousPizza):
 > Client

 Your entity already exists! So let's add some new fields!

 New property name (press <return> to stop adding fields):
 > emprunts

 Field type (enter ? to see all types) [string]:
 > relation

 What class should this entity be related to?:
 > Exemplaire

What type of relationship is this?
 ------------ ------------------------------------------------------------------------ 
  Type         Description                                                             
 ------------ ------------------------------------------------------------------------ 
  ManyToOne    Each Client relates to (has) one Exemplaire.
               Each Exemplaire can relate to (can have) many Client objects

  OneToMany    Each Client can relate to (can have) many Exemplaire objects.
               Each Exemplaire relates to (has) one Client

  ManyToMany   Each Client can relate to (can have) many Exemplaire objects.
               Each Exemplaire can also relate to (can also have) many Client objects  

  OneToOne     Each Client relates to (has) exactly one Exemplaire.
               Each Exemplaire also relates to (has) exactly one Client.
 ------------ ------------------------------------------------------------------------

 Relation type? [ManyToOne, OneToMany, ManyToMany, OneToOne]:
 > ManyToMany

 Do you want to add a new property to Exemplaire so that you can access/update Client objects from it - e.g. $exemplaire->getClients()? (yes/no) [yes]:
 > yes

 A new property will also be added to the Exemplaire class so that you can access the related Client objects from it.

 New field name inside Exemplaire [clients]:
 > emprunteurs

 updated: src/Entity/Client.php
 updated: src/Entity/Exemplaire.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 >


 
  Success! 
 

 Next: When you're ready, create a migration with symfony console make:migration 
```

Créez et lancez une migration. Observez les changements dans le code des entités ainsi que dans le schéma de la BD: Doctrine crée un nouveau tableau mais il n'y a pas moyen de rajouter des attributs dans la relation (ne pensez même pas à le faire directement dans phpMyAdmin!!!)

<br>


### 11.6.4. Relation One-To-One 

<br>


Ce type de relation est moins fréquent, mais si vous avez besoin
de les réaliser la documentation se trouve ici :

<https://www.doctrine-project.org/projects/doctrine-orm/en/latest/reference/association-mapping.html#one-to-many-bidirectional>

**L'implémentation en soi est facile. Voici un exemple :**

Considérez qu'un client peut avoir un avatar (un fichier d'image) et qu'un avatar appartient à un seul client. On ne veut pas stocker les fichiers dans le tableau client, on veut carrément une autre entité.

Dans **ProjetModelSymfony** :

1.  Créez l'entité *Avatar* (contenant juste une propriété *lien* type string)

2.  Suivez la même procédure que pour les relations Many-to-One mais choisissez One-To-One vers Client


```console
 Class name of the entity to create or update (e.g. VictoriousGnome):
 > Avatar

 created: src/Entity/Avatar.php
 created: src/Repository/AvatarRepository.php
 
 Entity generated! Now let's add some fields!
 You can always add more fields later manually or by re-running this command.

 New property name (press <return> to stop adding fields):
 > lien

 Field type (enter ? to see all types) [string]:
 > 

 Field length [255]:
 >

 Can this field be null in the database (nullable) (yes/no) [no]:
 >

 updated: src/Entity/Avatar.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > utilisateur      

 Field type (enter ? to see all types) [string]:
 > relation

 What class should this entity be related to?:
 > Client

What type of relationship is this?
 ------------ -------------------------------------------------------------------- 
  Type         Description                                                         
 ------------ --------------------------------------------------------------------
  ManyToOne    Each Avatar relates to (has) one Client.
               Each Client can relate to (can have) many Avatar objects

  OneToMany    Each Avatar can relate to (can have) many Client objects.
               Each Client relates to (has) one Avatar

  ManyToMany   Each Avatar can relate to (can have) many Client objects.
               Each Client can also relate to (can also have) many Avatar objects

  OneToOne     Each Avatar relates to (has) exactly one Client.
               Each Client also relates to (has) exactly one Avatar.
 ------------ --------------------------------------------------------------------

 Relation type? [ManyToOne, OneToMany, ManyToMany, OneToOne]:
 > OneToOne

 Is the Avatar.utilisateur property allowed to be null (nullable)? (yes/no) [yes]:
 >

 Do you want to add a new property to Client so that you can access/update Avatar objects from it - e.g. $client->getAvatar()? (yes/no) [no]:
 > yes

 A new property will also be added to the Client class so that you can access the related Avatar object from it.

 New field name inside Client [avatar]:
 > avatar

 updated: src/Entity/Avatar.php
 updated: src/Entity/Client.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 >


 
  Success! 
 

 Next: When you're ready, create a migration with symfony console make:migration```

```
Faites la migration et observez les changements dans le code des entités ainsi que dans le schéma de la BD:

<br>


![](./images/one-to-one-avatar.png)

L'utilisateur_id est lié (FK) à l'id du client

<br>
<br>

### 11.6.5. Relation réflexive (self-association)

<br>

**a) Relation réflexive d'un à plusieurs**

Nous pouvons aussi implémenter une entité qui a une référence à
soi-même. L'exemple le plus typique est celui des parents-enfants ou
chef-employé. On peut modéliser ce cas en utilisant une relation
one-to-many dans la même entité.

Considérons un magasin qui organise les produits en catégories. Une catégorie peut avoir des sous-catégories mais une sous-catégorie appartient uniquement à une catégorie.

<br>

![](./images/relation-réflexive-one-to-many.png)
<br>

Dans **ProjetRelationsSymfony**:

1.  Créez l'entité *Categorie* (nom - string)

2.  Créez une propriété **sousCategories** du type relation (OneToMany). La propriété complementaire sera **categorieParent**

```console
C:\xampp\htdocs\Int3-WAD-Symfony6.3\ProjetRelationsSymfony>symfony console make:entity

 Class name of the entity to create or update (e.g. BraveKangaroo):
 > Categorie

 Your entity already exists! So let's add some new fields!

 New property name (press <return> to stop adding fields):
 > sousCategorie

 Field type (enter ? to see all types) [string]:
 > relation

 What class should this entity be related to?:
 > Categorie

What type of relationship is this?
 ------------ -------------------------------------------------------------------------- 
  Type         Description
 ------------ --------------------------------------------------------------------------
  ManyToOne    Each Categorie relates to (has) one Categorie.
               Each Categorie can relate to (can have) many Categorie objects

  OneToMany    Each Categorie can relate to (can have) many Categorie objects.
               Each Categorie relates to (has) one Categorie

  ManyToMany   Each Categorie can relate to (can have) many Categorie objects.
               Each Categorie can also relate to (can also have) many Categorie objects  

  OneToOne     Each Categorie relates to (has) exactly one Categorie.
               Each Categorie also relates to (has) exactly one Categorie.
 ------------ -------------------------------------------------------------------------- 

 Relation type? [ManyToOne, OneToMany, ManyToMany, OneToOne]:
 > OneToMany

 A new property will also be added to the Categorie class so that you can access and set the related Categorie object from it.

 New field name inside Categorie [categorie]:
 > categorieParent

 Is the Categorie.categorieParent property allowed to be null (nullable)? (yes/no) [yes]:
 > 

 updated: src/Entity/Categorie.php
 ``` 

Créez et lancez la migration, observerz le schéma de la BD:

<br>

![](./images/relation-réflexive-BD.png)

Ici, le categorie_parent_id est lié avec l'id de la Categorie 

On obtient un seul tableau dans la BD et un champ extra qui indique la relation (à cause du one-to-many).

Dans le code PHP (Categorie.php) on obtient deux listes, une pour les sous-catégories et une autre pour les catégories-parent. Aucun tableau extra sera généré.

<br>

**b) Relation réflexive de plusieurs à plusieurs**


Si la relation est de **plusieurs à plusieurs sans attributs** (ex. : un employé qui supervise plusieurs employés, et qui est à son tour supervisé par d'autres employés), on peut utiliser une **relation many-to-many** **si on n'a pas d'attributs dans la relation**.

![](./images/relation-réflexive-many-to-many.PNG)

Dans **ProjetRelationsSymfony**:

1.  Créez l'entité *Employe* (*nom*, *prenom*)

2.  Créez une propriété **supervises** (attention au pluriel) du type relation (ManyToMany). La propriété complementaire sera
    **superviseurs**


Créez et lancez la migration. Observez le résultat dans le code et dans la BD :

<br>

![](./images/relation-réflexive-many-to-many-BD.PNG)

<br>


**Si la relation avait eu des attributs**, on aurait créé deux entités (Personne et Supervision) nous-mêmes et on aurait appliqué la méthode de One-To-Many.

Voici un exemple (on rajoute le suffixe MMA pour ne pas écraser les autres entités).

![](./images/relation-réflexive-many-to-many-attributes-UML.PNG)


Dans **ProjetRelationsSymfony**:

1.  Créez l'entité *EmployeMMA* (nom, prenom)

2.  Créez l'entité *SupervisionMMA* (role)

3.  Créez une propriété dans **EmployeMMA** du type relation OneToMany qui porte le nom **supervisionsSuperviseur** (ces sont les supervisions dont la Personne est le superviseur. Attention au pluriel qui ne se trouve pas dans l'UML). 
La classe associée est **SupervisionMMA**.
La propriété complementaire sera
**superviseur** et pointe vers **EmployeMMA**.

4. Créez une nouvelle propriété dans **EmployeMMA** du type relation qui porte le nom **supervisionsSupervisee** (les supervisions où l'Employe est supervisé par quelqu'un d'autre. Attention aux pluriels) et pointe vers **SupervisionMMA** (OneToMany). La propriété complementaire sera **supervisee** (l'Employe)
   
5.  Observez le code et le schéma généré:

<br>

![](./images/relation-réflexive-many-to-many-attributes.png)



Sur les associations récursives :

<http://www.tomjewett.com/dbdesign/dbdesign.php?page=recursive.php>


<br>
<br>


# 12. Le modèle : accès à la BD avec Doctrine

Pour pouvoir réaliser un CRUD de base dans la BD nous pouvons utiliser les **méthodes de base de Doctrine** associés à notre Entité. Quand on crée une entité, sa classe **Repository** est créée aussi (ex : Client.php et ClientRepository.php sont générées).

Cette classe contient **de méthodes capables de réaliser de requêtes héritées de DoctrineORMEntityRepository**.

Documentation: <https://symfony.com/doc/3.3/doctrine.html>

<br>

## 12.1. INSERT

<br>

Un objet créé dans le code PHP (ex : new Livre) n'a aucune relation avec la BD: il est dans les **domaine des objets**. 
Pour stocker l'objet dans les tableaux correspondants de la BD on va suivre cette procédure: 

1.  Créer un objet dans un controller

2.  Lancer **persist** pour **lier l'objet avec la BD** (le mettre dans l'unité de travail dont on parlera après) 
À ce moment on ne modifie pas encore la BD!

3.  Lancer **flush** pour exécuter l'enregistrer dans la BD

Les méthodes **persist** et **flush** n'appartiennent pas à la classe Repository, ils font partie du *Entity Manager* de Doctrine. On discutera ces deux méthodes dans un contexte plus global (unité de travail) dans la section "Persistence" plus bas dans ce tutoriel.

Voici un exemple de code: 

```php
use Doctrine\Persistence\ManagerRegistry;
.
.
.
    #[Route ("/exemples/modele/exemple/insert")]
    public function exempleInsert(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        // créer l'objet
        $livre = new Livre();
        $livre->setTitre("Guerre et paix");
        $livre->setDatePublication(new \DateTime("1865-1-1"));
        $livre->setPrix(20);
        $livre->setDescription(" l’histoire de la Russie à l’époque de Napoléon Ier, notamment la campagne de Russie en 1812. Léon Tolstoï y développe une théorie fataliste de l’histoire, où le libre arbitre n’a qu’une importance mineure et où tous les événements n’obéissent qu’à un déterminisme historique inéluctable. ");
        $livre->setIsbn("2131231123");
        // lier l'objet avec la BD
        $em->persist($livre);
        // écrire l'objet dans la BD
        $em->flush();

        return $this->render("exemples_modele/exemple_insert.html.twig");
    }
```

Si vous voulez vous epargner les **sets** vous pouvez créer un hydrate pour vos entités:


**Exemple**: hydrate pour **Livre.php**
```php
public function __construct(array $init = [])
{
    $this->hydrate($init); 

    // il peut avoir des lignes propres à l'entité
    $this->exemplaires = new ArrayCollection();
}

public function hydrate (array $vals = []){
    foreach ($vals as $key=> $val){
        $method = "set" . ucfirst($key); 
        if (method_exists($this,$method)){
            $this->$method ($val);
        }
    }
}
```
alors vous pouvez lancer :
```php
use Doctrine\Persistence\ManagerRegistry;
.
.
.
    #[Route ("/exemples/modele/exemple/insert")]
    public function exempleInsert(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        // créer l'objet avec le hydrate
        $livre = new Livre(["titre"=>"Guerre et paix",
                            "datePublication"=>new \DateTime("1865-1-1"),
                            "prix"=>20,
                            "description" => "l’histoire de la Russie à l’époque de Napoléon Ier, notamment la campagne de Russie en 1812. Léon Tolstoï y développe une théorie fataliste de l’histoire, où le libre arbitre n’a qu’une importance mineure et où tous les événements n’obéissent qu’à un déterminisme historique inéluctable. ",
                            "isbn" =>"2131231123"]);
        // lier l'objet avec la BD
        $em->persist($livre);
        // écrire l'objet dans la BD
        $em->flush();

        return $this->render("exemples_modele/exemple_insert.html.twig");
    }
```



<br>

## 12.2. SELECT

<br>

Créez à la main ou en code quelques enregistrements dans la base de données (Bibliotheque, table Livres) car nous allons réaliser quelques requêtes de selection. 

(ou importez le fichier *ProjetModelSymfony\src\Entity\sql*)

Par défaut il existe les méthodes suivantes (héritées) :

-   **findOneBy** : cherche des objets avec un filtre, renvoie seulement le premier objet qui atteint les conditions

-   **findBy** : pareil que findOneBy mais renvoie tous les objets qui atteignent les conditions du filtre. findBy renvoie **toujours un array** même si il y a qu'un objet qui remplit les conditions du filtre

-   **find** : sélection par id. Renvoie un seul objet

-   **findAll** : renvoie un array d'objets contenant tous les éléments du
    tableau

Voici un exemple d'utilisation de chaque méthode (actions dans le
controller). Créez vous-mêmes les vues et les routes.

<br>

### 12.2.1. SELECT: findOneBy

<br>

```php


#[Route ("/exemples/modele/exemple/find/one/by")]
public function exempleFindOneBy(ManagerRegistry $doctrine)
{
    // obtenir le entity manager
    $em = $doctrine->getManager();
    // obtenir le repository
    $rep = $em->getRepository(Livre::class);

    // on obtient l'objet, le filtre est envoyé sous la forme d'un array
    // (on peut rajouter de clés qui provoqueront an AND)
    $livre = $rep->findOneBy(['titre' => 'Life and Fate',
                                    'prix' => 20]);

    // on stocke le résultat dans un array associatif 
    // pour l'envoyer à la vue comme d'habitude
    $vars = ['unLivre' => $livre];

    // on renvoie l'objet à la vue, rien ne change ici
    return $this->render("exemples_modele/exemple_find_one_by.html.twig", $vars);
}
```

L'objet $em est un objet de la classe EntityManager. Le ***entity
manager* gère le CRUD des entités** dans la BD. Tel qu'on l'a
mentionné ci-dessus, l'objet repository (ici $rep) possède de méthodes
qui nous facilitent ce CRUD. Par défaut nous disposons de l'ensemble de
méthodes de base mentionné mais **on peut rajouter d'autres méthodes
dans nos repository pour réaliser des requêtes plus complexes**.

<br>

### 12.2.2. Serialization

<br>

On sait qu'**on ne peut pas envoyer des objets PHP et les traiter dans les scripts de JS**.

La transformation en **array avec le casting** (même pas utilisable en JS, car ça reste du PHP) ou un simple **json_encode** (chaîne json) va nous poser de problèmes souvent, spécialement si on a des structures imbriquées (*Repertoire* qui contient de *Contacts*, par exemple). En plus, **json_encode n'encode pas les propriétés privates**

La serialization est un sujet large. Serialiser consiste **à transformer un objet dans une chaîne de bytes**. Normalement on prend un array d'objets (où un objet) et on crée une chaîne JSON (bytes qui représentent de caractères)

**Array d'objets -> Arrays Simples (associatifs) -> Chaîne JSON**

Le prémier pas est la **Normalisation** et le deuxième est **l'encodage JSON**. L'ensemble des deux est la **Serialization**

On peut créer nos propres serialisateurs pour encoder-decoder les objets de n'importe quelle manière, **mais ici on se comptente de pouvoir les encoder en JSON, les envoyer à la vue et les traiter en JS**. **C'est carrement sufissant pour la plupart de cas**.

La doc. genérale se trouve ici: 

https://symfony.com/doc/current/components/serializer.html


Vous avez des exemples dans le projet **NavigationExemples** (SerialisationController). 

Il y a déjà une explication qui fonctionne pour les cas normaux (probablement tous vos cas).

Si vous voulez directement l'utiliser, suivez l'exemple des actions : 

**serializer_affichage** et **serializer_traitement** (names)

On verra en cours le projet **NavigationExemples** pour l'explication totale de la serialisation et la déserialisation.


* ProjetModel - controller : LivresController

Le projet CreationApi est en cours, ignorez-le pour le moment.


Ici on voit les deux pas de la serialisation. Tout le code est commenté (normalisation et encodage)

Dans notre cas de figure, **serialiser** sera crée une chaîne JSON contenant toutes les données de l'objet.




<br>

### 12.2.3. SELECT: findBy 

<br>

```php
    
    // SELECT: findBy (chercher par un ou plusieurs champs, filtre array)
    #[Route ("/exemples/modele/exemple/find/by")]
    public function exempleFindBy(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Livre::class);

        // on doit obtenir un objet, il ne suffit pas un id


        $livres = $rep->findBy(['prix'=>20]);
        $vars = ['livres' => $livres];
        return $this->render("exemples_modele/exemple_find_by.html.twig", $vars);
    }
```




### 12.2.4. SELECT: find

<br>

```php
    
    // SELECT: find (chercher par id)
    #[Route ("/exemples/modele/exemple/find")]
    public function exempleFind(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Livre::class);

        $livre = $rep->find(1);
        $vars = ['unLivre' => $livre];
        return $this->render("exemples_modele/exemple_find.html.twig", $vars);
    }
```
### 12.2.5. SELECT: findAll 

<br>

```php

// SELECT: findAll (chercher par un ou plusieurs champs, filtre array)
#[Route ("/exemples/modele/exemple/find/all")]
public function exempleFindAll(ManagerRegistry $doctrine)
{
    $em = $doctrine->getManager();
    $rep = $em->getRepository(Livre::class);

    // notez que findBy renverra toujours un array même s'il trouve 
    // qu'un objet
    $livres = $rep->findAll();
    $vars = ['livres' => $livres];

    return $this->render("exemples_modele/exemple_find_all.html.twig", $vars);
}
```

Pour accéder à un objet dans la vue, utilisez la syntaxe "."

**{{ livre.titre }}**

### Exercices : utilisation du CRUD (select)

<br>


1) Obtenez tous les livres de la BD et affichez-les dans una vue

2) Obtenez les données d'un livre en utilisant findOneBy et affichez-les dans une vue

3) Créez une méthode qui obtient la liste de tous les clients
    (remplissez la BD d'abord ;))

4)  Créez une méthode qui obtient tous les clients qui s'appellent Marie Dupont (insérez d'abord un client ayant ce nom)

5)  Créez une méthode qui obtient le client qui porte l'id numéro 3 dans la BD (ou aun autre existant)

<br>

## 12.3. UPDATE et DELETE

<br>

Quand on crée un objet (ex : Livre) il n'a aucune relation avec la BD: il est dans les **domaine des objets**. Si on lance la méthode **persist** sur cet objet, **l'objet sera lié au domaine de la BD**  mais aucune requête sera lancée pour le moment, l'objet ne sera pas encore dans la BD. Nous pouvons alors :

1.  Créer un objet

2.  Lancer **persist** pour lier l'objet avec la BD (on ne modifie pas
    la BD encore!)

3.  Modifier le contenu de l'objet

4.  Lancer **flush** pour l'enregistrer/mettre à jour dans la BD

L'opération **flush applique dans la BD les changements qu'on été réalisés dans le domaine des objets** (ex : obtenir un livre de la BD, le modifier dans le domaine des objets et le réenregistrer dans la BD).

Les méthodes **persist** et **flush** n'appartiennent pas à la classe Repository, ils font partie du Entity Manager de Doctrine. On discutera ces deux méthodes dans un contexte plus global (unité de travail) dans la section "Persistence" plus bas dans ce tutoriel.

Voyons quelques exemples d'insertion et mise à jour à continuation.

<br>


### 12.3.2. UPDATE

<br>

Pour réaliser un UPDATE on doit d'abord obtenir un objet de la BD.
La procédure est simple :

- Obtenir un objet en utilisant une requête de selection (ex: find, findBy, findOneBy, findAll ou votre propre méthode)
- Modifier l'objet (ex: $livre1->setTitre("1984"))
- Lancer la méthode **flush** du Entity Manager

L'opération **flush applique dans la BD les changements qu'on a réalisés dans le domaine des objets** (ex : obtenir un livre de la BD, le modifier dans le domaine des objets et le réenregistrer dans la BD).

Notez que pour un update on ne lance pas **persist**, car il est lancé automatiquement quand on fait la requête de sélection.



```php
#[Route ("/exemples/modele/exemple/update")]
public function exempleUpdate(ManagerRegistry $doctrine)
{
    $em = $doctrine->getManager();
    // on obtient d'abord un livre
    $unLivre = $em->getRepository(Livre::class)->findOneBy(array("titre" => "Life and fate"));
    
    $unLivre->setTitre("Toto est content"); 
    // pas besoin de persist 
    // quand on obtient un objet de la BD
    // Attention: si le livre n'existe pas l'objet sera null et la ligne suivante provoquera une exception 
    $em->flush();
    return $this->render("exemples_modele/exemple_update.html.twig");
}
```


### 12.3.3. DELETE

<br>


```php

#[Route ("/exemples/modele/exemple/delete")]
public function exempleDelete(ManagerRegistry $doctrine)
{
    $em = $doctrine->getManager();
    $unLivre = $em->getRepository(Livre::class)->findOneBy(array("titre" => "Toto est content"));
    // pas besoin de persist
    // quand on obtient un objet de la BD il se trouvera déjà dans la unit of work 
    // $em->persist ($unLivre); 
    // Attention: si le livre n'existe pas l'objet sera null et la ligne suivante provoquera une exception 
    $em->remove($unLivre);
    $em->flush();
    return $this->render("exemples_modele/exemple_delete.html.twig");
}
```

<br>

### Exercices: utilisation du CRUD (insert, delete) 

<br>

1.  Créez une méthode qui efface un client de la BD

2.  Créez une méthode qui insère deux Livres

3.  Pour nous faciliter la création des entités et ne pas devoir affecter les propriétés avec les méthodes Set, modifiez les constructeurs de vos entités pour qu'il puissent recevoir un array contenant les paramètres pour construire chaque entité. Créez une méthode hydrate pour chaque entité. Cette méthode sera appelée si le constructeur reçoit un array de couples propriété-valeur (voir le cours d'hydratation).


<br>

# 13. Le modèle : Persistance

<br>

Les actions qu'on réalise sur les entités (ex: persister une nouvelle entité qu'on a créé dans le domaine des objets) sont regroupées par Doctrine dans une **unité de travail (Unit of Work)**. 

L'unité de travail contient l'état de chaque entité.
Quand on lance **flush**, les actions de l'unité de travail seront lancées et la base de donnée sera modifié (pour insérer, mettre à jour, etc...). Il y aura alors une **cohérence entre le modèle et la BD**.

On peut faire autant de modifications que l'on veut sur les entités : si on n'exécute pas 'flush' rien ne sera modifié dans la base de données.

Documentation :

<http://doctrine-orm.readthedocs.io/en/latest/reference/unitofwork.html>

<br>

**L'unité de travail fonctionne de la manière suivante** :

-   La méthode **persist** ($objet) **rajoute une entité à l'unité de travail** (si elle n'y était pas présente déjà).

    Ex : quand on vient de créer un Livre avec **new.**

```php
    $livre = new Livre (['titre'=>'Don Quixote',
                        'prix'=>25]); // pas encore dans la UoW (unité de travail)
    $doctrine->persist ($livre); // L'entité devient "gérée" (**"managed"**). Elle est dans la UoW mais pas dans la BD
    $doctrine->flush(); // executer toutes les opérations de la UoW, y inclus insérer notre entité dans la BD
    
```

    

-   Quand **on fait un select de la BD, les entités obtenues se trouvent directement dans l'unité de travail** et on n'a pas besoin de faire **persist**. Par contre, si on crée une entité avec **new**, elle fera partie de l'unité de travail **uniquement** quand on lancera **persist** pour la mettre dans l'unités de travail

-   Si on veut **enlever les entités de l'unité de travail** et les rendre indépendantes, on utilise **clear**. L'unité de travail sera vidée. Les objets deviennent indépendants de l'entity manager et les modifications n'auront pas d'effet sur la BD même si on lance **flush**

-   **persist** rajoute une entité à l'unité de travail et rend cette instance "gérée" (managed). Les futures mises à jour de l'entité seront suivies et la BD sera modifié quand on fera **flush**.

**Attention**: si une entité 'contient' d'autres entités (ex: un Livre que contient des Exemplaires), le persist de la prèmiere (persist du Livre) ne fera automatiquement le persist des autres (persist des Exemplaires). 

On a deux choix: faire persist de chaque entité (persist du Livre et de chaque Exemplaire... trop de lignes de code!) ou rajouter **cascade-persist** dans la définition de l'entité (l'opération est expliquée dans la section 14 est elle **très simple** ):


```php
#[ORM\OneToMany(mappedBy: 'livre', targetEntity: Exemplaire::class, orphanRemoval: true, cascade:['persist','remove'])]
```

    Note: ici on rajoute aussi 'remove'. Si on efface un Livre ses Exemplaires seront effacés automatiquement

-   **refresh** (pas indispensable si vous n'avez pas le temps) recharge le contenu de l'entité de la BD. Si on obtient une entité de la BD et on la modifie, en lançant refresh l'entité sera à nouveau lue de la BD

-   Chaque fois qu'on appelle **flush**, Doctrine vérifie l'unité de travail et synchronise les objets avec la BD (change la BD en fonction du contenu des objets qui se trouvent dans l'unité de travail).

```php
// REFRESH

#[Route ("/exemples/modele/exemple/refresh")]
public function exempleRefresh(ManagerRegistry $doctrine)
{
    $em = $doctrine->getManager();
    $unLivre = $em->getRepository(Livre::class)->findOneBy(array("titre" => "Guerre et paix"));
    // on modifie le Livre obtenu de la BD
    $unLivre->setTitre("La vie est belle");
    // on affiche le livre après la modification (domaine objets)
    dump ($unLivre);

    // recharge le livre de la BD, il y aura le titre original
    $em->refresh($unLivre);

    // de-commentez cette ligne pour vérifier que l'objet a à nouveau le titre original
    dd( $unLivre); // dd est dump and die!

    $em->persist($unLivre);
    // rien ne change dans la BD
    $em->flush();
    return $this->render("exemples_modele/exemple_refresh.html.twig");
}
```

```php
// CLEAR

#[Route ("/exemples/modele/exemple/clear")]
public function exempleClear(ManagerRegistry $doctrine)
{
    $em = $doctrine->getManager();
    $livre = $em->getRepository(Livre::class)->findOneBy(array("titre" => "Moby Dick"));
    $livre->setTitre("Totorito");
    $em->clear();
    // ce flush ne fera rien, les entités on été enlevées de l'unité du travail
    $em->flush();

    return $this->render("exemples_modele/exemple_clear.html.twig");
}

```

<br>

# 14. Le Modèle : Transitivité en Cascade 

Quand nous avons des associations entre les entités, nous avons la possibilité d'indiquer à Symfony **de propager l'opération réalisé sur une entité en cascade sur les entités associées**.

**Exemple** : on efface un livre et on provoque l'effacement de tous ses exemplaires en cascade

On travaillera sur un nouveau controller: **ExempleCascadeController**.


Nous avons plusieurs possibilités :

**cascade-persist** : Si on a une entité qui contient des objets d'autres entités (ex: un Livre qui contient des Exemplaires), et nous modifions/rajoutons ces dernières (ex: on rajoute un Exemplaire au Livre, on modifie un des Exemplaires du Livre), nous allons devoir faire uniquement **persist** **sur la première** et Doctrine fera persist sur toutes les entités associées.

Exemple : nous obtenons un Livre auquel on rajoute des exemplaires. Si nous faisons **persist** sur le Livre, l'opération sera transmise en cascade à tous les exemplaires. Autrement on devrait lancer **persist** sur chaque exemplaire.

**cascade-remove** : Si on efface une entité, l'effacement sera propagé en cascade.

Si l'entité n'a pas eu un **persist**, elle n'est pas effacée de la BD mais ses entités associées le seront.

Si on a enlevé l'entité de l'unité de travail (clear), remove enverra une exception.

**cascade-refresh** : pareil que la précédente mais pour **refresh**


**cascade-all** : Implique toutes les opérations précédentes. Peut
dégrader la performance.


<br>

**Exemple** : Réalisation d'un **INSERT** des objets d'une relation One-to-Many sans cascade-persist

Observez cet exemple où on crée un Livre et plusieurs Exemplaires, et on stocke le tout dans la BD (créez un nouveau controller *ExemplesCascadeController* et importez les classes Livre et Exemplaires) :

```php

#[Route("/exemples/cascade/exemple/sans/encapsulation")]
public function exempleSansEncapsulation (ManagerRegistry $doctrine){
    
    $em = $doctrine->getManager();
    // on crée un livre
    $livre = new Livre(["titre" => "Confesión de un asesino",
                        "prix"=> 20,
                        "description" => "Roman",
                        "datePublication" => new \DateTime("1968:10:10 00:00:00"));
    // on crée deux exemplaires de ce Livre
    $exemplaire1 = new Exemplaire(["etat"=>"tache de chocolat"]);
    $exemplaire2 = new Exemplaire(["etat"=>"très vieux"]);
    $livre->addExemplaire($exemplaire1);
    $livre->addExemplaire($exemplaire2);

    // Observez que l'exemplaire fait référence à son livre 
    // grâce au code généré par l'assistant dans "addExemplaire"
    // car on a choisi de créer une association bidirectionnelle!
    // dump ($exemplaire1->getLivre());
    // die();
    
    // nous n'avons pas besoin d'indiquer nous-mêmes qui est 
    // le livre de chaque exemplaire! 
    // $exemplaire1->setLivre($livre);   // pas besoin
    // $exemplaire2->setLivre($livre);   // pas besoin

    // $em->persist ($exemplaire1);
    // $em->persist ($exemplaire2);
    
    $em->persist($livre);
    $em->flush();

    return $this->render ("exemples_cascade/exemple_sans_encapsulation.html.twig");
}
```

Normalement le code devrait insérer un Livre et deux Exemplaires dans la BD, et puis mettre à jour la clé étrangère (livre_id) de chaque
exemplaire.

Mais si vous le lancez-vous obtenez :

![](./images/error-cascade.png)

Symfony remarque qu'on n'a pas fait **persist** des objets associés au Livre (les Exemplaires du Livre qu'on vient de créer). Pour que le mécanisme fonctionne, nous avons deux possibilités :

-   Lancer **persist** pour les exemplaires avant de lancer le persist
    du Livre (pas pratique, long à écrire)

```php
    $em->persist($exemplaire1);
    $em->persist($exemplaire2);
    $em->persist($livre);
    .
    .
    .
```

-   Spécifier que **la persistance doit se réaliser en cascade** dans l'annotation de l'association **(fichier de l'entité). Modifiez le fichier de l'entité Livre.php**

```php
#[ORM\OneToMany(mappedBy: 'livre', targetEntity: Exemplaire::class, orphanRemoval: true, cascade:['persist', 'remove'])]
private $exemplaires;
```

**IMPORTANT** : Observez que les deux côtes de la relation sont mises à
jour dans la méthode **addExemplaire** :

1.  **L'exemplaire est rajouté à la liste d'exemplaires dans Livre**

2.  **La propriété Livre est affecté dans l'objet exemplaire. Cela permet que quand on réalisera la migration dans la BD, le livre_id sera mis à jour sans devoir le faire à la main !**


<br>

### Exercices : actions en cascade

1.  Effacez un livre et provoquez que les exemplaires soient effacés automatiquement. Modifiez la configuration de cascade pour que l'opération soit réalisée correctement (exerciceCascadeRemove)

2.  Créez une méthode qui rajoute deux clients et une adresse. Faites bien attention au sens de cette association (côté Many et côté One). Modifiez les attributs de cascade dans l'entité nécessaire pour pouvoir exécuter le persist

3.  Créez une méthode qui cherche un client dans la BD et puis l'efface, y incluses toutes ses adresses

<br>

# 15. Le Modèle : Encapsulation 


Le code de l'exemple précédant crée un Livre, puis crée deux
exemplaires et pour finir stocke le tout dans la BD.

**La méthode utilisée fonctionne mais on peut l'améliorer** :

Pour le moment on doit toujours créer les objets Livre et Exemplaire dans l'action principale. On doit alors **connaitre l'existence et importer toutes ces classes dans le controller !**

On peut aller plus loin en utilisant le concept d'**encapsulation**. L'encapsulation es un principe de la programmation orienté objet qui, entre autre, propose de **cacher la visibilité des objets ou des parties d'un objet**. Dans ce cas on veut permettre au développeur de rajouter des exemplaires sans que le controller aie besoin de connaitre l'existence de la classe Exemplaire.

Le mécanisme est très simple : **au lieu de créer l'objet** exemplaire **dans l'action du controller et l'envoyer à la méthode qui le rajoute** **au livre** (addExemplaire dans Livre), **on créera** l'exemplaire **à l'intérieur d'une nouvelle méthode de Livre**. Cette méthode du livre sera **appelée depuis l'action, qui l'enverra les données nécessaires pour créer l'objet** Exemplaire. L'objet en soi n'est pas envoyé. Voici un exemple, observez les différences avec l'exemple précédant :

Nouvelle méthode **dans Livre.php** :

```php
// rajouté pour permettre l'encapsulation (section dans le notes)
public function addExemplaireNoClass($etat, $emplacement)
{
    $exemplaire = new \App\Entity\Exemplaire();
    $exemplaire->setEtat($etat);
    $this->addExemplaire($exemplaire);
}
```
Nous n'avons plus besoin de la classe Exemplaire dans l'action principale et en plus son code sera simplifié :


```php
.
.
.

class ExemplesEncapsulationController extends AbstractController
{
    
    #[Route("/exemples/encapsulation/rajouter/livre/exemplaires/encapsulation")]
    public function rajouterLivreExemplairesEncapsulation(ManagerRegistry $doctrine
    {
        $em = $doctrine->getManager();
        // on crée un livre
        $livre = new Livre();
        $livre->setTitre("Currucucu Paloma");
        $livre->setPrix(20);
        $livre->setDescription("Roman");
        $livre->setDatePublication(new \DateTime("1968:10:10 00:00:00"));
        $livre->setIsbn("321423142134");

        // on ne crée pas ici les exemplaires. On envoie les données 
        // necessaires pour créer les objets Exemplaire à la nouvelle méthode
        // de l'entité Livre
        // Cette méthode mettra à jour les deux côtés de la relation
        // car elle fait appel à addExemplaire
        $livre->addExemplaireNoClass("tache de chocolat", "15A");
        $livre->addExemplaireNoClass("très vieux", "13B");

        $em->persist($livre);
        $em->flush();
        return $this->render("exemples_encapsulation/rajouter_livre_exemplaires_encapsulation.html.twig");
    }
}
```
Comparez ce code avec celui de "rajouterSansEncapsulation"...

<br>

# 16. Le Modèle : Héritage de classes 


Nous allons utilisez le projet **ProjetRelationsSymfony** pour illustrer l'héritage.
<br>

**Exemple** : Les clients et les auteurs d'une application sont tous de personnes. Implementons ce modèle en code et dans la BD

<br>

![](./images/heritage1.png)


Nous pouvons approcher ce problème de deux formes différentes :

1.  **Single Table Inheritance** : On crée un seul tableau contenant les propriétés des trois entités. Dans le code il y a trois entités mais dans la BD il y a qu'une. Pour savoir si une ligne dans le tableau correspond à une entité ou une autre on rajoutera une **colonne discriminator** qui indiquera le type de la ligne. Simple, rapide et sans jointures.

2.  **Class Table Inheritance** : On crée un tableau pour chaque entité.  Plus lourd, pas toujours stable. Chaque query, même les très simples, demanderont la réalisation d'une jointure.

<br>

Nous allons maintenant montrer des exemples pratiques.

La documentation sur l'héritage des entités se trouve ici :

https://www.doctrine-project.org/projects/doctrine-orm/en/latest/reference/inheritance-mapping.html

Notez que c'est la documentation de Doctrine!


<br>


## 16.1. Single Table Inheritance

<br>

L'héritage de table unique (Single Table inheritance) est une stratégie de mappage d'héritage dans laquelle **toutes les classes d'une hiérarchie sont mappées vers une seule table de base de données**. Afin de distinguer quelle ligne du tableau représente quel type dans la hiérarchie, une colonne dite "discriminator" est utilisée.

1)  **Créez les entités** filles et parent : ClientH, AuteurH et PersonneH selon le diagramme ci-dessus

2)  Créez un héritage entre les filles et la classe mère. (ici, rajoutez l'héritage dans la définition des classes filles)

```php
class AuteurH extends PersonneH {...}
class ClientH extends PersonneH {...}
```

**Important:** Effacez les id's dans les classes filles car elles héritent l'id de la classe parent


3)  **Rajoutez les annotations** **InheritanceType,DiscriminatorColumn** et **DiscriminatorMap** à la classe **parent**

**InheritanceType** indique le type d'héritage. Ici c'est **Single Table**
**DiscriminatorColumn** indique le nom de la colonne qui contiendra la valeur qui nous indique à quelle classe fille correspond la ligne (ici "auteurH" ou "clientH")
**DiscriminatorMap** indique les valeurs concretes de la colonne indiquée dans DiscriminatorColumn

```php
// n'oubliez pas d'importer ces annotations
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;

// ATTENTION!: format attributs PHP
#[ORM\Entity(repositoryClass: PersonneHRepository::class)]
#[InheritanceType("SINGLE_TABLE")]
#[DiscriminatorColumn(name: "discr", type: "string")]
#[DiscriminatorMap(["personne" => "PersonneH", "auteurH" => "AuteurH", "clientH" => "ClientH"])]
```



4)  **Migrez la BD** et observez le résultat dans la BD
<br>

![](./images/heritage2.png)

Bien que nous avons trois entités au total, la méthode de **Single Table crée une seule table** contenant une colonne (discr) qui indiquera à quelle classe fille l'enregistrement correspond dans la BD (dans notre cas le colonne contient "AuteurH" ou "ClientH")

Les **régles** à suivre sont :

-   @InheritanceType et @DiscriminatorColumn doivent être spécifiés dans la classe base de de la hiérarchie des entités mappées

-   @DiscriminatorMap indique le type d'une ligne. Ici, une valeur de **discr** indique *AuteurH* ou *ClientH* 

On peut maintenant faire le CRUD de nos entités ...

**Exemple** : insérer un Client et un Auteur dans la base de de données

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ClientH;
use App\Entity\AuteurH;
use Symfony\Component\HttpFoundation\Response;


class ExemplesHeritageController extends AbstractController
{
    #[Route("/exemples/heritage/inserer/client/auteur")]
    public function insererClientAuteur(ManagerRegistry $doctrine){
        $em = $doctrine->getManager();


        // créer l'objet
        $client = new ClientH();
        $client->setNom("López");
        $client->setPrenom("Jean");
        $client->setEmail ("jean.lopez@lala.de");
        $client->setNumero(200);
        $auteur = new AuteurH();
        $auteur->setNom("Lucas");
        $auteur->setPrenom("George");
        $auteur->setNationalite("USA");
        
        // lier les objets avec la BD
        $em->persist($client);
        $em->persist($auteur);
        
        // écrire les objets dans la BD
        $em->flush();
        return new Response ("Ok, objets insérés");
    }
}

```

Nous devons uniquement créer un Client et l'insérer, Doctrine remplira tant le tableau parent avec la colonne discriminateur ! Les valeurs qui ne concernent pas chaque entité respective seront *NULL* (logique...)

<br>

## 16.2. Class Table Inheritance

Nous n'allons pas développer cette méthode maintenant mais vous avez la documentation ici :

<https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/reference/inheritance-mapping.html#class-table-inheritance>

Attention à bien transformer les annotations de Doctrine en attributs PHP tel qu'on a fait dans la Single Table Inheritance

<br>

# 17. Fixtures pour remplir la BD

Doctrine fournit un outil qui nous permet **d'encoder de données dans la base de données d'une façon semi-automatique**, ce qui est très utile pendant les périodes de développement et de test de l'application.

Le fonctionnement est simple : **si on veut encoder de données pour une classe d'entité** existante (ex : Livres) on **demande à Doctrine de créer une class Fixture** (ex : LivresFixtures) qui contient au moins une **méthode load**. Dans cette méthode (à remplir par nous) **contiendra le code qui insère** les données dans la BD. Puis on appelle cette fonction et les données seront stockés dans la BD.

Ce système a plusieurs avantages :

-   On peut appeler la méthode génératrice autant de fois qu'on veut

-   Le code qui crée les données de la BD se trouve localisé

-   On peut générer les données pour toutes les entités du projet avec une seule commande (si on a créé la Fixture pour chaque entité, bien sûr).

Toute la documentation sur les fixtures se trouve ici :

<https://symfony.com/doc/master/bundles/DoctrineFixturesBundle/index.html>

mais on va développer un exemple simple et associé à une classe d'entité qui nous servira plus tard.

**Exemple** : Création d'une fixture pour stocker de Livres

On va créer et lancer une fixture pour l'entité **Livre** dans le projet **ProjetModelSymfony**. Suivez cette procédure :

1.  Installez le **support** pour les **fixtures**

```console
symfony composer req --dev orm-fixtures
```

2.  **Créez la classe fixture** (nom: LivreFixtures)

**Attention**: le nom du fichier doit finir par **Fixtures** ou il ne sera jamais lancée (aucune erreur sera affichée!)

```php
symfony console make:fixture
```



3.  **Editez** la function **load** pour qu'elle stocke de Livres

```php
<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Livre;

class LivreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 10; $i++) {
            $livre = new Livre();
            // si on a un hydrate, pas besoin de sets...
            $livre->setTitre("La vie de Toto Vol. " . $i);
            $livre->setIsbn("12123123123123" . $i);
            $livre->setPrix($i + 20);
            $manager->persist($livre);
        }

        $manager->flush();
    }
}

```

4. **Lancez** les fixtures

```console
symfony console doctrine:fixtures:load --append
```

**--append** permet de lancer la fixture sans effacer les données existantes dans les tableaux. Si vous l'enlevez-vous effacerez la totalité du contenu de votre BD (Symfony vous prévient quand-même)

Ici on a qu'une fixture (basée sur les Livres) mais on pourrait avoir plein.

5.  Vérifiez que les données sont insérées dans la BD

**Note**: si vous voulez générer de valeurs plus "réalistes" vous pouvez utiliser la librairie Faker (https://github.com/fakerphp/faker)

Vous avez un exemple dans **ProjetModel** (**ClientAdresseFixture.php**) où en plus on crée les liens entre deux entités.

```php
<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Client;
use App\Entity\Adresse;
use Faker;

class ClientAdresseFixture extends Fixture
{
    // on peux complexifier la création des fixtures mais on va le faire très simple ici
    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create('fr_FR');

        // créer quelques objets Adresse, stocker dans la BD
        for ($i = 0; $i < 4; $i++) {
            $adresse = new Adresse([
                'rue' => $faker->streetAddress,
                'numero' => $faker->buildingNumber,
                'codePostal' => $faker->postcode,
                'ville' => $faker->city,
                'pays' => $faker->country
            ]);
            $manager->persist($adresse);
        }
        $manager->flush();

        // obtenir les adresses et les mettre dans un array, tout dans une ligne
        // On les obtient pour pouvoir fixer le Client pour chaque Adresse
        $adresses = $manager->getRepository(Adresse::class)->findAll();
        // pour debug: dump ($adresses); // array d'objets adresses

        // créer des objet Client, leur donner une Adresse et les stocker dans la BD.
        // la clé étranger de la BD sera remplie automatiquement
        for ($i = 0; $i < 5; $i++) {
            $client = new Client([
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'email' => $faker->email
            ]);
            // choisir une adresse random
            $client->setAdresse($adresses[array_rand($adresses)]);

            // vous pouvez faire dump ici et on les verra en console
            // dump ($client);
            $manager->persist($client);
        }

        $manager->flush();
    }
}
```

<br>

## 17.1. Fixtures multi-entity et ordre d'exécution

<br>

Certains Fixtures dépendent de fois d'autres. Si vous avez, par exemple, une Fixture qui relie deux entités (ex: **LinkClientsEmprunts** qui relie les Clients et les Emprunts), vous devez remplir les entités Clients et les Prêts **avant** de lancer la fixture qui lie les deux ("LinkClientsEmprunts"). 

Nous ne pouvons pas établir l'ordre dans lequel les fixtures seront exécutées, mais 
nous pouvons spécifier qu'**une Fixture dépend d'une autre = doit attendre l'exécution d'une autre**). Nous aurons alors le même effet de séquence/ 

Vous pouvez obtenir plus d'informations à ce sujet ici:

https://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html#loading-the-fixture-files-in-order

<br>

**Exemple** : Le fixture ci-dessous sera lancée après **AeroportFixtures**.
Notez qu'on doit juste rajouter: 
- le **implements** de **DependentFixtureInterface**
- la méthode **getDependencies** où on indique la/les fixtures qui seront lancées avant

<br>

```php
<?php

namespace App\DataFixtures;

use App\Entity\Aeroport;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AeroportAutreFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $om)
    {
        $faker = Faker\Factory::create('es_ES');

        for ($i = 0; $i < 10; $i++) {
            $a1 = new Aeroport();
            $a1->setNom($faker->city);
            $a1->setCode($faker->postcode);
            $a1->setDateMiseEnService(new \DateTime());
            $om->persist($a1);
        }

        $om->flush();
    }

    public function getDependencies()
    {
        return ([
            AeroportFixtures::class, // 'App\DataFixtures\AeroportFixtures'
            // autre classe ici 
        ]);
    }
}
```

<br>




## 17.2. Fixtures dans un Many-to-Many décomposé en deux One-To-Many 

On considére ici le cas de la relation Many-To-Many **Commande<->Produit**, décomposée en  deux One-To-Many **Commande<->DetailCommande<->Produit** (exemple classique du cours d'UML)


**ProduitFixtures**
```php
<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 100; $i++) {
            $produit = new Produit();
            $produit
                ->setNom('Produit ' . $i)
                ->setDescription('la description')
                ->setPrix(mt_rand(20, 400))
                ->setLien ("p" . rand(1,3) . ".jpg");

            $manager->persist($produit);
        }
        $manager->flush();

    }
}
```


**CommandeFixtures**
```php
<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Commande;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CommandeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $commande = new Commande();
            $commande
            ->setDateCreation(new DateTime())
            ->setDateModification(new DateTime());


            $manager->persist($commande);
        }
        $manager->flush();

    }
}
```

**DetailCommandeFixtures**

```php
<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Produit;
use App\Entity\Commande;
use App\Entity\DetailCommande;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class DetailCommandeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        // on obtient tous les commandes. Pour chaque Evenement on fixera un User random
        $rep = $manager->getRepository(Commande::class);
        $commandes = $rep->findAll();

        $rep = $manager->getRepository(Produit::class);
        $produits = $rep->findAll();

        // créer des DetailsCommande
        for ($i = 0; $i < 50; $i++) {
            // affecter un commande random et un produit random
            $commandeChoisie = $commandes[rand(0, count($commandes) - 1)];
            $produitChoisi = $produits[rand(0, count($produits) - 1)];

            $detailCommande = new DetailCommande();
            $detailCommande->setProduit($produitChoisi);
            $detailCommande->setCommande($commandeChoisie);
            $detailCommande->setQuantite(rand(5, 20));
            
            $commandeChoisie->addDetail($detailCommande);
            $produitChoisi->addDetail($detailCommande);

            $manager->persist($detailCommande);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return ([
            ProduitFixtures::class,
            CommandeFixtures::class
        ]);
    }
}
```

## 17.3. Fixtures basées sur un fichier .sql

<br>

Si vous avez un fichier contenant du SQL (ex: pour insérer de données dans une BD), vous pouvez créer une fixture capable de lancer l'ensemble d'instructions SQL d'un fichier :

```php
// ProjetModelSymfony\src\DataFixtures\CustomFixtures.php
<?php
namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Finder\Finder;


// Cette fixture lancera tous les fichiers sql qui se trouvent dans DataFixtures/sql
// Utile si vous voulez lancez du SQL fixe en dehors des fixtures standards

// Pour créer les fichiers, faites export (enlevez création de tables etc... ce qui compte ce sont les inserts)
class CustomFixtures extends Fixture implements ContainerAwareInterface
{

    private $container;

    public function load(ObjectManager $om)
    {
        $finder = new Finder();

        // chercher le fichier qui contient le SQL, à nous de choisir son emplacement
        $finder->files()->in('src/DataFixtures/sql'); // si on veut charger plusieurs fichier sql
        
        $content = "" ;
        $cnx = $this->container->get("doctrine")->getConnection();
        $cnx->beginTransaction();
        
        foreach ($finder as $file){
            // lire le contenu SQL du fichier. Observez vous-même le contenu
            $content = $file->getContents();
            $cnx->setAutoCommit(false);
            $cnx->exec ($content);
  
        }
    
    }

    public function setContainer(?ContainerInterface $container = null)
    {
        $this->container = $container;
    }

}

```
<br>

## 17.4. Exclure un ou plusieurs tableaux du purge

<br>

```php
php bin/console doctrine:fixtures:load --env=dev --purge-exclusions=matable --purge-exclusions=autretable
```

Dans ce cas, matable et autretable ne seront pas purgées.


<br>



### Exercices :

1.  Créez une classe Fixture qui permette de rajouter automatiquement
    des objets d'une classe de votre choix

<br>


## 17.5. Fichier de reinitialisation de la BD et les fixtures, migration

Vous pouvez lancez un fichier migration.bat pour vous simplifier la ré-création de la BD et lancer les fixtures.
Le fichier se trouve dans le dossier de la doc, copiez-le dans la racine de votre projet.

**ATTENTION**: Ce fichier efface la BD existante!

<br>

```console
@REM @REM permet de commenter du code dans un fichier bat
@REM Supprimer les versions antérieurs de migration pour éviter les erreurs
@REM (Commande du systemene d'exploitation et non de symfony)
    echo yes | del migrations
@REM Pour créer la base de donnée cf env. pour le nom de la BD
@REM Supprime l'ancienne BD
    symfony console doctrine:database:drop --force --no-interaction
@REM Crée nouvelle BD
    symfony console doctrine:database:create --no-interaction
@REM Migration
    symfony console make:migration --no-interaction
    symfony console doctrine:migration:migrate --no-interaction
@REM supprime et recrée les données dans la DB
    symfony console doctrine:fixtures:load --no-interaction
@REM ajoute données dans la DB après donc risque doublons
    @REM symfony console doctrine:fixtures:load --append
```

<br>

# 18. Accès à la BD avec DQL

<br>

Nous avons vu comment réaliser de requêtes CRUD simples, mais dans un projet réel nous allons devoir lancer de requêtes assez plus complexes, tels que de regroupements (GROUP BY), de jointures de tableaux (JOIN) ou
même de sous-requêtes. Les find, findBy etc... ne nous suffiront pas.

Pour créer de requêtes elaborées, on peut utiliser :

1.  Du **SQL pur en PHP** (tel qu'on a fait jusqu'à maintenant)

2.  **DQL**: Doctrine Query Language, similaire à SQL mais qui traite les résultats comme des objets et des array d'objets (et pas comme des simples arrays associatifs)

3.  **QueryBuilder**: une API qui nous permet de créer la requête en
    utilisant uniquement la POO. On n'écrira pas du SQL ni DQL

Nous allons nous concentrer sur les méthodes 2 et 3. Dans cette section
concrètement on va étudier la méthode numéro 2: DQL.

**Documentation de DQL:**

<http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/dql-doctrine-query-language.html>

Tous les exemples et exercices se trouvent dans **ProjetDQLSymfony**. Créez votre propre projet et la BD (bibliothequeDQL)

**DQL traites les données obtenus de la BD comme des objets ou des arrays d'objets, pas pas comme des arrays associatifs**. Nos requêtes doivent être basées sur notre modèle de classes. Ça implique qu'on ne peut pas, par exemple, faire une jointure de deux tableaux qui n'ont pas de relation
dans le modèle de classes.

Nous pouvons réaliser des requêtes de SELECT, UPDATE et DELETE. Pour les INSERTS on doit utiliser la méthode déjà expliquée de persistance (créer l'objet, le rendre persistant et le stocker dans la BD en lançant
flush).

Passons aux exemples d'utilisation pour mieux comprendre.

## 18.1. SELECT

### 18.1.1. Requête qui renvoi un array d'arrays

```php
#[Route ("/exemples/dql/exemple/select/array/arrays")]
public function exempleSelectArrayArrays (ManagerRegistry $doctrine){
    $em = $doctrine->getManager();
    $query = $em->createQuery ("SELECT livre.titre, livre.prix FROM App\Entity\Livre livre ".
                            "WHERE livre.prix>15");
    $resultat = $query->getResult();
    $vars = ['livres'=> $resultat];
    return $this->render ("exemples_dql/exemple_select_array_arrays.html.twig", $vars);
}
```
-   "livre" est un **alias** pour la classe Livre. Toutes **les entités de cette classe qui satisfont la requête seront incluses** dans le résultat de la requête.

-  **FROM** est toujours **suivi du nom d'une entité** (pas 'tableau'!). On doit écrire le chemin complet

-   **Les expressions** telles que *livre.titre* indiquent le "chemin" qui **permet d'atteindre des objets et de propriétés** dans la requête

        Ex: livre.exemplaires, exemplaire.etat

![](./images/dql-arrayarrays.png)


### 18.1.2. Requête qui renvoi un array d'objets

```php
// SELECT des Livres complets en DQL, 
// on obtient un array d'objets! 

#[Route ("/exemples/dql/exemple/select/array/objets")]
public function exempleSelectArrayObjets (ManagerRegistry $doctrine){
    $em = $doctrine->getManager();
    // avec cette requête on obtient un array d'objets
    $query = $em->createQuery ('SELECT livre FROM App\Entity\Livre livre WHERE livre.prix >15');
    $resultat = $query->getResult();
    $vars = ['livres'=> $resultat];
    return $this->render ("exemples_dql/exemple_select_array_objets.html.twig", $vars);   
}
```

Voici un exemple de vue:

```twig

{% extends 'base.html.twig' %}

{% block title %}Hello ExemplesDqlController!{% endblock %}

{% block body %}

{# nous avons un array d'arrays, pas un array d'objets #}
{# Chaque élément est un array, pas un objet  #}
{% for livre in arrayLivresObjets %}
    <br>Titre: {{ livre.titre }} 
    <br>ISBN: {{ livre.isbn }} 

    {# on peut acceder avec get aussi #}
    <br>Titre: {{ livre.getTitre }} 
    <br>ISBN: {{ livre.getIsbn }} 
   
{% endfor %}

{% endblock %}

```

### 18.1.3. Exemples de requêtes

```sql
-- Compter le nombre d'emprunts d'un client
SELECT COUNT(e) FROM App\Entity\Emprunt e WHERE e.client = :clientId
-- Chercher les livres selon le nombre de pages
SELECT l FROM App\Entity\Livre l
            WHERE l.nombrePages BETWEEN :minPages AND :maxPages
-- Chercher les livres empruntés à une certaine date
SELECT e FROM App\Entity\Emprunt e WHERE e.dateEmprunt = :date
-- Chercher les emprunts qui ont depasé la date
SELECT e FROM App\Entity\Emprunt e
            WHERE e.dateRetourPrevu < CURRENT_DATE()
-- Tous les exemplaires d'un livre (à partir d'un titre)
SELECT e FROM App\Entity\Exemplaire e
JOIN e.livre l
WHERE l.titre = :titre






```



<br>

## 18.2. Regular Joins et Fetch Joins

Nous pouvons naviguer dans la hiérarchie d'objets de Doctrine tel qu'on l'a fait jusqu'à maintenant...

**Exemple** : obtenir un entité Livre de la BD et, une fois on l'a dans une variable, obtenir les Exemplaires de ce Livre pour après obtenir les Emprunts.

Tel qu'on a déjà vérifié, Doctrine utilise une technique qui porte le nom de **lazy-loading**. Pour résumer son fonctionnement : **si une entité** (ex. : Livre) **est associée à d'entités d'une autre classe** (ex. : Exemplaires dans Livre), **Doctrine réalisera les requêtes à la BD uniquement quand on accédera au contenu de ces dernières entités en PHP** (accéder aux exemplaires du Livre pour les afficher, par exemple).
Autrement l'objet (ou liste d'objets) contenu dans l'entité (ex. : Exemplaires dans Livre) apparaitra vide (ou contenant un id, mais jamais complet)

Ce comportement est très logique car si à chaque fois qu'on accède à une entité on doit charger toutes ses entités associés la surcharge du système peut être énorme (ex. : obtenir un Livre et devoir charger tous ses Exemplaires, Emprunts, Clients etc...)

Quand on utilise du DQL contenant de jointures nous allons avoir deux possibilités : faire la requête pour qu'elle utilise le lazy-loading ou forcer la charge des entités associées.

Voyons les deux cas de figure :

### 18.2.1. Regular Join 

Ici, la collection d'exemplaires sera vide

```php
// Regular Join
#[Route ("/exemples/dql/exemple/regular/join")]
public function exempleRegularJoin(ManagerRegistry $doctrine){
    $em = $doctrine->getManager();
    $query = $em->createQuery ('SELECT livre FROM App\Entity\Livre livre JOIN '
            . 'livre.exemplaires exemplaires');
    $resultats = $query->getResult();
    // observez que les exemplaires sont vides
    $resultat = $query->getResult();
    // observez que les exemplaires sont remplis dans le dump de la vue
    $vars = ['livres'=> $resultat];
    return $this->render ("exemples_dql/exemple_regular_join.html.twig", $vars);
    
}
```


![](./images/dql-regularjoin.png)

### 18.2.2. Fetch Join 

Ici, la collection d'Exemplaires remplie. 

```php
    // Fetch Join
    #[Route ("/exemples/dql/exemple/fetch/join")]
    public function exempleFetchJoin(ManagerRegistry $doctrine){
        $em = $doctrine->getManager();
        // On rajoute l'entité qui est en relation (exemplaires) dans le SELECT
        $query = $em->createQuery ('SELECT livre, exemplaires FROM App\Entity\Livre livre '
                . 'JOIN livre.exemplaires exemplaires');
        $resultat = $query->getResult();
        // observez que les exemplaires sont remplis dans le dump de la vue
        $vars = ['livres'=> $resultat];
        return $this->render ("exemples_dql/exemple_fetch_join.html.twig", $vars);
    }

```
![](./images/dql-fetchjoin.png)


Voici un exemple de vue : 
```twig
{% extends 'base.html.twig' %}

{% block title %}Hello ExemplesDqlController!{% endblock %}

{% block body %}

{# nous avons un array d'arrays, pas un array d'objets #}
{# Chaque élément est un array, pas un objet  #}
{% for livre in arrayLivresExemplaires %}
    <br>Titre: {{ livre.titre }} 
    <br>ISBN: {{ livre.isbn }} 
    
    {% for exemplaire in livre.exemplaires %}
        <br>id exemplaire: : {{ exemplaire.id }}
        <br>État: {{ exemplaire.etat }}
    {% endfor %}
   
{% endfor %}

{% endblock %}

```


### 18.3. Fonctions Year, Month et Day

Ces fonctions n'existent pas par défaut dans DQL. La meilleure solution est de rajouter un bundle

<https://github.com/beberlei/DoctrineExtensions>


```console
symfony composer req beberlei/DoctrineExtensions
```

Il faut rajouter les fonctions dans la config de doctrine
**config/packages/doctrine.yaml :**



```yml
    orm:
        auto_generate_proxy_classes: true
        naming_strategy: doctrine.orm.naming_strategy.underscore_number_aware
        auto_mapping: true
        mappings:
            App:
                is_bundle: false
                type: annotation
                dir: '%kernel.project_dir%/src/Entity'
                prefix: 'App\Entity'
                alias: App
        dql:
            string_functions:
                DAY: DoctrineExtensions\Query\Mysql\Day
                MONTH: DoctrineExtensions\Query\Mysql\Month
                YEAR: DoctrineExtensions\Query\Mysql\Year

```
Pour l'utiliser c'est très simple :

```php
$em->createQuery("SELECT MONTH(c.dateConcours) AS mois, 
YEAR(c.dateConcours) AS annee FROM AppEntityConcours c");
```

![](./images/dql-dates.png)


## 18.4. UPDATE

Exemple de UPDATE en DQL : réduire le prix d'un livre

```php
// UPDATE
#[Route ("/exemples/dql/exemple/update/{titre}")]
public function exempleUpdate (Request $req,ManagerRegistry $doctrine){

    $em = $doctrine->getManager();
    $titre = $req->get('titre');

    $query = $em->createQuery ('UPDATE App\Entity\Livre l SET l.prix = l.prix - :montant WHERE l.titre = :titre');

    // pour simplifier on fixe ici le montant à déduire 
    $montant = 0.5; 
    
    $query->setParameter ('montant',$montant);
    $query->setParameter ('titre',$titre);
    $query->execute(); // pas getResult!
    return $this->render ("exemples_dql/exemple_update.html.twig"); 

}
```


**Important :** Les instructions DQL UPDATE sont **portées directement dans une simple instruction UPDATE de la BD**. Ça implique que **les entités qui sont déjà chargées dans le contexte de persistance (UoW) ne seront PAS synchronisées** avec le nouvel état de la base de données mise à jour.
Dans certains cas, quand vous utilisez du DQL il est recommandé d'appeler la méthode **clear** du EntityManager pour extraire les nouvelles instances de toute entité affectée.


### Exercices DQL

En utilisant DQL :

1)  Obtenez les clients

2)  Obtenez les emprunts (isolés)

3)  Obtenez les emprunts de tous les clients (seulement le nom du client
    et les dates de retour)

4)  Obtenez l'état de tous les emprunts de tous les clients (affichez
    le nom, prénom du client ainsi que l'état de l'exemplaire)

5)  Obtenez la liste de livres empruntés par tous les clients : nom du
    client, prénom du client et titre du livre

6)  Obtenez la liste des livres empruntés par un client de votre choix :
    nom du client, prénom du client et titre du livre

7)  Obtenez la liste de livres qui coutent plus qu'une valeur reçue en
    paramètre dans l'URL

8)  Obtenez tous les livres qui contient un texte dans le titre reçu
    comme paramètre dans l'URL

9)  Obtenez tous les emprunts réalisés pendant la première quinzaine de mars de 2021 en utilisant DQL. On veut afficher le titre du livre, la date de l'emprunt et le nom et le prénom du client

10) **Exercez-vous** en réalisant toute sorte de requêtes, essayez les possibilités de Doctrine :

<https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/reference/dql-doctrine-query-language.html>

11) **Extra** : Créez de vues pour afficher convenablement tous ces résultats. Vous allez mieux comprendre coment parcourir les structures de données

<br>


# 19. Accès à la BD avec DQL en utilisant les classes Repositoires


Comme nous l'avons déjà dit dans la section "Selection", quand on crée une entité sa classe Repository est créée aussi. Cette classe contient les méthodes par défaut qu'on a déjà utilisés (find, findBy, findOneBy, etc...). On va maintenant rajouter **de méthodes faits par nous capables de réaliser de requêtes plus complexes**.

Le but est de simplifier les actions du controller qui, au lieu de devoir contenir la logique de requêtes complexes, appelleront aux actions des repositoires.

**Exemple** : Créez une méthode dans la classe Repository de Livre et l'utiliser depuis une action du controller (au lieu d'utiliser DQL depuis le controller lui-même)

1.  **Créez la méthode du repository pour nous faciliter la tâche**

```php
// DQL: obtenir les livres entre deux prix 
public function livresEntreDeuxPrixDQL($pmin, $pmax)
{
    $em = $this->getEntityManager();
    // avec cette requête on obtient un array
    $query = $em->createQuery('SELECT livre FROM App\Entity\Livre livre WHERE livre.prix >= :pmin AND ' .
        'livre.prix <= :pmax');
    $query->setParameter('pmin', $pmin);
    $query->setParameter('pmax', $pmax);
    $resultat = $query->getResult();
    // cette méthode renvoie le résultat de la requête
    return $resultat;
}
```
-   La méthode renvoie le résultat de la requête, pas de vue bien évidemment

-   **Pour obtenir l'Entity Manager dans les classes Repository** on
    utilise

    **$this->getEntityManager()**. Nous ne sommes pas dans le
    controller !



2.  **Utilisez la méthode depuis le controller**

Observez qu'il n'y a pratiquement rien à faire dans l'action...

```php
    #[Route ("/exemples/dql/repositories/utilise/repo/livres/entre/deux/prix/{prixMin}/{prixMax}")]
    function utiliseRepoLivresEntreDeuxPrix (Request $req, ManagerRegistry $doctrine){
    
        $prixMin = $req->get("prixMin");
        $prixMax = $req->get("prixMax");
        
        $em = $doctrine->getManager();
        $livresRepo = $em->getRepository(Livre::class);
        $livres = $livresRepo->livresEntreDeuxPrixDQL($prixMin, $prixMax);
        dump ($livres);
        die();
        
        // return new Response .....
    }
```

### Exercices :

1.  Créez une méthode qui utilise DQL dans la classe Repository de
    l'entité Adresse pour vous faciliter la tâche d'obtenir les
    adresses d'une certaine ville

<br><br>

# 20. Accès à la BD avec Query Builder


**Query Builder est une API qui permet de générer des requêtes de sélection complexes qui renvoient des objets** (requêtes de regroupement, jointures, sous-requêtes...) et pas juste des arrays. En fait Query Builder est un générateur de DQL pour faciliter la création de requêtes, mais DQL est préféré.

On pourra réaliser les fonctions de DQL mais en utilisant une notation complètement orientée objet (avec ses avantages et ses inconvénients)

Un Objet **QueryBuilder est accéssible depuis une classe**
**Repository**.

QueryBuilder fournit beaucoup de méthodes qu'on peut combiner selon nos besoins concrètes :

https://www.doctrine-project.org/projects/doctrine-orm/en/2.8/reference/query-builder.html


```php
<?php
class QueryBuilder
{
    // Example - $qb->select('u')
    // Example - $qb->select(array('u', 'p'))
    // Example - $qb->select($qb->expr()->select('u', 'p'))
    public function select($select = null);

    // addSelect does not override previous calls to select
    //
    // Example - $qb->select('u');
    //              ->addSelect('p.area_code');
    public function addSelect($select = null);

    // Example - $qb->delete('User', 'u')
    public function delete($delete = null, $alias = null);

    // Example - $qb->update('Group', 'g')
    public function update($update = null, $alias = null);

    // Example - $qb->set('u.firstName', $qb->expr()->literal('Arnold'))
    // Example - $qb->set('u.numChilds', 'u.numChilds + ?1')
    // Example - $qb->set('u.numChilds', $qb->expr()->sum('u.numChilds', '?1'))
    public function set($key, $value);

    // Example - $qb->from('Phonenumber', 'p')
    // Example - $qb->from('Phonenumber', 'p', 'p.id')
    public function from($from, $alias, $indexBy = null);

    // Example - $qb->join('u.Group', 'g', Expr\Join::WITH, $qb->expr()->eq('u.status_id', '?1'))
    // Example - $qb->join('u.Group', 'g', 'WITH', 'u.status = ?1')
    // Example - $qb->join('u.Group', 'g', 'WITH', 'u.status = ?1', 'g.id')
    public function join($join, $alias, $conditionType = null, $condition = null, $indexBy = null);

    // Example - $qb->innerJoin('u.Group', 'g', Expr\Join::WITH, $qb->expr()->eq('u.status_id', '?1'))
    // Example - $qb->innerJoin('u.Group', 'g', 'WITH', 'u.status = ?1')
    // Example - $qb->innerJoin('u.Group', 'g', 'WITH', 'u.status = ?1', 'g.id')
    public function innerJoin($join, $alias, $conditionType = null, $condition = null, $indexBy = null);

    // Example - $qb->leftJoin('u.Phonenumbers', 'p', Expr\Join::WITH, $qb->expr()->eq('p.area_code', 55))
    // Example - $qb->leftJoin('u.Phonenumbers', 'p', 'WITH', 'p.area_code = 55')
    // Example - $qb->leftJoin('u.Phonenumbers', 'p', 'WITH', 'p.area_code = 55', 'p.id')
    public function leftJoin($join, $alias, $conditionType = null, $condition = null, $indexBy = null);

    // NOTE: ->where() overrides all previously set conditions
    //
    // Example - $qb->where('u.firstName = ?1', $qb->expr()->eq('u.surname', '?2'))
    // Example - $qb->where($qb->expr()->andX($qb->expr()->eq('u.firstName', '?1'), $qb->expr()->eq('u.surname', '?2')))
    // Example - $qb->where('u.firstName = ?1 AND u.surname = ?2')
    public function where($where);

    // NOTE: ->andWhere() can be used directly, without any ->where() before
    //
    // Example - $qb->andWhere($qb->expr()->orX($qb->expr()->lte('u.age', 40), 'u.numChild = 0'))
    public function andWhere($where);

    // Example - $qb->orWhere($qb->expr()->between('u.id', 1, 10));
    public function orWhere($where);

    // NOTE: -> groupBy() overrides all previously set grouping conditions
    //
    // Example - $qb->groupBy('u.id')
    public function groupBy($groupBy);

    // Example - $qb->addGroupBy('g.name')
    public function addGroupBy($groupBy);

    // NOTE: -> having() overrides all previously set having conditions
    //
    // Example - $qb->having('u.salary >= ?1')
    // Example - $qb->having($qb->expr()->gte('u.salary', '?1'))
    public function having($having);

    // Example - $qb->andHaving($qb->expr()->gt($qb->expr()->count('u.numChild'), 0))
    public function andHaving($having);

    // Example - $qb->orHaving($qb->expr()->lte('g.managerLevel', '100'))
    public function orHaving($having);

    // NOTE: -> orderBy() overrides all previously set ordering conditions
    //
    // Example - $qb->orderBy('u.surname', 'DESC')
    public function orderBy($sort, $order = null);

    // Example - $qb->addOrderBy('u.firstName')
    public function addOrderBy($sort, $order = null); // Default $order = 'ASC'
}
```

La documentation de QueryBuilder se trouve ici :

[http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/query-builder.html#](http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/query-builder.html)

<https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/query-builder.html>

À continuation on va réaliser un exemple pratique, on commencera par une requête simple.

Créez un controller portant le nom **ExemplesQueryBuilderController**

**Exemple** : utiliser QueryBuilder pour construire une requête capable d'obtenir le nombre de Livres dont le prix se trouve entre un minimum et un maximum

1.  **Créez la méthode du repository** (LivreRepository.php) **capable de realiser la requête avec Query Builder**

```php
// QUERYBUILDER: obtenir les livres entre deux prix
// obtenir les livres entre deux prix, version QueryBuilder
public function getEntreDeuxPrix($min, $max)
{
    $qb = $this->createQueryBuilder("u"); // u est un nom générique
    $query = $qb->select('u')
        ->where('u.prix >= :min')
        ->andWhere('u.prix <= :max')
        ->setParameter('min', $min)
        ->setParameter('max', $max)
        ->getQuery();
    $res = $query->getResult();
    //var_dump ($res);

    return $res;
}
```

Notez que l'API nous permet de réaliser l'ensemble de la requête sans utiliser ni du SQL pur ni du DQL. Sachez quand-même que QueryBuilder utilise le langage DQL comme langage sous-jacent.

1.  **Créez une action dans le controller qu'utilise cette méthode** et envoyez la réponse au client (new Response) pour qu'il l'affiche

```php
#[Route ("/exemples/query/builder/utilise/repo/livres/entre/deux/prix/{prixMin}/{prixMax}")]
public function utiliseRepoLivresEntreDeuxPrix (Request $req, ManagerRegistry $doctrine){

    $prixMin = $req->get("prixMin");
    $prixMax = $req->get("prixMax");
    
    $em = $doctrine->getManager();
    $livresRepo = $em->getRepository(Livre::class);
    $livres = $livresRepo->livresEntreDeuxPrixDQL($prixMin, $prixMax);
    dump ($livres);
    die();
    
    // return new Response .....
}    
```


**Exemple** : obtenir un Client dont on connait l'email de la BD avec QueryBuilder

1.  Créez la méthode getByEmail dans le repositoire de l'entité Client (ClientRepository.php) :

```php
    // QUERYBUILDER: obtenir les clients par mail, version QueryBuilder
    public function getParEmail ($email){
        $qb = $this->createQueryBuilder("u");
        $query = $qb->select('u')
                    ->where ('u.email = :email')
                    ->setParameter('email', $email)
                    ->getQuery();
        $resultat = $query->getSingleResult();
        return $resultat;
    }
```


1.  **Créez une action dans le controller qu'utilise cette méthode** 

```php
#[Route ("/exemples/query/builder/trouver/client/par/mail/{email}")]
public function trouverClientParMail(Request $req, ManagerRegistry $doctrine){
    $em = $doctrine->getManager();
    $rep = $em->getRepository(Client::class);
    // on fait appel à la méthode du Repository
    $objetClient = $rep->getParEmail($req->get ("email"));
    // on affiche les données du Client, on a obtenu un objet
    dump ($objetClient);
    die ();
    // return new Response .....
}
```
**Note** : vous pouvez toujours afficher le SQL crée par queryBuilder en utilisant de méthodes de cette classe. Par exemple :

```php
dd ($repo->createQueryBuilder('g')->getQuery()->getSql())
```
ou
```php
$qb = $this->createQueryBuilder("u");
$query = $qb->select('u')
->where ('u.email = :email')
->setParameter('email', $email)
->getQuery();
dd($query->getSql());
```

<br>



# 21. Formulaires en Symfony

Un formulaire est un ensemble d'éléments HTML dont leur contenu est envoyé au serveur (**action**) en exécutant un **submit**. Les infos sont traitées par un serveur. Le serveur reçoit une requête **POST** ou **GET** qui contient les contenus des éléments du formulaire. En PHP, ces contenus sont accessibles à partir de la variable $_POST ou $_GET.

En Symfony nous avons plusieurs options pour créer un formulaire :

1.  Créer tout simplement un **formulaire HTML indépendant** et obtenir les données dans une action du controller avec l'objet Request

2.  Créer **un formulaire qui est associé à une entité** du modèle. Quand on fait submit on obtient une entité dans le controller.
   
**Exemple :** Si on crée un formulaire pour insérer un Client, le controller recevra un objet Client (pas besoin de chipoter dans l'array $_POST). Puis on peut, par exemple, le stocker dans la BD (obtenir **Entity Manager** + **persist** + **flush** et voilà!)

3. Créer **un formulaire qui est associé à une entité du modèle mais auquel on rajoute/efface certains champs**. Les champs manquants de l'entité auront la valeur null. Si le formulaire a de champs en trop, on pourra traiter ces infos de façon indépendante à la classe (avec **getData**, on verra plus tard). 

**Exemple**: on crée un formulaire pour insérer un Client et on rajoute un champ "Je suis d'accord avec les conditions du site". 

<br>

## 21.1. Création d'un formulaire indépendant

On commence par l'exemple le plus simple: un form qui n'a rien à voir avec aucune entité de l'app.

Vous pouvez créer un formulaire en HTML dans votre **twig** sans aucun problème. 

Pour obtenir les données du formulaire dans une action vous allez utiliser l'objet **Request** (pareil que quand on obtient les paramètres d'URL).

La seule différence est que le lien pour l'action doit pointer vers une action d'un controller (en utilisant **path**)

<https://symfony.com/doc/current/components/http_foundation.html#accessing-request-data>

Les exemples se trouveront dans  le projet **ProjetFormulairesSymfony**, controller **ExemplesFormulaireController** (La bd sera **formulairesbd**).

Voici un exemple. 

1. **Créez le form dans le twig** :
   
```html
<form action="{{ path('traitement_form_simple_post') }}" method="POST">
    Nom:<input type="text" name="nom">
    Age:<input type="number" name="age">   
    <button type="submit">Envoyer POST</button> 
</form>
```
Vous devez juste générer le chemin de l'action qui reçoit le formulaire en utilisant **path** avec le **name** de l'action.

2. **Obtenez les valeurs dans l'action** avec:
   
a) $req->**request->get('nom')** (si le form est **POST**)<br>
b) $req->**query->get('nom')** (si le form était **GET**)

Notez que le **name** de l'action est le *action* du Formulaire

```php
#[Route("/exemples/formulaires/exemple/independent/traitement/post", name: "traitement_form_simple_post")]
public function exempleIndependentTraitementPost(Request $req)
{
    // cette action traite un formulaire traditionnel POST et affiche le contenu dans une vue
    // On obtient l'objet Request
    // "request" contient le contenu du $_POST

    $nom = $req->request->get('nom'); // pas $req['nom'] ni $req->request['nom']
    $age = $req->request->get('age'); // pas $req['age'] ni $req->request['age']


    return $this->render(
        "/exemples_formulaires/exemple_independent_traitement_post.html.twig",
        [
            'nom' => $nom,
            'age' => $age
        ]
    );
}
```

**Note**: pensez à **get** comme "obtenir" , rien à voir avec $_GET ou $_POST!

Vous avez un autre exemple pour un formulaire GET juste après dans le même controller.

<br>

**Exercice**:

1. Créez un form HTML (POST) indépendant contenant deux champs texte et une liste de choix. Créez une action et une vue pour traiter les infos reçues du form et les afficher
   
<br>


## 21.2. Création d'un formulaire associé à une entité

<br>

Si vous voulez qu'un formulaire soit lié à une entité vous devez créer **une classe qui represente ce formulaire**.

Cela nous permettra, quand on fera submit, **d'obtenir directement une entité de la classe associée dans le controller**.

**Exemple** : un formulaire Evenement (*nom, description, dateEvenement*) associé à la classe *Evenement* est envoyé depuis la vue. Grâce au fait d'être associé à une classe, nous recevrons un objet dans le sans passer par **query** ni **request**. Cet objet peut, par exemple, être stocké dans la BD d'une façon immediate (**persist + flush**)

Nous allons faire un exemple, préparons le contexte :

Créez d'abord un **nouveau projet** (ex : **ProjetFormulairesSymfony**) contenant un controller (ex : **FormulairesController**). Créez une entité *Aeroport* (*nom, code, dateMiseEnService, heureMiseEnService, description*). Rajoutez un hydrate et modifiez le constructeur. et créez la BD (ex: **formulairesbd**). Faites la migration. 

Importez **Faker** dans le projet. 

```php
composer require fakerphp/faker
```

Créez et lancez une fixture **AeroportFixture** pour avoir quelques données 
Si vous n'avez pas encore installé le module de fixtures, tapez : 

```php
symfony composer req --dev orm-fixtures
```


```php
<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Aeroport;

class AeroportFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {
            $aeroport = new Aeroport(
                ['nom'=>$faker->city . " Airport",
                'code'=>$faker->postcode,
                'dateMiseEnService'=>$faker->dateTime,
                'heureMiseEnService'=>$faker->dateTime,
                'description'=>$faker->realText
                ]);
            
            $manager->persist($aeroport);
        }
        $manager->flush();
    }
}

```

**Exemple** : création d'une classe de formulaire associé à une entité (*Aeroport*). Pour le moment le but est juste de générer le formulaire, pas de traiter les données qui seront envoyées.

On va créer un formulaire pour l'entité Aeroport qui contiendra deux champs de texte (*nom* et *code*). Le bouton de **submit** sera rajouté plus tard (bonnes pratiques).

1.  Rajoutez les **classes** de Symfony qui gèrent les **formulaires** (création, validation, etc...) **dans le projet** (cette action doit se faire une seule fois para projet, tel qu'avec les autres packages)

```console
    symfony composer req symfony/form
```

2.  **Créez le dossier src/Form et un fichier qui contiendra la classe qui définira le formulaire** (pour l'entité Aeroport on crée le fichier Aeroport**Type**.php)

Cette définition est une classe, une représentation abstraite de notre formulaire, mais il n'y a pas du HTML à l'intérieur.

Voici le code :

```php
<?php
namespace App\Form;

use App\Entity\Aeroport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// tous les types qu'on va utiliser
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AeroportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('code', TextType::class)
            ->add('dateMiseEnService', DateType::class)
            ->add('heureMiseEnService',TimeType::class)
            ->add('description',TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Aeroport::class,
        ]);
    }
}
```

**Note**: vou pouvez créer la structure de base d'un form avec un assistant, mais c'est assez rudimentaire.

```console
symfony console make:form
```
L'assistant vous demandera le nom pour le formulaire (doit finir par Type, ex: CoursType) ainsi que la classe sur laquelle le formulaire est basé (ex: Cours).

Une fois le form sera crée vous allez devoir rajouter les types.



La classe qui représente le formulaire doit hériter de **AbstractType**, et posséder une méthode **buildForm** qui est en charge de générer l'objet formulaire. 

Cette méthode reçoit un objet qui implémente la classe **FormBuilderInterface** (il est injecté par Symfony, nous ne créons pas cet objet par nous-mêmes), en plus d'un array d'options qui nous permettrait de personnaliser le formulaire.

Utilisez la méthode **add** de cet objet pour rajouter les champs du formulaire: vous devez, pour chaque champ, indiquer le **name** (premier paramètre) ainsi que le **type**. Symfony possède un vaste nombre de types déjà définis qui correspondent aux type HTML, mais on peut en plus définir nos propres types pour atteindre un niveau de complexité assez élevé.

Voici la liste de types inclus dans Symfony :

<https://symfony.com/doc/current/reference/forms/types.html>

Étudiez par vous-mêmes les types et son fonctionnement, dans ce cours c'est impossible de tous les montrer vu le temps dont on dispose.

3.  **Dans une nouvelle action, créez une instance du formulaire** en utilisant la méthode **createForm** du controller.

Dans cette action on utilisera la méthode **createForm** pour créer une instance du formulaire (on indique le type qu'on vient de définir).

Puis on utilise la méthode **createView** pour générer le code HTML à partir de l'objet formulaire, qui sera envoyé à la vue. Voici le code :

```php
    #[Route("/exemples/formulaires/exemple/aeroport")]
    public function exempleAeroport()
    {
        // on crée le formulaire du type souhaité
        $formulaireAeroport = $this->createForm(AeroportType::class);

        // on envoie un objet FormView à la vue pour qu'elle puisse 
        // faire le rendu, pas le formulaire en soi
        $vars = ['unFormulaire' => $formulaireAeroport];

        return $this->render('/exemples_formulaires/exemple_aeroport.html.twig', $vars);
    }
```




4.  **Créez la vue et appelez la fonction** **form** **de twig** en lui envoyant l'objet **FormView** qu'on vient de recevoir du controller.

Il y a plusieurs manières de rendre le formulaire :

<https://symfony.com/doc/current/forms.html#rendering-the-form>

On peut rendre le formulaire complète ou morceaux, en utilisant un thème (Bootstrap, Foundation, etc...) ou pas, mais on fera ça plus tard en utilisant Encore (un module qui simplifie enormement l'inclusion de Webpack)

```twig
{{ form_start (unFormulaire) }}
{{ form_widget (unFormulaire) }}
{{ form_end (unFormulaire)}}
```

**form_start** et **form_end** générent les **balises** du début et fin du formulaire et **form_widget (nomFormulaire)** génère tous les contrôles d'un coup.


Vous pouvez générer chaque contrôle de façon indépendante. Vous avez deux options: **form_widget** (contrôle sans etiquettes) et **form_row** (avec etiquettes).

Exemples:



```twig
    {{ form_start(unFormulaire) }}
        {{ form_widget(unFormulaire.code) }}
        {{ form_widget(unFormulaire.nom}) }}
    {{ form_end(unFormulaire, {render_rest: false}) }}
```

```twig
    {{ form_start(unFormulaire) }}
        {{ form_row(unFormulaire.code) }}
        {{ form_row(unFormulaire.nom}) }}
    {{ form_end(unFormulaire, {render_rest: false}) }}
```





Il nous manque le **submit**, on le verra dans les sections suivantes.

Nous n'allons pas rajouter un bouton de submit **dans la classe** du
formulaire **car ce n'est pas une bonne pratique.**

### Exercice : création d'un formulaire associé à une entité

1. Créez une entité *Evenement* (nom, description, dateEvenement) et un formulaire associé. Testez-le avec une action et une vue.

   

<br>

## 21.3. Création d'un formulaire pré-rempli avec les données d'une entité

<br>

Vous pouvez créer un formulaire pré-rempli avec les données d'une entité très facilement. Pour ce faire, il suffit de créer l'entité avant et l'envoyer comme deuxième paramètre à la méthode **createForm**. 

Ceci est utile quand on veut, par exemple, mettre à jour les données d'une entité sans devoir réécrire toutes les infos.

Voici un exemple isolé mais qui montre le mode de fonctionnement si vous en avez besoin :

```php
#[Route("/exemples/formulaires/exemple/aeroport/rempli")]
public function exempleAeroportRempli()
{
    $unAeroport = new Aeroport();
    $unAeroport->setNom("Sevilla Santa Justa");
    $unAeroport->setCode("SVQ");
    $unAeroport->setDescription ("Il fait toujours beau là bas");
    // etc....

    // on crée le formulaire du type souhaité
    // et on envoie l'entité remplie
    $formulaireAeroport = $this->createForm(AeroportType::class, $unAeroport);

    // on envoie un objet FormView à la vue pour qu'elle puisse 
    // faire le rendu, pas le formulaire en soi
    $vars = ['unFormulaire' => $formulaireAeroport];

    return $this->render('/exemples_formulaires/exemple_aeroport.html.twig', $vars);
}
```

<br>

## 21.4. Action et Propriétés des champs du formulaire

<br>

Chaque type de données correspond à une classe qui hérite de la classe **FormType**. Chaque champ d'un formulaire à un **objet (widget) associé qui générera son code HTML (selon son type).** 

Chaque champ a **un ensemble de propriétés HTML héritées de ses parents** (ex: "label" ou "placeholder") **ainsi qu'un ensemble d'options propres au type** (ex: "preferred_choices* pour le type *LanguageType*).

<br>

**Exemple** : rajout des options dans les champs du formulaire 

On va s'entrainer en créant un formulaire plus personnalisé que le précédent, cette fois pour l'entité *Livre*. Rajoutez au **ProjetFormulairesSymfony** toutes les entités de *ProjetModelSymfony*. Dans l'entité Livre, rajoutez **nombrePages**, **langue** et **format** (eBook, papier). 

    Note : vous pourriez copier juste quelques entités, mais faites attention aux relations avecs le autres entités (si on a une rélation avec une entité qui n'existe pas on aura, bien évidemment, une erreur). 


Faites la migration.


**1.** **Créez un formulaire** (LivreType) basé sur Livre (prenez comme exemple celui de l'entité Aeroport) et **rajoutez les types pour chaque champ**. 

Toutes les informations nécessaires sur les types se trouvent ici :

<https://symfony.com/doc/current/reference/forms/types.html>


Avant de créer une action pour générer ce formulaire on va rajouter la méthode et l'action dans la section suivante.

**2.** **Définition pour la méthode et l'action**

Pour le moment on va rajouter un bouton d'action même si **on fera le traitement uniquement dans la section suivante**

On **doit spécifier l'action à réaliser par le submit** (même avant créer le bouton) ainsi que la méthode (GET ou POST). Nous avons **trois possibilités** (vous pourriez être confronté à n'importe lequel d'entre eux) :

**a)**  L'action est définie **dans la classe du formulaire** (LivreType.php). C'est facile et a l'air cohérent mais **on ne pourra utiliser le formulaire pour exécuter d'autres actions !** C'est une **mauvaise pratique en génèral**, on préfère la méthode **b)** ou la **c)**

```php
.
.
.
->add ('format', ChoiceType::class, [
                        'choices' => [
                            'eBook' => 'ebook',
                            'papier' => 'papier'
                        ],
                        // les combinaisons de ces paramètres détermineront le type de
                        // liste de choix : liste, liste déroulante, checkbox ou
                        // radiobuttons
                        'expanded' => false,
                        'multiple' => false
                ])
->setMethod('POST')
->setAction('traitementFormulaireLivre');

}
```

<br>

**b)**  **L'action et la méthode sont definies dans le controller** lors de la création de l'objet formulaire avec les options de **createForm**. Cette option est **plus souple** car elle nous permet de réutiliser le formulaire pour lancer d'autres actions :

**Dans la classe du formulaire il n'y a pas d'action ni de méthode, tout les deux sont definis dans le controller ou la vue:**, car autrement le formulaire serait utilisable uniquement pour lancer une certaine action!

Voici un exemple de définition d'action et de méthode.

```php
#[Route("/insert/livre")]
public function insertLivre()
{
    $livre = new Livre();
    $formulaireLivre = $this->createForm(LivreType::class, $livre, array(
        'action' => $this->generateUrl("traitement_insert_livre"), 
        // name de la route
        // si on n'utilise pas le name d'une route on doit l'écrire à la main... mauvaise idée
        // 'action' => "/exemples/formulaires/livre/rajouter", 
        'method' => 'POST'
    ));
    $vars = ['unFormulaire' => $formulaireLivre->createView()];


    return $this->render('/exemples_formulaires/insert_livre.html.twig', $vars);
}
```

Nous utiliserons un array de paramètres et la méthode **generateUrl** pour générer le code HTML qui correspond à une route qui porte un "name". Si la route n'a pas de "name" on peut juste mettre un path, mais c'est moins souple car la modification d'un path dans le routing impliquera modifier une par une toutes les appels à cette action.

<br>

**c)** **L'action et la méthode sont definies dans la vue**

Nous pouvons définir l'action et la méthode dans la vue :

```twig
{{ form_start(formulaireLivre, {'action': path('rajouter_livre'), 'method': 'POST'}) }}
{{ form_widget (formulaireLivre) }}
{{ form_end (formulaireLivre) }}
```

<br>

### 21.4.1. Les boutons... où les mettre?

<br>

Si on veut réutiliser un même formulaire pour réaliser plusieurs actions (ex : mettre à jour un livre ou rajouter un livre) **on peut créer les boutons dans la vue où on génère le form**. 

On ne doit pas non plus rajouter le bouton dans le controller car on serait en train de mélanger présentation (ex : la classe du bouton) avec la logique (on casse le principe de **separation of concerns**!).

La **meilleure option est de créer le bouton de submit en HTML dans la vue**. Voici un exemple :

```php
{{ form_start (formulaireLivre) }}
{{ form_widget (formulaireLivre) }}
<input type="submit" class="btn" value="Envoyer" />
{{ form_end (formulaireLivre) }}
```

Cette méthode nous permet de re-utiliser le formulaire pour plein d'actions dans plein de vues, on devra juste créer les boutons dans chaque vue.

### Exercice : 

1. Créez une entité *Personnage* (*nom, prenom, dateNaissance*). Créez un formulaire associé à cette entité et un form. Créez un template contenant un bouton *Enregistrer* 

2. Rajouter un bouton *Envoyer* pour le formulaire de l'Aeroport

<br>

## 21.5. Rendu du formulaire dans la vue

<br>


Au moment de générer un formulaire dans un fichier twig on peut utiliser:


```twig
{{ form (nomDuFormulaire) }}
```

Ceci fera le reundu de la totalité du formulaire en utilisant une seule ligne de code. Mais on peut
avoir plus de contrôle sur la génération du formulaire en utilisant les méthodes: 

**form_widget (formulaire.nomChamp)** : génère un champ sans libellé
**form_row (formulaire.nomChamp)** : génère un champ et le libellé

Voir en détail ici: 

https://symfony.com/doc/current/form/form_customization.html

Avant de générer les champs du formulaire on doit rendre la balise de début du formulaire (y inclus l'action et le méthod):

```twig
{{ form_start (nomDuFormulaire) }}
```

    Note: form_start crée aussi l'attribut enctype correct lors de l'utilisation des téléchargements de fichiers.

Puis on peut commencer à générer des champs : 

```twig
{{ form_widget (nomDuFormulaire.nomChamp1) }}
{{ form_widget (nomDuFormulaire.nomChamp2) }}
.
.
```

ou

```twig
{{ form_row (nomDuFormulaire.nomChamp1) }}
{{ form_row (nomDuFormulaire.nomChamp2) }}
.
.
```

Puis on utilise form_end (formulaire) pour rendre l'étiquette de fin du formulaire et tous les champs qui n'ont pas encore été rendus, dans le cas où vous avez rendu chaque champ vous-même. Ceci est utile pour ne pas devoir rendre à la main les champs cachés.


```twig
{{ form_end (nomDuFormulaire) }}
```

<br>

**Exemple :**

```twig
{{ form_start (formulaireAeroport) }}
{{ form_widget (formulaireAeroport.nom) }}
{{ form_widget (formulaireAeroport.description) }}
{{ form_end (formulaireAeroport) }}
```

**Si vous ne voulez pas afficher un champ d'un formulaire, c'est très simple** : effacez la ligne **form_widget** qui correspond à ce champ. Le controller recevra alors une valeur **null** pour ce champ de l'entité associée. 

Par défaut Symfony rend les champs qui ne sont pas spécifies Pour **éviter le rendu automatique du reste de champs il faut rajouter**

```twig
{{ form_end(nomDuFormulaire, {'render_rest': false}) }}
```

avant form_end.

**ATTENTION**: si vous générez un formulaire qui contient un token (CSRF) de façon partielle (ex: les formulaires de **login**), vous êtes obligés de générer le champ pour ce token. Voici un exemple:


```twig
{{ form_start (formLogin) }}
{{ form_row (formLogin.email) }}
{{ form_row (formLogin.password) }}
{{ form_row (formLogin._token) }}
{{ form_end (formLogin) }}
```



<br>

## 21.6. Résumé de la création et personnalisation de base d'un formulaire

<br>

Pour créer un formulaire et le traiter :

1.  Créez le **squelette** du formulaire (la **classe 'Type'**)

2.  Dans cette classe, **rajoutez les champs ("widgets") et leurs types** selon vos besoins (TextType, ChoiceType, etc...). Personnalisez le widget avec des **propriétés** (taille, required, etc...)

3.  **Rajoutez les boutons de submit dans la vue qui affiche ce formulaire**

4.  **Définissez le nom de l'action qui affichera et traitera ce formulaire, ainsi que la méthode (GET, POST)** dans le controller

5.  Créez une **action qui génère et traite le formulaire**

C'est tout!!! Maintenant qu'on sait créer un formulaire on peut **apprendre à les traiter!**. 

<br>

## 21.7. Traitement des données du formulaire 

<br>

Pour **recevoir et traiter** les données introduites dans un formulaire nous devons créer une action dans un controller. L'action traitera la requête (reçoit un objet **Request**).

Pour le moment on a fait des forms et on les a affiché, mais on ne s'est pas occupé de traiter les données quand on fait submit.
On pourrait créer alors une action pour afficher le form et une autre pour traiter les données, mais ça complexifierait le controller (trop d'actions!)

Selon **les bonnes pratiques de Symfony**, **on affiche le form et on le traite dans une même action**.

**Exemple** : Rendu et réception d'un formulaire (classe *Livre*) dans une seule action

Ce code peut paraitre compliqué mais ce ne l'est pas. 

```php
<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\LivreType;

// entité Livre
use App\Repository\LivreRepository;
use Doctrine\Persistence\ManagerRegistry;
// classe du formulaire
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ExemplesFormulairesTraitementController extends AbstractController
{

    // dans la même action on réalise le rendu et la réception 
    #[Route("/exemples/formulaires/traitement/exemple/livre", name: "exemple_livre")]

    // dans la même action on réalise le rendu et la réception 
    public function exempleLivre(Request $req)
    {
        // 1. Création d'une entité vide
        $livre = new Livre();

        // 2. Création du formulaire du type souhaité (pas 'affichage'!)
        // pour héberger les données de l'entité
        $formulaireLivre = $this->createForm(
            LivreType::class,
            $livre
            // on n'a pas besoin d'action ni de méthode ici: si un form n'a pas d'action on fait appel à la même action
            // ,
            // [
            //     'action' => $this->generateUrl("exemple_livre"),
            //     'method' => 'POST'
            // ]
        );


        // 3. Analyse de l'objet Request du navigateur, remplissage de l'entité
        // Ici, les données de l'entité seront remplies par handleRequest
        $formulaireLivre->handleRequest($req);

        // 4. Vérification: handleRequest indique qu'on vient d'un submit ou pas? Si on vient d'un submit, handleRequest remplira les données de l'entité avec les données du $_POST (ou $_GET, selon le type de form). Cet état sera enregistré dans l'objet formulaire, et isSubmitted renverra TRUE

        // si submit et données valides, on entre dans l'if. Les données sont toujours valides si on n'a pas mis des regles de validation (notre cas)
        if ($formulaireLivre->isSubmitted() && $formulaireLivre->isValid()) {

            // on peut toujours accéder aux données du form à la main
            // (utile quand le form contient plus ou moins de champs que l'entité)
            // $data = $formulaireLivre->getData(); 

            // Rendu d'une vue où on affiche les données
            // Normalement on fera CRUD ici, ou une autre opération...

            return $this->render(
                '/exemples_formulaires_traitement/traitement_formulaire_livre.html.twig',
                ['livre' => $livre]
            );
        }
        // si non, on doit juste faire le rendu du formulaire
        else {
            return $this->render(
                '/exemples_formulaires_traitement/affichage_formulaire_livre.html.twig',
                ['formulaireLivre' => $formulaireLivre]
            );
        }
    }
}

```

Pour comprendre l'action on doit savoir qu'**elle peut être  appelée dans deux cas de figure** :

a)  Une première fois, **quand on tape l'action dans l'URL ou on redirige vers cette action**. Dans ce cas, le formulaire doit être **rendu (affiché dans la vue)**. Il n'est pas traité!

ou

b)  quand on **cique sur un bouton submit** et on doit traiter le contenu reçu 

Dans les **deux cas de figure on crée une entité vide et un objet formulaire**. Mais dans le deuxième cas, l'entité sera remplie avec les données du form.

Pour savoir si on se trouve dans le cas a) ou b) à l'interieur de l'action on doit **vérifier l'objet Request**. 

Dans le cas a) l'objet sera vide car on n'a pas fait submit et dans le cas b) l'objet Request contiendra les données du formulaire. On devra remplir l'entité vide pour, par exemple, faire un CRUD

Pour analyser l'objet Request on utilisera la méthode **handleRequest**, auquel on envoie l'objet Request injecté dans l'action. Les méthodes **isSubmitted** et **isValid** nous indiquerons si le formulaire a été **submitted** (on a cliqué sur le bouton) et si les données du formulaire sont valides (en principe on recevra toujours **true** car on n'a fait aucune règle de validation).

Normalement on aura au moins **deux templates** : un pour afficher le  formulaire et l'autre pour afficher le résultat du traitement du formulaire.

Voici le code qui implémente ce qu'on vient de décrire : le controller, les templates et la classe du formulaire.

-  **Controller :**

L'action ci-dessus

-  **Templates** (un pour afficher le formulaire et l'autre pour
    afficher le résultat du traitement)

```twig
{# affichage_formulaire_livre.html.twig #}
{{ form_start (formulaireLivre) }}
{{ form_widget (formulaireLivre) }}
<input type="submit" class="btn" value="Envoyer" />
{{ form_end (formulaireLivre) }}
```

```twig
{# traitement_formulaire_livre.html.twig #}
{{ dump (livre) }}
```


Voici la **Classe du formulaire**

```php
<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class LivreType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('isbn', TextType::class)
                ->add('titre', TextareaType::class)
                ->add('prix', MoneyType::class)
                ->add('description', TextareaType::class)
                ->add('datePublication', DateType::class,[
                        'label' => 'Date de publication'
                ])
                ->add('nombrePages', IntegerType::class, [
                        'label' => 'Nombre de pages',
                        'required' => false
                ])
                ->add('langue', LanguageType::class, [
                        'label' => 'Langue du livre',
                        'preferred_choices' => ['es','fr','it']
                ])
                ->add ('format', ChoiceType::class, [
                        'choices' => [
                            'eBook' => 'ebook',
                            'papier' => 'papier'
                        ],
                        // les combinaisons de ces paramètres détermineront le type de
                        // liste de choix : liste, liste déroulante, checkbox ou
                        // radiobuttons
                        'expanded' => false,
                        'multiple' => false
                ]);
    }
}
```


**Résumé : Traitement de données d'un formulaire dans une action d'un controller**

Pas a réaliser dans l'action de création/traitement :

1.  Créer une **entité vide**

2.  Créer **une instance du formulaire**

3.  Faire appel à **handleRequest pour traiter l'objet Request** **et  voir si on a fait submit** du Form. HandleRequest fait appel au submit. **Si on a fait submit (isSubmitted=true)**. 

4. Si on vient ou pas d'un submit et si le form est Valid (explication plus bas) l'entité « data » qu'on envoie dans la création du formulaire sera remplie avec les données du form**. 
 
**isValid:** : un formulaire isValid s'il repecte le règles de validation qu'on peut définir dans le FormType (ex: année entre 1950 et 2100, nom de moins de 40 caractères etc...) 
 
On'a pas défini des régles pour la validation de données (ex: un champ string qui doit être dans un certain format ou un chiffre qui doit se trouver entre deux valeurs). Actuellement nos forms sont tojours Valid.

La validation des formulaires est traitée dans ce chapitre de la documentation de Symfony (on ne la traite pas tout de suite dans ce syllabus):

https://symfony.com/doc/current/validation.html
   
Dans le controller, on peut aussi obtenir les données du form 'à la main' avec **getData**, au lieu d'utiliser l'entité remplie. C'est indispensable quand on **on a des champs dans le formulaire qui n'existent pas dans l'entité**, ou pour traiter des champs de certains types particuliers.


**Exemple** : formulaire pour *Aeroport* (nom, code) qui contient aussi un champ « description » qui **n'appartient pas à l'entité** *Aeroport*. Pour obtenir les données de la description dans le traitement du formulaire on utilise *getData* :

```php
$form->get('description')->getData();
```

Pour le reste on utilise l'entité Aeroport ($aeroport) qui sera remplie automatiquement dans le submit.

Une fois l'entité a été créé à partir des données on peut faire
n'importe quelle action (CRUD ou une autre).

Si on arrive à l'action sans avoir fait un submit (exemple : tapez l'URL de l'action dans le navigateur) ou les données ne sont pas valides (isSubmitted ou isValid renvoient faux), on doit juste envoyer le formulaire à la vue pour réaliser le rendu.
<br>

Voici un exemple de la même action avec un CRUD :
```php
// cette action sert à afficher et traiter un formulaire pour rajouter un Livre dans la BD
#[Route('rajouter/livre', name: 'rajouter_livre')]
public function rajouterLivre(Request $req, ManagerRegistry $doctrine)
{
    $livre = new Livre();

    $formLivre = $this->createForm(
        LivreType::class,
        $livre,
        [
            'method' => 'POST',
            'action' => $this->generateUrl('rajouter_livre')
        ]
    );

    $formLivre->handleRequest($req);

    if ($formLivre->isSubmitted()) {
        // on reçoit les données, on les stocke dans la BD
        $em = $doctrine->getManager();
        $em->persist($livre);
        $em->flush();
        return $this->render('exemples_formulaire/resultat_traitement_form_rajouter_livre.html.twig');
    } else {
        $vars = ['formLivre' => $formLivre];
        return $this->render('exemples_formulaire/afficher_form_rajouter_livre.html.twig', $vars);
    }
}

```



### Exercice : 

1. Créez un formulaire pour stocker un aeroport

2. Créez une entité *Client* (probablement elle existe déjà dans votre projet). Créez un formulaire et testez-le avec une action et une vue.

<br>


## 21.8. Exemple de traitement avec CRUD - UPDATE

<br>

Nous avons une action qui génère une liste de Livres. Quand on clique sur un Livre on verra les détails du Livre sous la forme d'un form. On peut éditer le form et les données seront stockées.

1. D'abord on fait l'action qui affiche tous les livres:

**Important:** Notez qu'on injecte un repo, pour simplifier son obtention

```php
class ExemplesFormCrudUpdateController extends AbstractController
{
    #[Route('/liste/livres', name: 'liste_livres')]
    public function listeLivres(LivreRepository $rep): Response
    {
        $livres = $rep->findAll();
        $vars = ['livres' => $livres];
        return $this->render('exemples_form_crud_update/liste_livres.html.twig', $vars);
    }
}
```
 et sa vue:

 ```twig
{% extends 'base.html.twig' %}

{% block title %}Hello ExemplesFormCRUDUpdateController!{% endblock %}

{% block body %}

<h1>Liste Livres</h1>
{% for livre in livres %}
    <br>{{ livre.titre}}
    <br>{{ livre.prix }}
    {# etc... #}
    
    {# lien pour l'update #}
    <br><a href ="{{ path ('livre_update', { id: livre.id } )}}">Update</a>
{% endfor %}

{% endblock %}
 ```


2. Puis on crée l'actioon pour faire l'update

**IMPORTANT**: Notez qu'on injecte un Livre 
```php
    #[Route('/livre/update/{id}', name: 'livre_update')]
    public function listeUpdate(Livre $livre, ManagerRegistry $doctrine, Request $req): Response
    {
        // il suffit d'envoyer l'id dans l'URL
        // Symfony (EntityValueResolver) cherche par défaute un objet contenant l'id de l'URL (il fait un find pour nous)

        // $livre = new Livre(); cette fois notre entité n'est pas vide. On la reçcoit pour pré-remplir le form

        // 2. Création du formulaire du type souhaité (pas 'affichage'!)
        // pour héberger les données de l'entité
        $formulaireLivre = $this->createForm(
            LivreType::class,
            $livre // voici le pré-remplissage
        );

        // 3. Analyse de l'objet Request du navigateur, remplissage de l'entité
        $formulaireLivre->handleRequest($req);

        // 4. Vérification: handleRequest indique qu'on vient d'un submit ou pas? Si on vient d'un submit, handleRequest remplira les données de l'entité avec les données du $_POST (ou $_GET, selon le type de form). Cet état sera enregistré dans l'objet formulaire, et isSubmitted renverra TRUE

        // si submit et données valides, on entre dans l'if. Les données sont toujours valides si on n'a pas mis des regles de validation (notre cas)
        if ($formulaireLivre->isSubmitted() && $formulaireLivre->isValid()) {
            // on peut toujours accéder aux données du form à la main
            // (utile quand le form contient plus ou moins de champs que l'entité)
            // $data = $formulaireLivre->getData(); 

            // On va faire un CRUD pour mettre à jour l'entité, puis une rédirection à la liste de Livres
            $em = $doctrine->getManager();
            $em->persist($livre);
            $em->flush();

            return $this->redirectToRoute('liste_livres');


            // return $this->render(
            //     '/exemples_formulaires_traitement/traitement_formulaire_livre.html.twig',
            //     ['livre' => $livre]
            // );
        }
        // si votre formulaire n'est pas correct, vous n'entrerez pas dans l'if précédent
        // afficher les possibles erreurs en utilisant dd ($form->getErrors())

        // si non, on doit juste faire le rendu du formulaire
        else {
            return $this->render(
                '/exemples_formulaires_traitement/affichage_formulaire_livre.html.twig',
                ['formulaireLivre' => $formulaireLivre]
            );
        }
    }

```







<br>

## 21.9. Bonnes pratiques pour créer de formulaires en Symfony

<br>

Dans cette section on parle des bonnes pratiques pour créer des formulaires:

1.  **Ne rajoutez de boutons aux formulaires dans les classes des
    formulaires ni dans les controllers**, mais dans les templates.

**Exemple** : Si vous créez un formulaire pour insérer un client dans la BD et vous créez un bouton "insérer" dans la classe du formulaire, ce formulaire ne pourra plus être utilisé pour par exemple mettre à jour le client... bien qu'il s'agit du même formulaire pour les deux actions ! Rajouter les boutons dans les controllers est aussi une mauvaise idée car vous allez mélanger logique et présentation ("vues"). Il nous reste alors que les rajouter dans les fichiers twigs (en HTML)

2.  Essayez d'utiliser **une seule action pour créer le formulaire et le traiter**, spécialement si cette action n'est pas complexe. Dans certains cas il peut arriver que l'on veuille se séparer en deux actions.


3.  Pour définir **l'action et la méthode**, vous pouvez:

a) Les définir dans le controller (exemples précédentes)
```php
    $formulaireLivre = $this->createForm (LivreType::class, $livre,
            ['action'=> $this->generateUrl ("rajouter_livre"),
                'method'=>'POST']);
```

b) Les définir dans le twig dans **form_start** 

```twig
{{ form_start(form, {'action': path('rajouter_livre'),'method': 'POST'})}}
```

**Attention :** Dans le **path** on doit indiquer le **name** d'une route

<br>


## 21.10. Style de base pour les formulaires (opt - on va utiliser Webpack)

Vous pouvez appliquer du style aux formulaires en utilisant du CSS. Symfony inclut plusieurs templates. Plus d'information ici :

<https://symfony.com/doc/current/form/form_themes.html#symfony-builtin-forms>

et plus concretement ici (même page):

https://symfony.com/doc/current/form/form_themes.html#applying-themes-to-single-forms

Nous verrons plus sur le style dans la section de Webpack-Encore, mais vous pouvez déjà utiliser cette méthodes pour un layout de base.

<br>

## 21.11. Formulaires concernant plusieurs entités

<br>

### 21.11.1. One-To-Many

<br>


Considérons que les Genres sont aussi des entités de la BD (un **Genre** ayant *nom* et *description*). Comment faire si on veut créer un formulaire pour insérer un livre et choisir au même temps son genre dans le formulaire ? Le genre est un objet (entité) !

**Note**: ces formulaires, sans une bonne planification préalable, peuvent devenir de vrais peuvent se transformer en véritables cauchemars. Assurez-vous de maîtriser les formulaires normaux avant de vous lancer dans ceux-ci.

La solution est **d'utiliser le type EntityType**, qui nous permettra **d'envoyer une entité** de notre choix **dans le formulaire**.

<https://symfony.com/doc/current/reference/forms/types/entity.html>

Créez une nouvelle entité Genre (contenant **nom** et **description**) et **une association d'un a plusieurs avec Livre** (on va considérer qu'un livre à juste un genre). 

**Attention: Le côté 1 est considéré comme "owner side", "côté proprietaire". C'est important à savoir pour certains actions!**

**Ici on veut pouvoir envoyer une entité Genre pour pouvoir l'incruster dans l'entité Livre.**

Créons une classe de formulaire **LivreGenreType** à partir de
**LivreType** et faisons les modifications nécessaires (explication après le code) :

```php
<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

// la classe pour avoir une entité comme champ du formulaire
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Genre;
use App\Repository\GenreRepository;

class LivreGenreType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ISBN', TextType::class)
                ->add('titre', TextareaType::class)
                ->add('prix', MoneyType::class)
                ->add('description', TextareaType::class)
                ->add('datePublication', DateType::class,[
                        'label' => 'Date de publication'
                ])
                ->add('nombrePages', IntegerType::class, [
                        'label' => 'Nombre de pages',
                        'required' => false
                ])
                ->add('langue', LanguageType::class, [
                        'label' => 'Langue du livre',
                        'preferred_choices' => ['es','fr','it']
                ])
                ->add ('format', ChoiceType::class, [
                        'choices' => [
                            'eBook' => 'ebook',
                            'papier' => 'papier'
                        ],
                        // les combinaisons de ces paramètres détermineront le type de
                        // liste de choix : liste, liste déroulante, checkbox ou
                        // radiobuttons
                        'expanded' => false,
                        'multiple' => false
                ])
                ->add ('genre', EntityType::class, [
                    'class' => Genre::class,
                    'choice_label' => 'nom'
                ]);
    }
}
```


**Explication :**

1.  On rajoute un champ du type EntityType qui portera le nom du champ de l'association (ici *genre* dans *Livre*)

2.  On spécifie la classe de cet Entité (ici, *Genre*)

3.  On spécifie la propriété à afficher
   
4.  Chaque objet contenu dans la requête sera passé à fonction spécifiée dans **choice_label**. Le contenu renvoyé par cette fonction s'affichera comme option dans la liste déroulante.

Observez le code de **ExemplesFormulairesObjetsController**, action *exemple_livre_genre*.

Voici le code des **templates** :

```twig
{# affichage_formulaire_livre.html.twig #}
{{ form_start (formulaireLivre) }}
{{ form_widget (formulaireLivre) }}
<input type="submit" class="btn" value="Envoyer" />
{{ form_end (formulaireLivre) }}
```

```twig
{# traitement_formulaire_livre.html.twig #}
{{ dump (livre) }}
```

<br>


Si vous voulez faire de requêtes particulières pour la création de la liste déroulante, faites une requête avec QueryBuilder.
Dans la clé **query_builder**, on crée une fonction qui **renvoie** un ensemble d'objets *Genre* (voir la section consacrée au QueryBuilder).
Puis on peut définir les labels avec *choice_label*.

```php
'query_builder' => function (GenreRepository $er){
                        return $er->createQueryBuilder('u')->orderBy ('u.nom','DESC');
                    },
// on affiche ici les noms et les descriptions en majuscules,
// mais c'est à vous de choisir la façon de l'afficher
'choice_label' => function ($x){
    return strtoupper($x->getNom() . "-". $x->getDescription());
}
```


Si vous avez déjà une collection d'objets à afficher dans la liste déroulante, vous pouvez utiliser la propriété **choices**.
Ici, $group est passé au formulaire comme, par exemple, une option.

```php
$builder->add('users', EntityType::class, [
    'class' => User::class,
    'choices' => $group->getUsers(),
]);
```

### 21.11.2. Many-To-Many

<br>

(Exemple complet dans le projet **FormsManyToMany**)

<br>

Le many-to-many fonction de la même manière.

Considérons une rélation entre **Fleur** et **Saison**, où une Fleur peut avoir plusieurs Saisons est à l'invers.

On veut créer un formulaire pour rajouter une fleur. Dans ce formulaire on doit pouvoir choisir plusieurs saisons.

Commençons par les entités (sans rélation encore), d'abord Fleur:

```php
<?php

namespace App\Entity;

use App\Repository\FleurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FleurRepository::class)]
class Fleur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $prix = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}

```

puis Saison:

```php
<?php

namespace App\Entity;

use App\Repository\SaisonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SaisonRepository::class)]
class Saison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}

```

Maintenant on crée la rélation ManyToMany **depuis Fleur**. Fleur sera la **owning side** (côté propriétaire) de la rélation.
On verra **inversedBy** dans Fleur et **mappedBy** dans Saison.

Ça implique que quand on modifiera un objet Fleur en rajoutant de Saisons et on fait persist-flush, les liens Fleur-Saison seront crées dans le tableau intermediaire de la BD.

```console
symfony console make:entity Fleur

 Your entity already exists! So let's add some new fields!

 New property name (press <return> to stop adding fields):
 > saisons

 Field type (enter ? to see all types) [string]:
 > ManyToMany

 What class should this entity be related to?:
 > Saison

 Do you want to add a new property to Saison so that you can access/update Fleur objects from it - e.g. $saison->getFleurs()? (yes/no) [yes]:
 >

 A new property will also be added to the Saison class so that you can access the related Fleur objects from it.

 New field name inside Saison [fleurs]:
 >

 updated: src/Entity/Fleur.php
 updated: src/Entity/Saison.php
```

Rajoutez aussi **cascade:persist**.

Voici le nouveau code de Fleur.


```php
<?php

namespace App\Entity;

use App\Repository\FleurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FleurRepository::class)]
class Fleur
{
.
.
.
    #[ORM\ManyToMany(targetEntity: Saison::class, inversedBy: 'fleurs', cascade:['persist'])]
    private Collection $saisons;
.
.
.

}
```

On crée le formulaire:

```php
<?php

namespace App\Form;

use App\Entity\Fleur;
use App\Entity\Saison;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FleurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prix')
            
            ->add('saisons', EntityType::class, [
                'class' => Saison::class,
                'choice_label' => 'nom',
                // les combinaisons de ces paramètres détermineront le type de
                // liste de choix : liste, liste déroulante, checkbox ou
                // radiobuttons
                'multiple' => true,
                'expanded' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fleur::class,
        ]);
    }
}

```

Le controller:

```php
<?php

namespace App\Controller;

use App\Entity\Fleur;
use App\Form\FleurType;
use App\Repository\FleurRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FleurController extends AbstractController
{
    #[Route('/fleur', name: 'app_fleur')]
    public function index(FleurRepository $repo): Response
    {
        $fleurs = $repo->findAll();
        $vars = ['fleurs' => $fleurs];
        
        return $this->render('fleur/index.html.twig', $vars);
    }

    #[Route('/formulaire/creation/fleur')]
    public function CreationFleur(Request $req, ManagerRegistry $doctrine): Response 
    {
        $fleur = new Fleur();
        $formFleur = $this->createForm(FleurType::class,$fleur);
        $formFleur->handleRequest($req);

        if($formFleur->isSubmitted()){

            $em = $doctrine->getManager();
            //On associe le user à la fleur qu'on crée
            $fleur->setUser($this->getUser());
   
            $em->persist($fleur);
            $em->flush();
            
            return $this->redirectToRoute("app_fleur");
        }

        else
        {
            $vars = ['formFleur' => $formFleur];
            return $this->render('fleur/creation_fleur.html.twig', $vars);
        }

    }
}

```

et finalement les vues:

**index.html.twig**

```twig
{% extends 'base.html.twig' %}

{% block title %}Liste des fleurs{% endblock %}


{% block body %}
    <div class="p-5">
        <h2>Liste des fleurs</h2>

        <table class="table table-responsive">
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Saisons</th>
            </tr>
            {% for fleur in fleurs %}
                <tr>
                    <td><img src='{{ asset ("/fleur01.jpg") }}'/></td>
                    <td>{{ fleur.nom }}</td>
                    <td>{{ fleur.prix }}</td>
                    <td>
                    <ul>Saisons : 
                    {% for saison in fleur.saisons %}
                    <li>{{saison.nom}}</li>
                    {% endfor %}
                    </ul>
                    </td>
                    {# <td><a href ="{{ path ('fleur_update', { id: fleur.id } )}}">Modifier</a></td> #}
                    {# <td><a href ="{{ path ('fleur_delete', { id: fleur.id } )}}">Supprimer</a></td> #}
                </tr>
            {% endfor %}
        </table>
    </div>


{% endblock %}
```

**creation_fleur.html.twig**

```twig
{% extends "base.html.twig" %}

{% block body %}

{{ form_start (formFleur) }}
{{ form_widget (formFleur) }}
<input type="submit" class="btn" value="Envoyer" />
{{ form_end (formFleur) }}

{% endblock %}
```

<br>



## 21.12. (à faire encore, on le laisse pour plus tard) Formulaire contenant une liste déroulante d'entités filtrées

**Note:**: pour réaliser cet exemple vous devez savoir créer d'abord un **User** en utilisant le système de sécurité de Symfony.


Considérez ce modèle :

![](./images/form-entites.png)

Un **User** qui joue dans de groupes de musique veut inscrire un de ses **GroupeMusique** à un concours.
Quand on affiche le formulaire **d'Inscription** on veut pouvoir choisir le **GroupeMusique** à inscrire dans le **Concours, mais on veut avoir uniquement les groupes qui ont été créés par cet User**. On doit créer la liste de **GroupeMusique** en filtrant par **User**.

On se trouve dans une situation similaire à celle de l'exemple précédant, mais la requête qui renvoie les entités de la liste (avant *Genre* et maintenant *GroupeMusique*) doit filtrer par *User*. 

**Mais on ne peut pas obtenir l'User dans le code du formulaire, car c'est un formulaire pour l'entité Inscription!**

Nous avons **deux solutions** :

a)  Envoyer l'User comme option (array associatif) pendant la création du formulaire (méthode **createForm**) quand on crée le formulaire dans le Controller. Cet array **$options** sera disponible dans la méthode **buildForm** de la classe formulaire.

b)  Enregistrer le formulaire comme Service dans **services.yaml**.

Créer un paramètre contenant le token de l'User et l'envoyer lors de la création du Formulaire

Cette solution est expliquée ici :

<https://stackoverflow.com/questions/38199882/filter-entitytype-by-owner-current-user>

Dans les deux cas, il faut adapter la requête (QueryBuilder) dans la création de la liste. Réalisons la première méthode (envoyer l'User dans la création du form).

On va réaliser un exemple.

**Exemple**:



1.  D'abord on crée une fixture capable de créer des users et de
    groupes et de les lier (**RajouterGroupesUsers**) :


class RajouterGroupesUsers extends Fixture



1.  Créez l'action du controller, qui envoie l'user dans la création du form

```php
    #[Route("/exemple/filtre/form/user", name="exemple_filtre_form_user")]

    public function exempleFiltreFormUser(Request $request)
    }
```

4.  Créez votre form (InscriptionFiltreType) :


```php
class InscriptionFiltreType extends AbstractType

{


}
```

Pour le tester, lancez les fixtures et **faites** **login** avec un parmi les users qui se trouvent dans la fixture **RajouterGroupesUsers.php** . Puis lancez l'action **exempleFiltreFormUser** du controller **ExempleFiltreFormUser**
(tapez-la dans l'url). La liste de groupes doit contenir uniquement les groupes auxquels l'user qui vient de faire login appartient.

<br>

## 21.12. Upload de fichiers en utilisant un formulaire

<br>

Dans cette section on propose une méthode pour pouvoir faire upload de fichiers du client au serveur en utilisant un formulaire crée par Symfony.

La documentation pour ce faire se trouve ici :

<https://symfony.com/doc/current/controller/upload_file.html>

Mais nous allons développer nos propres exemples.

<br>

### 21.12.1. Stockage dans le serveur d'une seule image pour chaque entité 

<br>

Nous allons utiliser le projet **ProjetFormulairesSymfony**.

**Objectif :** Pouvoir faire upload d'une image pour chaque entité dans la BD.

On va créer une entité (Pays) et un formulaire qui nous permettra de faire upload d'une image associée à cette entité (une image pour chaque pays). Notre action stockera le nom du pays et le lien vers l'image dans la BD, ainsi que le fichier en soi dans un dossier du serveur.

**Procédure :**

1.  **Créez l'entité** (Pays, contenant le **nom** du pays et un champ **lienImage** pour stocker **le lien** de l'image. Les deux sont du type string)

**IMPORTANT: effacez la spécification des types (paramètres et retour) dans les méthodes set et get de lienImage**

Faites la migration.

2.  **Créez la classe du formulaire** pour cette entité (PaysType.php). Pour le champ **uneImage, choisissez FileType**, et rajoutez un bouton de submit.

```php
<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Form\FormBuilderInterface;

class PaysType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType::class)
            ->add('image', FileType::class, [
                'label' => "Sélectionner l'image du pays",
                'mapped' => false, // cette propriété ne sera pas affecté dans l'entité quand on envoie le formulaire. On la récuperera avec $form['image']->getData()
                'required' => false // l'utilisateur n'est pas obligé d'uploader un fichier
            ]);
    }
}
```


3.  Créez **un fichier twig capable d'afficher ce formulaire**

```twig
{# affichage_formulaire upload.html.twig #}
{{ form_start (formulaire) }}
{{ form_widget (formulaire) }}
<input type="submit" class="btn" value="Envoyer" />
{{ form_end (formulaire) }}
```

4.  Créez **une action qui traite les données envoyées par le
    formulaire**

Cette action doit :

-   **Créer un objet formulaire** (PaysType) **associé à une entité
    vide** ($pays de la classe Pays)

-   **Gérer la requête :** HandleRequest remplira les propriétés de l'entité
  
-   **Vérifier que le formulaire a été envoyé** (isSubmitted) **et si les données sont valables** (isValid).

-   **Obtenir le fichier** (**objet UploadedFile**, pas un string) **de l'entité** associée au formulaire

    -   **Obtenir un nom de fichier unique** pour le stocker dans le serveur (si on utilise le nom original il pourrait y avoir plein de doublons !)

    -   **Stocker le fichier dans le serveur** sous le nom choisi

-   **Affecter la propriété contenant le fichier dans l'entité et lui donner le nom unique qu'on vient d'obtenir**

-   **Stocker l'objet dans la BD**


Voici le code de l'action (**ExemplesFormulaireUploadController**):


```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Pays;
use App\Form\PaysType;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;


class ExemplesFormulaireUploadController extends AbstractController
{
    #[Route("/exemples/formulaire/upload/exemple")]
    public function upload (Request $request, ManagerRegistry $doctrine)
    {
        // créer une nouvelle entité vide
        $pays = new Pays();
        // créer un formulaire associé à cette entité
        $formulairePays = $this->createForm(PaysType::class, $pays);
        // gérer la requête (et hydrater l'entité)
        $formulairePays->handleRequest($request);
        // vérifier que le formulaire a été envoyé (isSubmitted) et que les données sont valides
        if ($formulairePays->isSubmitted() && $formulairePays->isValid()) {
            // obtenir le fichier à la main
            $fichier = $formulairePays['image']->getData();

            $dossier = $this->getParameter('kernel.project_dir').'/public/dossierFichiers';

            if ($fichier) {
                // obtenir un nom de fichier unique pour éviter les doublons dans le dossier
                $nomFichierServeur = md5(uniqid()) . "." . $fichier->guessExtension();
                // stocker le fichier dans le serveur (on peut indiquer un dossier)
                $fichier->move($dossier, $nomFichierServeur);
                // affecter le nom du fichier de l'entité. Ça sera le nom qu'on
                // aura dans la BD (un string, pas un objet UploadedFile cette fois)
                $pays->setImage($nomFichierServeur);
            }
            // stocker l'objet dans la BD, ou faire update
            $em = $doctrine->getManager();
            $em->persist($pays);
            $em->flush();
            return new Response("Entité mise à jour dans la BD. Si le fichier a été selectionné, upload ok!");
        } else {
            return $this->render(
                "/exemples_formulaires_upload/affichage.html.twig",
                ['formulaire' => $formulairePays]
            );
        }
    }
}
```

L'action d'upload peut être transformée en **Service** si on envisage de faire des uploads dans d'autres parties de l'application (jne autre action dans le même controller ou dans un autre controller). Vous avez un exemple dans ce même syllabus (section 10.9):



### 21.12.2. Possibles problèmes dans l'upload

<br>

Nous pouvons avoir de problèmes liés à certaines limites concernant la taille des fichiers qu'on peut charger dans le serveur.

1.  Dans **php.ini**, **upload_max_filesize** spécifie la taille maximale accepté par le module de php

```config
; Maximum allowed size for uploaded files.
; http://php.net/upload-max-filesize
upload_max_filesize=20M
```

Changez-la selon vos besoins.


2.  Dans **php.ini**, **post_max_size** indique la taille maximale d'un formulaire envoyé en POST (avec ou sans le champ d'upload)


```config
; Maximum size of POST data that PHP will accept.
; Its value may be 0 to disable the limit. It is ignored if POST data reading
; is disabled through enable_post_data_reading.
; http://php.net/post-max-size
post_max_size=20M
```

Notez que, en ce qui concerne l'upload d'un fichier, ça ne vous sert à rien de changer le premier paramètre sans changer le deuxième car il faut que le serveur admette un post contenant un fichier d'au moins la taille permise par **upload_max_filesize.**

Si on a un formulaire avec un champ d'upload, la taille du POST sera, en gros, celle du fichier envoyé plus celle de tous les autres champs du formulaire.

Après avoir augmenté la valeur de ces deux paramètres on ne doit plus avoir de problèmes, mais si ce n'est pas le cas il faut considérer aussi les paramètres suivants :

3.  Dans certains cas il faut considérer aussi la limite pour la taille du fichier **.php** qu'on peut charger (en **php.ini**)

```console
; Maximum amount of memory a script may consume (128MB)
; [http://php.net/memory-limit]{.underline}
memory_limit=128M
```


4.  Il peut avoir aussi un problème si la connexion du client est lente et l'upload prend plus du temps spécifié dans **max_input_time** (**php.ini**). Ce paramètre indique le temps maximum permis pour analyser les données du POST ou GET: c'est le temps qui passe entre l'appel au script PHP et le début de son exécution. Dans la configuration de XAMPP la valeur est -1, il n'y a pas de limite de temps.


<br>


## 21.13. AJAX en Symfony avec Axios (formulaire indépendant)
<br>

Nous allons montrer **comment utiliser AJAX dans un template Twig avec Axios**. Ici on montrera un exemple basique d'un form indépendant, **pas associé à une entité**.

Axios est une librairie que nos simplifie les appels AJAX. Vous pouvez parfaitement faire du AJAX sans cette librairie mais ici on l'utilise pour nous faciliter la tâche.

Créez un controller **ExemplesAjaxFormDataController** (code original dans le projet **ProjetFormulairesSymfony**). Ce controller contiendra uniquement quelques exemples d'appel Ajax. Plus tard on réalisera des exemples plus pratiques basés sur la BD du projet.

Dans cet exemple on envoie de données en utilisant AJAX **sans utiliser un formulaire associé à une entité**, juste un formulaire simple. 

1.  **Créez une vue contenant un formulaire. Cette vue contiendra aussi le code AJAX**

**Exemple** : créez un formulaire contenant un input (nom). Quand on clique sur le bouton, un message de bienvenue sera affiché dans le div. 

Attention aux **names** des contrôles car on les utilisera dans le traitement de l'action dans le controller!!

(Fichier **exemple1_affichage.html.twig** dans **ProjetFormulairesSymfony**)

```twig
{% extends "base.html.twig" %}

{% block body %}
<!-- formulaire à envoyer  -->
<form id="leFormulaire" method="POST">
    <input type="text" name="nom" />
    <input type="submit" id="envoyerNom" value="Envoyer" />
</form>
<div id="divMessage"></div>
{% endblock %}

{% block javascripts %}
<!-- AJAX - AXIOS  -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    envoyerNom.addEventListener("click", function (event) {
        event.preventDefault();

        console.log (document.getElementById("leFormulaire"));

        axios({
            url: '{{path ("exemple1_traitement")}}',
            method: 'POST',
            headers: { 'Content-Type': 'multipart/form-data' },
            data: new FormData(document.getElementById("leFormulaire"))
        })
        .then(function (response) {
            // response.data est un objet qui correspond à l'array associatif envoyé dans le controller
            // JsonResponse a transformé l'array en JSON. Axios transforme le JSON en objet JS
            // (et on utilise ici la clé "leMessage")
            document.getElementById("divMessage").innerHTML = response.data.leMessage;
            console.log (response);
        })
        .catch(function (error) {
            console.log(error);
        });
    });    
</script>
{% endblock %}
```

Dans l'appel AXIOS on envoie un objet JS contenant :

-   Le **nom de l'action** qui traiterá les données envoyés

-   La **méthode** (POST)

-   Les « **headers** » de la requête, pour indiquer qu'on envoie un
    formulaire (dans ce cas)

-   Les **donnés (data)** : un objet JS contenant de clés et de valeurs. Ici on envoie un objet FormData (classe de JS) construit à partir du formulaire qui se trouve dans la page web


1. Modifiez le template **/templates/base.html.twig** pour que les scripts soient chargés après le body

```twig
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}{% endblock %}
    </body>
</html>
```


2. Créez l'action qui affiche la vue **exemple1_affichage.html** dans 

```php
#[Route("/exemples/ajax/form/data/exemple1/affichage")]
public function exemple1Affichage()
{
    return $this->render("/exemples_ajax_form_data/exemple1_affichage.html.twig");
}
```

3.  Créez l'action qui traite la pétition AJAX

```php
#[Route("/exemples/ajax/form/data/exemple1/traitement")]
// action qui traite la commande AJAX, elle n'a pas une vue associée
public function exemple1Traitement(Request $requeteAjax)
{
    $valeurNom = $requeteAjax->get('nom');
    $arrayReponse = ['message' => 'Bienvenu, ' . $valeurNom];
    return new JsonResponse($arrayReponse);
}
```

Cette action reçoit un objet Request. On peut accéder aux éléments du formulaire en utilisant **get**. Dans cet exemple, l'action renvoie un array à traiter dans le code JS. Pour envoyer des arrays ou des objets à JS depuis PHP on doit les transformer en **JSON**. On verra d'autres exemples (envoyer des objets) par la suite.

![](./images/axios1.png)


## 21.14. Formulaire associé à une entité avec Axios 

<br>

Voici un exemple d'un form associé à une entité. Lisez **très attentivement** les commentaires dans le code.
Tous les points importants sont commentés.

Le but ici est d'avoir un formulaire associé à une entité . Une fois il est envoyé on disposera directement d'une entité dans le controller, remplie avec les données du formulaire.

C'est la procédure normale, mais plus élaborée à cause d'avoir utilisé AJAX et FormData

#### Explication de base:

1. Une vue affiche un formulaire **associé a une entité** (une action pour afficher)
2. La vue envoie le formulaire au controller (une nouvelle action pour le traitement, pas la même comme d'habitude)
3. Le controller traite les données du FormData et, grâce à **handleRequest**, il remplit l'entité vide. 
On ne doit pas extraire directement les valeurs de l'objet Request car certains types (ex: Dates) provoqueront des erreurs (les forms envoient de strings, mais l'entité a besoin d'un objet DateTime... handleRequest fait le travail pour nous)

Une fois on à l'entité: 

4. Le controller renvoie du JSON ou le rendu d'une vue(mais sans changer d'URL, bien sûr). Ce contenu sera normalement incrusté dans un div après.
Si le controller renvoie des objets en JSON, il faut les **serialiser** dans le controller et les deserialiser dans la vue (JSON.parse) (voir code) 
5. La vue est rendue


Voici le code (**ProjetFormulairesSymfony**)

La **vue**: form_entite_afficher.html

```twig
{% extends 'base.html.twig' %}

{% block body %}

{{ form_start (formulaireLivre)}}
<button id="envoyer">Envoyer</button>
{{ form_end (formulaireLivre)}}

<div id="divContenu"></div>


{% endblock %}

{% block javascripts %}
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
envoyer.addEventListener ("click", (event) => {
    event.preventDefault ();

    axios ({
        url : '{{ path ("exemple_axios_form_entite_traiter") }}',
        method : 'POST',
        headers: {'Content-Type': 'multipart/form-data'},
        data: new FormData (formulaireLivre)
    })
    .then (function (response){
        console.log (response.data);
        // on affiche le resultat dans le div
        donnees = response.data;
        console.log (donnees.livre);
        // attention à parser le JSON si on le reçoit du controller (ex: objet serialisé)
        divContenu.innerHTML = donnees.message + " " + donnees.noms[1] + " " + JSON.parse(donnees.livre).titre;

    })
    .catch (function (error){
        console.log (error);
    });
});
</script>



{% endblock %}
```

Le **controller** (**ExemplesAjaxAxiosController**)

```php
#[Route("/exemples/ajax/axios/form/entite/afficher", name: "exemple_axios_form_entite_afficher")]
public function exempleAjaxAxiosFormEntiteAfficher(Request $req)
{
    // si on veut le pré-remplir on peut remplir cette entité. 
    // Autrement on peut l'envoyer vide ou juste envoyer null dans le paramètre dans createForm
    $livre = new Livre();

    // ATTENTION!: il faut donner un id au formulaire pour pouvoir le manipuler avec JS!!
    $formulaireLivre = $this->createForm(
        LivreType::class,
        $livre,
        [    // pas d'action. On gére le click avec JS et on fait l'appel AXIOS
            'method' => 'POST',
            'attr' => ['id' => 'formulaireLivre']
        ],
    );

    // ici la vue de l'affichage est une vue complete (recharge URL). Si cette action avait été appelée par 
    // AJAX, on aurait pu faire $this->renderView pour renvoyer uniquement le rendu de la vue 
    // et l'incruster dans un DIV
    $vars = ['formulaireLivre' => $formulaireLivre];
    return $this->render("/exemples_ajax_axios/form_entite_afficher.html.twig", $vars);
}


#[Route("/exemples/ajax/axios/form/entite/traiter", name: "exemple_axios_form_entite_traiter")]
public function exempleAjaxAxiosFormEntiteTraiter(Request $req, SerializerInterface $serializer)
{
    // ATTENTION à comment créer l'entité à partir du FormData!!!
    // Quand on utilise un FormData on doit passer par handleRequest, car FormData envoie tout en string
    // et nous avons besoin de DateTime pour le Dates. HandleRequest fait l'hydrate proprement pour nous
    // C'est le même code que quand on traite un form sans Ajax, mais ici l'affichage
    // et le traitement sont separés

    $livre = new Livre();

    // On crée un objet formulaire pour traiter les données, mais ici on n'affiche rien
    $formulaireLivre = $this->createForm(
        LivreType::class,
        $livre,
        [    // pas d'action. On gére le click avec JS et on fait l'appel AXIOS
            'method' => 'POST',
            'attr' => ['id' => 'formulaireLivre']
        ],
    );

    $formulaireLivre->handleRequest($req);
    
    // Maintenant il faut envoyer quoi qui ce soit à la page qui appelle. Deux cas de figures standards,
    // où le controller renvoie: 
    
    // 1. Juste de données: un simple JSON (messages, objets....) qu'on utilisera dans form_entite_afficher.html.twig. 
    // Pas de recharge d'URL
    
    // Note: Si on avait besoin de l'entité en JSON on doit la serialiser avant de l'envoyer: 
    $livreJson = $serializer->serialize($livre, 'json', [AbstractNormalizer::IGNORED_ATTRIBUTES => ['exemplaires']]);
    // On rajoute les exemplaires dans IGNORED_ATTRIBUTES pour éviter les références circulaires
    // (livre->exemplaires->livre->exemplaires...)
    // Important: nous pourrions utiliser un système équivalent pour la serialisation avec des annotations, ou utiliser ATTRIBUTES au lieu d'IGNORED_ATTRIBUTES et sélectionner ce qu'on veut serialiser : 
    

    // ici on a envoyé une JsonResponse où on inclut une clé-valeur livre. 
    // $livreJson est déjà du JSON après la sérialisation. Le fait de le renvoyer dans 
    // une JSonResponse l'encodera encore une fois! 
    // on devra alors lancer JSON.parse dans la vue pour revertir ce changement (voir code du "then") 

    // On aurait pu renvoyer juste new Response ($livreJson) mais on doit envoyer aussi message et noms alors on a envoyé une JSonReponse.
    // Le ré-encodage du json du livre est défait dans la vue (JSON.parse)
    return new JsonResponse([
        'message' => 'Tout ok!',
        'noms' => ['Lola', 'Iza'],
        'livre'=> $livreJson
        ]);
        
    // Tout depend de nos besoins, il n'y pas une solution magique et il faut comprendre le système!

    // 2. Le rendu d'une autre view, à incruster dans un div de form_entite_afficher.html.twig. 
    // Pas de recharge d'URL non plus! Exemple dans le projet NavigationExemples -> NavigationController
    // return $this->renderView ("/exemples_ajax_axios/autre.html.twig", $vars) 
        
    }
}
```
La vue : form_entite_afficher.html.twig (attention au "then")

```js
{% extends 'base.html.twig' %}

{% block body %}

{{ form_start (formulaireLivre)}}
<button id="envoyer">Envoyer</button>
{{ form_end (formulaireLivre)}}

<div id="divContenu"></div>


{% endblock %}

{% block javascripts %}
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
// attendre la charge du DOM
window.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById("envoyer").addEventListener ("click", (event) => {
        event.preventDefault ();

        axios ({
            url : '{{ path ("exemple_axios_form_entite_traiter") }}',
            method : 'POST',
            headers: {'Content-Type': 'multipart/form-data'},
            data: new FormData (formulaireLivre)
        })
        .then (function (response){
            console.log (response.data);
            // on affiche le resultat dans le div
            donnees = response.data;
            console.log (donnees.livre);
            // Axios fait un prémier parse (notez qu'on ne doit pas parser 'message' ni 'noms')
            // JSonResponse encode en JSON le message et les noms et Axios parse la response automatiquement 
            // (nous ne devons pas lancer JSON.parse pour ces deux données)
            // PAR CONTRE on doit parser encore l'objet Livre car il a été serialisé (transformé en array puis transformé en JSON)
            // et puis encodé à nouveau en JSON à cause de l'appel à JSonResponse
            // Nous avons du serialiser le livre car c'est la seule manière de le transformer proprement en JSON, 
            // on n'aurait pas pu juste envoyer le $livre dans le JSonResponse
            divContenu.innerHTML = donnees.message + " " + donnees.noms[1] + " ";
            let livreParse = JSON.parse(donnees.livre);
            divContenu.innerHTML += "<br>Quelques données du livre: " + livreParse.titre + " " + livreParse.datePublication;

        })
        .catch (function (error){
            console.log (error);
        });
    });

});

</script>
{% endblock %}
```

<br>

**Extra**: Si l'entité du formulaire est liée à une autre et vous avez besoin de la clé étrangere, vous devez rajouter ce champ comme **EntityType** dans la classe du formulaire.
Puis on doit le rajouter dans la vue, dans le rendu du formulaire d'affichage (ex: **{{ form_widget(form.exemplaires)}}** ).
Ce champ pourra ou pas être caché. Le but est de l'envoyer sans que ça soit visible. 

<br>

### 21.14.1. Exemples extra AJAX (Axios)

<br>

Dans **AnnexeAxiosController** du **ProjetFormulairesSymfony** vous avez plusieurs exemples d'utilisation d'Axios, pour de situations différentes.


<br>

## 21.15. Utilisation de blocs dans twig avec AJAX

<br>

Il s'agit juste d'une combinaison de master page + AJAX, rien de
nouveau.

1.  Créez un template *master_page.html.twig* contenant une section pour nos vues. **Ce sera notre master page**. Créez un block pour le contenu et un autre pour le JS


```twig
<html>
    <body>
        <header>
            Voici la section header
        </header>
        <main>
            Voici la section main
            {% block contenuMain %}{% endblock %}
        </main>
        <footer>
            Voici la section footer
        </footer>
    
    </body>
    {% block javascripts %}{% endblock %}
</html>
```

2.  **Créez un template** *exemple1_affichage_master_page.html.twig* **qui hérite du template** master_page.html.twig

```twig
{% extends '/exemples_ajax/master_page.html.twig' %}

{% block contenuMain %}
<!-- on mettra cet script dans un block  -->

<!-- formulaire à envoyer  -->
<form id="leFormulaire" method="POST">
    <input type="text" name="nom" />
    <input type="submit" id="envoyerNom" value="Envoyer" />
    <div id="divMessage"></div>
</form>
{% endblock %}


3.  Rajoutez **le code Ajax** dans un bloc **javascripts** dans la même vue, le code doit faire appel à une action dans le controller qui gére la petition Ajax.

```twig
{% block javascripts %}
{% block javascripts %}
<!-- AJAX - AXIOS dans la page, sans avoir un script externe -->

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
// attendre la charge du DOM
window.addEventListener('DOMContentLoaded', (event) => {
    envoyerNom.addEventListener("click", function (event) {
        event.preventDefault();

        console.log(document.getElementById("leFormulaire"));

        axios({
            url: '{{path ("traitement_ajax_master_page")}}',
            method: 'POST',
            headers: { 'Content-Type': 'multipart/form-data' },
            data: new FormData(document.getElementById("leFormulaire"))
        })
        .then(function (response) {
                // response.data est un objet qui correspond à l'array associatif envoyé dans le controller
                // JsonResponse a transformé l'array en JSON. Axios transforme le JSON en objet JS
                // (et on utilise ici la clé "leMessage")
                document.getElementById("divMessage").innerHTML = response.data.message;
                console.log(response);
        })
        .catch(function (error) {
                console.log(error);
        });
    });    
});
</script>
{% endblock %}
```


Notez que dans le code Ajax on doit réaliser l'opération pertinente
avec les données reçues du serveur (ex : afficher dans un div)

4.  Créez l'action qui affiche la vue qu'on vient de créer

```php
// exemple d'utilisation d'AJAX avec de blocs ("master page")
#[Route ("/exemples/ajax/axios/exemple1/affichage/master/page")]
public function exemple1AffichageMasterPage()
{
    return $this->render("/exemples_ajax_axios/exemple1_affichage_master_page.html.twig");
}
```

5.  Créez l'action qui traite la commande AJAX

Dans cette action, renvoyez votre réponse JSON. Pour ce faire, au lieu d'envoyer un objet Response ou le rendu d'une vue, vous allez utiliser un objet JSonResponse. Par exemple :

```php
#[Route("/exemples/ajax/axios/exemple1/traitement/master/page", name: "traitement_ajax_master_page")]
// action qui traite la commande AJAX, elle n'a pas une vue associée
public function exemple1TraitementMasterPage(Request $requeteAjax)
{
    $valeurNom = $requeteAjax->get('nom');
    $arrayReponse = ['message' => 'Bienvenu, ' . $valeurNom];
    return new JsonResponse($arrayReponse);
}

```

![](./images/axios1.png)


### Exercices : Ajax avec Axios

1. Faites un jeu de deviner un chiffre en utilisant Ajax en Symfony (utilisez le controller AjaxExemples)

2. Créez une autre master page et deux vues qui en héritent. La première contient le jeu que vous venez de réaliser et la deuxième contient trois boutons. Chaque bouton affiche la photo d'un animal sans recharger la page.




## 21.16. Ajax et Axios dans un script JS. Indispensable si script externe au Twig 

**Si vous voulez générer de routes à l'interieur de JS**, vous allez remarquer que vous ne pouvez pas utiliser **path**.

Cette action n'est pas possible, par exemple:

```js
<script>
    let route = '{{ path ('ma_route') }}'
</script>>
```

Si on veut **utiliser un script externe JS dans une vue**, le script lui-même ne pourra pas utiliser la fonction **path** à l'intérieur de JS pour générer les routes cible AJAX. Les fonctions de twig telles que **path** fonctionnent uniquement **dans le code TWIG, pas JS**. 

**Une façon simple de gérer ce problème est d'utiliser les attributs 'data' des éléments de la page pour stocker les routes et puis y accéder depuis le script js au moment de faire l'appel AJAX**

Par exemple, on peut stocker la route dans le **data** d'un bouton:


Page qui contient le DOM:

```html
<button id="afficherClients" 
        data-route="{{ path('afficher_clients')}}"
        value="Afficher">
</button>
```

Script externe: 

```javascript
<script>
    let route = document.getElementById ("afficherClients").dataset.route;
    // puis on fait l'appel ajax ici, la variable route contient la route
</script>
```

### 21.16.1. Utilisation de FOSJsRoutingBundle pour générer les routes diréctement en JS

Une autre manière de résoudre le problème est d'utiliser le module **FOSJsRoutingBundle**.

Rajoutez-le au projet :

```console
symfony composer req friendsofsymfony/jsrouting-bundle
```

Lisez la documentation:

<br>

**Installation:**

https://github.com/FriendsOfSymfony/FOSJsRoutingBundle/blob/master/Resources/doc/installation.rst

**Utilisation**

https://github.com/FriendsOfSymfony/FOSJsRoutingBundle/blob/master/Resources/doc/usage.rst

```console
php bin/console fos:js-routing:dump --format=json --target=public/js/fos_js_routes.json
```

Un exemple pratique **et commenté** est réalisé dans le projet **ProjetFormulairesSymfony**, dans le **controller ExemplesAjaxAxiosController**. Commencez par la vue et puis les actions du controller.

Actions:
```php
    exemple1AffichageMasterPageScriptExterne()
    exemple1TraitementMasterPageScriptExterne(Request $requeteAjax)
```

Scripts (on a utilisé webpack!):
```
    .addEntry('exemple1AjaxFormData','./assets/js/exemple1AjaxFormData.js')
    .addEntry('exemple1AjaxAxios','./assets/js/exemple1AjaxAxios.js')

```

![](./images/axios3.png)


<br>

**Important** : dans les routes qui seront accédées par ce bundle (regardez le code dans le controller) vous devez rajouter le paramètre **{"expose"=true}** (utilisez des annotations pour ces routes). Le code du projet inclut déjà cette option.

<br>

## 21.17. AJAX en Symfony (Vanilla JS - juste théorie)

**Objectif** : utiliser AJAX dans un template Twig

Créez un controller **ExemplesAjaxFormDataController** (code original
dans le projet **ProjetFormulairesSymfony**). Ce controller contiendra uniquement quelques exemples d'appel Ajax. Plus tard on réalisera des exemples plus pratiques basés sur la BD du projet.

Ceci est un exemple pédagogique, bien que vous pouvez utiliser cette tecnique aussi.

Dans cet exemple on envoie de données en utilisant AJAX **sans utiliser un formulaire**. Nous avons juste les contrôles. Dans la section suivante on utilisera un formulaire complet

1.  **Créez une vue contenant du code AJAX**

**Exemple** : on tapera un nom dans l'input et, quand on clique sur le bouton, un message de bienvenue sera affiché dans le div. 

Attention aux **names** des contrôles car on les utilisera dans le
traitement de l'action dans le controller!!


```twig 
<input type="text" id="inputNom" />
<input type="submit" id="envoyerNom" value="Envoyer"/>
<div id="divMessage"></div>

<script>
// attendre la charge du DOM
window.addEventListener('DOMContentLoaded', (event) => {

    envoyerNom.addEventListener ("click", function (event){
        var xhr = new XMLHttpRequest ();
        
        xhr.onreadystatechange = function (){
            if (xhr.readyState == 4){
                if (xhr.status == 200){
                    // transformer le string JSON envoyé par le serveur 
                    // comme réponse en objet JavasScript
                    var reponse = JSON.parse (xhr.responseText);
                    divMessage.innerHTML = reponse.message;
                    console.log (reponse);
                    console.log (typeof(reponse));
                }
                // s'il y a une erreur:
                else {
                    // effacer en production!
                    console.log (xhr.reponseText);
                }
                
            }
            
        }
        
        xhr.open ('POST','/exemples/ajax/exemple1/traitement');
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send ("nom=" + inputNom.value);
        
    });
});    
</script>
```

2.  Créez l'action **exemple1Affichage**, qui renvoie le rendu de la
    vue exemple1_affichage.html

```php
// exemple simple d'utilisation d'AJAX Vanilla sans promises
#[Route("/exemples/ajax/exemple1/affichage")]
public function exemple1Affichage()
{
    return $this->render("/exemples_ajax/exemple1_affichage.html.twig");
}
```

<br>

3.  Créez l'action **exempleTraitementAjax** qui traite la pétition
    AJAX

```php
#[Route("/exemples/ajax/exemple1/traitement")]
// action qui traite la commande AJAX, elle n'a pas une vue associée
public function exemple1Traitement(Request $requeteAjax)
{
    $valeurNom = $requeteAjax->get('nom');
    $arrayReponse = ['message' => 'Bienvenu, ' . $valeurNom];
    return new JsonResponse($arrayReponse);
}
```

<br>


## 21.18. Utilisation de blocs dans twig avec AJAX (Vanilla)

<br>

Il s'agit juste d'une combinaison de master page + AJAX, rien de
nouveau.

1.  Créez un template **master_page.html.twig** contenant une section pour nos vues. Créez un block pour le contenu et un autre pour le JS

```twig
<html>
    <body>
        <header>
            Voici la section header
        </header>
        <main>
            Voici la section main
            {% block contenuMain %}{% endblock %}
        </main>
        <footer>
            Voici la section footer
        </footer>
    
    </body>
    {% block javascripts %}{% endblock %}
</html>
```


2.  **Créez une vue** *exemple1_affichage_master_page.html.twig* **qui hérite du template** *master_page.html.twig*

```twig
{% extends '/exemples_ajax/master_page.html.twig' %}

{% block contenuMain %}
Nom<input type="text" id="inputNom" />
<button id="envoyerNom">Envoyer</button>
<div id="divMessage"></div>
{% endblock %}


```

3.  Rajoutez le code Ajax dans un bloc **javascripts** dans la même vue, le code doit faire appel à une action dans le controller qui gére la petition Ajax.

```twig
{% block javascripts %}
<script>
// attendre la charge du DOM
window.addEventListener('DOMContentLoaded', (event) => {

    envoyerNom.addEventListener ("click", function (event){
        var xhr = new XMLHttpRequest ();
        
        xhr.onreadystatechange = function (){
            if (xhr.readyState == 4){
                if (xhr.status == 200){
                    // transformer le string JSON envoyé par le serveur 
                    // comme réponse en objet JavasScript
                    var reponse = JSON.parse (xhr.responseText);
                    divMessage.innerHTML = reponse.message;
                    console.log (reponse);
                    console.log (typeof(reponse));
                }
                // s'il y a une erreur:
                else {
                    // effacer en production!
                    console.log (xhr.reponseText);
                }
                
            }
            
        }
        
        xhr.open ('POST','/exemples/ajax/exemple1/traitement/master/page');
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send ("nom=" + inputNom.value);
        
    });
});    
</script>

{% endblock %}

```
Notez que dans le code Ajax on doit réaliser l'opération pertinente
avec les données reçues du serveur (ex : afficher dans un div)

4.  Créez l'action qui affiche la vue qu'on vient de créer

```php
// exemple d'utilisation d'AJAX avec de blocs ("master page")
#[Route("/exemples/ajax/exemple1/affichage/master/page")]
public function exemple1AffichageMasterPage()
{
    return $this->render("/exemples_ajax/exemple1_affichage_master_page.html.twig");
}
```

5.  Créez l'action qui traite la requête AJAX

Dans cette action, renvoyez votre réponse JSON. Pour ce faire, au lieu d'envoyer un objet Response ou le rendu d'une vue, vous allez utiliser un objet JSonResponse. Par exemple :

```php
#[Route("/exemples/ajax/exemple1/traitement/master/page")]
// action qui traite la commande AJAX, elle n'a pas une vue associée
public function exemple1TraitementMasterPage(Request $requeteAjax)
{
    $valeurNom = $requeteAjax->get('nom');
    $arrayReponse = ['message' => 'Bienvenu, ' . $valeurNom];
    return new JsonResponse($arrayReponse);
}
```


Pour finir, sachez que les fichiers .**js** et .**css** sont considérés comme des "assets" en Symfony. Pour pouvoir en rajouter dans notre projet vous devez créer les dossiers **public/assets/js** et **public/assets/css** respectivement et y placer vos fichiers. Dans vos vues, inclure les fichiers est simple :

```twig
<script src="{{ asset('/assets/js/monFichier.js') }}"></script>

<link rel="stylesheet" href="{{ asset('/assets/css/monCss.css') }}" />
```

Vous avez des exemples dans le projet **projetFormulaires (controller
ExemplesAjaxController)**

### Exercices : utilisation d'AJAX Vanilla

1. Faites un jeu de deviner un chiffre en utilisant Ajax en Symfony (utilisez le controller AjaxExemples)

2. Créez une autre master page et deux vues qui en héritent. La première contient le jeu que vous venez de réaliser et la deuxième contient trois boutons. Chaque bouton affiche la photo d'un animal sans recharger la page.

<br>


## 21.19. DateTime et datepicker (Bootstrap)


<br>

Si vous utilisez **datepicker** de Bootstrap, vous devez mettre d'accord le format de l'objet du formulaire et celui du datepicker, qui ne s'expriment pas de la même façon. Ça peut devenir horrible mais voici une façon directe de faire si vous utilisez un format standard.

Dans la vue, avec l'objet **datepicker**:
```js
$.datepicker.setDefaults({dateFormat: 'dd-mm-yy'}); // format de visualisation
$('.js-datepicker').datepicker();
```
Dans le controller, dans le **formulaire**:
```php
->add(
    'fechaNacimiento',
    DateType::class,
    [

        'widget' => 'single_text',
        'format' => 'dd-MM-yyyy',
        'html5' => false,
        'attr' => ['class' => 'js-datepicker'],
    ]
)
```
Observez que pour exprimer la même chose on doit utiliser deux encodages différents.
**format** dans le formulaire exprime le format qui est attendu par Symfony pour créer l'objet DateTime. On a exprimé la même chose dans **datepicker**, mais le plugin et le framework utilisent des normes différentes!

<br>
<br>

## 21.20. Validation des formulaires

https://symfony.com/doc/6.3/validation.html



# 22. Response JSON en Symfony

<br>

## 22.1. Renvoi JSON d'un array d'objets depuis le controller 

<br>

On montre ici comment renvoyer un array d'objets sous la forme de JSON depuis une acion du controller. Les objets proviennent d'une requête à la BD en utilisant les méthodes de base du repo.

La séquence peut être résumée en : 

**obtenir avec find (ou autre) -> serialize -> renvoyer un objet Response contenant un string JSON**

**Exemple** : obtenir une liste des aeroports et les afficher dans un div dans la vue

**Code commenté :**

-   **Projet** projetFormulaires

-   **Controller** ExemplesAjaxAxiosController, actions :

    -   exempleAffichageObjetsRepo

    -   exempleAffichageObjetsTraitementRepo

-   **Vue** exemple_affichage_objets_repo.html.twig


<br>


## 22.2. Renvoi JSON d'un array d'objets obtenu avec DQL


<br>

La séquence peut être résumée en : 

**obtenir avec find (ou autre) -> getArrayResult -> renvoyer un objet JsonResponse**

**Exemple** : obtenir une liste des aeroports et les afficher dans un div

**Code :**

-   **Projet** projetFormulaires

-   **Controller** ExemplesAjaxAxiosController, actions

    -   exempleAffichageObjetsDql

    -   exempleAffichageObjetsTraitementDql

-   **Vue** exemple_affichage_objets_dql.html.twig

<br>


# 23. Mail

#!!!!!!!!!!!!!! NEW MailDumper

Mailer test: https://symfony.com/blog/new-in-symfony-6-2-better-debugging-commands


Pour configurer l'envoi de mail, regardez cette doc:

https://symfony.com/doc/current/mailer.html

Ici on va faire un exemple en utilisant un compte google.

**Exemple**:

1. Installez le module **symfony/google-mailer**

```console
symfony composer req symfony/google-mailer
```
Cette installation (**'recipe'**) modifiera le fichier **.env** pour rajouter une configuration adaptée à un compte mail de Google.

Changez-la selon vos besoins (decommentez la ligne d'abord):

```
###> symfony/google-mailer ###
# Gmail SHOULD NOT be used on production, use it in development only.
MAILER_DSN=gmail://monUserGoogle:monPass@default
###< symfony/google-mailer ###
```

Créez un controller **MailController** et cette action d'exemple:

**Note:**
Vous devez activer l'accès à des applications moins-sécurisées dans votre compte Gmail.

https://support.google.com/accounts/answer/6010255?hl=fr#zippy=%2Csi-le-param%C3%A8tre-autoriser-les-applications-moins-s%C3%A9curis%C3%A9es-est-activ%C3%A9-pour-votre-compte


```php
<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    #[Route("/email")]
    public function sendEmail(MailerInterface $mailer)
    {
        $email = (new Email())
            ->from('zyriab@gmail.com')
            ->to('zyriab@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Le mail fonctionne!')
            ->text('Et c\'est si facile!!')
            ->html('<h3>Regardez la doc de Mailer pour plus d\'info</h3><br><a href=https://symfony.com/doc/current/mailer.html>https://symfony.com/doc/current/mailer.html</a>');

        $mailer->send($email);
        dd("Vérifiez le mail");
    }
}
```





<br>


# 24. Authentification : inscription et login/password

**Objectif** : créer un système d'authentification contenant: 

1.  Un **formulaire de login/password** traditionnel

2.  Un **formulaire d'inscription** pour rajouter des utilisateurs dans la BD

**Important :** Si vous avez une ancienne version de XAMPP assurez-vous d'avoir au moins la version 10.2 de MariaDB. Pour mettre à jour votre version de MariaDB pour xampp suivez les instructions qui se trouvent ici **dans sa totalité** :

<https://stackoverflow.com/questions/44027926/update-xampp-from-maria-db-10-1-to-10-2>

<br>

Créez un projet **ProjetLoginPass**.


<br>

## 2.4.1. Configuration de la sécurité et création d'un formulaire de login

<br>

On va réaliser une configuration de base de la sécurité pour pouvoir créer un formulaire d'inscription/login standard. Pour des options plus avancés (ex : changez d'utilisateur sans devoir se déconnecter de l'application) consultez la documentation ici :

<https://symfony.com/doc/current/security.html>

<https://symfony.com/doc/current/security/form_login_setup.html>


**Resumé de la procédure** à suivre (en détail juste **après**) :

1.  **Installer le support de sécurité dans le projet**

2.  **Créer** **une** **entité** **User** (assistant)

3.  **Créer** (assistant)

    -   Un **controller** pour le **login** et **le logout**

    -   Un **template pour afficher le formulaire** de login

    -   Un **Guard Authenticator**, **classe** qui **traite les
        informations** du formulaire de login

4.  Configurer la BD dans **.env**, créer le **schéma** de la BD, créer et lancer une **migration**

5.  **Encoder des utilisateurs et de passwords dans la BD** (optionnel fixtures)

6.  **Vérifier** le bon fonctionnement en tapant un couple login/pass valable
--
<br>

**Voici la procédure**: 

**1**.  **Installer le support de sécurité dans le projet**

```php
symfony composer req symfony/security-bundle
```

**2**.  **Créer** **une** **entité** **User** avec l'assistant avec **make:user** (pas make:entity!)

```console
symfony console make:user
```

Cette commande crée l'entité, qui **doit** implémenter l'interface
[UserInterface](https://github.com/symfony/symfony/blob/4.2/src/Symfony/Component/Security/Core/User/UserInterface.php)


L'assistant vous demandera :

-   Le nom de la classe (on choisira User)

-   Si vous voulez stocker de données dans la BD avec Doctrine (oui!)

-   La propriété qu'on utilisera pour réaliser le login (on choisira
    email)

-   Si on souhaite hasher les passwords (oui!)


Ouvrez **src/Entity/User.php**:

```php
<?php

<?php
namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}

```

Vous pouvez par après rajouter d'autres propriétés ou méthodes si vous le souhaitez.

**User** est le nom de votre entité.
Si vous avez besoin vous pouvez rajouter d'autres proprietés et méthodes make:entity

L'assistant aura modifié aussi le fichier **security.yaml** (dans
**config/packages**) selon les informations qu'on vient de fournir.

```yaml
.
.
providers:
        # used to reload user from session & other features (e.g. switch_user)
        app_user_provider:
            entity:
                class: App\Entity\User
                property: email
    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false
        main:
            lazy: true
            provider: app_user_provider
.
.
```


**Note** : c'est très important de respecter l'indentation dans les
fichiers .yaml 

**3**.  **Créer le controller, le template et un Guard Authenticator (avec l'assistant)** :

-   Un **controller** pour le **login** et **une route**

-   Un **template pour afficher le formulaire** de login

-   Un **Guard Authenticator**, **classe** qui **traite les informations** du formulaire de login

Ces trois pas se font **avec une seule commande de l'assistant** :
```console
symfony console make:auth
```
Pour les questions posées par l'assistant on choisira :

-   **L'option** **1** pour que Symfony crée un formulaire de login de base et pas seulement le système d'authentification vide

-   **LoginAuthenticator** comme nomme de la classe GuardAuthenticator qui prendra en charge la requête à la BD pour réaliser **l'authentification** (crée dans le dossier **src/Security**)

-   **SecurityController** comme nom du controller (actions login et
    logout)

-   **Oui**, car on veut que Symfony crée aussi l'URL de logout (avec l'action qui deloggera l'user, c.à.d. l'effacer de la session)

-   **Oui** si on veut que la caracteristique **Remember me** soit implementée

Si vous vous trompez dans les options, effacez LoginAuthenticator et le controller SecurityController (avec ses templates) 

Cette action met aussi à jour le fichier de configuration **config/packages/security.yaml**.

```yaml
.
.
main:
    lazy: true
    provider: app_user_provider
    custom_authenticator: App\Security\LoginAuthenticator
    logout:
        path: app_logout
        # where to redirect after logout
        # target: app_any_route

    # Si on a activé "Remember me"
    remember_me:
        secret: '%kernel.secret%'
        lifetime: 604800
        path: /
        always_remember_me: true

.
.
```

Observez que le controller et le template ont été créés. Vous pouvez
accéder à la vue contenant le formulaire de login en tapant la route
de l'action **login** du controller.

**4**. Configurer la BD dans **.env** (**projetloginpass**), créer le
    **schéma** de la BD, créer et lancer une **migration**

```console
symfony console doctrine:database:create
symfony console make:migration
symfony console doctrine:migrations:migrate
```

**5**.  **Encoder des utilisateurs et de passwords dans la BD**

Créez une fixture pour la classe User (voir chapitre précédant sur le
Doctrine Fixtures).

```console
composer require --dev orm-fixtures
```

```console
symfony console make:fixture
```

La fixture portera le nom **UserFixtures**. Attention au nom car si on se trompe il n'y aura pas un message d'erreur.

```php
<?php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{
    
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
         $this->passwordHasher = $passwordHasher;
    }
    
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10 ; $i++){
            $user = new User();
            $user->setEmail ("user".$i."@lala.com");
            $user->setPassword($this->passwordHasher->hashPassword(
                 $user,
                 'lePassword'.$i
             ));
            $manager->persist ($user);
        }
        $manager->flush();
    }
}
```


Cette méthode est plus facile qu'encoder les utilisateurs à la main,
**car le password doit être hashé** et le faire à la main serait trop laborieux.

Doc: <https://symfony.com/doc/current/security.html(2c)

Dans ce cas, la fonction **load** devra créer un utilisateur, fixer ses attributs et le stocker dans la BD. Nous devons utiliser un
service pour encoder le password avant d'appeler à setPassword. Le
service est injecté dans le constructeur de la classe (dependency
injection par le constructeur !!).


**Important :** si votre entité a d'autres attributs (nom, adresse,
etc...) il faudra rajouter les sets qui correspondent

N'oubliez pas de lancer la fixture avec :

```console
symfony console doctrine:fixtures:load
```
où
```console
symfony console d:f:l
```

**Note** : Symfony nous indique qu'il effacera la BD (purge). Choisissez **oui**.

Si vous avez besoin à un moment donné d'obtenir le hash d'un password depuis la console, tapez :

```console
symfony console security:hash-password
```

et puis tapez le password. Vous pouvez par après le copier-coller dans la table (colonne password)

Dans **phpmyadmin** votre tableau **User** ressemblera à :


![](./images/usertable.png)

**6**.  **Vérifier** le bon fonctionnement en tapant un couple login/pass
    valable

Allez sur la page de login (par défaut l'action **login** dans **SecurityController**) et tapez un couple *login/pass* valable (ex: user "user1@lala.com" et password "lePassword"). 

**Si tout va bien vous allez obtenir... une Exception**! car **dans votre controller Authenticator** (**LoginAuthenticator** dans le dossier **src/Security**) vous n'avez pas spécifié une **Response** pour le serveur quand le login est correct.
Ceci arrive car Symfony lance la méthode **onAuthenticationSuccess** du controller **LoginAuthenticator** si le login est correct.

![](./images/loginredirect.png)


Vous avez juste à implémenter cette action pour indiquer quoi faire
dans le cas de succès (modifiez le fichier **src/Security/LoginAuthenticator.php**). 

Voici un exemple :

```php
public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
{
    if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
        return new RedirectResponse($targetPath);
    }

    // throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);

    // nous devons charger une vue ou faire quoi qui ce soit
    // ex:
    // on peut penser à  : return $this->redirectToRoute ('accueil')
    // mais cette classe n'a pas la méthode RedirectToRoute car 
    // elle n'est pas un controller! On utilisera alors :
    return new RedirectResponse($this->urlGenerator->generate('accueil'));
    // on commente/efface la ligne que lance l'exception.
    // throw new Exception('TODO: provide a valid redirect inside '.__FILE__);
}
```

Dans le cas de succès, **le code qui reste** de l'action **login** ne sera pas lancée car on fera un redirect. Ici vers une action de votre choix (ici *accueil*). Pour cet exemple, créez le controller **AccueilController** avec l'assistant, l'action *accueil* et une vue contenant un message de bienvenue.


**Controller** (src/Controller/AccueilController):

```php
<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'accueil')]
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig');
    }
}
```

**Vue** (templates/accueil/index.html.twig)

```twig
{% extends 'base.html.twig' %}

{% block title %}Hello AccueilController!{% endblock %}

{% block body %}
<h1>Bienvenue au site!</h1>
{% endblock %}
```

Si une erreur de login s'est produite, **nous avons deux possibilités** pour le **traiter** :

<br>

**a) Utiliser le template login crée par Symfony et l'adapter à nos besoins (par défaut)**

Dans cet exemple, si le couple login/pass n'est pas correct l'action **onAuthenticationSuccess** ne sera pas lancéé. Symfony **cherchera l'action onAuthenticationFailure** mais elle n'existe pas. **Le code de l'action login continuera** et la variable **error** contiendra l'info de l'erreur de login. La vue du login sera rechargée et affichera (voir **if** dans le code) un div contenant le message de l'erreur qui s'est produite (ex: mail inexistant, invalid credentials si le password n'est pas correcte...).

Dans la vue on peut choisir par nous-mêmes quoi faire s'il y a une erreur, il suffit de vérifier la valeur de cette variable et agir conséquemment (afficher un message d'erreur, rediriger vers un autre site etc...). On peut aussi juste établir une traduction pour les messages d'erreur de base de Symfony, car par défaut ils seront en anglais!

À chaque essai de login c'est conseillé de lancer l'action **logout** pour effacer le contenu de la session. On parlera du logout plus bas.

<br>

**b)**  Rajouter une action **onAuthenticationFailure** dans **LoginAuthenticator.php** 

L'action **onAuthenticationFailure** sera lancée quand il à chaque erreur de login, de la même manière que **onAuthenticationSuccess** est lancée dans le cas de succès. Elle est commentée dans le code, effacez les commentaires pour que Symfony la trouve. Le comportement expliqué dans **a)** sera logiquement annulé car le code de la vue ne sera plus lancé.


```php
// méthode faite par nous-mêmes. Enlevez les commentaires pour voir l'effet. Importez AuthenticationException
public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
{
    // la méthode est doit renvoyer une réponse. 
    // à nouse de rediriger, lancer une exception ou autre...
    return new Response ("Erreur dans le login");
}
```

<br>

## 24.2. Création d'un formulaire d'inscription

Nous allons créer un formulaire d'inscription.

Vous pouvez créer un formulaire d'inscription automatiquement et le personnaliser après en suivant les instructions de cette documentation
:

<https://symfony.com/doc/current/doctrine/registration_form.html>

Si vous n'avez pas réalisé les opérations du chapitre précédente,
suivez au moins les pas 1,2,3 pour configurer la sécurité dans
Symfony, créer l'entité User et le Guard Authenticator.

Voici la continuation de la procédure, qui créera un formulaire
d'inscription :

Lancez, dans la console :

```console
symfony console make:registration-form
```
Suivez les instructions de l'assistant. Choisissez si :

- Vous voulez qu'on ne puisse pas avoir de doublons dans les Users (yes) 
- Vous voulez envoyer un lien d'authentification pour l'inscription par mail. Si oui, Symfony vous demandera de taper l'adresse mail et il faudra configurer le protocol de mail. **Tapez 'no'** car on veut simplifier cet exemple
- Vous voulez que les utilisateurs soient connectés directement après l'inscription (comme dans la plupart de sites)

L'assistant créera :

-   Une classe formulaire (**RegistrationFormType**)

-   Un controller (**RegistrationController**) qui crée l'objet formulaire et le renvoie à la vue

-   Un template qui affiche le formulaire (**register.html.twig**)


Pour pouvoir réaliser la vérification par mail (nous n'allons pas la faire ici) on a besoin d'installer un package :

```console
symfony composer req symfonycasts/verify-email-bundle
```
mais ce n'est pas notre cas pour le moment.

Testez le formulaire en lançant l'action **register**.
Adaptez le formulaire, le controller et la vue selon vos besoins.

**Important :** si vous modifiez l'entité User pour, par exemple,
en rajoutant une propriété **nom,** et vous voulez **générer à nouveau le formulaire d'inscription**, **effacez** d'abord **le formulaire** RegistrationFormType.php, **le controller** RegistrationController.php **et le template** register.html.twig.

<br>

## 24.3. Logout

Par défaut, la route **logout** nous menera vers l'action qui affiche le formulaire de **login**. Si on veut lancer une autre action on devra le spéficier dans la configuration, comme expliqué ci-dessous.

1. Rajoutez dans **config/packages/security.yaml** une section qui **indique le path à saisir dans l'URL** et l'action à lancer après que Symfony finisse de gérer le logout (ex: effacer l'objet User de la session) 
   
Il y a deux parties à configurer: 

**path**: Le **name** de l'action logout créé par Symfony dans le controller de securité (**SecurityController**)

**target** : La **route** (pas le name!) de l'action qui sera lancée par Symfony **après** l'action de logout (qui est vide la plupart de fois)

"Faire le logout" est, en gros, effacer l'objet User de la session. Symfony s'en chargera de le faire sans votre intervention


```yaml
    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false
        main:
            lazy: true
            provider: app_user_provider
            custom_authenticator: App\Security\LoginAuthenticator
            logout:
                path: logout
                target: /apres/logout 
            

```
On peut choisir le **path** selon nos besoins.

**Important** : Respectez l'indentation dans les fichiers .yaml. Elle est faite avec des espaces et pas de tabulations!

On doit avoir une action à lancer **après** le logout.

1. Laissez vide l'action de logout (elle ne sera jamais lancée) et créez l'action à lancer après d'avoir fini le traitement du logout (effacer user, session etc...)

**ProjetLoginPass** contient cette fonctionnalité. L'action cible se
trouve dans **SecurityController**.

```php
    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        // throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route("/apres/logout")]
    public function apresLogout()
    {
        // on peut faire ce qu'on veut ici, en général ré-diriger vers une autre route. 
        // return $this->redirectToRoute('ma_route');
        return $this->redirectToRoute('app_login');
    }
```

<br>


# 25. Accès à l'objet app.user

Si vous utilisez le système d'authentication de Symfony, une fois l'utilisateur est connecté vous pouvez obtenir son objet **User** associé :

**1.**  Dans le controller

```php
$this->getUser()
```

**2.**  Dans la vue

```twig
app.user
```

Les deux méthodes renvoient l'objet User représentant l'utilisateur
qui es connecté ou **null** si personne n'a fait login.

L'objet User contient **toutes les propriétés et on peut les accéder en utilisant les gets et sets**.

Par exemple :

```twig
{{ dump (app.user) }}
```

Ces deux instructions donnent les même résultat car **app.user.username**
est juste un **raccourci** de Symfony pour **user.getUsername()**

```twig
{{ dump (app.user.getUsername()) }}
{{ dump (app.user.username) }}
```

Des actions d'exemple se trouvent dans le projet **ProjetLoginPass**, controller **SecurityController**

<br>

# 26. Authentication et Rôles 

## 26.1. Gestion des rôles

Nous allons traiter la gestion de rôles en Symfony et on va utiliser comme base le projet qu'on vient de créer, **ProjetLoginPass**. Nous voulons profiter de toute la partie d'authentification qui reste la même et qu'on ne veut pas refaire.

1.  Faites une copie complete du projet **ProjetLoginPass** de github dans un autre dossier **ProjetLoginPassRoles**

2.  Changez le nom de la BD dans .env à **projetLoginPassRoles**. Effacez les migrations (dans le dossier **migrations**, elles correspondent à l'autre projet)    

3.  Juste pour enrichir le projet et montrer que c'est faisable, rajouter une propriété **nom** à l'entité User

```console
symfony console make:entity User
```

4.  Rajoutez un champ **TextType** au formulaire et effacez la section "agree terms" dans **FormRegistrationFormType.php** pour pouvoir saisir le nom aussi dans le form d'inscription. Effacez le champ **agreeTerms**


```php
.
.
        $builder
            ->add('email')
            ->add('nom', TextType::class)
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
.
.
```

5.  Editez le formulaire d'inscription (vue **registration/registration.html.twig**). Rajoutez la génération du champ du formulaire **nom**


Et effacez la génération du champ **agreeTerms**

```php
{% extends 'base.html.twig' %}

{% block title %}Register{% endblock %}

{% block body %}
    <h1>Register</h1>

    {{ form_errors(registrationForm) }}

    {{ form_start(registrationForm) }}
        {{ form_row(registrationForm.email) }}
        {{ form_row(registrationForm.nom) }}
        {{ form_row(registrationForm.plainPassword, {
            label: 'Password'
        }) }}
        <button type="submit" class="btn">Register</button>
    {{ form_end(registrationForm) }}
{% endblock %}
```


Vous pouvez tester ce formulaire. Il manque uniquement la fonctionnalité de rajouter les rôles mais on la fera plus tard. Vous pouvez toujours éditer les rôles plus tard à la main ou en utilisant la méthode **setRoles** de l'entité!

1.  Créez et migrez la BD
```php
symfony console doctrine:database:create
symfony console make:migration
symfony console doctrine:migrations:migrate
```

2.  Remplacez la fixture par celle-ci, qui rajoute des Users avec de
    rôles (comprenez le code!)


```php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



class UserFixtures extends Fixture
{
    
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
         $this->passwordHasher = $passwordHasher;
    }
    
    public function load(ObjectManager $manager)
    {
        // on va créer 5 admins et 5 clients+gestionnaires
        for ($i = 0; $i < 5 ; $i++){
            $user = new User();
            $user->setEmail ("newuser".$i."@lala.com"); // user1@lala.com, user2@lala.com etc....
            $user->setPassword($this->passwordHasher->hashPassword(
                 $user,
                 'lePassword'.$i // lepassword1, lepassword2, etc...
             ));
            $user->setNom("nom".$i);
            $user->setRoles(['ROLE_ADMIN']);
            $manager->persist ($user);
        }
        for ($i = 0; $i < 5 ; $i++){
            $user = new User();
            $user->setEmail ("autreuser".$i."@lala.com"); // user1@lala.com, user2@lala.com etc....
            $user->setPassword($this->passwordHasher->hashPassword(
                 $user,
                 'lePassword'.$i // lepassword1, lepassword2, etc...
             ));
            $user->setNom("nom".$i);
            $user->setRoles(['ROLE_CLIENT','ROLE_GESTIONNAIRE']);
            $manager->persist ($user);
        }
        $manager->flush();
    }
}
```


Lancez les fixtures. **UserFixtures** crée plusieurs types d'user. Selon le système de rôles de Symfony, vous pouvez choisir vous-mêmes les noms des rôles en sachant que le nom du rôle doit commencer par **ROLE_** (ex: ROLE_CLIENT, ROLE_ADMIN, ROLE_PARTICIPANT...)

```php
symfony console doctrine:fixtures:load
```
(ne rajoutez pas --append car vous voulez carrément effacer le tableau User)

**Note** : Une autre option pour remplir les users (plus élaborée, possible alternative à la fixture et qui n'est pas convenable ici) est de créer un user ayant un rôle ROLE_SUPER_ADMIN qui puisse accéder à la gestion de tous les utilisateurs en utilisant un formulaire. Cet user aura accès à une route qui affiche un deuxième formulaire d'inscription/modification permettant le choix/modification du rôle des utilisateurs. Attention car la sécurité de votre site peut être en jeu !

<br>

## 26.2. Contrôle d'accès par rôles

Puis vous pouvez restreindre l'accès à un User possedant certains rôles de trois manières :

1.  dans **security.yaml**

2.  dans un **controller**

3.  dans une **vue**

On va développer ici un exemple de chaque méthode. Le plus simple est de réaliser les restrictions dans le controller, mais ce ne sera pas le plus propre dans certains situations. 


### 26.2.1. Dans security.yaml 

On peut restreindre l'accès à de grandes sections de notre site (ex: partie admin) avec **le control d'accès dans** **config/packages/security.yaml.** C'est assez simple mais il faut connaitre un minimum les expressions régulières ou adapter les exemples ci-dessous à vos besoins

<https://symfony.com/doc/current/security.html#security-authorization-access-control>

1.  **Créez un controller** *GestionController* et deux actions. On utilisera ces actions pour vérifier le bon fonctionnement des restrictions qu'on fera plus tard dans security.yaml

Pour tester la route vous devez faire login avant. Observez ce qui se passe si vous n'êtes pas connectés (objet app.user vide)

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GestionController extends AbstractController
{
    // ces routes seront accessibles uniquement pour certains roles
    // quand on le fixera ainsi dans /config/packages/security.yaml. 
    #[Route("/gestion/action1")]
    public function action1()
    {
        return $this->render('gestion/action1.html.twig');
    }
}
```

Voici un exemple de code pour action 1, qui afficher les rôles de l'utilisateur connecté actuellement.

```twig
{% extends 'base.html.twig' %}

{% block title %}Hello GestionController!{% endblock %}

{% block body %}
Voici action 1
{# afficher l'objet app.user #}
{{ dump (app.user)}}
{# afficher les rôles de cet user (vous pouvez les voir dans la BD) #}
{{ dump (app.user.getRoles())}}
{% endblock %}
```

2.  **Créez les restrictions dans security.yaml**

    Les deux actions de ce controller doivent être accésibles uniquement par un utilisateur ayant le role ROLE_ADMIN. C'est dans
    **security.yaml** qu'on a fixé cette restriction :

```yaml
access_control:
        - { path: ^/gestion, roles: [ROLE_ADMIN] }
```

Faites logout. Faites login avec un user de chaque type (regardez la
BD) et essayez de lancer les actions gestion/action1 et gestion/action2 (depuis l'URL). Observez les résultats selon l'user qui est connecté : seulement les users ayant le ROLE_ADMIN pourront lancer ces actions. Les autres obtiennent une exception **Access Denied**


<br>

### 26.2.2. Dans le controller

Si on ne veut pas créer de restrictions par routes dans **security.yaml**, on peut tout simplement **vérifier si l'utilisateur qui est connecté possède le rôle demandé**.
La façon la plus simple est d'utiliser des **annotations pour l'action** (@IsGranted ou encore mieux, **@Security**. Regardez des exemples ici: 

https://symfony.com/bundles/SensioFrameworkExtraBundle/current/annotations/security.html


Si l'utilisateur ne possède pas le rôle fixé dans l'action, **une exception sera lancée.** Pour tester le bon fonctionnement faites d'abord logout. Faites login avec un user de chaque type (regardez la BD) et essayez de lancer les actions *autre/action1* et *autre/action2* (depuis l'URL). Observez les résultats selon l'user qui est connecté: seulement les ROLE_ADMIN peuvent accéder à cette action.


```php
    // exemple de contrôle d'accès en utilisant IsGranted (ici on a utilisé un attribut PHP, pas une annotation. Le résultat est le même)
    #[IsGranted('ROLE_ADMIN')]
    #[Route("/gestion/action2")]
    public function action2()
    {
        return $this->render('gestion/action2.html.twig');
    }
```
Créez la vue pour l'action2 (juste copiez-collez celui de l'action1)

<br>

### 26.2.3. Restriction d'accès dans la vue

Vous pouvez aussi vérifier les rôles dans les vues pour afficher/masquer
le code de votre choix selon le rôle de l'utilisateur qui est connecté
en utilisant **is_granted**.

Créez une nouvelle action **action 3** qui ne limite pas par rôle :

```php
// exemple de contrôle d'accès dans la vue
#[Route("/gestion/action3")]
public function action3()
{
    // cette fois on va controller l'accès dans la vue
    return $this->render('gestion/action3.html.twig');
}

```

Et contrôlez le rôle dans la vue (action3.html.twig):

```twig
{% extends 'base.html.twig' %}

{% block title %}Hello AutreController!{% endblock %}

{% block body %}

{% if is_granted('ROLE_ADMIN') %}
La vie de l'admin est dure
{# ex: <a href="{{ path ('effacer_user') }}">effacer</a> #}
{% else %}
La vie est belle
{% endif %}
{{ dump (app.user)}}
{{ dump (app.user.getRoles())}}
{% endblock %}
```


## 26.3. Gestion de l'erreur "Access Denied" (exception) en utilisant une classe propre

Pour **personnaliser l'action à réaliser** en cas **d'erreur d'accès par rôle** vous devez utiliser une classe propre.

1.  **Créer une classe** (ici c'est **Security/GestionnaireErreurAcces.php**) **contenant une action où on fixera l'action à réaliser**. Voici un exemple où, **dans le cas d'une erreur d'accès**, on redirige vers login (notez que la redirection se fait de manière différente quand on se trouve à l'extérieur du controller)

Il y a deux cas de figure pour une erreur d'accès:

a) Si l'utilisateur n'est pas authentifié (ou authentifié de manière anonyme), un point d'entrée d'authentification est utilisé pour générer une réponse (généralement une redirection vers la page de connexion ou une réponse 401 non autorisée)

b) Si l'utilisateur est authentifié, mais ne dispose pas des autorisations requises, une réponse 403 Forbidden est générée.

Ici on va traiter le deuxième cas de figure :

```php
<?php 
// src/Security/GestionnaireErreurAcces.php
namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;

class GestionnaireErreurAcces implements AccessDeniedHandlerInterface
{


    private $router;

    public function __construct (UrlGeneratorInterface $router){
        $this->router = $router;

    }

    public function handle(Request $request, AccessDeniedException $accessDeniedException) :?Response
    {
        // choisissez la route vers laquelle y aller. Ici on a choisi app_login
        return new RedirectResponse ($this->router->generate ("app_login")); 
    }
}
```

Pour que ce gestionnaire soit lancé, vous devez créer la clé **access_denied_handler** dans **security.yaml** qui pointe vers la classe qu'on vient de créer (indentation !!!)

```yaml
            logout:
                path: logout
                target: /apres/logout 
                # where to redirect after logout
                # target: app_any_route
            access_denied_handler: App\Security\GestionnaireErreurAcces

```
Si vous avez gardé le template de login original, modifiez le lien pour le logout (app_logout devient **logout** ou un autre nom choisit par vous dans la section de logout déjà expliquée):

```twig
You are logged in as {{ app.user.username }}, <a href="{{ path('logout') }}">Logout</a>

```
<br>

## 26.4. Fenêtre modale pour le login avec AJAX (assurez-vous de bien gérer AJAX avant)


Cette section explique plus en profondeur le comportement du système de login/pass qu'on peut créer automatiquement avec **make:auth**, ainsi que les bases pour modifier ce système en utilisant une **fenêtre modale et Ajax**.

On part du principe que vous avez déjà créé votre entité user et le système de login avec make:auth (voir les sections précédentes).

L'action login créé par Symfony rend toujours la vue qui affiche le login ($this->render).

Avec la configuration par défaut de Symfony, cette action sera lancée dans deux cas de figure :

- **GET** : **quand on tape /login dans l'URL** du navigateur ou, normalement, quand on génère la route **avec un href**

- **POST** : quand on fait **submit** dans un formulaire dont l'action pointe vers la route de cette action.

Dans le code généré par Symfony pour le form de login **il n'y a pas d'attribut "action".** Ça implique que quand on clique sur le bouton de submit on chargera à nouveau la même route (dans ce cas ça sera */login*). Plusieurs actions de la classe de notre Authenticator seront lancées **avant de lancer le code de cette action.**

**En résumé** :

1.  si on tape /login dans **l'URL**, l'action fait un rendu de la vue login.html.twig. La vue envoie deux paramètres au controller : le dernier utilisateur connecté avec succès et un message correspondant à l'erreur qui s'est produite dans le dernier essai de connexion

2.  si on fait **submit** et le **login est ok** on charge
    **onAuthenticationSuccess** et **puis le code de l'action login**,
    **sauf** si à l'intérieur de la méthode onAuthenticatioSuccess on
    redirige vers une autre action.

**Note**: sachez que cette action sera aussi appelée si on crée un form d'enregistrement et on choisit d'être connecté automatiquement après l'enregistrement

3.  si on fait **submit** et le **login n'est pas ok** on charge
    **onAuthenticationFailure**. Si cette action n'existe pas on charge
    directement le code de l'action login, qui charge à son tour la vue
    login. Pareil que dans onAuthenticationSuccess on peut rediriger,
    lancer une exception ou quoi que ce soit. La différence est que
    cette action est optionnelle, mais onAuthenticationSuccess est
    obligatoire.

Comme nous l'avons déjà dit, dans le code généré par défaut par Symfony
l'action login envoie toujours deux valeurs à la vue :

1. **lastUsername** : contient le nom du dernier utilisateur qui s'est
connecté correctement

2. **error** : objet qui contient des infos sur l'erreur qui s'est
produit (email inexistant, crédentielles invalides...)

Ces infos sont utilisées dans le template par défaut, **mais bien évidemment vous pouvez les utiliser comment vous voulez** en changeant le template!



### Adaptation à Ajax et fenêtre modale

Dans plein de cas on va vouloir utiliser une fenêtre modale pour le login (ou même pour d'autres actions). Considérons un cas générique :

1)  On est sur un site contenant une **nav** qui contient un lien *login/inscription* à l'intérieur. On clique et une fenêtre modale apparait. Cette fenêtre est juste un div caché qui se trouve quelque part dans la page (header.html.twig, par exemple). 
C'est ici où on inclura notre template de login login.html.twig, mais adapté au contexte et contenant AJAX.

1)  Quand on remplit le login on aura deux cas de figure possibles

    **a**.  **Login ok** : on ferme le div et on est dans l'accueil (ou index). On modifie quoi que ce soit dans la page avec AJAX pour montrer à l'utilisateur qu'il s'est connecté correctement (ex: icône dans la nav). On peut aussi rediriger, mais on va devoir le faire avec JS (explication plus tard)

    **b**.  **Login pas ok** : on affiche un message d'erreur dans un div qui était vide et qui se trouve dans le code du div de login (la "fenêtre modale")

Pour ce faire on a besoin d'AJAX. Pour nous faciliter la tâche on utilisera Axios. 


**Voici la procédure pour la création de la fenêtre modale si vous voulez l'utiliser dans un projet**. Sachant que la procédure dépend fortement du template à utiliser, on montre une procédure générique.


1. Inclure la vue **login.html.twig** créé par Symfony là où se trouve le code de la fenêtre modale. Remplacez le code original de la fenêtre modale (ex: un div quelque par  dans le template). Utilisez include (twig) dans ce div pour inclure *login.html.twig*. 
On peut adapter le code selon nos besoins. 

```twig
.
.
.
<div id="modal_window_div_container">
<!-- ancien code de la fenêtre modale, maintenant en commentaires  
<form>
    <div class="form-group">
    .
    .
    </div>
</form> 
-->
{# nouveau code: notre template de login #}
{% include "security/login.html.twig" %}
</div>
.
.
.
```



2. Dans le template **login.html.twig** du login, **créer des id**: un pour le **bouton** et un autre pour le **Form** car on va utiliser Ajax et on doit rajouter un événement et créer un objet FormData.

```twig
<form id="formLogin">   <!-- pas d'action ni de méthode, on utilise Axios -->
.
.
    <button class="btn btn-lg btn-primary" type="submit" id="btnLogin">
```


3. Toujours dans le même template, rajoutez aussi un **div** pour afficher les **messages d'erreur**

```twig
<!-- pour afficher l'erreur -->
<div id="divMessageErreur">
<!-- vide par défaut -->
</div>
```
<br>

4. Toujours dans le même template, **importer axios et faire un appel ajax** à l'action login **en lui envoyant le form**. La route est **(app_login)**. Ce n'est pas notre cas, mais si vous utilisez un fichier externe .js au lieu d'incruster le js dans le twig, utilisez les **datasets** pour stocker la route dans un des objets du DOM ou utilisez **FOSJsRoutingBundle**.

On peut créer un block **customjs** qui sera present seulement dans, par exemple, la master page (base.html.twig, header.html.twig... ça dépend du template). 

Ce bloc peut se trouver éventuellement à l'intérieur d'un bloc **content** ou autre. 

Vous devez choisir quoi faire selon ce qu'on reçoit du controller.
Ici on affiche un message d'erreur ou on redirige (ici on peut!) vers l'accueil.

Voici **login.html.twig** adapté, qui **se trouvera inclut quelque part dans le site** dans le div d'une fenêtre modale:

```twig
<!-- contenu à incruster dans le div container  -->

<form id="formLogin">    
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail">Email</label>
    <input type="email" value="" name="email" id="inputEmail" class="form-control" required
        autofocus>
    <label for="inputPassword">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" required>

    <input type="hidden" name="_csrf_token" value="{{ csrf_token('authenticate') }}">

    <button class="btn btn-lg btn-primary" type="submit" id="btnLogin">
        Sign in
    </button>
</form>

<!-- pour afficher l'erreur -->
<div id="divMessageErreur">
<!-- vide par défaut -->
</div>

{% block customjs %}
<!-- ce bloc est imbriqué dans le bloc qui a l'include -->
<!-- pas besoin de parent car ce code est inclut dans le base.html.twig avec include  -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    document.getElementById("btnLogin").addEventListener("click", function (event) {
        event.preventDefault();
        axios({
            url: '{{ path ("app_login") }}',
            method: 'POST',
            headers: { 'Content-Type': 'multipart/form-data' },
            data: new FormData(document.getElementById("formLogin"))
        })
        .then(function (response) {
                // response.data est un objet qui correspond à l'array associatif envoyé dans le controller
                // JsonResponse a transformé l'array en JSON. Axios transforme le JSON en objet JS
                
                // si erreur
                if (response.data.error != undefined) {
                    divMessageErreur.innerHTML = response.data.error;
                }
                // si pas d'erreur
                else {
                    console.log ('connexion ok login');
                    window.location.href = "{{ path ('accueil') }}";
                }
                
        })
        .catch(function (error) {
                console.log(error);
        });
    });    
</script>
{% endblock %}
```


5. **Adapter l'action de login** (SecurityController dans le projet).

Cette action, dans notre cas, n'est jamais appelée dans l'URL.

Si une erreur s'est produite, on envoie le lastUserName et l'erreur pour que la vue le traite en JS. S'il n'y a pas d'erreur, on envoie uniquement le lastUserName. Notez qu'on **ne peut pas rediriger vers une autre action ici car on doit renvoyer une response JSON!! (on a appelé avec Axios) .** Si on essaie une redirection, le rendu de la vue correspondante se trouvera dans la reponse du serveur mais elle ne sera pas chargée dans le navigateur.


```php
#[Route("/login/modal", name="app_login")]
public function login(AuthenticationUtils $authenticationUtils, Request $req): Response
{
    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();
    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();
    $response = new JsonResponse(['lastUsername' => $lastUsername]); // cas de base : pas d'erreur 
    // si erreur, on envoie le message. Il faut choisir le message qu'on affiche selon l'erreur

    // ou tout simplement afficher login/pass incorrecte
    if (!is_null($error)) {
        $response = new JsonResponse([
            'error' => 'Utilisateur ou mot de passe incorrectes', //$error->getMessage(), // autrement on envoie tout un objet!
            'lastUsername' => $lastUsername
        ]);
    }
    return $response; // on renvoie la reponse dans tous les cas. Elle sera traitée en JS
}
```

6.  Dans le Authenticator (LoginAuthenticator), modifiez l'action **onAuthenticationSuccess** pour qu'elle redirige vers l'accueil. Dans le template de l'accueil vous pouvez incruster les données de l'utilisateur là où vous voulez.

```php
public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)

{

    // if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
    //     return new RedirectResponse($targetPath);
    // }
    // redirigez vers login: là on fera reponse JSON qui nous convient.
    // Contrairement à certaines docs, on ne peut pas renvoyer null ni éliminer la méthode

    return new RedirectResponse($this->urlGenerator->generate('accueil'));

    // For example : return new RedirectResponse($this->urlGenerator->generate('some_route'));

    // throw new Exception('TODO: provide a valid redirect inside '.__FILE__);
}
```

7. Changer la nav ou le template de base pour afficher l'utilisateur qui vient de se connecter

    Ex. de base dans **header.html.twig** :

```twig
{% if app.user.username is defined %}
logged: {{ app.user.username }} 
{% endif %} 
```

<br>


# 27. Pagination (sans AJAX)

## 27.1. Installation et exemple pratique

Exemple pratique : projet **ProjetPaginatorNoWebpack**

1.  Installez le module KpnPaginatorBundle

<https://github.com/KnpLabs/KnpPaginatorBundle>

```console
symfony composer req knplabs/knp-paginator-bundle
```

2.  Créez ce fichier de configuration **kpn_paginator.yaml** dans **config/packages**. En principe utilisez la configuration par défaut (vous pouvez personnaliser cette config en regardant la doc. du package)

```yaml
knp_paginator:
    page_range: 5                       # number of links showed in the pagination menu (e.g: you have 10 pages, a page_range of 3, on the 5th page you'll see links to page 4, 5, 6)
    default_options:
        page_name: page                 # page query parameter name
        sort_field_name: sort           # sort field query parameter name
        sort_direction_name: direction  # sort direction query parameter name
        distinct: true                  # ensure distinct results, useful when ORM queries are using GROUP BY statements
        filter_field_name: filterField  # filter field query parameter name
        filter_value_name: filterValue  # filter value query parameter name
    template:
        pagination: '@KnpPaginator/Pagination/sliding.html.twig'     # sliding pagination controls template
        sortable: '@KnpPaginator/Pagination/sortable_link.html.twig' # sort link template
        filtration: '@KnpPaginator/Pagination/filtration.html.twig'  # filters template
```

3.  Dans une action de votre controller (créez un si vous n'en avez pas), récupérez une instance du paginator (service). Voici un exemple commenté (vous pouvez copier Entity/Repository/DataFixtures de ProjetModele):

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


// attention!
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class ExemplePaginationController extends AbstractController {

    #[Route("/exemple/pagination", name:"exemple_pagination")]
    public function exemplePagination(PaginatorInterface $paginator, Request $request, ManagerRegistry $doctrine)
    {

        $livres = $doctrine->getRepository(Livre::class)->findAll();
        
        // Cette méthode est plus rapide que findAll
        // $livres = $doctrine->getRepository(Livre::class)->createQueryBuilder('l')->getQuery();

        $numeroPage = $request->query->getInt('page', 1); // 1 par défaut, s'il n'y a pas de page dans l'URL

        $paginationLivres = $paginator->paginate(
            $livres,
            $numeroPage,
            5 // résultats affichés par page
        );
        return $this->render(
            'exemple_pagination/exemple_pagination.html.twig',
            ['paginationLivres' => $paginationLivres]
        );
    }
}
```


3.  Voici la vue correspondante, où on trouvera la pagination :

```twig
{% extends 'base.html.twig' %}

{% block title %}Hello ExemplePaginationController!{% endblock %}

{% block stylesheets %}
<link href="{{ asset ('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
{% endblock %}

{% block body %}

{% for livre in paginationLivres %}
<div class="">

    {{ livre.titre }}<br>
    {{ livre.description }}

</div>
{% endfor %}

{# inclusion de la pagination  #}
<div class="paginationLivres">
    {{ knp_pagination_render (paginationLivres) }}
</div>

{% endblock %}

{% block javascripts %}
{% endblock %}
```

<br>


## 27.2. Filtres et pagination (sans Ajax)

<br>

NavigationController: exemple de controller avec un form contenant de filtres. NO AJAX

Routes et éléments à observer :

1. **/navigation/pagination** : charger le page d'accueil et la barre de navigation
   
2. **/contenu/base** (click sur *Recherche avec Pagination (no Ajax)*: route qui **affiche** et **traite** le form. On crée **le contenu à afficher grâce au repo**. 
 
Le repo **renvoie déjà un objet PaginationInterface** (au lieu d'un array d'objet) qu'on peut passer au paginator.
Cet objet est parcourable avec une boucle for (voir code navigation_pagination/contenu_base.html.twig)

Lisez attentivement le code de l'action.

On a choisi, par défaut, d'envoyer déjà un ensemble de résultats à la vue (une recherche sans filtres car 'data' contient que la page pour le paginator, pas d'autres valeurs du form)


```
{% for film in filmsFiltres %}
.
.
.

{{ knp_pagination_render(filmsFiltres) }}
```


3. **Repository\FilmRepository**: lire tous le commentaires. 
4. **Form\FilmType**: lire tous les commentaires


<br>


# 28. JS et CSS avec Webpack encore

Si vous voulez utiliser du JS et CSS vous pourriez juste créer un dossier dans public et inclure vos fichiers .**js** et .**css**, mais la bonne pratique consiste à utiliser un outil comme **Webpack**. Symfony possède l'extension **Webpack Encore**, qui facilite énormément l'installation et utilisation de Webpack.

Le but de Webpack est de **centraliser la charge de tout notre code JS et CSS dans un seul** (ou éventuellement plusieurs si on le souhaite) **fichier .js**. Webpack permet en plus de compiler, minimiser et découper en morceaux notre code pour optimiser le chargement dans l'application.

On va procéder à installer Webpack dans un projet vide  (ou dasn votre propre projet) et réaliser
quelques exemples. Créez un projet **ExemplesWebpack** et un controller **MainController** (le projet complet est disponible dans le repo).

En plus de configurer webpack pour gérer nos .js et .css, on va faire le necéssaire pour installer **bootstrap** et **axios** dans notre projet et ne plus utiliser des CDNs.

<br>

## 28.1. Installation de Webpack Encore et de Node


0. **Installez Node.js**

https://nodejs.org/en/download/

<br>

1.  **Installez le module Webpack Encore dans votre projet**

```console
symfony composer req symfony/webpack-encore-bundle
```

**Cette installation ('recipe'):**

- Crée le dossier **/assets** (à ne pas confondre avec un possible dossier **/public/assets** qu'on aurait pu créer avant d'utiliser Webpack Encore

- Crée le fichier **/assets/app.js** qui, dans un prémier moment,  centralisera la charge de tout le code **js** et **css** (voir **entryPoints** plus tard, car on peut avoir plusieurs fichiers où on compile le code)

- Crée un fichier **/webpack.config.js** qui contient la configuration du module

1. **Installez le dépendances JS de Webpack Encore**. Lancez :

```console
npm install 
```

```console
yarn install
```

Cette ligne crée le dossier **node_modules** contenant les dépendances (du code .js) dont Encore a besoin. Le dossier est rajouté ./gitignore


<br>

## 28.2. Configurer Webpack Encore 

<br>


Dans cette section on configure webpack et on lui indique quels sont les fichiers de script qu'on va utiliser dans notre app.

<br>

Ouvrez le fichier **/webpack.config.js** pour configurer Encore. Vous
pouvez personnaliser Encore selon vos besoins :

.**setOutputPath** : emplacement des fichiers **compilés**

.**setPublicPath** : le chemin utilisé par le serveur (ex: dans le code
des vues) pour accéder l'OutputPath qu'on vient de mentionner

**Note**:  uniquement sur le serveur d'Interface 3 on doit changer 
```
.setPublicPath('/build')  
```
vers: 
```
.setPublicPath('/project1/public/build')  // au lieu de .setPublicPath('build') à cause du ALIAS d'APACHE (uniquement serveur Interface3)
```

.**addEntry** **('app','./assets/app.js')** : on aura un
**entry** pour **chaque fichier .js qui regroupe un ensemble de code**. Ici on a crée un entry portant le nom "app" qui pointe vers un fichier
app.js. On peut avoir d'autres Entries (d'autres fichiers) dont le code sera rajouté au code final.

Vous pouvez carrement rajouter de fichiers .js et donner un nom pour l'entry:
```js
    .addEntry('exemple1AjaxFormData','./assets/exemple1AjaxFormData.js')
    .addEntry('autreJs','./assets/autreJs.js')
```
Puis vous **copiez votre fichier .js dans l'emplacement que vous avez indiquez dans l'Entry**. Cette procédure va indiquer à Webpack quels seront les fichiers .js qu'on va avoir dans notre app.

Continuez pour savoir comment les utiliser dans vos vues.


**Note**: Ouvrez le fichier **app.js** et observez qu'on importe le **.css**! (Concrètement on importe le fichier **/assets/css/app.css**)

<br>

## 28.3. Lancer Webpack 

<br>

Maintenant on doit compiler les fichiers.
Vous pouvez utilisez **npm** ou **yarn**. Ce n'est pas une bonne idée de melanger les deux.

Pour compiler les assets une seule fois, lancez

```console
npm run dev
```
**ou**

```console
yarn encore dev
```


Si on ne veut pas récompiler à chaque changement dans le .js ou le .css, on lancera :

```console
npm run watch
```

**ou**

```console
yarn encore dev --watch
```

npm (ou yarn) lancera un **serveur* qui detectera (presque toujours :D) les changements dans les fichiers .js et .css et recompilera par lui-même. Attention car il ne detectera pas vos erreurs dans js (observez bien la console du navigateur pendant l'execution de votre code)

Si vous obtenez des erreurs de compilation, il se peut que vous deviez arreter et ré-demarrer le serveur (CTRL-c)

Finalement, et juste quand l'app est finie et on veut créer la version de production, on lance :

```console
npm run build
```

ou 

```console
yarn encore production
```

Webpack Encore compilera le code JS et CSS final dans le dossier **public/build**. Le dossier contiendra un nouveau fichier **app.js** et un **app.css** qui rassembleront tout le contenu JS et CSS (ainsi que les fichiers **manifest.json**, **entrypoints.json**, **runtime.js**) **sauf si on a crée plusieurs entries. Dans ce cas on aura plusieurs fichiers**

<br>

## 28.4. Importer les scripts dans les vues

<br>

Dans cette section on voit comment importer le code js dans nos vues, c'est très simple.

Pour faciliter l'utilisation de Webpack dans les templates on a deux fonctions: 

{{ encore_entry_link_tags ('app') }}
{{ encore_entry_script_tags ('app') }}

Ce sont les **Helpers** Vous pouvez inclure ces appels dans vos blocs **javascripts** et **css** dans les vues.

Pour inclure le **css** qui apparait dans votre entry: 

```twig
{{ encore_entry_link_tags ('app') }}
```

Pour inclure le **js** qui apparait dans votre entry :
```twig
{{ encore_entry_script_tags ('app') }}
```

<br>

**Note**: Le js et css qui apparait dans votre entry est compilé et existe en **build** de toute façon. 
Vous avez le choix de l'inclure dans votre vue ou pas, mais le code compilé existe toujours. 

<br>

La reference 'app' est configurée dans le fichier **entrypoints.json**,
qui a été crée à partir de votre fichier **webpack.config.js**. Vous pouvez utiliser un autre nom et, Comme nous l'avons déjà dit, avoir plusieurs **entries** ('app', 'autre', 'main'...)


Par exemple :
```twig
{{ encore_entry_script_tags ('exemple1AjaxFormData') }}
{{ encore_entry_script_tags ('autreJS') }}
```


<br>


## 28.5. Exemple d'utilisation de Webpack avec un fichier pour une vue specifique

<br>

Voici un exemple de code où on utilise Webpack pour inclure du .js et .css dans une vue concrete. On crée du .css et .js qu'on va inclure dans une vue concrete.

<br>

**0**. Lancez **npm install** ou **yarn install**  pour installer les dependances d'Encore


**1**. Créez votre fichier **/assets/styles/vue1.css** contenant votre code .css

```css
h1 {
    color: green;
}
```

**2**. Créez votre fichier **/assets/vue1.js** contenant **votre code js et l'importation du css** précédant

```js
import './styles/vue1.css'; // on importe le .css depuis le fichier .js!

// votre code js se trouve ici
alert ("vue1 js!"); 
.
.
.
```

<br>

**3**. Rajoutez l'entry dans **webpack.config.js**

L'entry pointera vers un fichier .js que vous allez inclure dans *assets*.
Observez qu'il n'y a pas une entry pour .css car on a importé le .css depuis le fichier .js de l'entry (ici *vue1.js*)

```js
.
.

    /*
     * ENTRY CONFIG
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if your JavaScript imports CSS.
     */
    .addEntry('app', './assets/app.js')
    .addEntry('vue1', './assets/vue1.js') // notre nouvelle entry
.
.   
``` 


**4**. Créez un controller. Rajoutez une **action** *vue1Webpack*.
La vue associée aura son propre css et js.


```php
#[Route('vue1/webpack')]
public function vue1Webpack (){
    return $this->render ('/exemples_routing/vue1_webpack.html.twig');
}
```

**5**. Faites la **vue** *vue1_webpack.html.twig*, qui utilisera l'entry **vue1** (à définir plus tard dans *webpack.config.js*)

```twig
{% extends "base.html.twig" %}

{% block body %}
	test webpack
	<h1>test css webpack</h1>
	{% block stylesheets %}
		{{ encore_entry_link_tags('vue1') }}
	{% endblock %}

	{% block javascripts %}
		{{ encore_entry_script_tags('vue1') }}
	{% endblock %}

{% endblock %}
```
Peu importe le nom de vos entries, mais il doit être cohérent avec la config qu'on va créer dans *webpack.config.js*

Compilez votre code en utilisant encore :

```console
npm run watch
```
ou 

```
yarn encore dev --watch
```

**watch** indique que encore compilera à chaque changement du code.

Si vous voulez juste compiler une fois, utilisez

```
yarn encore dev 
```

ou 

```console
npm run dev
```

Si vous voulez compiler pour production, utilisez 

```
yarn encore production
```
ou 

```console
npm run build
```

<br>



## 28.6. Encore et Bootstrap

<br>

Ici on explique comment installer bootstrap dans notre projet en utilisant Webpack Encore.

**Installez bootstrap :**

```console
npm add bootstrap --save-dev
```

**ou**

```console
yarn add bootstrap --dev
```

Les librairies de Bootstrap seront copiées dans le dossier **node_modules**.

Bootstrap utilise JQuery et la variable JQuery (raccourcie $). Quand on inclut Bootstrap avec une balise SCRIPT, le code attend que jQuery soit une variable globale. On change le **app.js** pour importer **bootstrap**, qui se trouve maintenant dans node_modules :


```js
// app.js
import './styles/app.css';
// rajouter
// jquery
const $ = require ('jquery');
window.jQuery = $;
window.$ = $;
// importer bootstrap
import 'bootstrap';
```

Bootstrap a besoin de  **popper.js** (pop-up):

Installez le avec yarn ou npm (pas les deux, SVP):

```console
npm install jquery @popperjs/core --save-dev
```

```console
yarn add jquery @popperjs/core --dev
```

Pour utiliser les style .css de bootstrap on doit d'abord l'importer. Rajoutez dans le fichier **/assets/styles/app.css** :

```css
@import '~bootstrap/dist/css/bootstrap.css';
```

On utilise la tilde pour referencer un fichier qui se trouve dans le dossier **node_modules** (sans devoir rajouter 'node_modules' dans le chemin).


Pour les fonts utilisées par bootstrap :

```console
yarn add font-awesome --dev
```
ou 

```console
npm install font-awesome --save-dev
```

<br>


## 28.7. Gestions des images (en cours)

<br>

On peut, optionnellement, gérer les images de notre site avec Webpack.

Il y a plusieurs manières de gérer les images statiques de votre site: 


**Méthode 1.** Créer un *lien directe* dans votre vue (rudimentaire) :

```twig   
<img src="/images/loup.jpg" />
```
où, si le lien est dans une variable:

```twig
<img src="/image/{{ animal.getLien }}"/>
```
Si vous changez la localisation de votre dossier images (ex: l'inclure dans un dossier public/assets) vous allez devoir changer toutes vos vues!


<br>


**Méthode 2**. Utiliser la fonction **asset**. On peut choisir un **base path** qu'on peut changer si on veut dans la config pour éviter le problème mentionné ci-dessus (on ne l'etudiera ici).
Ceci est la méthode standard.
 
Symfony part du dossier **public**.

Ex: charger une image de **public/images**

```twig
<img src="{{ asset ('images/loup.jpg') }}">  
```

Ex: charger une image de **public/images**. On ne connait pas le nom exact, il se trouve dans une variable (objet animal).
On utilise la méthode getLien pour l'obtenir (pas besoin de parenthéses)

```twig
<img src="{{ asset ('images/' ~ animal.getLien ) }}">  
```

N'oubliez pas d'installer les dépendances de Webpack et compiler les assets .js et .css (même si nos assets ne se trouvent pas dans /assets actuellement, mais dans **public/assets**)

Lancez:

```
npm install
npm run dev
```

Puis vous pouvez charger l'action dans le navigateur


<br>

**Méthode 3.** Stocker les images dans **/assets** (dossier pour Webpack, à ne pas confondre avec **public/assets**), ce qui permet de centraliser l'emplacement de tout le **.js**, **.css** et **images**, et configurer Webpack pour qu'il copie les images dans le dossier de compilation (*/public/build* ou autre de notre choix)

Pour ce faire, on doit dire à webpack de copier nos images depuis /assets dans le dossier voulu (crée par vous-même) de public: 

Dans **webpack.config.js** : 

```js
.copyFiles({
    from: './assets/imagesStatiques',
    to: 'imagesStatiques/[path][name].[hash:8].[ext]'

})
```
**ATTENTION** aux paths

<br>

**copyFiles** à plein d'options, ici on voit que les basiques:
https://symfony.com/doc/current/frontend/encore/copy-files.html
Installez le module **file-loader** pour que webpack puisse faire le déplacement de vos fichiers.

```console
npm install file-loader
```

Dans ce cas, **il faut compiler** pour que les images soient copiées. N'utilisez pas cette méthode pour afficher des images uploades avec un form car **on ne compile pas à chaque upload d'images** une fois que le site est en ligne.



<br>

<br>

# 29. Symfony avec Apache. Configuration des Virtual Hosts

Cette section explique comment heberger Symfony dans un serveur Apache **local**. Si vous utilisez le serveur inclut dans Symfony avec la commande **symfony serve**, passez à la section suivante.


<br>

## 29.1. Explication de base

Considérez qu'on a une application web qui se trouve dans le dossier

    C:/xampp/htdocs/Symfony5/projet1symfony/web

Normalement on devrait saisir cette URL pour y accéder :

```
    localhost/Symfony5/projet1symfony/public/index.php
``` 
ou
``` 
    localhost/Symfony5/projet1symfony/public
```

Apache permet d'utiliser la technique de réécriture d'URL. Cela nous permettra, par exemple, d'avoir un projet
qui se trouve dans

    C:/xampp/htdocs/Symfony5/projet1symfony/public

Et en accéder en utilisant tout simplement cette URL :

    projet1symfony.localhost

Nous devons configurer cette correspondance dans le fichier

    /xampp/apache/conf/extra/httpd-vhosts.conf

(config. en Windows. Si on utilise OSX ou Linux le fichier se trouve ailleurs. Les indications pour ces systèmes se trouvent dans les sections qui suivent)

Le nom vhosts vient du fait qu'on est en train de créer un **serveur virtuel**.

C'est Apache qui transforme une URL dans autre, mais toujours selon nos
règles.
<br>

## 29.2. Création d'un serveur virtuel (virtual host) pour un projet en Windows

**Pour créer et utiliser un serveur virtual suivez ces pas** :

**1**.  Activez d'abord la réécriture de l'URL dans la configuration
    d'Apache ainsi que la lecture des serveurs virtuels dans
    httpd-vhosts. Juste ouvrez le fichier
    **c:/xampp/apache/conf/httpd.conf** et effacez les commentaires
    de ces deux lignes (si par hasard elles sont commentées)

```apache
LoadModule rewrite_module modules/mod_rewrite.so
Include conf/extra/httpd-vhosts.conf
````

**2**.  Modifiez (ou créez) le fichier **c:xampp\apache\conf\extra\vhosts.conf**:
(changez le chemin et le nom du projet selon vos besoins)

```apache
<VirtualHost *:80>

ServerName projet1Symfony.localhost
DocumentRoot "C:/xampp/htdocs/Symfony5/projet1Symfony/public"

<Directory "C:/xampp/htdocs/Symfony5/projet1Symfony/public">
    AllowOverride All
    Order Allow,Deny
    Allow from All
</Directory>

<Directory "C:/xampp/htdocs/Symfony5/projet1Symfony">
    Options FollowSymlinks
</Directory>

</VirtualHost>
```

Pour chaque nouveau projet vous devez rajouter la première section en
modifiant le ServerName, DocumentRoot et Directory.

Pour pouvoir continuer à utiliser le serveur **localhost** normalement vous devez rajouter sa **configuration** (**une seule fois, pas pour chaque projet!**):

```apache
<VirtualHost *:80>
    ServerName localhost
    DocumentRoot "C:/xampp/htdocs"
    <Directory "C:/xampp/htdocs">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

**3**.  Installez **l'apache-pack** qui créera les règles d'écriture d'url
    pour le projet (Apache en aura besoin). Dans le dossier du projet,
    tapez :


        symfony composer req symfony/apache-pack

(Répondez "y" pour accepter l'installation)

**4**.  Rajoutez, dans le fichier **hosts**
    
        c:/Windows/System32/drivers/etc/hosts

la ligne suivante:

        127.0.0.1 projet1Symfony.localhost

(Vous devez démarrer notepad comme **administrateur**, si vous utilisez Notepad++ il vous demandera de le faire automatiquement)

**5**.  Redémarrez le serveur Apache et allez sur le site :

http://projet1symfony.localhost/

Une page de bienvenue devrait s'afficher, l'index de votre projet

### Exercice : création d'un projet contenant l'application skeleton

Créez un deuxième projet projet2Symfony selon la procédure précédente

<br>

5.3. Création d'un serveur virtuel (virtual host) en OSX

1.  Activez la lecture de httpd-vhosts dans le fichier httpd.conf:
    ouvrez **xampp** et cliquez sur le bouton Config pour ouvrir ce
    fichier de configuration d'Apache.

    Note: Le fichier se trouve dans Applications/xampp/xamppfiles/etc

    Une fois le fichier ouvert, effacez les commentaires de ces deux
    lignes (si elles sont commentées)

Include conf/extra/httpd-vhosts.conf

Activez aussi la réécriture de l'URL dans la configuration d'Apache e

LoadModule rewrite_module modules/mod_rewrite.so

2.  Modifiez (ou créez) le fichier
    **/Applications/XAMPP/xamppfiles/etc/extra/httpd-vhosts.conf** en
    rajoutant :

```Apache
<VirtualHost *:80>

ServerName projet1Symfony.localhost

DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs/Symfony5/projet1Symfony/public"

<Directory "/Applications/XAMPP/xamppfiles/htdocs/Symfony5/projet1Symfony/public">
    AllowOverride All
    Order Allow,Deny
    Allow from All
</Directory>

<Directory "/Applications/XAMPP/xamppfiles/htdocs/Symfony5/projet1Symfony/Symfony">
    Options FollowSymlinks
</Directory>

</VirtualHost>

```

Pour chaque nouveau projet vous devez rajouter la première section en
modifiant le ServerName, DocumentRoot et Directory.

Pour pouvoir continuer à utiliser le serveur **localhost** normalement (pas seulement avec de virtual hosts pour Symfony!)
vous devez rajouter cette **configuration** :

```apache
<VirtualHost *:80>
    ServerName localhost
    DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs"
    <Directory "/Applications/XAMPP/xamppfiles/htdocs">
    AllowOverride All
    Require all granted
</Directory>
</VirtualHost>
```

1.  Dans le dossier de votre projet, installez **l'apache-pack** qui créera les règles d'écriture d'url pour le projet (Apache en aura besoin). Dans le dossier du projet, tapez :

        php composer.phar require symfony/apache-pack

(Répondez "y" pour accepter l'installation)

4.  Rajoutez dans cette ligne dans le fichier **hosts** :

        127.0.0.1 projet1Symfony.localhost localhost

Pour éditer le fichier hosts :

    1.  Ouvrez la console
    2.  Tapez cd /
    3.  Tapez sudo nano etc/hosts
    4.  Tapez votre mot de passe
    5.  Rajoutez la ligne indiquée
    6.  Enregistrez le fichier avec CONTROL-O et puis Enter, sortez du
        logiciel avec CONTROL-X et puis Enter




# 30. Intégration de boutons de paiement Paypal


Si vous voulez utiliser Paypal dans une application en production vous devez comprendre complètement le système de paiements et savoir très bien ce que vous faites :).

La façon la plus simple d'intégrer Paypal dans votre site est
d'utiliser les Smart Payment Buttons, car vous devez uniquement
utiliser du code javascript et c'est vraiment simple. Paypal fournit en
plus un **sandbox** pour que vous puissiez vérifier les paiements du
point de vue de l'acheteur et du point de vue du vendeur. Les
instructions sont très claires et il faut uniquement adapter le code à
vos besoins (ex : calculer le montant à payer d'une transaction,
indiquer quoi faire dans le cas de succès ou échec d'un paiement
etc...)

Suivez ces instructions pour pouvoir faire un test. Créez d'abord un
projet symfony contenant au moins une vue où vous allez insérer le code proposé par Paypal. Vous avez un exemple dans
**ProjetPaypalSmartButtons**.

Vous devez :

1.  Ouvrir compte Business en Paypal (remplir toutes les données car
    c'est un vrai comCliquer sur Tools All tools
2.  Cliquez à gauche sur Integrate Paypal
3.  Cliquez sur Developer Site
4.  Cliquez sur Checkout
5.  Cliquez sur Smart Payment Buttons Overview et comprenez le système
6.  Suivez le tuto complet de Smart Payment Buttons
7.  Cliquez en bas de la page sur "Add a Smart Payment Buttons
    integration to your website"
8.  Suivez les instructions. Conseil : quand vous allez devoir cliquez dans **Log into the Developer Dashboard**, faites-le dans une nouvelle fenêtre (clic droit). Le code proposé par Paypal sera intégré dans la vue (voir exemple dans le le projet)


<br>
<br>

# 31. Création de commandes de console (en cours)

Nous pouvons créer nos propres commandes de console pour les lancer avec **symfony console <nomCommande>**.

1. Créez le dossier src/Command
2. Créez une classe portant le nom de votre commande. Elle doit hériter de la class **Command**
3. Utilisez l'annotation **AsCommand** juste avant la classe pour spécifier la ligne de commande et la description de la commande
4. Implementez la fonction **execute**   

```php
#[AsCommand(name: 'app:convert-mp3',
            description: 'Convert to mp3')]
```
**name** indique le nom de notre commande. Pour lancer cette commande on utilisera:
```
symfony console app:convert-mp3
```

```php 
<?php
// src/Command/ConvertMp3.php
namespace App\Command;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;


// command will be launched with "symfony console app:convert-mp3"
#[AsCommand(name: 'app:convert-mp3',
            description: 'Convert to mp3')]
class ConvertMp3 extends Command { 

    private string $dossierUpload;
    private Finder $finder;

    // $dossierUpload is defined in services.yaml
    public function __construct(string $dossierUpload)
    {
        // define own properties first
        $this->dossierUpload = $dossierUpload;
        $this->finder = new Finder();

        // call parent constructor
        parent::__construct();
    }

    public function execute (InputInterface $input, OutputInterface $output){

        $this->finder->files()->in($this->dossierUpload);

        if (!$this->finder->hasResults ($this->dossierUpload)){
            throw new \InvalidArgumentException(printf ("Folder not found: " . $this->dossierUpload));
        };

        // finder est Traversable (Interface)
        foreach ($this->finder as $file){

            $newFilename = $file->getPath() . "/" . $file->getFilenameWithoutExtension() . ".mp3";
            $process = new Process(['ffmpeg', '-i', $file->getRealPath(), $newFilename, '-acodec', 'libmp3lame']);

            // debug the command line
            // dump ($process->getCommandLine());

            $process->run();
            if (!$process->isSuccessful()) {
                // throw exception if command fails
                throw new ProcessFailedException($process);
            };

            // remove original file
            unlink ($file->getRealPath());

            // show the command output
            print ($process->getOutput());
        }
        return (Command::SUCCESS);
    }

    protected function configure ():void{
        $this->setHelp('Launch this command to transform in mp3 every file in ' . $this->dossierUpload);
    }

}
```

Si votre commande utilise de paramètres, vous pouvez les définir dans **config/services.yaml**. Cette commande, par exemple, utilise un paramètre **dossierUpload**.

```php

# This file is the entry point to configure your own services.
# Files in the packages/ subdirectory configure your dependencies.

# Put parameters here that don't need to change on each machine where the app is deployed
# https://symfony.com/doc/current/best_practices.html#use-parameters-for-application-configuration
parameters:

services:
    # default configuration for services in *this* file
    _defaults:
        autowire: true      # Automatically injects dependencies in your services.
        autoconfigure: true # Automatically registers your services as commands, event subscribers, etc.
        bind:
            $dossierUpload: '%kernel.project_dir%/public/audiosUpload'
    # makes classes in src/ available to be used as services
    # this creates a service per class whose id is the fully-qualified class name
    App\:
        resource: '../src/'
        exclude:
            - '../src/DependencyInjection/'
            - '../src/Entity/'
            - '../src/Kernel.php'

    # add more service definitions when explicit configuration is needed
    # please note that last definitions always *replace* previous ones
```





# 31. (EN COURS, A NE PAS SUIVRE) Deserialization (transformation de JSON, CSV... en objets)

Lisez le chapitre consacré à la Serialisation. On va réaliser l'opération inverse: transformer du JSON en objets.

Serialiser et deserialiser nos propres objets n'est pas tout le temps une tâche compliquée, mais quand on reçoit une chaîne JSON d'un API et on doit créer nos propres entités ... ça peut devenir très difficil. Et souvent la structure de l'API n'a rien à voir avec celle de nos entités...

Ici on montre un exemple de ces difficultés et de comment les surmonter, car cette situation (adapter la reponse d'un API aux entités)
 arrive dans plein de cas!! 

**Exemple**: adaptation d'un résultat de l'API **countriesnow**
(https://www.countriesnow.com/) à un modèle contenant deux entités liées.


Nous avons :

- un modèle avec deux entités: **Country** et **City**. Les deux ont un nom et une description comme propriétés. Il y a une relation OneToMany (une **Country** a plusieurs **City**)

- une API qui nous envoie du JSON contenant des noms de pays et de villes

https://countriesnow.space/api/v0.1/countries

nous donne : 

```json
"error": false,
    "msg": "countries and cities retrieved",
    "data": [
        {
            "country": "Afghanistan",
            "cities": [
                "Herat",
                "Kabul",
                "Kandahar",
                "Molah",
                "Rana",
                "Shar",
                "Sharif",
                "Wazir Akbar Khan"
            ]
        },
        {
            "country": "Albania",
            "cities": [
                "Elbasan",
                "Petran",
                "Pogradec",
                "Shkoder",
                "Tirana",
                "Ura Vajgurore"
            ]
        },
 .
.
.
```


Nous voulons, pour quelque raison que ce soit (ex: stocker dans une BD), obtenir les données de l'API et remplir les entités Country et City. 

Nous devons **désérialiser** mais lorsque nous vérifions les données JSON on voit :

- une clé **erreur** (à ignorer pour le moment)
- une clé **msg** (à ignorer pour le moment)
- une clé **data**:

  * data contient un tableau d'objets (pas n'importe quelle classe, c'est juste JSON)
  * chaque objet contient un string (nom du pays) et un tableau (dont chaque élément est le nom d'une ville de ce pays)

Ouff ... nous voulons juste un tableau d'objets Country, chacun contenant une collection (tableau ou vecteur ou autre) d'objets City, mais notre JSON n'est pas du tout adapté!

**On veut lancer l'action de deserialiser mais c'est impossible car on n'a aucune classe dont la structure corresponde à la structure de la chaîne JSON!**

```php
$countries = $serializer->deserialize($response->getContent(),QuelleClasseIci??::class,"json");
```

Il est donc clair que la désérialisation nécessitera une certaine personnalisation.
On doit créer des entités et un mapping (correspondance) entre le JSON et nos entités. Le but final est de pouvoir faire: 

```php
$countries = $serializer->deserialize($response->getContent(),ResponseContainerCountry::class,"json");
```

et avoir tout à l'interieur! (un array de Country dont chaque objet contient des objets City).

Allons-y!


**1. Les entités** (assistant)

**L'entité Country** 

<details>
  <summary>
  App\Entity\Country.php
  </summary>

```php
<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 */
class Country
{
    #[
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    #[
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    #[
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    #[
     * @ORM\OneToMany(targetEntity=City::class, mappedBy="country")
     */
    private $cities;

    public function __construct()
    {
        $this->cities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|City[]
     */
    public function getCities(): Collection
    {
        return $this->cities;
    }

    public function addCity(City $city): self
    {
        if (!$this->cities->contains($city)) {
            $this->cities[] = $city;
            $city->setCountry($this);
        }

        return $this;
    }

    public function removeCity(City $city): self
    {
        if ($this->cities->removeElement($city)) {
            // set the owning side to null (unless already changed)
            if ($city->getCountry() === $this) {
                $city->setCountry(null);
            }
        }

        return $this;
    }
}
```
</details>

**L'entité City:**

<details>
  <summary>
  App\Entity\City.php
  </summary>

```php
<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="cities")
     */
    private $country;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }
}


```
</details>


**2. Création d'une classe Container**

Puisque nous avons un tableau externe (**data**) qui contient un tableau de pays, nous allons créer une classe simple (non liée à Doctrine) qui contiendra tous les pays: **ResponseContainerCountry**. 



<details>
  <summary>
  App\Responses\ResponseContainerCountry.php
  </summary>

```php
<?php

namespace ReponsesAPI;

use App\Entity\Country;

class ResponseContainerCountry {

    private $countryArray;

    
    public function getCountryArray()
    {
        return $this->countryArray;
    }

    
    public function setCountryArray($countryArray)
    {
        $this->countryArray = $countryArray;

        return $this;
    }
}


```
</details>

**3. Correspondance entre le JSON et les entités:**

Nous faisons les mapping en utilisant des annotations :

**@SerializedName**

**@var**

**@param**

**@return**

* Prémier mapping : **data** vers un array d'objets **Country**
  
  data est un array d'objets, $countryArray aussi. On s'inquietera plus tard sur la structure interne.

```php
.
.
use Symfony\Component\Serializer\Annotation\SerializedName;
.
.

```




```php

```









# END 


A effacer :

--- 

Pour JS :

- Créer le fichier assets\get_nice_message.js

```js
module.exports = function (exclamationCount){
    return "j'aime bien l'omelette". "!" . repeat (exclamationCount);
}
```

(Node)

ou 
```js
export default function (exclamationCount){
    return "j'aime bien l'omelette". "!" . repeat (exclamationCount);
}
```` 

(ECMA)

- Dans app.js, importez le module :

```js
const getNiceMessage = require ('./get_nice_message');
```
(Node)

ou 
```js
import getNiceMessage from './get_nice_message'
```

(ECMA)

Changez aussi require pour import ()

- Utilisez la fonction dans app.js pour la tester

// any CSS you import will output into a single css file (app.css in this case)

import '../css/app.css';
const getNiceMessage = require ('./get_nice_message');

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';
console.log(getNiceMessage(5));
////////////////////////////////////
// Installer de librairies avec YARN
////////////////////////////////////
jQuery
------

yarn add jquery --dev

et puis (app.js)

import $ from 'jquery'; 

(pas besoin de "./" car de cette manière Webpack le cherchera dans node_modules (dossier)

Bootstrap

---------

Quand on inclut Bootstrap avec une balise SCRIPT, le code attend que jQuery soit une variable globale.

Pour inclure bootstrap avec Webpack on doit utiliser yarn :

yarn add bootstrap --dev

On change le app.js :

import $ from 'jquery';

import 'bootstrap';

On doit arranger la dépendance de popper.js :

npm install --save popper.js

(yarn add popper --dev)

Importer le bootstrap.css. La tilde est necessaire pour referencer un node module à l'interieur d'un fichier css.

@import '~bootstrap/dist/css/bootstrap.css';

Pour les fonts :

yarn add font-awesome --dev



# 4. Installation de packages dans un projet Symfony Flex

**Symfony Flex** est un plug-in pour **Composer** installé **par défaut lors de
la création d'une nouvelle application (projet) Symfony** et automatisant les
tâches les plus courantes des applications Symfony. Flex modifie le
comportement de base de *require*, *update* et *remove.* Beaucoup de
packages de Symfony contiennent une *recipe* (« recette ») **: un
ensemble d'instructions pour installer et activer le package dans un
projet Symfony**. Flex peut aussi être rajouté dans un projet Symfony
d'une version précédente (qui n'aie pas Flex). Plus de
documentation ici :

[https://symfony.com/doc/current/setup.html#creating-symfony-applications](https://symfony.com/doc/current/setup.html%23creating-symfony-applications)

<br>


# (En cours, cette doc. appartient à Symfony 4) Traduction des messages de succès/erreur

1.  Changer la variable **locale** de **en** à **fr** dans
    **config/services.yaml**

2.  Créez un fichier contenant les traductions des messages selon le
    **locale** (voir **translations/security.fr.xlf** dans
    **projetLoginPass**)

Maintenant, à chaque fois qu'un service de Symfony renvoie un message
il lira le fichier de traductions. Nous avons qu'à rajouter la
traduction de chaque message en francáis.
>
Le service de traduction mérite d'une section à part qu'on ne
traitera pas dans ce tuto.
>
<https://symfony.com/doc/current/translation.html(voir la section
**Basic Translation**).


<br>

## Annexe (en cours, brouillon): les pas pour la création d'un projet

<br>


### Analyse

- Définir les fonctionnalités (interface et/ou UML use case)
- Créer diagramme de classes
- Associer controllers et fonctionnalités / interface
- Créer un repo dans Github


### Implementation

### 1. Modèle

- Créer le modèle 
- Créer script (.bat en windows) pour initialiser-effacer la BD-lancer les migrations
- Créer un script pour pusher votre code dans le repo remote
- Lancer la migration (faites le à chaque changement du modèle)

- Creer le système d'authentication (class User) et le controller pour login
- Créer le controller pour s'enregistrer sur le site

- Créer des fixtures pour remplir de données de base du modèle, speciálement pour l'User car vous ne voulez pas devoir enregistrer à la main un User à chaque migration (voir UserFixtures dans le projet, elle est particulière)
  
### 2. Controllers et vues

- Installez webpack-encore
- Lancer yarn install

- Créer un prémier controller (p.e. HomeController) et une action home (route "/") auquel on redirige après le login 
- Créer la vue pour l'action précédante
- Implementer une par une (dans un ordre logique) les fonctionnalités dans les controllers, créer de services pour les fonctionnalités qui se répétent ou qui se trouvent dans plusieurs actions (ex: file upload)




--- Rajouter App\Command
--- Étudier Mercure
NEW:
--- Scheduler

