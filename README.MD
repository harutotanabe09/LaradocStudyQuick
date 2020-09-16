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

 

# Uninstall  Docker Container's

```sh
docker system prune
docker rmi $(docker images -q)
```

