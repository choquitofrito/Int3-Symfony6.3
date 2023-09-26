symfony console doctrine:database:drop --force --no-interaction
symfony console doctrine:database:create --no-interaction
echo yes | del .\migrations
symfony console make:migration --no-interaction
symfony console doctrine:migration:migrate --no-interaction
symfony console doctrine:fixtures:load --no-interaction



