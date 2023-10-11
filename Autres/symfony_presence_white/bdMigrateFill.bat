@REM n'efface pas la base de données + ajoute une table si il y en a une nouvelle
symfony console make:migration
symfony console doctrine:migrations:migrate

@REM pour remplir la BD avec des fausses données (efface les données existantes)
@REM symfony console doctrine:fixtures:load

@REM Pour lancer le fichier: appeler le fichier dans le terminal
