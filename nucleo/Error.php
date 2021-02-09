<div class="row" style="margin: 10px">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header text-white bg-danger">Error</div>
			<div class="card-body">
				<p><strong>Mensaje: </strong></p>
				<p><?= $arrDatos['datos']->getMessage(); ?></p>
				<br>
				<p><strong>Archivo: </strong></p>
				<p><?= explode('\\', $arrDatos['datos']->getFile())[count(explode('\\', $arrDatos['datos']->getFile()))-1]; ?></p>
				<br>
				<p><strong>Línea: </strong></p>
				<p><?= $arrDatos['datos']->getLine(); ?></p>
			</div>
		</div>
	</div>
</div>