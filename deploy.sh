#!/bin/sh

# Ensure the system knows where artisan and apache binaries live
export PATH=$PATH:/usr/local/bin:/usr/bin:/bin

echo "Starting deployment routine..."

# 1. Run migrations AND seeders together
echo "Running database migrations and seeders..."
php artisan migrate --seed --force

# 2. Start Apache in the foreground
echo "Starting Apache..."
exec apache2-foreground