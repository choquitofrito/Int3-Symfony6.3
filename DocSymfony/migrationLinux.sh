rm migrations/V*
php bin/console doctrine:database:drop --force --no-interaction
php bin/console doctrine:database:create --no-interaction

php bin/console make:migration --no-interaction --env dev
php bin/console doctrine:migrations:migrate --no-interaction --env dev

php bin/console cache:clear

php bin/console doctrine:fixtures:load --no-interaction --env dev 
