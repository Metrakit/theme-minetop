#!/bin/bash

# CLI : sudo sh commands.sh

# Migrate & Seed core
php /var/www/dynamix/artisan migrate:reset

php /var/www/dynamix/artisan migrate
php /var/www/dynamix/artisan migrate --package="dynamix/minetop"

php /var/www/dynamix/artisan db:seed --class="Minetop\DatabaseSeeder"

# Migrate modules
php /var/www/dynamix/artisan migrate --package="dynamix/registration"
php /var/www/dynamix/artisan migrate --package="dynamix/top"
php /var/www/dynamix/artisan migrate --package="dynamix/top-server"

# Seed modules
#php /var/www/dynamix/artisan db:seed --class="RegistrationSeeder"
php /var/www/dynamix/artisan db:seed --class="TopSeeder"
php /var/www/dynamix/artisan db:seed --class="TopServerSeeder"

# Seed theme
#php /var/www/dynamix/artisan db:seed --class="Minetop\ThemeTableSeeder"

# Clean cache
php /var/www/dynamix/artisan cache:clear