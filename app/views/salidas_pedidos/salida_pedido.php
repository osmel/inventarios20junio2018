<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>
<?php 
   $coleccion_id_operaciones= json_decode($this->session->userdata('coleccion_id_operaciones')); 
   if ( (count($coleccion_id_operaciones)==0) || (!($coleccion_id_operaciones)) ) {
        $coleccion_id_operaciones = array();
   }   

 	if (!isset($retorno)) {
      	$retorno ="";
    }

  $fecha_hoy = date('j-m-Y');
     $id_almacen=$this->session->userdata('id_almacen');

	$config_almacen = $this->session->userdata( 'config_almacen' );
	$el_perfil = $this->session->userdata( 'id_perfil' );

	if ($val_proveedor) {

		$consecutivo_actual = (( ($val_proveedor->id_tipo_pedido == 1) && ($val_proveedor->id_tipo_factura==1) ) ? $consecutivo->conse_factura : $consecutivo->conse_remision );
		$consecutivo_actual = ( ($val_proveedor->id_tipo_pedido==2) ? $consecutivo->conse_surtido : $consecutivo_actual);
	} else {
		$consecutivo_actual = $consecutivo->conse_factura;
	}	

?>	

<input type="hidden" id="conse_factura" name="conse_factura" value="<?php echo $consecutivo->conse_factura+1; ?>">
<input type="hidden" id="conse_remision" name="conse_remision" value="<?php echo $consecutivo->conse_remision+1; ?>">
<input type="hidden" id="conse_surtido" name="conse_surtido" value="<?php echo $consecutivo->conse_surtido+1; ?>">

<div class="container margenes">
<div class="panel panel-primary">
<div class="panel-heading">Generar Pedidos</div>
<div class="panel-body">				
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-2">
		<fieldset disabled>
		<div class="form-group">
			<label for="fecha">Fecha</label>
			<div>
				<input value="<?php echo $fecha_hoy; ?>"  type="text" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
			</div>
		</div>
		</fieldset>	
	</div>
	<div class="col-xs-12 col-sm-6 col-md-2">
		<fieldset disabled>
			<div class="form-group">
				<label for="movimiento">No. Movimiento</label>
				<div>
					<input type="text" value="<?php echo $consecutivo_actual+1; ?>" class="form-control" id="movimiento" name="movimiento" placeholder="No. Movimiento">
				</div>
			</div>
		</fieldset>			
	</div>



		   <div class="col-xs-12 col-sm-6 col-md-3" <?php echo 'style="display:'.( (($config_almacen->activo==0) ) ? 'none':'block').'"'; ?> >

				<input type="hidden" id="mi_perfil" name="mi_perfil" value="<?php echo $this->session->userdata( 'id_perfil' ); ?>">

					
					    <div class="form-group">
							<label for="id_almacen_generar_pedido">Almacén</label>
							<div >
							    <!--Los administradores o con permisos de entrada 
							    							****2121 sistema.js por ajax deshabilita sino hay en la regilla 
							    	que no sean almacenista 
							    	ENTONCES lista editable -->
							    <?php if (( ( $this->session->userdata( 'id_perfil' ) == 1  ) || (in_array(4, $coleccion_id_operaciones)) )  && (( $this->session->userdata( 'id_perfil' ) != 2 ) ) ){ ?>
									 <fieldset class="disabled_almacen">				
								<?php } else { ?>	
									 <fieldset class="disabled_almacen" disabled>
								<?php } ?>	
											<select name="id_almacen_generar_pedido" id="id_almacen_generar_pedido" class="form-control">
												<!--<option value="0">Selecciona una opción</option>-->
													<option value="0">Todos</option>
													<?php foreach ( $almacenes as $almacen ){ ?>
															<?php 
															   
																
																if  (($almacen->id_almacen==$id_almacen) )
																 {$seleccionado='selected';} else {$seleccionado='';}

																
															?>
																<option value="<?php echo $almacen->id_almacen; ?>" <?php echo $seleccionado; ?> ><?php echo $almacen->almacen; ?></option>
													<?php } ?>
												<!--rol de usuario -->
											</select>
								    </fieldset>

							</div>
						</div>	
					

		   </div>	






	<!--Tipos de pedidos -->
				<div class="col-xs-12 col-sm-6 col-md-2">
					    
							<label for="id_tipo_pedido" class="col-sm-3 col-md-12">Tipo de pedido</label>
							<div class="col-sm-9 col-md-12">
							    <!--Los administradores o con permisos de entrada 
							    	Y que no este inhabilitado y 
							    	que no sean pedidoista 
							    	ENTONCES lista editable -->

								<?php if ($val_proveedor) { ?>
									<fieldset class="disabledme" disabled>							
								<?php } else { ?>
									<fieldset class="disabledme">						
								<?php } ?>

											<select name="id_tipo_pedido" id="id_tipo_pedido"  pantalla="generar_pedidos"class="form-control">
												<!--<option value="0">Selecciona una opción</option>-->
													<?php foreach ( $pedidos as $pedido ){ ?>
															<?php 
																if ($val_proveedor) { //comprobar una vez que ya esten inhabilitados pedido
																	 if ($pedido->id==$val_proveedor->id_tipo_pedido) {
																			$seleccionado='selected';
																		} else {
																			$seleccionado='';
																		}
																}
															?>
																<option value="<?php echo $pedido->id; ?>" <?php echo $seleccionado; ?> ><?php echo $pedido->tipo_pedido; ?></option>
													<?php } ?>
												<!--rol de usuario -->
											</select>
								    </fieldset>

							</div>
					</div>		



					

					<?php
					$mostrando ="display:block";
					 if (($val_proveedor) && ($val_proveedor->id_tipo_pedido==2)) { 

								$mostrando ="display:none";
							}
						?>



					<!--Tipos de factura -->
					<div class="col-xs-12 col-sm-6 col-md-2 tipo_factura" style="<?php echo $mostrando; ?>";>
					    
							<label for="id_tipo_factura" class="col-sm-3 col-md-12">Tipo de factura</label>
							<div class="col-sm-9 col-md-12">
							    <!--Los administradores o con permisos de entrada 
							    	Y que no este inhabilitado y 
							    	que no sean facturaista 
							    	ENTONCES lista editable -->

								<?php if ($val_proveedor) { ?>
									<fieldset class="disabledme" disabled>							
								<?php } else { ?>
									<fieldset class="disabledme">						
								<?php } ?>

											<select name="id_tipo_factura" id="id_tipo_factura" pantalla="generar_pedidos" class="form-control">
												<!--<option value="0">Selecciona una opción</option>-->
													<?php foreach ( $facturas as $factura ){ ?>
															<?php 
																if ($val_proveedor) { //comprobar una vez que ya esten inhabilitados factura
																	 if ($factura->id==$val_proveedor->id_tipo_factura) {
																			$seleccionado='selected';
																		} else {
																			$seleccionado='';
																		}
																}
															?>
																<option value="<?php echo $factura->id; ?>" <?php echo $seleccionado; ?> ><?php echo $factura->tipo_factura; ?></option>
													<?php } ?>
												<!--rol de usuario -->
											</select>
								    </fieldset>

							</div>
					</div>		



					<div class="col-xs-12 col-sm-6 col-md-4" >
						<?php if ($val_proveedor) { ?>
						<fieldset class="disabledme" disabled>							
						<?php } else { ?>
						<fieldset class="disabledme">						
						<?php } ?>
							<div class="form-group">
								<label for="descripcion">Cliente</label>
								<div class="input-group col-xs-12 col-sm-12 col-md-12 ">
									<?php if ($val_proveedor) { ?>
									<input identificador="" value="<?php echo $val_proveedor->nombre; ?>" type="text" name="editar_proveedor" idproveedor="3" class="buscar_proveedor form-control typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Buscar Cliente...">
									<?php } else { ?>
									<input  identificador="" type="text" name="editar_proveedor" idproveedor="3" class="buscar_proveedor form-control typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Buscar Cliente...">
									<?php } ?>
								</div>
							</div>
						</fieldset>	
					</div>



	
</div>

<div class="row">					
	<div class="container">	


<!--  -->	<h4>Filtros: </h4>	 




				<div class="row">
		                  <div class="col-xs-12 col-sm-6 col-md-3">
		                     <div class="form-group">
								<label for="descripcion" class="col-sm-12 col-md-12">Producto</label>
			                          <select class="form-control" name="producto_pedido" id="producto_pedido" dependencia="composicion_pedido" nombre="una composición"  style="font-size:12px;">

			                            <option value="">Seleccione un producto</option>
			                            <?php if($productos){ ?>
			                              <?php foreach($productos as $producto){ ?>
			                                <option value="<?php echo htmlspecialchars($producto->descripcion); ?>"><?php echo htmlspecialchars($producto->descripcion); ?></option>
			                              <?php } ?>
			                            <?php } ?>
			                          </select>
		                     </div>
		                  </div>


		                  <div class="col-xs-12 col-sm-6 col-md-3">
		                     <div class="form-group">
								<label for="descripcion" class="col-sm-12 col-md-12">Composición</label>
			                          <select class="form-control ttip" title="Campo dependiente. Primero seleccione un PRODUCTO." name="composicion_pedido" id="composicion_pedido" dependencia="ancho_pedido" nombre="un ancho" style="padding-right:0px;font-size:12px;">
			                            <option value="0">Seleccione una composición</option>
			                          </select>
		                     </div>
		                  </div>		                  


		                  <div class="col-xs-12 col-sm-4 col-md-2">
		                     <div class="form-group">
								<label for="descripcion" class="col-sm-12 col-md-12">Ancho</label>
			                          <select class="form-control ttip" title="Campo dependiente. Primero seleccione una COMPOSICIÓN." name="ancho_pedido" id="ancho_pedido"  dependencia="color_pedido" nombre="un color" style="padding-right:0px; font-size:12px;">
			                            <option value="0">Seleccione un ancho</option>
			                          </select>
		                     </div>
		                  </div>


		                  
		                  <div class="col-xs-12 col-sm-4 col-md-2">
		                     <div class="form-group">
								<label for="descripcion" class="col-sm-12 col-md-12">Color</label>
			                          <select class="form-control ttip" title="Campo dependiente. Primero seleccione un ANCHO." name="color_pedido" id="color_pedido"  dependencia="proveedor_pedido" nombre="un proveedor" style="padding-right:0px; font-size:12px;">
			                            <option value="0">Seleccione un color</option>
			                          </select>
		                     </div>
		                  </div>
		                  
		                  




		                  <div class="col-xs-12 col-sm-4 col-md-2">
		                     <div class="form-group">
								<label for="descripcioon" class="col-sm-12 col-md-12">Proveedor</label>
			                          <select class="form-control ttip" title="Campo dependiente. Primero seleccione un COLOR." name="proveedor_pedido" id="proveedor_pedido" dependencia="" nombre="" style="padding-right:0px; font-size:10px;">
			                            <option value="0">Seleccione un proveedor</option>
			                          </select>
		                     </div>
		                  </div>

		        </div>    

		    <div class="row">
		    	<div class="col-md-12">
					<button id="limpiar_filtro" type="button" class="btn btn-success">
						Limpiar filtros
					</button>
				</div> 
			</div> 


<!--  -->	
		<div class="table-responsive">

		<div class="notif-bot-pedidos"></div>
		<section>


		<div class="col-xs-12 col-sm-6 col-md-2" style="display:none;">
			<label for="descripcioon" class="col-sm-12 col-md-12">Filtro de Factura</label>
			<select name="id_factura_filtro" id="id_factura_filtro" class="form-control">
					<option value="0">Todos</option> 
					<?php foreach ( $facturas as $factura ){ ?>
								<option value="<?php echo $factura->id; ?>"><?php echo $factura->tipo_factura; ?></option>
					<?php } ?>
			</select>
		</div>				
		<br/>		








			<table id="pedido_entrada" class="display table table-striped table-bordered table-responsive" cellspacing="0" width="100%">

			<thead>

				<tr>
					<th style="width:20%;">Código</th>
					<th style="width:10%;">Producto</th>
					<th style="width:10%;">Imagen</th>
					<th style="width:10%;">Color</th>
					<th style="width:5%;">Cantidad</th>
					<th style="width:5%;">Ancho</th>
					<th style="width:5%;">Num. Mov.</th>			
					<th style="width:10%;">Proveedor</th>
					<th style="width:5%;">Lote</th>
					<th style="width:5%;">No. de Partida</th>
					<th style="width:10%;">Agregar</th>
					<th style="width:5%;">Almacén</th>


				</tr>
			</thead>
			</table>
		</section>
		</div>			
	</div>
</div>

				<br/>
		
				<div class="row bloque_totales">						
					<div class="col-sm-0 col-md-4">	
					  
					</div>	
					<div class="col-sm-3 col-md-2">	
					  <b>Existencias por Página</b>
					</div>	

					<div class="col-sm-3 col-md-2">	
						<span id="pieza"></span>			
					</div>	
					<div class="col-sm-3 col-md-2">	
						<span id="metro"></span>			
					</div>	
					<div class="col-sm-3 col-md-2">	
						<span id="kg" ></span>				
					</div>	
				</div>			

				<div class="row bloque_totales">		
					<div class="col-sm-0 col-md-4">	
					  
					</div>	
					<div class="col-sm-3 col-md-2">	
					  <b>Existencias Totales</b>			
					</div>									
					<div class="col-sm-3 col-md-2">	
						<span id="total_pieza"></span>			
					</div>	
					<div class="col-sm-3 col-md-2">	
						<span id="total_metro"></span>			
					</div>	
					<div class="col-sm-3 col-md-2">	
						<span id="total_kg" ></span>				
					</div>	
				</div>



<div class="row">					
	<div class="col-md-12">		
		
		<h4>Productos del Pedido</h4>	
		<hr style="padding: 0px; margin: 15px;"/>					
		<div class="table-responsive">
			<section>
				<table id="pedido_salida" class="display table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
					<thead>
						<tr>

							<th style="width:20%;">Código</th>
							<th style="width:10%;">Producto</th>
							<th style="width:10%;">Imagen</th>
							<th style="width:10%;">Color</th>
							<th style="width:5%;">Cantidad</th>
							<th style="width:5%;">Ancho</th>
							<th style="width:5%;">Num. Mov.</th>			
							<th style="width:10%;">Proveedor</th>
							<th style="width:5%;">Lote</th>
							<th style="width:5%;">No. de Partida</th>
							<th style="width:10%;">Quitar</th>
							<th style="width:5%;">Almacén</th>						

							
						</tr>
					</thead>
				</table>
			</section>
		</div>
	</div>
</div>


				<br/>
		
				<div class="row bloque_totales">						
					<div class="col-sm-0 col-md-4">	
					  
					</div>	
					<div class="col-sm-3 col-md-2">	
					  <b>Existencias por Página</b>
					</div>	

					<div class="col-sm-3 col-md-2">	
						<span id="pieza2"></span>			
					</div>	
					<div class="col-sm-3 col-md-2">	
						<span id="metro2"></span>			
					</div>	
					<div class="col-sm-3 col-md-2">	
						<span id="kg2" ></span>				
					</div>	
				</div>			

				<div class="row bloque_totales">		
					<div class="col-sm-0 col-md-4">	
					  
					</div>	
					<div class="col-sm-3 col-md-2">	
					  <b>Existencias Totales</b>			
					</div>									
					<div class="col-sm-3 col-md-2">	
						<span id="total_pieza2"></span>			
					</div>	
					<div class="col-sm-3 col-md-2">	
						<span id="total_metro2"></span>			
					</div>	
					<div class="col-sm-3 col-md-2">	
						<span id="total_kg2" ></span>				
					</div>	
				</div>


<br>

	<div class="row">
		<div class="col-sm-4 col-md-4">
		</div>
		<div class="col-sm-4 col-md-4 marginbuttom">
			<a href="<?php echo base_url(); ?>" type="button" class="btn btn-danger btn-block">Regresar</a>
		</div>

			<div class="col-sm-4 col-md-4">
				<button id="conf_pedido" type="button" class="btn btn-success btn-block">
					Confirmación de pedidos
				</button>
			</div>

	</div>

</div>
</div>
</div>

<div class="modal fade bs-example-modal-lg" id="myModaldashboard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:300px; !important; margin-top:50px !important">
        <div class="modal-content" style="width:100% !important;"></div>
    </div>
</div>	

<?php $this->load->view( 'footer' ); ?>