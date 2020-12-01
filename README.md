# Laravel 8 - Multiple Database Connections


### Create new Laravel project or clone this project
```bash
laravel new laravel

git clone https://github.com/ravuthz/l8-multiple-db.git

composer install
```

### Check and configure database connections in .env
```bash
cat .env | grep DB

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3309
DB_DATABASE=multiple_db_1
DB_USERNAME=adminz
DB_PASSWORD=123123

DB_CONNECTION_2=connection2
DB_HOST_2=127.0.0.1
DB_PORT_2=5432
DB_DATABASE_2=multiple_db_2
DB_USERNAME_2=adminz
DB_PASSWORD_2=123123

DB_CONNECTION_3=connection3
DB_DATABASE_3=multiple_db_3.sqlite
```

Then create 3 databases from different connections
- Default database is mysql
- 2nd database connection is PostgreSQL
- 3rd database connection is Sqlite

### Test database connections with unit test
```bash
php artisan make:test DatabaseConnectionsTest --unit
php artisan test
```

### Create some models to test multiple database connections 
```bash
php artisan make:model Category -m
php artisan make:model Post -m
php artisan make:model News -m

php artisan make:factory CategoryFactory --model=Category
php artisan make:factory PostFactory --model=Post
php artisan make:factory NewsFactory --model=News
```

### Migrate databases
```bash
# Migrate database default/primary connection
php artisan migrate
php artisan migrate --database=mysql

# Migrate database secondary connection
php artisan migrate --database=connection2
php artisan migrate --database=connection3
```

### Migrate and seeding data
```bash
# If we configure connection in each models we just migrate
php artisan migrate:refresh
php artisan migrate:refresh --seed
```

### Test database connection models with end points
```bash
php artisan serve

curl http://localhost:8000/category
http http://localhost:8000/post
start http://localhost:8000/news
```
