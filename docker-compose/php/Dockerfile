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

#RUN apt-get update \
#        && apt install -y \
#           		xfonts-75dpi \
#           		xfonts-base \
#           		gvfs \
#           		colord \
#           		glew-utils \
#           		libvisual-0.4-plugins \
#           		gstreamer1.0-tools \
#           		opus-tools \
#           		qt5-image-formats-plugins \
#           		qtwayland5 \
#           		qt5-qmltooling-plugins \
#           		librsvg2-bin \
#           		lm-sensors \
#           		wget \
#           	&& wget https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6-1/wkhtmltox_0.12.6-1.buster_amd64.deb \
#           	&& dpkg -i ./wkhtmltox_0.12.6-1.buster_amd64.deb \
#           	&& chmod +x /usr/local/bin/wkhtmltopdf \

RUN apt-get update \
        && apt-get install -y wget gnupg g++ locales unzip dialog apt-utils git \
        && apt-get clean \

# Install NodeJS
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash
RUN apt-get update \
        && apt-get install -y \
                        nodejs \
                        npm \
                        ca-certificates \
                        fonts-liberation \
                        libappindicator3-1 \
                        libasound2 \
                        libatk-bridge2.0-0 \
                        libatk1.0-0 \
                        libc6 \
                        libcairo2 \
                        libcups2 \
                        libdbus-1-3 \
                        libexpat1 \
                        libfontconfig1 \
                        libgbm1 \
                        libgcc1 \
                        libglib2.0-0 \
                        libgtk-3-0 \
                        libnspr4 \
                        libnss3 \
                        libpango-1.0-0 \
                        libpangocairo-1.0-0 \
                        libstdc++6 \
                        libx11-6 \
                        libx11-xcb1 \
                        libxcb1 \
                        libxcomposite1 \
                        libxcursor1 \
                        libxdamage1 \
                        libxext6 \
                        libxfixes3 \
                        libxi6 \
                        libxrandr2 \
                        libxrender1 \
                        libxss1 \
                        libxtst6 \
                        lsb-release \
                        wget \
                        xdg-utils \
        && apt-get clean

RUN npm install --global --unsafe-perm puppeteer
RUN chmod -R o+rx /usr/local/lib/node_modules/puppeteer/.local-chromium
