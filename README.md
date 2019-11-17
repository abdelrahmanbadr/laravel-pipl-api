# Laravel-pipl-api
A Laravel Pckage connecting your application to pipl api

## Installation

Laravel Pipl API supports Laravel 5.5 and higher.

### Package
Require via composer
* composer require abdelrahmanbadr/pipl-laravel

* In your .env file set Pipl API key in PIPL_API_KEY
* In your .env file set PIPL_API_BASE_URL (optional and the default url is http://api.pipl.com/search/)

### Usage:
* you can path the search feilds as array of keys and values of person data
* Example: Pipl::search(['first_name'=> 'john', 'last_name'=>'doe', 'email'=>'example@example.com']);

Getting Started & Code Snippets
-------------------------------

**Pipl's Search API**
* Getting started - [https://pipl.com/dev/guide/getting_started](https://pipl.com/dev/guide/getting_started)
* Code snippets - [https://pipl.com/dev/guide/code_snippets](https://pipl.com/dev/guide/code_snippets)
* Full reference - [https://pipl.com/dev/reference](https://pipl.com/dev/reference)

## Running Unit tests:
    $ ./vendor/bin/phpunit

