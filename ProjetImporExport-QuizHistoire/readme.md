Ce projet montre comment réaliser des importations des fichiers .csv dans un modèle d'une façon simple.

On a crée une Fixture ImportCSVService.

On a crée aussi un Service ImportCSVService qui fait la même chose et une action ImportExempleController, juste pour montrer comment le faire.

Pour pouvoir spécifier le dossier qui contient les fichiers d'import on utilisera un paramétre dans services.yaml (voir 'bind')

```yaml
services:
    # default configuration for services in *this* file
    _defaults:
        autowire: true      # Automatically injects dependencies in your services.
        autoconfigure: true # Automatically registers your services as commands, event subscribers, etc.
        # attention: on fixe ici un paramétre qu'on pourra utiliser
        # depuis les Services, les Fixtures ou autres
        bind:
            $dossierImport:  '%kernel.project_dir%/importData/'
```

Le(s) fichier(s) .csv se trouvent dans le dossier /importData. À vous de choisir votre emplacement si vous souhaitez le changer.

