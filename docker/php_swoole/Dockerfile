FROM phpswoole/swoole:5.0.1-php8.2

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN docker-php-ext-install pdo_mysql

EXPOSE 8000
