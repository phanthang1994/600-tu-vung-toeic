FROM php:8.0.28

# Install required PHP extensions
RUN docker-php-ext-install pdo_mysql

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /src/var/www/html

# Copy project files
COPY . /src/var/www/html

# Install dependencies
RUN composer install --no-interaction

# Set permissions for storage and bootstrap cache
RUN chown -R www-data:www-data /src/var/www/html/storage /src/var/www/html/bootstrap/cache


CMD php artisan serve
