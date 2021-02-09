<?php

include_once ruta_nucleo.'Control.php';

class CtrlClientes extends Control
{
	function __construct()
	{
		$this->strClase = 'ClsClientes';
		$this->intOpcion = 2003;
		$this->strVista = 'parametros/clientes/';

		include_once ruta_app.'modelo/'.$this->strClase.'.php';
		$this->objModelo = new $this->strClase();
	}
}

?>