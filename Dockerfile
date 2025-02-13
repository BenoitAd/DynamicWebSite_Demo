# Use an official PHP image with Apache
FROM php:8.1-apache

# Set the environment variable for the new DocumentRoot
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update Apache configuration to use the new DocumentRoot
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Enable Apache modules you might need (like rewrite)
RUN a2enmod rewrite

# Install PDO and PDO MySQL extensions
RUN docker-php-ext-install pdo pdo_mysql

# Set the working directory
WORKDIR /var/www/html

# Copy the project files into the container
COPY . /var/www/html/

# Set proper permissions so that Apache (running as www-data) can access the files
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
