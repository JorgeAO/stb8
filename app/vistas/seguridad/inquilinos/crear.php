<?php require ruta_vista.'seguridad/seguridad/Menu.php'; ?>

	<div class="row m-3">
		<div class="col-sm-10  offset-sm-1">
			<form id="frm_login" action="index.php?p=inquilinos/guardar" method="POST">
				<div class="text-center">
					<h5>Agregar Inquilino</h5>
				</div>
				<hr>
				
				<div>
					<div class="row col-sm-12">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control form-control-sm" id="inqu_nombre" name="inqu_nombre" required="true">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Apellido</label>
                                <input type="text" class="form-control form-control-sm" id="inqu_apellido" name="inqu_apellido" required="true">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="text" class="form-control form-control-sm" id="inqu_celular" name="inqu_celular" required="true">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Correo</label>
                                <input type="text" class="form-control form-control-sm" id="inqu_correo" name="inqu_correo" required="true">
                            </div>
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