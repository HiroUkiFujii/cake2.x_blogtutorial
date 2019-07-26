FROM php:7-apache

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_PID_FILE /var/run/apache2.pid
ENV APACHE_RUN_DIR /var/run/apache2
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2

RUN apt-get update -y && apt-get install -y apache2 vim wget git libicu-dev libzip-dev zlib1g-dev \
&& docker-php-ext-install zip pdo_mysql mysqli intl

RUN set -x \
&& curl -sS https://getcomposer.org/installer | php \
&& chmod +x composer.phar \
&& mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_NO_INTERACTON 1

EXPOSE 80
CMD ["apachectl", "-D", "FOREGROUND"]