function cargar(argument) {
	var panel = $(argument).attr("aria-controls");
	$("#"+panel).load(panel+".php");
}

function editViajero(argument){
	$("#viajeros").load("editarViajero.php?id="+argument);
}

function editViaje(argument){
	$("#viajes").load("editarViaje.php?id="+argument);
}

function guardarViajero() {
		var form = $("#formulario").serialize();
		    $.ajax({
	           type: "POST",
	           url: "php/functions.php",
	           data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
	           success: function(data)
	           {
	               showAlert(data);

	           }
	        });
		  
}

function verificar(){
			var x = $("#cedula").val();
			$.ajax({
	           type: "GET",
	           url: "php/functions.php",
	           data: {id:x}, // Adjuntar los campos del formulario enviado.
	           success: function(data)
	           {	

	           	   if (data=="none") {
		           	   $("#nombres").val("");
		               $("#direccion").val("");
		               $("#tel").val("");
		               $("#formulario #mode").attr("value","nViajero");
	           	   } else {
	           	   		var z = JSON.parse(data);
		           	   $("#nombres").val(z["nombre"]);
		               $("#direccion").val(z["direccion"]);
		               $("#tel").val(z["telefono"]);
		               $("#formulario #mode").attr("value","nTicket");
	           	   }
	               
	               
	           }
	     	});
}

function showAlert(data){
		var z = JSON.parse(data);
	    alert(z["message"]);
	    if(z["code"]==202){
	       var zz = z["arrayDatos"];
	       for (var i = 0; i < zz.length; i++) {
	       		$("#"+zz[i]).css("border","2px solid red");
	       }
	    }else{
	    	location.reload();
	    }
	    

}

function editarViajero() {
		    $.ajax({
	           type: "POST",
	           url: "php/functions.php",
	           data: $("#formulario_edit_viajero").serialize(), // Adjuntar los campos del formulario enviado.
	           success: function(data)
	           {
	               showAlert(data);
	           }
	        });

}

function eliminarViajero(){
		$("#formulario_edit_viajero #mode").attr("value","deleteViajero");
		editarViajero();

}

function editarViaje() {
		    $.ajax({
	           type: "POST",
	           url: "php/functions.php",
	           data: $("#formulario_viaje_editar").serialize(), // Adjuntar los campos del formulario enviado.
	           success: function(data)
	           {
	               showAlert(data);
	           }
	        });

}
function deleteViaje(){
		$("#formulario_viaje_editar #mode").attr("value","deleteViaje");
		editarViaje();
}

function verViajeros(argument){
	$("#viajes").load("tickets.php?id="+argument);
}

function guardarViaje() {
		    $.ajax({
	           type: "POST",
	           url: "php/functions.php",
	           data: $("#formulario_viaje").serialize(), // Adjuntar los campos del formulario enviado.
	           success: function(data)
	           {
	               showAlert(data);
	           }
	        });

}

function deletePlaza(argument){
		$.ajax({
	           type: "GET",
	           url: "php/functions.php",
	           data: {id_ticket:argument}, // Adjuntar los campos del formulario enviado.
	           success: function(data)
	           {
	               alert("Transaccion Realizada");
	               location.reload();
	           }
	    });

}