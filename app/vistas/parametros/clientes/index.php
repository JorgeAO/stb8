<?php require ruta_vista.'seguridad/seguridad/Menu.php'; ?>

<div class="container">
	<div class="row m-3">
		<div class="col-sm-12">
			<div class="text-center">
				<h5>Clientes</h5>
			</div>
			<hr>

			<div class="form-group">
				<a class="btn btn-sm btn-secondary" href="index.php?p=clientes/nuevo" title="Nuevo registro">
					<i class="fa fa-plus"></i> Agregar
				</a>
				<a class="btn btn-sm btn-secondary" href="index.php?p=clientes/index" title="Consultar">
					<i class="fa fa-search"></i> Consultar
				</a>
			</div>

			<table class="table table-sm table-borderless table-striped table-hover" id="tbl_resultados">
				<thead>
					<tr>
					<th class="text-center" scope="col">Código</th>
					<th class="text-center" scope="col">Tipo de Identificación</th>
					<th class="text-center" scope="col">Identificación</th>
					<th class="text-center" scope="col">Nombre</th>
					<th class="text-center" scope="col">Apellido</th>
					<th class="text-center" scope="col">Celular</th>
					<th class="text-center" scope="col">Estado</th>
					<th class="text-center" scope="col">Opciones</th>
					</tr>
				</thead>
				<tbody>
				<?
					for ($i = 0; $i < count($arrDatos['datos']['modelo']); $i++) {
				?>
					<tr>
						<td><?= $arrDatos['datos']['modelo'][$i]['clie_codigo'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['tiid_descripcion'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['clie_identificacion'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['clie_nombre'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['clie_apellido'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['clie_celular'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['esta_descripcion'] ?></td>
						<td class="text-center">
							<a 
								class="btn btn-sm btn-secondary" 
								href="index.php?p=clientes/editar/<?= $arrDatos['datos']['modelo'][$i]['clie_codigo'] ?>" 
								title="Editar registro"
							>
								<i class="fa fa-edit"></i> Editar
							</a>
							<a 
								class="btn btn-sm btn-danger" 
								href="index.php?p=clientes/eliminar/<?= $arrDatos['datos']['modelo'][$i]['clie_codigo'] ?>" 
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