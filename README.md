# Simple Job Portal
This project is build in PHP using Laravel framework. It serves as a platform between job seeker and provider.
#### Features
1. Company profile
2. Job seeker profile
3. Applied jobs
4. List jobs
5. Apply for jobs
6. Reset password via e-mail
# Installation

Note: If you receive and error while installation below
run composer update instead of composer install also run php artisan key:generate

#### 1. Clone the repository 
    https://github.com/tusharslife/simple-job-portal.git

#### 2. Set the basic config
Edit example.env to .env <br />
Put your db username and password here with DB_DATABASE=vdirect <br />

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=vdirect
    DB_USERNAME=root
    DB_PASSWORD=

#### 3. Install Dependencies
    composer install
    npm install
    npm run dev                

#### 4. Migrate Database
    php artisan migrate:fresh
    php artisan db:seed

#### 5. Serve application
    php artisan serve
