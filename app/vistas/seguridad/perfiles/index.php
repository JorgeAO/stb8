<?php require ruta_vista.'seguridad/seguridad/Menu.php'; ?>

<div class="container">
	<div class="row m-3">
		<div class="col-sm-12">
			<div class="text-center">
				<h5>Perfiles</h5>
			</div>
			<hr>
			
			<div class="form-group">
				<a class="btn btn-sm btn-secondary" href="index.php?p=perfiles/nuevo" title="Nuevo registro">
					<i class="fa fa-plus"></i> Agregar
				</a>
				<a class="btn btn-sm btn-secondary" href="index.php?p=perfiles/index" title="Consultar">
					<i class="fa fa-search"></i> Consultar
				</a>
			</div>

			<table class="table table-sm table-borderless table-striped table-hover" id="tbl_resultados">
				<thead>
					<tr>
					<th class="text-center" scope="col">Código</th>
					<th class="text-center" scope="col">Descripción</th>
					<th class="text-center" scope="col">Estado</th>
					<th class="text-center" scope="col">Opciones</th>
					</tr>
				</thead>
				<tbody>
				<?
					for ($i = 0; $i < count($arrDatos['datos']['modelo']); $i++) {
				?>
					<tr>
						<td><?= $arrDatos['datos']['modelo'][$i]['perf_codigo'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['perf_descripcion'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['esta_descripcion'] ?></td>
						<td class="text-center">
							<a 
								class="btn btn-sm btn-secondary" 
								href="index.php?p=perfiles/editar/<?= $arrDatos['datos']['modelo'][$i]['perf_codigo'] ?>" 
								title="Editar registro"
							>
								<i class="fa fa-edit"></i> Editar
							</a>
							<a 
								class="btn btn-sm btn-danger" 
								href="index.php?p=perfiles/eliminar/<?= $arrDatos['datos']['modelo'][$i]['perf_codigo'] ?>" 
								onclick="return confirm('¿Está seguro que desea eliminar el registro?')" 
								title="Eliminar registro"
							>
								<i class="fa fa-trash-o"></i> Eliminar
							</a>
						</td>
					</tr>
				<? }  ?>
				</tbody>
			</table>

			<?php 
			if (isset($arrDatos['datos']['mensaje']) && !empty($arrDatos['datos']['mensaje'])) { 
				$strTipo = $arrDatos['datos']['error'] ? 'danger' : 'success';
			?>
				<div class="alert alert-<?=$strTipo?>" role="alert">
					<?= $arrDatos['datos']['mensaje'] ?>
				</div>
			<?php } ?>
			
		</div>

		<!--div class="col-sm-3">
			<div class="text-center m-3">
				<h5>¿Qué son los perfiles?</h5>
			</div>
			<hr>
			<div class="form-group">
				Son grupos de usuarios con permisos específicos
			</div>
		</div-->
	</div>
</div>

<script>
    $(document).ready(function(){
        $('#tbl_resultados').DataTable({
            "language": { "url": ruta_tabla_esp }
        });
    });
</script>