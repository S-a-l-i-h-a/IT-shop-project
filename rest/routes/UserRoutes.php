<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/**
* Check user login
*/

/**
* @OA\Post(
*     path="/login",
*     description="Login to the system",
*     tags={"Login"},
*     @OA\RequestBody(description="Basic user info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="username", type="string", example="admin",	description="Username"),
*    				@OA\Property(property="password", type="string", example="admin",	description="Password" )
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="JWT Token on successful response"
*     ),
*     @OA\Response(
*         response=404,
*         description="Wrong Password | User doesn't exist"
*     )
* )
*/
Flight::route('POST /login', function(){
    $login = Flight::request()->data->getData();
    $user = Flight::userDao()->get_user_by_username($login['username']);

    if (isset($user['id'])){
      if($user['password'] == $login['password']){
        unset($user['password']);

        $jwt = JWT::encode($user, Config::JWT_SECRET(), 'HS256');
        Flight::json(['token' => $jwt]);
      }else{
        Flight::json(["message" => "Wrong password"], 404);
      }
    }else{
      Flight::json(["message" => "User doesn't exist"], 404);
    }
});

?>
