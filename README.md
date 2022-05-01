# Install with Composer

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install or composer install

# Set Environment    

    $ cp .env.example .env

# Set the application key

    $ php artisan key:generate

# Build table in database

# Run migrates

    $ php artisan migrate

# Run migrations and seeds

    $ php artisan db:seed

# Run all tests

    $ php artisan test

# Run script

    $ php artisan serve
