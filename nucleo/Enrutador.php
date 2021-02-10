<?php

try 
{
	if (!isset($_GET['p']) || $_GET['p'] == '')
		$_GET['p'] = 'usuarios/login';
		
	if (!isset($_SESSION['usuario']['fk_seg_perfiles']) and $_GET['p'] != 'usuarios/validar')
		$_GET['p'] = 'usuarios/login';
		
	$arrPeticion = explode('/', $_GET['p']);

	// Obtener control
	$ctrlNombre = 'Ctrl'.ucfirst($arrPeticion[0]);
	$ctrlRuta = ruta_app.'controles/'.$ctrlNombre.'.php';

	//echo $ctrlRuta; exit();

	// Validar si el control existe
	if (!file_exists($ctrlRuta))
		throw new Exception('No se pudo encontrar el control '.$ctrlNombre);

	// Incluir el control
	include_once ruta_app.'controles/'.$ctrlNombre.'.php';

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

	$arrParametros = isset($_POST) ? $_POST : [];

	$objRespuesta = $control->$mtdNombre($arrParametros);

	exit();
} 
catch (Exception $e) 
{	
	Vista::mostrarVista([
		'destino' => 'Error',
		'tipo' => 'error',
		'datos' => $e
	]);
}

?>