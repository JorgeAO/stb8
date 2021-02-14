<?php

include 'BaseDatos.php';

class Modelo
{
	public $strTabla;
	public $strPrefijoTabla;
	public $strCampoId;
	public $strSentencia;
	
	private static $arrTablasInquilino = [
		'tb_caj_movimientos',
		'tb_par_clientes',
		'tb_par_inversionistas',
		'tb_pre_cuotas',
		'tb_pre_participacion',
		'tb_pre_prestamos',
		'tb_pre_prestamos',
		'tb_seg_usuarios',
	];

	function __construct()
	{
		$strTabla = '';
		$strPrefijoTabla = '';
		$strCampoId = '';
		$strSentencia = '';
	}

	public static function insertar($arrParametros)
	{
		try 
		{
			$modelo = new static();

			if (in_array($modelo->strTabla, self::$arrTablasInquilino))
				$arrParametros['fk_seg_inquilinos'] = $_SESSION['usuario']['fk_seg_inquilinos'];

			$sqlSentencia = "insert into ".$modelo->strTabla." set ";

			foreach ($arrParametros as $strCampo => $strValor)
				$sqlSentencia .= $strCampo." = '".$strValor."', ";

			$sqlSentencia = rtrim($sqlSentencia, ', ');

			$blDebug = 0;
			if ($blDebug && $modelo->strTabla == 'tb_par_clientes')
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

			if (in_array($modelo->strTabla, self::$arrTablasInquilino) && isset($_SESSION['usuario']))
				$arrParametros[$modelo->strPrefijoTabla.'.fk_seg_inquilinos'] = $_SESSION['usuario']['fk_seg_inquilinos'];

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
			if ($blDebug && $modelo->strTabla == 'tb_pre_prestamos')
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

			if(!isset($_SESSION))
				session_start();

			if (in_array($modelo->strTabla, self::$arrTablasInquilino))
				$arrParametros['fk_seg_inquilinos'] = $_SESSION['usuario']['fk_seg_inquilinos'];

			$sqlSentencia = "update ".$modelo->strTabla." set ";

			foreach ($arrParametros as $strCampo => $strValor)
			{
				if ($strCampo != $modelo->strCampoId) 
					$sqlSentencia .= $strCampo." = '".$strValor."', ";
			}

			$sqlSentencia = rtrim($sqlSentencia, ', ');

			$sqlSentencia .= ' where '.$modelo->strCampoId.' = '.$arrParametros[$modelo->strCampoId];

			$blDebug = 1;
			if ($blDebug && $modelo->strTabla == 'tb_pre_cuotas')
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

			if (in_array($modelo->strTabla, self::$arrTablasInquilino))
				$arrParametros['fk_seg_inquilinos'] = $_SESSION['usuario']['fk_seg_inquilinos'];

			$sqlSentencia = "delete from ".$modelo->strTabla." where ";

			foreach ($arrParametros as $strCampo => $strValor)
				$sqlSentencia .= $strCampo." = '".$strValor."' and ";

			$sqlSentencia = rtrim($sqlSentencia, ' and ');

			$blDebug = 0;
			if ($blDebug && $modelo->strTabla == 'tb_par_clientes')
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
}

?>