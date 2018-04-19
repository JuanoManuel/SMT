/**
* @author Juan Manuel Hernandez Hernandez
* @date 26/02/2018
* @file validarInput.js
* @brief serie de funciones que validan los campos de Numericos Alfanumericos Alfabeticos y de telefonos
**/
$(document).ready(function(){
	$(document).on("change",".validarTelefono",validarTelefono);
	$(document).on("change",".validarTexto",validarTexto);
	$(document).on("change",".validarNumero",validarNumero);
	$(document).on("submit","#formEnviar",validacionFinal);
	$(document).on("change",".validarSueldos",validarSueldos);
});

/*
* @brief Funcion que valida
*/

function validarSueldos(){
	var elem = $(this);
	if(!elem.val().match(/^\d*$/)){
		elem.addClass("is-invalid");
		elem.closest("div.sueldos").find("p").removeClass("d-none");
	} else {
		elem.removeClass("is-invalid");
		elem.closest("div.sueldos").find("p").addClass("d-none");
	}

}


/*
* @brief Funcion que valida telefono
*/
function validarTelefono() {
	var elem = $(this);
	if(!elem.val().match(/^\d{10}$/)){
		elem.addClass("is-invalid");
	} else {
		elem.removeClass("is-invalid");
	}
}

/*
* @brief Funcion que valida Texto
*/
function validarTexto() {
	var elem = $(this);
	if(!elem.val().match(/^\D*$/)){
		elem.addClass("is-invalid");
	} else {
		elem.removeClass("is-invalid");
	}
}

/*
* @brief Funcion que valida Numeros
*/
function validarNumero() {
	var elem = $(this);
	if(!elem.val().match(/^\d*$/)){
		elem.addClass("is-invalid");
	} else {
		elem.removeClass("is-invalid");
	}
}
/*
* @brief Funcion que valida telefonos, numeros y texto antes de enviar el formulario
* @return returna un true si todos los inputs son correctos en caso contrario retorna un false
*/
function  validacionFinal() {
	var textos = $("form.formEnviar .validarTexto");		//Array de todos los input texto a validar
	var telefonos = $("form.formEnviar .validarTelefono");	//Array de todos los input Telefono a validar
	var numeros = $("form.formEnviar .validarNumero");		//Array de todos los input Numero a validar
	var sueldos = $("form.formEnviar .validarSueldos");		//Array de todos los input sueldo a validar
	var horarios = $("form.formEnviar .validarHorario");
	var elemento; //nodo a validar
	var status = true; //variable de control para validar el submit - si es true envia el registro -
	//Comenzamos por recorrer el array de textos y validar si son puros textos//
	//----------------------Validando Texto----------------------------------
	for(var i=0;i<textos.length;i++){
		elemento = $(textos[i]);
		if(elemento.val().match(/^\D*$/)){
			status = true;
		}
		else{
			console.log(elemento.val()+" no es valido");
			status = false;
			elemento.focus();
			window.alert("Texto no valido");
			break;
		}
	}

	//si al terminar de analizar los textos no se encontro error se validaran los telefonos
	//----------------------Validando Telefono---------------------------------
	if(status){
		for(var i=0;i<telefonos.length;i++){
			elemento = $(telefonos[i]);
			if(elemento.val().match(/^\d{10}$|^\d{0}$/)){
				status = true;
			} else {
				console.log(elemento.val()+" no es valido");
				status = false;
				elemento.focus();
				window.alert("Telefono no valido");
				break;
			}
		}
	}

	//si al terminar no se encotraron errores terminaremos por validar los numeros
	//------------------------Validar Numeros--------------------------------
	if(status){
		for(var i=0;i<numeros.length;i++){
			elemento = $(numeros[i]);
			if(elemento.val().match(/^\d*$/)){
				status = true;
			} else {
				status = false;
				elemento.focus();
				window.alert("Numero no valido");
				break;
			}
		}
	}
	//------------------------Validar Sueldos--------------------------------
	if(status){
		for(var i=0;i<sueldos.length;i++){
			elemento = $(sueldos[i]);
			if(!elemento.val().match(/^\d*$/)){
				elemento.addClass("is-invalid");
				elemento.closest("div.sueldos").find("p").removeClass("d-none");
				status = false;
				elemento.focus();
				window.alert("Sueldo no valido");
				break;
			} else {
				elemento.removeClass("is-invalid");
				elemento.closest("div.sueldos").find("p").addClass("d-none");
				status = true;


			}
		}
	}
	//------------------------Validar CURP--------------------------------
	if(status){
		var val = $("#inputCurp");
		if(val.val().match(/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/)){
			val.closest("div").find("p").addClass("d-none");
			val.removeClass("is-invalid");
			status = true;
		} else {
			status = false;
			val.closest("div").find("p").removeClass("d-none");
			val.addClass("is-invalid");
			val.focus();
			window.alert("CURP no valido");
		}
	}

	//------------------------Validar RFC--------------------------------
	if(status){
		var val = $("#inputRFC");
		if(val.val().match(/^([A-Z,Ñ,&]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z|\d]{3})$/)){
			val.closest("div").find("p").addClass("d-none");
			val.removeClass("is-invalid");
			status = true;
		} else {
			val.closest("div").find("p").removeClass("d-none");
			val.addClass("is-invalid");
			status = false;
			val.focus();
			window.alert("RFC no valido");
		}
	}

	//------------------------Validar Numero de seguro social--------------------------------
	if(status){
		var val = $("#inputNSS");
		if(val.val().match(/^\d{11}$/)){
			val.closest("div").find("p").addClass("d-none");
			val.removeClass("is-invalid");
			status = true;
		} else {
			val.closest("div").find("p").removeClass("d-none");
			val.addClass("is-invalid");
			status = false;
			val.focus();
			window.alert("Numero de seguro social no valido");
		}
	}

	//------------------------Validar horario--------------------------------
	if(status){
		console.log(horarios.length);
		if(horarios.length!=0){
			for(var i=0;i<horarios.length;i++){
				var val = $(horarios[i]);
				if(!val.attr("disabled")){
					if(val.val().match(/^\d{2}:\d{2}-\d{2}:\d{2}$/)){
						val.closest("div").find("p").addClass("d-none");
						val.removeClass("is-invalid");
						status = true;
					} else {
						val.closest("div").find("p").removeClass("d-none");
						val.addClass("is-invalid");
						status = false;
						val.focus();
						window.alert("Horario de escuela no valido");
					}
				}
			}
		}
	}

	//------------------------Validar Correo--------------------------------
	if(status) {
		var val = $("#inputCorreo");
		if(val.val().match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
			val.closest("div.col-auto").find("p").addClass("d-none");
			val.removeClass("is-invalid");
			status = true;
		} else {
			val.closest("div.col-auto").find("p").removeClass("d-none");
			val.addClass("is-invalid");
			status = false;
			val.focus();
			window.alert("Correo no valido");
		}
	}

	//------------------------Validar Cartilla--------------------------------
	if(status) {
		var val = $("#inputCartilla");
		if(val.val()!=""){
			if(val.val().match(/^\D-\d{1,}$/)){
				val.closest("div").find("p").addClass("d-none");
				val.removeClass("is-invalid");
				status = true;
			}else {
				val.closest("div").find("p").removeClass("d-none");
				val.addClass("is-invalid");
				status = false;
				val.focus();
				window.alert("Cartilla no valida");
			}
		} else {
			val.closest("div").find("p").addClass("d-none");
			val.removeClass("is-invalid");
		}
	}


	//en caso de que status sea falso se le agrega la clase is-invalid al elemento con el error
	if(!status)
	 	return false;
	else
		return true;


}
