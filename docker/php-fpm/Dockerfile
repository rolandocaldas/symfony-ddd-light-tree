FROM rolandocaldas/php:7.4-dev

ARG LOCAL_UID
ARG LOCAL_GID

RUN usermod -u ${LOCAL_UID:-33} www-data && groupmod -g ${LOCAL_GID:-33} www-data
