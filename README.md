# Skate Shop

Tienda de skate en línea hecha con Laravel y Breeze. Se pueden ver productos (tablas, trucks, ruedas, bearings, lija y ropa), buscarlos, filtrarlos y comprarlos con datos de envío. El admin crea, edita y elimina productos y ve todos los pedidos.

Los requerimientos están en [REQUERIMIENTOS.md](REQUERIMIENTOS.md).

## Cómo correrlo

Se necesita PHP 8.4, Composer, Node y Docker.

1. Crear el contenedor de MySQL:
   ```
   docker run --name skate_mysql -e MYSQL_ALLOW_EMPTY_PASSWORD=yes -e MYSQL_DATABASE=skate_shop -p 3308:3306 -d mysql:8.0
   ```
2. Instalar todo y preparar el proyecto:
   ```
   composer install
   npm install
   copy .env.example .env
   php artisan key:generate
   ```
3. El `.env.example` ya trae la conexión a MySQL del contenedor (puerto 3308, base `skate_shop`, usuario `root` sin contraseña), así que al copiarlo ya queda listo.
4. Crear las tablas con los datos de prueba y el enlace de las fotos:
   ```
   php artisan migrate --seed
   php artisan storage:link
   ```
5. Correrlo (en dos terminales):
   ```
   php artisan serve
   npm run dev
   ```
   Y abrir http://127.0.0.1:8000

## Usuarios de prueba

- Admin: admin@skateshop.gt / admin123
- Cliente: cliente@skateshop.gt / cliente123
