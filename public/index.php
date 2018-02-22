<?php
require_once '../App/Config/app.php';

use App\Libreries\Route;

$url = $_GET['url'] ?? '';

$route = ROUTES[$url] ?? false;

if($route)
{
    $controller = $route['controller'];
    $action = $route['action'];

    Route::any($controller, $action);
} else {
    echo $url;
    header('HTTP/1.0 404 Not Found');
    die('Página no encontrada');
}
