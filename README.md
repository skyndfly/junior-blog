# Install

- git clone ...
- composer install
- cp .env.example .env
- cd vendor/bin
- ./sail up
- ./sail npm run build
- access: http://0.0.0.0:1341
- add admin - ```./sail artisan admin:register```
- access: http://0.0.0.0:1341/lk


# Bugs

## mysql start error on ./sail up
    mysql-1         | 2024-08-28T14:48:18.639935Z 0 [ERROR] [MY-010259] [Server] Another process with pid 62 is using unix socket file.
    mysql-1         | 2024-08-28T14:48:18.639947Z 0 [ERROR] [MY-010268] [Server] Unable to setup unix socket lock file.
    mysql-1         | 2024-08-28T14:48:18.639951Z 0 [ERROR] [MY-010119] [Server] Aborting

solution: ❓


## mysql db not exists
solution: add user manually
- login to mysql container
- mysql -u root -p
 
    
    CREATE USER 'sail'@'%' IDENTIFIED BY 'password'; 
    GRANT ALL PRIVILEGES ON laravel.* TO 'sail'@'%';
    FLUSH PRIVILEGES;

