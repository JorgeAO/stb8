<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Bogota');

session_start();

chdir(dirname(__DIR__));

define('nombre_app', 'Smart Trader');
define('ruta_raiz', 'http://localhost/apps/stb8/');
define('ruta_lib', '/apps/stb8/recursos/');
define('ruta_nucleo', 'stb8/nucleo/');
define('ruta_app', 'stb8/app/');
define('ruta_modelo', 'stb8/app/modelo/');
define('ruta_control', 'stb8/app/controles/');
define('ruta_vista', 'stb8/app/vistas/');
define('titulo', 'Smart Trader 2.0');

//require 'nucleo/Autoload.php';
require 'nucleo/Recursos.php';
require 'nucleo/Vista.php';
require 'nucleo/Enrutador.php';

?>