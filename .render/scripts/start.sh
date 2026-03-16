#!/usr/bin/env bash
set -e

cd /var/www/html

echo "Preparing Laravel directories..."
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache
mkdir -p storage/app/public

chmod -R 777 storage bootstrap/cache || true

echo "Installing composer dependencies..."
composer install --no-dev --optimize-autoloader

echo "Clearing Laravel caches..."
php artisan optimize:clear || true

echo "Creating storage link..."
php artisan storage:link || true

echo "Running migrations..."
php artisan migrate --force

echo "Starting services..."
/start.sh