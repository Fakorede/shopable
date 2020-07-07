[![Open Source Love](https://badges.frapsoft.com/os/v1/open-source.svg?v=103)](https://github.com/ellerbrock/open-source-badges/)

# Shopable

Shopable is an e-commerce application built with Laravel 7.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

## Pre-requisites

What things you need to install the software.

-   Git
-   PHP
-   Composer
-   Web Server like Nginx or Apache
-   Npm or Yarn

## Installation

Clone the git repository on your computer

```
$ git clone https://github.com/fakorede/shopable.git
```

You can also download the entire repository as a zip file and unpack in on your computer if you do not have git

After cloning the application, you need to install it's dependencies.

```
$ cd shopable
$ composer install
$ npm install
```

## Setup

When you are done with installation, copy the .env.example file to .env

```
$ cp .env.example .env
```

Generate the application key

```
$ php artisan key:generate
```

Create database and add its configuration

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

Run database migrations

```
$ php artisan migrate
```

Run the app

```
$ php artisan serve
```

## Built With

-   Laravel - The PHP framework used for building the backend of the application

<!-- -   Laravel - The PHP framework for building the API endpoints needed for the application
-   Vue - The Progressive JavaScript Framework for building interactive interfaces -->
