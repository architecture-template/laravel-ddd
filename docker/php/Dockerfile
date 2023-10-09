FROM php:8.1-fpm-alpine

COPY php.ini /usr/local/etc/php/

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN apk upgrade --update && apk add bash && apk --no-cache add git unzip zip
RUN docker-php-ext-install pdo_mysql
