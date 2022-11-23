#!/bin/sh

# migrate the database
php artisan check_db_connection && php artisan migrate --seed

# install packages
rm -rf vendor composer.lock
composer install

# generate app key
php artisan key:generate

exec "$@"
