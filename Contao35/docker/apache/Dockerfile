FROM php:7.3.4-apache

RUN docker-php-ext-install mysqli

RUN apt-get update && \
     apt-get install -y \
         zlib1g-dev libzip-dev zip \
         && docker-php-ext-install zip

RUN apt-get -y update && apt-get install -y libjpeg62-turbo-dev libpng-dev vim tmux

# XDebug Setup
RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN a2enmod rewrite

RUN apt-get -y update && apt-get install -y locales && {\
 echo "de_DE.UTF-8 UTF-8"; \
 echo "en_US.UTF-8 UTF-8"; \
 echo "ru_RU.UTF-8 UTF-8"; \
 echo "de_DE ISO-8859-1"; \
 echo "en_US ISO-8859-1"; \
 echo "ru_RU ISO-8859-1"; \
} > /etc/locale.gen && locale-gen

RUN apt-get -y install iputils-ping rsync openssh-client
RUN apt-get -y update && apt-get install -y libjpeg62-turbo-dev libpng-dev libxpm-dev libwebp-dev libfreetype6-dev libmcrypt-dev libjpeg-dev

RUN docker-php-ext-configure gd \
--enable-gd-native-ttf \
--with-freetype-dir=/usr/include/freetype6 \
--with-png-dir=/usr/include \
--with-jpeg-dir=/usr/include \
&& docker-php-ext-install gd

RUN docker-php-ext-install json && docker-php-ext-install exif && docker-php-ext-enable exif
