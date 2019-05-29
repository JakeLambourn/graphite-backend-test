# Graphite backend technical test

## Requirements

* PHP 7.2.x
* MySQL 5.x
* Composer installed in eg `/usr/local/bin` or somewhere else on your PATH

## Setup

1. Create a MySQL database named `graphitetest` for the project
2. Copy `.env.example` to `.env`
3. Adjust database authentication details in the .env file
4. Run `composer install` to install dependencies
5. Run `php artisan migrate` to migrate the database up
6. Run `php artisan key:generate` to create an application key automatically
7. Optionally set up Apache/nginx to run the site locally, or run `php artisan serve` to serve from [http://127.0.0.1:8000/](http://127.0.0.1:8000/)

## Context

The application is a very simple article listing. After you register & log in as a user, you will be able to add articles as required for testing. There's no Edit/Delete functionality; delete in the database if you really need to!

The application is built in Laravel 5.8.

Please spend no longer than 3 hours on this test.

## Tasks

### Known bugs to fix

1. Finish the single-article view method to show the full article on its own
2. Article listing currently shows whole article content; truncate it to a suitable length and include a link to single-article view
3. Article listing shows escaped HTML, not unescaped HTML. Fix this and ensure similar is done for single-article view
4. There's a missing database column. Add this with a suitable migration

There may be other bugs/oddities that you encounter; please resolve as you deem appropriate and note accordingly in your response back to Graphite.

### Features to add

1. Article listing - restrict to latest 10 items
2. Add a `promoted` property to the Article model, and ensure promoted articles are shown first, with some kind of visual highlight to indicate their promoted status
3. Add the signed-in user's email address/username to the top of the page
4. Add Google reCAPTCHA to the login page, using configuration for site/secret keys as appropriate

## Notes

* You can add external libraries/packages if required, in order to complete the above tasks
* Please use Git version control as appropriate to track your changes & history. We'll need a git repository complete with all history supplied back to Graphite

## Expected response from you on completion

When you've finished, please submit the code test back to `rich.sage@graphitedigital.com` as follows:

* A full git repository, zipped, including all history. If easier, you can push to BitBucket/GitHub and share with the user `richsage` (same on both platforms)
    * If zipped, you don't need to include .gitignore'd files such as `vendors` etc - we'll follow the setup steps above when reviewing
* A high-level overview of what you accomplished during the time allotted
    * If you completed sooner then the time allotted, please let us know how long you spent
* Any recommendations you'd make on this unfamiliar codebase
