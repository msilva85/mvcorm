<?php
// iniciar session
session_start();

// Raiz del proyecto
define('APP_PATH', '../');

define('PUBLIC_PATH', '');

// Composer
require_once APP_PATH . 'vendor/autoload.php';

// Variables de entorno
require_once 'env.php';

// Base de date_datos
use App\Models\Database;
new Database();

// Rutas de la APlicacion
require_once 'rutes.php';
