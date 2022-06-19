##  Laravel Jetstream v3

##### Laravel/Redis/Tailwind/Inertia stack


### Overview

### Installation

#### App requirements

- `nginx`,
- `php@^8.0`,
- `mysql@^8.0`,
- `redis@^7.0`

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

##### 3) Enter app container
```bash   
docker exec -it app bash
```

##### 4) Install dependencies
```bash   
composer install
npm install
```

##### 5) Generate app key
```bash   
php artisan key:generate
```

##### 6) Link storage directory
```bash   
php artisan storage:link
```

##### 7) Run migrations
```bash
php artisan migrate
```

##### 8) Exit app container
```bash   
exit
```

