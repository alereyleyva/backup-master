FROM php:8.3-fpm as app_base

WORKDIR /home/dev/backup-master-app

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions zip

RUN apt update && apt install -y unzip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

FROM app_base as app_dev

RUN addgroup --gid 1000 dev
RUN adduser --disabled-password --gecos '' --uid 1000 --gid 1000 dev

COPY php/conf.d/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN install-php-extensions xdebug

USER dev

FROM app_base as app_prod

COPY ./composer.* .

RUN composer install --prefer-dist --no-dev --no-scripts --no-progress --no-interaction

COPY . .

RUN composer dump-autoload --optimize



