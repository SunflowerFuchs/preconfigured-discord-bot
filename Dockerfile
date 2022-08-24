FROM php:8.1-cli

# Install PHP dependencies

# Install composer and its dependencies
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions zip
RUN apt-get update && apt-get install -y git unzip && rm -rf /var/lib/apt/lists/*
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Load env variables / Build Args
ARG TZ="Europe/Berlin"
ENV TZ ${TZ}

# change workdir
RUN mkdir /app
WORKDIR /app

# add the composer files
COPY ./composer.json /app/composer.json
COPY ./composer.lock /app/composer.lock

# install the composer packages
RUN composer install

# Set up the runner script
COPY ./run.php /app/run.php
CMD ["php", "/app/run.php"]
