FROM php:8.4.21-apache-trixie

# Install MySQL extension
RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY src/ /var/www/html/
COPY src /usr/src/todolist
WORKDIR /usr/src/todolist
EXPOSE 80
