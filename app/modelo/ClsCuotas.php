<?

include_once ruta_nucleo.'Modelo.php';

class ClsCuotas extends Modelo
{
    public function __construct()
    {
        $this->strTabla = 'tb_pre_cuotas';
        $this->strPrefijoTabla = 'prcu';
        $this->strCampoId = 'prcu_codigo';
        $this->strSentencia = 'select 
            prcu.*,
            esta.esta_descripcion
            from tb_pre_cuotas prcu 
            join tb_par_estados esta on (prcu.fk_par_estados = esta.esta_codigo) 
            ';
    }
}