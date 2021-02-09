<?php

include_once ruta_nucleo.'Control.php';

class CtrlTiposId extends Control
{
	function __construct()
	{
		$this->strClase = 'ClsTiposId';
		$this->intOpcion = 2001;
		$this->strVista = 'parametros/tiposId/';

		include_once ruta_app.'modelo/'.$this->strClase.'.php';
		$this->objModelo = new $this->strClase();
	}
}

?>