FROM php:7.2-cli-alpine

RUN apk add --update bash git \
    build-base autoconf libtool pcre-dev curl && \

    #####################################
    # postgres:
    #####################################
    apk add --update postgresql postgresql-dev && \
    docker-php-ext-install pdo_pgsql && \

    #####################################
    # Zip:
    #####################################
    apk add --update zlib-dev zlib && \
    docker-php-ext-install zip && \

    #####################################
    # clean up:
    #####################################
    apk del --purge *-dev build-base autoconf libtool && \
    rm -rf /usr/include/php7 /usr/lib/php7/build /usr/lib/php7/modules/*.a

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

RUN touch /var/log/php_error.log && \
    chmod 777 /var/log/php_error.log

COPY entrypoint.sh /var/www/entrypoint.sh
COPY php-resources.ini /usr/local/etc/php/conf.d/php-resources.ini

WORKDIR /var/www/app

ENTRYPOINT /var/www/entrypoint.sh
