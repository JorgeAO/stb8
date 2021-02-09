<?php

include_once ruta_modelo.'ClsPermisos.php';

class Control
{
	// Atributos de control
	public $strClase;
	public $intOpcion;

	// Atributos de rutas
	public $strVista;

	function __construct()
	{
		$strClase = '';
		$intOpcion = '';
		
		$strVista = '';
	}

	public function index()
	{
		try 
		{
			if (!ClsPermisos::blValidarPermiso($this->intOpcion, 'r'))
				Vista::mostrarMensaje($this->strVista.'index', true, 'Usted no posee permisos para ejecutar esta acción');

			$arrModelo = $this->strClase::consultar();

			Vista::mostrarVista([
				'tipo' => 'vista',
				'destino' => $this->strVista . 'index',
				'datos' => [
					'modelo' => $arrModelo,
				]
			]);
		} 
		catch (Exception $e) 
		{
			throw new Exception($e->getMessage());
		}
	}

	public function listar()
	{
		try 
		{
			if (ClsPermisos::blValidarPermiso($this->intOpcion, 'l') == 0)
				Vista::mostrarMensaje($this->strVista.'index', true, 'Usted no posee permisos para ejecutar esta acción');

			$arrModelo = $this->strClase::consultar();

			return $arrModelo;
		} 
		catch (Exception $e) 
		{
			throw new Exception($e->getMessage());
		}
	}

	public function nuevo()
	{
		try 
		{
			if (!ClsPermisos::blValidarPermiso($this->intOpcion, 'c'))
				Vista::mostrarMensaje($this->strVista.'crear', true, 'Usted no posee permisos para ejecutar esta acción');

			Vista::mostrarVista([
				'tipo' => 'vista',
				'destino' => $this->strVista . 'crear',
			]);	
		} 
		catch (Exception $e) 
		{
			throw new Exception($e->getMessage());
		}
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

			$arrModelo = $this->strClase::consultar();

			//$this->index();

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

	public function editar($arrParametros)
	{
		try 
		{
			if (!ClsPermisos::blValidarPermiso($this->intOpcion, 'u'))
				throw new Exception('Usted no posee permisos para ejecutar esta acción');

			$arrModelo = $this->strClase::consultar([
				$this->objModelo->strCampoId => $arrParametros[2]
			]);

			if (count($arrModelo) != 1)
				throw new Exception('No se pudo recuperar el registro');

			Vista::mostrarVista([
				'tipo' => 'vista',
				'destino' => $this->strVista . 'editar',
				'datos' => [
					'modelo' => $arrModelo,
				]
			]);
		} 
		catch (Exception $e) 
		{
			throw new Exception($e->getMessage());
		}
	}

	public function actualizar($arrParametros)
	{
		try 
		{
			if (!ClsPermisos::blValidarPermiso($this->intOpcion, 'u'))
				throw new Exception('Usted no posee permisos para ejecutar esta acción');

			$arrParametros['fm'] = date('Y-m-d H:i:s');
			$arrParametros['um'] = $_SESSION['usuario']['usua_codigo'];

			$arrResultado = $this->strClase::actualizar( $arrParametros );

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

	public function eliminar($arrParametros)
	{
		try 
		{
			if (!ClsPermisos::blValidarPermiso($this->intOpcion, 'd'))
				throw new Exception('Usted no posee permisos para ejecutar esta acción');

			$arrResultado = $this->strClase::eliminar([
				$this->objModelo->strCampoId => $arrParametros[2]
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