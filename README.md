# Simple Laravel Courier Management

----

#### Quick Overview:


This repo is only for a functionality module! It shows a courier company to enable a feature to their website for allowing the merchants to place an order(Parcel) through the website.

It will allow the merchants to determine the parcel weight, parcel delivery between two specific route and two delivery types such as Regular Service and Express Service. The aplication has multiple pricing rules based on weight,delivery route and delivery type. Moreover, there is an seperate expiratoion date for pricning rules based on promotions.

Furthermore, there is an API endpoint to fetch all the data from Database.

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/installation)

Clone the repository

    git clone git@github.com:fahadchy24/Simple-Laravel-Courier-Management.git

Switch to the repo folder

    cd simple-laravel-courier-management

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:fahadchy24/Simple-Laravel-Courier-Management.git
    cd laravel-realworld-example-app
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding & backup


Run the database seeder

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh


* Also, there is a backup database file included in database folder named 'database.sql'
    
----------


## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api/v1/list




