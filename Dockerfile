FROM php:7.2-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN rm /etc/apache2/apache2.conf
COPY apache2.conf /etc/apache2/apache2.conf
COPY . /var/www/html
WORKDIR /var/www/html