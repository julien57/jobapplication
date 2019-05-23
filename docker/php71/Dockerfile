FROM php:7.1-fpm

# PHP
# https://gist.github.com/chronon/95911d21928cff786e306c23e7d1d3f3
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libcurl4-openssl-dev \
    libxml2-dev \
    unzip \
    zlib1g-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure soap --enable-soap \
    && docker-php-ext-install soap \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-install curl \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install xml \
    && docker-php-ext-install zip \
    && docker-php-ext-install intl \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

# Yarn
RUN apt-get update && apt-get install -y \
    gnupg2 \
    apt-transport-https
RUN curl -sL https://deb.nodesource.com/setup_11.x | bash - \
    && apt-get install -y nodejs
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
    && apt-get update \
    && apt-get install -y yarn

# Composer
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    zip \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer

# Set permissions
RUN mkdir -p /usr/share/nginx/html/vendor \
    && mkdir -p /usr/share/nginx/html/var/cache \
    && mkdir -p /usr/share/nginx/html/var/logs \
    && chown -R www-data:www-data /usr/share/nginx/html/vendor \
    && chown -R www-data:www-data /usr/share/nginx/html/var \
    && chown -R www-data:www-data /var/www

# usefull tools
RUN apt-get install -y --no-install-recommends \
    wget \
    nano \
    htop

# Always use www-data user to preserve permissions
USER www-data

WORKDIR /usr/share/nginx/html
