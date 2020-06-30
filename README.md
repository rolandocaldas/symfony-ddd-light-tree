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

Activate Symfony Messenger doctrine transport

```shell script
sf messenger:setup-transports
```
