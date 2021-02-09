<?php require ruta_vista.'seguridad/seguridad/Menu.php'; ?>

<div class="container">
	<div class="row m-3">
		<div class="col-sm-12">
			<div class="text-center">
				<h5>Tipos de Identificación</h5>
			</div>
			<hr>

			<div class="card-body">
				<div class="form-group">
					<a class="btn btn-sm btn-secondary" href="index.php?p=tiposId/nuevo" title="Nuevo registro">
						<i class="fa fa-plus"></i> Agregar
					</a>
					<a class="btn btn-sm btn-secondary" href="index.php?p=tiposId/index" title="Consultar">
						<i class="fa fa-search"></i> Consultar
					</a>
				</div>
				<table id="tbl_resultados" class="table table-hover table-bordered table-striped table-sm texto-12" width="100%" cellspacing="0">
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
							<td><?= $arrDatos['datos']['modelo'][$i]['tiid_codigo'] ?></td>
							<td><?= $arrDatos['datos']['modelo'][$i]['tiid_descripcion'] ?></td>
							<td><?= $arrDatos['datos']['modelo'][$i]['esta_descripcion'] ?></td>
							<td class="text-center">
								<a 
									class="btn btn-sm btn-secondary" 
									href="index.php?p=tiposId/editar/<?= $arrDatos['datos']['modelo'][$i]['tiid_codigo'] ?>" 
									title="Editar registro"
								>
									<i class="fa fa-edit"></i> Editar
								</a>
								<a 
									class="btn btn-sm btn-danger" 
									href="index.php?p=tiposId/eliminar/<?= $arrDatos['datos']['modelo'][$i]['tiid_codigo'] ?>" 
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
			</div>
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