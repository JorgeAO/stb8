<?php require ruta_vista.'seguridad/seguridad/Menu.php'; ?>

<div class="container">
	<div class="row m-3">
		<div class="col-sm-12">
			<div class="text-center">
				<h5>Préstamos</h5>
			</div>
			<hr>

			<div class="form-group">
				<a class="btn btn-sm btn-secondary" href="index.php?p=prestamos/nuevo" title="Nuevo registro">
					<i class="fa fa-plus"></i> Agregar
				</a>
				<a class="btn btn-sm btn-secondary" href="index.php?p=prestamos/index" title="Consultar">
					<i class="fa fa-search"></i> Consultar
				</a>
			</div>

			<table id="tbl_resultados" class="table table-hover table-bordered table-striped table-sm texto-12" width="100%" cellspacing="0">
				<thead>
					<tr>
					<th class="text-center" scope="col">Código</th>
					<th class="text-center" scope="col">Cliente</th>
					<th class="text-center" scope="col">Fecha</th>
					<th class="text-center" scope="col">Plazo (meses)</th>
					<th class="text-center" scope="col">Valor</th>
					<th class="text-center" scope="col">Porc. Interés</th>
					<th class="text-center" scope="col">Vlr. Interés</th>
					<th class="text-center" scope="col">Estado</th>
					<th class="text-center" scope="col">Opciones</th>
					</tr>
				</thead>
				<tbody>
				<?
					for ($i = 0; $i < count($arrDatos['datos']['modelo']); $i++) {
				?>
					<tr>
						<td><?= $arrDatos['datos']['modelo'][$i]['pres_codigo'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['clie_nombre'].' '.$arrDatos['datos']['modelo'][$i]['clie_apellido'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['pres_fecha'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['pres_plazo'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['pres_vlr_monto'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['pres_interes'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['pres_int_total'] ?></td>
						<td><?= $arrDatos['datos']['modelo'][$i]['esta_descripcion'] ?></td>
						<td class="text-center">
							<a 
								class="btn btn-sm btn-secondary" 
								href="index.php?p=prestamo/editar/<?= $arrDatos['datos']['modelo'][$i]['pres_codigo'] ?>" 
								title="Editar registro"
							>
								<i class="fa fa-edit"></i>
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