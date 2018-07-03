FROM php:5.6-apache
RUN apt-get update && apt-get install -yq \
        libfreetype6-dev \
        libmcrypt-dev \
        libpng-dev \
        libjpeg-dev \
        libpng-dev
RUN docker-php-ext-install gd
COPY . /var/www/html/
