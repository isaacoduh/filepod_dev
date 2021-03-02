# FilePod Project

-   Manage your files, and keep track of them

-   Login.
-   With username and password.
    -Logout
-   User interface
-   File upload (max 8 mb)
-   Files can be deleted, renamed and downloaded
-   List of all files of the logged in user
    -With the following info: file name, file format, file size.

# Installation Guide

-   clone repository
-   cp .env.example .env
-   run composer install
-   run npm install && npm run dev

# Usage Guide

-   Run application with npm run serve
-   Navigate to /register
-   Create an account and start exploring the application

# Key Points

-   There is a dockerfile attached so you can decide to run it in docker
-   The login credentials use a "Username" parameter. Not email address
-   There are validation handlers on the project

## Getting started Docker

#### Prerequisites:

-   Docker Engine (v19.03.0+)
-   Docker Compose

You can either:

-   Install [Docker Desktop](https://www.docker.com/products/docker-desktop) (includes both Docker Engine and Docker Compose)

OR

-   Install [Docker Engine](https://docs.docker.com/engine/install/) and [Docker Compose](https://docs.docker.com/compose/install/) separately.

#### Setup:

1. Open a new instance of the terminal, navigate to the root directory of the project and execute the following command to bring all the containers up.

    ```
    $ docker-compose up -d
    ```

    The command will take a while to run, since it will download/build the images for the first time.
    After the images are ready, it will start the containers.
    The next time you run this command it will be way faster to execute.

    _note: any change you make to the Dockerfile or any other file that the Dockerfile uses (excluding docker-compose.yaml) you will need to build the images again for the changes to take effect by executing the following command._

    ```
    $ docker-compose build && docker-compose up -d
    ```

2. When all containers are up and running, enter the app container by executing the following command.

    ```
    $ docker-compose exec app bash
    ```

3. Install all composer packages included in composer.json

    ```
    $ composer install
    ```

4. Install all npm packages included in package.json

    ```
    $ npm install
    ```

5. Run all mix tasks.

    ```
    $ npm run dev
    ```

6. Create a .env file from the existing .env.example

    ```
    $ cp .env.example .env
    ```

7. Generate a Laravel App Key.

    ```
    $ php artisan key:generate
    ```

8. Run the database migrations.

    ```
    $ php artisan migrate
    ```

9. Modify the following fields in your .env file to use the values specified in the database container.

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=demo
    DB_USERNAME=root
    DB_PASSWORD=root
    ```

10. To access your Laravel Application visit [http://localhost:8000](http://localhost:8000)
