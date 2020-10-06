# My Reddit

## Install

Download the repository

```bash
git clone https://github.com/seeren-training/Symfony
```

Change the directory

```bash
cd my-reddit
```

Install packages

```bash
composer install
```

```bash
npm install
```


Generate database

```bash
bin/console doctrine:database:create
bin/console make:migration
bin/console doctrine:migrations:migrate
```

## Run

Start the server

```bash
symfony server:start
```





