# HIVE

Hive is a simple web application built with Laravel 8, Bootstrap 5, etc.

## Requirements

The following tools are required in order to start the installation.

* PHP 8.0 or higher
* Database (eg: MySQL, MariaDB)
* Local Development (Laragon for Windows)

## Installation

- Clone the repository with `git clone`
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate` (database table for test)
- Run `npm install`
- Run `npm run dev`

You can now visit the app in your browser by visiting [https://hive.test](http://hive.test).

After run php artisan migrate , you can create your account and start creating post.

## Note
This web is still in development and will be update time by time.

Next update :
- Delete and Restore
- Image Upload
- Categories linked with post
- Profile Update
- System Setting
