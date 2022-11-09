FROM php:5.6-fpm-alpine

ENV PHP_ERROR_REPORTING="E_ALL"

# Install extensions
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
RUN install-php-extensions curl

RUN apk update && \
    apk add curl && \
    apk add bash && \
    apk add nano

ENTRYPOINT [ "php-fpm", "--nodaemonize" ]