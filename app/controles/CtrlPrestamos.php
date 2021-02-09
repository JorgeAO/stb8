<?php

include_once ruta_nucleo.'Control.php';

class CtrlPrestamos extends Control
{
	function __construct()
	{
		$this->strClase = 'ClsPrestamos';
		$this->intOpcion = 4001;
		$this->strVista = 'prestamos/prestamos/';

		include_once ruta_app.'modelo/'.$this->strClase.'.php';
		$this->objModelo = new $this->strClase();
	}
}

?>