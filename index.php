<?php

require 'vendor/autoload.php';

Flight::route('/', function (){
  echo 'Hello Worlddddd';
});

Flight::start();


?>
