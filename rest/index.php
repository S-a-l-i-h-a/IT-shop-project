<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require_once __DIR__.'/../vendor/autoload.php';
require_once 'dao/BaseDao.class.php';

require_once 'services/CustomerService.class.php';
require_once 'services/ProductService.class.php';
require_once __DIR__.'/dao/UserDao.class.php';


Flight::register('userDao', 'UserDao');
Flight::register('customerService', 'CustomerService');
Flight::register('productService', 'ProductService');

/*REST API documentation endpoint*/
Flight::route('GET /docs.json',function(){
  $openapi= \OpenApi\scan('routes');
  header('Content-Type: application/json');
  echo $openapi->toJson();
});


// middleware method for login
Flight::route('/*', function(){
  //perform JWT decode
  $path = Flight::request()->url;
  if ($path == '/login') return TRUE; // exclude login route from middleware

  $headers = getallheaders();
  if (@!$headers['Authorization']){
    Flight::json(["message" => "Authorization is missing"], 403);
    return FALSE;
  }else{
    try {
      $decoded = (array)JWT::decode($headers['Authorization'], new Key(Config::JWT_SECRET(), 'HS256'));
      Flight::set('user', $decoded);
      return TRUE;
    } catch (\Exception $e) {
      Flight::json(["message" => "Authorization token is not valid"], 403);
      return FALSE;
    }
  }
});


require_once 'routes/CustomerRoutes.php';
require_once 'routes/ProductRoutes.php';
require_once __DIR__.'/routes/UserRoutes.php';

Flight::start();

?>
