$( document ).ready(function() {
	$("#usuario").prop("value","");
	$("#usuario").attr("value","");
	$("#usuario").removeClass("is-valid");
	$("#usuario").removeClass("is-invalid");
	$("#contra").prop("value","");
	$("#contra").attr("value","");
	$("#contra").removeClass("is-valid");
	$("#contra").removeClass("is-invalid");
	$(document).on("click",".close",function(){
		console.log("cerrar alerta");
		$(".alert").alert();
	});
    console.log( "ready!" );
});

$(document).on("keyup","#usuario",function(){
	if($("#usuario").val()===""){
		console.log("Nada en usuario");
		$("#usuario").removeClass("is-valid");
		$("#usuario").addClass("is-invalid");
		erroru=true;
	}else{
		$("#usuario").removeClass("is-invalid");
		$("#usuario").addClass("is-valid");
		erroru=false;
	}
});

$(document).on("keyup","#contra",function(){
	if($("#contra").val()===""){
		console.log("Nada en contra");
		$("#contra").removeClass("is-valid");
		$("#contra").addClass("is-invalid");
		erroru=true;
	}else{
		$("#contra").removeClass("is-invalid");
		$("#contra").addClass("is-valid");
		erroru=false;
	}
});

function funcion(){
	var usuario=$("#usuario");
	var contra=$("#contra");
	var erroru=false;
	var errorc=false;
	var error=true;
	// var error=true;
	console.log( "Validando..." );
	if(usuario.val()===""){
		console.log("Nada en usuario");
		usuario.removeClass("is-valid");
		usuario.addClass("is-invalid");
		erroru=true;
	}else{
		usuario.removeClass("is-invalid");
		usuario.addClass("is-valid");
		erroru=false;
	}
	if(contra.val()===""){
		console.log("Nada en contra");
		contra.removeClass("is-valid");
		contra.addClass("is-invalid");
		errorc=true;
	}else{
		contra.removeClass("is-invalid");
		contra.addClass("is-valid");
		errorc=false;
	}

	if(errorc || erroru){
		mostrarErrorLogin();
		console.log("Error");
		error=false;
		// error=false;
	}else{
		console.log(errorc+" && "+erroru);
		console.log("No error");
		error=true;
	}
	// return false;
	return error;
}

function mostrarErrorLogin(){
	var serror="<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
  	serror+="<strong>¡Aviso!</strong> Ingrese todos los campos solicitados.";
  	serror+="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
    serror+="<span aria-hidden='true' id='cerrar-a'>&times;</span>";
  	serror+="</button></div>";
	var merror=$("#msgError");
	$(merror).html(serror);
}

