## Installation Steps

1. composer install
2. `cp .env.example .env`
3. `php artisan key:generate`


4. Change the database connection in .env file

`DB_CONNECTION=mysql`

`DB_HOST=127.0.0.1`

`DB_PORT=3306`

`DB_DATABASE=test_kind_hub`

`DB_USERNAME=dev`

`DB_PASSWORD=dev@iyngaran55`

5. Change the smtp setting in .env file

`MAIL_DRIVER=smtp`

`MAIL_HOST=smtp.gmail.com`

`MAIL_PORT=587`

`MAIL_USERNAME=user`

`MAIL_PASSWORD=password`

`MAIL_ENCRYPTION=tls`

6. Run the seeder. `php artisan db:seed`

7. then start the application. `php artisan serve` 
