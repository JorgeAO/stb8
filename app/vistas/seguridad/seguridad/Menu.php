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
		<ul class="navbar-nav">
			<?= $strMenu ?>
		</ul>
	</div>
</nav>