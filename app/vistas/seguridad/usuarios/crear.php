<?php 

include_once ruta_control.'CtrlPerfiles.php';

require ruta_vista.'seguridad/seguridad/Menu.php'; 

$ctrlPerfiles = new CtrlPerfiles();
$arrPerfiles = $ctrlPerfiles->listar();

?>

	<div class="row m-3">
		<div class="col-sm-10 offset-sm-1">
			<form id="frm_login" action="index.php?p=usuarios/guardar" method="POST">
				<div class="text-center">
					<h5>Agregar Usuario</h5>
				</div>
				<hr>

				<div>
					<div class="row col-sm-12">
						<div class="form-group col-sm-4">
							<label>Nombre</label>
							<input type="text" class="form-control form-control-sm" id="usua_nombre" name="usua_nombre" required="true">
						</div>
						<div class="form-group col-sm-4">
							<label>Mail</label>
							<input type="email" class="form-control form-control-sm" id="usua_mail" name="usua_mail" required="true">
						</div>
						<div class="form-group col-sm-4">
							<label>Login</label>
							<input type="texto" class="form-control form-control-sm" id="usua_login" name="usua_login" required="true">
						</div>
						<div class="form-group col-sm-4">
							<label>Clave</label>
							<input type="password" class="form-control form-control-sm" id="usua_clave" name="usua_clave" required="true">
						</div>
						<div class="form-group col-sm-4">
							<label>Repita la Clave</label>
							<input type="password" class="form-control form-control-sm" id="usua_clave_2" name="usua_clave_2" required="true">
						</div>
						<div class="form-group col-sm-4">
							<label>Perfil</label>
							<select class="form-control form-control-sm" id="fk_seg_perfiles" name="fk_seg_perfiles" required="true">
								<?php
									foreach ($arrPerfiles as $perfil)
										echo '<option value="'.$perfil['perf_codigo'].'">'.$perfil['perf_descripcion'].'</option>';
								?>
							</select>
						</div>
					</div>
				</div>

				<div class="bg-transparent">
					<button type="submit" class="btn btn-sm btn-secondary" title="Guardar Registro">
						<i class="fa fa-floppy-o"></i> Guardar
					</button>
					<a class="btn btn-sm btn-danger" href="index.php?p=usuarios/index" title="Cancelar">
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