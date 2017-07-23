<?php
require_once("php/conn.php");
$sql = $db->Execute("SELECT * FROM viajes");

?>
<div class="col-md-12">
                        	<br>
                        		<div class="well">LISTADOS DE VIAJES</div>
                        		 <div class="table-responsive">
								  <table class="table table-hover">
								    <thead>
								      <tr>
								        <th>Codigo</th>
								        <th>N. Plazas</th>
								        <th>Fecha</th>
								        <th>Origen</th>
								        <th>Destino</th>
								        <th>Observaciones</th>
								        <th></th>
								      </tr>
								    </thead>
								    <tbody>
								    <?php
								    	foreach ( $db->GetArray() as $HHFW => $row ){
								    		$sql_ = $db->Execute("SELECT * FROM tickets WHERE codigo_viaje=?",array($row["codigo"]));
								    		$totalregistros = $db->numrows();
								    ?>
								      <tr>
								        <td><?php echo $row["codigo"]; ?></td>
								        <td><?php echo $totalregistros; ?>/<?php echo $row["n_plazas"]; ?></td>
								        <td><?php echo $row["fecha"]; ?></td>
								        <td><?php echo $row["origen"]; ?></td>
								        <td><?php echo $row["destino"]; ?></td>
								        <td><?php echo $row["otros"]; ?></td>
								        <td>
								        	<button type="button" class="btn btn-default" onclick="verViajeros(<?php echo $row["codigo"]; ?>)">
										      <i class="fa fa-users" aria-hidden="true"></i>
										    </button>
								        	<button type="button" class="btn btn-default" onclick="editViaje(<?php echo $row["id"]; ?>)">
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