```shell script
docker run -d -p 8080:80 --name=ddd -v [project patch]\application:/application rolandocaldas/php:7.4-dev
docker exec -it ddd bash
```

Install vendor dependencies and run PHP webserver
```shell script
composer update
cd public
php -S 0.0.0.0:80
```

Create database
```shell script
sf make:migration
sf doctrine:migrations:migrate
```

Activate Symfony Messenger doctrine transport

```shell script
sf messenger:setup-transports
```

Example command CreateExampleCommand:

```shell script
sf app:create-example -t Async -d Description
```

Consume messages
```shell script
sf messenger:consume async
```

Get all examples (query):
```shell script
sf app:all-examples
```