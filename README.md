Basic Documentation for Project Setup
========================================

Please follow the below steps to install and setup all prerequisites:

Composer need to install - Make sure to have the Composer installed & running in your computer.

Step1:
Run following command to install all of the framework's dependencies.

composer install

Step 2: 
Please run the below command to generate the new key.

php artisan key:generate

Step 3:
Please fill your DB credentials in the .env file.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<MYSQL DB NAME>
DB_USERNAME=<MYSQL USER>
DB_PASSWORD=<PASSWORD>

Or 

Follow .env.example for more detail and sample purpose

Step 4:
Run migrations command to  migrate the database tables

php artisan migrate

Step 5:
Run following command to run project on local machine 

php artisan serve

OR

If current port is occupied and/or you want to run project on other ports, Please run following command

php artisan serve --port=8001

Finally 
The development server will accessible at http://localhost:8000 or http://localhost:8001 or any other provided port
