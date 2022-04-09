FROM nginx:alpine

ENV NGINXUSER=codelex
ENV NGINXGROUP=codelex

RUN mkdir -p /var/www/html

ADD .docker/nginx/app-pong-default.conf /etc/nginx/conf.d/default.conf

RUN sed -i "s/user www-data/user stack/g" /etc/nginx/nginx.conf

RUN adduser -g ${NGINXGROUP} -s /bin/sh -D ${NGINXUSER}
