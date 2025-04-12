FROM php:8.4-apache

# Instala extensões necessárias
RUN docker-php-ext-install pdo pdo_mysql

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ativa o mod_rewrite do Apache
RUN a2enmod rewrite

# Copia vhost personalizado
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Copia os arquivos da aplicação
COPY . /var/www/html

# Define diretório de trabalho
WORKDIR /var/www/html

# Instala dependências do projeto
RUN composer install

# Permissões
RUN chown -R www-data:www-data /var/www/html
