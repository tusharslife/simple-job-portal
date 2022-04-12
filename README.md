# Simple Job Portal
Job Portal project is made in PHP using Laravel framework.

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
    
###### Set Mail details (Can be skipped)
    MAIL_DRIVER=smtp
    MAIL_HOST=[YOUR HOSTNAME example:mtp.googlemail.com]
    MAIL_PORT=[YOUR MAIL PORT]
    MAIL_USERNAME=[YOUR USERNAME]
    MAIL_PASSWORD=[YOUR PASSWORD]
    MAIL_ENCRYPTION=[YOUR MAIL ENCRYPT METHOD]

#### 3. Install Dependencies
    composer install
    npm install
    npm run dev                

#### 4. Migrate Database
    php artisan migrate:fresh
    php artisan db:seed

#### 5. Serve application
    php artisan serve
