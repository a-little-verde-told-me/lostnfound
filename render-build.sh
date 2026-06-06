#!/usr/bin/env bash
# exit on error
set -o errexit

composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Compile assets (if using Vite/Mix)
npm install
npm run build

# Cache configuration and routes for performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations (We will uncomment this once the database is linked)
# php artisan migrate --force