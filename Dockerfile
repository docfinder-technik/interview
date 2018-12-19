FROM php:7.2-apache

RUN a2enmod rewrite
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
ADD . /var/www/html
RUN chown -R www-data:www-data /var/www/html
