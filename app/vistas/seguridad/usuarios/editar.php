<?php 

include_once ruta_control.'CtrlPerfiles.php';
include_once ruta_control.'CtrlEstados.php';

require ruta_vista.'seguridad/seguridad/Menu.php'; 

$ctrlPerfiles = new CtrlPerfiles();
$arrPerfiles = $ctrlPerfiles->listar();

$ctrlEstados = new CtrlEstados();
$arrEstados = $ctrlEstados->listar();

?>

<div class="container">
	<div class="row m-3">
		<div class="col-sm-12">
			<form id="frm_login" action="index.php?p=usuarios/actualizar" method="POST">
				<div class="text-center">
					<h5>Editar Usuario</h5>
				</div>
				<hr>

				<div>
					<div class="row col-sm-12">
						<div class="form-group col-sm-3">
							<label>Código</label>
							<input 
								class="form-control form-control-sm" 
								id="usua_codigo" 
								name="usua_codigo" 
								required="true" 
								readonly="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['usua_codigo']?>" 
							>
						</div>
						<div class="form-group col-sm-3">
							<label>Nombre</label>
							<input type="text" class="form-control form-control-sm" id="usua_nombre" name="usua_nombre" required="true"
								value="<?=$arrDatos['datos']['modelo'][0]['usua_nombre']?>" 
							>
						</div>
						<div class="form-group col-sm-3">
							<label>Mail</label>
							<input type="email" class="form-control form-control-sm" id="usua_mail" name="usua_mail" required="true"
								value="<?=$arrDatos['datos']['modelo'][0]['usua_mail']?>" 
							>
						</div>
						<div class="form-group col-sm-3">
							<label>Perfil</label>
							<select class="form-control form-control-sm" id="fk_seg_perfiles" name="fk_seg_perfiles" required="true">
								<?php

									foreach ($arrPerfiles as $perfil)
									{
										$strSelected = $arrDatos['datos']['modelo'][0]['fk_seg_perfiles'] == $perfil["perf_codigo"] ? "selected" : "";
										echo '<option value="'.$perfil['perf_codigo'].'" '.$strSelected.'>'.$perfil['perf_codigo'].' - '.$perfil['perf_descripcion'].'</option>';
									}
								?>
							</select>
						</div>
						<div class="form-group col-sm-3">
							<label>Estado</label>
							<select class="form-control form-control-sm" id="fk_par_estados" name="fk_par_estados" required="true">
								<?php
									foreach ($arrEstados as $estados)
									{
										$strSelected = $arrDatos['datos']['modelo'][0]['fk_par_estados'] == $estados["esta_codigo"] ? "selected" : "";
										echo '<option value="'.$estados['esta_codigo'].'" '.$strSelected.'>'.$estados['esta_codigo'].' - '.$estados['esta_descripcion'].'</option>';
									}
								?>
							</select>
						</div>
					</div>
				</div>

				<div>
					<button type="submit" class="btn btn-sm btn-secondary" title="Guardar Registro">
						<i class="fa fa-floppy-o"></i> Guardar
					</button>
					<a class="btn btn-sm btn-danger" href="index.php?p=usuarios/index" title="Cancelar">
						<i class="fa fa-ban"></i> Cancelar
					</a>
				</div>
			</form>
		</div>
	</div>
</div>