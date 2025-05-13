FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    libzip-dev \
    unzip \
    git \
    curl \
    libxslt1-dev \
    libgmp-dev \
    libicu-dev \
    librabbitmq-dev \
    libreadline-dev \
    libedit-dev \
    libpq-dev \
    zlib1g-dev \
    libssl-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        bcmath \
        gd \
        curl \
        intl \
        soap \
        mysqli \
        pdo_mysql \
        exif \
        gettext \
        gmp \
        xsl \
        zip \
        opcache \
    && pecl install redis && docker-php-ext-enable redis \
    && pecl install amqp && docker-php-ext-enable amqp &&\
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY ./docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

WORKDIR /var/www
