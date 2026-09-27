# API E-commerce Laravel 13

API REST para gestionar autenticación, productos, órdenes y pagos. Requiere PHP 8.3 o superior y Composer. La versión configurada actualmente en `composer.json` es Laravel 13 (`^13.17`).

## Instalación

Desde la raíz del proyecto:

```bash
composer install
cp .env.example .env
touch database/database.sqlite
php artisan key:generate
php artisan jwt:secret
php artisan migrate --seed
php artisan serve
```

En Windows PowerShell, sustituye `cp` y `touch` por:

```powershell
Copy-Item .env.example .env
New-Item -ItemType File -Force database/database.sqlite
```

La configuración inicial usa SQLite. Para utilizar otra base de datos, configura las variables `DB_*` en `.env` antes de ejecutar las migraciones.

Las variables `STRIPE_KEY` y `STRIPE_SECRET` son necesarias únicamente para procesar pagos; añade tus credenciales de Stripe a `.env`.

## Swagger

Con el servidor activo, abre:

```text
http://127.0.0.1:8000/api/documentation
```

Para regenerar la documentación OpenAPI:

```bash
php artisan l5-swagger:generate
```
