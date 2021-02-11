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

			// Validar que no existe un cliente con la misma BD
			$arrInquilino = $this->strClase::consultar([
				'inqu_base_datos' => $arrParametros['inqu_base_datos'],
			]);

			if (count($arrInquilino) > 0)
				throw new Exception('Ya existe la base de datos para otro inquilino');
				
			$arrParametros['fc'] = date('Y-m-d H:i:s');
			$arrParametros['uc'] = $_SESSION['usuario']['usua_codigo'];
			$arrInquilinoNuevo = $this->strClase::insertar( $arrParametros );

			$cnxConexion = new mysqli('localhost', 'root', '', '');
				
			// Leer el archivo de base de datos nueva
			$strNuevaBD = file_get_contents(ruta_raiz.'datos/bd_st_nueva.sql');

			// Reemplazar el nombre de la base de datos por defecto, por el del inquilino
			$strNuevaBD = str_replace('bd_st_nueva', $arrParametros['inqu_base_datos'], $strNuevaBD);
			//$strNuevaBD = str_replace('{{inquilino_id}}', $arrInquilinoNuevo['insert_id'], $strNuevaBD);
			//$strNuevaBD = str_replace('{{inquilino_nombre}}', $arrParametros['inqu_nombre'].' '.$arrParametros['inqu_apellido'], $strNuevaBD);
			//$strNuevaBD = str_replace('{{inquilino_correo}}', $arrParametros['inqu_correo'], $strNuevaBD);
			//$strNuevaBD = str_replace('{{inquilino_login}}', strtolower($arrParametros['inqu_nombre']).'.'.strtolower($arrParametros['inqu_apellido']), $strNuevaBD);

			// Crear la base de datos del inquilino
			/*$arrResultado = $cnxConexion->multi_query($strNuevaBD);
			if (!$arrResultado)
				throw new Exception('No se pudo crear la base de datos del inquilino');*/

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