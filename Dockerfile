# Use the official PHP image with Apache
FROM php:8.2-apache

# Enable Apache rewrite module (common for PHP apps)
RUN a2enmod rewrite

# Change DocumentRoot to /var/www/html/public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Copy your whole project to /var/www/html inside the container
COPY . /var/www/html/

# Set permissions (optional but good practice)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 for web traffic
EXPOSE 80

# Start Apache in the foreground (default command)
CMD ["apache2-foreground"]
