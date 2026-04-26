FROM php:8.1-apache

# Install PostgreSQL client and PDO extension
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

    # Enable Apache mod_rewrite
    RUN a2enmod rewrite

    # Set the working directory
    WORKDIR /var/www/html

    # Copy application files
    COPY . .

    # Ensure permissions
    RUN chown -R www-data:www-data /var/www/html

    # Expose port 80
    EXPOSE 80

    
