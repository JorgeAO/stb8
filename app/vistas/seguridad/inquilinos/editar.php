<?php 

include_once ruta_control.'CtrlEstados.php';

require ruta_vista.'seguridad/seguridad/Menu.php';

$ctrlEstados = new CtrlEstados();
$arrEstados = $ctrlEstados->listar();

?>

<div class="container">
	<div class="row m-3">
		<div class="col-sm-12">
			<form id="frm_login" action="index.php?p=inquilinos/actualizar" method="POST">
				<div class="text-center">
					<h5>Editar Inquilino</h5>
				</div>
				<hr>

				<div>
					<div class="row col-sm-12">
						<div class="form-group col-sm-3">
							<label>Código</label>
							<input 
								class="form-control form-control-sm" 
								id="inqu_codigo" 
								name="inqu_codigo" 
								required="true" 
								readonly="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['inqu_codigo']?>" 
							>
						</div>
						<div class="form-group col-sm-3">
							<label>Nombre</label>
							<input 
								class="form-control form-control-sm" 
								id="inqu_descripcion" 
								name="inqu_nombre" 
								required="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['inqu_nombre']?>" 
							>
						</div>
						<div class="form-group col-sm-3">
							<label>Apellido</label>
							<input 
								class="form-control form-control-sm" 
								id="inqu_descripcion" 
								name="inqu_apellido" 
								required="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['inqu_apellido']?>" 
							>
						</div>
						<div class="form-group col-sm-3">
							<label>Celular</label>
							<input 
								class="form-control form-control-sm" 
								id="inqu_descripcion" 
								name="inqu_celular" 
								required="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['inqu_celular']?>" 
							>
						</div>
						<div class="form-group col-sm-3">
							<label>Correo</label>
							<input 
								class="form-control form-control-sm" 
								id="inqu_descripcion" 
								name="inqu_correo" 
								required="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['inqu_correo']?>" 
							>
						</div>
						<div class="form-group col-sm-3">
							<label>Base de Datos</label>
							<input 
								class="form-control form-control-sm" 
								id="inqu_descripcion" 
								name="inqu_base_datos" 
								required="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['inqu_base_datos']?>" 
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
					<a class="btn btn-sm btn-danger" href="index.php?p=inquilinos/index" title="Cancelar">
						<i class="fa fa-ban"></i> Cancelar
					</a>
				</div>

			</form>
		</div>
	</div>
</div>