FROM php:7.4-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip libpng-dev libjpeg-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd

# Set working directory
WORKDIR /var/www/html

# Copy source
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000
CMD ["php-fpm"]
