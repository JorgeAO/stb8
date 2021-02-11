<?php 

require ruta_control.'CtrlPerfiles.php';
require ruta_vista.'seguridad/seguridad/Menu.php'; 

$ctrlPerfiles = new CtrlPerfiles();
$arrPerfiles = $ctrlPerfiles->listar();

?>

	<div class="row m-3">
		<div class="col-sm-10 offset-sm-1">
			<form id="frm_" action="index.php?p=permisos/insertar" method="POST">
				<div class="text-center">
					<h5>Permisos</h5>
				</div>

				<div class="card-body row">
					<div class="form-group col-sm-4">
						<div class="form-group">
							<label>Perfil</label>
							<select class="form-control form-control-sm" id="fk_seg_perfiles" name="fk_seg_perfiles" required="true">
								<?php
									foreach ($arrPerfiles as $perfil)
									echo '<option value="'.$perfil['perf_codigo'].'">'.$perfil['perf_descripcion'].'</option>';
									?>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" id="btn_guardar" class="btn btn-sm btn-secondary" title="Guardar Registro">
								<i class="fa fa-floppy-o"></i> Guardar
							</button>
							<div id="div_esperar"></div>
						</div>
					</div>
				
					<div class="form-group col-sm-8">
						<table class="table table-sm table-bordered table-striped">
							<thead>
								<tr>
									<th scope="col">Código</th>
									<th scope="col">Opción</th>
									<th scope="col">Crear</th>
									<th scope="col">Consultar</th>
									<th scope="col">Editar</th>
									<th scope="col">Eliminar</th>
									<th scope="col">Listar</th>
								</tr>
							</thead>
							<tbody id="tbl_permisos"></tbody>
						</table>
					</div>
				</div>
			</form>

			<?php 
			if (isset($arrDatos['datos']['mensaje']) && !empty($arrDatos['datos']['mensaje'])) { 
				$strTipo = $arrDatos['datos']['error'] ? 'danger' : 'success';
			?>
				<div class="alert alert-<?=$strTipo?>" role="alert">
					<?= $arrDatos['datos']['mensaje'] ?>
				</div>
			<?php } ?>
		</div>
	</div>

<script>
    $(document).ready(function(){
    	
		consultarPermisos();

    	$('#fk_seg_perfiles').on('change', function(){
			consultarPermisos();
    	});

		$('#btn_guardar').on('click', function(){
			$('#div_esperar').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Espere por favor...')
		});

	});
	
	function consultarPermisos()
	{
		enviarPeticion(
			'permisos/consultar', 
			{ 'fk_seg_perfiles':$('#fk_seg_perfiles').val() }, 
			function(rta){
				if (rta.error == true)
					alert(rta.mensaje);
				else
				{
					$('#tbl_permisos').html('');

					let permisos = '';
					
					$.each(rta.datos, function(i, val){
						permisos += '<tr>'+
							'<td>'+val.opci_codigo+'</td>'+
							'<td>'+val.opci_nombre+'</td>'+
							'<td>'+
							'<div class="form-check">'+
							'<input name="permisos['+val.opci_codigo+'][c]" class="form-check-input" type="checkbox" '+val.perm_c+'>'+
							'</div>'+
							'</td>'+
							'<td>'+
							'<div class="form-check">'+
							'<input name="permisos['+val.opci_codigo+'][r]" class="form-check-input" type="checkbox" '+val.perm_r+'>'+
							'</div>'+
							'</td>'+
							'<td>'+
							'<div class="form-check">'+
							'<input name="permisos['+val.opci_codigo+'][u]" class="form-check-input" type="checkbox" '+val.perm_u+'>'+
							'</div>'+
							'</td>'+
							'<td>'+
							'<div class="form-check">'+
							'<input name="permisos['+val.opci_codigo+'][d]" class="form-check-input" type="checkbox" '+val.perm_d+'>'+
							'</div>'+
							'</td>'+
							'<td>'+
							'<div class="form-check">'+
							'<input name="permisos['+val.opci_codigo+'][l]" class="form-check-input" type="checkbox" '+val.perm_l+'>'+
							'</div>'+
							'</td>'+
							'</tr>';

					});

					$('#tbl_permisos').append(permisos);
				}
			}
		);
	}
</script>