<?php

// CRUD operations for todos entity

/**
* List all products
*/
/**
 * @OA\Get(path="/products", tags={"Products"},
 *         summary="Return all products from the database ",
 *         @OA\Response( response=200, description="List of products.")
 * )
 */
Flight::route('GET/products', function(){
  Flight::json(Flight::productService()->get_all());
});

/**
* List invidiual products
*/
/**
 * @OA\Get(path="/products/{id}", tags={"Products"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of product"),
 *     @OA\Response(response="200", description="Fetch individual products")
 * )
 */
Flight::route('GET /products/@id', function($id){
  Flight::json(Flight::productService()->get_by_id($id));
});


/*
* List invidiual note products
*/


Flight::route('GET /products/@id/products', function($id){
  Flight::json(Flight::productService()->get_todos_by_note_id($id));
});


/**
* add products
*/
/**
* @OA\Post(
*     path="/products", security={{"ApiKeyAuth": {}}},
*     description="Add products",
*     tags={"Products"},
*     @OA\RequestBody(description="Basic customer info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="id", type="integer", example="0",	description="ID of product"),
*    				@OA\Property(property="product_name", type="string", example="test",	description="Surname of the customer" ),
*           @OA\Property(property="product_type", type="string", example="test",	description="Email of the customer" ),
*           @OA\Property(property="product_price", type="integer", example="230",	description="Where customer is coming from" ),
*
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Product has been created"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/

Flight::route('POST /products', function(){
  Flight::json(Flight::productService()->add(Flight::request()->data->getData()));
});

/**
* update products
*/


/**
* @OA\Put(
*     path="/products/{id}", security={{"ApiKeyAuth": {}}},
*     description="Update products data",
*     tags={"Products"},
*     @OA\Parameter(in="path", name="id", example=1, description="Note ID"),
*     @OA\RequestBody(description="Basic product info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*           @OA\Property(property="id", type="integer", example="2",	description="ID of the product"),
*    				@OA\Property(property="product_name", type="string", example="HP",	description="Name of the product"),
*    				@OA\Property(property="product_type", type="string", example="Laptop",	description="Type of the product" ),
*           @OA\Property(property="product_price", type="string", example="300",	description="Price of the product" ),
*           @OA\Property(property="status", type="string", example="true",	description="Status of the product" ),
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
Flight::route('PUT /roducts/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::productService()->update($id, $data));
});

/**
* delete products
*/
/**
* @OA\Delete(
*     path="/products/{id}", security={{"ApiKeyAuth": {}}},
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
Flight::route('DELETE /products/@id', function($id){
  Flight::productService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
