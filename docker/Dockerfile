FROM php:8.4-fpm-alpine

# Install dev dependencies
RUN apk update \
    && apk upgrade --available \
    && apk add --virtual build-deps \
    autoconf \
    build-base \
    icu-dev \
    libevent-dev \
    openssl-dev \
    zlib-dev \
    libzip \
    libzip-dev \
    zlib \
    zlib-dev \
    bzip2 \
    git \
    libpng \
    libpng-dev \
    libjpeg \
    libjpeg-turbo-dev \
    libwebp-dev \
    freetype \
    freetype-dev \
    postgresql-dev \
    linux-headers \
    curl \
    wget \
    bash \
    libmemcached-dev \
    mc

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Install Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash -s -- --install-dir=/usr/local/bin

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install -j$(getconf _NPROCESSORS_ONLN) \
    intl \
    gd \
    bcmath \
    pdo_pgsql \
    sockets \
    pcntl \
    zip
RUN pecl channel-update pecl.php.net \
    && pecl install -o -f \
    memcached \
    redis \
    event \
    xdebug \
    && rm -rf /tmp/pear \
    && echo "extension=memcached.so" > /usr/local/etc/php/conf.d/memcached.ini \
    && echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini \
    && echo "extension=event.so" > /usr/local/etc/php/conf.d/event.ini \
    && echo "zend_extension=xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini \
    && docker-php-ext-enable xdebug

# Add developer user
ARG USER=dev
ARG GID=1000
ARG UID=1000
RUN addgroup -S $USER -g $GID  && adduser -S $USER -G $USER -u $UID
USER $USER
