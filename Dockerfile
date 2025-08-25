# Use FrankenPHP with Caddy
FROM dunglas/frankenphp

# Install PHP extensions for Laravel
RUN install-php-extensions pdo pdo_mysql pdo_pgsql bcmath gd intl zip

WORKDIR /app

# Copy files
COPY . .

# ✅ Add Composer from official Composer image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Optimize Laravel
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

EXPOSE 8080

CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile", "--worker"]
