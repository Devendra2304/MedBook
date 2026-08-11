FROM php:8.2-apache

# Install system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libpq-dev \
    libicu-dev \
    libzip-dev \
    && docker-php-ext-install \
        intl \
        pdo \
        pdo_pgsql \
        pgsql \
        zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache rewrite
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Replace the default Apache virtual host completely
RUN cat > /etc/apache2/sites-available/000-default.conf <<'EOF'
<VirtualHost *:80>

    DocumentRoot /var/www/html/public

    <Directory /var/www/html/public>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
        DirectoryIndex index.php
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined

</VirtualHost>
EOF

# Make sure rewrite configuration is enabled
RUN a2enmod rewrite

# Writable directories
RUN mkdir -p \
    /var/www/html/writable/cache \
    /var/www/html/writable/logs \
    /var/www/html/writable/session \
    /var/www/html/writable/uploads \
    && chown -R www-data:www-data /var/www/html/writable \
    && chmod -R 775 /var/www/html/writable

EXPOSE 80

CMD ["apache2-foreground"]