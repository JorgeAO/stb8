<?php

include_once ruta_nucleo.'Control.php';

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

			// Leer el archivo de base de datos nueva
			$strNuevaBD = file_get_contents(ruta_raiz.'datos/bd_st_nueva.sql');
			$strNuevaBD = str_replace('bd_st_nueva', $arrParametros['inqu_base_datos'], $strNuevaBD);

			// Crear la base de datos
			//$arrResultado = BaseDatos::arrEjecutarSQL('CREATE DATABASE '.$arrParametros['inqu_base_datos'], 'servidor');
			echo $strNuevaBD;
			$arrResultado = BaseDatos::arrEjecutarSQL($strNuevaBD, 'servidor');

			echo "<pre>";
			//print_r($strNuevaBD);
			print_r($arrResultado);
			echo "</pre>";
			exit();

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