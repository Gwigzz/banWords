### A simple ban words
Simple and fast PHP ban words you want

#### Require
* PHP >= 7.4
* composer

#### Configuration

```php

require_once './vendor/autoload.php';

// 1. Initialize 
$banWords = new BanWords('Hello noob !');

// simple check
$banWords->check();

```