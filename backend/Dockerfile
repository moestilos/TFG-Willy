FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip curl libpq-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_pgsql zip

WORKDIR /app
COPY . /app

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    composer install

EXPOSE 8000

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
