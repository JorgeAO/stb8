<?php

class CtrlEstados
{
	function __construct()
	{
		$this->strClase = 'ClsEstados';

		include_once ruta_app.'modelo/'.$this->strClase.'.php';
	}

	public function listar()
	{
		try 
		{
			$arrModelo = $this->strClase::consultar();

			return $arrModelo;
		} 
		catch (Exception $e) 
		{
			throw new Exception($e->getMessage());
		}
	}
}