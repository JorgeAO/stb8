<?php

include_once ruta_nucleo.'Modelo.php';

class ClsClientes extends Modelo
{
	function __construct()
	{
		$this->strTabla = 'tb_par_clientes';
		$this->strPrefijoTabla = 'clie';
		$this->strCampoId = 'clie_codigo';
		$this->strSentencia = 'select 
            clie.*, 
            tiid.tiid_descripcion,
            usua.usua_login,
            esta.esta_descripcion
            from tb_par_clientes clie 
            join tb_par_tipos_identificacion tiid on (clie.fk_par_tipos_identificacion = tiid.tiid_codigo)
            left join tb_seg_usuarios usua on (clie.fk_seg_usuarios = usua.usua_codigo)
            join tb_par_estados esta on (clie.fk_par_estados = esta.esta_codigo) ';
	}
}

?>