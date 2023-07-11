del migrations\V*


@REM local
php bin/console doctrine:database:drop --force --no-interaction
php bin/console doctrine:database:create --no-interaction
php bin/console make:migration --no-interaction
php bin/console doctrine:migrations:migrate --no-interaction
@REM php bin/console doctrine:fixtures:load --group=base --no-interaction
php bin/console doctrine:fixtures:load --no-interaction


@REM remoto


@REM php bin/console cache:clear
@REM yarn build

@REM php bin/console make:migration --no-interaction --env dev
@REM php bin/console doctrine:migrations:migrate --no-interaction --env dev