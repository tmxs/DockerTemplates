FROM php:7.4-apache

## --- START: Environment --- ##

ENV APACHE_DOCUMENT_ROOT /var/www/html/web
ENV COMPOSER_ALLOW_SUPERUSER 1

## --- END: Environment --- ##

## --- START: Apache --- ##

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

RUN a2enmod rewrite

## --- START: Apache SSL (Optional) --- ##
# RUN apt-get update && apt-get install -y ssl-cert

# RUN a2enmod ssl
# RUN a2ensite default-ssl
## --- END: Apache SSL (Optional) --- ##

## --- END: Apache --- ##

## --- START: Misc. --- ##

RUN apt-get update && apt-get install -y zip unzip

## --- END: Misc. --- ##

## --- START: PHP --- ##

# Xdebug
RUN pecl install xdebug-2.9.8 \
    && docker-php-ext-enable xdebug

# GD; Taken from https://hub.docker.com/_/php
RUN apt-get update && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Imagick
RUN apt-get update && apt-get install -y libmagickwand-dev \
    && pecl install imagick \
    && docker-php-ext-enable imagick

# Intl
RUN apt-get update && apt-get install -y libicu-dev \
    && docker-php-ext-install intl

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
COPY php.ini /usr/local/etc/php/php.ini
COPY opcache.ini /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

EXPOSE 80

RUN chmod -R 777 /var/www/html

## --- END: PHP --- ##
