FROM php
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

RUN docker-php-ext-configure pcntl --enable-pcntl \
  && docker-php-ext-install \
    pcntl

ENTRYPOINT ["php", "/usr/src/myapp/artisan", "schedule:work"]
