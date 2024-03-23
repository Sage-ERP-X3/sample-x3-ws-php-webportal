FROM php:8.3-apache as base

EXPOSE 80

WORKDIR /app

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt-get update -qq && \
    apt-get install -qy \
    git \
    gnupg \
    unzip \
    zip \
    libxml2-dev \
    vim && \
    docker-php-ext-install soap && \
    apt-get upgrade ca-certificates
    
COPY conf/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY conf/apache.conf /etc/apache2/conf-available/z-app.conf

RUN a2enmod rewrite remoteip && \
    a2enconf z-app
    
FROM base as dev-sage

COPY conf/Sage-Cisco-Umbrella-Root-CA.crt .

RUN mv Sage-Cisco-Umbrella-Root-CA.crt /etc/ssl/certs/ca-certificates.crt

COPY conf/php.ini-development /usr/local/etc/php/conf.d/php.ini

FROM base as dev-myx3

COPY conf/php.ini-development /usr/local/etc/php/conf.d/php.ini

