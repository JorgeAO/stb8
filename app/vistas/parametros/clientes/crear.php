<?php 

include_once ruta_control.'CtrlTiposId.php';

$ctrlTiposId = new CtrlTiposId();
$arrTiposId = $ctrlTiposId->listar();

require ruta_vista.'seguridad/seguridad/Menu.php'; 

?>

	<div class="row m-3">
		<div class="col-sm-10 offset-sm-1">
			<form id="frm_login" action="index.php?p=clientes/guardar" method="POST">
				<div class="text-center">
					<h5>Agregar Cliente</h5>
				</div>
				<hr>

				<div>
					<div class="row col-sm-12">
						<div class="form-group col-sm-3">
							<label>Tipo de Identificación</label>
							<select class="form-control form-control-sm" id="fk_par_tipos_identificacion" name="fk_par_tipos_identificacion" required="true">
								<?php
									foreach ($arrTiposId as $tipoId)
										echo '<option value="'.$tipoId['tiid_codigo'].'">'.$tipoId['tiid_codigo'].' - '.$tipoId['tiid_descripcion'].'</option>';
								?>
							</select>
						</div>
						<div class="form-group col-sm-3">
							<label>Identificación</label>
							<input type="text" class="form-control form-control-sm" id="clie_identificacion" name="clie_identificacion" required="true">
						</div>
						<div class="form-group col-sm-3">
							<label>Nombre</label>
							<input type="text" class="form-control form-control-sm" id="clie_nombre" name="clie_nombre" required="true">
						</div>
						<div class="form-group col-sm-3">
							<label>Apellido</label>
							<input type="text" class="form-control form-control-sm" id="clie_apellido" name="clie_apellido" required="true">
						</div>
						<div class="form-group col-sm-3">
							<label>Dirección</label>
							<input type="text" class="form-control form-control-sm" id="clie_direccion" name="clie_direccion" required="true">
						</div>
						<div class="form-group col-sm-3">
							<label>Celular</label>
							<input type="text" class="form-control form-control-sm" id="clie_celular" name="clie_celular" required="true">
						</div>
					</div>
				</div>

				<div>
					<button type="submit" id="btn_guardar" class="btn btn-sm btn-secondary" title="Guardar Registro">
						<i class="fa fa-floppy-o"></i> Guardar
					</button>
					<a class="btn btn-sm btn-danger" href="index.php?p=clientes/index" title="Cancelar">
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