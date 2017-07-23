<?php
require_once("php/conn.php");
$sql = $db->Execute("SELECT * FROM viajeros");

?>
<div class="col-md-12">
                        	<br>
                        		<div class="well">LISTADOS DE VIAJEROS</div>
                        		<div class="table-responsive">
								  <table class="table table-hover">
								    <thead>
								      <tr>
								        <th>Cedula</th>
								        <th>Nombres</th>
								        <th>Direccion</th>
								        <th>Telefono</th>
								        <th></th>
								      </tr>
								    </thead>
								    <tbody>
								    <?php
								    foreach ( $db->GetArray() as $HHFW => $row ){
										?>
	  									   <tr>
									        <td><?php echo $row["cedula"]; ?></td>
									        <td><?php echo $row["nombre"]; ?></td>
									        <td><?php echo $row["direccion"]; ?></td>
									        <td><?php echo $row["telefono"]; ?></td>
									        <td>
									        	<button type="button" class="btn btn-default" onclick="editViajero(<?php echo $row["id"]; ?>)">
											      <i class="fa fa-pencil" aria-hidden="true"></i>
											    </button>
									        </td>
									      </tr>
										<?php	
									}
								    ?>
								    
								      
								    </tbody>
								  </table>
								</div> 
</div>