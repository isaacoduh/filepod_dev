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
