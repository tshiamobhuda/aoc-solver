FROM php:8.2-cli

COPY . /usr/src/aoc_solver
WORKDIR /usr/src/aoc_solver

RUN apt-get update \
    && apt-get -y install git zip libzip-dev

RUN pecl install xdebug-3.2.2 zip \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug,develop,coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "html_errors = 'On'" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "display_errors = 'On'" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/php.ini

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
