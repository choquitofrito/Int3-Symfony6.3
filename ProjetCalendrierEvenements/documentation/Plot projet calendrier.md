
- [1. Objectif du document](#1-objectif-du-document)
- [2. Description du projet](#2-description-du-projet)
- [3. Création du Projet](#3-création-du-projet)
    - [3.1. Créez un projet](#31-créez-un-projet)
    - [3.2. Configurez la BD (.env)](#32-configurez-la-bd-env)
    - [3.3. Créez la BD](#33-créez-la-bd)
    - [3.4. Créez l'entité pour gérer le proprietaire des événements (ici, Utilisateur)](#34-créez-lentité-pour-gérer-le-proprietaire-des-événements-ici-utilisateur)
    - [3.5. Créez l'authentificateur](#35-créez-lauthentificateur)
    - [3.6. Migrez la BD](#36-migrez-la-bd)
    - [3.7. Installez le module pour les fixtures](#37-installez-le-module-pour-les-fixtures)
    - [3.8. Créez une fixture pour l'Utilisateur](#38-créez-une-fixture-pour-lutilisateur)
    - [3.9. Lancez la fixture. Purgez.](#39-lancez-la-fixture-purgez)
    - [3.10. Installez les dependances de Webpack et compilez une prémiere fois](#310-installez-les-dependances-de-webpack-et-compilez-une-prémiere-fois)
    - [3.11. Modifiez la page de login.html.twig](#311-modifiez-la-page-de-loginhtmltwig)
    - [3.12. Configurez la redirection du login](#312-configurez-la-redirection-du-login)
    - [3.13. Suivant le même principe, il faut définir  la route à lancer quand on fait logout](#313-suivant-le-même-principe-il-faut-définir--la-route-à-lancer-quand-on-fait-logout)
    - [3.14. **Testez** le **login** et le **logout**.](#314-testez-le-login-et-le-logout)
- [4. Création des Utilisateurs et des Evenements associés](#4-création-des-utilisateurs-et-des-evenements-associés)
    - [4.1. Créez l'entité **Evenement**](#41-créez-lentité-evenement)
    - [4.2. Créez ces deux fixtures: **EvenementFixtures** et  **UtilisateursEvenementLienFixtures**](#42-créez-ces-deux-fixtures-evenementfixtures-et--utilisateursevenementlienfixtures)
    - [4.3. Obtention des Evenements d'un Utilisateur](#43-obtention-des-evenements-dun-utilisateur)
- [5. Création du Calendrier avec fullcalendar (avec Webpack)](#5-création-du-calendrier-avec-fullcalendar-avec-webpack)
    - [5.1. Installez la librairie avec npm ou yarn](#51-installez-la-librairie-avec-npm-ou-yarn)
    - [5.2. Installez les plugins de la librairie qu'on utilisera pour le calendrier](#52-installez-les-plugins-de-la-librairie-quon-utilisera-pour-le-calendrier)
    - [5.3. Créez une entry dans webpack (**/webpack.config.js**)](#53-créez-une-entry-dans-webpack-webpackconfigjs)
    - [5.4. Indiquer à la vue de charger le code .js](#54-indiquer-à-la-vue-de-charger-le-code-js)
    - [5.5. Compilez les assets avec npm et lancez le serveur pour ne pas devoir compiler à la main à chaque fois.](#55-compilez-les-assets-avec-npm-et-lancez-le-serveur-pour-ne-pas-devoir-compiler-à-la-main-à-chaque-fois)
    - [5.6. Editez/créez le fichier assets/calendrier.js](#56-editezcréez-le-fichier-assetscalendrierjs)
  - [5.6.1. Créez/éditez le fichier assets/calendar.css](#561-créezéditez-le-fichier-assetscalendarcss)
  - [5.6.2. Créez/éditez le fichier assets/calendar.js](#562-créezéditez-le-fichier-assetscalendarjs)


<br>

# 1. Objectif du document

Expliquer comment créer un projet où on utilise un calendrier d'événements (fullcalendar).

Matières traitées dans ce document :

- Création du projet et bd
- Création d'un User et le système de Login
- Création rudimentaire d'une nav et incrustation dans base.html.twig
- AJAX avec la librairie axios
- Fixtures
- Serialisation (JSON) pour le passage de valeurs entre vue et controller et vice-versa
- Webpack
- fullcalendar



<br>

# 2. Description du projet

Nous allons créer un projet où les utilisateurs pourront gérer les événements d'un calendrier.

Ces "événements" pourraient être de RendezVous d'un Medecin, ou des Entrainements d'un Joeur... les possibilités sont infinies.

Un Evenement sera un objet (entité Evenement) qui s'affichera dans le calendrier (ex: "RDV", "entrainement", "concert").

Il suffira de fournir au constructeur de fullcalendar un ensemble d'événements à afficher (sous la forme d'un array).

Les Evenements sont, au niveau de PHP, des objets (on aura une class Evenement, une entité).
Les Evenements se trouvent dans la BD.
Pour les afficher dans un calendrier, par exemple, on doit créer une action pour les obtenir et les fournir à une vue (en JSON). Dans la vue on aura du code javascript qui créera le calendrier et affichera les Evenements à l'interieur. 

Logiquement notre classe Evenement doit respecter un format pour que fullcalendar puisse les utiliser pour remplir le calendrier. 

Pour créer de nouveaux Evenements il y a plusieurs approches possibles (AJAX ou pas AJAX, un formulaire sur una autre page).
Pour pouvoir laisser cette partie pour la fin, on va créer des événements en utilisant de fixtures.

<br>

# 3. Création du Projet

<br>



### 3.1. Créez un projet 

```console
symfony new --webapp ProjetCalendrierEvenements
```

### 3.2. Configurez la BD (.env)

```console
DATABASE_URL="mysql://root:@127.0.0.1:3306/projetcalendrierevenements?charset=utf8mb4"
```

### 3.3. Créez la BD
```console
symfony console doctrine:database:create --no-interaction
```

### 3.4. Créez l'entité pour gérer le proprietaire des événements (ici, Utilisateur)

Ici les événements seront associés à une entité **Utilisateur**
```console
symfony console make:user
```
- Utilisateur comme nom d'entité
- yes, on veut stocker avec Doctrine
- email comme "display name"
- yes pour le hashing

Rajoutez le nom et prénom (et ce qui vous vient à l'esprit) à Utilisateur 

```
symfony console make:entity Utilisateur
```

### 3.5. Créez l'authentificateur
```
symfony console make:auth
```
- option 1: login form authenticator
- UtilisateurAuthenticator comme nom de classe
- SecurityController comme nom du controller (l'action login se trouvera à l'intérieur)
- yes pour la génération du logout
- yes ou non pour "Remember me", à vous de voir



### 3.6. Migrez la BD
```
symfony console make:migration --no-interaction
symfony console doctrine:migration:migrate --no-interaction
```
(Vous pouvez des maintenant utilisez un fichier .bat pour lancer toutes les procédures liées a la BD d'un coup)

### 3.7. Installez le module pour les fixtures
```
symfony composer req orm-fixtures
```

### 3.8. Créez une fixture pour l'Utilisateur

<br>

 **UtilisateurFixtures**. On n'a pas utilisé Faker car on veut fixer les emails et que le navigateur les mémorise.
```php
<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



class UtilisateurFixtures extends Fixture
{
    
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
         $this->passwordHasher = $passwordHasher;
    }
    
    public function load(ObjectManager $manager)
    {
        // on va créer 3 admins et 3 clients+gestionnaires
        // sachez qu'ils auront par défaut aussi le ROLE_USER
        for ($i = 0; $i < 3 ; $i++){
            $user = new Utilisateur();
            $user->setEmail ("newuser".$i."@lala.com"); // user1@lala.com, user2@lala.com etc....
            $user->setPassword($this->passwordHasher->hashPassword(
                 $user,
                 'lePassword'.$i // lepassword1, lepassword2, etc...
             ));
            $user->setNom("nom".$i);
            $user->setPrenom("prenom".$i);
            $user->setRoles(['ROLE_GESTIONNAIRE']);
            $manager->persist ($user);
        }
        for ($i = 0; $i < 3 ; $i++){
            $user = new Utilisateur();
            $user->setEmail ("autreuser".$i."@lala.com"); // user1@lala.com, user2@lala.com etc....
            $user->setPassword($this->passwordHasher->hashPassword(
                $user,
                'lePassword'.$i // lepassword1, lepassword2, etc...
            ));
            $user->setNom("nom".$i);
            $user->setPrenom("prenom".$i);
            $user->setRoles(['ROLE_CLIENT']);
            $manager->persist ($user);
        }
        $manager->flush();
    }
}
```

### 3.9. Lancez la fixture. Purgez.
```
symfony console doctrine:fixtures:load
```
(Le fichier .bat est votre ami....)


### 3.10. Installez les dependances de Webpack et compilez une prémiere fois 

Dans ce projet on va utiliser **Webpack Encore**, un module qui facilite énormement l'utilisation de **webpack** dans Symfony.

Webpack est un outil de JS qui permet, entre autre, de:  

1. **Regrouper les fichiers**: Webpack **rassemble de nombreux fichiers**  (JavaScript, CSS, images, etc.) en un seul ou plusieurs bundles, réduisant ainsi le nombre de requêtes réseau et accélérant le chargement des pages.

2. **Optimiser les ressources**: Webpack **peut optimiser les ressources en les minifiant** (réduisant leur taille), en les **obfusquant** (pour protéger le code source), et en éliminant les parties inutilisées, ce qui réduit la taille des fichiers finaux.

3. **Gérer les dépendances**: Il gère automatiquement les **dépendances** entre les modules, ce qui facilite la gestion des bibliothèques tierces et des composants réutilisables (pensez à Composer!)

Installez Webpack Encore:

```
symfony composer req symfony/webpack-encore-bundle
```

Lancez 

```
npm install
```

pour créer la configuration initiale de webpack.


<br>

### 3.11. Modifiez la page de login.html.twig

<br>

Ouvrez la page **templates/security/login.html.twig**, on va la modifier car nous n'avons pas un **useridentifier**. 

Si votre **base.html.twig** contient déjà la barre de navigation, vous pouvez juste créer une vue indépendante (sans hériter de base.html.twig).C'est à votre choix.

```twig
<form method="post">
    {% if error %}
        <div class="alert alert-danger">{{ error.messageKey|trans(error.messageData, 'security') }}</div>
    {% endif %}

    {% if app.user %}
        <div class="mb-3">
            You are logged in as {{ app.user.nom }}, <a href="{{ path('app_logout') }}">Logout</a>
        </div>
    {% endif %}

    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail">Email</label>
    <input type="email" value="{{ last_username }}" name="email" id="inputEmail" class="form-control" autocomplete="email" required autofocus>
    <label for="inputPassword">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" autocomplete="current-password" required>

    <input type="hidden" name="_csrf_token"
           value="{{ csrf_token('authenticate') }}"
    >

    <button class="btn btn-lg btn-primary" type="submit">
        Sign in
    </button>
</form>
```

<br>

### 3.12. Configurez la redirection du login 

<br>

Nous **voulons aller vers une page d'accueil après le login**. Créons un controller contenant une page d'index.

```console
symfony console make:controller AccueilController
```

On aura une page d'accueil (action index, vue **index.html.twig**), accessible directement quand on tape localhost:8000. Dans cette page d'accueil on aura une barre de navigation contenant au moins un lien pour le calendrier et un autre pour le logout. Les liens se trouvent dans **base.html.twig**, car ils doivent apparaitre dans toutes les pages. 


Voici notre base.html.twig
```twig
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			{% block title %}Welcome!
			{% endblock %}
		</title>
		<link
		rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>">
		{# Run `composer require symfony/webpack-encore-bundle` to start using Symfony UX #}
		{% block stylesheets %}
			{# {{ encore_entry_link_tags('app') }} #}
		{% endblock %}

		{% block javascripts %}
			{# {{ encore_entry_script_tags('app') }} #}
		{% endblock %}
	</head>
	<body>
		{# barre de navigation  #}
		<nav>
			<ol>
				<li>
					<a href="#">Section 1</a>
				</li>
				<li>
					<a href="#">Section 2</a>
				</li>
                <li>
                <a href="#">Calendrier</a> 
				</li>
				<li>
				<a href="{{path('app_logout')}}">Logout</a>
				</li>
			</ol>
		</nav>
		{% block body %}{% endblock %}
	</body>
</html>


```
**Note**: on considére ici qu'on peut entrer sur le site et voir la barre de navigation uniquement si on se connecte préalablement dans une page de login. **Notre page login.html.twig n'hérite pas de base.html.twig**. Ceci est le système de gmail. Si vous voulez que l'user puisse parcourir le site et puis se connecter (ex: Amazon) vous pouvez hériter de base.html.twig aussi dans login.html.twig.


Observez bien la route de l'action:

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        // si pas d'user, charger le login
        if (!$this->getUser()){
            return $this->redirectToRoute('app_login');

        }
        return $this->render('accueil/index.html.twig');
    }
}
```
Vu qu'on veut charger cette action index après un login correct, on doit modifier la rédirection dans **src/Security/UtilisateurAuthenticator** pour qu'elle pointe vers la route **index** (le name!):

```php
.
.
public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
{
    if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
        return new RedirectResponse($targetPath);
    }

    // For example:
    return new RedirectResponse($this->urlGenerator->generate('index'));
    //        throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
}
.
.

```

### 3.13. Suivant le même principe, il faut définir  la route à lancer quand on fait logout
**config/packages/security.yaml**. Ici on choisit de charger la page de login.


```yaml
.
.

        main:
            .
            .
            .
            logout:
                path: app_logout
                # where to redirect after logout
                target: app_login
.
.
```

### 3.14. **Testez** le **login** et le **logout**.

<br>

Si tout va bien, on va afficher les données de l'user dans la page d'accueil (dump).

Voici la vue **templates/accueil/index.html.twig**

```twig
{% extends 'base.html.twig' %}

{% block title %}Hello AccueilController!
{% endblock %}

{% block body %}
Bonjour on est sur l'accueil. 
{{ dump (app.user) }}
{{ dump (app.user.email )}}
{{ dump (app.user.nom )}}
{{ dump (app.user.prenom )}}
{% endblock %}
```

<br>

# 4. Création des Utilisateurs et des Evenements associés

On va associer des **Evenements** aux **User** (ex: pour déterminer leur disponibilité)

**Le principe est d'afficher un ou plusieurs Evenements dans une date du calendrier** aura une start et une description (on peut rajouter ce qu'on veut... dateDebut, dateFin, heureDebut)
Un Utilisateur aura plein d'Evenements, un Evenement appartient uniquement à un Utilisateur. 

<br>

### 4.1. Créez l'entité **Evenement**

<br>

Pour nous un Evenement peut être un objet qui stocke une simple date, mais full calendar permet plein d'autres caracteristiques et on va créer un exemple plus général.

<br>

Créez l'entité (observez qu'on n'utilise pas camelcase. C'est juste pour cet exemple, pour nous adapter aux données reçues par fullcalendar).

        title - string - non nullable
        start (date de début) - date - non nullable
        end (date de fin) - date
        description - text
        background_color - string (7)
        border_color - string (7)
        text_color - string (7)
        utilisateur - ManyToOne - classe associée: Utilisateur

Faites une rélation avec les Utilisateurs (normalement on aura un One-to-Many depuis Utilisateur)

Migrez le tout!

<br>

### 4.2. Créez ces deux fixtures: **EvenementFixtures** et  **UtilisateursEvenementLienFixtures**

Installez FakerPHP car on l'utilisera dans nos fixtures.

```
composer require fakerphp/faker
```

<br>

```php
<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Evenement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

use Faker;



class EvenementFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i < 100; $i++) {
            $evenement = new Evenement();
            // $evenement->setStart(new DateTime());
            $evenement->setStart(new DateTime("2022-03-" . (($i + rand(1, 5)) % 28))); // de dates pour mars 2022
            // $evenement->setEnd(new DateTime());
            $evenement->setTitle($faker->word);
            $evenement->setDescription($faker->word . " " . $faker->word . " " . $faker->word);
            $arrAllDay = [true,false];
            $evenement->setAllDay($arrAllDay[rand(0,1)]);
            $colors = ["#FFAABB","#EEFFAA","BBAA33"];
            $evenement->setBackgroundColor($colors [rand(0,2)]);
            // $evenement->setTextColor($colors [rand(0,2)]);
            // $evenement->setBorderColor($colors [rand(0,2)]);
            
            $manager->persist($evenement);
        }

        $manager->flush();
    }
}


```

Dans la fixture qui lie les Utilisateurs et les Evenements **n'oubliez pas d'implementer getDependencies. Autrement vous risquez de lancer les Fixtures dans un ordre qui ne vous convient pas** (ici on a besoin des Utilisateurs et Evenements avant de créer les liens)

```php
<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use App\Entity\Utilisateur;

use App\DataFixtures\EvenementFixtures;
use App\DataFixtures\UtilisateurFixtures;

use Doctrine\Persistence\ObjectManager;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class UtilisateurEvenementsLienFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        $rep = $manager->getRepository(Evenement::class);
        $evenements = $rep->findAll();
        $rep = $manager->getRepository(Utilisateur::class);
        $utilisateurs = $rep->findAll();
        
        for ($i = 0; $i < count ($evenements) ; $i++){
            $utilisateurChoisi = $utilisateurs[ rand (0, count($utilisateurs) - 1)];
            $utilisateurChoisi->addEvenement($evenements[$i]);
            $manager->persist($evenements[$i]);
        }
        $manager->flush();

    }

    public function getDependencies()
    {
        return ([UtilisateurFixtures::class,
                EvenementFixtures::class]);

    }

}

```


La première crée des Evenements et la deuxième lie des Evenements aux Utilisateurs. Rappelez-vous qu'un Utilisateur est censé de voir uniquement ses Evenements.
Modifiez ces Fixtures selon vos besoins.


**Lancez le tout!** (fichier .bat) 

<br>

### 4.3. Obtention des Evenements d'un Utilisateur

<br>

Nous avons la structure complete. On va **obtenir les Evenement d'un Utilisateur, les transformer en JSON et les envoyer à la vue**,
car **fullcalendar** à besoin de données en format JSON.

Créez un controller **FullCalendarEvenementsController**.

Créez une action **afficherCalendrierUtilisateur** dans ce controller (name: **afficher_calendrier_utilisateur**).

L'action doit: 
- Vérifier si un Utilisateur es connecté
- Obtenir tous les Evenements de l'Utilisateur
- Serialiser (passer à JSON) les Evenements
- Envoyer les Evenements à la vue


```php
<?php
namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FullCalendarEvenementsController extends AbstractController
{
    #[Route('/afficher/calendrier/utilisateur', name: 'afficher_calendrier_utilisateur')]
    public function afficherCalendrierUtilisateur(SerializerInterface $serializer): Response
    {
        // obtenir les dates d'un calendrier d'un Utilisateur
        // qui ont été déjà sélectionnées et les envoyer en JSON à la vue pour que fullcalendar les affiche.
        // C'est un objet Serializer qui transformera en JSON l'array d'Evenement

        // l'Utilisateur doit être connecté, on va obtenir tous ses evenements (rajoutés avec de Fixtures)
        $utilisateur = $this->getUser(); // ATTENTION: la méthode getUser est du CONTROLLER et portera toujours ce nom, même si notre classe est Utilisateur
        // si pas d'Utilisateur, on va au login
        if (is_null($utilisateur)) {
            return $this->redirectToRoute("app_login");
        }

        // sinon, on continue. On obtient tous les Evenement de cet utilisateur
        $evenements = $utilisateur->getEvenements();
        // pour debugger, vous pouvez faire de dumps. Attention: un dd($evenements)
        // dump ($evenements);
        // dump($evenements[0]);
        // dd($evenements[1]); // etc...


        // Serialiser = Normaliser (passer objet ou array d'objets à array) et Encoder (passer array à JSON)
        // https://symfony.com/doc/current/components/serializer.html (regardez le dessin)
        // Si vous avez de problèmes de CIRCULAR REFERENCE, utilisez IGNORED_ATTRIBUTS pour ne pas 
        // serialiser les propriétés qui constituent une rélation (ex: serialiser Livre sans serialiser les Exemplaires)
        // $evenementsJSON = $serializer->serialize($evenements, 'json',[AbstractNormalizer::IGNORED_ATTRIBUTES => ['utilisateur']]);
        // $evenementsJSON = $serializer->serialize($evenements, 'json',[AbstractNormalizer::ATTRIBUTES => ['start','title']]);
        $evenementsJSON = $serializer->serialize($evenements, 'json', [AbstractNormalizer::IGNORED_ATTRIBUTES => ['utilisateur']]);
        $vars = ['evenementsJSON' => $evenementsJSON];
        return $this->render('full_calendar_evenements/afficher_calendrier_utilisateur.html.twig', $vars);
    }

}
```

Changez/créer le lien dans la nav de base.html.twig pour qu'il pointe vers cette action:
```twig
<a href="{{path ('afficher_calendrier_utilisateur') }}">Calendrier</a> 
```

Créez la vue **afficher_calendrier_utilisateur.html.twig** :

```twig
{% extends "base.html.twig" %}

{% block body %}
Voici les données reçues du controller pour afficher dans le calendrier 

{{ dump(evenementsJSON) }}

{% endblock %}
```

Vous devriez obtenir une chaîne JSON contenant l'info de tous les Evenements de cet Utilisateur.

<br>



# 5. Création du Calendrier avec fullcalendar (avec Webpack)

Documentation: https://fullcalendar.io/docs

### 5.1. Installez la librairie avec npm ou yarn

<br>

```
npm install fullcalendar
``` 

Installez aussi la libraire axios pour faciliter les appels AJAX :

```
npm install axios
```

<br>


### 5.2. Installez les plugins de la librairie qu'on utilisera pour le calendrier

<br>

```
npm install --save @fullcalendar/core @fullcalendar/daygrid @fullcalendar/interaction
```

### 5.3. Créez une entry dans webpack (**/webpack.config.js**) 

Nous allons créer le code concernant le calendrier dans un fichier **calendrier.js**.
L'entry dans webpack.config.js indique à webpack de compiler ce fichier.
Plus tard on l'incrustera dans notre vue.

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
    .addEntry('calendrier', './assets/calendrier.js')
.
.
```
Créez le fichier **/assets/calendar.js** (juste contenant un alert).
Créez le fichier **/assets/styles/calendrier.css** (celui-ci contiendra plus tard le .css qu'on veut nous même appliquer au calendrier, c'est optionnel).

<br>

### 5.4. Indiquer à la vue de charger le code .js

Utilisez **encore_entry_link_tags** pour importer le .css de notre entry et **encore_entry_script_tags** pour importer notre .js.

On veut aussi le css et js de base.html.twig, alors on utilise la fonction **parent** pour les rajouter. Créez aussi un **div** ayant l'id **calendrier**, le container pour afficher le calendrier.

```twig
{% extends "base.html.twig" %}

{% block stylesheets %}
    {{ parent() }}
    {{ encore_entry_link_tags('calendrier') }}
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    {{ encore_entry_script_tags('calendrier') }}
{% endblock %}

{% block body %}
Voici les données reçues du controller pour afficher dans le calendrier 


<div id="calendrier" data-calendrier="{{ evenementsJSON }}" class="calendar"></div>

{{ dump(evenementsJSON) }}

{% endblock %}
```

**Important: Notez qu'on utilise le **dataset** (ex: data-calendrier) du div pour stocker le JSON qu'on reçoit du controller. On ne peut pas écrire du code twig ({{ }}) dans un fichier .js. Le dataset nous servira à stocker de données qui viennent du controller. Vous pouvez créer autant de data-xx que vous voulez.



<br>

### 5.5. Compilez les assets avec npm et lancez le serveur pour ne pas devoir compiler à la main à chaque fois.

<br>

```
npm run watch
```





### 5.6. Editez/créez le fichier assets/calendrier.js


## 5.6.1. Créez/éditez le fichier assets/calendar.css

```css
/* definir ici le style propre pour le entry "calendrier"
Dans notre cas on a juste défini le style pour l'élément 
"calendrier" dans la page, mais vous pouvez mettre ce que vous voulez 
(classes, ids etc...) */

#calendrier
{
    width:50%;
    height:50%;
} 
```

## 5.6.2. Créez/éditez le fichier assets/calendar.js


Ce fichier gére le comportement du calendrier. Chacun doit créer du code .js selon ses besoins.
Dans cete exemple, un clic sur une date rajoutera un événement (**Evenement**) à la BD. Si on fait à nouveau clic, l'événement sera effacé de la BD.
Logiquement on doit utiliser AJAX car on ne va pas récharger la page à chaque clic!

```js
// alert("hello");

// any CSS you import will output into a single css file (app.css in this case)

// importez ici le css que vous voulez rajoutez au calendrier (optionnel, mais le fichier doit exister si vous faites l'import)
import "./styles/calendrier.css";

// importer les objets de fullcalendar dont on a besoin
import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";

// si ce n'est pas fait, installez AXIOS (npm install axios) et importez-le (concrètement l'objet AXIOS)
import axios from "axios";

document.addEventListener("DOMContentLoaded", function () {

  // 1. on obtient les événements du controller, on les stocke dans le data-calendrier du div  
  // console.log (document.getElementById ('calendrier').dataset.calendrier);
  let evenementsJSONJS = document.getElementById('calendrier').dataset.calendrier;
  // 2. On transforme le JSON en array d'objets JS
  let evenementsJSONJSArray = JSON.parse(evenementsJSONJS);
  
  // console.log(evenementsJSONJSArray);


  // 3. On crée le calendrier, associé au div
  let calendarEl = document.getElementById("calendrier");

  // initilialisation du calendrier
  // et définition du comportement du click
  var calendar = new Calendar(calendarEl, {
    // events:[
    // exemple :
      // {
      //   title: "",
      //   start: "2022-03-20",
      //    etc...
      // },
    // ],
    // nous avons notre array déjà en format js (on la crée plus haut)
    events: evenementsJSONJSArray,
  
    displayEventTime: false, // cacher l'heure
    initialView: "dayGridMonth",
    initialDate: new Date(), // aujourd'hui
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay",
    },

    // nous allons utiliser cet evenement pour
    // rajouter de nouveaux Evenements 
    dateClick: function (info) {
      // Nous devons choisir quoi faire quand on clique. 
      // Ici on va juste rajouter un evenement à chaque click qui dure toute la journée.
      // Pour l'effacer, on va gérer la situation avec EventClick
      let nouvelEvenement =
      {
        title: "nouveau",
        start: info.dateStr,
        allDay: true 
        // on rajoute ce qu'on veut ici!
      } 

      // OPTIONNEL: éviter doublons: Obtenir tous les Evenements du calendrier et chercher 
      // un événement ayant 
      // le même title et
      // le même start (ce critére est à vous de le choisir)
      var allEvents = calendar.getEvents();
      var existe = false;
      allEvents.forEach(function(value) 
      {
        
        if (value.title === nouvelEvenement.title && 
          new Date(value.start).toDateString() === new Date(nouvelEvenement.start).toDateString())
        { 
          existe = true;
        }
      });
      // console.log (existe);

      // on ne rajout pas si l'Evenement existe
      if (!existe){
        axios.post("/add/evenement", 
              nouvelEvenement) // axios encode le nouvelElement en json automatiquement et l'envoie dans le corps de la Request
              .then (function (response){
                  // si success dans l'insertion dans la BD
                  console.log (response);
                  // rajouter à calendrier (interface)
                  // d'abord obtenir l'id fourni par Doctrine
                  // et l'incruster dans le nouvel Evenement 
                  nouvelEvenement.id = response.data.id;           
                  calendar.addEvent (nouvelEvenement);
              });  
      }
      else {
        console.log ("on ne rajoute pas, l'Evenement existe");
      } 

    },
    // ici on detecte un click sur un Evenement
    // on va choisir de l'effacer
    eventClick: function (info){
      console.log (info.event.id);
      let idEvenementEffacer = info.event.id;
      // on doit effacer de la BD aussi!
      axios.post("/effacer/evenement", 
       { id: idEvenementEffacer})
      .then (function (response){
        // si success dans l'insertion dans la BD
        console.log (response);
        // effacer du calendrier (interface)  
        calendar.getEventById(idEvenementEffacer).remove();
      }); 
      

    },
    // liste de plugins qu'on va utiliser
    plugins: [interactionPlugin, dayGridPlugin],
  });

  // Affichage
  calendar.render();



});
```

Au niveau du controller **FullCalendarEvenementsController**, vous devez créer les actions pour rajouter les Evenements et pour les effacer (**addEvenement** et **effaceEvenement**).

```php
<?php

namespace App\Controller;

use App\Entity\Evenement;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FullCalendarEvenementsController extends AbstractController
{
    #[Route('/afficher/calendrier/utilisateur', name: 'afficher_calendrier_utilisateur')]
    public function afficherCalendrierUtilisateur(SerializerInterface $serializer): Response
    {
        // obtenir les dates d'un calendrier d'un Utilisateur
        // qui ont été déjà sélectionnées et les envoyer en JSON à la vue pour que fullcalendar les affiche.
        // C'est un objet Serializer qui transformera en JSON l'array d'Evenement

        // l'Utilisateur doit être connecté, on va obtenir tous ses evenements (rajoutés avec de Fixtures)
        $utilisateur = $this->getUser(); // ATTENTION: la méthode getUser est du CONTROLLER et portera toujours ce nom, même si notre classe est Utilisateur
        // si pas d'Utilisateur, on va au login
        if (is_null($utilisateur)) {
            return $this->redirectToRoute("app_login");
        }

        // sinon, on continue. On obtient tous les Evenement de cet utilisateur
        $evenements = $utilisateur->getEvenements();
        // pour debugger, vous pouvez faire de dumps. Attention: un dd($evenements)
        // dump ($evenements);
        // dump($evenements[0]);
        // dd($evenements[1]); // etc...


        // Serialiser = Normaliser (passer objet ou array d'objets à array) et Encoder (passer array à JSON)
        // https://symfony.com/doc/current/components/serializer.html (regardez le dessin)
        // Si vous avez de problèmes de CIRCULAR REFERENCE, utilisez IGNORED_ATTRIBUTS pour ne pas 
        // serialiser les propriétés qui constituent une rélation (ex: serialiser Livre sans serialiser les Exemplaires)
        // $evenementsJSON = $serializer->serialize($evenements, 'json',[AbstractNormalizer::IGNORED_ATTRIBUTES => ['utilisateur']]);
        // $evenementsJSON = $serializer->serialize($evenements, 'json',[AbstractNormalizer::ATTRIBUTES => ['start','title']]);
        $evenementsJSON = $serializer->serialize($evenements, 'json', [AbstractNormalizer::IGNORED_ATTRIBUTES => ['utilisateur']]);
        $vars = ['evenementsJSON' => $evenementsJSON];
        return $this->render('full_calendar_evenements/afficher_calendrier_utilisateur.html.twig', $vars);
    }

    #[Route('/add/evenement', name: 'add_evenement')]
    public function addEvenement(
        Request $req,
        SerializerInterface $serializer,
        ManagerRegistry $doctrine
    ): Response {

        // Deserialiser = decoder (passer du JSON à Array) + denormaliser (passer d'Array à Objet ou array d'objets)
        $objetEvenement = $serializer->deserialize($req->getContent(), Evenement::class, 'json');

        // ici on aura déjà un objet Evenement, qui 
        // contient que la date choisie

        // on rajoute l'Utilisateur 
        $objetEvenement->setUtilisateur($this->getUser());

        // on va le stocker dans la BD!
        $em = $doctrine->getManager();
        $em->persist($objetEvenement);
        $em->flush();
        return new JsonResponse([
            'id' => $objetEvenement->getId(),
            'status' => "Evenement stocké"
        ], 201); // pas de render!!!


    }



    #[Route('/effacer/evenement', name: 'effacer_evenement')]
    public function effacerEvenement(
        Request $req,
        ManagerRegistry $doctrine
    ): Response {

        // on transforme le JSON en objet
        // de la classe Standard
        $objet = json_decode($req->getContent());
        $idEffacer = $objet->id;
        // on obtient l'Evenement et on l'efface de la BD
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Evenement::class);
        $evenement = $rep->find($idEffacer);
        $em->remove($evenement);
        $em->flush();

        return new Response("Evenement effacé", 200); // pas de render!!!
    }
}
```



Testez!
