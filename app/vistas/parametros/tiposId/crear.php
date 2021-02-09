<?php require ruta_vista.'seguridad/seguridad/Menu.php'; ?>

<div class="container">
	<div class="row m-3">
		<div class="col-sm-12">
			<form id="frm_login" action="index.php?p=tiposId/guardar" method="POST">
				<div class="text-center">
					<h5>Agregar Tipo de Identificación</h5>
				</div>
				<hr>

				<div>
					<div class="row col-sm-12">
						<div class="form-group col-sm-12">
							<label>Descripción</label>
							<input type="text" class="form-control form-control-sm" id="tiid_descripcion" name="tiid_descripcion" required="true">
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

				<?php 
				if (isset($arrDatos['datos']['mensaje']) && !empty($arrDatos['datos']['mensaje'])) { 
					$strTipo = $arrDatos['datos']['error'] ? 'danger' : 'success';
				?>
					<div class="alert alert-<?=$strTipo?>" role="alert">
						<?= $arrDatos['datos']['mensaje'] ?>
					</div>
				<?php } ?>
			</form>
		</div>
	</div>
</div>