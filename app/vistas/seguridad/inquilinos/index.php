<?php require ruta_vista.'seguridad/seguridad/Menu.php'; ?>

<div class="container">
	<div class="row m-3">
		<div class="col-sm-12">
			<div class="text-center">
				<h5>Inquilinos</h5>
			</div>
			<hr>
			
			<div class="form-group">
				<a class="btn btn-sm btn-secondary" href="index.php?p=inquilinos/nuevo" title="Nuevo registro">
					<i class="fa fa-plus"></i> Agregar
				</a>
				<a class="btn btn-sm btn-secondary" href="index.php?p=inquilinos/index" title="Consultar">
					<i class="fa fa-search"></i> Consultar
				</a>
			</div>

			<table id="tbl_resultados" class="table table-hover table-bordered table-striped table-sm texto-12" width="100%" cellspacing="0">
				<thead>
					<tr>
					<th class="text-center" scope="col">Código</th>
					<th class="text-center" scope="col">Nombre</th>
					<th class="text-center" scope="col">Apellido</th>
					<th class="text-center" scope="col">Celular</th>
					<th class="text-center" scope="col">Correo</th>
					<th class="text-center" scope="col">Base de Datos</th>
					<th class="text-center" scope="col">Estado</th>
					<th class="text-center" scope="col">Opciones</th>
					</tr>
				</thead>
				<tbody>
				<?
					for ($i = 0; $i < count($arrDatos['datos']['modelo']); $i++) {
				?>
					<tr>
						<td><?= $arrDatos['datos']['modelo'][$i]['inqu_codigo'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['inqu_nombre'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['inqu_apellido'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['inqu_celular'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['inqu_correo'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['inqu_base_datos'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['esta_descripcion'] ?></td>
						<td class="text-center">
							<a 
								class="btn btn-sm btn-secondary" 
								href="index.php?p=inquilinos/editar/<?= $arrDatos['datos']['modelo'][$i]['inqu_codigo'] ?>" 
								title="Editar registro"
							>
								<i class="fa fa-edit"></i> Editar
							</a>
							<a 
								class="btn btn-sm btn-danger" 
								href="index.php?p=inquilinos/eliminar/<?= $arrDatos['datos']['modelo'][$i]['inqu_codigo'] ?>" 
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
	</div>
</div>

<script>
    $(document).ready(function(){
        $('#tbl_resultados').DataTable({
            "language": { "url": ruta_tabla_esp }
        });
    });
</script>