<?php

// CRUD operations for todos entity

/**
* List all todos
*/
Flight::route('GET /Products', function(){
  Flight::json(Flight::productService()->get_all());
});

/**
* List invidiual note
*/
Flight::route('GET /Products/@id', function($id){
  Flight::json(Flight::productService()->get_by_id($id));
});

/**
* List invidiual note todos
*/
Flight::route('GET /Products/@id/Products', function($id){
  Flight::json(Flight::productService()->get_todos_by_note_id($id));
});


/**
* add notes
*/
Flight::route('POST /Products', function(){
  Flight::json(Flight::productService()->add(Flight::request()->data->getData()));
});

/**
* update notes
*/
Flight::route('PUT /Products/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::productService()->update($id, $data));
});

/**
* delete notes
*/
Flight::route('DELETE /Products/@id', function($id){
  Flight::productService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
