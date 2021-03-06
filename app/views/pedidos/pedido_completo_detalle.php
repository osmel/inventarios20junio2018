<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view( 'header' ); ?>
<div class="container margenes">

	<input type="hidden" id="id_tipo_pedido" name="id_tipo_pedido" value="<?php echo $id_tipo_pedido; ?>">		
	<input type="hidden" id="id_tipo_factura" name="id_tipo_factura" value="<?php echo $id_tipo_factura; ?>">		


		<input type="hidden" id="id_almacen_pedido" name="id_almacen_pedido" value="<?php echo $id_almacen; ?>">		


		<div class="panel panel-primary">
			<div class="panel-heading">Detalles de pedido &nbsp;&nbsp;&nbsp;<?php echo "<b>ALM:</b> ". $almacen; ?><span></span></div>
			<div class="panel-body">
				
						<input type="hidden" id="consecutivo_venta" value="<?php echo $consecutivo_venta ; ?>">		

					<div class="row">
						<div class="col-sm-4 col-md-5">
							<div class="form-group">
								<label for="label_vendedor" id="label_vendedor" class="col-sm-12 col-md-12">Cliente/Núm. Pedido</label>
									<input type="text" disabled class="form-control" id="etiq_num_mov" name="etiq_num_mov" placeholder="">
							</div>
						</div>		

						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label for="label_cliente" id="label_cliente" class="col-sm-12 col-md-12">Vendedor</label>
									<input type="text" disabled class="form-control" id="etiq_cliente" name="etiq_cliente" placeholder="34534534554">
							</div>
						</div>							



						<div class="col-sm-4 col-md-3" style="padding-left: 0px;">
							<div class="form-group">
								<label for="descripcion" class="col-sm-12 col-md-12">Sucursal</label>
									<input type="text" disabled class="form-control" id="etiq_dependencia" name="etiq_dependencia" placeholder="">
							</div>
						</div>
					
						<div class="col-sm-4 col-md-4" >
							<div class="form-group">
								<label for="descripcion" class="col-sm-12 col-md-12">Fecha</label>
									<input type="text" disabled class="form-control" id="etiq_fecha" name="etiq_fecha" placeholder="10/10/15">
							</div>
						</div>

						<div class="col-sm-4 col-md-4" >
							<div class="form-group">
								<label for="descripcion" class="col-sm-12 col-md-12">Hora</label>
									<input type="text" disabled class="form-control" id="etiq_hora" name="etiq_hora" placeholder="9:05am">
							</div>
						</div>		


						<div class="col-sm-4 col-md-4" >
							<div class="form-group">
								<label for="descripcion" class="col-sm-12 col-md-12">
									<span id="etiq_tipo_apartado" ></span>
								</label>
								<div class="col-sm-12 col-md-12" id="etiq_color_apartado">
									
								</div>
							</div>
						</div>									

				</div>	

				<div class="col-sm-1 col-md-1"> 
					<div style="margin-right: 15px;float:left;background-color:#f2dede;width:15px;height:15px;"></div>
				</div>Fueron traspasados					
	


	<hr/>



	<div class="container row">					
		<div class="col-md-12">		
					  
						<input type="hidden" id="mov_salida" value="<?php echo $mov_salida ; ?>">
						<input type="hidden" id="id_apartado" value="<?php echo $id_apartado ; ?>">

						<div class="table-responsive">
							<section>
								<table id="pedido_completo_detalle" class="display table table-striped table-bordered table-responsive " cellspacing="0" width="100%">
								</table>
							</section>
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
							
						<hr/>
						<div class="col-md-12">	
							<div class="row">
								<div class="col-sm-6 col-md-6"></div>

								<div class="col-sm-3 col-md-3">
									<label for="descripcion" class="col-sm-12 col-md-12"></label>
									<a href="<?php echo base_url(); ?>generar_pedido_especifico/<?php echo base64_encode($mov_salida); ?>/<?php echo base64_encode(3); ?>/<?php echo base64_encode($id_apartado); ?>/<?php echo base64_encode($id_almacen); ?>/<?php echo base64_encode($consecutivo_venta); ?>/<?php echo base64_encode($id_tipo_pedido); ?>/<?php echo base64_encode($id_tipo_factura); ?>" 
										type="button" class="btn btn-success btn-block" target="_blank">Imprimir
									</a>
								</div>

								<div class="col-sm-3 col-md-3">
									<a href="<?php echo base_url(); ?>pedidos" type="button" class="btn btn-danger btn-block">Regresar</a>
								</div>	
	
							</div>	
						</div>

		</div>
	</div>

</div>
</div>
<?php $this->load->view( 'footer' ); ?>