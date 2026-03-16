FROM richarvey/nginx-php-fpm:3.1.6

WORKDIR /var/www/html

COPY . /var/www/html

# Asegura carpetas
RUN mkdir -p /var/www/html/.render/scripts /var/www/html/.render/nginx

# Habilita tu config de nginx
RUN rm -f /etc/nginx/sites-enabled/default.conf
COPY .render/nginx/default.conf /etc/nginx/sites-enabled/default.conf

# Permiso al script
RUN chmod +x /var/www/html/.render/scripts/start.sh

EXPOSE 8080