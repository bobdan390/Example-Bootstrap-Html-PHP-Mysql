<?php

class mysql {
    var $conexion;
    var $fechmode = PDO::FETCH_ASSOC;
    var $error;
	var $sql_query;
    var $sql_array;
	var $sql_row;

    function Connect($driver, $user, $pass){
		try {
			$this->conexion = new PDO($driver, $user, $pass);
		} catch (PDOException $e) {
			$this->error = $e->getMessage();
		}	
        return $this->conexion;
    }

	function ErrorInfo(){
		return $this->error;
	}
	
	function SetFetchMode($tipo){
		//FETCH_ASSOC o 	FETCH_NUM
		$this->fechmode = $tipo;
	}
	function Execute($sql,$array = NULL){
		$consulta = $this->conexion->prepare($sql);
		$consulta->setFetchMode($this->fechmode);
		$retorna = $consulta->execute($array);
		if(!$retorna){
			$errorinfo = $consulta->ErrorInfo();
		}else{
			$this->sql_query = $consulta;
			return $retorna;
		}
	}  
	
	function fetchrow(){
		return $this->sql_query->fetch();
	}
	function numrows(){
		return  $this->sql_query->rowCount();
	}
	function GetArray(){
		return $this->sql_query->fetchAll();
	}

}
$db = new mysql;
$conexion1 =  $db->Connect('mysql:host=localhost;dbname=travels', 'root', '');
if(!$conexion1){
		echo 'No se puede Conectar la Base de Datos';
		exit();
}

?>