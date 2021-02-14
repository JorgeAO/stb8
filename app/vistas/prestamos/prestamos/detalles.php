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
                        <td class="text-right"><?=$arrDatos['datos']['prestamo'][0]['pres_frecuencia2']?></td>
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
        <div class="text-center">
            <h5>Cuotas</h5>
        </div>
        <hr>
        <div class="">
            <div class="row col-sm-12 text-center">
                <table id="tbl_cuotas" class="table table-hover table-bordered table-striped table-sm texto-12" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th class="text-center" scope="col">Cuotas</th>
                        <th class="text-center" scope="col">Fecha</th>
                        <th class="text-center" scope="col">Valor</th>
                        <th class="text-center" scope="col">Fecha Pago</th>
                        <th class="text-center" scope="col">Valor Pago</th>
                        <th class="text-center" scope="col">Estado</th>
                        <th class="text-center" scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?
                        for ($i = 0; $i < count($arrDatos['datos']['cuotas']); $i++) {
                    ?>
                        <tr>
                            <td><?= $arrDatos['datos']['cuotas'][$i]['prcu_codigo'] ?></td>
                            <td><?= $arrDatos['datos']['cuotas'][$i]['prcu_fecha'] ?></td>
                            <td class="text-right">$<?= number_format($arrDatos['datos']['cuotas'][$i]['prcu_vlr_saldo'], 0) ?></td>
                            <td><?= $arrDatos['datos']['cuotas'][$i]['prcu_fecha_pago'] ?></td>
                            <td class="text-right">$<?= number_format($arrDatos['datos']['cuotas'][$i]['prcu_valor_pago'], 0) ?></td>
                            <td><?= $arrDatos['datos']['cuotas'][$i]['esta_descripcion'] ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-secondary btn-sm texto-12" id="btn_int_calcular" title="Registrar Pago" 
                                    onclick="registrarPago(<?= $arrDatos['datos']['cuotas'][$i]['prcu_codigo'] ?>, '$<?= number_format($arrDatos['datos']['cuotas'][$i]['prcu_vlr_saldo'], 0) ?>', '$<?= number_format($arrDatos['datos']['prestamo'][0]['pres_vlr_saldo'], 0) ?>')">
                                    <i class="fa fa-usd"></i>
                                </button>
                            </td>
                        </tr>
                    <? }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div>
            <a class="btn btn-sm btn-danger" href="index.php?p=perfiles/index" title="Cancelar">
                <i class="fa fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>

</div>

<div class="modal" id="mdl_pago" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Pagar cuota</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group col-sm-12">
							<label class="font-weight-bold">Cuota:</label>
							<p id="pc_prcu_codigo"></p>
						</div>
						<div class="form-group col-sm-12">
							<label class="font-weight-bold">Valor de la Cuota:</label>
							<p id="pc_prcu_valor"></p>
						</div>
						<div class="form-group col-sm-12">
							<label class="font-weight-bold">Saldo de la Deuda:</label>
							<p id="pc_pres_vlr_saldo">$<?=number_format($arrDatos['datos']['prestamo'][0]['pres_vlr_saldo'], 0)?></p>
						</div>
					</div>
					<div class="row col-sm-9">
						<div class="form-group col-sm-4">
							<label>Fecha</label>
							<input type="text" class="form-control form-control-sm validar" name="pc_pago_fecha" id="pc_pago_fecha" data-tipo="direccion" data-req="true" placeholder="Fecha" readonly="true">
							<label id="hlp_pc_pago_fecha" class="texto-error"></label>
						</div>
						<div class="form-group col-sm-4">
							<label>Pago</label>
							<select class="form-control form-control-sm texto-12 intCalcular validar enviar" name="pc_tipo_pago" id="pc_tipo_pago" data-req="true">
								<option value="C">Cuota</option>
								<option value="D">Valor diferente</option>
								<option value="T">Todo</option>
								<option value="N">No paga</option>
							</select>
						</div>
						<div class="form-group col-sm-4">
							<label>Valor a pagar</label>
							<input type="text" class="form-control form-control-sm validar" name="pc_vlr_pago" id="pc_vlr_pago" data-tipo="numeros" data-req="true" placeholder="Valor a pagar" readonly="true">
							<label id="hlp_pc_vlr_pago" class="texto-error"></label>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div id="div_mensaje" class="pull-left"></div>
				<button class="btn btn-secondary btn-sm texto-12" id="btn_aceptar"><i class="fa fa-check"></i> Aceptar</button>
        		<button type="button" class="btn btn-danger btn-sm texto-12" data-dismiss="modal"><i class="fa fa-ban"></i> Cancelar</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
        
        $('#pc_pago_fecha').datepicker({
			format: "yyyy-mm-dd",
			todayBtn: "linked",
			language: "es"
		});


        $('#pc_tipo_pago').on('change', function(){
            $('#pc_vlr_pago').val('');
            if ($('#pc_tipo_pago').val() == 'D')
                $('#pc_vlr_pago').attr('readonly', false);
            else
                $('#pc_vlr_pago').attr('readonly', true)
        });

        $('#btn_aceptar').on('click', function(){
			let valido = true;

			valido = validarCampo('pc_pago_fecha');

			if (valido == true)
			{
				if ($('#pc_tipo_pago').val() == 'D')
					valido = validarCampo('pc_vlr_pago');
			}

			if (valido == true)
			{
				$('#btn_aceptar').attr("disabled", true);
				$('#div_mensaje').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Procesando pago, un momento por favor');

				enviarPeticion(
					'prestamos/pago',
					{
						'cuota':$('#pc_prcu_codigo')[0].innerText,
						'vlr_cuota':$('#pc_prcu_valor')[0].innerText,
						'saldo':$('#pc_pres_vlr_saldo')[0].innerText,
						'fecha':$('#pc_pago_fecha').val(),
						'tipo':$('#pc_tipo_pago').val(),
						'valor':$('#pc_vlr_pago').val(),
					}, 
					function(rta){
						alert(rta.mensaje);

						$('#div_mensaje').html('');
						$('#btn_aceptar').attr("disabled", false);
						
						if (rta.tipo == 'exito')
							location.reload();
					}
				);
			}
		});
        
	});

	function registrarPago(cod, vlrCuota, vlrSaldo)
	{
		$('#pc_prcu_codigo').html(cod);
		$('#pc_prcu_valor').html(vlrCuota);
		$('#pc_pres_vlr_saldo').html(vlrSaldo);
		$('#mdl_pago').modal('show');
	}
</script>