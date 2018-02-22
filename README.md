# mvcorm
Practica sistema con mvc usando orm Illuminate

Este sistema fue probado con XAMMP y en debian 9

Para configurar debian como servidor, instalar los siguientes paquetes:

#Apache
sudo apt-get install apache2

#mariadb base de datos
sudo apt-get install mariadb-server

#PHP 7
sudo apt-get install -y php7.0 libapache2-mod-php7.0 php7.0-cli php7.0-common php7.0-mbstring php7.0-gd php7.0-intl php7.0-xml php7.0-mysql php7.0-mcrypt php7.0-zip

#habilitar mod_rewrite para url amigable, tambien en consola
sudo a2enmod rewrite

#Configurar apache, editar con VI o nano
/etc/apache2/sites-available/000-default.conf

<VirtualHost *:80>
    <Directory /var/www/html>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Require all granted
    </Directory>

    . . .
</VirtualHost>

#Reiniciar apache
apache service apache2 restart

#Se pueden copiar los archivos a /var/www/html o crear un virtual host

#configuracion de php.ini, habilitar estas configuraciones quindo comentarion unix o borrando el caracter #

opcache.enable=1;
opcache.memory_consumption=256;
opcache.max_accelerated_files=20000;
opcache.max_wasted_percentage=10;
opcache.revalidate_freq=360;
opcache.fast_shutdown=0;
opcache.enable_cli=0;
opcache.revalidate_path=0;
opcache.validate_timestamps=0;
opcache.interned_strings_buffer=32;

service apache2 restart

#configurar database, la primera vez no deberia pedir contraseña
sudo mysql -h localhost -u root

#dentro de mysql, crear base dedatos
CREATE DATABASE banco;

#crear usuario y dar privilegios
CREATE USER 'nombre_usuario' IDENTIFIED BY 'contraseña';
GRANT USAGE ON *.* TO 'nombre_usuario'@localhost IDENTIFIED BY 'contraseña';
GRANT ALL privileges ON banco.* TO nombre_usuario@localhost;
FLUSH PRIVILEGES;

#y exit para salir de mariadb, exportar base de datos del archivo sql
mysql -u nombre_usuario -p banco < banco.sql

#actualizar usuario y contraseña del proyecto, en el proyecto editar usuario y contraseña de la ruta
App/Config/env.php

