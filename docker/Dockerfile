FROM php:7.4-apache

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

RUN apt update \
    && apt install libzip-dev zip -qy \
    && apt clean \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_connect_back=1" >> /usr/local/etc/php/php.ini \
    && php -m

COPY apache-vhost.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

WORKDIR /var/www/
