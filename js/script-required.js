/**
* @file script-required.js
* @author Juan Manuel Hernandez Hernandez
* @date 21/02/2018
* @brief script que controla todos los atributos required del form en la solicitud de empleo
**/


//funcion main
$(document).ready(function() {
});

function ingresos() {
	if($("#checkIngresos2").is(":checked")){
		$("#inputMontoIngresos").prop("required",true);
	}
}