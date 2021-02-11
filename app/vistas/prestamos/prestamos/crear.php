<?php 

include_once ruta_control.'CtrlClientes.php';

require ruta_vista.'seguridad/seguridad/Menu.php'; 

$ctrlClientes = new CtrlClientes();
$arrClientes = $ctrlClientes->listar();

?>

<head>
	<title><?=titulo?></title>
</head>

<div class="row m-3">
	<div class="col-sm-10 offset-sm-1">
		<form id="frm_login" action="index.php?p=prestamos/guardar" method="POST">
			<div class="text-center">
				<h5>Agregar Préstamo</h5>
			</div>
			<hr>				
			<div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label>Cliente</label>
						<select class="form-control form-control-sm" id="fk_par_clientes" name="fk_par_clientes" required="true">
							<?php
								foreach ($arrClientes as $clientes)
									echo '<option value="'.$clientes['clie_codigo'].'">'.$clientes['clie_nombre'].' '.$clientes['clie_apellido'].'</option>';
							?>
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label>Fecha</label>
						<input type="text" class="form-control form-control-sm" id="pres_fecha" name="pres_fecha" required="true">
					</div>
					<div class="form-group col-sm-3">
						<label>Valor</label>
						<input type="text" class="form-control form-control-sm" id="pres_vlr_monto" name="pres_vlr_monto" required="true">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label>Frecuencia de Pago</label>
						<select class="form-control form-control-sm texto-12 intCalcular" name="pres_frecuencia" id="pres_frecuencia" data-req="true">
							<option value="D">Diario</option>
							<option value="S">Semanal</option>
							<option value="Q">Quincenal</option>
							<option value="M">Mensual</option>
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label>Número de Cuotas</label>
						<input type="text" class="form-control form-control-sm" id="pres_nro_cuotas" name="pres_nro_cuotas" required="true">
					</div>
					<div class="form-group col-sm-3">
						<label>Plazo (en meses)</label>
						<input type="text" class="form-control form-control-sm" id="pres_plazo" name="pres_plazo" required="true">
					</div>
					<div class="form-group col-sm-3">
						<label>Porcentaje de Interés</label>
						<input type="text" class="form-control form-control-sm" id="pres_interes" name="pres_interes" required="true">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<button type="button" class="btn btn-secondary btn-sm texto-12" id="btn_int_calcular" onclick="calcular()"><i class="fa fa-calculator"></i> Calcular</button>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label>Interés Mensual</label>
						<input type="text" class="form-control form-control-sm" name="pres_int_mensual" id="pres_int_mensual" readonly="true">
					</div>
					<div class="form-group col-sm-3">
						<label>Interés Total</label>
						<input type="text" class="form-control form-control-sm" name="pres_int_total" id="pres_int_total" readonly="true">
					</div>
					<div class="form-group col-sm-3">
						<label>Total Pago</label>
						<input type="text" class="form-control form-control-sm" name="pres_vlr_pago" id="pres_vlr_pago" readonly="true">
					</div>
					<div class="form-group col-sm-3">
						<label>Valor Cuota</label>
						<input type="text" class="form-control form-control-sm" name="pres_vlr_cuota" id="pres_vlr_cuota" readonly="true">
					</div>
				</div>
			</div>

			<div>
				<button type="submit" class="btn btn-sm btn-secondary" title="Guardar Registro">
					<i class="fa fa-floppy-o"></i> Guardar
				</button>
				<a class="btn btn-sm btn-danger" href="index.php?p=prestamos/index" title="Cancelar">
					<i class="fa fa-ban"></i> Cancelar
				</a>
			</div>

			<?php 
			if (isset($arrDatos['datos']['mensaje']) && !empty($arrDatos['datos']['mensaje'])) { 
				$strTipo = $arrDatos['datos']['error'] ? 'danger' : 'success';
			?>
				<div class="alert alert-<?=$strTipo?>" role="alert">
					<?= $arrDatos['datos']['mensaje'] ?>
				</div>
			<?php } ?>
		</form>
	</div>
</div>

<script>
    $(document).ready(function(){
		$('#pres_fecha').datepicker({
			format: "yyyy-mm-dd",
			todayBtn: "linked",
			language: "es"
		});
    });

	function calcular()
	{
		enviarPeticion(
			'prestamos/calcular',
			{
				'pres_vlr_monto': $('#pres_vlr_monto').val(),
				'pres_frecuencia' : $('#pres_frecuencia').val(),
				'pres_nro_cuotas' : $('#pres_nro_cuotas').val(),
				'pres_plazo':$('#pres_plazo').val(),
				'pres_interes':$('#pres_interes').val()
			},
			function(rta){
				if (rta.error == true)
					alert(rta.mensaje);
				else
				{
					$.each(rta.datos[0], function(i, val){
						$('#'+i).val(val);
					});
				}
			}
		);
	}
</script>