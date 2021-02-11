<?php 

require ruta_vista.'seguridad/seguridad/Menu.php';

?>

	<div class="row m-3">

		<div class="col-sm-4">
            <div class="text-center">
                <h5>Información del Préstamo</h5>
            </div>
            <hr>
            <div>
                <div class="row col-sm-12">
                    <table class="table table-sm texto-12">
                        <tr>
                            <th>Código</th>
                            <td class="text-right"><?=$arrDatos['datos']['prestamo'][0]['pres_codigo']?></td>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <td class="text-right"><?=$arrDatos['datos']['prestamo'][0]['pres_fecha']?></td>
                        </tr>
                        <tr>
                            <th>Monto</th>
                            <td class="text-right">$<?=number_format($arrDatos['datos']['prestamo'][0]['pres_vlr_monto'], 0)?></td>
                        </tr>
                        <tr>
                            <th>Plazo (en meses)</th>
                            <td class="text-right"><?=$arrDatos['datos']['prestamo'][0]['pres_plazo']?></td>
                        </tr>
                        <tr>
                            <th>Frecuencia de Pago</th>
                            <td class="text-right"><?=$arrDatos['datos']['prestamo'][0]['pres_frecuencia']?></td>
                        </tr>
                        <tr>
                            <th>Porc. Interes</th>
                            <td class="text-right"><?=$arrDatos['datos']['prestamo'][0]['pres_interes']?></td>
                        </tr>
                        <tr>
                            <th>Total Intereses</th>
                            <td class="text-right">$<?=number_format($arrDatos['datos']['prestamo'][0]['pres_int_total'], 0)?></td>
                        </tr>
                        <tr>
                            <th>Total a Pagar</th>
                            <td class="text-right">$<?=number_format($arrDatos['datos']['prestamo'][0]['pres_vlr_pago'], 0)?></td>
                        </tr>
                        <tr>
                            <th>Saldo Pendiente</th>
                            <td class="text-right">$<?=number_format($arrDatos['datos']['prestamo'][0]['pres_vlr_saldo'], 0)?></td>
                        </tr>
                        <tr>
                            <th>Estado del préstamo</th>
                            <td class="text-right"><?=$arrDatos['datos']['prestamo'][0]['esta_descripcion']?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

		<div class="col-sm-4">
            <div class="text-center">
                <h5>Información del Cliente</h5>
            </div>
            <hr>
            <div>
                <div class="row col-sm-12">
                    <table class="table table-sm texto-12">
                        <tr>
                            <th>Nombre</th>
                            <td class="text-right"><?=$arrDatos['datos']['prestamo'][0]['clie_nombre']?></td>
                        </tr>
                        <tr>
                            <th>Apellido</th>
                            <td class="text-right"><?=$arrDatos['datos']['prestamo'][0]['clie_apellido']?></td>
                        </tr>
                        <tr>
                            <th>Correo</th>
                            <td class="text-right"><?=$arrDatos['datos']['prestamo'][0]['pres_vlr_monto']?></td>
                        </tr>
                        <tr>
                            <th>Celular</th>
                            <td class="text-right"><?=$arrDatos['datos']['prestamo'][0]['pres_plazo']?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

		<div class="col-sm-4">
            <div class="text-center">
                <h5>Participación</h5>
            </div>
            <hr>
            <div>
                <div class="row col-sm-12">
                    <table id="tbl_participacion" class="table table-hover table-bordered table-striped table-sm texto-12" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Nombre</th>
                                <th class="text-center" scope="col">Apellido</th>
                                <th class="text-center" scope="col">Porcentaje</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?
                            for ($i = 0; $i < count($arrDatos['datos']['participacion']); $i++) {
                        ?>
                            <tr>
                                <td><?= $arrDatos['datos']['participacion'][$i]['inve_nombre'] ?></td>
                                <td><?= $arrDatos['datos']['participacion'][$i]['inve_apellido'] ?></td>
                                <td><?= $arrDatos['datos']['participacion'][$i]['prpa_porcentaje'] ?></td>
                            </tr>
                        <? }  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
		<div class="col-sm-12">

				<div>
					<button type="submit" class="btn btn-sm btn-secondary" title="Guardar Registro">
						<i class="fa fa-floppy-o"></i> Guardar
					</button>
					<a class="btn btn-sm btn-danger" href="index.php?p=perfiles/index" title="Cancelar">
						<i class="fa fa-ban"></i> Cancelar
					</a>
				</div>

			</form>
		</div>
	</div>