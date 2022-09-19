<?php

Flight::route('POST /orders', function(){
  Flight::json(Flight::orderService()->add(Flight::request()->data->getData()));
});

Flight::route('GET /orders', function(){
  Flight::json(Flight::orderService()->get_all());
});

?>
