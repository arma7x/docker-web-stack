# Dockerfile

FROM alpine:edge

RUN mkdir -p /home/web

RUN apk update
RUN apk add --no-cache -X http://dl-cdn.alpinelinux.org/alpine/edge/testing php82-pecl-imagick php82-brotli

RUN apk add acl nodejs-current npm yarn python3 go

RUN wget https://bootstrap.pypa.io/get-pip.py
RUN python get-pip.py
RUN rm get-pip.py

RUN apk add php82 php82-common php82-bcmath php82-bz2 php82-cli php82-curl php82-dev php82-gd php82-imap php82-intl php82-mbstring php82-opcache php82-mysqli php82-pgsql php82-sqlite3 php82-redis php82-soap php82-xml php82-xmlreader php82-xmlwriter php82-zip php82-phar php82-intl php82-openssl php82-dom php82-tokenizer php82-ldap php82-fileinfo php82-pdo php82-pdo_mysql php82-pdo_pgsql php82-pdo_sqlite php82-pecl-mongodb php82-pecl-xdebug php82-pecl-memcached php82-pecl-swoole php82-pecl-igbinary php82-pecl-msgpack php82-pecl-imagick php82-brotli

RUN mv /usr/bin/php82 /usr/bin/php

RUN wget https://getcomposer.org/composer.phar
RUN chmod +x ./composer.phar
RUN mv ./composer.phar /usr/bin/composer

ENTRYPOINT ["tail", "-f", "/dev/null"]
