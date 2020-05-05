# README #

# [SHIFT-GATE development environment]
---

## ■Dependencies

* windows os 10
* git bash latest
* docker for windows
* docker for mac

---

## ■Installation


1) Create and Move deveropment directory

~~~~
【e.g. for windows】

mkdir /c/Users/your_name/development/shiftgate
cd /c/Users/your_name/development/shiftgate
~~~~

2) Clone proxy, db, api, admin

~~~~
git clone git@bitbucket.org:paxcreation/shiftgate-proxy.git
git clone git@bitbucket.org:paxcreation/shiftgate-db.git
git clone git@bitbucket.org:paxcreation/shiftgate-api.git
git clone git@bitbucket.org:paxcreation/shiftgate-admin.git
git clone git@bitbucket.org:paxcreation/shiftgate-front.git
~~~~


3) Set Proxy

~~~~
cd shiftgate-proxy/
cp docker-compose-sample.yml docker-compose.yml

docker network create shared
docker-compose up -d
~~~~

4) Set DB

~~~~
cd ../shiftgate-db/
cp docker-compose-sample.yml docker-compose.yml
docker volume create --name=shiftgate_data
docker-compose up -d
~~~~

~~~~
docker-compose exec mysql mysql -uroot -pmysql
> create database dev_shiftgate_db default character set utf8;
> exit
~~~~


5) Set API

~~~~
cd ../shiftgate-api/
cp docker-compose-sample.yml docker-compose.yml && cp .env.example .env
cd nginx
cp default.conf.example default.conf && cp htpasswd.example htpasswd && cp prod-default.conf.example prod-default.conf
cd ../
docker-compose up -d
docker exec shiftgate-api_php-fpm_1 php composer.phar install
docker exec shiftgate-api_php-fpm_1 php artisan key:generate
docker exec shiftgate-api_php-fpm_1 php artisan migrate
docker exec shiftgate-api_php-fpm_1 php composer.phar dump-autoload
docker exec shiftgate-api_php-fpm_1 php artisan db:seed
docker exec shiftgate-api_php-fpm_1 php artisan jwt:secret
~~~~

6) Add domain in hosts file

~~~~
e.g.
127.0.0.1	localhost api.shiftgate-development.com
~~~~

7) Access Local URL

~~~
http://api.shiftgate-development.com/

▼Basic-Auth
// ID
shiftgate
// PW
j8wfjwl
~~~

