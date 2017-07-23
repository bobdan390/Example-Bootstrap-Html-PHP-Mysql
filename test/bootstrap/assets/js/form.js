	$("#nombre").val("");
	$("#telefono").val("");
	$("#email").val("");
	$("#msj").val("");

	var ventana_ancho = $(window).width();
	if (ventana_ancho<767) {
		$("#prod_").attr("class","dropdown-toggle");
		$("#contact_").attr("class","dropdown-toggle");

		$("#prod_").attr("data-toggle","dropdown");
		$("#contact_").attr("data-toggle","dropdown");
	}

	function enviar() {
		var n_ = $("#nombre").val();
		var t_ = $("#telefono").val();
		var e_ = $("#email").val();
		var m_ = $("#msj").val();
		var isCorrect = true;
		if(n_==""){
			$("#nombre").attr("class","form-control inputError");
			isCorrect = false;
		}
		if(t_==""){
			$("#telefono").attr("class","form-control inputError");
			isCorrect = false;
		}
		if(e_=="" || validarEmail(e_)==false){
			$("#email").attr("class","form-control inputError");
			isCorrect = false;
		}
		if(m_==""){
			$("#msj").attr("class","form-control inputError");
			isCorrect = false;
		}

		if (isCorrect==true) {
			$(".loader").show();
			setTimeout(function(){
				$(".loader").hide();
				  $( ".div_alerta" ).animate({
				    height: "toggle"
				  }, 500, function() {
				    	setTimeout(function(){
				    		location.reload();
				    	}, 5000);
				  });
			}, 3000);
		}
		
	}
	$( "#nombre" ).blur(function() {
		 	if($("#nombre").val()!=""){
				$("#nombre").attr("class","form-control");
			}
	});
	$( "#telefono" ).blur(function() {
		 	if($("#telefono").val()!=""){
				$("#telefono").attr("class","form-control");
			}
	});
	$( "#email" ).blur(function() {
		 	if($("#email").val()!="" || validarEmail(e_)==true){
				$("#email").attr("class","form-control");
			}
			if(validarEmail($("#email").val())==false){
				$("#email").attr("class","form-control inputError");
			}
	});
	$( "#msj" ).blur(function() {
		 	if($("#msj").val()!=""){
				$("#msj").attr("class","form-control");
			}
	});

function validarEmail(email) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) ){
        return false;
    }else{
    	return true;
    }
}

function mas(argument) {
	var piv = $(argument).attr("data-field");
	var val = $("#"+piv).val();
	$("#"+piv).val(parseInt(val)+1);
}
function menos(argument) {
	var piv = $(argument).attr("data-field");
	var val = $("#"+piv).val();
	if ((parseInt(val)-1)!=-1) {
		$("#"+piv).val(parseInt(val)-1);	
	}
	
}
function enviar_() {
	var nombre = $("#nombre").val();
	var tele = $("#tel").val();
	var em = $("#email").val();
	var comentario = $("#comment").val();

	if (nombre=="") {
		$("#nombre").css("border","1px solid red");
	}
	if (tele=="") {
		$("#tel").css("border","1px solid red");
	}
	if (em=="") {
		$("#email").css("border","1px solid red");
	}
	if (comentario=="") {
		$("#comment").css("border","1px solid red");
	}

	if (nombre!="" && tele!="" && em!="" && comentario!="") {
		var items = [];
		var elements = document.forms.foo.getElementsByTagName("input");
	    for(var i = 0; i < elements.length; i++)
	    {	

	       if (elements[i].value == "" ) {
	       		items[i] = "0";
	       } else {
	       		items[i] = elements[i].value;
	       }
	    }

	    		items[elements.length] = comentario;

	    $(".loader").show();
			setTimeout(function(){
				$(".loader").hide();
				  $( ".div_alerta" ).animate({
				    height: "toggle"
				  }, 500, function() {
				    	setTimeout(function(){
				    		location.reload();
				    	}, 5000);
				  });
			}, 3000);
	}

}