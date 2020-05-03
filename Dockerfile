FROM wordpress

COPY ./bin/docker-setup /usr/local/bin/setup

RUN apt-get update \
  && apt-get install -y less \
  && curl https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    --output /usr/local/bin/wp-cli \
  && chmod +x /usr/local/bin/wp-cli
