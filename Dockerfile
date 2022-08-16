FROM php:7.4-cli

RUN apt-get update && \
    apt-get install imagemagick -y

RUN apt-get install -y libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
	&& docker-php-ext-enable imagick

ENV src_url='https://svs.gsfc.nasa.gov/vis/a000000/a004900/a004955/frames/5760x3240_16x9_30p/fancy/comp.0001.tif'
ENV convert_to=png

COPY . /usr/src/app

WORKDIR /usr/src/app

CMD [ "php", "./index.php" ]
