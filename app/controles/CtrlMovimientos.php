<?php

include_once ruta_nucleo.'Control.php';
include_once ruta_app.'modelo/ClsInversionistas.php';

class CtrlMovimientos extends Control
{
	function __construct()
	{
		$this->strClase = 'ClsMovimientos';
		$this->intOpcion = 3001;
		$this->strVista = 'caja/movimientos/';

		include_once ruta_app.'modelo/'.$this->strClase.'.php';
		$this->objModelo = new $this->strClase();
	}

	public function guardar($arrParametros)
	{
		try 
		{
			if (!ClsPermisos::blValidarPermiso($this->intOpcion, 'c'))
				Vista::mostrarMensaje($this->strVista.'crear', true, 'Usted no posee permisos para ejecutar esta acción');

			$arrInversionista = ClsInversionistas::consultar([
				'inve_codigo' => $arrParametros['fk_par_inversionistas']
			]);

			// Si el movimiento es una salida, se valida que tenga fondos suficientes
			if ($arrParametros['movi_tipo'] == 'S')
			{
				if ($arrInversionista[0]['inve_saldo'] < $arrParametros['movi_monto'])
					Vista::mostrarMensaje($this->strVista.'crear', true, 'El inversionista no tiene saldo suficiente para este retiro');
			}

			ClsInversionistas::actualizar([
				'inve_codigo' => $arrParametros['fk_par_inversionistas'],
				'inve_saldo' => $arrParametros['movi_tipo'] == 'E' ? 
					($arrInversionista[0]['inve_saldo'] + $arrParametros['movi_monto']) : 
					($arrInversionista[0]['inve_saldo'] - $arrParametros['movi_monto']),
				'fc' => date('Y-m-d H:i:s'),
				'uc' => $_SESSION['usuario']['usua_codigo'],
			]);

			$arrParametros['fc'] = date('Y-m-d H:i:s');
			$arrParametros['uc'] = $_SESSION['usuario']['usua_codigo'];
			
			$arrResultado = $this->strClase::insertar( $arrParametros );

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