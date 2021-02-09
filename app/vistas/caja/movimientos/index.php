<?php require ruta_vista.'seguridad/seguridad/Menu.php'; ?>

<div class="container">
	<div class="row m-3">
		<div class="col-sm-12">

			<div class="text-center">
				<h5>Movimientos</h5>
			</div>
			<hr>

			<div>
				<div class="form-group col-sm-12">
					<a class="btn btn-sm btn-secondary" href="index.php?p=movimientos/nuevo" title="Nuevo registro">
						<i class="fa fa-plus"></i> Agregar
					</a>
					<a class="btn btn-sm btn-secondary" href="index.php?p=movimientos/index" title="Consultar">
						<i class="fa fa-search"></i> Consultar
					</a>
				</div>

				<table id="tbl_resultados" class="table table-hover table-bordered table-striped table-sm texto-12" width="100%" cellspacing="0">
					<thead>
						<tr>
						<th class="text-center" scope="col">Código</th>
						<th class="text-center" scope="col">Inversionista</th>
						<th class="text-center" scope="col">Tipo de Movimiento</th>
						<th class="text-center" scope="col">Descripción</th>
						<th class="text-center" scope="col">Fecha</th>
						<th class="text-center" scope="col">Monto</th>
						</tr>
					</thead>
					<tbody>
					<?
						for ($i = 0; $i < count($arrDatos['datos']['modelo']); $i++) {
					?>
						<tr>
							<td><?= $arrDatos['datos']['modelo'][$i]['movi_codigo'] ?></td>
							<td><?= $arrDatos['datos']['modelo'][$i]['inve_nombre'].' '.$arrDatos['datos']['modelo'][$i]['inve_apellido']?></td>
							<td><?= $arrDatos['datos']['modelo'][$i]['movi_tipo_2'] ?></td>
							<td><?= $arrDatos['datos']['modelo'][$i]['movi_descripcion'] ?></td>
							<td><?= $arrDatos['datos']['modelo'][$i]['movi_fecha'] ?></td>
							<td><?= $arrDatos['datos']['modelo'][$i]['movi_monto'] ?></td>
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