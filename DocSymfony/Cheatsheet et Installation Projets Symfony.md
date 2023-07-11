## Extensions a installer dans VS Code

- PHP Intelephense
- Twig Language 2
- Markdown all in one
- PHP Namespace Resolver 
- PHP Getters & Setters


## Création d'un projet


- Création d'un projet
```console
symfony new --full Projet1Symfony5
```

## Serveur interne (vous pouvez utiliser aussi Apache)

- Lancer le serveur interne (depuis le dossier du projet)
```console
symfony server:start
```
ou
```console
symfony serve
```
Pour arreter le serveur, CTRL-C.

Si on ne le voit pas dans la console:
```console
symfony server:stop
```

## Controllers

- Pour créer un nouveau controller
```console
php bin/console make:controller <nom du nouveau controller>
``` 

Un fichier sera crée pour le controller, en plus d'un dossier et une vue dans *templates*

Si on va utiliser des annotations (et on le fera):
```console
composer require annotations
```


## Modèle et Entités


- Rajouter les librairies de Doctrine dans chaque nouveau projet
```console
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle
```

Créer BD: 
```
symfony console doctrine:database:create
symfony console doctr:data:cre (par exemples)
```

Effacer BD (opt.):
```
symfony console doctrine:database:drop --force
symfony console doctr:data:drop --force (par exemples)
```

- Creation des entités et rajout d'attributs et de rélations dans les entités
```console
php bin/console make:entity
```
Pour créer une rélation: choisir *relation* dans le type de données de l'attribut et puis le type (OneToMany etc...). Guide pour plus d'info

Pour effacer une proprieté: 
- effacez la propriété partout dans le fichier de l'entité (définition de la classe, set, get et code d'initialisation dans le constructeur)
- effacez le repository (attention à ne pas perdre de méthodes créés par vous-mêmes)


Pour appliquer dans la BD les changements des entités:
```
symfony console make:migration
symfony console doctrine:migrations:migrate
```





## Utiliser Apache comme serveur de dev

```console
composer require symfony/apache-pack
```
Et puis suivre le chapitre du guide consacré à Apache

## Doctrine

- Installer l'ORM
```console
composer require symfony/orm-pack
composer require symfony/maker-bundle --dev
```
- Installer les Fixtures
```console
composer require --dev doctrine/doctrine-fixtures-bundle
```
- Obtenir un repo dans controller:

```php
$em = $this->getDoctrine()->getManager();
// obtenir le repository
$rep = $em->getRepository(Livre::class);
```
- Obtenir un repo dans les fixtures:

```php 
public function load(ObjectManager $manager)
    {
        $repPaciente = $manager->getRepository(Paciente::class);
        $pacientes = $repPaciente->findAll();
        .
        .
```
* Créer un fichier (ex: **dbRestartAndMigrations.bat** dans la racine du projet pour effacer les migrations et recréer toute la BD. Si vous voulez pouvoir choisir chaque pas, enlevez les options --no-interaction. À modifier selon vos besoins.

```console  
del migrations\V*

php bin/console doctrine:database:drop --force --no-interaction
php bin/console doctrine:database:create --no-interaction
php bin/console make:migration --no-interaction
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console doctrine:fixtures:load --no-interaction
```

* Créer un fichier dans la racine du projet pour nettoyer la cache. Lancez-le si vous remarquez que les modifications dans votre code n'ont pas d'effet dans l'execution

```console
php bin/console cache:pool:clear cache.global_clearer
```



## Clonation et installation d'un projet qui existe dans github

1. **git clone/git pull** du repo
2. **Arrêter** tous les **serveurs** Symfony
3. Ouvrir une **console** **dans le dossier du projet**
  
```console
composer install
```
5. **Démarrer le serveur** Symfony 
6. Configurer la bd dans **.env**
7. Créer la BD (si elle n'existe pas)
```console
php bin/console doctrine:database:create
```
8. Créer une migration et la lancer
```console
php bin/console make:migration
php bin/console doctrine:migration:migrate
```
9. Remplir la BD 

    a) Remplir la BD en utilisant **Fixtures** (voir chapitre correspondant dans les notes)
    
    b) Deconseillé: remplir la BD avec un **fichier SQL** (qui doit contenit uniquement des INSERT)<br>
    

## Apprenez un minimum de git :

Symfony crée déjà un repo. 

1. Créez un repo dans github
2. Faites un commit en local

3. Créez une branch **main** qui sera votre branche principale (avant "master")
```console
git branch -M main
```
4. Rajoutez votre repo dans github comme repo remote de votre repo local
```console
git remote add origin https://github.com/choquitofrito/PreExemples.git
```
5. Faites push et allez sur github pour voir le résultat
```console
git push -u origin main
```

### Quelques commandes très basiques:


Voir où on se trouve ;)
```console
git status
```
Rajouter tous les changements au stage
```console
git add .
``` 
Faire un commit 
```console 
git commit -m "navbar rajoutée"
```

Rétablir des fichiers modifiés (avant commit)
= Enlever du Stage
```
git restore .
```
ou
```
git restore nomDuFichier
```

Lister les remotes:
```console
git remote -v
```
Lister les branches:
```console
git branch -a
```
Créez une branche:
```console
git branch rajoutAjax
```
Changer de branche:
```console
git switch rajoutAjax
git switch main
.
.
.
```
Effacer une branche (local):
```console
git branch -d rajoutAjax
```
Faire un push de la branche dans le remote
(on aura les deux branches dans local et remote)
```console
git push origin rajoutAjax
```

Pour git reset:

https://medium.com/charlottes-digital-web/how-and-when-to-use-git-reset-ec8088e0c811


composer global symfony/

https://docs.github.com/en/github/authenticating-to-github/updating-your-github-access-credentials


## Dependances projet

composer require annotations
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle
composer require symfony/apache-pack
composer require symfony/maker-bundle --dev
composer require --dev doctrine/doctrine-fixtures-bundle


## Composer et github:


Pour effacer user-pass dans git:


git config --global --unset user.password 


Composer a besoin d'avoir accès à Github.

- La config de composer pour s'authentifier dans github se trouve dans :

C:\Users\YourUser\AppData\Roaming\Composer\auth.json

Obtenir un token dans Github->Settings->Developer Settings->Personal access Tokens
(selectionner au moins Repo, et donner un nom au token)

{
    "github-oauth": {
        "github.com": "ici le token"
    }
}



