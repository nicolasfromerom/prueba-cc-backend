
# Backend - Prueba de Desarrollador Full-Stack

Este proyecto utiliza php 8.1


## Installation

- Clonar el proyecto

- Instalar dependecias
Dentro de la raíz del proyecto ejecutar:


```bash
  composer install
```
- Generar archivo .env

Podemos duplicar el archivo .env.example, renombrarlo a .env e incluir los datos de conexión de la base de datos.
- Generar Key
La clave de aplicación es una cadena aleatoria
almacenada en la clave APP_KEY dentro del archivo .env,
Para generar la key ejecutar: 
```bash
  php artisan key:generate
```
- Ejecutar migraciones
Para generar las migraciones ejecutar:
```bash
  php artisan migrate
```
- Ejecutar seeders
Para generar los seeders ejecutar:
```bash
  php artisan db:seed
```

## Deployment

Para desplegar este proyecto ejecutar

```bash
  php artisan serve
```
