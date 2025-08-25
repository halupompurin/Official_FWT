# Stage 1: Composer dependencies
FROM composer:2 as vendor

WORKDIR /app

# Copy composer files
COPY composer.json composer.lock ./

# ✅ Skip artisan scripts (they need full Laravel source)
RUN composer install --no-dev --optimize-autoloader --no-scripts


# Stage 2: FrankenPHP with Laravel
FROM dunglas/frankenphp

# Install PHP extensions for Laravel
RUN install-php-extensions pdo pdo_mysql pdo_pgsql bcmath gd intl zip

WORKDIR /app

# Copy Laravel project files
COPY . .

# Copy vendor from Composer stage
COPY --from=vendor /app/vendor /app/vendor

# ✅ Now run artisan optimizations (Laravel source is present here)
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

EXPOSE 8080

# Run FrankenPHP serving Laravel public directory
CMD ["frankenphp", "run", "--php", "/app/public"]
