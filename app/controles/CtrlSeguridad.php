<?php

include_once ruta_nucleo.'Control.php';

class CtrlSeguridad extends Control
{
	function __construct()
	{
		$this->strClase = 'ClsUsuarios';
		$this->intOpcion = 1002;
		$this->strVista = 'seguridad/usuarios/';

		include_once ruta_app.'modelo/'.$this->strClase.'.php';
		$this->objModelo = new $this->strClase();
	}

	public function inicio($arrParametros)
	{
		try 
		{
			Vista::mostrarVista([
				'destino' => 'seguridad/seguridad/Principal',
			]);
		} 
		catch (Exception $e) 
		{
			Vista::mostrarVista([
				'destino' => 'Error',
				'tipo' => 'error',
				'datos' => $e
			]);
		}
	}
}

?>