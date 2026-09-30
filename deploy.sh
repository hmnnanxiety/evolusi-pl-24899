#!/usr/bin/env bash

set -e

echo "1. php artisan down --retry=60"
echo "2. git pull origin main"
echo "3. composer install --no-dev --optimize-autoloader"
echo "4. php artisan migrate --force"
echo "5. php artisan config:cache && php artisan route:cache && php artisan view:cache"
echo "6. php artisan queue:restart"
echo "7. php artisan up"