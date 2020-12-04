FROM php:7.4-apache

RUN docker-php-ext-install mysqli

# Composer

ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
