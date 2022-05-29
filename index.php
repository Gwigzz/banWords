<?php

use App\Grd\BanWords\BanWords;

require_once './vendor/autoload.php';

$banWords = new BanWords('hello fuk !');

var_dump($banWords->check()->getFilter());