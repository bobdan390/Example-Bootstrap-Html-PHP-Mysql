<?php
require_once("php/conn.php");
$sql = $db->Execute("SELECT * FROM viajeros WHERE id=?",array($_GET["id"]));
$row = $db->fetchrow();
?>
<div class="col-md-12">
                        	<br>
                        		<div class="well">EDITAR VIAJERO</div>
	                        	<form id="formulario_edit_viajero">
								  <div class="form-group">
								    <label for="cedula">Cedula:</label>
								    <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $row['cedula']; ?>">
								  </div>
								  <div class="form-group">
								    <label for="nombres">Nombres:</label>
								    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $row['nombre']; ?>">
								  </div>
								  <div class="form-group">
								    <label for="direccion">Direccion:</label>
								    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $row['direccion']; ?>">
								  </div>
								  <div class="form-group">
								    <label for="tel">Telefono:</label>
								    <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $row['telefono']; ?>">
								    <input type="hidden" class="form-control" id="mode" name="mode" value="editViajero">
								    <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
								  </div>

								  
								  <button type="button" class="btn btn-default" onclick="editarViajero();">Guardar Edicion</button>
								  <button type="button" class="btn btn-default" onclick="eliminarViajero();">Eliminar Viajero</button>
								</form>	
                        	</div>