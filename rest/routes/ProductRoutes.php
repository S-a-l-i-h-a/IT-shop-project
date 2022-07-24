<?php

// CRUD operations for todos entity

/**
* List all products
*/
/**
 * @OA\Get(path="/Products", tags={"Products"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all products from the database ",
 *         @OA\Response( response=200, description="List of products.")
 * )
 */
Flight::route('GET /Products', function(){
  Flight::json(Flight::productService()->get_all());
});

/**
* List invidiual products
*/
/**
 * @OA\Get(path="/Products/{id}", tags={"Products"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of product"),
 *     @OA\Response(response="200", description="Fetch individual products")
 * )
 */
Flight::route('GET /Products/@id', function($id){
  Flight::json(Flight::productService()->get_by_id($id));
});


/*
* List invidiual note products
*/

/**
* @OA\Post(
*     path="/Products", security={{"ApiKeyAuth": {}}},
*     description="Add products",
*     tags={"Products"},
*     @OA\RequestBody(description="Basic customer info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="Name", type="string", example="test",	description="Name of the customer"),
*    				@OA\Property(property="Surname", type="string", example="test",	description="Surname of the customer" ),
*           @OA\Property(property="Email", type="string", example="test@gamil.com",	description="Email of the customer" ),
*           @OA\Property(property="Origin", type="string", example="test@gamil.com",	description="Where customer is coming from" ),
*           @OA\Property(property="Password", type="string", example="1234",	description="Password of the customer" ),
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
Flight::route('GET /Products/@id/Products', function($id){
  Flight::json(Flight::productService()->get_todos_by_note_id($id));
});


/**
* add products
*/

Flight::route('POST /Products', function(){
  Flight::json(Flight::productService()->add(Flight::request()->data->getData()));
});

/**
* update notes
*/


/**
* @OA\Put(
*     path="/Products/{id}", security={{"ApiKeyAuth": {}}},
*     description="Update products data",
*     tags={"Products"},
*     @OA\Parameter(in="path", name="id", example=1, description="Note ID"),
*     @OA\RequestBody(description="Basic product info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="Name", type="string", example="HP 2034",	description="Name of the product"),
*    				@OA\Property(property="Type", type="string", example="Laptop",	description="Type of the product" ),
*           @OA\Property(property="Price", type="string", example="780",	description="Price of the product" ),
*
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Product data has been updated"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('PUT /Products/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::productService()->update($id, $data));
});

/**
* delete notes
*/
/**
* @OA\Delete(
*     path="/Products/{id}", security={{"ApiKeyAuth": {}}},
*     description="Soft delete products data",
*     tags={"Products"},
*     @OA\Parameter(in="path", name="id", example=1, description="Product ID"),
*     @OA\Response(
*         response=200,
*         description="Product deleted"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('DELETE /Products/@id', function($id){
  Flight::productService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
