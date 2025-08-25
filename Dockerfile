# Use FrankenPHP with Caddy
FROM dunglas/frankenphp

# Install PHP extensions for Laravel
RUN install-php-extensions pdo pdo_mysql pdo_pgsql bcmath gd intl zip

# Set working dir
WORKDIR /app

# Copy files
COPY . .

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Run Laravel optimization
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Expose port
EXPOSE 8080

# Start FrankenPHP
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile", "--worker"]
