<?php

include_once ruta_control.'CtrlPermisos.php';
$ctrlPermisos = new CtrlPermisos();
$strMenu = $ctrlPermisos->menu();

?>

<meta name="viewport" content="width=device-width, user-scalable=no">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="navbar-brand"><?= nombre_app ?></div>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav mr-auto">
			<?= $strMenu ?>
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item dropdown dropleft">
				<a class="nav-link dropdown-toggle" href="#" id="mod_user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					​<picture>
						<img src="/apps/stb8/recursos/imagenes/avatar2.png" class="rounded-circle" title="<?=$_SESSION['usuario']['usua_nombre']?>" width="30">
					</picture>
				</a>
				<div class="dropdown-menu" aria-labelledby="mod_user">
					<div class="col-sm-12">
						<p class="texto-12"><?=$_SESSION['usuario']['usua_nombre']?></p>
						<p class="texto-12"><?=$_SESSION['usuario']['perf_descripcion']?></p>
						<p>
						<a class="btn btn-sm btn-danger" href="index.php?p=usuarios/salir" title="Cerrar Sesión">
							<i class="fa fa-sign-out"></i> Salir
						</a>
						</p>
					</div>
				</div>
			</li>
		</ul>
	</div>
</nav>