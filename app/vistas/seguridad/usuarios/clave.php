<?php 

require ruta_vista.'seguridad/seguridad/Menu.php'; 

?>

	<div class="row m-3">
		<div class="col-sm-10 offset-sm-1">
			<form id="frm_login" action="index.php?p=usuarios/cambiarClave" method="POST">
				<div class="ext-center">
					<h5>Cambiar mi Clave</h5>
				</div>
				<hr>

				<div>
					<div class="row col-sm-12">
						<div class="form-group col-sm-3">
							<label>Clave Actual </label>
							<input type="password" class="form-control form-control-sm" id="usua_clave" name="usua_clave">
						</div>
						<div class="form-group col-sm-3">
							<label>Clave</label>
							<input type="password" class="form-control form-control-sm" id="usua_clave_nueva" name="usua_clave_nueva">
						</div>
						<div class="form-group col-sm-3">
							<label>Repita la Clave</label>
							<input type="password" class="form-control form-control-sm" id="usua_clave_nueva_2" name="usua_clave_nueva_2">
						</div>
					</div>
				</div>

				<div>
					<button type="submit" class="btn btn-sm btn-secondary" title="Guardar Registro">
						<i class="fa fa-floppy-o"></i> Guardar
					</button>
					<a class="btn btn-sm btn-danger" href="index.php?p=perfiles/index" title="Cancelar">
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