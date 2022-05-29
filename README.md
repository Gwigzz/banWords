## Simple PHP ban bad words

Simple and fast PHP ban bad words you want

You need to set the list of bad words in 'BadWords.php'

#### Require
* PHP >= 7.4
* composer

#### Simple usage

```
composer init
composer require grd/ban-words
```

```php

use App\Grd\BanWords\BanWords;

require_once './vendor/autoload.php';

// 1. Initialize 
$banWords = new BanWords('hello noob you are bad !');

// very simple
var_dump($banWords->check());

// get true if bad words spotted
$banWords->check()->getSignal();        # return true / false

// get normal characters
$banWords->check()->getCharacters();    # return "hello noob you are bad !"

// get ban words
$banWords->check()->getFilter();        # return "hello *** you are *** !"

```

#### In Symfony controller

```php
use App\Grd\BanWords\BanWords;

/* Assuming user want to register with the bad words */
$banWord = new BanWords($user->getUsername());

if($banWord->check()->getSignal()){
    $this->addFlash('danger', 'Forbidden username');
    return $this->redirectToRoute('app_home_register');
}

/* Assuming user want to past a bad comment */
$banWords = new BanWords($comment->getContent());

// set
$comment
    ->setUser($this->getUser())
    ->setContent($banWords->check()->getFilter())
    ;

$commentRepository->add($comment);

```

```
This script is very simple.
You are welcome to improve it !
```