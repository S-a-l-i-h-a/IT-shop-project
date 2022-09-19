<?php

// CRUD operations for todos entity

/**
* List all reviews
*/
/**
 * @OA\Get(path="/subscription", tags={"subscription"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all messages from the database ",
 *         @OA\Response( response=200, description="List of reviews.")
 * )
 */
Flight::route('GET /subscription', function(){
  Flight::json(Flight::reviewService()->get_all());
});

/**
* List invidiual reviews
*/
/**
 * @OA\Get(path="/subscription/{id}", tags={"subscription"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of review"),
 *     @OA\Response(response="200", description="Fetch individual reviews")
 * )
 */
Flight::route('GET /subscription/@id', function($id){
  Flight::json(Flight::reviewService()->get_by_id($id));
});


/**
* add reviews
*/
/**
* @OA\Post(
*     path="/subscription", security={{"ApiKeyAuth": {}}},
*     description="Add reviews",
*     tags={"subscription"},
*     @OA\RequestBody(description="Basic review info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="id", type="integer", example="0",	description="ID of review"),
*           @OA\Property(property="name", type="string", example="Mike",	description="Name of clent"),
*    				@OA\Property(property="email", type="string", example="test@gmail.com",	description="Email of the customer" ),
*           @OA\Property(property="subject", type="string", example="Product review",	description="Subject of message"),
*           @OA\Property(property="message", type="string", example="products are the best one I have buy until now",	description="Message from client"),
*
*
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Revieew has been created"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/

Flight::route('POST /subscription', function(){
  Flight::json(Flight::reviewService()->add(Flight::request()->data->getData()));
});

/**
* update reviews
*/


/**
* @OA\Put(
*     path="/subscription/{id}", security={{"ApiKeyAuth": {}}},
*     description="Update reviews data",
*     tags={"subscription"},
*     @OA\Parameter(in="path", name="id", example=1, description="Review ID"),
*     @OA\RequestBody(description="Basic review info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="id", type="integer", example="0",	description="ID of review"),
*           @OA\Property(property="name", type="string", example="Mike",	description="Name of clent"),
*    				@OA\Property(property="email", type="string", example="test@gmail.com",	description="Email of the customer" ),
*           @OA\Property(property="subject", type="string", example="Product review",	description="Subject of message"),
*           @OA\Property(property="message", type="string", example="products are the best one I have buy until now",	description="Message from client"),

*
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Review data has been updated"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('PUT /subscription/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::reviewService()->update($id, $data));
});

/**
* delete reviews
*/
/**
* @OA\Delete(
*     path="/subscription/{id}", security={{"ApiKeyAuth": {}}},
*     description="Soft delete review data",
*     tags={"subscription"},
*     @OA\Parameter(in="path", name="id", example=1, description="Review ID"),
*     @OA\Response(
*         response=200,
*         description="Review deleted"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('DELETE /subscription/@id', function($id){
  Flight::reviewService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
