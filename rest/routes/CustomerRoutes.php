<?php
// CRUD operations for todos entity

/**
* List all todos
*/

/**
 * @OA\Get(path="/Customers", tags={"Customers"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all customers from the database ",
 *         @OA\Response( response=200, description="List of customers.")
 * )
 */
Flight::route('GET /Customers', function(){
  Flight::json(Flight::customerService()->get_all());
});

/**
* List invidiual todo
*/
/**
 * @OA\Get(path="/Customers/{id}", tags={"Customers"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of note"),
 *     @OA\Response(response="200", description="Fetch individual customers")
 * )
 */
Flight::route('GET /Customers/@id', function($id){
  Flight::json(Flight::customerService()->get_by_id($id));
});

/**
* add todo
*/
/**
 * @OA\POST(path="/Customers/", tags={"Customers"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(in="path", name="id", example=1, description="Submiting new data about customers"),
 *     @OA\Response(response="200", description="New customer data")
 * )
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
