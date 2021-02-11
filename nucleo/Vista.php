<?php

class Vista
{
	function __construct()
	{
	}

	public static function mostrarVista($arrParametros)
	{
		try 
		{
			$arrDatos = isset($arrParametros) ? $arrParametros : [];

			if (in_array($arrParametros['destino'], array('Debug', 'Error')))
				require $arrParametros['destino'].'.php';
			else
				require ruta_vista.$arrParametros['destino'].'.php';

			exit();
		} 
		catch (Exception $e) 
		{
			throw new Exception($e->getMessage());
		}
	}

	public static function mostrarMensaje($strDestino, $blError, $strMensaje, $arrModelo = [])
	{
		try 
		{
			$arrDatos['datos'] = [
				'error'=> $blError,
				'mensaje' => $strMensaje,
				'modelo' => $arrModelo,
			];

			require ruta_vista.$strDestino.'.php';

			exit();
		} 
		catch (Exception $e) 
		{
			throw new Exception($e->getMessage());
			
			//$this->mostrarVista($e);
		}
	}
}

?>