<?php

include_once ruta_nucleo.'Modelo.php';

class ClsInquilinos extends Modelo
{
	function __construct()
	{
		$this->strTabla = 'tb_seg_inquilinos';
		$this->strPrefijoTabla = 'inqu';
		$this->strCampoId = 'inqu_codigo';
		$this->strSentencia = 'select '.
			'inqu.*, '.
			'esta.esta_descripcion '.
			'from tb_seg_inquilinos inqu '.
			'join tb_par_estados esta on (inqu.fk_par_estados = esta.esta_codigo)';
	}
}

?>