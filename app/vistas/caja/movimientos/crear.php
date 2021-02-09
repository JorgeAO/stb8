<?php 

include_once ruta_control.'CtrlInversionistas.php';

$ctrlInversionistas = new CtrlInversionistas();
$arrInversionistas = $ctrlInversionistas->listar();

require ruta_vista.'seguridad/seguridad/Menu.php'; 

?>

<div class="container">
	<div class="row m-3">
		<div class="col-sm-12">
			<form id="frm_login" action="index.php?p=movimientos/guardar" method="POST">
				<div class="text-center">
					<h5>Agregar Movimiento</h5>
				</div>
				<hr>

				<div>
					<div class="row col-sm-12">
						<div class="form-group col-sm-3">
							<label>Inversionista</label>
							<select class="form-control form-control-sm" id="fk_par_inversionistas" name="fk_par_inversionistas" required="true">
								<?php
									foreach ($arrInversionistas as $inversionista)
										echo '<option value="'.$inversionista['inve_codigo'].'">'.$inversionista['inve_identificacion'].' - '.$inversionista['inve_nombre'].' '.$inversionista['inve_apellido'].'</option>';
								?>
							</select>
						</div>
						<div class="form-group col-sm-3">
							<label>Tipo de Movimiento</label>
							<select class="form-control form-control-sm texto-12" name="movi_tipo" id="movi_tipo">
								<option value="E">Entrada</option>
								<option value="S">Salida</option>
							</select>
						</div>
						<div class="form-group col-sm-3">
							<label>Descripción</label>
							<input type="text" class="form-control form-control-sm" id="movi_descripcion" name="movi_descripcion" required="true">
						</div>
						<div class="form-group col-sm-3">
							<label>Fecha</label>
							<input type="text" class="form-control form-control-sm" id="movi_fecha" name="movi_fecha" required="true">
						</div>
						<div class="form-group col-sm-3">
							<label>Monto</label>
							<input type="text" class="form-control form-control-sm" id="movi_monto" name="movi_monto" required="true">
						</div>
					</div>
				</div>

				<div>
					<button type="submit" id="btn_guardar" class="btn btn-sm btn-secondary" title="Guardar Registro">
						<i class="fa fa-floppy-o"></i> Guardar
					</button>
					<a class="btn btn-sm btn-danger" href="index.php?p=movimientos/index" title="Cancelar">
						<i class="fa fa-ban"></i> Cancelar
					</a>
					<div id="div_esperar"></div>
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
</div>

<script>
    $(document).ready(function(){
		
		$('#movi_fecha').datepicker({
			format: "yyyy-mm-dd",
			todayBtn: "linked",
			language: "es"
		});
    	
		$('#btn_guardar').on('click', function(){
			$('#div_esperar').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Espere por favor...')
		});
    });
</script>