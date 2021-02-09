<?php

include_once ruta_nucleo.'Control.php';
include_once ruta_app.'modelo/ClsMovimientos.php';

class CtrlInversionistas extends Control
{
	function __construct()
	{
		$this->strClase = 'ClsInversionistas';
		$this->intOpcion = 2002;
		$this->strVista = 'parametros/inversionistas/';

		include_once ruta_app.'modelo/'.$this->strClase.'.php';
		$this->objModelo = new $this->strClase();
	}

	public function guardar($arrParametros)
	{
		try 
		{
			if (!ClsPermisos::blValidarPermiso($this->intOpcion, 'c'))
				Vista::mostrarMensaje($this->strVista.'crear', true, 'Usted no posee permisos para ejecutar esta acción');

			$arrParametros['fc'] = date('Y-m-d H:i:s');
			$arrParametros['uc'] = $_SESSION['usuario']['usua_codigo'];

			$arrResultado = $this->strClase::insertar( $arrParametros );

			if ($arrParametros['inve_saldo'] > 0)
			{
				ClsMovimientos::insertar([
					'fk_par_inversionistas' => $arrResultado['insert_id'],
					'movi_tipo' => 'E',
					'movi_descripcion' => 'Capital de ingreso',
					'movi_fecha' => date('Y-m-d H:i:s'),
					'movi_monto' => $arrParametros['inve_saldo'],
					'fc' => date('Y-m-d H:i:s'),
					'uc' => $_SESSION['usuario']['usua_codigo']
				]);
			}

			$arrModelo = $this->strClase::consultar();

			Vista::mostrarVista([
				'tipo' => 'vista',
				'destino' => $this->strVista . 'index',
				'datos' => [
					'error' => false,
					'mensaje' => 'El proceso se realizó con éxito',
					'modelo' => $arrModelo,
				]
			]);
		} 
		catch (Exception $e) 
		{
			throw new Exception($e->getMessage());
		}
	}
}

?>