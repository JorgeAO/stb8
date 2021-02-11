<?php 

include_once ruta_control.'CtrlEstados.php';

require ruta_vista.'seguridad/seguridad/Menu.php';

$ctrlEstados = new CtrlEstados();
$arrEstados = $ctrlEstados->listar();

?>

	<div class="row m-3">
		<div class="col-sm-10 offset-sm-1">
			<form id="frm_login" action="index.php?p=perfiles/actualizar" method="POST">
				<div class="text-center">
					<h5>Editar Perfil</h5>
				</div>
				<hr>

				<div>
					<div class="row col-sm-12">
						<div class="form-group col-sm-3">
							<label>Código</label>
							<input 
								class="form-control form-control-sm" 
								id="perf_codigo" 
								name="perf_codigo" 
								required="true" 
								readonly="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['perf_codigo']?>" 
							>
						</div>
						<div class="form-group col-sm-6">
							<label>Descripción</label>
							<input 
								class="form-control form-control-sm" 
								id="perf_descripcion" 
								name="perf_descripcion" 
								required="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['perf_descripcion']?>" 
							>
						</div>
						<div class="form-group col-sm-3">
							<label>Estado</label>
							<select class="form-control form-control-sm" id="fk_par_estados" name="fk_par_estados" required="true">
								<?php
									foreach ($arrEstados as $estados)
									{
										$strSelected = $arrDatos['datos']['modelo'][0]['fk_par_estados'] == $estados["esta_codigo"] ? "selected" : "";
										echo '<option value="'.$estados['esta_codigo'].'" '.$strSelected.'>'.$estados['esta_descripcion'].'</option>';
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
					<a class="btn btn-sm btn-danger" href="index.php?p=perfiles/index" title="Cancelar">
						<i class="fa fa-ban"></i> Cancelar
					</a>
				</div>

			</form>
		</div>
	</div>