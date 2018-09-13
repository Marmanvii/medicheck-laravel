# medicheck-laravel
A simple web system to administrate a single hospital using the laravel framework.

#Linux and Windows Setup

- Go to app/Providers/AppServiceProviders.php:
    - If you are using Linux:
        - Comment lines 9 and 23 following the instructions inside the file.
    - If you are using Windows:
        - Uncomment lines 9 and 23 following the instructions inside the file.

- Go to config/database.php, in the "mysql" section
    - If you are using Linux:
        - Comment line 56 and uncomment line 60 following the instructions inside the file.
    - If you are using Windows:
        - Comment line 60 and uncomment line 56 following the instructions inside the file.

-Changing values in the .env file:
    - DB_DATABASE=homestead (can be changed obviously)
    - For Linux: (Easier if using vagrant)
        - DB_USERNAME=homestead  DB_PASSWORD=secret
    - For Windows:
        - DB_USERNAME=root  DB_PASSWORD=

- After cloning this project, you need to follow these instructions once only:
  https://parzibyte.me/blog/2017/05/29/hacer-despues-clonar-proyecto-laravel/
