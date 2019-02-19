#!/usr/bin/env bash

composer update

php vendor/bin/openapi --format json --output /var/www/app/openapi.json \
    /var/www/app/vendor/project/ \
    /var/www/app/base-spec