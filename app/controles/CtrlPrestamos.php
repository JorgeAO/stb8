<?php

include_once ruta_nucleo.'Control.php';

class CtrlPrestamos extends Control
{
	function __construct()
	{
		$this->strClase = 'ClsPrestamos';
		$this->intOpcion = 4001;
		$this->strVista = 'prestamos/prestamos/';

		include_once ruta_app.'modelo/'.$this->strClase.'.php';
		$this->objModelo = new $this->strClase();
	}

	public function calcular($arrParametros)
	{
		try 
		{

			$strMensaje = '';

			if ($arrParametros['pres_vlr_monto'] == '')
				$strMensaje .= 'Ingrese el valor\n';
			if ($arrParametros['pres_nro_cuotas'] == '')
				$strMensaje .= 'Ingrese el número de cuotas\n';
			if ($arrParametros['pres_plazo'] == '')
				$strMensaje .= 'Ingrese el plazo\n';
			if ($arrParametros['pres_interes'] == '')
				$strMensaje .= 'Ingrese el interés\n';
			
			if (!empty($strMensaje))
				throw new Exception('\n'.$strMensaje);

			$flInteresMensual = $arrParametros['pres_vlr_monto'] * $arrParametros['pres_interes'] / 100;
			$flInteresTotal = $flInteresMensual * $arrParametros['pres_plazo'];
			$flTotalPago = $arrParametros['pres_vlr_monto'] + $flInteresTotal;
			$flCuota = $flTotalPago / $arrParametros['pres_nro_cuotas'];

			$arrCalculo[0]['pres_int_mensual'] = round($flInteresMensual, -2);
			$arrCalculo[0]['pres_int_total'] = round($flInteresTotal, -2);
			$arrCalculo[0]['pres_vlr_pago'] = round($flTotalPago, -2);
			$arrCalculo[0]['pres_vlr_cuota'] = round($flCuota, -2);

			echo '<pre>';
			print_r([
				'tipo' => 'vista',
				'destino' => $this->strVista . 'index',
				'datos' => [
					'calculo' => $arrCalculo
				]
			]);
			echo '</pre>';
			exit();

			ob_clean();
			echo json_encode($arrCalculo);
		} 
		catch (Exception $e) 
		{
			throw new Exception('CtrlPrestamos.intCalcular: '.$e->getMessage());
		}
	}
}

?>