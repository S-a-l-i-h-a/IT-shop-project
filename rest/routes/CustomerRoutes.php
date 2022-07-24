<?php
// CRUD operations for todos entity

/**
* List all customers
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
* List invidiual customers
*/
/**
 * @OA\Get(path="/Customers/{id}", tags={"Customers"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of customers"),
 *     @OA\Response(response="200", description="Fetch individual customers")
 * )
 */
Flight::route('GET /Customers/@id', function($id){
  Flight::json(Flight::customerService()->get_by_id($id));
});

/*
* add customers
*/
/**
* @OA\Post(
*     path="/Customers", security={{"ApiKeyAuth": {}}},
*     description="Add customers",
*     tags={"Customers"},
*     @OA\RequestBody(description="Basic customer info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*           @OA\Property(property="id", type="integer", example="2",	description="Name of the customer"),
*    				@OA\Property(property="customer_name", type="string", example="test",	description="Name of the customer"),
*    				@OA\Property(property="customer_surname", type="string", example="test",	description="Surname of the customer" ),
*           @OA\Property(property="customer_email", type="string", example="test@gamil.com",	description="Email of the customer" ),
*           @OA\Property(property="customer_origin", type="string", example="Sarajevo",	description="Where customer is coming from" ),
*           @OA\Property(property="customer_password", type="integer", example="1234",	description="Password of the customer" ),
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Customer has been created"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('POST /Customers', function(){
  Flight::json(Flight::customerService()->add(Flight::request()->data->getData()));
});

/*
* update customers
*/

/**
* @OA\Put(
*     path="/Customers/{id}", security={{"ApiKeyAuth": {}}},
*     description="Update customer data",
*     tags={"Customers"},
*     @OA\Parameter(in="path", name="id", example=1, description="Note ID"),
*     @OA\RequestBody(description="Basic customer info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="customer_name", type="string", example="test",	description="Name of the customer"),
*    				@OA\Property(property="customer_surname", type="string", example="test",	description="Surname of the customer" ),
*           @OA\Property(property="customer_email", type="string", example="test@gamil.com",	description="Email of the customer" ),
*           @OA\Property(property="customer_origin", type="string", example="Sarajevo",	description="Where customer is coming from" ),
*           @OA\Property(property="customer_password", type="integer", example="1234",	description="Password of the customer" ),
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Customer data has been updated"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('PUT /Customers/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::customerService()->update($id, $data));
});

/*
* delete customers
*/
/**
* @OA\Delete(
*     path="/Customers/{id}", security={{"ApiKeyAuth": {}}},
*     description="Soft delete customer data",
*     tags={"Customers"},
*     @OA\Parameter(in="path", name="id", example=1, description="Customer ID"),
*     @OA\Response(
*         response=200,
*         description="Customer deleted"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('DELETE /Customers/@id', function($id){
  Flight::customerService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
