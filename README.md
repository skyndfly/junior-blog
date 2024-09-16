# Install

- git clone ...
- composer install

```
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

- copy .env config
  - ```cp .env.example .env```
- run app.containers

    cd vendor/bin
    ./sail up

- build css
  - ```./sail npm install```
  - ```./sail npm run **build**```
    - or ./sail npm run **dev** (❓bug)
- db init
  - ```./sail artisan migrate```
- access to site
  - ```./sail open```
  - or manuall http://0.0.0.0:1341/lk
- add admin user
  - ```./sail artisan admin:register```

# настройка dev-окружения

## ОБЯЗАТЕЛЬНО: форматирование кода для команды
- стандарт: PSR12
- из коробки установлен Laravel Pint
- надо настроить IDE на форматирование при commit
- инструкция в блоге (https://github.com/skyndfly/junior-blog/issues/55)

# Known Bugs

## .npm run dev - no css-styles

the problem is somewhere in /vite.config.js
domain in server.hmr.host - if commented out, styles will work

## mysql start error on ./sail up (fixed #57)

```
mysql-1         | 2024-08-28T14:48:18.639935Z 0 [ERROR] [MY-010259] [Server] Another process with pid 62 is using unix socket file.
mysql-1         | 2024-08-28T14:48:18.639947Z 0 [ERROR] [MY-010268] [Server] Unable to setup unix socket lock file.
mysql-1         | 2024-08-28T14:48:18.639951Z 0 [ERROR] [MY-010119] [Server] Aborting
```

solution: in ```docker-compose.yml``` set ```MYSQL_ROOT_HOST:``` to ```'mysql'```

## mysql db not exists (fixed #73)

solution: add user manually

- login to mysql container
- mysql -u root -p

```
CREATE USER 'sail'@'%' IDENTIFIED BY 'password'; 
GRANT ALL PRIVILEGES ON laravel.* TO 'sail'@'%';
FLUSH PRIVILEGES;
```

