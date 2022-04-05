# job-portal
This project is made PHP using Laravel framework.

# Installations

## If you receive and error while installation below::
run composer update instead of composer install also run php artisan key:generate

1. Clone the repository
https://github.com/tusharslife/job-portal.git


2. Set the basic config
Edit example.env to .env
Put your db username and password here with DB_DATABASE=jobportal.
'''

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306 
DB_DATABASE=jobportal
DB_USERNAME=root
DB_PASSWORD=
'''

3. Install Dependencies
~composer install
~npm install
~npm run dev

4. Migrate Database
~php artisan migrate:fresh
~php artisan db:seed

5. Serve application
~php artisan serve
