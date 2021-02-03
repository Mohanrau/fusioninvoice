ARG version
FROM php:$version

ADD /docker-compose/php/www.conf /usr/local/etc/php-fpm.d/www.conf
ADD /docker-compose/php/uploads.ini /usr/local/etc/php/conf.d/uploads.ini

# RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel
RUN groupadd -g 1000 laravel && useradd -g laravel -s /bin/sh laravel

RUN mkdir -p /var/www/html

RUN chown laravel:laravel /var/www/html

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update \
        && apt install -y \
           		xfonts-75dpi \
           		xfonts-base \
           		gvfs \
           		colord \
           		glew-utils \
           		libvisual-0.4-plugins \
           		gstreamer1.0-tools \
           		opus-tools \
           		qt5-image-formats-plugins \
           		qtwayland5 \
           		qt5-qmltooling-plugins \
           		librsvg2-bin \
           		lm-sensors \
           		wget \
           	&& wget https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6-1/wkhtmltox_0.12.6-1.buster_amd64.deb \
           	&& dpkg -i ./wkhtmltox_0.12.6-1.buster_amd64.deb \
           	&& chmod +x /usr/local/bin/wkhtmltopdf \
           	&& wget -q -O - https://dl-ssl.google.com/linux/linux_signing_key.pub | apt-key add - \
           	&& sh -c 'echo "deb http://dl.google.com/linux/chrome/deb/ stable main" >> /etc/apt/sources.list.d/google.list'

RUN apt-get update \
        && apt install

RUN apt-get install google-chrome-stable -y
