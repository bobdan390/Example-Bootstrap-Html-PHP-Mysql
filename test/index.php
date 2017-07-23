<?php
	require_once("php/conn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="bootstrap/assets/js/jquery.js"></script>
	<link rel="stylesheet" href="bootstrap/assets/css/boot.css">
	<script src="bootstrap/assets/js/bootstrap.min.js"></script>
	<script src="bootstrap/process.js"></script>
	<link rel="stylesheet" href="bootstrap/assets/css/font-awesome.css">
</head>
<body>

<div class="container">
	<div class="row">
		  <div class="col-md-12">
        	<!-- Nav tabs -->
        	<br>
        		<div class="card">
                	<ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="#viajeros" aria-controls="viajeros" role="tab" data-toggle="tab" onclick="cargar(this);" >Viajeros</a></li> 
                        <li role="presentation"><a href="#nviajero" aria-controls="nviajero" role="tab" data-toggle="tab" onclick="cargar(this);">N. Viajero</a></li> 
                        <li role="presentation"><a href="#viajes" aria-controls="viajes" role="tab" data-toggle="tab" onclick="cargar(this);">Viajes</a></li>
                        <li role="presentation"><a href="#nviaje" aria-controls="nviaje" role="tab" data-toggle="tab" onclick="cargar(this);">N. Viaje</a></li>
                    </ul>

            		<!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane" id="viajeros">
                        	
                        </div>
                        <div role="tabpanel" class="tab-pane" id="nviajero">
                        	
                        	 
                        </div>
                                        
                        <div role="tabpanel" class="tab-pane" id="viajes">
                        	
                        </div>

                        <div role="tabpanel" class="tab-pane" id="nviaje">
                        	
                        </div>
                                        
                    </div>
				</div>
            </div>
		</div>
	</div>
</body>
</html>