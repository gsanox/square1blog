# Square1 technical test

<p align="center"><img src="public/images/logo.png" alt="drawing" width="200"/></p>

This repo contains the **blog** that is used for the technical test using laravel, and the 

The seeders creates the first user, admin, and imports posts for the old website using it's API, also creates new users and posts with random users.

This environment uses sail for development.

This app uses Starter kit Breeze for auth porpouses
https://laravel.com/docs/9.x/starter-kits

The Aplication seeds an admin user who's credentials are as follow:
- **username**: admin
- **email**: admin@mail.com
- **password**: password

## How to use/run this repo

##### Clone this repo
```git
git clone https://github.com/rorepoid/test-square1.git .
```

##### Install dependencies
```bash
composer install
```

##### Modify .env file as you wish
```
cp .env.example .env
```
And generate an app key
```
php artisan key:generate
```

Modify this .env file as you need seeting the desired BD_PASSWORD, DB_DATABASE, etc

##### Execute sail to run the app
```bash
./vendor/bin/sail up
```

##### Migrate the database
```
./vendor/bin/sail artisan migrate    
```
This will create the necessary Tables in the database.
##### Populate the database with data
```
sail artisan db:seed
```
The Seeder creates the admin user, and also other users for testing you to test.

In order to populate the database with the user's old blog using the API, there's a seedder for this pourpouse, it loads the API, insert the posts and create other new posts for others users of the App.

##### Install npm dependencies
```
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

##### How to launch feature test's
```bash
./vendor/bin/sail artisan test
```
This will create the docker containers for the app to be used and tested.
