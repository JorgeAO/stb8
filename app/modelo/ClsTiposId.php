<?php

include_once ruta_nucleo.'Modelo.php';

class ClsTiposId extends Modelo
{
	function __construct()
	{
		$this->strTabla = 'tb_par_tipos_identificacion';
		$this->strPrefijoTabla = 'tiid';
		$this->strCampoId = 'tiid_codigo';
		$this->strSentencia = 'select '.
			'tiid.*, '.
			'esta.esta_descripcion '.
			'from tb_par_tipos_identificacion tiid '.
			'join tb_par_estados esta on (tiid.fk_par_estados = esta.esta_codigo)';
	}
}

?>