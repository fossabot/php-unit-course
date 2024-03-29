FROM ubuntu:18.04

ENV DEBIAN_FRONTEND=noninteractive

ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update -qq && \
    apt-get install -y -qq \
    tzdata \
    apt-transport-https \
    ca-certificates \
    curl apt-utils git wget zip \
    gnupg-agent \
    software-properties-common

RUN apt-get install -y -qq php7.2 libapache2-mod-php7.2 \
    php7.2-dev php7.2-mbstring php7.2-mysql php7.2-zip \
    php7.2-curl php7.2-json php7.2-memcached php7.2-pdo

RUN a2enmod php7.2 && a2enmod rewrite && a2dismod mpm_event && a2enmod mpm_prefork
RUN for file in $(ls /etc/php/7.2/mods-available/); do phpenmod "$(echo $file |cut -d'.' -f1)"; done

RUN mkdir /app
WORKDIR /app
COPY . /app

RUN curl -s https://getcomposer.org/installer | php && \
    chmod +x composer.phar && \
    mv composer.phar /usr/local/bin/composer

RUN cd /app

RUN composer install

CMD ["./vendor/bin/phpunit", "--testdox"]

# Build this image
# docker image build -f Dockerfile-test -t test .

# Run this image
# docker container run --name test test
# docker container run -it --name test test bash
