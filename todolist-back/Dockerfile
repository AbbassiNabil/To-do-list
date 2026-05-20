<<<<<<< HEAD
FROM php:8.1.31-apache

# RUN apt-get update && \
#     apt-get install php8.1-mysqli
=======
FROM php:8.4.21-apache-trixie
>>>>>>> 974e667aa4adaf5fcf1ae5c957a92b6b191281db

# Install MySQL extension
RUN docker-php-ext-install mysqli pdo pdo_mysql

<<<<<<< HEAD
COPY src/ /var/www/html/
=======
COPY src/ /var/www/html/
COPY src /usr/src/todolist
WORKDIR /usr/src/todolist
EXPOSE 80
>>>>>>> 974e667aa4adaf5fcf1ae5c957a92b6b191281db
