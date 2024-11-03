<?php 
session_start();
use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . "Core/functions.php";

require BASE_PATH . '/vendor/autoload.php';

require base_path('bootstrap.php');

$router = new \Core\Router();

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$routes = require base_path('routes.php');

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {

$router->route($uri, $method);
} catch (ValidationException $err) {
    Session::flash('errors', $err->errors);
    Session::flash('old', $err->old);

    redirect($router->previousUrl());
}


Session::unflash($_SESSION['_flashed']);