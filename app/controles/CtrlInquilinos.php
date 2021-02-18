<?php

include_once ruta_nucleo.'Control.php';
include_once ruta_app.'modelo/ClsUsuarios.php';

class Ctrlinquilinos extends Control
{
	function __construct()
	{
		$this->strClase = 'ClsInquilinos';
		$this->intOpcion = 1005;
		$this->strVista = 'seguridad/inquilinos/';

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
			$arrInquilinoNuevo = $this->strClase::insertar( $arrParametros );

			$arrResultado = ClsUsuarios::insertar([
				'fk_seg_inquilinos' => $arrInquilinoNuevo['insert_id'],
				'usua_nombre' => $arrParametros['inqu_nombre'].' '.$arrParametros['inqu_apellido'],
				'usua_mail' => $arrParametros['inqu_correo'],
				'usua_login' => strtolower($arrParametros['inqu_nombre']).'.'.strtolower($arrParametros['inqu_apellido']),
				'usua_clave' => md5('123'),
				'fk_seg_perfiles' => 2,
				'fc' => date('Y-m-d H:i:s'),
				'uc' => $_SESSION['usuario']['usua_codigo'],
			]);

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