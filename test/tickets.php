<?php
require_once("php/conn.php");
$sql = $db->Execute("SELECT * FROM tickets WHERE codigo_viaje=?",array($_GET["id"]));

?>
<div class="col-md-12">
                        	<br>
                        		<div class="well">PLAZAS DE VIAJE COD: <?php echo $_GET["id"]; ?> </div>
                        		<div class="table-responsive">
								  <table class="table table-hover">
								    <thead>
								      <tr>
								        <th>Viajeros</th>
								        <th></th>

								        <th></th>
								      </tr>
								    </thead>
								    <tbody>
								    <?php
								    foreach ( $db->GetArray() as $HHFW => $row ){
										?>
	  									   <tr>
									        <td><?php echo $row["cedula_viajero"]; ?></td>
									        <td>
									        	<?php
									        		$sql_ = $db->Execute("SELECT * FROM viajeros WHERE cedula=?",array($row["cedula_viajero"]));
									        		$row2 = $db->fetchrow();
									        		echo $row2["nombre"]."-".$row2["telefono"];
									        	?>
									        </td>

									        <td>
									        	<button type="button" class="btn btn-default" onclick="deletePlaza(<?php echo $row["id"]; ?>)">
											      <i class="fa fa-trash" aria-hidden="true"></i>

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