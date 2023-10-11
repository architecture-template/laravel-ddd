FROM phpswoole/swoole:5.0.1-php8.2

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN apt-get update \
  && apt-get install -y --no-install-recommends nodejs npm \ 
  && apt-get clean

RUN docker-php-ext-install pdo_mysql pcntl

RUN npm install --save-dev chokidar

EXPOSE 8000
