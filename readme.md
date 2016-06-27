# MetkaMarkkina
An online marketplace application developed using the [Laravel][l1] Framework. The aplication was developed as an exercise for a job opening. The main coding language used is PHP.

The app is mostly in Finnish.

## Installation:

Download source files from github (link somewhere above).

Create the database (use the .env file in the root of the app as a guide). Please note the  *DB_Connectiton* is set to mysql as a default.

The default name for the database is marketData, username: admin, pw: admin.

After the database has been created, open up a command window/console in the root folder and create the schema with
```sh
php artisan migrate
```
This should create all necessary tables in your database.

The project environment is not set up.


### Run
Navigate to the public folder(which contains the index.php file) and open up a server here. I´ve used port 8080.
For example:

```sh
php -S localhost:8080
```

Now simply navigate to http:\\localhost:8080\ to begin.

## Features:

* **User account support (Create an account)**
* **Create, read, delete and list operations**
* **User authentication:** guests cannot delete anything, users can delete their own items or the items of guests (Will be changed)
* **Searchbar:** simple searchbar mechanic will autofill any existing items. Selecting an item and pressing "hae" will take you to the relevant page.
* **Shopping basket:** not yet implemented
* **DHTML list:** The item list has been implemented in jQuery and Ajax.
* **File upload:** Files can be uploaded into the app. They are stored in the /public/images/ folder due to permission reasons.

### Version
1.0


# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)


   [l1]: https://laravel.com/
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
   [Dillinger]: http://dillinger.io/
