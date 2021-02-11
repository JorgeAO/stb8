<?php

include_once ruta_nucleo.'Modelo.php';

class ClsEstados extends Modelo
{
	function __construct()
	{
		$this->strTabla = 'tb_par_estados';
		$this->strPrefijoTabla = 'esta';
		$this->strCampoId = 'esta_codigo';
		$this->strSentencia = 'select '.
			'esta.* '.
			'from tb_par_estados esta ';
	}
}

?>