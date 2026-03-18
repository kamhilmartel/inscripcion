#!/usr/bin/env bash
set -e

cd /var/www/html

echo "=== Preparando Laravel ==="
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache

echo "=== Ajustando permisos ==="
chmod -R 777 storage bootstrap/cache || true

echo "=== Limpiando cache ==="
php artisan optimize:clear || true
php artisan config:clear || true
php artisan cache:clear || true
php artisan view:clear || true
php artisan route:clear || true

echo "=== Storage link ==="
php artisan storage:link || true

echo "=== Iniciando php-fpm ==="
php-fpm -D

echo "=== Iniciando nginx ==="
nginx -g "daemon off;"