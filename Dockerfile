# Use an official PHP image with Apache
FROM php:8.1-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set the working directory
WORKDIR /var/www/html

# Copy all files from your HRIS project to the container
COPY . /var/www/html/

# Expose port 80 to allow web access
EXPOSE 80

# Start Apache when the container runs
CMD ["apache2-foreground"]
