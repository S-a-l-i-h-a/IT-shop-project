<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';
require_once 'dao/BaseDao.class.php';

require_once 'services/CustomerService.class.php';
require_once 'services/ProductService.class.php';



Flight::register('customerService', 'CustomerService');
Flight::register('productService', 'ProductService');


require_once 'routes/CustomerRoutes.php';
require_once 'routes/ProductRoutes.php';


Flight::start();

?>
