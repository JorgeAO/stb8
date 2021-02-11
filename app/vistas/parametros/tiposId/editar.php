<?php 

include_once ruta_control.'CtrlEstados.php';

require ruta_vista.'seguridad/seguridad/Menu.php';

$ctrlEstados = new CtrlEstados();
$arrEstados = $ctrlEstados->listar();

?>

	<div class="row m-3">
		<div class="col-sm-10 offset-sm-1">
			<form id="frm_login" action="index.php?p=tiposId/actualizar" method="POST">
				<div class="text-center">
					<h5>Editar Tipo de Identificación</h5>
				</div>
				<hr>

				<div>
					<div class="row col-sm-12">
						<div class="form-group col-sm-3">
							<label>Código</label>
							<input 
								class="form-control form-control-sm" 
								id="tiid_codigo" 
								name="tiid_codigo" 
								required="true" 
								readonly="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['tiid_codigo']?>" 
							>
						</div>
						<div class="form-group col-sm-6">
							<label>Descripción</label>
							<input 
								class="form-control form-control-sm" 
								id="tiid_descripcion" 
								name="tiid_descripcion" 
								required="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['tiid_descripcion']?>" 
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
					<a class="btn btn-sm btn-danger" href="index.php?p=tiposId/index" title="Cancelar">
						<i class="fa fa-ban"></i> Cancelar
					</a>
				</div>
			</form>
		</div>
	</div>