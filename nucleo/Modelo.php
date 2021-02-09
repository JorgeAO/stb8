<?php

include 'BaseDatos.php';

class Modelo
{
	public $strTabla;
	public $strCampoId;
	public $strSentencia;

	function __construct()
	{
		$strTabla = '';
		$strCampoId = '';
		$strSentencia = '';
	}

	public static function insertar($arrParametros)
	{
		try 
		{
			$modelo = new static();

			$sqlSentencia = "insert into ".$modelo->strTabla." set ";

			foreach ($arrParametros as $strCampo => $strValor)
				$sqlSentencia .= $strCampo." = '".$strValor."', ";

			$sqlSentencia = rtrim($sqlSentencia, ', ');

			$blDebug = 0;
			if ($blDebug && $modelo->strTabla == 'tb_seg_perfiles')
			{
				Vista::mostrarVista([
					'destino' => 'Debug',
					'datos' => [
						'clase' => 'Modelo',
						'metodo' => 'consultar',
						'tabla' => $modelo->strTabla,
						'sentencia' => $sqlSentencia,
					]
				]);
			}

			$arrRta = BaseDatos::arrEjecutarSQL($sqlSentencia);

			return $arrRta;
		} 
		catch (Exception $e) 
		{
			throw new Exception($e->getMessage());
		}
	}

	public static function consultar($arrParametros = [])
	{
		try 
		{
			$modelo = new static();

			$strFiltro = '';

			foreach ($arrParametros as $strCampo => $strValor)
			{
				if (is_numeric($strValor) && $strValor != 0)
					$strFiltro .= $strCampo." = ".$strValor." and ";
				elseif (is_string($strValor) && $strValor != '') 
					$strFiltro .= $strCampo." = '".$strValor."' and ";
			}

			$strFiltro = rtrim($strFiltro, ' and ');

			if ($strFiltro != '')
				$modelo->strSentencia .= ' where '.$strFiltro;

			$blDebug = 0;
			if ($blDebug && $modelo->strTabla == 'tb_seg_usuarios')
			{
				Vista::mostrarVista([
					'destino' => 'Debug',
					'datos' => [
						'clase' => 'Modelo',
						'metodo' => 'consultar',
						'tabla' => $modelo->strTabla,
						'sentencia' => $modelo->strSentencia,
					]
				]);
			}

			$arrDatos = BaseDatos::arrEjecutarSQL($modelo->strSentencia);

			return $arrDatos;
		} 
		catch (Exception $e) 
		{
			throw new Exception($e);
		}
	}

	public static function actualizar($arrParametros)
	{
		try 
		{
			$modelo = new static();

			$sqlSentencia = "update ".$modelo->strTabla." set ";

			foreach ($arrParametros as $strCampo => $strValor)
			{
				if ($strCampo != $modelo->strCampoId) 
					$sqlSentencia .= $strCampo." = '".$strValor."', ";
			}

			$sqlSentencia = rtrim($sqlSentencia, ', ');

			$sqlSentencia .= ' where '.$modelo->strCampoId.' = '.$arrParametros[$modelo->strCampoId];

			$blDebug = 0;
			if ($blDebug && $modelo->strTabla == 'tb_seg_perfiles')
			{
				Vista::mostrarVista([
					'destino' => 'Debug',
					'datos' => [
						'clase' => 'Modelo',
						'metodo' => 'consultar',
						'tabla' => $modelo->strTabla,
						'sentencia' => $sqlSentencia,
					]
				]);
			}

			$arrRta = BaseDatos::arrEjecutarSQL($sqlSentencia);

			return $arrRta;
		} 
		catch (Exception $e) 
		{
			throw new Exception($e->getMessage());
		}
	}

	public static function eliminar($arrParametros)
	{
		try 
		{
			$modelo = new static();

			$sqlSentencia = "delete from ".$modelo->strTabla." where ";

			foreach ($arrParametros as $strCampo => $strValor)
				$sqlSentencia .= $strCampo." = '".$strValor."', ";

			$sqlSentencia = rtrim($sqlSentencia, ', ');

			$arrRta = BaseDatos::arrEjecutarSQL($sqlSentencia);

			return $arrRta;
		} 
		catch (Exception $e) 
		{
			throw new Exception($e->getMessage());
		}
	}
}

?>