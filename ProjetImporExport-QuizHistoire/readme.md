Ce projet montre comment réaliser des importations des fichiers .csv dans un modèle d'une façon simple.

On a crée une Fixture ImportCSVFixtures.

On a crée aussi un Service ImportCSVService qui fait la même chose et une action ImportExempleController, mais juste pour montrer comment le faire.

Détail important: 

Pour pouvoir spécifier le dossier qui contient les fichiers dans l'action "load" de la Fixture où dans une méthode d'un Service, 
on utilisera un paramètre dans services.yaml (voir 'bind')

```yaml
services:
    # default configuration for services in *this* file
    _defaults:
        autowire: true      # Automatically injects dependencies in your services.
        autoconfigure: true # Automatically registers your services as commands, event subscribers, etc.
        # attention: on fixe ici un paramètre qu'on pourra utiliser
        # depuis les Services, les Fixtures ou autres
        bind:
            $dossierImport:  '%kernel.project_dir%/importData/'
```

Observez le code du constructeur tant du Service comme de la Fixture pour comprendre comment injecter et obtenir la valeur de ce paramètre.

Le(s) fichier(s) .csv se trouvent dans le dossier /importData. À vous de choisir votre emplacement si vous souhaitez le changer.

