<?php

include_once ruta_nucleo.'Control.php';

class CtrlUsuarios extends Control
{
	function __construct()
	{
		$this->strClase = 'ClsUsuarios';
		$this->intOpcion = 1002;
		$this->strVista = 'seguridad/usuarios/';

		include_once ruta_app.'modelo/'.$this->strClase.'.php';
		$this->objModelo = new $this->strClase();
	}

	public function guardar($arrParametros)
	{
		try 
		{
			if ($_POST['usua_clave'] != $_POST['usua_clave_2'])
				throw new Exception('Las contraseñas no coinciden, por favor validar');

			$arrResultado = $this->strClase::insertar([
				'usua_nombre' => $_POST['usua_nombre'],
				'usua_mail' => $_POST['usua_mail'],
				'usua_login' => $_POST['usua_login'],
				'usua_clave' => md5($_POST['usua_clave']),
				'fk_seg_perfiles' => $_POST['fk_seg_perfiles'],
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

	public function validar($arrParametros)
	{
		try 
		{
			$strClave = $arrParametros['usua_clave'];
			unset($arrParametros['usua_clave']);

			$arrUsuario = $this->strClase::consultar($arrParametros);

			if (count($arrUsuario) != 1)
			{
				Vista::mostrarVista([
					'destino' => 'seguridad/seguridad/Login',
					'datos' => [
						'error' => true,
						'mensaje' => 'No se pudo recuperar el usuario'
					]
				]);
			}

			if ($arrUsuario[0]['fk_par_estados'] == 2)
			{
				Vista::mostrarVista([
					'destino' => 'seguridad/seguridad/Login',
					'datos' => [
						'error' => true,
						'mensaje' => 'El usuario no se encuentra activo, comuníquese con el administrador del sistema'
					]
				]);
			}

			if ($arrUsuario[0]['usua_clave'] != md5($strClave))
			{
				Vista::mostrarVista([
					'destino' => 'seguridad/seguridad/Login',
					'datos' => [
						'error' => true,
						'mensaje' => 'La contraseña no es correcta, por favor validar'
					]
				]);
			}

			$_SESSION['usuario'] = $arrUsuario[0];

			Vista::mostrarVista([
				'destino' => 'seguridad/seguridad/Principal',
			]);
		} 
		catch (Exception $e) 
		{
			Vista::mostrarVista([
				'destino' => 'Error',
				'tipo' => 'error',
				'datos' => $e
			]);
		}
	}

	public function login($arrParametros = [])
	{
		try 
		{
			Vista::mostrarVista([
				'tipo' => 'vista',
				'destino' => 'seguridad/seguridad/Login'
			]);
		} 
		catch (Exception $e) 
		{
			throw new Exception($e);
		}
	}

	public function clave()
	{
		try 
		{
			Vista::mostrarVista([
				'tipo' => 'vista',
				'destino' => 'seguridad/usuarios/clave'
			]);
		} 
		catch (Exception $e) 
		{
			throw new Exception($e);
		}
	}

	public function cambiarClave($arrParametros = [])
	{
		try 
		{
			// Validar la clave actual es correcta
			if (md5($arrParametros['usua_clave']) != $_SESSION['usuario']['usua_clave'])
				throw new Exception('La clave actual no es correcta');
				
			// Validar que las nuevas claves sean la misma
			if ($arrParametros['usua_clave_nueva'] != $arrParametros['usua_clave_nueva_2'])
				throw new Exception('Las claves nuevas no coinciden');

			// Actualizar la clave del usuario
			$arrResultado = $this->strClase::actualizar([
				'usua_codigo' => $_SESSION['usuario']['usua_codigo'],
				'usua_clave' => md5($arrParametros['usua_clave_nueva']),
				'fc' => date('Y-m-d H:i:s'),
				'uc' => $_SESSION['usuario']['usua_codigo'],
			]);

			Vista::mostrarVista([
				'tipo' => 'vista',
				'destino' => 'seguridad/usuarios/clave',
				'datos' => [
					'error' => false,
					'mensaje' => 'El proceso se realizó con éxito',
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