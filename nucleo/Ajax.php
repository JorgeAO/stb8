<?php

require 'Vista.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$jsonRta = [];

try 
{
	if (!isset($_GET['p']) || $_GET['p'] == '')
		$_GET['p'] = 'usuarios/login';

	$arrPeticion = explode('/', $_GET['p']);

	chdir(dirname(__DIR__));

	define('nombre_app', 'Base 8');
	define('ruta_raiz', 'http://localhost:8081/apps/stb8/');
	define('ruta_lib', 'recursos/');
	define('ruta_nucleo', 'nucleo/');
	define('ruta_app', 'app/');
	define('ruta_modelo', 'app/modelo/');
	define('ruta_control', 'app/controles/');
	define('ruta_vista', 'app/vistas/');

	// Obtener control
	$ctrlNombre = 'Ctrl'.ucfirst($arrPeticion[0]);
	$ctrlRuta = ruta_control.$ctrlNombre.'.php';

	// Validar si el control existe
	if (!file_exists($ctrlRuta))
		throw new Exception('No se pudo encontrar el control '.$ctrlNombre);

	// Incluir el control
	//include_once '/stb8/app/controles/'.$ctrlNombre.'.php';
	include_once $ctrlRuta;

	// Instanciar el control
	$control = new $ctrlNombre();

	// Obtener método
	$mtdNombre = $arrPeticion[1];

	unset($arrPeticion[0], $arrPeticion[1]);

	if (in_array($mtdNombre, array('editar', 'eliminar')))
		$_POST = $arrPeticion;

	// Validar si el método existe
	if (!method_exists($control, $mtdNombre))
		throw new Exception('No se pudo encontrar el método "'.$mtdNombre.'" el control '.$ctrlNombre);

	$arrParametros = isset($_POST['parametros']) ? $_POST['parametros'] : [];

	$objRespuesta = $control->$mtdNombre($arrParametros);
	
	$jsonRta['error'] = false;
	$jsonRta['datos'] = $objRespuesta;
} 
catch (Exception $e) 
{
	$jsonRta['error'] = true;
	$jsonRta['mensaje'] = $e->getMessage();
}

ob_clean();
echo json_encode($jsonRta);

?>