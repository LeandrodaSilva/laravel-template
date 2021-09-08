#!/bin/bash
cd /var/www/laravel-template || exit
ln -s /home/leandro/.env .env
composer install -q --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist
php artisan migrate --force || php artisan migrate:rollback
php artisan storage:link
php artisan optimize
