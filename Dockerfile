FROM php:7.4-apache

WORKDIR /var/www/html

ARG WWWGROUP

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update && apt-get install -y \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        zip \
        curl \
        unzip \
        libmagickwand-dev --no-install-recommends \
        supervisor \
        ghostscript \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libc-client-dev libkrb5-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-ext-install mbstring \
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install -j$(nproc) imap \
    && mkdir -p /usr/src/php/ext/imagick \
    && curl -fsSL https://github.com/Imagick/imagick/archive/06116aa24b76edaf6b1693198f79e6c295eda8a9.tar.gz | tar xvz -C "/usr/src/php/ext/imagick" --strip 1 \
    && docker-php-ext-install imagick \
    && docker-php-source delete

RUN sed -i '/disable ghostscript format types/,+6d' /etc/ImageMagick-6/policy.xml
   
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
    
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

RUN groupadd --force -g $WWWGROUP sail

RUN useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u 1337 sail

RUN chown -R sail:$WWWGROUP /var/www/html \
    && a2enmod rewrite \
    && a2enmod headers

COPY start-container /usr/local/bin/start-container

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY php.ini /usr/local/etc/php/php.ini

RUN chmod +x /usr/local/bin/start-container
    
ENTRYPOINT ["start-container"]
