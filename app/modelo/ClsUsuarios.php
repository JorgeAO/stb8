<?php

include_once ruta_nucleo.'Modelo.php';

class ClsUsuarios extends Modelo
{
	function __construct()
	{
		$this->strTabla = 'tb_seg_usuarios';
		$this->strCampoId = 'usua_codigo';
		$this->strSentencia = 'select '.
			'usua.*, '.
			'perf.perf_descripcion, '.
			'esta.esta_descripcion '.
			'from tb_seg_usuarios usua '.
			'join tb_seg_perfiles perf on (usua.fk_seg_perfiles = perf.perf_codigo) '.
			'join tb_par_estados esta on (usua.fk_par_estados = esta.esta_codigo)';
	}
}

?>