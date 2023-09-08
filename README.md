# D-MCare Platform

## Install
- git clone https://gitlab.com/d-mcare/dmcare_prod_laravel.git
- cd dmcare_prod_laravel
- composer install
- buat database (pake phpmyadmin/adminer/dbeaver/navicat/sqlyog atau sejenisnya)
- cp .env.example .env
- edit file .env
> contoh konfigurasi MySQL

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dmcare_db
DB_USERNAME=root
DB_PASSWORD=
```
- php artisan migrate:fresh --seed
- php artisan key:generate
- php artisan serve


> users
```
kode user: A00001
username : admin_asuransi
password : averin

username: admin@d-mcare.id
password: 1234

username: operator@d-mcare.id
password: 1234
```