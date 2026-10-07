FROM php:8.3.35-cli-alpine3.24 AS base

WORKDIR /var/www

RUN apk add --no-cache \
        oniguruma \
        libxml2 \
        sqlite-libs \
    && apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        oniguruma-dev \
        libxml2-dev \
        sqlite-dev \
    && docker-php-ext-install -j"$(nproc)" \
        pdo_sqlite \
        mbstring \
        xml \
        bcmath \
    && apk del .build-deps


# =========================
# Stage 1: Build
# =========================
FROM base AS build

COPY --from=composer:2.8.12 /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --no-scripts \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

COPY . .

RUN rm -f bootstrap/cache/*.php


# =========================
# Stage 2: Runtime
# =========================
FROM base AS runtime

WORKDIR /var/www

COPY --from=build --chown=www-data:www-data /var/www /var/www

RUN cp .env.example .env \
    && touch database/database.sqlite \
    && php artisan key:generate --force \
    && php artisan migrate --force \
    && chown -R www-data:www-data \
        storage \
        bootstrap/cache \
        database \
        .env

USER www-data

EXPOSE 8000

HEALTHCHECK --interval=10s --timeout=3s --start-period=5s --retries=3 \
    CMD curl -fsS http://127.0.0.1:8000/ > /dev/null || exit 1

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]