# Gunakan PHP 8.2 + Apache
FROM php:8.2-apache

# Install ekstensi yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project Laravel
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Ubah permission storage dan bootstrap/cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Copy custom Apache config (optional)
COPY .render/apache.conf /etc/apache2/sites-available/000-default.conf
