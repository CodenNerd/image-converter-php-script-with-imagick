FROM php:7.4-cli

RUN apt-get update && apt-get install -y && \
    apt-get install imagemagick -y

RUN apt-get install -y libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
	&& docker-php-ext-enable imagick

COPY . /usr/src/myapp

WORKDIR /usr/src/myapp

CMD [ "php", "./index.php" ]
