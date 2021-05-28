<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// autoloader fonctionnel avec les namespaces

require_once "Autoload.php";
Autoload::register();

// TP3 part 1 : auto loader
use App\Entity\Product;
use App\Controller\HomeController;

$product = new Product();
$controller = new HomeController();

var_dump($product);
var_dump($controller);

// TP3 part 2 : router

$router = new Router();
$router->process();
