var idEmpleadoSesion;


function listar_empleados(){
	var peticion=$.ajax({
		method: "POST",
		url:"php/listar_empleados.php"
	});
	peticion.done(function (respuesta){
		$("#respuesta").html(respuesta);
	})
}

function cargar_datos(idEmpleado){
	console.log("id "+idEmpleado);
	cargar_datos_personales(idEmpleado);
	cargar_datos_documentacion(idEmpleado);
	cargar_datos_eyh(idEmpleado);
	cargar_datos_familiares(idEmpleado);
	cargar_datos_escolaridad(idEmpleado);
	cargar_datos_conocimientosg(idEmpleado);
	cargar_datos_empleos(idEmpleado);
	cargar_datos_referencias(idEmpleado);
	cargar_datos_generales(idEmpleado);
	cargar_datos_economicos(idEmpleado);
	cargar_datos_extras(idEmpleado);
}

function cargar_datos_personales(idEmpleado){
	var parametros={
		"idEmpleado" : idEmpleado
	}
	var peticion=$.ajax({
		method : "POST",
		data : parametros,
		url : "php/cargar_datos_personales.php"
	});
	peticion.done(function (respuesta){
		$("#v-pills-datosp").html(respuesta);
		sendIdDireccion();
		enumerar_inputs();
		desactivar_inputs();
	})
}

function cargar_datos_documentacion(idEmpleado){
	var parametros={
		"idEmpleado" : idEmpleado
	}
	var peticion=$.ajax({
		method : "POST",
		data : parametros,
		url : "php/cargar_datos_documentacion.php"
	});
	peticion.done(function (respuesta){
		$("#v-pills-documentacion").html(respuesta);
		desactivar_inputs();
	})
}

function cargar_datos_eyh(idEmpleado) {
	var parametros={
		"idEmpleado" : idEmpleado
	}
	var peticion=$.ajax({
		method : "POST",
		data : parametros,
		url : "php/cargar_datos_eyh.php"
	});
	peticion.done(function (respuesta){
		$("#v-pills-estadoS").html(respuesta);
		desactivar_inputs();
	})
}

function cargar_datos_familiares(idEmpleado){
	var parametros={
		"idEmpleado" : idEmpleado
	}
	var peticion=$.ajax({
		method : "POST",
		data : parametros,
		url : "php/cargar_datos_familiares.php"
	});
	peticion.done(function (respuesta){
		$("#v-pills-datosf").html(respuesta);
		numero_hijos_df();
		numero_parientes_df();
		desactivar_inputs();
	})
}

function cargar_datos_escolaridad(idEmpleado){
	var parametros={
		"idEmpleado" : idEmpleado
	}
	var peticion=$.ajax({
		method : "POST",
		data : parametros,
		url : "php/cargar_datos_escolaridad.php"
	});
	peticion.done(function (respuesta){
		$("#v-pills-escolaridad").html(respuesta);
		contar_escolaridad();
		desactivar_inputs();
	})
}

function cargar_datos_conocimientosg(idEmpleado){
	var parametros={
		"idEmpleado" : idEmpleado
	}
	var peticion=$.ajax({
		method : "POST",
		data : parametros,
		url : "php/cargar_datos_conocimientosg.php"
	});
	peticion.done(function (respuesta){
		$("#v-pills-conocimientosg").html(respuesta);
		contar_software();
		desactivar_inputs();
	})
}

function cargar_datos_empleos(idEmpleado){
	var parametros={
		"idEmpleado" : idEmpleado
	}
	var peticion=$.ajax({
		method : "POST",
		data : parametros,
		url : "php/cargar_datos_empleos.php"
	});
	peticion.done(function (respuesta){
		$("#v-pills-empleoaya").html(respuesta);
		nombre_empleos();
		desactivar_inputs();
	})
}
function cargar_datos_referencias(idEmpleado){
	var parametros={
		"idEmpleado" : idEmpleado
	}
	var peticion=$.ajax({
		method : "POST",
		data : parametros,
		url : "php/cargar_datos_referencias.php"
	});
	peticion.done(function (respuesta){
		$("#v-pills-referenciasp").html(respuesta);
		nombres_referencias();
		desactivar_inputs();
	})
}
function cargar_datos_generales(idEmpleado){
	var parametros={
		"idEmpleado" : idEmpleado
	}
	var peticion=$.ajax({
		method : "POST",
		data : parametros,
		url : "php/cargar_datos_generales.php"
	});
	peticion.done(function (respuesta){
		$("#v-pills-datosg").html(respuesta);
		desactivar_inputs();
	})
}
function cargar_datos_economicos(idEmpleado){
	var parametros={
		"idEmpleado" : idEmpleado
	}
	var peticion=$.ajax({
		method : "POST",
		data : parametros,
		url : "php/cargar_datos_economicos.php"
	});
	peticion.done(function (respuesta){
		$("#v-pills-datose").html(respuesta);
		desactivar_inputs();
	})
}

function cargar_datos_extras(idEmpleado){
	var parametros={
		"idEmpleado" : idEmpleado
	}
	var peticion=$.ajax({
		method : "POST",
		data : parametros,
		url : "php/cargar_datos_extras.php"
	});
	peticion.done(function (respuesta){
		$("#v-pills-datoex").html(respuesta);
		desactivar_inputs();
	})
}
