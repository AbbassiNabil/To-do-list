FROM php:8.1.31-apache

# RUN apt-get update && \
#     apt-get install php8.1-mysqli

# Install MySQL extension
RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY src/ /var/www/html/