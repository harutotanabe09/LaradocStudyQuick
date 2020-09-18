# Install Laradoc

```shell
git clone https://github.com/Laradock/laradock.git
cd laradock
cp env-example .env
docker-compose up -d nginx mysql
docker-compose exec --user=laradock workspace bash
composer create-project --prefer-dist laravel/laravel app
```

# Overriding defaults

edit .evn file

```diff
- APP_CODE_PATH_HOST=../
+ APP_CODE_PATH_HOST=../app
```

# Running the project

Running the project is as simple as running

```sh
docker-compose stop
docker-compose up -d nginx mysql
```

 the server runs at `http://localhost`

# How do I get into a Docker container's shell?

```sh
docker-compose exec workspace bash
```

# Set Up Database

Edit File

```diff
-DB_CONNECTION=mysql
-DB_HOST=127.0.0.1
-DB_PORT=3306
-DB_DATABASE=laravel
-DB_USERNAME=root
-DB_PASSWORD=
+DB_CONNECTION=mysql
+DB_HOST=mysql
+DB_PORT=3306
+DB_DATABASE=laravel
+DB_USERNAME=root
+DB_PASSWORD=root
```

Execute Dokcer

```sh
docker-compose exec mysql bash

> mysql -u root -proot

> create database laravel;

docker-compose exec workspace bash

> php artisan migrate
```

# Uninstall  Docker Container's

```sh
docker system prune
docker rmi $(docker images -q)
```

# Create Test Code

```sh
php artisan make:test UserTest --unit
```

# Run Test code

```sh
php artisan test

php artisan key:generate --env=testing

php artisan migrate --env=testing

php artisan make:test Database/DatabaseTest

```
