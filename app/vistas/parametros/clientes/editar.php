<?php 

include_once ruta_control.'CtrlTiposId.php';
include_once ruta_control.'CtrlEstados.php';

$ctrlTiposId = new CtrlTiposId();
$arrTiposId = $ctrlTiposId->listar();

$ctrlEstados = new CtrlEstados();
$arrEstados = $ctrlEstados->listar();

require ruta_vista.'seguridad/seguridad/Menu.php';

?>

<div class="container">
	<div class="row m-3">
		<div class="col-sm-12">
			<form id="frm_login" action="index.php?p=clientes/actualizar" method="POST">
				<div class="text-center">
					<h5>Editar Cliente</h5>
				</div>
				<hr>
				
				<div>
					<div class="row col-sm-12">
						<div class="form-group col-sm-3">
							<label>Código</label>
							<input 
								class="form-control form-control-sm" 
								id="clie_codigo" 
								name="clie_codigo" 
								required="true" 
								readonly="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['clie_codigo']?>" 
							>
						</div>
						<div class="form-group col-sm-3">
							<label>Tipo de Identificación</label>
							<select class="form-control form-control-sm" id="fk_par_tipos_identificacion" name="fk_par_tipos_identificacion" required="true">
								<?php
									foreach ($arrTiposId as $tiposId)
									{
										$strSelected = $arrDatos['datos']['modelo'][0]['fk_par_tipos_identificacion'] == $tiposId["tiid_codigo"] ? "selected" : "";
										echo '<option value="'.$tiposId['tiid_codigo'].'" '.$strSelected.'>'.$tiposId['tiid_codigo'].' - '.$tiposId['tiid_descripcion'].'</option>';
									}
								?>
							</select>
						</div>
						<div class="form-group col-sm-3">
							<label>Identificación</label>
							<input 
								class="form-control form-control-sm" 
								id="clie_identificacion" 
								name="clie_identificacion" 
								required="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['clie_identificacion']?>" 
							>
						</div>
						<div class="form-group col-sm-3">
							<label>Nombre</label>
							<input 
								class="form-control form-control-sm" 
								id="clie_nombre" 
								name="clie_nombre" 
								required="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['clie_nombre']?>" 
							>
						</div>
						<div class="form-group col-sm-3">
							<label>Apellido</label>
							<input 
								class="form-control form-control-sm" 
								id="clie_apellido" 
								name="clie_apellido" 
								required="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['clie_apellido']?>" 
							>
						</div>
						<div class="form-group col-sm-3">
							<label>Dirección</label>
							<input 
								class="form-control form-control-sm" 
								id="clie_direccion" 
								name="clie_direccion" 
								required="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['clie_direccion']?>" 
							>
						</div>
						<div class="form-group col-sm-3">
							<label>Celular</label>
							<input 
								class="form-control form-control-sm" 
								id="clie_celular" 
								name="clie_celular" 
								required="true"
								type="text" 
								value="<?=$arrDatos['datos']['modelo'][0]['clie_celular']?>" 
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

					<div>
						<button type="submit" id="btn_guardar" class="btn btn-sm btn-secondary" title="Guardar Registro">
							<i class="fa fa-floppy-o"></i> Guardar
						</button>
						<a class="btn btn-sm btn-danger" href="index.php?p=clientes/index" title="Cancelar">
							<i class="fa fa-ban"></i> Cancelar
						</a>
						<div id="div_esperar"></div>
					</div>

				</div>
			</form>
		</div>
	</div>
</div>

<script>
    $(document).ready(function(){
    	
		$('#btn_guardar').on('click', function(){
			$('#div_esperar').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Espere por favor...')
		});

	});
</script>