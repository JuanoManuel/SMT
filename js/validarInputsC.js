$(document).ready(function(){
	$(document).on("change",".validarTelefono",validarTelefono);
	$(document).on("change",".validarTexto",validarTexto);
	$(document).on("change",".validarNumero",validarNumero);
	$(document).on("change","#inputCurp",validarCURP);
	$("#inputCartilla").change(validarCartilla);
	$("#inputRFC").change(validarRFC);
	$("#inputCurp, #inputRFC").on("keyup",function(){
		var x = $(this).val().toUpperCase(); //Remplaza las letras minuscular por mayusculas en los campos de CURP y RFC
		$(this).val(x);
	});
});

function validarTelefono() {
	var elem = $(this);
	if(!elem.val().match(/^\d{10}$/)){
		elem.addClass("is-invalid");
		return false;
	} else {
		elem.removeClass("is-invalid");
		return true;
	}
}

function validarTexto() {
	var elem = $(this);
	if(!elem.val().match(/^\D*$/)){
		elem.addClass("is-invalid");
	} else {
		elem.removeClass("is-invalid");
	}
}

function validarNumero() {
	var elem = $(this);
	if(!elem.val().match(/^\d*$/)){
		elem.addClass("is-invalid");
	} else {
		elem.removeClass("is-invalid");
	}
}

function validarCURP() {
	var val = $("#inputCurp");
	if(val.val().match(/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/)){
		// val.closest("div").find("p").addClass("d-none");
		val.removeClass("is-invalid");
		return true;
	} else {
		// val.closest("div").find("p").removeClass("d-none");
		val.addClass("is-invalid");
		return false;
	}
}

function validarRFC() {
	var val = $("#inputRFC");
	if(val.val().match(/^([A-Z,Ñ,&]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z|\d]{3})$/)){
		val.closest("div").find("p").addClass("d-none");
		val.removeClass("is-invalid");
		return true;
	} else {
		val.closest("div").find("p").removeClass("d-none");
		val.addClass("is-invalid");
		return false;
	}
}

function validarCartilla() {
	var val = $(this);
	if($(val).val().match(/^\D-\d*$/)){
		val.closest("div").find("p").addClass("d-none");
		val.removeClass("is-invalid");
		return true;
	}else {
		val.closest("div").find("p").removeClass("d-none");
		val.addClass("is-invalid");
		return false;
	}
}
