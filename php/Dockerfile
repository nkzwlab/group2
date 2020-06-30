FROM php:7.2-fpm

RUN apt update \
    && docker-php-ext-install pdo_mysql

COPY php.ini /usr/local/etc/php/
