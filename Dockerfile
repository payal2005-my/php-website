
FROM dunglas/frankenphp:1-php8.4

RUN install-php-extensions mysqli pdo_mysql

WORKDIR /app
COPY . /app
