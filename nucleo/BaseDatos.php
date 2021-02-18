<?php

class BaseDatos
{
	private static function arrObtenerDatosCnx($strEntorno)
	{
		try 
		{
			$arrDatosEntorno = [
				'desarrollo' => [
					'servidor' => 'localhost',
					'usuario' => 'root',
					'clave' => '',
					'bd' => 'bd_smarttrader_v8'
				],
				'pruebas' => [
					'servidor' => 'localhost',
					'usuario' => 'root',
					'clave' => '',
					'bd' => 'bd_smarttrader_v8'
				],
				'produccion' => [
					'servidor' => 'localhost',
					'usuario' => 'stb8_user',
					'clave' => 'stb8_2021',
					'bd' => 'bd_smarttrader_v8'
				],
			];

			return $arrDatosEntorno[$strEntorno];
		} 
		catch (Exception $e) 
		{
			throw new Exception($e);
		}
	}

	private static function cnxConectar($strEntorno)
	{
		try 
		{
			$arrDatosCnx = self::arrObtenerDatosCnx($strEntorno);

			$cnxConexion = new mysqli(
				$arrDatosCnx['servidor'], 
				$arrDatosCnx['usuario'], 
				$arrDatosCnx['clave'], 
				$arrDatosCnx['bd']
			);

			if ($cnxConexion->connect_errno) {
			    echo "Fallo al conectar a MySQL: (" . $cnxConexion->connect_errno . ") " . $cnxConexion->connect_error;
			    exit();
			}

			$blDebug = 0;
			if ($blDebug)
			{
				Vista::mostrarVista([
					'destino' => 'Debug',
					'datos' => [
						'clase' => 'BaseDatos',
						'metodo' => 'cnxConectar',
						'conexion' => $cnxConexion,
					]
				]);
			}

			return $cnxConexion;
		} 
		catch (Exception $e) 
		{
			throw new Exception("Error Processing Request", 1);
		}
	}

	public static function arrEjecutarSQL($strSQL, $strEntorno = 'produccion')
	{
		try 
		{
			$cnxConexion = self::cnxConectar($strEntorno);


			$rslResulado = $cnxConexion->query($strSQL);

			if ($cnxConexion->errno)
				throw new Exception($cnxConexion->errno.': '.$cnxConexion->error);

			$arrDatos = [];

			if (is_object($rslResulado))
			{
				while ($drFila = mysqli_fetch_assoc($rslResulado))
					$arrDatos[] = $drFila;
			}
			else if ($rslResulado === TRUE)
			{
				$arrDatos['insert_id'] = $cnxConexion->insert_id;
				$arrDatos['affected_rows'] = $cnxConexion->affected_rows;
			}

			$blDebug = 0;
			if ($blDebug)
			{
				Vista::mostrarVista([
					'destino' => 'Debug',
					'datos' => [
						'clase' => 'BaseDatos',
						'metodo' => 'arrEjecutarSQL',
						'sentencia' => $strSQL,
						'resultado' => $arrDatos,
					]
				]);
			}

			return $arrDatos;
		} 
		catch (Exception $e) 
		{
			throw new Exception($e);
		}
	}
}

?>