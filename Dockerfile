FROM php:8.4.15-zts-alpine3.21

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 安装 bcmath
RUN docker-php-ext-install bcmath

#  php-xdebug
RUN apk add --update linux-headers && \
    apk add --no-cache --virtual .build-deps $PHPIZE_DEPS && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug \
    && apk del .build-deps

COPY . /app

WORKDIR /app

CMD ["php", "-S", "0.0.0.0:8080", "-t", "/app/public"]