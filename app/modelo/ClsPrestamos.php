<?

include_once ruta_nucleo.'Modelo.php';

class ClsPrestamos extends Modelo
{
	function __construct()
	{
		$this->strTabla = 'tb_pre_prestamos';
		$this->strPrefijoTabla = 'pres';
		$this->strCampoId = 'pres_codigo';
		$this->strSentencia = 'select 
            pres.*, 
            clie.clie_nombre,
            clie.clie_apellido,
            clie.clie_celular,
            clie.clie_correo,
            esta.esta_descripcion
            from tb_pre_prestamos pres 
            join tb_par_clientes clie on (pres.fk_par_clientes = clie.clie_codigo) 
            join tb_par_estados esta on (pres.fk_par_estados = esta.esta_codigo) 
            ';
	}
}