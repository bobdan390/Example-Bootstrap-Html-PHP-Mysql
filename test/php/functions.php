<?php
require_once("conn.php");

/* Filtrar los datos */
class verificacion{ // FILTRO  VERIFICACION DE DATOS
	var $arr = array();
	var $arr_ = array();
	var $fail = false;

	function verification($form){
		unset($form["mode"]);
		$indices = array_keys($form);
		for ($i=0; $i < count($indices); $i++) { 
			$variable = addslashes(htmlspecialchars($form[$indices[$i]]));
			if ($variable!="") {
				array_push($this->arr, $variable);
			} else {
				$this->fail= $indices[$i];
				array_push($this->arr_, $indices[$i]);
			}
		}
		return $this->arr;
	}

	function arr_fail(){
		return $this->arr_;
	}

	function isFail(){
		return $this->fail;
	}
}

class preVerificacion{ // VERIFICAMOS EL MODO: INSERT DELETE UPDATE
	var $sql;
	var $sql_double;

	function sql($form){
		if ($form["mode"]=="nViajero") {
			$this->sql = "INSERT INTO viajeros(cedula,nombre,direccion,telefono) VALUES (?,?,?,?) ";
			$this->sql_double = "INSERT INTO tickets(cedula_viajero,codigo_viaje,codigo_ticket,nombre,otros) VALUES (?,?,?,?,?) ";
		} 

		if ($form["mode"]=="editViajero") {
			$this->sql = "UPDATE viajeros SET cedula=?,nombre=?,direccion=?,telefono=? WHERE id=?";
		} 

		if ($form["mode"]=="deleteViajero") {
			$this->sql = "DELETE FROM viajeros WHERE id='".$form["id"]."'";
		} 

		if ($form["mode"]=="nViaje"){
			$this->sql = "INSERT INTO viajes(codigo,n_plazas,fecha,origen,destino,otros) VALUES (?,?,?,?,?,?) ";
		}

		if ($form["mode"]=="editViaje") {
			$this->sql = "UPDATE viajes SET codigo=?,n_plazas=?,fecha=?,origen=?,destino=?,otros=? WHERE id=?";
		} 

		if ($form["mode"]=="deleteViaje") {
			$this->sql = "DELETE FROM viajes WHERE id='".$form["id"]."'";
		} 

		if ($form["mode"]=="nTicket"){
			$this->sql = "INSERT INTO viajes(cedula_viajero,codigo_viaje,codigo_viajero,nombre,otros) VALUES (?,?,?,?,?,?) ";
		}

		if ($form["mode"]=="nTicket") {
			$this->sql = "INSERT INTO tickets(cedula_viajero,codigo_viaje,codigo_ticket,nombre,otros) VALUES (?,?,?,?,?) ";
		} 

		return $this->sql;
	}
	function getDouble(){
		return $this->sql_double;
	}
}

class result{ //CLASE CREACION DEL JSON A RETORNAR
	var $json;

	function success(){
		$arrayName = array(
						'status' => 'Ok',  
						'message' => 'Transaccion Exitosa',
						'code' => 101
		);
		$this->json = json_encode($arrayName);

	}

	function fail($txt){
		$arrayName = array(
						'status' => 'Fail',  
						'message' => $txt,
						'code' => 303
		);
		$this->json = json_encode($arrayName);
	}

	function datosFaltantes($array){
		$arrayName = array(
						'status' => 'Fail',  
						'message' => 'Datos Faltantes',
						'code' => 202,
						'arrayDatos' => $array
		);
		$this->json = json_encode($arrayName);
	}

	function getJson(){
		return $this->json;
	}

}

if (isset($_POST["mode"])) {// VERIFICAMOS SI RECIBIMOS UN FORMULARIO O UNA SIMPLE VARIABLE - FORMULARIO
			if ($_POST["mode"]=="nViajero") {// NUEVO VIAJERO
				$ck = explode("/", $_POST["viaje"]);
				unset($_POST["viaje"]);

				$preVer = new preVerificacion; //Instanciamos para verificar el sql
				$sql = $preVer -> sql($_POST);
				$sql_double_ = $preVer -> getDouble();

				$_POST_ =  array('cedula' => $_POST["cedula"], 	
									'codigo' => $ck[0],
									'codigo_viajero' => $ck[0]."00".$_POST["cedula"],
									'nombres' => $ck[1],
									'others' => "None",
									'mode' => 'nViajero');

				$ver = new verificacion; // Instanciamos para verificar los datos
				$ver_ = new verificacion; // Instanciamos para verificar los datos

				$arr = $ver -> verification($_POST);
				$arr_ = $ver_ -> verification($_POST_);

				$res = new result; // instanciamos para convertir el result a json

				if ($ver->isFail()==false) { // VERIFICAMOS SI HAY DATOS FALTANTES EN EL FORMULARIO
					$sql_ = $db->Execute($sql,$arr);
					if ($sql_==true) {

						$sql__ = $db->Execute($sql_double_,$arr_);
						$res->success();
						echo($res->getJson());
					} else {
						$res->fail("Error de Insercion - Item Duplicado");
						echo($res->getJson());
					}
					
				} else {
					$res->datosFaltantes($ver->arr_fail());
					echo($res->getJson());
				}	
						
			}else{
				$isExist = false;
				if ($_POST["mode"]=="nTicket") { // VIAJERO EXISTENTE
					$ck = explode("/", $_POST["viaje"]);
					$verif_ = $db->Execute("SELECT * FROM tickets WHERE cedula_viajero=? AND codigo_viaje=?",array($_POST["cedula"],$ck[0]));
					if ($db->numrows()>0) {
						$isExist = true;
					}
					
					$_POST =  array('cedula' => $_POST["cedula"],  // Creamos un array para un nuevo viaje con viajero existente	
									'codigo' => $ck[0],
									'codigo_viajero' => $ck[0]."00".$_POST["cedula"],
									'nombres' => $ck[1],
									'others' => "None",
									'mode' => 'nTicket');

				}

				$preVer = new preVerificacion; //Instanciamos para verificar el sql
				$sql = $preVer -> sql($_POST);

				$ver = new verificacion; // Instanciamos para verificar los datos
				$arr = $ver -> verification($_POST);

				$res = new result; // instanciamos para convertir el result a json

				if ($ver->isFail()==false) { // VERIFICAMOS SI HAY DATOS FALTANTES EN EL FORMULARIO

					if ($isExist==false) {// VERIFICAMOS SI EL VIAJERO TIENE TICKETS PARA EL MISMO VIAJE
						$sql_ = $db->Execute($sql,$arr); //INSERCION
						if ($sql_==true) {
							$res->success();
							echo($res->getJson());							
						} else {
							$res->fail("Error de Insercion - Item Duplicado");
							echo($res->getJson());
						}
					} else {
							$res->fail("Error de Insercion - Item Duplicado");
							echo($res->getJson());
					}

				} else {
					$res->datosFaltantes($ver->arr_fail());
					echo($res->getJson());
				}				
			}		

} else { //RECIBIMOS UNA VARIABLE

	if (isset($_GET["id"])) { // CODIGO PARA CONSULTAR VIAJEROS YA REGISTRADOS
		$sql = "SELECT * FROM viajeros WHERE cedula=?";
		$sql_ = $db->Execute($sql,array($_GET["id"]));
		$row = $db->fetchrow();
		if ($row!=false) {
			echo(json_encode($row));
		}else{
			echo "none";
		}
	}

	if (isset($_GET["id_ticket"])) { // CODIGO PARA ELIMINAR TICKETS DE VIAJES
		$sql = "DELETE FROM tickets WHERE id=?";
		$sql_ = $db->Execute($sql,array($_GET["id_ticket"]));
	}
	

	
}




?>