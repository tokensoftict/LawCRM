## Installation Set Up

## Laravel Installation

- Fork or clone this project

- Ensure you have PHP 8.1 or newer version installed and setup properly

- Ensure you can run `php` on your terminal, by adding `php` to your system `path` variables

- Rename .env.example to .env and modify the values
- Configure the database connection values in the .env files for database connection
  - `DB_CONNECTION=`
  - `DB_HOST=`
  - `DB_PORT=`
  - `DB_DATABASE=`
  - `DB_USERNAME=`
  - `DB_PASSWORD=`
- Please ensure the `QUEUE_CONNECTION` in the env value is set to `database` because emails are queued
- Configure the Email Settings values in the env file
  - `MAIL_MAILER=`
  - `MAIL_HOST=`
  - `MAIL_PORT=`
  - `MAIL_USERNAME=`
  - `MAIL_PASSWORD=`
  - `MAIL_ENCRYPTION=`

- Ensure `composer` is installed Check out https://getcomposer.org/ if necessary
- Run `composer install` to install the PHP dependencies with Composer.
- Generate laravel key by running `php artisan key:generate`
- Run `php artisan:migrate` to setup the Laravel database migrations
- Run `php artisan:db:seed` to insert 3 dummy customer data, if needed
- Run `php artisan serve` to start the server
- Open a Web Browser and enter `http://127.0.0.1:8000`


## VueJS Installation (OPTIONAL)

- Note : Installation of VueJS is optional because the vuejs has already been compiled and link appropriately for easy testing
- Ensure you have `Node` installed, and you can run `npm` command on your system
- Run `npm install` to install the Node dependencies needed by the project. Check out https://nodejs.org/en/ if necessary
- Open `resources/views/index.blade.php` in any IDE of your choice
- replace the entire content of the file with the code below
- 
  ```php
  <!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LAW CRM - Job Assessment Project</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
  <div id="app"></div>
  </body>
  </html>
    ```
- Run `npm run dev` to start the node serve and make sure you are running `php artisan serve` in another terminal 
- Open a Web Browser and enter `http://127.0.0.1:8000`

## Sending Queued Emails

- Since the emails are queued in the database, Please run `php artisan queue:work` before adding new customers for mail to get send immediately customers are added

## Sending Emails To Customers With No Passport

- The instruction in the email says the system should send Passport Reminder Emails to customer with no passport every three days so running command `php artisan schedule:run`, should trigger the action, but since we might not want to wait for three days to test this feature running `php artisan check:passport` will trigger the action immediately after customer is profiled on the system
- Run `php artisan check:passport` to trigger Passport Reminder Email.
- Since the emails are queued in the database, Please run `php artisan queue:work` to send or queued email

## Thanks for the Opportunity Cheers!


