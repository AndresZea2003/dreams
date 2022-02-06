# Dreams
Page about an online store with functions to manage users, products and transactions

# Requirements
* Have **php 8.0** installed
* Have the **Laravel 8.x framework** installed

# Installation
You can download the project in .zip format or clone this repository, then you should execute the following command
```shell
composer install
```
Once the command is done, you must follow the following steps:
* Copy the .env.example file and replace it with .env
* Configure your database in the .env file
* Generate a key with the following command:```php artisan key:generate```
* Run the migrations with this command: ```php artisan migrate --seed ```
