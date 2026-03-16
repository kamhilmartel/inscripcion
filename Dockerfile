FROM richarvey/nginx-php-fpm:3.1.6

WORKDIR /var/www/html

COPY . /var/www/html

RUN rm -f /etc/nginx/sites-enabled/default.conf
COPY .render/nginx/default.conf /etc/nginx/sites-available/default.conf

RUN chmod +x /var/www/html/.render/scripts/start.sh