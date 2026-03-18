FROM webdevops/php-nginx:8.2

WORKDIR /var/www/html

COPY . /var/www/html

COPY .render/nginx/default.conf /opt/docker/etc/nginx/vhost.conf
COPY .render/scripts/start.sh /start.sh

RUN chmod +x /start.sh

EXPOSE 8080

CMD ["/start.sh"]