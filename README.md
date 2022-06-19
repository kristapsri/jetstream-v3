##  Laravel Jetstream v3

##### Laravel/Redis/Tailwind/Inertia stack


### Overview

### Installation

#### App requirements

- `nginx`,
- `php@^8.0`,
- `mysql@^5.7`,
- `redis@^3.2`

0) Create and configure mysql user and database which later should be provided in .env file

1) Run
```bash
   cd app
   cp .env.example .env && vi .env
   composer install
   npm install
   php artisan key:generate
   php artisan storage:link
   php artisan migrate
```
---

### Installation using docker

##### 0) Install docker (if you haven't got one)
##### 1) Copy .env file
```bash   
cp app/.env.example app/.env && vi app/.env
```

##### 2) Run docker compose up command
```bash   
docker-compose up -d
```

##### 3) Enter db container
```bash   
docker-compose exec db bash
```

##### 4) Log into the MySQL root administrative account
```bash   
mysql -u root -p secret
```

##### 5) Grant permissions to project's db user with same password as in env file
```bash   
CREATE USER 'www'@'%' IDENTIFIED BY 'env_password_here';
GRANT ALL PRIVILEGES ON app.* TO 'www'@'%';
FLUSH PRIVILEGES;
exit
```

##### 6) Exit db container
```bash   
exit
```

##### 7) Enter app container
```bash   
docker exec -it app bash
```

##### 8) Install dependencies
```bash   
composer install
npm install
```

##### 8) Generate app key
```bash   
php artisan key:generate
```

##### 9) Link storage directory
```bash   
php artisan storage:link
```

##### 10) Run migrations
```bash
php artisan migrate
```

##### 11) Exit app container
```bash   
exit
```

