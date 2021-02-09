<?php

include_once ruta_nucleo.'Control.php';

class CtrlPerfiles extends Control
{
	function __construct()
	{
		$this->strClase = 'ClsPerfiles';
		$this->intOpcion = 1001;
		$this->strVista = 'seguridad/perfiles/';

		include_once ruta_app.'modelo/'.$this->strClase.'.php';
		$this->objModelo = new $this->strClase();
	}
}

?>