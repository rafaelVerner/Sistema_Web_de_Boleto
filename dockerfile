FROM php:8.1-apache

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar projeto
COPY . /var/www/html/

# Permissões corretas
RUN chmod -R 755 /var/www/html

# Permitir .htaccess
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf && \
    echo '<Directory "/var/www/html">' >> /etc/apache2/apache2.conf && \
    echo '    AllowOverride All' >> /etc/apache2/apache2.conf && \
    echo '</Directory>' >> /etc/apache2/apache2.conf
