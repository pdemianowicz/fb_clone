<?php

const BASE_PATH = __DIR__ . '/../';

session_start();

require '../vendor/autoload.php';
require BASE_PATH . 'app/functions.php';
require BASE_PATH . 'app/Router.php';

$router = new Router();
require BASE_PATH . 'routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    // Session::flash('errors', $exception->errors);
    // Session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}

require_once BASE_PATH . 'app/Controllers/HomeController.php';
