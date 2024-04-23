FROM php:8.3-apache
LABEL authors="kuniyuki"

# Install dependencies
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip

# Install extensions
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set document root to public
RUN sed -i 's!/var/www/html!/var/www/html/BookManager/public!g' /etc/apache2/sites-available/000-default.conf

# Enable mod_rewrite
RUN a2enmod rewrite
