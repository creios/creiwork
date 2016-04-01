FROM php:5.6-apache
RUN a2enmod rewrite
RUN sed -i "s/DocumentRoot \/var\/www\/html/DocumentRoot \/var\/www\/html\/Framework\/Public/" /etc/apache2/apache2.conf
