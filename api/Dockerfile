FROM php:8.1-apache

# Instala a extensão pdo_mysql (necessária para conectar ao MySQL)
RUN docker-php-ext-install pdo pdo_mysql

# Ativa o mod_rewrite do Apache (necessário para rotas amigáveis se você usa .htaccess)
RUN a2enmod rewrite

# Copia os arquivos da API para a pasta do Apache
COPY . /var/www/html/

# Ajusta permissões (importante para não dar erro 403)
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta padrão
EXPOSE 80

# Inicia o Apache
CMD ["apache2-foreground"]

