<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php 
	  $perfil= $this->session->userdata('id_perfil'); 
	  $id_session = $this->session->userdata('id');
	  $coleccion_id_operaciones= json_decode($this->session->userdata('coleccion_id_operaciones')); 


  		$dato['id'] = 13; //impresion lenta
		$this->session->set_userdata('config_impresion', $this->catalogo->coger_configuracion($dato));

		$config_impresion= $this->session->userdata('config_impresion');


		$dato['id'] = 7; //entrada
		$configuracion_entrada = $this->catalogo->coger_configuracion($dato); 

		$dato['id'] = 10; //salida
		$configuracion_salida = $this->catalogo->coger_configuracion($dato); 

		$dato['id'] = 11; //compra
		$configuracion_compra = $this->catalogo->coger_configuracion($dato); 

		$dato['id'] = 12; //traspaso
		$configuracion_traspaso = $this->catalogo->coger_configuracion($dato); 


		$dato['id'] = 8;
		$this->session->set_userdata('config_almacen', $this->catalogo->coger_configuracion($dato));

		$dato['id'] = 9;
        $data['config_salida'] = $this->catalogo->coger_configuracion($dato); 
     	$this->session->set_userdata('config_salida', $this->catalogo->coger_configuracion($dato)->activo);


		

		$config_almacen = $this->session->userdata('config_almacen');
		$el_perfil = $this->session->userdata('id_perfil');


	  if ( (count($coleccion_id_operaciones)==0) || (!($coleccion_id_operaciones)) )  
	  		{
	  			$coleccion_id_operaciones = array();
	  		} 	


		  	  if ($this->session->userdata('id_almacen') != 0) {
	              $id_almacenid = ' AND ( m.id_almacen =  '.$this->session->userdata('id_almacen').' ) ';  
	          } else {
	              $id_almacenid = '';
	          } 

 
         if ( ( $perfil == 3 ) OR ( $perfil == 4 ) ) { 
            $restriccion  =' AND (m.id_usuario_apartado = "'.$id_session.'")';
         } else {
         	$restriccion = '';
         }

          
         if (  $perfil != 4 ) {
	     		$where_total = '(( m.id_apartado = 2 ) or ( m.id_apartado = 3 ))'.$id_almacenid.$restriccion;
				$dato['vendedor'] = (string)$this->modelo_pedido->total_apartados_pendientes($where_total);
         } else {
         	$dato['vendedor'] ="0";
         }

         if (  $perfil != 3 ) {
			$where_total = '(( m.id_apartado = 5 ) or ( m.id_apartado = 6 ))'.$id_almacenid.$restriccion;
			$dato['tienda'] = (string)$this->modelo_pedido->total_pedidos_pendientes($where_total);  
         } else {
         	$dato['tienda'] ="0";
         }


         if ($perfil) {
         	//$data['modulo']=$this->session->userdata('id_perfil'); 
         	$data['modulo'] = ($this->session->userdata('id_perfil')!=2) ? 1: 2; 
         	$dato['compra'] = (string)$this->model_pedido_compra->notificador_pedido_compra($data);  
         } else {
         	$dato['compra'] = 99;
         }	


			$conteos =  '<span title="Pedidos Vendedores." class="ttip">'.$dato['vendedor'].'</span><span> - </span><span title="Pedidos Tiendas." class="ttip">'.$dato['tienda'].'</span>
				<span> - </span><span title="Ordenes de Compra." class="ttip">'.$dato['compra'].'</span>
			';




?>	


<input type="hidden" id="config_impresion" name="config_impresion" value="<?php echo $config_impresion->activo; ?>" >

<input type="hidden" id="config_salida" name="config_salida" value="<?php echo $this->session->userdata('config_salida'); ?>">		

<input type="hidden" id="config_almacen" name="config_almacen" value="<?php echo $config_almacen->activo; ?>" >
<input type="hidden" id="config_entrada_activo" name="config_entrada_activo" value="<?php echo $configuracion_entrada->activo; ?>">
<input type="hidden" id="config_salida_activo" name="config_salida_activo" value="<?php echo $configuracion_salida->activo; ?>">
<input type="hidden" id="config_compra_activo" name="config_compra_activo" value="<?php echo $configuracion_compra->activo; ?>">
<input type="hidden" id="config_traspaso_activo" name="config_traspaso_activo" value="<?php echo $configuracion_traspaso->activo; ?>">

<input type="hidden" id="el_perfil" name="el_perfil" value="<?php echo $perfil; ?>">


<div class="row-fluid">
	<div class="navbar navbar-default navbar-custom" style="font-size: 12px;" role="navigation">
		<div class="container">
			
	 <?php  if ($this->session->userdata('session')) {  ?>
				<div class="navbar-brand" style="margin-right: 15px;" id="bar_">
					<a href="<?php echo base_url(); ?>" style="color: #ffffff;"><i class="glyphicon glyphicon-home"></i></a>
				</div>
				
				<div class="collapse navbar-collapse" id="main-navbar">
					<ul class="nav navbar-nav navbar-left" id="menu_opciones">


					 <?php if ( ( $perfil == 1 ) || (in_array(9, $coleccion_id_operaciones)) || (in_array(61, $coleccion_id_operaciones)) ) { ?>
						<li id="bar_reportes">
							<a title="Sección de reportes." href="<?php echo base_url(); ?>reportes" class="ttip color-blanco">Reportes</a> 
						</li>
					<?php } ?>	

						
					</ul>
				</div>
	 <?php } ?>
		</div>
	</div>
</div>
