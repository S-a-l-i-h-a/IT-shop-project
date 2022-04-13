<?php
// CRUD operations for todos entity

/**
* List all todos
*/
Flight::route('GET /Customers', function(){
  Flight::json(Flight::customerService()->get_all());
});

/**
* List invidiual todo
*/
Flight::route('GET /Customers/@id', function($id){
  Flight::json(Flight::customerService()->get_by_id($id));
});

/**
* add todo
*/
Flight::route('POST /Customers', function(){
  Flight::json(Flight::customerService()->add(Flight::request()->data->getData()));
});

/**
* update todo
*/
Flight::route('PUT /Customers/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::customerService()->update($id, $data));
});

/**
* delete todo
*/
Flight::route('DELETE /Customers/@id', function($id){
  Flight::customerService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
