## Documentacion levantar Api

Instalar php > 8\* => recomiendo instalar xampp y desmarcar todo y dejar solo php. Asi lo instalara globalmente. https://www.apachefriends.org/es/download.html
Instalar composer => https://getcomposer.org/download/
Instalar MYSQL

Una vez instalado dirigirse a la raiz del proyecto y hacer un ("composer install") se instalaran todas las dependencias
Despues se debera configurar el .env para que apunte a local la BBDD.
A continuacion lanzamos este comando ("php artisan migrate") con esto se lanzaran todas las migraciones que tengamos, ojo esto se debera lanzar cada vez que haya un cambion en el modelo de datos.
Lanzamos ("php artisan db:seed") para tener el usuario admin y rellenar tablas estaticas
Para levantar el servidor ("npm run start")

Y para ver todas las rutas que podemos utilizar estaran en la documentacion de swagger. http://127.0.0.1:8000/api/documentation

Comandos para levantar el docker

docker compose build app
docker compose up -d
docker compose exec app rm -rf vendor composer.lock
docker compose exec app composer install --prefer-dist --no-dev
docker compose exec app php artisan key:generate
docker compose exec app php artisan cache:clear
docker compose exec app php artisan config:clear
docker compose exec app php artisan migrate
docker compose exec app php artisan db:seed
