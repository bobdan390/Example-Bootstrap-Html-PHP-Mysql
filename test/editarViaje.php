<?php
require_once("php/conn.php");
$sql = $db->Execute("SELECT * FROM viajes WHERE id=?",array($_GET["id"]));
$row = $db->fetchrow();
?>
<div class="col-md-12">
                        	<br>
                        		<div class="well">EDITAR VIAJE</div>
	                        	<form id="formulario_viaje_editar">
								  <div class="form-group">
								    <label for="codigo">Codigo:</label>
								    <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $row['codigo']; ?>">
								  </div>
								  <div class="form-group">
								    <label for="plazas">Numero de Plazas:</label>
								    <input type="text" class="form-control" id="plazas" name="plazas" value="<?php echo $row['n_plazas']; ?>">
								  </div>
								  <div class="form-group">
								    <label for="fecha">Fecha de Viaje:</label>
								    <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $row['fecha']; ?>">
								  </div>
								  <div class="form-group">
								    <label for="origen">Origen:</label>
								    <input type="text" class="form-control" id="origen" name="origen" value="<?php echo $row['origen']; ?>">
								  </div>
								  <div class="form-group">
								    <label for="llegada">Llegada:</label>
								    <input type="text" class="form-control" id="llegada" name="llegada" value="<?php echo $row['destino']; ?>">
								  </div>
								  <div class="form-group">
								    <label for="observaciones">Observaciones:</label>
								    <input type="text" class="form-control" id="observaciones" name="observaciones" value="<?php echo $row['otros']; ?>">
								    <input type="hidden" class="form-control" id="mode" name="mode" value="editViaje">
								    <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
								  </div>

								  
								  <button type="button" class="btn btn-default" onclick="editarViaje();">Editar Viaje</button>
								  <button type="button" class="btn btn-default" onclick="deleteViaje();">Eliminar Viaje</button>
								</form>	<br><br>
                        	</div>
