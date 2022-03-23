<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
require_once 'dao/ProjectDao.class.php';

Flight::route('/', function (){
  echo 'Hello Worlddddd';
});

Flight::register('ProjectDao', 'ProjectDao');

// CRUD operations for todos entity

/**
* List all todos
*/
Flight::route('GET /Customers', function(){
  Flight::json(Flight::ProjectDao()->get_all());
  echo "Hi I am here";
});

/**
* List invidiual todo
*/
Flight::route('GET /Customers/@id', function($id){
  Flight::json(Flight::ProjectDao()->get_by_id($id));
});

/**
* add todo
*/
Flight::route('POST /Products', function(){
  Flight::json(Flight::ProjectDao()->add(Flight::request()->data->getData()));
});

/**
* update todo
*/
Flight::route('PUT /Products/@id', function($id){
  $data = Flight::request()->data->getData();
  $data['id'] = $id;
  Flight::json(Flight::ProjectDao()->update($data));
});

/**
* delete todo
*/
Flight::route('DELETE /Products/@id', function($id){
  Flight::ProjectDao()->delete($id);
  Flight::json(["message" => "deleted"]);
});

Flight::start();
?>


?>
