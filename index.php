<?php
require_once('bdd.php');


$sql = "SELECT id, title, cliente, hora, producto1, producto2, producto3, producto4, producto5, producto6, producto7, producto8, producto9, producto10, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<?php     
// Include database configuration file 
require_once 'productos.controlador.php';
require_once 'productos.modelo.php';

require_once 'clientes.controlador.php';
require_once 'clientes.modelo.php';
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />
	<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- FullCalendar -->
<script src='js/moment.min.js'></script>
<script src="js/fullcalendar/lib/main.js"></script>
<script src="js/fullcalendar/lib/locales-all.js"></script>
<script src='js/fullcalendar.min.js'></script>
<script src="js/fullcalendar/lib/locales/es.js"></script>

    <!-- Custom CSS -->
    <style>

    body {
        padding-top: 70px;
		
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	#calendar {
		max-width: 100%;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>



    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
              
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
				<h4 class="modal-title" id="myModalLabel">Agregar Servicio</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Servicio</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="">
					
				  </div>
				  </div>


				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Cliente</label>
					<div class="col-sm-10">
					<Select id="cliente" name="cliente" class="form-control" placeholder="">

<option value="">Seleccionar Cliente</option>

<?php

$item = null;
$valor = null;
$orden = "id";
$cliente = ControladorClientes::ctrMostrarClientes($item, $valor, $orden);
foreach ($cliente as $key => $value) {

echo '<option value="'.$value["nombre"].'">'.$value["nombre"].'</option>';
}

?></select>
					
				  </div>
				  </div>



				 


				  <div class="form-group">
					<label for="hora" class="col-sm-2 control-label">Hora</label>
					<div class="col-sm-10">
					  <input type="time" name="hora" class="form-control" id="hora" placeholder="">
					
				  </div>
				  </div>


























				
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Elegir color</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Azul</option>
					
						  <option style="color:#008000;" value="#008000">&#9724; Verde</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
						  <option style="color:#000;" value="#000">&#9724; Negro</option>
						  
						</select>
					</div>
				  </div>
				  <div class="form-group" style="display: none;">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group"style="display: none;">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				








































 <!-- Agregar producto1 -->
 <!-- _______________________________________________________________________________________________ -->

 <!-- _______________________________________________________________________________________________ -->
  <!-- _______________________________________________________________________________________________ -->


				  <div class="form-group " id="form1">
				  <label for="producto1" class="col-sm-2 control-label">producto</label>
				  <div class="col-sm-10">
				  <Select id="producto1" name="producto1" class="form-control" placeholder="">

					<option value="">Elegir Producto</option>

				<?php

					$item = null;
					$valor = null;
					$orden = "id";
					$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
					foreach ($productos as $key => $value) {
					
					echo '<option value="'.$value["descripcion"].'">'.$value["descripcion"].'</option>';
					}

				?></select>
				</div>
				  </div>


	<button type="button" onclick="form1()" id="boton1" style="display: block;" class="btn btn-primary" >Agregar producto</button> 


 <!-- Agregar producto2 -->
 <!-- _______________________________________________________________________________________________ -->

 <!-- _______________________________________________________________________________________________ -->
  <!-- _______________________________________________________________________________________________ -->


  <div class="form-group form2" id="form2" style="display: none;">
				  <label for="producto2" class="col-sm-2 control-label">producto</label>
				  <div class="col-sm-10">
				  <Select id="producto2" name="producto2" class="form-control" placeholder="">

					<option value="">Elegir Producto</option>

				<?php

					$item = null;
					$valor = null;
					$orden = "id";
					$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
					foreach ($productos as $key => $value) {
					
					echo '<option value="'.$value["descripcion"].'">'.$value["descripcion"].' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <h1 id="stocks">'.$value["stock"].' </h1></option>';
					}

				?></select>
				</div>
				  </div>

				  <button type="button" onclick="form2()" id="boton2" style="display: none;" class="btn btn-primary" >Agregar producto</button> 


 <!-- Agregar producto3 -->
 <!-- _______________________________________________________________________________________________ -->

 <!-- _______________________________________________________________________________________________ -->
  <!-- _______________________________________________________________________________________________ -->


  <div class="form-group form2" id="form3" style="display: none;">
				  <label for="producto3" class="col-sm-2 control-label">producto</label>
				  <div class="col-sm-10">
				  <Select id="producto3" name="producto3" class="form-control" placeholder="">

					<option value="">Elegir Producto</option>

				<?php

					$item = null;
					$valor = null;
					$orden = "id";
					$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
					foreach ($productos as $key => $value) {
					
					echo '<option value="'.$value["descripcion"].'">'.$value["descripcion"].' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <h1 id="stocks">'.$value["stock"].' </h1></option>';
					}

				?></select>
				</div>
				  </div>

				  <button type="button" onclick="form3()" id="boton3" style="display: none;" class="btn btn-primary" >Agregar producto</button> 



 <!-- Agregar producto4 -->
 <!-- _______________________________________________________________________________________________ -->

 <!-- _______________________________________________________________________________________________ -->
  <!-- _______________________________________________________________________________________________ -->


  <div class="form-group form2" id="form4" style="display: none;">
				  <label for="producto4" class="col-sm-2 control-label">producto</label>
				  <div class="col-sm-10">
				  <Select id="producto4" name="producto4" class="form-control" placeholder="">

					<option value="">Elegir Producto</option>

				<?php

					$item = null;
					$valor = null;
					$orden = "id";
					$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
					foreach ($productos as $key => $value) {
					
					echo '<option value="'.$value["descripcion"].'">'.$value["descripcion"].' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <h1 id="stocks">'.$value["stock"].' </h1></option>';
					}

				?></select>
				</div>
				  </div>

				  <button type="button" onclick="form4()" id="boton4" style="display: none;" class="btn btn-primary" >Agregar producto</button> 


 <!-- Agregar producto5 -->
 <!-- _______________________________________________________________________________________________ -->

 <!-- _______________________________________________________________________________________________ -->
  <!-- _______________________________________________________________________________________________ -->


  <div class="form-group form2" id="form5" style="display: none;">
				  <label for="producto5" class="col-sm-2 control-label">producto</label>
				  <div class="col-sm-10">
				  <Select id="producto5" name="producto5" class="form-control" placeholder="">

					<option value="">Elegir Producto</option>

				<?php

					$item = null;
					$valor = null;
					$orden = "id";
					$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
					foreach ($productos as $key => $value) {
					
					echo '<option value="'.$value["descripcion"].'">'.$value["descripcion"].' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <h1 id="stocks">'.$value["stock"].' </h1></option>';
					}

				?></select>
				</div>
				  </div>

				  <button type="button" onclick="form5()" id="boton5" style="display: none;" class="btn btn-primary" >Agregar producto</button> 



 <!-- Agregar producto6 -->
 <!-- _______________________________________________________________________________________________ -->

 <!-- _______________________________________________________________________________________________ -->
  <!-- _______________________________________________________________________________________________ -->


  <div class="form-group form2" id="form6" style="display: none;">
				  <label for="producto6" class="col-sm-2 control-label">producto</label>
				  <div class="col-sm-10">
				  <Select id="producto6" name="producto6" class="form-control" placeholder="">

					<option value="">Elegir Producto</option>

				<?php

					$item = null;
					$valor = null;
					$orden = "id";
					$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
					foreach ($productos as $key => $value) {
					
					echo '<option value="'.$value["descripcion"].'">'.$value["descripcion"].' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <h1 id="stocks">'.$value["stock"].' </h1></option>';
					}

				?></select>
				</div>
				  </div>

				  <button type="button" onclick="form6()" id="boton6" style="display: none;" class="btn btn-primary" >Agregar producto</button> 



	



 <!-- Agregar producto7 -->
 <!-- _______________________________________________________________________________________________ -->

 <!-- _______________________________________________________________________________________________ -->
  <!-- _______________________________________________________________________________________________ -->


  <div class="form-group form2" id="form7" style="display: none;">
				  <label for="producto7" class="col-sm-2 control-label">producto</label>
				  <div class="col-sm-10">
				  <Select id="producto7" name="producto7" class="form-control" placeholder="">

					<option value="">Elegir Producto</option>

				<?php

					$item = null;
					$valor = null;
					$orden = "id";
					$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
					foreach ($productos as $key => $value) {
					
					echo '<option value="'.$value["descripcion"].'">'.$value["descripcion"].' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <h1 id="stocks">'.$value["stock"].' </h1></option>';
					}

				?></select>
				</div>
				  </div>

				  <button type="button" onclick="form7()" id="boton7" style="display: none;" class="btn btn-primary" >Agregar producto</button> 




 <!-- Agregar producto8 -->
 <!-- _______________________________________________________________________________________________ -->

 <!-- _______________________________________________________________________________________________ -->
  <!-- _______________________________________________________________________________________________ -->


  <div class="form-group form2" id="form8" style="display: none;">
				  <label for="producto8" class="col-sm-2 control-label">producto</label>
				  <div class="col-sm-10">
				  <Select id="producto8" name="producto8" class="form-control" placeholder="">

					<option value="">Elegir Producto</option>

				<?php

					$item = null;
					$valor = null;
					$orden = "id";
					$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
					foreach ($productos as $key => $value) {
					
					echo '<option value="'.$value["descripcion"].'">'.$value["descripcion"].' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <h1 id="stocks">'.$value["stock"].' </h1></option>';
					}

				?></select>
				</div>
				  </div>

				  <button type="button" onclick="form8()" id="boton8" style="display: none;" class="btn btn-primary" >Agregar producto</button> 




 <!-- Agregar producto9 -->
 <!-- _______________________________________________________________________________________________ -->

 <!-- _______________________________________________________________________________________________ -->
  <!-- _______________________________________________________________________________________________ -->


  <div class="form-group form2" id="form9" style="display: none;">
				  <label for="producto9" class="col-sm-2 control-label">producto</label>
				  <div class="col-sm-10">
				  <Select id="producto9" name="producto9" class="form-control" placeholder="">

					<option value="">Elegir Producto</option>

				<?php

					$item = null;
					$valor = null;
					$orden = "id";
					$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
					foreach ($productos as $key => $value) {
					
					echo '<option value="'.$value["descripcion"].'">'.$value["descripcion"].' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <h1 id="stocks">'.$value["stock"].' </h1></option>';
					}

				?></select>
				</div>
				  </div>

				  <button type="button" onclick="form9()" id="boton9" style="display: none;" class="btn btn-primary" >Agregar producto</button> 






 <!-- Agregar producto10 -->
 <!-- _______________________________________________________________________________________________ -->

 <!-- _______________________________________________________________________________________________ -->
  <!-- _______________________________________________________________________________________________ -->


  <div class="form-group form2" id="form10" style="display: none;">
				  <label for="producto10" class="col-sm-2 control-label">producto</label>
				  <div class="col-sm-10">
				  <Select id="producto10" name="producto10" class="form-control" placeholder="">

					<option value="">Elegir Producto</option>

				<?php

					$item = null;
					$valor = null;
					$orden = "id";
					$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
					foreach ($productos as $key => $value) {
					
					echo '<option value="'.$value["descripcion"].'">'.$value["descripcion"].' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <h1 id="stocks">'.$value["stock"].' </h1></option>';
					}

				?></select>
				</div>
				  </div>





































































































































































			  </div>



			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
			
				<button type="submit" class="btn btn-primary">Guardar</button>

			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
				<h4 class="modal-title" style="text-decoration:dashed" id="myModalLabel">Servicios y citas</h4>
			  </div>
			  <div class="modal-body">




















































			  <ul class="list-group">
  <li  style="background-color: #60a3bc;
    color: white;
    text-decoration-thickness: auto;
    text-decoration: line-through;" class="list-group-item"> <h5> <label style="font-size: 120%;"; for="editarcliente">Cliente:</label>   &nbsp; <input type="text" name="editarcliente"  disabled style="background-color: transparent; border: solid transparent; font-size: 140%;"  id="editarcliente" ></h5></li>
  <li style="background-color: #ced6e0;
    color: black;
    text-decoration-thickness: auto;
    text-decoration: line-through;" class="list-group-item"> <h5> <label for="editarhora">Hora de la cita: &nbsp; &nbsp; &nbsp;</label>   &nbsp; <input type="text" name="editarhora"  disabled style="background-color: transparent; border: solid transparent"  id="editarhora" ></h5></li>
  <li  style="background-color: #ced6e0;
    color: black;
    text-decoration-thickness: auto;
    text-decoration: line-through;" class="list-group-item"> <h4>   &nbsp; <textarea  type="text" cols="32" rows="3" name="title"  disabled style="background-color: transparent; border: solid transparent; margin-left:-15px"  id="title" ></textarea></h4></li>
  
</li>
 
</ul>
				
				  <hr style="border:1px solid darkcyan"><Center><h3>Lista de productos requeridos</h3>
				  </Center>  <hr style="border:1px solid darkcyan">
					<ul class="list-group">
  <li class="list-group-item"><input type="text" name="editarproducto1"  readonly style="background-color: transparent; border: solid transparent" class="form-control" id="editarproducto1" ></li>
  <li class="list-group-item"><input type="text" name="editarproducto2"  readonly style="background-color: transparent; border: solid transparent" class="form-control" id="editarproducto2" >
  <li class="list-group-item"><input type="text" name="editarproducto3"  readonly style="background-color: transparent; border: solid transparent" class="form-control" id="editarproducto3" >
  <li class="list-group-item"><input type="text" name="editarproducto4"  readonly style="background-color: transparent; border: solid transparent" class="form-control" id="editarproducto4" >
  <li class="list-group-item"><input type="text" name="editarproducto5"  readonly style="background-color: transparent; border: solid transparent" class="form-control" id="editarproducto5" >
  <li class="list-group-item"><input type="text" name="editarproducto6"  readonly style="background-color: transparent; border: solid transparent" class="form-control" id="editarproducto6" >
  <li class="list-group-item"><input type="text" name="editarproducto7"  readonly style="background-color: transparent; border: solid transparent" class="form-control" id="editarproducto7" >
  <li class="list-group-item"><input type="text" name="editarproducto8"  readonly style="background-color: transparent; border: solid transparent" class="form-control" id="editarproducto8" >
  <li class="list-group-item"><input type="text" name="editarproducto9"  readonly style="background-color: transparent; border: solid transparent" class="form-control" id="editarproducto9" >
  <li class="list-group-item"><input type="text" name="editarproducto10"  readonly style="background-color: transparent; border: solid transparent" class="form-control" id="editarproducto10" >

</li>
 
</ul>

				    <div class="form-group" style="display: none;"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox" >

						 <span style="
    font-size: 116%;
    color: red;
    margin-right: 2px;
    margin: 3px;
">Eliminar</span> 	<label  class="text-danger">
								<input  type="checkbox" checked style="width: 17px;
    height: 23px;
" name="delete">
								 <Eliminar></Eliminar></label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
				
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
				<button type="submit" class="btn btn-danger">Borrar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
 
	<script>


	$(document).ready(function() {
	
		$('#calendar').fullCalendar({
		

			header: {
				
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay',
			
			},
			locales: 'es',

			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
		
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #editarcliente').val(event.cliente);
					$('#ModalEdit #editarhora').val(event.hora);
					$('#ModalEdit #editarproducto1').val(event.producto1);
					$('#ModalEdit #editarproducto2').val(event.producto2);
					$('#ModalEdit #editarproducto3').val(event.producto3);
					$('#ModalEdit #editarproducto4').val(event.producto4);
					$('#ModalEdit #editarproducto5').val(event.producto5);
					$('#ModalEdit #editarproducto6').val(event.producto6);
					$('#ModalEdit #editarproducto7').val(event.producto7);
					$('#ModalEdit #editarproducto8').val(event.producto8);
					$('#ModalEdit #editarproducto9').val(event.producto9);
					$('#ModalEdit #editarproducto10').val(event.producto10);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					cliente: '<?php echo $event['cliente']; ?>',
					hora: '<?php echo $event['hora']; ?>',
					producto1: '<?php echo $event['producto1']; ?>',
					producto2: '<?php echo $event['producto2']; ?>',
					producto3: '<?php echo $event['producto3']; ?>',
					producto4: '<?php echo $event['producto4']; ?>',
					producto5: '<?php echo $event['producto5']; ?>',
					producto6: '<?php echo $event['producto6']; ?>',
					producto7: '<?php echo $event['producto7']; ?>',
					producto8: '<?php echo $event['producto8']; ?>',
					producto9: '<?php echo $event['producto9']; ?>',
					producto10: '<?php echo $event['producto10']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Saved');
					}else{
						alert('Could not be saved. try again.'); 
					}
				}
			});
		}
		
	});

</script>





<script>
					//DAR CLICK EN EL BOTON VISIBLE

function form1() {

  document.getElementById("form2").style.display = "block";
  document.getElementById("boton1").style.display = "none";
  document.getElementById("boton2").style.display = "block";

}

function form2() {

document.getElementById("form3").style.display = "block";
document.getElementById("boton2").style.display = "none";
document.getElementById("boton3").style.display = "block";

}

function form3() {

document.getElementById("form4").style.display = "block";
document.getElementById("boton3").style.display = "none";
document.getElementById("boton4").style.display = "block";

}

function form4() {

document.getElementById("form5").style.display = "block";
document.getElementById("boton4").style.display = "none";
document.getElementById("boton5").style.display = "block";

}

function form5() {

document.getElementById("form6").style.display = "block";
document.getElementById("boton5").style.display = "none";
document.getElementById("boton6").style.display = "block";

}

function form6() {

document.getElementById("form7").style.display = "block";
document.getElementById("boton6").style.display = "none";
document.getElementById("boton7").style.display = "block";

}

function form7() {

document.getElementById("form8").style.display = "block";
document.getElementById("boton7").style.display = "none";
document.getElementById("boton8").style.display = "block";

}

function form8() {

document.getElementById("form9").style.display = "block";
document.getElementById("boton8").style.display = "none";
document.getElementById("boton9").style.display = "block";

}

function form9() {

document.getElementById("form10").style.display = "block";
document.getElementById("boton9").style.display = "none";
document.getElementById("boton10").style.display = "block";

}


</script>
	


