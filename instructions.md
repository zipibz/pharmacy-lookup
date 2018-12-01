# Instructions
After exploring multiple development environment options for Laravel, the simplest in my opinion is to use native development tools out of the variety of options available. Some of the environments I explored included: Laravel Valet, Homestead/Vagrant, and Laradock.

That being said, if you are familiar with an easier way to set this up feel free to do so. These steps are what seemed to work best for me being new to Laravel.

## Pre-requisites
These setup instructions require a unix-based terminal and Homebrew.

1. Install or update [Homebrew](https://brew.sh/) to the latest version using `brew update`.
2. Install the latest PHP version using Homebrew via `brew install php`.
3. Install [Composer](https://getcomposer.org/).
4. Install MySQL using Homebrew via `brew install mysql`

## Database Setup
After installing mysql, you will need to create a database to allow the application to perform migrations and seeding. Perform the steps below in your terminal to create a database that the application can connect to:
1. Login to mysql using root user via `mysql -uroot -p`
2. Create the database via `create database default_db;`

> "default_db" is the name of the database specified in the .env file for the application

Alternatively, you can manually add [default_db.sql](default_db.sql) and [pharmacies.sql](pharmacies.sql) to your MySQL database.

## Running the API
Follow the steps below to get the api up and running on your machine:

1. Navigate to a folder of your choice on your file system and run the following command in your terminal:
`$ git clone https://github.com/zipibz/pharmacy-lookup.git`

> Make sure you have GIT installed.

2. Navigate into the downloaded project directory, and make a copy of the .env.example file:
`$ cd pharmacy-lookup`
`$ cp .env.example .env`
> The .env file contains information that will allow the project to connect to your database in the following steps

3. Install project dependencies using Composer:
`$ composer install`

4. Migrate and seed database
`$ php artisan migrate --seed`
> This step loads the pharmacies.csv file into a new pharmacies table
5. Finally, running the following command will deploy the api locally:
`$ php artisan serve`

The API will now be available at `localhost:8000`. Navigating there should display the default Laravel landing page.

## Hitting the API
In order to send requests to the API, you can do so using any HTTP client of your choice. My preferred ways of testing endpoints are:

### via Browser
Open a browser of your choice, enter the following address in the address bar, and press enter:

`localhost:8000/api/pharmacies/latitude/38.825469/longitude/-94.507300`

You should see a JSON string as the response body.

### via Postman
1. Download [Postman](https://www.getpostman.com/apps).
2. Download the [attached collection](./pharmacy-lookup.postman_collection.json) and import it into Postman.
3. Open the collection and hit "Send".
4. You can also view an example request attached to the collection.
