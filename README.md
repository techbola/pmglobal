## About Project

A RESTful JSON HTTP API gateway that allows programmatic CRUD operations on user records. All requests are authenticated using HTTP Basic Authentication.

### Project Setup

- Clone the repository
    - git clone https://github.com/techbola/pmglobal.git
- cd into the project directory
    - cd pmglobal
- Install the dependencies for the application
    - composer install
- Create a .env file from the .env.example
    - cp .env.example .env
- Generate an application key
    - php artisan key:generate
- Create a database called pmglobal in your database
- Update the env files with your mysql connection details that you have on your system
    DB_CONNECTION=mysql  
    DB_HOST=YOUR_HOST  
    DB_PORT=MYSQL_PORT  
    DB_DATABASE=pmglobal  
    DB_USERNAME=MYSQL_USER_NAME  
    DB_PASSWORD=MYSQL_PASSWORD
- Running migration data into the database
    - php artisan migrate
- Running seeder file (Dummy data) into the database
    - php artisan db:seed
- Serve the project
    - php artisan serve