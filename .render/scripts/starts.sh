#!/usr/bin/env bash
set -e

cd /var/www/html

echo "Running composer install..."
composer install --no-dev --optimize-autoloader

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

echo "Starting services..."
/start.sh