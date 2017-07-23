<?php
require_once("php/conn.php");
$sql = $db->Execute("SELECT * FROM viajes");

?>
<div class="col-md-12">
                        	<br>
                        		<div class="well">NUEVO VIAJERO</div>
	                        	<form id="formulario">
								  <div class="form-group">
								    <label for="cedula">Cedula:</label>
								    <input type="text" class="form-control" id="cedula" name="cedula" onchange="verificar();">
								  </div>
								  <div class="form-group">
								    <label for="nombres">Nombres:</label>
								    <input type="text" class="form-control" id="nombres" name="nombres">
								  </div>
								  <div class="form-group">
								    <label for="direccion">Direccion:</label>
								    <input type="text" class="form-control" id="direccion" name="direccion">
								  </div>
								  <div class="form-group">
								    <label for="tel">Telefono:</label>
								    <input type="text" class="form-control" id="tel" name="tel">
								    <input type="hidden" class="form-control" id="mode" name="mode" value="nViajero">
								  </div>
								  <div class="form-group">
								    <label for="tel">Viaje a tomar:</label>
								    <select class="form-control" id="viaje" name="viaje">
								    	<option value="">Seleccione un viaje!</option>
								    	<?php
 											foreach ( $db->GetArray() as $HHFW => $row ){
												?>
			  									   <option value="<?php echo $row['codigo']; ?>/<?php echo $row['origen']; ?> - <?php echo $row['destino']; ?>"><?php echo $row['origen']; ?> - <?php echo $row['destino']; ?></option>
												<?php	
											}
										    ?>
								    	?>
								    </select>
								  </div>

								  
								  <button type="button" class="btn btn-default" onclick="guardarViajero();">Guardar</button>
								</form>	
                        	</div>