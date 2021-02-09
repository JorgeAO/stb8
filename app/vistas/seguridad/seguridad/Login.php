<div class="container">
	<div class="row m-3">
		<div class="col-sm-4 offset-sm-4">
			<form id="frm_login" action="index.php?p=usuarios/validar" method="POST">
				<div class="bg-transparent text-center">
					<h5>Iniciar Sesión</h5>
				</div>
				<hr>

				<div>
					<div class="col-sm-12">
						<div class="form-group">
							<label for="usua_mail">Usuario</label>
							<input type="email" class="form-control form-control-sm" id="usua_mail" name="usua_mail" require="true">
						</div>
						<div class="form-group">
							<label for="usua_clave">Password</label>
							<input type="password" class="form-control form-control-sm" id="usua_clave" name="usua_clave" require="true">
						</div>
					</div>
				</div>
			
				<div class="bg-transparent">
					<button type="submit" class="btn btn-sm btn-secondary btn-block">
						<i class="fa fa-sign-in"></i> Entrar
					</button>
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