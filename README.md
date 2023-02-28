# Laravel Breeze blog
## Installation
Setting this up for yourself is relatively simple. You need docker installed on your system, and you need to start it up as a service (probably with SoystemD). After you've cloned the repo, you only really need to run:
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
Then:
```
cp .env.example .env
```
You probably need to change some things in the .env, most importantly the database authentication.
and finally
```
./vendor/bin/sail up -d --build
```
After all of this is completed, you need to generate a key, and do some database migration stuff, and the laravel site will tell you how to do all of this.
