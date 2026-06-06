#!/usr/bin/env bash
# Clear old configurations so the app uses the new environment variables
php artisan config:clear
php artisan cache:clear
php artisan route:clear

# Run migrations (uncomment only if your DB is reachable)
# php artisan migrate --force

# Start Apache in the foreground
apache2-foreground