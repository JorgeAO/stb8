<div class="row" style="margin: 10px">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header text-white bg-info">Debug</div>
			<div class="card-body">
				<p>
					<?php 
						//print_r($arrDatos['datos']);

						foreach ($arrDatos['datos'] as $key => $value) 
						{
							echo '<p><strong>'.ucfirst($key).':</strong></p>'; 
							echo '<pre>';
							print_r($value);
							echo '</pre>';
							echo '<hr>';
						}
					?>
				</p>
			</div>
		</div>
	</div>
</div>