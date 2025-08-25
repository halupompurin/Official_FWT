# Stage 1: Composer dependencies
FROM composer:2 as vendor

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Stage 2: FrankenPHP with Laravel
FROM dunglas/frankenphp

RUN install-php-extensions pdo pdo_mysql pdo_pgsql bcmath gd intl zip

WORKDIR /app

# Copy Laravel project
COPY . .

# Copy vendor from Composer stage
COPY --from=vendor /app/vendor /app/vendor

# Laravel optimizations
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

EXPOSE 8080

# ✅ Run FrankenPHP serving the Laravel public folder
CMD ["frankenphp", "run", "--php", "/app/public"]
