# Practical job interview task

This is the end result of an app I was given to do for a job interview.

## Installation

1. Checkout this repository
1. Install all dependencies with: `composer install` and `yarn install`
1. Open the `.env` file and change the database configuration to yours. I have used a local database, after that create database, default name is `marks`. Database creation can be initiated with `php bin/console doctrine:database:create`
1. Run `php bin/console doctrine:migrations:migrate` in the terminal for the latest migration, this will create necessary tables and populate them.
1. Run `yarn encore dev` to build front-end code.
1. Lastly, start the Symfony server, you can use `symfony serve -d` or `symfony serve`

## File explanation
* Symfony related files:
    * `src/Controller/DefaultController.php` - Default controller which is used to render the main page.
    * `src/Controller/DataFetchController.php` - Controller which is used to send JSON response after communicating with Database and processing the data.
    * `src/Repository/StudentRepository.php` - Student Repository class which is sending direct SQL queries to database to retrieve necessary data.
    * `migrations/Version20210107171213.php` - Initial Database migration to create and populate tables.
* React.js related files:
    * `assests/js/table.js` - component for the Table we are displaying.
    * `assets/js/api/table_api.js` - extra component for the Table component to send POST requests to the back-end server.

## My comments on the task
* Used PHP language, Symfony 4.4 Framework, MySQL (MariaDB), did not use Docker.
* Tried to create SQL query with the QueryBuilder, but used regular SQL query to receive data from the database.
* Firstly I imported .sql file into the database and then generated all entities, getters/setters and repositories for it.
* Created StudentRepository function to fetch all data which is necessary. Since the task did not specify if there should be any user input, I did not create any function variables.
* Created separate controller to fetch, process, and return student data.
* The biggest learning curve was adding React to Symfony app and using it.
* POST requests has been checked with Postman application and of course with React.js api call.
* I feel that I have completed the task successfully although I believe there are things that can be done better.