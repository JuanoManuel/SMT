/**
* @author Juan Manuel Hernandez Hernandez Jorge Arturo Cedillo Gonzalez  Alberto Paredes Rivas
* @file script-menu.js
* @brief documento que contiene todas las funciones relacionadas con la solicitud del menu.html
**/


var numEscuelas = 0;

//Declaracion de funciones
$(document).ready(function(){
	today = new Date();
	var mes = 0;
	var dia = 0;
	/* if que agrega un 0 al mes encaso de que sea un mes menor a 10 y poder agregar la fecha a la propiedad min */
	if((today.getMonth()+1)<10)
		mes = "0"+(today.getMonth()+1);
	else
		mes = today.getMonth()+1;
	if((today.getDate())<10)
		dia = "0"+(today.getDate());
	else
		dia = today.getDate();
	$("#inputModelo").attr("max",""+today.getFullYear()); // fija la fecha limite para el campo de modelo del auto
	$("#FechaTrabajar").attr("min",""+today.getFullYear()+"-"+mes+"-"+dia); // fija la fecha minima a el dia de hoy
	$(document).on("click","#btnAgregarEscuela",limitarAniosEscuela);
	$("#inputFechaNacimiento").attr("max",""+(today.getFullYear()-15)+"-01-01"); //fija que la edad minima aceptada sea 15 años
	var valor = $("div.agregarEscuela div.container").length;
	$("input#numEscuela").val(valor);
	valor = $("div.agregarEmpleo div.container").length;
	$("input#numEmpleo").val(valor);
	$("#inputOtroSistemaOperativo").fadeOut();
	$("#selectOtrosOS").fadeOut();
	$("label[for='inputOtroSistemaOperativo']").fadeOut();
	$("label[for='inputOtraRedSocial']").fadeOut();
	$("#inputOtraRedSocial").fadeOut();
	$("#selectOtrosRS").fadeOut();
	$("label[for='inputOtraAplicacion']").fadeOut();
	$("#inputOtraAplicacion").fadeOut();
	$("#selectOtrosApp").fadeOut();
	habilitarCamposFamiliares();

	llenarTablas();
	llenarSelectEstado();
	llenarSelectNacionalidad();
	llenarSelectIdiomas();
	updateTextAreaSalud();
	habilitarOtroPuesto();
	block=false;
	$(document).on("change","#inputPuesto",habilitarOtroPuesto);
    $(document).on("change","#inputSexo",habilitarPreguntaEmbarazo);
    $(document).on("change","#checkExtranjero",habilitarCamposExtranjero);
    $(document).on("change","#checkLicencia",habilitarCamposLicencia);
    $(document).on("change","#checkOtrosOS",habilitarCamposOS);
    $(document).on("change","#checkOtrosRS",habilitarCamposRS);
    $(document).on("change","#checkOtrosApp",habilitarCamposApp);
    $(document).on("change","#checkPedirInformes1, #checkPedirInformes2",habilitarCamposInformes);
    $(document).on("click","#checkIngresos1",habilitarCamposIngresos);
    $(document).on("click","#checkIngresos2",habilitarCamposIngresos);
    $(document).on("click","#checkConyugue1",habilitarCamposConyuge);
    $(document).on("click","#checkConyugue2",habilitarCamposConyuge);
    $(document).on("click","#checkCasa1",habilitarCamposCasa);
    $(document).on("click","#checkCasa2",habilitarCamposCasa);
    $(document).on("click","#checkRenta1",habilitarCamposRenta);
    $(document).on("click","#checkRenta2",habilitarCamposRenta);
    $(document).on("click","#checkAuto1",habilitarCamposAuto);
    $(document).on("click","#checkAuto2",habilitarCamposAuto);
    $(document).on("click","#checkDeudas1",habilitarCamposDeuda);
    $(document).on("click","#checkDeudas2",habilitarCamposDeuda);
    $(document).on("change","#selectSaberEmpleo",habilitarCamposSaberEmpleo);
    $(document).on("click","#checkPari1",habilitarCamposPari);
    $(document).on("click","#checkPari2",habilitarCamposPari);
    $(document).on("click","#checkAfian1",habilitarCamposAfian);
    $(document).on("click","#checkAfian2",habilitarCamposAfian);
    $(document).on("click","#checkSind1",habilitarCamposSind);
    $(document).on("click","#checkSind2",habilitarCamposSind);
    $(document).on("click","#checkSegurovi1, #checkSegurovi2",habilitarCamposSeguro);
    $(document).on("click","#checkViajar1, #checkViajar2",habilitarCamposViajar);
    $(document).on("click","#checkResidencia1, #checkResidencia2",habilitarCamposResidencia);
    $(document).on("click","#btnAgregarEscuela",llenarSelectEscuela);
    $(document).on("change","div.agregarEscuela .selectEstado",llenarMunicipio);
    $(document).on("change","div.agregarEscuela .selectDelegacion",llenarNombreEscuela);
    $(document).on("change","div.agregarEscuela .selectEstado",llenarNombreEscuela);
    $(document).on("change","div.agregarEscuela .selectNivelEscuela",llenarNombreEscuela);
    $(document).on("change","div.agregarEscuela .selectDelegacion",sendIdEscuela);
    $(document).on("change","div.agregarEscuela .selectEstado",sendIdEscuela);
    $(document).on("change","div.agregarEscuela .selectNivelEscuela",sendIdEscuela);
    $(document).on("change","div.agregarEscuela .inputEscuela",sendIdEscuela);
    $(document).on("click","#agregarIdioma",llenarNewSelectIdiomas);
    $(document).on("change","#inputEstado",llenarMunicipioG);
    $(document).on("change","#inputMunicipio",llenarColonia);
    $(document).on("change","#inputColonia, #inputEstado, #inputMunicipio, #inputCP",sendIdDireccion);
    $(document).on("change","div.agregarEscuela .selectTipoEscuela",tipoEscuela);
    $(document).on("click","#btnAgregarEscuela",blockSelect);
    $(document).on("change","#inputColonia, #inputEstado, #inputMunicipio",autoCompletarCP);
		$(document).on("change","#inputCurp",validarCURP);
		$(document).on("change","#inputRFC",validarRFC);
		$(document).on("change","#inputNSS",validarNSS);
		$(document).on("change","#inputCartilla",validarCartilla);
		$(document).on("change","#inputCorreo",validarCorreo);
    $(document).on("change","div.agregarEscuela input[name^='inputHorarioEscuelaActual']",validarHorario);
    $(document).on("change","#tablaSalud select", habilitarTextAreaSalud);
    $(document).on("keyup","#inputCurp, #inputRFC",function(){
    	var x = $(this).val().toUpperCase(); //Remplaza las letras minuscular por mayusculas en los campos de CURP y RFC
    	$(this).val(x);
    });
    $(window).scroll(scroll);
    $(document).on("change","div.agregarEmpleo .selectEmpleo",habilitarCamposEmpleo);
    $(document).on("change","select[name^='checkFamiliar']",habilitarDireccionFamiliar);
    $(document).on("change","#inputSexo",habilitarCampoCartillaMilitar);
    $(document).on("change","#inputFechaNacimiento",calcularEdad);
    $("#btnQuitarEscuela").click(function(){
    	if(numEscuelas>0)
    		numEscuelas--; // disminuye el numero de escuelas cuando se borra una escuela
    });
    $(document).on("change","#tablaFamiliares .requerido",obligatorioDatosFamiliares);
    $(document).on("change","#checkDependen5",function(){
    	if($(this).is(":checked")){
    		for(var i=0;i<5;i++){
	    		$("#checkDependen"+i).prop("disabled",true);
	    	}
    	} else {
    		for(var i=0;i<5;i++){
	    		$("#checkDependen"+i).prop("disabled",false);
	    	}
    	}
    });
    $(document).on("change","input[name^='inputAnoinicio'], input[name^='inputAnofinal']",llenaranios);
    $(document).on("click","#btnAgregarEmpleo",limitarInputDate);
    $(document).on("change","#inputFechaNacimiento",limitarInputDate);
    $(document).on("change","#inputFechaNacimiento",limitarEdadHijos);
    $(document).on("change","input[name^='servicioInicio']",actualizarMinInputInicio);
    $(document).on("change","input[name^='inputAnoinicio']",actualizarAnioGraduacion);
    $(document).on("change","#inputEstadoSalud",controlEstadoDeSalud);
    $(document).on("click","#agregarHijos",limitarEdadHijos);
    //$("#formEnviar").submit(validarHorario);
    //$("#formEnviar").submit(validarCartilla);
    //$("#formEnviar").submit(validarCorreo);
    //$("#formEnviar").submit(validarNSS);
    //$("#formEnviar").submit(validarRFC);
});
var block;

/**
* @brief coloca un limite el los valores de la edad de los hijos
**/
function limitarEdadHijos() {
	var val = $("#inputEdad").val();
	$(".inputEdadHijo").prop("max",val-11);
}

/**
* @brief controla las acciones que se realizan cuando se cambia el valor del estado de salud actual
**/
function controlEstadoDeSalud() {
	var elem = $(this);

	if(elem.val()=="Malo"){
		$("div.detallesSalud").fadeIn();
		$("div.detallesSalud input").prop("required",true);
		$("div.detallesSalud input").prop("disabled",false);
	} else {
		$("div.detallesSalud").fadeOut();
		$("div.detallesSalud input").prop("required",false);
		$("div.detallesSalud input").prop("disabled",true);
	}
}

/**
* @bref Funcion que actualiza el atributo min del input año de graduacion
**/
function actualizarAnioGraduacion() {
	var elem = $(this);
	var fecha = elem.val();
	elem.closest("div.container").find("input[name^='inputAnofinal']").attr("min",fecha);
}

/**
* @brief Funcion que actualiza el valor minimo del input termino de prestar sus servicios cuando se llena el campo
* 		inicio a prestar sus serviciosS
**/
function actualizarMinInputInicio() {
	var fecha = $(this).val();
	var valores = fecha.split("-");
	var year = parseInt(valores[0]);
	var mes = valores[1];
	var dia = valores[2];
	$("input[name^='servicioFinal']").attr("min",""+year+"-"+mes+"-"+dia);
}

/**
* @brief funcion que limita los campos de empezo y termino a prestar servicios de la seccion de empleos
**/
function limitarInputDate() {
	var today = new Date();
	var fecha = $("#inputFechaNacimiento").val();
	var valores = fecha.split("-");
	var ano = parseInt(valores[0]);
	var mes = valores[1];
	var dia = valores[2];
	if((today.getMonth()+1)<10)
		mes2 = "0"+(today.getMonth()+1);
	else
		mes2 = today.getMonth()+1;
	if(today.getDate()<10)
		dia2 = "0" + today.getDate();
	else
		dia2 = today.getDate();
	$("input[name^='servicioInicio']").attr("min",""+(ano+15)+"-"+mes+"-"+dia);
	$("input[name^='servicioInicio']").attr("max",""+today.getFullYear()+"-"+mes2+"-"+dia2);
	$("input[name^='servicioFinal']").attr("min",""+(ano+15)+"-"+mes+"-"+dia);
	$("input[name^='servicioFinal']").attr("max",""+today.getFullYear()+"-"+mes2+"-"+dia2);
}

/**
* @brief Limita los años maximos a introducir en los campos de año de inicio y año de graduacion en escuela
**/
function limitarAniosEscuela() {
	today = new Date();
	$("input[name^='inputAnoinicio']").attr("max",""+(today.getFullYear()-1));
	$("input[name^='inputAnofinal']").attr("max",""+today.getFullYear());
}
/**
* @brief LLenado automatico del campo años de la seccion de escuelas
**/
function llenaranios() {
	var elem = $(this);
	var inicio = elem.closest(".container").find("[name^='inputAnoinicio']").val();
	var final = elem.closest(".container").find("[name^='inputAnofinal']").val();
	var res = final - inicio;
	if(res>=0){
		elem.closest(".container").find("[name^='inputAnos']").val(final-inicio);
		elem.closest(".container").find("[name^='inputAnos']").removeClass("is-invalid");
	}
	else
		elem.closest(".container").find("[name^='inputAnos']").addClass("is-invalid");

}

/**
* @brief Calcula la edad tomando en cuenta la fecha de nacimiento
**/
function calcularEdad() {
	var elem = $("#inputFechaNacimiento").val();
	var valores = elem.split("-");
	var ano = parseInt(valores[0]);
	var mes = parseInt(valores[1]) -1;
	var dia = parseInt(valores[2]);
	fechaNacimiento = new Date(ano,mes,dia);
	today = new Date();
	anoToday = today.getFullYear();
	mesToday = today.getMonth() + 1;
	diaToday = today.getDate();
	var edad = anoToday - fechaNacimiento.getFullYear();
	if((fechaNacimiento.getMonth()+1)>mesToday){
		edad--;
	}
	if((fechaNacimiento.getMonth()+1)==mesToday && fechaNacimiento.getDate()>diaToday){
		edad--;
	}
	$("#inputEdad").val(edad);
}

/**
* @brief oculta los campos de direccion y ocupacion en la tabla de familiares en caso de que los familiares sean fallidos
**/
function habilitarCamposFamiliares() {
	var checkBoxes = $("#tablaFamiliares select.requerido");
	for(var i=0;i<checkBoxes.length;i++){
		if($(checkBoxes[i]).val()=='Si'){
			$(checkBoxes[i]).closest("tr").find("td input[name^='inputDomicilioFamilia']").fadeIn();
			$(checkBoxes[i]).closest("tr").find("td input[name^='inputFamiliarOcupacion']").fadeIn();
			$(checkBoxes[i]).closest("tr").find("td input[name^='inputDomicilioFamilia']").prop("required",true);
			$(checkBoxes[i]).closest("tr").find("td input[name^='inputFamiliarOcupacion']").prop("required",true);
		} else {
			$(checkBoxes[i]).closest("tr").find("td input[name^='inputDomicilioFamilia']").fadeOut();
			$(checkBoxes[i]).closest("tr").find("td input[name^='inputFamiliarOcupacion']").fadeOut();
			$(checkBoxes[i]).closest("tr").find("td input[name^='inputDomicilioFamilia']").prop("required",false);
			$(checkBoxes[i]).closest("tr").find("td input[name^='inputFamiliarOcupacion']").prop("required",false);
		}
	}
	var elemt = $("#checkFamiliar3");
	if($(elemt).val()=='Si'){
		$(elemt).closest("tr").find("td input[name^='inputDomicilioFamilia']").fadeIn();
		$(elemt).closest("tr").find("td input[name^='inputFamiliarOcupacion']").fadeIn();
	} else {
		$(elemt).closest("tr").find("td input[name^='inputDomicilioFamilia']").fadeOut();
		$(elemt).closest("tr").find("td input[name^='inputFamiliarOcupacion']").fadeOut();
	}
}

/**
*@brief deshabilita el nivel de obligatorio en caso de que el familiaer este fallido
**/
function obligatorioDatosFamiliares(){
	var select = $(this);
	if(select.val()=="Si"){
		select.closest("tr").find("td input[name^='inputDomicilioFamilia']").prop("required",true);
		select.closest("tr").find("td input[name^='inputFamiliarOcupacion']").prop("required",true);
	}
	else {
		select.closest("tr").find("td input[name^='inputDomicilioFamilia']").prop("required",false);
		select.closest("tr").find("td input[name^='inputFamiliarOcupacion']").prop("required",false);
	}
}


/**
*@brief habilita y deshabilita el campo de cartilla militar dependiendo del sexo que se especifique en el campo de sexo
**/
function habilitarCampoCartillaMilitar() {
	var sexo = $("#inputSexo");
	var val = $("#inputCartilla");
	if (sexo.val()!="F") {
		$("#inputCartilla").prop("disabled",false);
		val.closest("div").find("p").addClass("d-none");
		val.removeClass("is-invalid");
	} else {
		$("#inputCartilla").prop("disabled",true);
	}
}

/**
* @brief  En la seccion de datos familiares, si el familiar esta vivo se habilita el campo de direccion
* en otro caso se deshabilita
**/
function habilitarDireccionFamiliar() {
	var select = $(this);
	if(select.val()=="Si"){
		select.closest("tr").find("td input[name^='inputDomicilioFamilia']").fadeIn();
		select.closest("tr").find("td input[name^='inputFamiliarOcupacion']").fadeIn();
	}
	else {
		select.closest("tr").find("td input[name^='inputDomicilioFamilia']").fadeOut();
		select.closest("tr").find("td input[name^='inputFamiliarOcupacion']").fadeOut();
	}
}

function validarHorario() {
	var val = $(this);
	console.log(numEscuelas);
	if(numEscuelas!=0){
		if(val.val().match(/^\d{2}:\d{2}-\d{2}:\d{2}$/)){
			val.closest("div").find("p").addClass("d-none");
			val.removeClass("is-invalid");
			return true;
		} else {
			val.closest("div").find("p").removeClass("d-none");
			val.addClass("is-invalid");
			return false;
		}
	}
}

function validarCorreo() {
	var val = $(this);
	if($(val).val().match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
		val.closest("div.col-auto").find("p").addClass("d-none");
		val.removeClass("is-invalid");
		return true;
	} else {
		val.closest("div.col-auto").find("p").removeClass("d-none");
		val.addClass("is-invalid");
		return false;
	}
}

function validarCartilla() {
	var val = $(this);
	if(val.val()!=""){
		if(val.val().match(/^\D-\d{1,}$/)){
			val.closest("div").find("p").addClass("d-none");
			val.removeClass("is-invalid");
			return true;
		}else {
			val.closest("div").find("p").removeClass("d-none");
			val.addClass("is-invalid");
			return false;
		}
	} else {
		val.closest("div").find("p").addClass("d-none");
		val.removeClass("is-invalid");
	}
}

function llenarTablas(){
	var trs = $("#tablaTelefonos tbody tr").length;
	if(trs==0)
		$("#tablaTelefonos tbody").html("<tr class='noTR'><td class='align-middle' colspan='3'><p class='text-center'>Agrega telefonos a la tabla usando el boton AGREGAR TELEFONOS</p></td></tr>");
	trs = $("#tablaHijos tbody tr").length;
	if(trs==0)
		$("#tablaHijos tbody").html("<tr class='noTR'><td class='align-middle' colspan='3'><p class='text-center'>Sin hijos</p></td></tr>");
	trs = $("#tablaIdiomas tbody tr").length;
	if(trs==0)
		$("#tablaIdiomas tbody").html("<tr class='noTR'><td class='align-middle' colspan='3'><p class='text-center'>No hay Idiomas</p></td></tr>");
	trs = $("#tablaSoftware tbody tr").length;
	if(trs==0)
		$("#tablaSoftware tbody").html("<tr class='noTR'><td class='align-middle' colspan='3'><p class='text-center'>Agrege aquí cualquier otro software que maneje y que no se haya mencionado arriba.</p></td></tr>");
}

function habilitarCamposEmpleo() {
	var $this = $(this);
	if($this.val()=="actual"){
		$(".servicioFinal, .inputMotivo").prop("required",false);
		$this.closest("div.container").find(".terminoPrestar").fadeOut();
	} else if($this.val()=="anterior"){
		$this.closest("div.container").find(".terminoPrestar").fadeIn();
		$(".servicioFinal, .inputMotivo").prop("required",true);
	}
}

function validarNSS(){
	var val = $("#inputNSS");
	if(val.val().match(/^\d{11}$/)){
		val.closest("div").find("p").addClass("d-none");
		val.removeClass("is-invalid");
		return true;
	} else {
		val.closest("div").find("p").removeClass("d-none");
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

function validarCURP() {

	var val = $("#inputCurp");
	if(val.val().match(/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/)){
		val.closest("div").find("p").addClass("d-none");
		val.removeClass("is-invalid");
		return true;
	} else {
		val.closest("div").find("p").removeClass("d-none");
		val.addClass("is-invalid");
		return false;
	}
}

function updateTextAreaSalud() {
	var inputs = $("#tablaSalud tbody select");
	for(var i=0;i<inputs.length;i++){
		var val = $(inputs[i]);
		if($(val).val()=='Si')
			$(val).closest("tr").find("textarea").prop("disabled",false);
		else
			$(val).closest("tr").find("textarea").prop("disabled",true);
	}
}

function habilitarTextAreaSalud() {
	var val = $(this);
	if($(val).val()=='Si')
		$(val).closest("tr").find("textarea").prop("disabled",false);
	else
		$(val).closest("tr").find("textarea").prop("disabled",true);

}

function habilitarOtroPuesto(){
	var opc = $("#inputPuesto").val();

	if(opc=="Otros"){
		$("#otroPuesto").fadeIn();
		$("#inputOtroPuesto").prop("disabled",false);
	} else {
		$("#otroPuesto").fadeOut();
		$("#inputOtroPuesto").prop("disabled",true);
	}
}

function autoCompletarCP() {
	var estado = $("#inputEstado").val();
	var municipio = $("#inputMunicipio").val();
	var colonia = $("#inputColonia").val();
	var valor = $(this).val();
	if(estado!="" && municipio!="" && colonia!=""){
		$.ajax({
			url: 'php/getCP.php',
			type: 'GET',
			data: {"estado":estado,"municipio":municipio,"colonia":colonia,"valor":valor},
			cache: false,
			success: function(response) {
				$("#inputCP").html(response);
				sendIdDireccion();
			}
		});
	}
}

function sendIdDireccion() {
	var estado = $("#inputEstado").val();
	var municipio = $("#inputMunicipio").val();
	var colonia = $("#inputColonia").val();
	var CP = $("#inputCP").val();
	if(estado!="" && municipio!="" && colonia!="" && CP!=""){
		$.ajax({
			url: 'php/getIdDireccion.php',
			type: 'GET',
			data: {"estado":estado,"municipio":municipio,"colonia":colonia,"CP":CP},
			cache: false,
			success: function(response) {
				$("#idDireccion").attr("value",response);
			}
		});
	}
}


function llenarSelectIdiomas() {
	var arrayIdiomas = "";
	$.ajax({
		url: 'php/arrayIdiomas.php',
		type: 'GET',
		success: function(response){
			arrayIdiomas = response.split(',');
		}
	});
	$.ajax({
		url: 'php/arrayIdIdiomas.php',
		type: 'GET',
		success: function(response){
			var nuevo="<option value='default'>Seleccione una opción</option>";
			arrayIdIdiomas = response.split(',');
			for(var i=0;i<arrayIdiomas.length;i++){
				nuevo += "<option value='"+arrayIdIdiomas[i]+"'>"+arrayIdiomas[i]+"</option>";
			}
			$("select.inputIdioma").html(nuevo);
		}
	});
}

function llenarNewSelectIdiomas() {
	console.log("Entre a funcion");
	$.ajax({
		url: 'php/arrayIdiomas.php',
		type: 'GET',
		success: function(response){
			console.log("Traje datos");
			arrayIdiomas = response.split(',');
			imprimirIdiomas(arrayIdiomas);
		},
		error: function(response){
			console.log("Error");
		}
	});
}

function imprimirIdiomas(arrayIdiomas) {
	$.ajax({
		url: 'php/arrayIdIdiomas.php',
		type: 'GET',
		success: function(response){
			console.log("Empece a Imprimi datos");
			var nuevo="<option value='default'>Seleccione una opción</option>";
			arrayIdIdiomas = response.split(',');
			for(var i=0;i<arrayIdiomas.length;i++){
				nuevo += "<option value='"+arrayIdIdiomas[i]+"'>"+arrayIdiomas[i]+"</option>";
			}
			$("#tablaIdiomas tr:last-child select.inputIdioma").html(nuevo);
			console.log("Termine de imprimir datos");
		}
	});
}

function validarNombre() {
	var resp = true;
	var num = $("#tablaContactos tbody tr").length;
	for(var i=1; i<=num; i++){
		if($("#NombreCE"+i).val()!=""){
			if($("#ParentescoCE"+i).val()=="" || $("#TelefonoCE"+i).val()==""){
				window.alert("Por favor, Termine de llenar la tabla de Contactos de emergencia");
				resp = false;
				break;
			} else {
				resp = true;
			}
		} else {
			if($("#ParentescoCE"+i).val()!="" || $("#TelefonoCE"+i).val()!=""){
				window.alert("Por favor, Termine de llenar la tabla de Contactos de emergencia");
				resp = false;
				break;
			} else {
				resp = true;
			}
		}
	}

	return resp;

}

/**
* @brief funcion que bloquea el input de escuela actual dependiendo de si yya hay una escuela actual
**/
function blockSelect(){
	if (block) {
		$("div.agregarEscuela div.container:last-child select.selectTipoEscuela").attr("readonly",true);
	}
}
/**
* @brief funcion que controla que inputs se muestran dependiendo de si la escuela es actual o no
**/
function tipoEscuela(){
	var num = $(":focus").closest("div.container").attr("value");
	var val = $("#selectTipoEscuela"+num).val();
	if(val=='Si'){
		$("div.agregarEscuela div.container[value='"+num+"'] .escuelaAnterior").addClass("d-none");
		$("div.agregarEscuela div.container[value='"+num+"'] .escuelaActual").removeClass("d-none");
		$("div.agregarEscuela div.container[value='"+num+"'] div.curso").addClass("col-auto");
		$("div.agregarEscuela div.container[value='"+num+"'] div.curso").removeClass("col-2");
		$("div.agregarEscuela div.container[value='"+num+"'] div.grado").addClass("col-2");
		$("div.agregarEscuela div.container[value='"+num+"'] div.grado").removeClass("col-auto");
		$("div.agregarEscuela div.container[value='"+num+"'] .escuelaAnterior input").attr("required",false);
		$("div.agregarEscuela div.container[value='"+num+"'] .escuelaAnterior input").attr("disabled",true);
		$("div.agregarEscuela div.container[value='"+num+"'] .escuelaActual input").attr("required",true);
		$("div.agregarEscuela div.container[value='"+num+"'] .escuelaActual input").attr("disabled",false);
		if(block==false){
			block = true;
			$(".selectTipoEscuela:not(:focus)").attr("readonly",true);
		}
	}
	else if(val=='No'){
		$("div.agregarEscuela div.container[value='"+num+"'] .escuelaAnterior").removeClass("d-none");
		$("div.agregarEscuela div.container[value='"+num+"'] .escuelaActual").addClass("d-none");
		$("div.agregarEscuela div.container[value='"+num+"'] div.curso").addClass("col-2");
		$("div.agregarEscuela div.container[value='"+num+"'] div.curso").removeClass("col-3");
		$("div.agregarEscuela div.container[value='"+num+"'] div.grado").addClass("col-auto");
		$("div.agregarEscuela div.container[value='"+num+"'] div.grado").removeClass("col-2");
		$("div.agregarEscuela div.container[value='"+num+"'] .escuelaAnterior input").attr("required",true);
		$("div.agregarEscuela div.container[value='"+num+"'] .escuelaAnterior input").attr("disabled",false);
		$("div.agregarEscuela div.container[value='"+num+"'] .escuelaActual input").attr("required",false);
		$("div.agregarEscuela div.container[value='"+num+"'] .escuelaActual input").attr("disabled",true);
		if(block==true){
			block=false;
			$(".selectTipoEscuela").attr("readonly",false);
		}
	}
	else {
		window.alert("El valor del select 'Actualmete esta estudiando en esta institución?' no es valido");
	}
}

function llenarSelectNacionalidad() {
	$.ajax({
		url: 'php/nacionalidad.php',
		type: 'GET',
		success: function(response){
			$("#inputNacionalidad").html(response);
		}
	});
}

function llenarColonia() {
	var estado = $("#inputEstado").val();
	var municipio = $("#inputMunicipio").val();
	$.ajax({
		url: 'php/colonia.php',
		type: 'GET',
		data: {"estado":estado,"municipio":municipio},
		cache: false,
		success: function(response) {
			$("#inputColonia").html(response);
		}
	});
}

function llenarMunicipioG() {
	var estado = $("#inputEstado").val();
	$.ajax({
		url: 'php/municipioDireccion.php',
		type: 'GET',
		data: { "estado":estado},
		cache: false,
		success: function(response) {
			$("#inputMunicipio").html(response);
			$("#inputColonia").html("<option value='default'>Seleccione una opción</option>");
		}
	});
}

function llenarSelectEstado() {
	$.ajax({
		url: 'php/Estados.php',
		type: 'GET',
		success: function(response) {
			$("#inputEstado").html(response);
		}
	});
}

function sendIdEscuela() {
	var num = $(":focus").closest("div.container").attr("value");
	var municipio = $("select[name='selectDelegacion"+num+"']").val();
	var nivel = $("select[name='selectNivelEscuela"+num+"']").val();
	var estado = $("select[name='selectEstado"+num+"']").val();
	var nombre = $("select[name='inputEscuela"+num+"']").val();
	if(municipio!="default" && nivel!="default" && estado!="default" && nombre!="default"){
		$.ajax({
			url: 'php/getIdEscuela.php',
			type: 'GET',
			data: {"nivel":nivel,"estado":estado,"municipio":municipio,"nombre":nombre},
			cache: false,
			success: function(response) {
				$("#idEscuela"+num).attr("value",response);
			}
		});
	}
}

function llenarNombreEscuela() {
	var num = $(":focus").closest("div.container").attr("value");
	var municipio = $("select[name='selectDelegacion"+num+"']").val();
	var nivel = $("select[name='selectNivelEscuela"+num+"']").val();
	var estado = $("select[name='selectEstado"+num+"']").val();
	if(municipio!="default" && nivel!="default" && estado!="default"){
		$.ajax({
			url: 'php/nombreEscuela.php',
			type: 'GET',
			data: {"estado":estado,"municipio":municipio,"nivel":nivel},
			cache: false,
			success: function(response) {
				$("select[name='inputEscuela"+num+"']").html(response);
			}
		});
	}
}

function llenarMunicipio() {
	var estado = $(":focus").val();
	var num = $(":focus").closest("div.container").attr("value");
	$.ajax({
		url: 'php/municipioEscuela.php',
		type: 'GET',
		data: { "estado":estado},
		cache: false,
		success: function(response) {
			$("select[name='selectDelegacion"+num+"']").html(response);
		}
	});

}

function llenarSelectEscuela(){
	if(numEscuelas == 0){
		numEscuelas++;
		$.ajax({
			data: '',
			url: 'php/estadoEscuela.php',
			type: 'GET',
			beforeSend: '',
			success: function(response) {
				$("select[name^='selectEstado']").html(response);
			}
		});
		$.ajax({
			data: '',
			url: 'php/nivelEscuela.php',
			type: 'GET',
			beforeSend: '',
			success: function(response) {
				$("select[name^='selectNivelEscuela']").html(response);
			}
		});
	} else {
		numEscuelas++;
		$.ajax({
			data: '',
			url: 'php/estadoEscuela.php',
			type: 'GET',
			beforeSend: '',
			success: function(response) {
				$("select[name^='selectEstado"+numEscuelas+"']").html(response);
			}
		});
		$.ajax({
			data: '',
			url: 'php/nivelEscuela.php',
			type: 'GET',
			success: function(response) {
				$("select[name='selectNivelEscuela"+numEscuelas+"']").html(response);
			}
		});
	}
}

function scroll() {
	var scroll = $(window).scrollTop();
	if(scroll < 125){
		if($("nav#accordion").hasClass("menu") && $("nav#accordion").closest("div").hasClass("col-3")){
			$("nav#accordion").removeClass("menu");
		}
	}
	else if(scroll >= 125) {
		if($("nav#accordion").hasClass("") ){
			$("nav#accordion").toggleClass("menu");
		}
	}
}

function habilitarCamposResidencia() {
	if($("#checkResidencia1").is(':checked')){
		$("#inputRazonesResidencia").prop('disabled',false);
		$("#inputRazonesResidencia").prop('required',true);
	} else if ($("#checkResidencia2").is(':checked')) {
		$("#inputRazonesResidencia").prop('disabled',true);
		$("#inputRazonesResidencia").prop('required',false);
	}
}

function habilitarCamposViajar() {
	if($("#checkViajar1").is(':checked')){
		$("#inputViajar").prop('disabled',false);
		$("#inputViajar").prop('required',true);
	}
	else if ($("#checkViajar2").is(':checked')) {
		$("#inputViajar").prop('disabled',true);
		$("#inputViajar").prop('required',false);
	}
}

function habilitarCamposSeguro() {
	if($("#checkSegurovi1").is(':checked')){
		$("#inputSeguro").prop('disabled',true);
		$("#inputSeguro").prop('required',false);
	}
	else if($("#checkSegurovi2").is(':checked')){
		$("#inputSeguro").prop('disabled',false);
		$("#inputSeguro").prop('required',true);
	}
}

function habilitarCamposSind() {
	if($("#checkSind1").is(':checked')){
		$("#inputSindCia").prop('disabled',true);
		$("#inputSindCia").prop('required',false);
	}
	else if($("#checkSind2").is(':checked')){
		$("#inputSindCia").prop('disabled',false);
		$("#inputSindCia").prop('required',true);
	}
}

function habilitarCamposAfian() {
	if($("#checkAfian1").is(':checked')){
		$("#inputAfianCia").prop('disabled',true);
		$("#inputAfianCia").prop('required',false);
	}
	else if($("#checkAfian2").is(':checked')){
		$("#inputAfianCia").prop('disabled',false);
		$("#inputAfianCia").prop('required',true);
	}
}

function habilitarCamposPari() {
	if($("#checkPari1").is(':checked')){
		$("#inputParientes").prop('disabled',true);
		$("#inputParientes").prop('required',false);
	}
	else if($("#checkPari2").is(':checked')){
		$("#inputParientes").prop('disabled',false);
		$("#inputParientes").prop('required',true);
	}
}

function habilitarPreguntaEmbarazo() {
	var val = $("#inputSexo").val();
	if(val != "F"){
		$("#checkPreguntaSalud7").prop('disabled',true);
		$("#inputPreguntaSalud7").prop('disabled',true);
	} else if(val == "F"){
		$("#checkPreguntaSalud7").prop('disabled',false);
		$("#inputPreguntaSalud7").prop('disabled',false);
	}
}

function habilitarCamposExtranjero(){
	if($("#checkExtranjero").is(':checked'))
		$("#inputDocExtranjero").prop('disabled',false);
	else
		$("#inputDocExtranjero").prop('disabled',true);
}

function habilitarCamposLicencia() {
	if($("#checkLicencia").is(':checked')){
		$("#inputTipoLicencia").prop('disabled',false);
		$("#inputLicencia").prop('disabled',false);
	} else {
		$("#inputTipoLicencia").prop('disabled',true);
		$("#inputLicencia").prop('disabled',true);
	}
}



function habilitarCamposOS() {
	if($("#checkOtrosOS").is(':checked')){
		$("label[for='inputOtroSistemaOperativo']").fadeIn();
		$("#inputOtroSistemaOperativo").fadeIn();
		$("#selectOtrosOS").fadeIn();
	} else {
		$("#inputOtroSistemaOperativo").fadeOut();
		$("#selectOtrosOS").fadeOut();
		$("label[for='inputOtroSistemaOperativo']").fadeOut();
	}
}

function habilitarCamposRS() {
	if($("#checkOtrosRS").is(':checked')){
		$("label[for='inputOtraRedSocial']").fadeIn();
		$("#inputOtraRedSocial").fadeIn();
		$("#selectOtrosRS").fadeIn();
	} else {
		$("label[for='inputOtraRedSocial']").fadeOut();
		$("#inputOtraRedSocial").fadeOut();
		$("#selectOtrosRS").fadeOut();
	}
}

function habilitarCamposApp() {
	if($("#checkOtrosApp").is(':checked')){
		$("label[for='inputOtraAplicacion']").fadeIn();
		$("#inputOtraAplicacion").fadeIn();
		$("#selectOtrosApp").fadeIn();
	} else {
		$("label[for='inputOtraAplicacion']").fadeOut();
		$("#inputOtraAplicacion").fadeOut();
		$("#selectOtrosApp").fadeOut();
	}
}

function habilitarCamposInformes() {
	if($("#checkPedirInformes1").is(':checked')){
		$("#inputRazonesInformes").prop('disabled',true);
		$("#inputRazonesInformes").prop('required',false);
	} else if($("#checkPedirInformes2").is(':checked')) {
		$("#inputRazonesInformes").prop('disabled',false);
		$("#inputRazonesInformes").prop('required',true);
	}
}

function habilitarCamposIngresos() {
	if($("#checkIngresos1").is(':checked')) {
		$("#inputMontoIngresos").prop('disabled',true);
		$("#inputMontoIngresos").prop('required',false);
		$("#inputDescribirIngresos").prop('disabled',true);
		$("#inputDescribirIngresos").prop('required',false);
	} else if($("#checkIngresos2").is(":checked")) {
		$("#inputMontoIngresos").prop('disabled',false);
		$("#inputMontoIngresos").prop('required',true);
		$("#inputDescribirIngresos").prop('disabled',false);
		$("#inputDescribirIngresos").prop('required',true);
	}
}

function habilitarCamposConyuge() {
	if($("#checkConyugue1").is(':checked')){
		$("#inputConyugeDonde").prop('disabled',true);
		$("#inputPercepcionMensual").prop('disabled',true);
		$("#inputConyugeDonde").prop('required',false);
		$("#inputPercepcionMensual").prop('required',false);
	} else if($("#checkConyugue2").is(':checked')) {
		$("#inputConyugeDonde").prop('disabled',false);
		$("#inputPercepcionMensual").prop('disabled',false);
		$("#inputConyugeDonde").prop('required',true);
		$("#inputPercepcionMensual").prop('required',true);
	}
}

function habilitarCamposCasa() {
	if($("#checkCasa1").is(':checked')){
		$("#inputValorAproximado").prop('disabled',true);
		$("#inputValorAproximado").prop('required',false);
	} else if($("#checkCasa2").is(':checked')) {
		$("#inputValorAproximado").prop('disabled',false);
		$("#inputValorAproximado").prop('required',true);
	}
}

function habilitarCamposRenta() {
	if($("#checkRenta1").is(':checked')){
		$("#inputRentaMensual").prop('disabled',true);
		$("#inputRentaMensual").prop('required',false);
	} else if($("#checkRenta2").is(':checked')) {
		$("#inputRentaMensual").prop('disabled',false);
		$("#inputRentaMensual").prop('required',true);
	}
}

function habilitarCamposAuto() {
	if($("#checkAuto1").is(':checked')) {
		$("#inputMarca").prop('disabled',true);
		$("#inputModelo").prop('disabled',true);
		$("#inputMarca").prop('required',false);
		$("#inputModelo").prop('required',false);
	} else if($("#checkAuto2").is(':checked')) {
		$("#inputMarca").prop('disabled',false);
		$("#inputModelo").prop('disabled',false);
		$("#inputMarca").prop('required',true);
		$("#inputModelo").prop('required',true);
	}
}

function habilitarCamposDeuda() {
	if($("#checkDeudas1").is(':checked')){
		$("#inputImporte").prop('disabled',true);
		$("#inputConQuien").prop('disabled',true);
		$("#inputAbono").prop('disabled',true);
		$("#inputImporte").prop('required',false);
		$("#inputConQuien").prop('required',false);
		$("#inputAbono").prop('required',false);
	} else if($("#checkDeudas2").is(':checked')) {
		$("#inputImporte").prop('disabled',false);
		$("#inputConQuien").prop('disabled',false);
		$("#inputAbono").prop('disabled',false);
		$("#inputImporte").prop('required',true);
		$("#inputConQuien").prop('required',true);
		$("#inputAbono").prop('required',true);
	}
}

function habilitarCamposSaberEmpleo() {
	var val = $("#selectSaberEmpleo").val();
	if(val == "otros"){
		$("#inputEspecifique").prop('disabled',false);
		$("#inputEspecifique").prop('required',true);
	}
	else if(val == "Conocidos"){
		$("#inputEspecifique").prop('disabled',false);
		$("#inputEspecifique").prop('required',true);
	}
	else {
		$("#inputEspecifique").prop('disabled',true);
		$("#inputEspecifique").prop('required',false);
	}
}
