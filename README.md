# Simple Job Portal
This project is made in PHP using Laravel framework.

# Installation

Note: If you receive and error while installation below
run composer update instead of composer install also run php artisan key:generate

1. Clone the repository
https://github.com/tusharslife/job-portal.git

2. Set the basic config
Edit example.env to .env
Put your db username and password here with DB_DATABASE=jobportal <br />
'''

    DB_CONNECTION=mysql <br />
    DB_HOST=127.0.0.1 <br />
    DB_PORT=3306 <br />
    DB_DATABASE=jobportal <br />
    DB_USERNAME=root <br />
    DB_PASSWORD= <br />
    '''

3. Install Dependencies <br />
~composer install <br />
~npm install <br />
~npm run dev <br />

4. Migrate Database <br />
~php artisan migrate:fresh <br />
~php artisan db:seed <br />

5. Serve application <br />
~php artisan serve <br />
