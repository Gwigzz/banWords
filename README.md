## A simple ban words
Simple and fast PHP ban words you want

#### Require
* PHP >= 7.4
* composer

#### Configuration

```php

require_once './vendor/autoload.php';

// 1. Initialize 
$banWords = new BanWords('hello noob you are bad !');

// verry simple
var_dump($banWords->check());

// get true if bad words spotted
$banWords->check()->getSignal();        # return true / false

// get normal characters
$banWords->check()->getCharacters();    # return "hello noob you are bad !"

// get ban words
$banWords->check()->getFilter();        # return "hello *** you are *** !"

```

```
This script is verry simple .
You are welcome to improve it !
```