$( document ).ready(function() {
	revisar_login();
});

function revisar_login(){
	var peticion=$.ajax({
		method: "POST",
		url:"php/verificar_login.php",
		async: false
	});
	peticion.done(function (respuesta){
		if (respuesta!="true") {
			window.location.href="error.html";
		}
	})
}
