<?

include_once ruta_app.'modelo/ClsPermisos.php';

class CtrlPermisos
{
	function __construct()
	{
		$this->strClase = 'ClsPermisos';
		$this->intOpcion = 1003;
		$this->strVista = 'seguridad/permisos/';
		$this->strIndex = 'seguridad/seguridad/Permisos';

		include_once ruta_app.'modelo/'.$this->strClase.'.php';
		$this->objModelo = new $this->strClase();
	}

	public function menu()
	{
		try 
		{
			//session_start();
			$clsPermisos = new ClsPermisos();
			$strMenu = $clsPermisos->strMenuNav($_SESSION['usuario']['fk_seg_perfiles']);

			return $strMenu;
		} 
		catch (Exception $e) 
		{
			throw new Exception($e->getMessage());
		}
	}

	public function index()
	{
		try 
		{
			if (ClsPermisos::blValidarPermiso($this->intOpcion, 'r') == 0){
				throw new Exception('Usted no posee permisos para ejecutar esta acción');
			}
			
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

	public function insertar($arrParametros)
	{
		try 
		{
			// Eliminar todos los permisos que tenga el perfil
			ClsPermisos::eliminar([
				'fk_seg_perfiles'=>$arrParametros['fk_seg_perfiles']
			]);

			// Recorrer todas las opciones a las que se les está asignando permiso
			foreach ($arrParametros['permisos'] as $opcion => $permisos)
			{
				// Recorrer todos los permisos por opcion
				foreach ($permisos as $accion => $concedido)
				{
					// Consultar si el permiso ya existe
					$arrConsulta = ClsPermisos::consultar([
						'fk_seg_perfiles' => $arrParametros['fk_seg_perfiles'],
						'fk_seg_opciones' => $opcion
					]);

					// Si el permiso no existe, se crea
					if (count($arrConsulta) == 0)
					{
						ClsPermisos::insertar([
							'fk_seg_perfiles' => $arrParametros['fk_seg_perfiles'],
							'fk_seg_opciones' => $opcion,
							'perm_'.$accion => '1'
						]);
					}
					// Si el permiso ya existe, se modifica la acción
					else 
					{
						ClsPermisos::actualizar([
							'perm_codigo' => $arrConsulta[0]['perm_codigo'],
							'perm_'.$accion => '1'
						]);
					}
				}
			}

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

	public function consultar($arrParametros = [])
	{
		try 
		{
			if (!ClsPermisos::blValidarPermiso(1003, 'r'))
				throw new Exception('Usted no posee permisos para ejecutar esta acción');

			$arrResultados = ClsPermisos::arrVerPermisos($arrParametros['fk_seg_perfiles']);

			return $arrResultados;
		} 
		catch (Exception $e) 
		{
			throw new Exception($e->getMessage());
		}
	}
}