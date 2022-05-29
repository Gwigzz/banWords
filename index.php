<?php

use App\Grd\BanWords\BanWords;

require_once './vendor/autoload.php';

$banWords = new BanWords('hello noob you are bad !');

var_dump($banWords->check()->getCharacters());