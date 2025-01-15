# Use PHP with Apache as the base image
FROM php:8.3-fpm

ARG user

ARG uid

# Install packages for my machine
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache(optional)
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

#Install PHP Extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

#Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install nodejs
RUN apt install -y ca-certificates gnupg
RUN mkdir -p /etc/apt/keyrings
RUN curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg
ENV NODE_MAJOR 20
RUN echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_MAJOR.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list
RUN apt update
RUN apt install -y nodej

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user


WORKDIR /var/www

COPY . .

COPY --chown=$user:www-data . /var/www

RUN chown -R $user:www-data /var/www/storage
RUN chmod -R ug+w /var/www/storage

USER $user

EXPOSE 9000

CMD ["php-fpm"]

#RUN ["chmod", "+x", "/var/www/docker-compose/startup-commands/run.sh"]
#
#ENTRYPOINT ["sh", "/var/www/docker-compose/startup-commands/run.sh"]
