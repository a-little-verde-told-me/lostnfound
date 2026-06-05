#!/bin/sh

# 1. Run migrations
echo "Running database migrations..."
php artisan migrate --force

# 2. Start Apache in the foreground (keep container running)
echo "Starting Apache..."
exec apache2-foreground