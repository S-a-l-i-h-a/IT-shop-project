<?php
// CRUD operations for todos entity

/**
* List all todos
*/
Flight::route('GET /Customers', function(){
  Flight::json(Flight::CustomerService()->get_all());
});

/**
* List invidiual todo
*/
Flight::route('GET /Customers/@id', function($id){
  Flight::json(Flight::CustomerService()->get_by_id($id));
});

/**
* add todo
*/
Flight::route('POST /Customers', function(){
  Flight::json(Flight::CustomerService()->add(Flight::request()->data->getData()));
});

/**
* update todo
*/
Flight::route('PUT /Customers/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::CustomerService()->update($id, $data));
});

/**
* delete todo
*/
Flight::route('DELETE /Customers/@id', function($id){
  Flight::CustomerService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
