<?php

include_once ruta_nucleo.'Modelo.php';

class ClsPerfiles extends Modelo
{
	function __construct()
	{
		$this->strTabla = 'tb_seg_perfiles';
		$this->strCampoId = 'perf_codigo';
		$this->strSentencia = 'select '.
			'perf.*, '.
			'esta.esta_descripcion '.
			'from tb_seg_perfiles perf '.
			'join tb_par_estados esta on (perf.fk_par_estados = esta.esta_codigo)';
	}
}

?>