<?php

include_once ruta_nucleo.'Modelo.php';

class ClsMovimientos extends Modelo
{
	function __construct()
	{
		$this->strTabla = 'tb_caj_movimientos';
		$this->strCampoId = 'movi_codigo';
		$this->strSentencia = 'select 
            movi.*, 
            date(movi_fecha) as fecha2,
            case movi_tipo
                when "E" then "Entrada"
                when "S" then "Salida"
            end as movi_tipo_2,
            inve.inve_nombre,
            inve.inve_apellido,
            inve.inve_celular,
            inve.inve_correo
            from tb_caj_movimientos movi 
            join tb_par_inversionistas inve on (movi.fk_par_inversionistas = inve.inve_codigo) ';
	}
}

?>