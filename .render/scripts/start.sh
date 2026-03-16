#!/usr/bin/env bash
set -e

cd /var/www/html

echo "=== APP ENVIRONMENT ==="
php -v
php artisan --version

echo "=== PREPARING LARAVEL DIRECTORIES ==="
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache
mkdir -p storage/app/public

chmod -R 777 storage bootstrap/cache || true

echo "=== INSTALLING DEPENDENCIES ==="
composer install --no-dev --optimize-autoloader

echo "=== CLEARING CACHES ==="
php artisan optimize:clear || true

echo "=== STORAGE LINK ==="
php artisan storage:link || true

echo "=== MIGRATION FILES ==="
ls -la database/migrations || true

echo "=== DB CONNECTION FROM ENV ==="
php artisan tinker --execute="dump(config('database.default')); dump(config('database.connections.pgsql.database'));"

echo "=== MIGRATION STATUS BEFORE ==="
php artisan migrate:status --database=pgsql || true

echo "=== RUNNING FRESH MIGRATIONS ON PGSQL ==="
php artisan migrate:fresh --database=pgsql --force -v

echo "=== MIGRATION STATUS AFTER ==="
php artisan migrate:status --database=pgsql || true

echo "=== RUNNING SEEDERS ON PGSQL ==="
php artisan db:seed --database=pgsql --force -v

echo "=== STARTING SERVICES ==="
/start.sh