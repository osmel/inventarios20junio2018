<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view( 'header' ); ?>
<div class="container margenes">


		<input type="hidden" id="id_usuario_apartado" value="<?php echo $id_usuario ; ?>">
		<input type="hidden" id="id_cliente_apartado" value="<?php echo $id_cliente ; ?>">


		<div class="table-responsive">
			<br>
			<h4>Detalle de Apartados pendientes</h4>	
			<br>			

			<section>
				<table id="tabla_apartado_detalle" class="display table table-striped table-bordered table-responsive " cellspacing="0" width="100%">
				</table>
			</section>
		</div>		
		

		<div class="panel panel-primary">
			<div class="panel-heading">Detalles de pedido</div>
			<div class="panel-body">
				
		<div class="container row">
					<div class="col-sm-12 col-md-12 control" style="margin-bottom:10px">						
						<div class="col-sm-2 col-md-2">
							<div class="form-group">
								<label for="descripcion" class="col-sm-12 col-md-12">Número de pedido</label>
								<div class="col-sm-12 col-md-12">
									<input type="text" disabled class="form-control" id="descripcion" name="descripcion" placeholder="34534534554">
								</div>
							</div>
						</div>						
						<div class="col-sm-2 col-md-2">
							<div class="form-group">
								<label for="descripcion" class="col-sm-12 col-md-12">Fecha</label>
								<div class="col-sm-12 col-md-12">
									<input type="text" disabled class="form-control" id="descripcion" name="descripcion" placeholder="10/10/15">
								</div>
							</div>
						</div>
						<div class="col-sm-5 col-md-5">
							<div class="form-group">
								<label for="descripcion" class="col-sm-12 col-md-12">Cliente</label>
								<div class="col-sm-12 col-md-12">
									<input type="text" disabled class="form-control" id="descripcion" name="descripcion" placeholder="Iniciativa Textil">
								</div>
							</div>
						</div>
					
						<div class="col-sm-2 col-md-2">
							<div class="form-group">
								<label for="descripcion" class="col-sm-12 col-md-12">Hora</label>
								<div class="col-sm-12 col-md-12">
									<input type="text" disabled class="form-control" id="descripcion" name="descripcion" placeholder="9:05am">
								</div>
							</div>
						</div>						
				</div>		
	</div>
	<hr/>

		


	<hr/>


	<div class="container row">					
		<div class="col-md-12">				
				<div class="table-responsive">
				<table class="table table-striped table-bordered table-responsive tabla_ordenadas" >
					<thead>	
						<tr>
							<th class="text-center cursora" width="15%">Código<i class="glyphicon glyphicon-sort"></i></th>
							<th class="text-center cursora" width="20%">Descripción <i class="glyphicon glyphicon-sort"></i></th>
							<th class="text-center cursora" width="10%">Color<i class="glyphicon glyphicon-sort"></i></th>
							<th class="text-center cursora" width="5%">Pieza <i class="glyphicon glyphicon-sort"></i></th>
							<th class="text-center cursora" width="5%">Metro<i class="glyphicon glyphicon-sort"></i></th>
							<th class="text-center cursora" width="5%">Ancho <i class="glyphicon glyphicon-sort"></i></th>
							<th class="text-center cursora" width="15%">Proveedor<i class="glyphicon glyphicon-sort"></i></th>
							<th class="text-center cursora" width="5%">Lote/#<i class="glyphicon glyphicon-sort"></i></th>
							


						</tr>
					</thead>		
	

				</table>

			</div>
		<div class="col-md-12">	
			<div class="row">
				<div class="col-sm-4 col-md-4">
					<a href="#" type="button" class="btn btn-danger btn-block">Cancelar pedido</a>
				</div>	
				<div class="col-sm-4 col-md-4"></div>
				<div class="col-sm-4 col-md-4">
					<a href="#" type="button" class="btn btn-success btn-block">Imprimir</a>
				</div>				
			</div>	
		</div>
	</div>
</div>
<hr>
<div class="col-md-12">	
<div class="row">
	<div class="col-sm-3 col-md-3">
			
			<div class="col-sm-12 col-md-12">
				<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Número de movimiento de salida">
			</div>
		
	</div>
	<div class="col-sm-3 col-md-3">
		<a href="#" type="button" class="btn btn-success btn-block">Pedido completado</a>
	</div>
	<div class="col-sm-3 col-md-3">
	</div>
	<div class="col-sm-3 col-md-3">
		<a href="#" type="button" class="btn btn-danger btn-block">Regresar</a>
	</div>
	
</div>
</div>
</div>
</div>
<?php $this->load->view( 'footer' ); ?>