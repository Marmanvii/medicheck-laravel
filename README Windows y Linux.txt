ARCHIVOS A MODIFICAR

En app/Providers/AppServiceProviders.php
Si se utiliza Linux:
Comentar la linea 9 y 23 según instrucciones en el archivo.
Si se utiliza Windows:
Descomentar la linea 9 y 23 según instrucciones en el archivo.

En config/database.php
En la sección de "mysql"
Si se utiliza Linux:
Comentar linea 56 y descomentar linea 60 según instrucciones en el archivo
Si se utiliza Windows:
Comentar linea 60 y descomentar linea 56 según instrucciones en el archivo

Cambiar datos del archivo .env 
DB_DATABASE=homestead
Para Linux
    DB_USERNAME=homestead
    DB_PASSWORD=secret
Para Windows
    DB_USERNAME=root
    DB_PASSWORD=

*En windows, seguir el siguiente tutorial*
https://parzibyte.me/blog/2017/05/29/hacer-despues-clonar-proyecto-laravel/
Se debe realizar solo la primera vez que se clona el proyecto.
