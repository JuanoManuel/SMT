/*
@file acciones_editar.js
@author Paredes Rivas Alberto
@date 01/01/2018
@brief Este archivo controla los comportamientos de edición en el menú de datos del empleado.
*/
var idEmpleado;		//Variable que guarda el identificador del usuario el cual se está visualizando la información

/*
@brief Ejecuta las funciones correspondientes para trabajar con el documento
*/
$( document ).ready(function() {
	desactivar_inputs();

	/*
	@brief Funciones para validar las entradas de información
	*/
	$(document).on("change",".validarTelefono",validarTelefono);
	$(document).on("change",".validarTexto",validarTexto);
	$(document).on("change",".validarNumero",validarNumero);
	/*
	@brief Funciones para autocompletar direcciones
	*/
	$(document).on("change","#inputEstado2",llenarMunicipioG);
  $(document).on("change","#inputMunicipio2",llenarColonia);
  $(document).on("change","#inputColonia2, #inputEstado2, #inputMunicipio2, #inputCP2",sendIdDireccion);
  $(document).on("change","#inputColonia2, #inputEstado2, #inputMunicipio2",autoCompletarCP);

	/**********************************************************************
	Cargando vista de Datos Familiares
	**********************************************************************/
	enumerar_inputs();
	/*
	@brief Función que deshabilita las entradas de información de la ventana 'agregar nuevo hijo' al momento de que se cierre
	@param {string} Nombre del evento que se tiene que detectar para que se ejecute la función
	@param {string} Identificador de la ventana sobre la que actuara la función
	*/
	$(document).on("hidden.bs.modal","#modal_hijos_df", function (e){
		$("#nombre_hijo_nuevo").attr("value","");
		$("#nombre_hijo_nuevo").removeClass("is-invalid");
		$("#nombre_hijo_nuevo").removeClass("is-valid");
		$("#nombre_hijo_nuevo").prop("value","");
		$("#nombre_hijo_nuevo").prop("disabled",true);
		$("#edad_hijo_nueva").attr("value","");
		$("#edad_hijo_nueva").removeClass("is-valid");
		$("#edad_hijo_nueva").removeClass("is-invalid");
		$("#edad_hijo_nueva").prop("value","");
		$("#edad_hijo_nueva").prop("disabled",true);
		$("#nherror").addClass("d-none");
		$("#eherror").addClass("d-none");
	});
	/*
	@brief Habilita las entradas de información de la ventana 'agregar nuevo hijo' al momento de abrirse
	@param {string} Nombre del evento que se tiene que detectar para que se lleve a cabo la función
	@param {string} Identificador de la ventana sobre la que actuara la función
	*/
	$(document).on("show.bs.modal","#modal_hijos_df", function (e){
		$("#nombre_hijo_nuevo").prop("disabled",false);
		$("#edad_hijo_nueva").prop("disabled",false);
	});
	/*
	@brief Deshabilita las entradas de información de la ventana 'modificar parientes' al momento de cerrarse
	@param {string} Nombre del evento que se tiene que detectar para que se ejecute la función
	@param {string} Identificador de la ventana sobre la que actuara la función
	*/
	$(document).on('hidden.bs.modal','#modal_parientes_df', function (e) {
		console.log("escondido");
		$("#nombre_pariente_nuevo").attr("value","");
		$("#nombre_pariente_nuevo").prop("value","");
		$("#nombre_pariente_nuevo").prop("disabled",true);
		$("#nombre_pariente_nuevo").removeClass("is-valid");
		$("#nombre_pariente_nuevo").removeClass("is-invalid");
		$("#ocupacion_pariente_nuevo").attr("value","");
		$("#ocupacion_pariente_nuevo").prop("value","");
		$("#ocupacion_pariente_nuevo").prop("disabled",true);
		$("#ocupacion_pariente_nuevo").removeClass("is-valid");
		$("#ocupacion_pariente_nuevo").removeClass("is-invalid");
		$("#direccion_pariente_nuevo").attr("value","");
		$("#direccion_pariente_nuevo").prop("value","");
		$("#direccion_pariente_nuevo").prop("disabled",true);
		$("#direccion_pariente_nuevo").removeClass("is-valid");
		$("#direccion_pariente_nuevo").removeClass("is-invalid");
		$("#vive_pariente_nuevo").prop("disabled",true);
		$("#operror").addClass("d-none");
		$("#nperror").addClass("d-none");
		$("#dperror").addClass("d-none");
	});
	/*
	@brief Habilita las entradas de información de la ventana 'modificar parientes' al momento de abrirse
	@param {string} Nombre del evento que se tiene que detectar para que se ejecute la función
	@param {string} Identificador de la ventana sobre la que actuara la función
	*/
	$(document).on('show.bs.modal','#modal_parientes_df', function (e) {
		console.log("modal parientes visto");
		$("#nombre_pariente_nuevo").prop("disabled",false);
		$("#ocupacion_pariente_nuevo").prop("disabled",false);
		$("#direccion_pariente_nuevo").prop("disabled",false);
		$("#vive_pariente_nuevo").prop("disabled",false);
	});

	/**********************************************************************
	Cargando vista de Escolaridad
	**********************************************************************/
	contar_escolaridad();
	/*
	@brief Deshabilita todas las entradas de información de la ventana 'agregar nueva escuela' al momento de cerrarse
	@param {string} Nombre del evento que se tiene que detectar para que se ejecute la función
	@param {string} Identificador de la ventana sobre la que actuara la función
	*/
	$(document).on("hidden.bs.modal","#modal_nuevo_escolaridad", function (e) {
		$("#escol-ea-nuevo").prop("disabled",true);
		$("#escol-ea-nuevo").prop("value","");
		$("#escol-ea-nuevo").removeClass("is-valid");
		$("#escol-ea-nuevo").removeClass("is-invalid");
		$("#escol-ai-nuevo").prop("disabled",true);
		$("#escol-ai-nuevo").prop("value","");
		$("#escol-ai-nuevo").removeClass("is-valid");
		$("#escol-ai-nuevo").removeClass("is-invalid");
		$("#escol-af-nuevo").prop("disabled",true);
		$("#escol-af-nuevo").prop("value","");
		$("#escol-af-nuevo").removeClass("is-valid");
		$("#escol-af-nuevo").removeClass("is-invalid");
		$("#escol-nombre-nuevo").prop("disabled",true);
		$("#escol-nombre-nuevo").prop("value","");
		$("#escol-nombre-nuevo").removeClass("is-valid");
		$("#escol-nombre-nuevo").removeClass("is-invalid");
		$("#escol-calle-nuevo").prop("disabled",true);
		$("#escol-calle-nuevo").prop("value","");
		$("#escol-calle-nuevo").removeClass("is-valid");
		$("#escol-calle-nuevo").removeClass("is-invalid");
		$("#escol-noext-nuevo").prop("disabled",true);
		$("#escol-noext-nuevo").prop("value","");
		$("#escol-noext-nuevo").removeClass("is-valid");
		$("#escol-noext-nuevo").removeClass("is-invalid");
		$("#escol-nivel-nuevo").prop("disabled",true);
		$("#escol-nivel-nuevo").prop("value","");
		$("#escol-nivel-nuevo").removeClass("is-valid");
		$("#escol-nivel-nuevo").removeClass("is-invalid");
		$("#escol-anios-nuevo").prop("disabled",true);
		$("#escol-anios-nuevo").prop("value","");
		$("#escol-anios-nuevo").removeClass("is-valid");
		$("#escol-anios-nuevo").removeClass("is-invalid");
		$("#escol-titulo-nuevo").prop("disabled",true);
		$("#escol-titulo-nuevo").prop("value","");
		$("#escol-titulo-nuevo").removeClass("is-valid");
		$("#escol-titulo-nuevo").removeClass("is-invalid");
		$("#escol-ea-error").addClass("d-none");
		$("#escol-ai-error").addClass("d-none");
		$("#escol-af-error").addClass("d-none");
		$("#escol-nombre-error").addClass("d-none");
		$("#escol-calle-error").addClass("d-none");
		$("#escol-noext-error").addClass("d-none");
		$("#escol-nivel-error").addClass("d-none");
		$("#escol-anios-error").addClass("d-none");
		$("#escol-titulo-error").addClass("d-none");
	});
	/*
	@brief Habilita todas las entradas de información de la ventana 'agregar nueva escuela' al momento de abrirse
	@param {string} Nombre del evento que se tiene que detectar para que se ejecute la función
	@param {string} Identificador de la ventana sobre la que actuara la función
	*/
	$(document).on("show.bs.modal","#modal_nuevo_escolaridad", function (e) {
		$("#escol-ea-nuevo").prop("disabled",false);
		$("#escol-ai-nuevo").prop("disabled",false);
		$("#escol-af-nuevo").prop("disabled",false);
		$("#escol-nombre-nuevo").prop("disabled",false);
		$("#escol-calle-nuevo").prop("disabled",false);
		$("#escol-noext-nuevo").prop("disabled",false);
		$("#escol-nivel-nuevo").prop("disabled",false);
		$("#escol-anios-nuevo").prop("disabled",false);
		$("#escol-titulo-nuevo").prop("disabled",false);
	});

$(document).on("change","#escol-ea-nueva",function(e){
	console.log($("#escol-ea-nuevo").val()+"=Si");
	if($("#escol-ea-nuevo").val()=="Si"){
		$(".noesactual").find("input").prop("disabled",true);
		$(".noesactual").addClass("d-none");
		$(".esactual").find("input").prop("disabled",false);
		$(".esactual").removeClass("d-none");
	}else{
		$(".esactual").find("input").prop("disabled",true);
		$(".esactual").addClass("d-none");
		$(".noesactual").find("input").prop("disabled",false);
		$(".noesactual").removeClass("d-none");
	}
});
	/**********************************************************************
	Cargando vista de Conocimientos Generales
	**********************************************************************/
	contar_software();
	/*
	@brief Deshabilita todas las entradas de información de la ventana de 'agregar nuevo idioma' al momento de cerrarse
	@param {string} Nombre del evento que se tiene que detectar para que se ejecute la función
	@param {string} Identificador de la ventana sobre la que actuara la función
	*/
	$(document).on("hidden.bs.modal","#modal_nuevo_idioma", function (e) {
		$("#idioma_nuevo").prop("disabled",true);
		$("#idioma_nuevo").prop("value","");
		$("#idioma_nuevo").removeClass("is-valid");
		$("#idioma_nuevo").removeClass("is-invalid");
		$("#porcentaje_nuevo").prop("disabled",true);
		$("#porcentaje_nuevo").prop("value","");
		$("#porcentaje_nuevo").removeClass("is-valid");
		$("#porcentaje_nuevo").removeClass("is-invalid");
		$("#icerror").addClass("d-none");
		$("#pcerror").addClass("d-none");
	});
	/*
	@brief Deshabilita todas las entradas de información de la ventana 'agregar nuevo software' al momento de cerrarse
	@param {string} Nombre del evento que se tiene que detectar para que se ejecute la función
	@param {string} Identificador de la ventana sobre la que actuara la función
	*/
	$(document).on("hidden.bs.modal","#modal_nuevo_software", function (e) {
		$("#software_nuevo").prop("disabled",true);
		$("#software_nuevo").prop("value","");
		$("#software_nuevo").removeClass("is-valid");
		$("#software_nuevo").removeClass("is-invalid");
		$("#nivel_software_nuevo").prop("disabled",true);
		$("#nivel_software_nuevo").prop("value","");
		$("#nivel_software_nuevo").removeClass("is-valid");
		$("#nivel_software_nuevo").removeClass("is-invalid");
		$("#scerror").addClass("d-none");
		$("#nscerror").addClass("d-none");
	});
	/*
	@brief Habilita todas las entradas de información de la ventana 'agregar nuevo idioma' al momento de abrirse
	@param {string} Nombre del evento que se tiene que detectar para que se ejecute la función
	@param {string} Identificador de la ventana sobre la que actuara la función
	*/
	$(document).on("show.bs.modal","#modal_nuevo_idioma", function (e) {
		$("#idioma_nuevo").prop("disabled",false);
		$("#porcentaje_nuevo").prop("disabled",false);
	});
	/*
	@brief Habilita todas las entradas de información de la ventana 'agregar nuevo software' al momento de abrirse
	@param {string} Nombre del evento que se tiene que detectar para que se ejecute la función
	*/
	$(document).on("show.bs.modal","#modal_nuevo_software", function (e) {
		$("#software_nuevo").prop("disabled",false);
		$("#nivel_software_nuevo").prop("disabled",false);
	});
	/**********************************************************************
	Cargando vista de Empleo
	**********************************************************************/
	nombre_empleos();
	/*
	@brief Habilita el campo de razones en el caso de que el usuario seleccione que no se pueden pedir informes, en caso contrario
	el campo se deshabita
	@param {string} Evento que se tiene que detectar para que se ejecute la función
	*/
	$(".empleo-informes").on("click", function(e){
		console.log("apretado");
		if($(".empleo-informes").prop("checked")==true){
			$(".empleo-razones").prop("disabled",true);
		}else{
			$(".empleo-razones").prop("disabled",false);
		}
	});
	/*
	@brief Deshabilita todas las entradas de información de la ventana 'agregar nuevo empleo' al momento de cerrarse
	@param {string} Evento que se tiene que detectar para que se ejecute la función
	*/
	$("#modal_nuevo_empleo").on("hidden.bs.modal", function (e) {
		$("#empleo-ti-nuevo").prop("disabled",true);
		$("#empleo-ti-nuevo").prop("value","");
		$("#empleo-ti-nuevo").removeClass("is-invalid");
		$("#empleo-ti-nuevo").removeClass("is-valid");
		$("#empleo-tf-nuevo").prop("disabled",true);
		$("#empleo-tf-nuevo").prop("value","");
		$("#empleo-tf-nuevo").removeClass("is-invalid");
		$("#empleo-tf-nuevo").removeClass("is-valid");
		$("#empleo-nombre-nuevo").prop("disabled",true);
		$("#empleo-nombre-nuevo").prop("value","");
		$("#empleo-nombre-nuevo").removeClass("is-invalid");
		$("#empleo-nombre-nuevo").removeClass("is-valid");
		$("#empleo-telefono-nuevo").prop("disabled",true);
		$("#empleo-telefono-nuevo").prop("value","");
		$("#empleo-telefono-nuevo").removeClass("is-invalid");
		$("#empleo-telefono-nuevo").removeClass("is-valid");
		$("#empleo-direccion-nuevo").prop("disabled",true);
		$("#empleo-direccion-nuevo").prop("value","");
		$("#empleo-direccion-nuevo").removeClass("is-invalid");
		$("#empleo-direccion-nuevo").removeClass("is-valid");
		$("#empleo-sueldo-nuevo").prop("disabled",true);
		$("#empleo-sueldo-nuevo").prop("value","");
		$("#empleo-sueldo-nuevo").removeClass("is-invalid");
		$("#empleo-sueldo-nuevo").removeClass("is-valid");
		$("#empleo-puesto-nuevo").prop("disabled",true);
		$("#empleo-puesto-nuevo").prop("value","");
		$("#empleo-puesto-nuevo").removeClass("is-invalid");
		$("#empleo-puesto-nuevo").removeClass("is-valid");
		$("#empleo-njefe-nuevo").prop("disabled",true);
		$("#empleo-njefe-nuevo").prop("value","");
		$("#empleo-njefe-nuevo").removeClass("is-invalid");
		$("#empleo-njefe-nuevo").removeClass("is-valid");
		$("#empleo-pjefe-nuevo").prop("disabled",true);
		$("#empleo-pjefe-nuevo").prop("value","");
		$("#empleo-pjefe-nuevo").removeClass("is-invalid");
		$("#empleo-pjefe-nuevo").removeClass("is-valid");
		$("#empleo-motivo-nuevo").prop("disabled",true);
		$("#empleo-motivo-nuevo").prop("value","");
		$("#empleo-motivo-nuevo").removeClass("is-invalid");
		$("#empleo-motivo-nuevo").removeClass("is-valid");
		$("#empleo-comentario-nuevo").prop("disabled",true);
		$("#empleo-comentario-nuevo").prop("value","");
		$("#empleo-comentario-nuevo").removeClass("is-invalid");
		$("#empleo-comentario-nuevo").removeClass("is-valid");
		$("#tieerror").addClass("d-none");
		$("#tfeerror").addClass("d-none");
		$("#neerror").addClass("d-none");
		$("#teerror").addClass("d-none");
		$("#deerror").addClass("d-none");
		$("#seerror").addClass("d-none");
		$("#peerror").addClass("d-none");
		$("#njeerror").addClass("d-none");
		$("#pjeerror").addClass("d-none");
		$("#meerror").addClass("d-none");
		$("#ceerror").addClass("d-none");
	});
	/*
	@brief Habilita todas las entradas de información de la ventana 'agregar nuevo empleo' al momento de abrirse
	@param {string} Evento que se tiene que registrar para que se ejecute la función
	*/
	$("#modal_nuevo_empleo").on("show.bs.modal", function (e) {
		$("#empleo-ti-nuevo").prop("disabled",false);
		$("#empleo-tf-nuevo").prop("disabled",false);
		$("#empleo-nombre-nuevo").prop("disabled",false);
		$("#empleo-telefono-nuevo").prop("disabled",false);
		$("#empleo-direccion-nuevo").prop("disabled",false);
		$("#empleo-sueldo-nuevo").prop("disabled",false);
		$("#empleo-puesto-nuevo").prop("disabled",false);
		$("#empleo-njefe-nuevo").prop("disabled",false);
		$("#empleo-pjefe-nuevo").prop("disabled",false);
		$("#empleo-motivo-nuevo").prop("disabled",false);
		$("#empleo-comentario-nuevo").prop("disabled",false);
	});

	/**********************************************************************
	Cargando vista de Referencias Personales
	**********************************************************************/
	nombres_referencias();
	/*
	@brief Deshabilita todas las entradas de información de la ventana 'nueva referencia' al momento de cerrarse
	@param {string} Evento que se tiene que detectar para que se ejecute la función
	*/
	$("#modal_nuevo_referencia").on("hidden.bs.modal", function (e){
		$("#rp-nombre-nuevo").prop("disabled",true);
		$("#rp-nombre-nuevo").prop("value","");
		$("#rp-nombre-nuevo").removeClass("is-invalid");
		$("#rp-nombre-nuevo").removeClass("is-valid");
		$("#rp-ocupacion-nuevo").prop("disabled",true);
		$("#rp-ocupacion-nuevo").prop("value","");
		$("#rp-ocupacion-nuevo").removeClass("is-invalid");
		$("#rp-ocupacion-nuevo").removeClass("is-valid");
		$("#rp-domicilio-nuevo").prop("disabled",true);
		$("#rp-domicilio-nuevo").prop("value","");
		$("#rp-domicilio-nuevo").removeClass("is-invalid");
		$("#rp-domicilio-nuevo").removeClass("is-valid");
		$("#rp-telefono-nuevo").prop("disabled",true);
		$("#rp-telefono-nuevo").prop("value","");
		$("#rp-telefono-nuevo").removeClass("is-invalid");
		$("#rp-telefono-nuevo").removeClass("is-valid");
		$("#rp-tiempoc-nuevo").prop("disabled",true);
		$("#rp-tiempoc-nuevo").prop("value","");
		$("#rp-tiempoc-nuevo").removeClass("is-invalid");
		$("#rp-tiempoc-nuevo").removeClass("is-valid");
		$("#nrperror").addClass("d-none");
		$("#orperror").addClass("d-none");
		$("#drperror").addClass("d-none");
		$("#trperror").addClass("d-none");
		$("#crperror").addClass("d-none");
	});
	/*
	@brief Habilita todas las entradas de información de la ventana 'agregar referencia' al momento de abrirse
	@param {string} Evento que se tiene que registrar para que se ejecute la función
	*/
	$("#modal_nuevo_referencia").on("show.bs.modal", function (e){
		$("#rp-nombre-nuevo").prop("disabled",false);
		$("#rp-ocupacion-nuevo").prop("disabled",false);
		$("#rp-domicilio-nuevo").prop("disabled",false);
		$("#rp-telefono-nuevo").prop("disabled",false);
		$("#rp-tiempoc-nuevo").prop("disabled",false);
	});

	/**********************************************************************
	Cargando vista de Datos Generales
	**********************************************************************/

	/*
	@brief Habilita o deshabilita el campo de 'Nombre de la Cia.' de la pregunta '¿Ha estado afianzado?' según sea el caso
	@param {string} Evento que se tiene que registrar para que se ejecute la función
	*/
	$("input[name=dg2]").on("click",function(){
		if($("input[name=dg2]:checked").val()=="Si"){
			$("input[name=dg2cia]").prop("disabled",false);
		}else{
			$("input[name=dg2cia]").prop("disabled",true);
		}
	});
	/*
	@brief Habilita o deshabilita el campo de 'Nombre de la Cia.' de la pregunta  '¿Tiene seguro de vida?' según sea el caso
	@param {string} Evento que se tiene que registrar para que se ejecute la función
	*/
	$("input[name=dg3]").on("click",function(){
		if($("input[name=dg3]:checked").val()=="Si"){
			$("input[name=dg3cia]").prop("disabled",false);
		}else{
			$("input[name=dg3cia]").prop("disabled",true);
		}
	});
	/*
	@brief Habilita o deshabilita el campo de 'Razones' de la pregunta '¿Esta dispuesto a cambiar de lugar de residencia?'
	segun sea el caso
	@param {string} Evento que se tiene que registrar para que se ejecute la función
	*/
	$("input[name=dg4]").on("click",function(){
		if($("input[name=dg4]:checked").val()=="Si"){
			$("input[name=dg4cia]").prop("disabled",false);
		}else{
			$("input[name=dg4cia]").prop("disabled",true);
		}
	});
	/*
	@brief Habilita o deshabilita el campo de 'Nombre' de la pregunta '¿Tiene parientes trabajando en esta empresa?' según sea
	el caso
	@param {string} Evento que se tiene que registrar para que se ejecute la función
	*/
	$("input[name=dg5]").on("click",function(){
		if($("input[name=dg5]:checked").val()=="Si"){
			$("input[name=dg5cia]").prop("disabled",false);
		}else{
			$("input[name=dg5cia]").prop("disabled",true);
		}
	});
	/*
	@brief Habilita o deshabilita el campo de '¿Cuál?' de la pregunta '¿Ha estado afiliado a algun sindicato?' según sea el caso
	@param {string} Evento que se tiene que registrar para que se ejecute la función
	*/
	$("input[name=dg6]").on("click",function(){
		if($("input[name=dg6]:checked").val()=="Si"){
			$("input[name=dg6cia]").prop("disabled",false);
		}else{
			$("input[name=dg6cia]").prop("disabled",true);
		}
	});

	/**********************************************************************
	Cargando vista de Datos Generales
	**********************************************************************/

	/*
	@brief Habilita o deshabilita el campo 'Describalos' de la pregunta '¿Tiene usted otros ingresos?' según sea el caso
	@param {string} Evento que se tiene que registrar para que se ejecute la función
	*/
	$("input[name=de1]").on("click",function(){
		if($("input[name=de1]:checked").val()=="Si"){
			$("input[name=de1des]").prop("disabled",false);
		}else{
			$("input[name=de1des]").prop("disabled",true);
		}
	});
	/*
	@brief Habilita o deshabilita el campo de 'Valor aproximado' de la pregunta '¿Vive en casa propia?' según sea el caso
	@param {string} Evento que se tiene que registrar para que se ejecute la función
	*/
	$("input[name=de2]").on("click",function(){
		if($("input[name=de2]:checked").val()=="Si"){
			$("input[name=de2des]").prop("disabled",false);
		}else{
			$("input[name=de2des]").prop("disabled",true);
		}
	});
	/*
	@brief Habilita o deshabilita los campos de 'Marca' y 'Modelo' de la pregunta '¿Tiene automovil propio?' según sea el caso
	@param {string} Evento que se tiene que registrar para que la función se ejecute
	*/
	$("input[name=de3]").on("click",function(){
		if($("input[name=de3]:checked").val()=="Si"){
			$("input[name=de3des]").prop("disabled",false);
			$("input[name=de3des2]").prop("disabled",false);
		}else{
			$("input[name=de3des]").prop("disabled",true);
			$("input[name=de3des2]").prop("disabled",true);
		}
	});
	/*
	@brief Habilita o deshabilita los campos de '¿Dónde?' y 'Percepción mensual' de la pregunta '¿Su conyúge trabaja?' según sea
	el caso
	@param {string} Evento que se tiene que registrar para que se ejecute la función
	*/
	$("input[name=de5]").on("click",function(){
		if($("input[name=de5]:checked").val()=="Si"){
			$("input[name=de5des]").prop("disabled",false);
			$("input[name=de5des2]").prop("disabled",false);
		}else{
			$("input[name=de5des]").prop("disabled",true);
			$("input[name=de5des2]").prop("disabled",true);
		}
	});
	/*
	@brief Habilita o deshabilita el campo de 'Renta mensual' de la pregunta '¿Paga renta?' según sea el caso
	@param {string} Evento que se tiene que registrar para que se ejecute la función
	*/
	$("input[name=de6]").on("click",function(){
		if($("input[name=de6]:checked").val()=="Si"){
			$("input[name=de6des]").prop("disabled",false);
		}else{
			$("input[name=de6des]").prop("disabled",true);
		}
	})
	/*
	@brief Habilita o deshabilita los campos de '¿Con quién?', 'Importe' y '¿Cuanto abona mensualmente?' de la pregunta
	'¿Tiene deudas?' según sea el caso
	@param {string} Evento que se debe de registrar para que se ejecute la función
	*/
	$("input[name=de7]").on("click",function(){
		if($("input[name=de7]:checked").val()=="Si"){
			$("input[name=de7des]").prop("disabled",false);
			$("input[name=de7des2]").prop("disabled",false);
			$("input[name=de8]").prop("disabled",false);
		}else{
			$("input[name=de7des]").prop("disabled",true);
			$("input[name=de7des2]").prop("disabled",true);
			$("input[name=de8]").prop("disabled",true);
		}
	})
});

/*
@brief Deshabilita todas las entradas de información del documento menuDatos.php
*/
function desactivar_inputs() {
	$("input").prop("disabled",true);
	$("select").prop("disabled",true);
	$("textarea").prop("disabled",true);
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
@brief Asigna un valor a la variable de idEmpleado
@param id Identificador del empleado del que se esta visualizando su información
*/
function set_idEmpleado(id){
	idEmpleado=id;
}

/**********************************************************************
DATOS PERSONALES
**********************************************************************/

/*
@brief Habilita las entradas de información de la sección de datos personales, cambia y muestra los botones de 'Modificar' y 'Agregar'
para poder editar la información del empleado
*/
function habilitar_datos_personales(){
	var bloque = $("#v-pills-datosp")
	var inputs = $(bloque).find("input");
	$(inputs).prop("disabled",false);
	var selects = $(bloque).find("select");
	$(selects).prop("disabled",false);
	$("#mod_dp").html("Cancelar");
	$("#mod_dp").attr("onclick","cargar_datos_personales('"+idEmpleado+"')");
	// Mostrando boton de agregar telefono
	boton_tel=$("#btn-tel-dp");
	$(boton_tel).removeClass("d-none");
	var tbody=$("#body_telefonos_dp");
	var thead=$("#head_telefonos_dp");
	var trh=$(thead).find("tr");
	// Agregando los botones a la tabla de telefonos
	$(trh).append("<th class='btn-quitar'></th>");
	var trb=$(tbody).find("tr");
	for (var i = 0; i < $(trb).length; i++) {
		$(trb[i]).append("<td class='btn-quitar'><button type='button' class='btn bMT' onclick='quitar_tel_dp(this)'>Quitar</button></td>");
	}
	$("#guardar-dp").prop("disabled",false);
}

/*
@brief Agrega el nuevo telefono a la tabla de telefonos en la información del empleado
*/
function agregar_tel_dp(){
	var input=$("#agregar-tel-dp");
	var tel=$(input).val();
	var select=$("#agregar-tel-dp-tipo");
	var tipo=$(select).val();
	var perror=$("#perror-tel-dp");
	var tbody=$("#body_telefonos_dp");
	var valido=validarNewTel(input);
	if(!valido){
		console.log("Telefono no valido");
		$(input).addClass("is-invalid");
		$(perror).removeClass("d-none");
	}else{
		console.log("Telefono valido");
		$(input).removeClass("is-invalid");
		$(perror).addClass("d-none");
		var num=$("#body_telefonos_dp > tr").length;
		num++;
		var agregar="<tr><td id='numtd'></td><td>"+tipo+"</td><td>"+tel+"</td><td class='btn-quitar'><button type='button' class='btn bMT' onclick='quitar_tel_dp(this)'>Quitar</button></td><input type='hidden' class='tel-dp-tipo' name='' value='"+tipo+"'><input type='hidden' class='tel-dp-tel' name='' value='"+tel+"'></tr>";
		$(tbody).append(agregar);
		enumerar_inputs();
		$('#exampleModal').modal('toggle');
	}
}

function validarNewTel(input){
	if(validarVacio(input) && validarTelefonoA(input)){
		return true;
	}else{
		return false;
	}
}

function validarVacio(input){
	if($(input).val()==""){
		return false;
	}else{
		return true;
	}
}

function validarTelefonoA(input){
	var elem = input;
	if(!elem.val().match(/^\d{10}$/)){
		elem.addClass("is-invalid");
		return false;
	} else {
		elem.removeClass("is-invalid");
		return true;
	}
}

function validarTelefono(){
	var elem = $(this);
	if(!elem.val().match(/^\d{10}$/)){
		elem.addClass("is-invalid");
		$("#perror-tel-dp").removeClass("d-none");
		return false;
	} else {
		elem.removeClass("is-invalid");
		$("#perror-tel-dp").addClass("d-none");
		return true;
	}
}
/*
@brief Asigna nombres diferentes a las entradas de información de la tabla de empleados para poder recuperarlas de manera correcta
al momento de guardarlas en la base de datos
*/
function enumerar_inputs(){
	var tbody=$("#body_telefonos_dp");
	var trb=$(tbody).find("tr");
	var input_tipo;
	var input_tel;
	$("input[name=notelefonos-dp]").attr("value",$(trb).length);
	for (var i = 0; i < $(trb).length; i++) {
		input_tipo=$(trb[i]).find(".tel-dp-tipo");
		input_tel=$(trb[i]).find(".tel-dp-tel");
		$(input_tipo).attr("name","telefonotipo"+(i+1));
		$(input_tel).attr("name","telefono"+(i+1));
		var td=$(trb[i]).find("#numtd");
		$(td).text(""+(i+1));
	}
}

/*
@brief Elimina un telefono de la tabla de telefonos
@param boton Recibe el boton al que se le dio click
*/
function quitar_tel_dp(boton){
	var tr=$(boton).parent().parent();
	tr.remove();
	enumerar_inputs();
}

function llenarMunicipioG() {
	console.log("Llenar municipio");
	var estado = $("#inputEstado2").val();
	$.ajax({
		url: 'php/municipioDireccion.php',
		type: 'GET',
		data: { "estado":estado},
		cache: false,
		success: function(response) {
			$("#inputMunicipio2").html(response);
			$("#inputColonia2").html("<option value='default'>Seleccione una opción</option>");
		}
	});
}

function llenarColonia() {
	console.log("Llenar colonia");
	var estado = $("#inputEstado2").val();
	var municipio = $("#inputMunicipio2").val();
	$.ajax({
		url: 'php/colonia.php',
		type: 'GET',
		data: {"estado":estado,"municipio":municipio},
		cache: false,
		success: function(response) {
			$("#inputColonia2").html(response);
		}
	});
}

function autoCompletarCP() {
	var estado = $("#inputEstado2").val();
	var municipio = $("#inputMunicipio2").val();
	var colonia = $("#inputColonia2").val();
	var valor = $(this).val();
	if(estado!="" && municipio!="" && colonia!=""){
		$.ajax({
			url: 'php/getCP.php',
			type: 'GET',
			data: {"estado":estado,"municipio":municipio,"colonia":colonia,"valor":valor},
			cache: false,
			success: function(response) {
				$("#inputCP2").html(response);
				sendIdDireccion();
			}
		});
	}
}

function sendIdDireccion() {
	console.log("idDireccion2");
	var estado = $("#inputEstado2").val();
	var municipio = $("#inputMunicipio2").val();
	var colonia = $("#inputColonia2").val();
	var CP = $("#inputCP2").val();
	if(estado!="" && municipio!="" && colonia!="" && CP!=""){
		$.ajax({
			url: 'php/getIdDireccion.php',
			type: 'GET',
			data: {"estado":estado,"municipio":municipio,"colonia":colonia,"CP":CP},
			cache: false,
			success: function(response) {
				$("#idDireccion2").attr("value",response);
			}
		});
	}
}

function autoCompletarCP() {
	var estado = $("#inputEstado2").val();
	var municipio = $("#inputMunicipio2").val();
	var colonia = $("#inputColonia2").val();
	var valor = $(this).val();
	if(estado!="" && municipio!="" && colonia!=""){
		$.ajax({
			url: 'php/getCP.php',
			type: 'GET',
			data: {"estado":estado,"municipio":municipio,"colonia":colonia,"valor":valor},
			cache: false,
			success: function(response) {
				$("#inputCP2").html(response);
				sendIdDireccion();
			}
		});
	}
}

/**********************************************************************
DOCUMENTACIÓN
**********************************************************************/

/*
@brief Habilita las entradas de información de la sección de Documentación
*/
function habilitar_datos_documentacion(){
	var bloque_doc=$("#v-pills-documentacion");
	var inputs_doc=$(bloque_doc).find("input");
	var selects_doc=$(bloque_doc).find("select");
	$(selects_doc).prop("disabled",false);
	$(inputs_doc).prop("disabled",false);
	$("#mod_doc").html("Cancelar");
	$("#guardar_doc").prop("disabled",false);
	$("#mod_doc").attr("onclick","cargar_datos_documentacion('"+idEmpleado+"')");
}

/**********************************************************************
ESTADO DE SALUD Y HÁBITOS
**********************************************************************/

/*
@brief Habilita todas las entradas de información de la sección de Estado de Salud y Hábitos
*/
function habilitar_datos_es(){
	var bloque = $("#v-pills-estadoS");
	var inputs = $(bloque).find("input");
	var textarea = $(bloque).find("textarea");
	$(textarea).prop("disabled",false);
	$(inputs).prop("disabled",false);
	$("#v-pills-estadoS select").prop("disabled",false);
	$("#mod_es").html("Cancelar");
	$("#mod_es").attr("onclick","cargar_datos_eyh('"+idEmpleado+"')");
	$("#guardar_es").prop("disabled",false);
	revisarPreguntas();
}

function revisarPreguntas(){
	if($("#checkPreguntaSalud1").val()=="No"){
		$("#inputPreguntaSalud1").prop("disabled",true);
	}else{
		$("#inputPreguntaSalud1").prop("disabled",false);
	}
	if($("#checkPreguntaSalud2").val()=="No"){
		$("#inputPreguntaSalud2").prop("disabled",true);
	}else{
		$("#inputPreguntaSalud2").prop("disabled",false);
	}
	if($("#checkPreguntaSalud3").val()=="No"){
		$("#inputPreguntaSalud3").prop("disabled",true);
	}else{
		$("#inputPreguntaSalud3").prop("disabled",false);
	}
	if($("#checkPreguntaSalud4").val()=="No"){
		$("#inputPreguntaSalud4").prop("disabled",true);
	}else{
		$("#inputPreguntaSalud4").prop("disabled",false);
	}
	if($("#checkPreguntaSalud5").val()=="No"){
		$("#inputPreguntaSalud5").prop("disabled",true);
	}else{
		$("#inputPreguntaSalud5").prop("disabled",false);
	}
	if($("#checkPreguntaSalud6").val()=="No"){
		$("#inputPreguntaSalud6").prop("disabled",true);
	}else{
		$("#inputPreguntaSalud6").prop("disabled",false);
	}
	if($("#checkPreguntaSalud7").val()=="No"){
		$("#inputPreguntaSalud7").prop("disabled",true);
	}else{
		$("#inputPreguntaSalud7").prop("disabled",false);
	}
}

/**********************************************************************
DATOS FAMILIARES
**********************************************************************/

/*
@brief Muestra todos los botones que permiten editar los Datos Familiares del empleado, tanto en la tabla de hijos como en la tabla
de parientes
*/
function habilitar_datos_familiares(){
	$("#mod_familiares").html("Cancelar");
	$("#mod_familiares").attr("onclick","cargar_datos_familiares('"+idEmpleado+"')");
	$("#guardar_familiares").prop("disabled",false);
	// Agregando botones a la tabla de hijos
	$("#agregar_hijos_df").removeClass("d-none");
	$("#head_thijos_df tr").append("<th class='btn-quitarhijos_df'></th>");
	var trb=$("#body_thijos_df").find("tr");
	$(trb).append("<td class='btn-quitarhijos_df'><button type='button' class='btn bMT' onclick='quitar_hijos(this)'>Quitar</button></td>");
	//Agregando botones a la tabla de parientes
	$("#tabla_parientes thead tr").append("<th class='btn-quitarhijos_df'></th>");
	var trbparientes=$("#tabla_parientes tbody tr");
	for(var i=0; i<$(trbparientes).length;i++){
		$(trbparientes[i]).append("<td class='btn-quitarhijos_df'><button type='button' class='btn bMT' data-toggle='modal' data-target='#modal_parientes_df' id='modificar_parientes' onclick='load_mod_parientes(this,"+i+")'>Modificar</button></td>");
	}
}

/*
@brief Valida la información del nuevo hijo que se agregará, si no hay ningun error, se añadirá a la tabla de hijos
*/
function agregar_hijos(){
	var input_nombre=$("#nombre_hijo_nuevo");
	var input_edad=$("#edad_hijo_nueva");
	var error=validarInputHijos();

	if(!(error)){
		console.log("no error");
		var tbody=$("#body_thijos_df");
		$(tbody).append("<tr><td id='numtd_df'></td><td>"+input_nombre.val()+"</td><td>"+input_edad.val()+"</td><td class='btn-quitarhijos_df'><button type='button' class='btn bMT' onclick='quitar_hijos(this)'>Quitar</button></td><input type='hidden' name='' class='nombre_hijo'><input type='hidden' name='' class='edad_hijo'></tr>");
		numero_hijos_df();
		$("#modal_hijos_df").modal("toggle");
	}else{
		console.log("error");
	}
}

function validarInputHijos(){
	var input_nombre=$("#nombre_hijo_nuevo");
	var input_edad=$("#edad_hijo_nueva");
	var error=false;
	if(validarVacio(input_nombre)){
		console.log("no error nombre vacio");
		$(input_nombre).removeClass("is-invalid");
		$("#nherror").addClass("d-none");
		error=false;
	}else {
		console.log("error nombre vacio");
		$(input_nombre).addClass("is-invalid");
		$("#nherror").removeClass("d-none");
		error=true;
	}
	if(validarVacio(input_edad)){
		console.log("no error edad vacio");
		$(input_edad).removeClass("is-invalid");
		$("#eherror").addClass("d-none");
		error=false;
	}else {
		console.log("error edad vacio");
		$(input_edad).addClass("is-invalid");
		$("#eherror").removeClass("d-none");
		error=true;
	}
	if(!validarTextoA(input_nombre)){
		console.log("error nombre texto");
		$(input_nombre).addClass("is-invalid");
		$("#nherror").removeClass("d-none");
		error=true;
	}
	console.log("error="+error);
	if(error){
		return true;
	}else{
		return false;
	}
}

function validarTextoA(input){
	var elem = $(input);
	if(!elem.val().match(/^\D*$/)){
		return false;
	} else {
		return true;
	}
}
/*
@brief Elimina un hijo de la tabla de hijos
*/
function quitar_hijos(boton){
	$(boton).parent().parent().remove();
	numero_hijos_df();
}

/*
@brief Asigna nombres diferentes a los datos de los hijos para que puedan ser ingresados correctamente en la base de datos
*/
function numero_hijos_df(){
	var tbody=$("#body_thijos_df");
	var tr=$(tbody).find("tr.fhijo");
	for (var i = 0; i < $(tr).length; i++) {
		$(tr[i]).find("#numtd_df").text((i+1));
		$(tr[i]).find(".nombre_hijo").attr("name","Nombrehijo"+(i+1));
		$(tr[i]).find(".edad_hijo").attr("name","Edadhijo"+(i+1))
	}
	$("input[name=nohijos]").attr("value", $(tr).length);
}

/*
@brief Asigna nombres diferentes a los datos de los parientes para que puedan ser ingresados correctamente a la base de datos
*/
function numero_parientes_df(){
	var tr=$("#tabla_parientes tbody").find("tr");
	for (var i = 0; i < $(tr).length; i++) {
		$(tr[i]).find(".vive_pariente").attr("name","vive_pariente"+(i+1));
		$(tr[i]).find(".nombre_pariente").attr("name","nombre_pariente"+(i+1));
		$(tr[i]).find(".direccion_pariente").attr("name","direccion_pariente"+(i+1));
		$(tr[i]).find(".ocupacion_pariente").attr("name","ocupacion_pariente"+(i+1));
	}
	$("input[name=noparientes]").attr("value",$(tr).length);
}

/*
@brief Carga la ventana de modificar parientes con los datos del pariente que se quieren modificar
@param boton Boton que se presiona para ejecutar esta función
@param indice Numero que indica cual es el pariente que se esta modificando
*/
function load_mod_parientes(boton,indice){
	var tr=$(boton).parent().parent();
	var nombre=$(tr).find(".nombre_pariente").text();
	var direccion=$(tr).find(".direccion_pariente").text();
	var ocupacion=$(tr).find(".ocupacion_pariente").text();
	var vive=$(tr).find("input").prop("checked");
	$("#indicetr").attr("value",indice);
	$("#nombre_pariente_nuevo").attr("value",nombre);
	$("#ocupacion_pariente_nuevo").attr("value",ocupacion);
	$("#direccion_pariente_nuevo").attr("value",direccion);
	$("#nombre_pariente_nuevo").prop("value",nombre);
	$("#ocupacion_pariente_nuevo").prop("value",ocupacion);
	$("#direccion_pariente_nuevo").prop("value",direccion);
	if(vive==true){
		$("#vive_pariente_nuevo").prop("checked",true);
	}else{
		$("#vive_pariente_nuevo").prop("checked",false);
	}
}

/*
@brief Valida y modifica los nuevos datos del pariente
*/
function mod_parientes(){
	var inombre=$("#nombre_pariente_nuevo");
	var iocupacion=$("#ocupacion_pariente_nuevo");
	var idireccion=$("#direccion_pariente_nuevo");
	var ivive=$("#vive_pariente_nuevo");
	var error=validarInputPariente();

	if(!(error)){
		var trindice=$("#indicetr").val();
		var trcambiar=$("#tabla_parientes tbody tr");
		$(trcambiar[trindice]).find(".nombre_pariente").text($(inombre).val());
		$(trcambiar[trindice]).find(".ocupacion_pariente").text($(iocupacion).val());
		$(trcambiar[trindice]).find(".direccion_pariente").text($(idireccion).val());
		if($(ivive).prop("checked")==true){
			$("#vive_pariente").prop("checked",true);
		}else{
			$("#vive_pariente").prop("checked",false);
		}
		var input=$(trcambiar[trindice]).find("input");
		$(input[1]).attr("value",$(inombre).val());
		$(input[2]).attr("value",$(idireccion).val());
		$(input[3]).attr("value",$(iocupacion).val());
		$('#modal_parientes_df').modal("toggle");
	}
}

function validarInputPariente(){
	var inombre=$("#nombre_pariente_nuevo");
	var iocupacion=$("#ocupacion_pariente_nuevo");
	var idireccion=$("#direccion_pariente_nuevo");
	var ivive=$("#vive_pariente_nuevo");
	var nerror=false;
	var oerror=false;
	var derror=false;
	if(!validarVacio(inombre)){
		$(inombre).removeClass("is-valid");
		$(inombre).addClass("is-invalid");
		$("#nperror").removeClass("d-none");
		nerror=true;
	}else{
		$(inombre).removeClass("is-invalid");
		$(inombre).addClass("is-valid");
		$("#nperror").addClass("d-none");
		nerror=false;
	}
	if(!validarVacio(iocupacion)){
		$(iocupacion).removeClass("is-valid");
		$(iocupacion).addClass("is-invalid");
		$("#operror").removeClass("d-none");
		oerror=true;
	}else{
		$(iocupacion).removeClass("is-invalid");
		$(iocupacion).addClass("is-valid");
		$("#operror").addClass("d-none");
		oerror=false;
	}
	if(!validarVacio(idireccion)){
		$(idireccion).removeClass("is-valid");
		$(idireccion).addClass("is-invalid");
		$("#dperror").removeClass("d-none");
		derror=true;
	}else{
		$(idireccion).removeClass("is-invalid");
		$(idireccion).addClass("is-valid");
		$("#dperror").addClass("d-none");
		derror=false;
	}
	if(!validarTextoA(inombre)){
		$(inombre).removeClass("is-valid");
		$(inombre).addClass("is-invalid");
		$("#nperror").removeClass("d-none");
		nerror=true;
	}
	if(!validarTextoA(iocupacion)){
		$(iocupacion).removeClass("is-valid");
		$(iocupacion).addClass("is-invalid");
		$("#oerror").removeClass("d-none");
		oerror=true;
	}
	if(nerror || oerror || derror){
		return true;
	}else{
		return false;
	}
}
/**********************************************************************
ESCOLARIDAD
**********************************************************************/

/*
@brief Habilita todas las entradas de información de la sección de escolaridad
@param boton Boton que se presiona para ejecutar esta función
*/
function habilitar_escolaridad(boton){
	$("#v-pills-escolaridad").find("input").prop("disabled",false);
	$("#v-pills-escolaridad").find("select").prop("disabled",false);
	$(boton).text("Cancelar");
	$(boton).attr("onclick","cargar_datos_escolaridad('"+idEmpleado+"')");
	$("#guardar-escolaridad").prop("disabled",false);
	$("#agregar_escolaridad").removeClass("d-none");
}

/*
@brief Asigna diferentes nombres a los datos de las escuelas para que puedan ser ingresadas a la base de datos
*/
function contar_escolaridad(){
	var cards=$("#accordion3").find(".card");
	var nocards=$("#accordion3").find(".card").length;
	for(var i=0; i<nocards;i++){
		$(cards[i]).find(".escol-ea").attr("name","escolaridad-ea"+(i+1));
		$(cards[i]).find(".escol-ai").attr("name","escolaridad-ai"+(i+1));
		$(cards[i]).find(".escol-af").attr("name","escolaridad-af"+(i+1));
		$(cards[i]).find(".escol-nombre").attr("name","escolaridad-nombre"+(i+1));
		$(cards[i]).find(".escol-direccion").attr("name","escolaridad-direccion"+(i+1));
		$(cards[i]).find(".escol-anios").attr("name","escolaridad-anios"+(i+1));
		$(cards[i]).find(".escol-nivel").attr("name","escolaridad-nivel"+(i+1));
		$(cards[i]).find(".escol-titulo").attr("name","escolaridad-titulo"+(i+1));
	}
}

/*
@brief Valida y agrega los datos de una nueva escuela
*/
function agregar_escolaridad_modal(){
	var input_ea=$("#escol-ea-nuevo");
	var input_ai=$("#escol-ai-nuevo");
	var input_af=$("#escol-af-nuevo");
	var input_nombre=$("#escol-nombre-nuevo");
	var input_calle=$("#escol-calle-nuevo");
	var input_noext=$("#escol-noext-nuevo");
	var input_nivel=$("#escol-nivel-nuevo");
	var input_titulo=$("#escol-titulo-nuevo");
	var input_anios=$("#escol-anios-nuevo");
	var error=validarInputEscolaridad();

	if( !error ){
		var nocards=$("#accordion3").find(".card").length+1;
		var html="<div class='card'>";
		html+="<div class='card-header' id='heading3"+nocards+"'>";
		html+="<h5 class='mb-0'>";
		html+="<a data-toggle='collapse' data-target='#collapse3"+nocards+"' aria-expanded='true' aria-controls='collapse3"+nocards+"'>";
		html+=$(input_nivel).val();
		html+="</a></h5></div>";
		html+="<div id='collapse3"+nocards+"' class='collapse' aria-labelledby='heading3"+nocards+"' data-parent='#accordion3'>";
		html+="<div class='card-body'>";
		html+="<div class='row'>";
		html+="<div class='col'>";
		html+="<label for=''>¿Actualmente esta estudiando en esta institución?</label>";
		html+="<select name='' id='' class='form-control escol-ea'>";
		if($(input_ea).val()=="Si"){
			html+="<option value='Si' selected>Si</option>";
			html+="<option value='No'>No</option>";
		}else{
			if($(input_ea).val()=="No"){
				html+="<option value='Si'>Si</option>";
				html+="<option value='No' selected>No</option>";
			}
		}
		html+="</select>";
		html+="</div></div>";
		html+="<div class='row'>";
		html+="<div class='col'>";
		html+="<div class='form-group'>";
		html+="<label for=''>Año inicio:</label>";
		html+="<input type='number' value='"+$(input_ai).val()+"' class='form-control escol-ai'>";
		html+="</div></div>";
		html+="<div class='col'>";
		html+="<div class='form-group'>";
		html+="<label for=''>Año fin:</label>";
		html+="<input type='number' value='"+$(input_af).val()+"' class='form-control escol-af'>";
		html+="</div></div></div>";
		html+="<div class='row'>";
		html+="<div class='col'>";
		html+="<div class='form-group'>";
		html+="<label for=''>Nombre de la institución:</label>";
		html+="<input type='text' value='"+$(input_nombre).val()+"' class='form-control escol-nombre'>";
		html+="</div></div></div>";
		html+="<div class='row'>";
		html+="<div class='col'>";
		html+="<div class='form-group'>";
		html+="<label for=''>Calle</label>";
		html+="<input type='text' maxlength='60' value='"+$(input_calle).val()+"' class='form-control escol-direccion'>";
		html+="</div></div>";
		html+="<div class='col'>";
		html+="<div class='form-group'>";
		html+="<label for=''>No. exterior</label>";
		html+="<input type='text' maxlength='39' value='"+$(input_noext).val()+"' class='form-control escol-direccion'>";
		html+="</div></div></div>";
		html+="<div class='row'>";
		html+="<div class='col'> ";
		html+="<div class='form-group'>";
		html+="<label for=''>Nivel:</label>";
		html+="<input type='text' value='"+$(input_nivel).val()+"' class='form-control escol-nivel'>";
		html+="</div></div>";
		html+="<div class='col'>";
		html+="<div class='form-group'>";
		html+="<label for=''>Años:</label>";
		html+="<input type='number' value='"+$(input_anios).val()+"' class='form-control escol-anios'>";
		html+="</div></div>";
		html+="<div class='col'>";
		html+="<div class='form-group'>";
		html+="<label for=''>Titulo Recibido:</label>";
		html+="<input type='text' value='"+$(input_titulo).val()+"' class='form-control escol-titulo'>";
		html+="</div></div></div></div></div></div>";
		$("#accordion3").append(html);
		contar_escolaridad();
		$("#modal_nuevo_escolaridad").modal("toggle");
	}
}


function validarInputEscolaridad(){
	var input_ea=$("#escol-ea-nuevo");
	var input_ai=$("#escol-ai-nuevo");
	var input_af=$("#escol-af-nuevo");
	var input_nombre=$("#escol-nombre-nuevo");
	var input_direccion=$("#escol-direccion-nuevo");
	var input_nivel=$("#escol-nivel-nuevo");
	var input_titulo=$("#escol-titulo-nuevo");
	var input_anios=$("#escol-anios-nuevo");
	var errores=[false,false,false,false,false,false,false,false];
	if(!validarVacio(input_ea)){
		$(input_ea).removeClass("is-valid");
		$(input_ea).addClass("is-invalid");
		$("#escol-ea-error").removeClass("d-none");
		errores[0]=true;
	}else{
		$(input_ea).removeClass("is-invalid");
		$(input_ea).addClass("is-valid");
		$("#escol-ea-error").addClass("d-none");
		errores[0]=false;
	}
	if(!validarVacio(input_ai)){
		$(input_ai).removeClass("is-valid");
		$(input_ai).addClass("is-invalid");
		$("#escol-ai-error").removeClass("d-none");
		errores[1]=true;
	}else{
		$(input_ai).removeClass("is-invalid");
		$(input_ai).addClass("is-valid");
		$("#escol-ai-error").addClass("d-none");
		errores[1]=false;
	}
	if(!validarVacio(input_af)){
		$(input_af).removeClass("is-valid");
		$(input_af).addClass("is-invalid");
		$("#escol-af-error").removeClass("d-none");
		errores[2]=true;
	}else{
		$(input_af).removeClass("is-invalid");
		$(input_af).addClass("is-valid");
		$("#escol-af-error").addClass("d-none");
		errores[2]=false;
	}
	if(!validarVacio(input_nombre)){
		$(input_nombre).removeClass("is-valid");
		$(input_nombre).addClass("is-invalid");
		$("#escol-nombre-error").removeClass("d-none");
		errores[3]=true;
	}else{
		$(input_nombre).removeClass("is-invalid");
		$(input_nombre).addClass("is-valid");
		$("#escol-nombre-error").addClass("d-none");
		errores[3]=false;
	}
	if(!validarVacio(input_direccion)){
		$(input_direccion).removeClass("is-valid");
		$(input_direccion).addClass("is-invalid");
		$("#escol-direccion-error").removeClass("d-none");
		errores[4]=true;
	}else{
		$(input_direccion).removeClass("is-invalid");
		$(input_direccion).addClass("is-valid");
		$("#escol-direccion-error").addClass("d-none");
		errores[4]=false;
	}
	if(!validarVacio(input_nivel)){
		$(input_nivel).removeClass("is-valid");
		$(input_nivel).addClass("is-invalid");
		$("#escol-nivel-error").removeClass("d-none");
		errores[5]=true;
	}else{
		$(input_nivel).removeClass("is-invalid");
		$(input_nivel).addClass("is-valid");
		$("#escol-nivel-error").addClass("d-none");
		errores[5]=false;
	}
	if(!validarVacio(input_anios)){
		$(input_anios).removeClass("is-valid");
		$(input_anios).addClass("is-invalid");
		$("#escol-anios-error").removeClass("d-none");
		errores[6]=true;
	}else{
		$(input_anios).removeClass("is-invalid");
		$(input_anios).addClass("is-valid");
		$("#escol-anios-error").addClass("d-none");
		errores[6]=false;
	}
	if(!validarVacio(input_titulo)){
		$(input_titulo).removeClass("is-valid");
		$(input_titulo).addClass("is-invalid");
		$("#escol-titulo-error").removeClass("d-none");
		errores[7]=true;
	}else{
		$(input_titulo).removeClass("is-invalid");
		$(input_titulo).addClass("is-valid");
		$("#escol-titulo-error").addClass("d-none");
		errores[7]=false;
	}
	if (!(errores[0] || errores[1] || errores[2] || errores[3] || errores[4] || errores[5] || errores[6] || errores[7])) {
		return false;
	}else{
		return true;
	}
}
/**********************************************************************
CONOCIMIENTOS GENERALES
**********************************************************************/

/*
@brief Habilita todas las entradas de información de la sección de Conocimientos Generales
*/
function habilitar_conocimientos(){
	var selects=$("#v-pills-conocimientosg").find("select");
	var inputs=$("#v-pills-conocimientosg").find("input");
	$(selects).prop("disabled",false);
	$(inputs).prop("disabled",false);
	$("#boton-agregar-idioma").removeClass("d-none");
	$("#boton-agregar-software").removeClass("d-none");
	$("#boton-hab-conocimientos").text("Cancelar");
	$("#boton-hab-conocimientos").attr("onclick","cargar_datos_conocimientosg('"+idEmpleado+"')");
	$("#boton-guardar-conocimientos").prop("disabled",false);
}

/*
@brief Valida y agrega los datos de un nuevo idioma que maneja el empleado
*/
function agregar_idioma_cg(){
	var input_idioma=$("#idioma_nuevo");
	var input_porcentaje=$("#porcentaje_nuevo");
	var error1=false,error2=false;
	if($(input_idioma).val()==""){
		$(input_idioma).removeClass("is-valid");
		$(input_idioma).addClass("is-invalid");
		$("#icerror").removeClass("d-none");
		error1=true;
	}else{
		$(input_idioma).addClass("is-valid");
		$(input_idioma).removeClass("is-invalid");
		$("#icerror").addClass("d-none");
		error1=false;
	}
	if($(input_porcentaje).val()==""){
		$(input_porcentaje).removeClass("is-valid");
		$(input_porcentaje).addClass("is-invalid");
		$("#pcerror").removeClass("d-none");
		error2=true;
	}else{
		$(input_porcentaje).addClass("is-valid");
		$(input_porcentaje).removeClass("is-invalid");
		$("#pcerror").addClass("d-none");
		error2=false;
	}
	if( !(error1 || error2) ){
		var porcentaje=$(porcentaje_nuevo).val().replace("%","");
		var html="<div class='row my-2'><div class='col'><p class='mb-0'>"+$(input_idioma).val()+"</p><input type='hidden' value='"+$(input_idioma).val()+"'><input type='hidden' value='"+porcentaje+"'>";
			html+="<div class='progress'><div class='progress-bar' role='progressbar' style='width: "+porcentaje+"%;' aria-valuenow="+porcentaje+" aria-valuemin='0' aria-valuemax='100'>"+porcentaje+"%</div>";
			html+="</div></div></div>";
		$("#idiomas_maneja").append(html);

		$("#modal_nuevo_idioma").modal("toggle");
	}
}

/*
@brief Valida y agrega un nuevo software manejado por el empleado
*/
function agregar_software_cg(){
	var input_software=$("#software_nuevo");
	var input_nivel=$("#nivel_software_nuevo");
	var error1=false,error2=false;
	if($(input_software).val()==""){
		$(input_software).removeClass("is-valid");
		$(input_software).addClass("is-invalid");
		$("#scerror").removeClass("d-none");
		error1=true;
	}else{
		$(input_software).addClass("is-valid");
		$(input_software).removeClass("is-invalid");
		$("#scerror").addClass("d-none");
		error1=false;
	}
	if($(input_nivel).val()==""){
		$(input_nivel).removeClass("is-valid");
		$(input_nivel).addClass("is-invalid");
		$("#nscerror").removeClass("d-none");
		error2=true;
	}else{
		$(input_nivel).addClass("is-valid");
		$(input_nivel).removeClass("is-invalid");
		$("#nscerror").addClass("d-none");
		error2=false;
	}
	if( !(error1 || error2) ){
		var html="<div class='col-3 nuevo'><div class='form-group'><label>"+$(input_software).val()+"</label>";
		html+="<input type='hidden' value='"+$(input_software).val()+"'><select name='software1' class='form-control'>";
		if( $(input_nivel).val()=="Básico"){
			html+="<option value='Básico' selected>Básico</option>"
		}else{
			html+="<option value='Básico'>Básico</option>"
		}
		if( $(input_nivel).val()=="Intermedio"){
			html+="<option value='Intermedio' selected>Intermedio</option>";
		}else{
			html+="<option value='Intermedio'>Intermedio</option>";
		}
		if(  $(input_nivel).val()=="Avanzado"){
			html+="<option value='Avanzado' selected>Avanzado</option></select></div></div>";
		}else{
			html+="<option value='Avanzado'>Avanzado</option></select></div></div>";
		}
		$("#software_maneja").append(html);
		$(input_software).removeClass("is-valid");
		$(input_software).removeClass("is-invalid");
		$(input_software).prop("value","");
		$(input_nivel).removeClass("is-valid");
		$(input_nivel).removeClass("is-invalid");
		$(input_nivel).prop("value","");
		$("#scerror").addClass("d-none");
		$("#nscerror").addClass("d-none");
		contar_software();
		$("#modal_nuevo_software").modal("toggle");
	}
}

/*
@brief Asigna diferentes nombres a los datos del software para que puedan ser guardados en la base de datos
*/
function contar_software(){
	var inputs=$("#software_maneja").find("input");
	var selects=$("#software_maneja").find("select");
	for(var i=0;i<$(inputs).length;i++){
		$(inputs[i]).attr("name","nombresoftware"+(i+1));
		$(selects[i]).attr("name","nivelsoftware"+(i+1));
	}
	$("input[name=nosoftware]").attr("value",$(inputs).length);
}

/**********************************************************************
EMPLEO ACTUAL Y ANTERIORES
**********************************************************************/

/*
@brief Habilita todas las entradas de información de la sección de Empleo
@param boton Boton que se presiona para que se ejecute esta función
*/
function habilitar_empleo(boton){
	var inputs=$("#v-pills-empleoaya").find("input");
	$(inputs).prop("disabled",false);
	$(boton).text("Cancelar");
	$(boton).attr("onclick","cargar_datos_empleos('"+idEmpleado+"')");
	$("#guardar_empleo").prop("disabled",false);
	$("#boton-agregar-empleo").removeClass("d-none");
	empleo_informes();
}

/*
@brief Asigna diferentes nombres a los datos de empleos para que puedan ser guardados en la base de datos
*/
function nombre_empleos(){
	var accordion=$("#accordion");
	var cards=$(accordion).find(".card");
	console.log("Numero de referencias "+$(cards).length);
	for(var i=0;i<$(cards).length;i++){
		$(cards[i]).find(".empleo-ti").attr("name","empleoti"+(i+1));
		$(cards[i]).find(".empleo-tf").attr("name","empleotf"+(i+1));
		$(cards[i]).find(".empleo-nombre").attr("name","empleonombre"+(i+1));
		$(cards[i]).find(".empleo-telefono").attr("name","empleotelefono"+(i+1));
		$(cards[i]).find(".empleo-direccion").attr("name","empleodireccion"+(i+1));
		$(cards[i]).find(".empleo-sueldo").attr("name","empleosueldo"+(i+1));
		$(cards[i]).find(".empleo-puesto").attr("name","empleopuesto"+(i+1));
		$(cards[i]).find(".empleo-njefe").attr("name","empleonjefe"+(i+1));
		$(cards[i]).find(".empleo-pjefe").attr("name","empleopjefe"+(i+1));
		$(cards[i]).find(".empleo-motivo").attr("name","empleomotivo"+(i+1));
		$(cards[i]).find(".empleo-comentario").attr("name","empleocomentario"+(i+1));
	}
}

/*
@brief Controla el campo de razones en la pregunta de '¿Podemos pedir informes?'
*/
function empleo_informes(){
	console.log("empleo_informes");
	console.log($(".empleo-informes").prop("checked"));
	if($(".empleo-informes").prop("checked")==true){
		$(".empleo-razones").prop("disabled",true);
	}else{
		$(".empleo-razones").prop("disabled",false);
	}
}

/*
@brief Valida y agrega los datos de un nuevo empleo
*/
function agregar_empleo(){
	var input_ti=$("#empleo-ti-nuevo");
	var input_tf=$("#empleo-tf-nuevo");
	var input_nombre=$("#empleo-nombre-nuevo");
	var input_telefono=$("#empleo-telefono-nuevo");
	var input_direccion=$("#empleo-direccion-nuevo");
	var input_sueldo=$("#empleo-sueldo-nuevo");
	var input_puesto=$("#empleo-puesto-nuevo");
	var input_njefe=$("#empleo-njefe-nuevo");
	var input_pjefe=$("#empleo-pjefe-nuevo");
	var input_motivo=$("#empleo-motivo-nuevo");
	var input_comentario=$("#empleo-comentario-nuevo");
	var error=[false,false,false,false,false,false,false,false,false,false,false];
	if($(input_ti).val()==""){
		$(input_ti).removeClass("is-valid");
		$(input_ti).addClass("is-invalid");
		$("#tieerror").removeClass("d-none");
		error[0]=true;
	}else{
		$(input_ti).removeClass("is-invalid");
		$(input_ti).addClass("is-valid");
		$("#tieerror").addClass("d-none");
		error[0]=false;
	}
	if($(input_tf).val()==""){
		$(input_tf).removeClass("is-valid");
		$(input_tf).addClass("is-invalid");
		$("#tfeerror").removeClass("d-none");
		error[1]=true;
	}else{
		$(input_tf).removeClass("is-invalid");
		$(input_tf).addClass("is-valid");
		$("#tfeerror").addClass("d-none");
		error[1]=false;
	}
	if($(input_nombre).val()==""){
		$(input_nombre).removeClass("is-valid");
		$(input_nombre).addClass("is-invalid");
		$("#neerror").removeClass("d-none");
		error[2]=true;
	}else{
		$(input_nombre).removeClass("is-invalid");
		$(input_nombre).addClass("is-valid");
		$("#neerror").addClass("d-none");
		error[2]=false;
	}
	if($(input_telefono).val()==""){
		$(input_telefono).removeClass("is-valid");
		$(input_telefono).addClass("is-invalid");
		$("#teerror").removeClass("d-none");
		error[3]=true;
	}else{
		$(input_telefono).removeClass("is-invalid");
		$(input_telefono).addClass("is-valid");
		$("#teerror").addClass("d-none");
		error[3]=false;
	}
	if($(input_direccion).val()==""){
		$(input_direccion).removeClass("is-valid");
		$(input_direccion).addClass("is-invalid");
		$("#deerror").removeClass("d-none");
		error[4]=true;
	}else{
		$(input_direccion).removeClass("is-invalid");
		$(input_direccion).addClass("is-valid");
		$("#deerror").addClass("d-none");
		error[4]=false;
	}
	if($(input_sueldo).val()==""){
		$(input_sueldo).removeClass("is-valid");
		$(input_sueldo).addClass("is-invalid");
		$("#seerror").removeClass("d-none");
		error[5]=true;
	}else{
		$(input_sueldo).removeClass("is-invalid");
		$(input_sueldo).addClass("is-valid");
		$("#seerror").addClass("d-none");
		error[5]=false;
	}
	if($(input_puesto).val()==""){
		$(input_puesto).removeClass("is-valid");
		$(input_puesto).addClass("is-invalid");
		$("#peerror").removeClass("d-none");
		error[6]=true;
	}else{
		$(input_puesto).removeClass("is-invalid");
		$(input_puesto).addClass("is-valid");
		$("#peerror").addClass("d-none");
		error[6]=false;
	}
	if($(input_njefe).val()==""){
		$(input_njefe).removeClass("is-valid");
		$(input_njefe).addClass("is-invalid");
		$("#njeerror").removeClass("d-none");
		error[7]=true;
	}else{
		$(input_njefe).removeClass("is-invalid");
		$(input_njefe).addClass("is-valid");
		$("#njeerror").addClass("d-none");
		error[7]=false;
	}
	if($(input_pjefe).val()==""){
		$(input_pjefe).removeClass("is-valid");
		$(input_pjefe).addClass("is-invalid");
		$("#pjeerror").removeClass("d-none");
		error[8]=true;
	}else{
		$(input_pjefe).removeClass("is-invalid");
		$(input_pjefe).addClass("is-valid");
		$("#pjeerror").addClass("d-none");
		error[8]=false;
	}
	if($(input_motivo).val()==""){
		$(input_motivo).removeClass("is-valid");
		$(input_motivo).addClass("is-invalid");
		$("#meerror").removeClass("d-none");
		error[9]=true;
	}else{
		$(input_motivo).removeClass("is-invalid");
		$(input_motivo).addClass("is-valid");
		$("#meerror").addClass("d-none");
		error[9]=false;
	}
	if($(input_comentario).val()==""){
		$(input_comentario).removeClass("is-valid");
		$(input_comentario).addClass("is-invalid");
		$("#ceerror").removeClass("d-none");
		error[10]=true;
	}else{
		$(input_comentario).removeClass("is-invalid");
		$(input_comentario).addClass("is-valid");
		$("#ceerror").addClass("d-none");
		error[10]=false;
	}
	if( !(error[0] || error[1] || error[2] || error[3] || error[4] || error[5] || error[6] || error[7] || error[8] || error[9] || error[10]) ){
		var cards=$("#accordion").find(".card").length+1;
		var html="<div class='card'>";
		html+="<div class='card-header' role='tab' id='heading"+cards+"'>";
		html+="<h5 class='mb-0'>";
		html+="<a class='collapsed' data-toggle='collapse' href='#collapse"+cards+"' role='button' aria-expanded='false' aria-controls='collapse"+cards+"'>";
		html+=$(input_nombre).val();
		html+="</a>";
		html+="</h5>";
		html+="</div>";
		html+="<div id='collapse"+cards+"' class='collapse' role='tabpanel' aria-labelledby='heading"+cards+"' data-parent='#accordion'>";
		html+="<div class='card-body'>";
		html+="<div class='row mx-1 mt-1'>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Año en el que empezó a prestar sus servicios:</label>";
		html+="<input type='text' class='form-control empleo-ti' value="+$(input_ti).val()+">";
		html+="</div>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Año en el que terminó a prestar sus servicios:</label>";
		html+="<input type='text' class='form-control empleo-tf' value="+$(input_tf).val()+">";
		html+="</div>";
		html+="</div>";
		html+="<div class='row mx-1'>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Nombre de la compañia:</label>";
		html+="<input type='text' class='form-control empleo-nombre' value="+$(input_nombre).val()+">";
		html+="</div>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Telefono:</label>";
		html+="<input type='text' class='form-control empleo-telefono' value="+$(input_telefono).val()+">";
		html+="</div>";
		html+="</div>";
		html+="<div class='row mx-1'>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Dirección:</label>";
		html+="<input type='text' class='form-control empleo-direccion' value="+$(input_direccion).val()+">";
		html+="</div>";
		html+="</div>";
		html+="<div class='row mx-1'>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Sueldo mensual:</label>";
		html+="<input type='text' class='form-control empleo-sueldo' value="+$(input_sueldo).val()+">";
		html+="</div>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Puesto:</label>";
		html+="<input type='text' class='form-control empleo-puesto' value="+$(input_sueldo).val()+">";
		html+="</div>";
		html+="</div>";
		html+="<div class='row mx-1'>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Nombre del jefe directo:</label>";
		html+="<input type='text' class='form-control empleo-njefe' value="+$(input_njefe).val()+">";
		html+="</div>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Puesto del jefe directo:</label>";
		html+="<input type='text' class='form-control empleo-pjefe' value="+$(input_pjefe).val()+">";
		html+="</div>";
		html+="</div>";
		html+="<div class='row mx-1'>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Motivo de separación:</label>";
		html+="<input type='text' class='form-control empleo-motivo' value="+$(input_motivo).val()+">";
		html+="</div>";
		html+="</div>";
		html+="<div class='row mx-1'>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Comentarios de sus jefes:</label>";
		html+="<input type='text' class='form-control empleo-comentario' value="+$(input_comentario).val()+">";
		html+="</div>";
		html+="</div>";
		html+="</div>";
		html+="</div>";
		html+="</div>";
		$("#accordion").append(html);
		$("#modal_nuevo_empleo").modal("toggle");
	}
}

/**********************************************************************
REFERENCIAS PERSONALES
**********************************************************************/

/*
@brief Habilita todas las entradas de información de la sección de Referencias Personales
@param boton Botón que se presiona para que se ejecute esta función
*/
function habilitar_rp(boton){
	var inputs=$("#v-pills-referenciasp").find("input");
	$(inputs).prop("disabled",false);
	$(boton).text("Cancelar");
	$(boton).attr("onclick","cargar_datos_referencias('"+idEmpleado+"')");
	$("#guardar-referenciasp").prop("disabled",false);
	$("#boton-agregar-rp").removeClass("d-none");
}

/*
@brief Asigna diferentes nombres a los datos de las referencias personales para que puedan ser guardadas en la base de datos
*/
function nombres_referencias(){
	var accordion=$("#accordion2");
	var cards=$(accordion).find(".card");
	console.log("Numero de referencias "+$(cards).length);
	for(var i=0;i<$(cards).length;i++){
		$(cards[i]).find(".rp-nombre").attr("name","nombrerp"+(i+1));
		$(cards[i]).find(".rp-ocupacion").attr("name","ocupacionrp"+(i+1));
		$(cards[i]).find(".rp-domicilio").attr("name","domiciliorp"+(i+1));
		$(cards[i]).find(".rp-telefono").attr("name","telefonorp"+(i+1));
		$(cards[i]).find(".rp-tiempoc").attr("name","tiempocrp"+(i+1));
	}
}

/*
@brief Valida y agrega los datos de una nueva referencia del empleado
*/
function agregar_referencia(){
	var input_nombre=$("#rp-nombre-nuevo");
	var input_ocupacion=$("#rp-ocupacion-nuevo");
	var input_domicilio=$("#rp-domicilio-nuevo");
	var input_telefono=$("#rp-telefono-nuevo");
	var input_tiempo=$("#rp-tiempoc-nuevo");
	var error = [false,false,false,false,false];
	if($(input_nombre).val()==""){
		$(input_nombre).removeClass("is-valid");
		$(input_nombre).addClass("is-invalid");
		$("#nrperror").removeClass("d-none");
		error[0]=true;
	}else{
		$(input_nombre).removeClass("is-invalid");
		$(input_nombre).addClass("is-valid");
		$("#nrperror").addClass("d-none");
		error[0]=false;
	}
	if($(input_ocupacion).val()==""){
		$(input_ocupacion).removeClass("is-valid");
		$(input_ocupacion).addClass("is-invalid");
		$("#orperror").removeClass("d-none");
		error[1]=true;
	}else{
		$(input_ocupacion).removeClass("is-invalid");
		$(input_ocupacion).addClass("is-valid");
		$("#orperror").addClass("d-none");
		error[1]=false;
	}
	if($(input_domicilio).val()==""){
		$(input_domicilio).removeClass("is-valid");
		$(input_domicilio).addClass("is-invalid");
		$("#drperror").removeClass("d-none");
		error[2]=true;
	}else{
		$(input_domicilio).removeClass("is-invalid");
		$(input_domicilio).addClass("is-valid");
		$("#drperror").addClass("d-none");
		error[2]=false;
	}
	if($(input_telefono).val()==""){
		$(input_telefono).removeClass("is-valid");
		$(input_telefono).addClass("is-invalid");
		$("#trperror").removeClass("d-none");
		error[3]=true;
	}else{
		$(input_telefono).removeClass("is-invalid");
		$(input_telefono).addClass("is-valid");
		$("#trperror").addClass("d-none");
		error[3]=false;
	}
	if($(input_tiempo).val()==""){
		$(input_tiempo).removeClass("is-valid");
		$(input_tiempo).addClass("is-invalid");
		$("#crperror").removeClass("d-none");
		error[4]=true;
	}else{
		$(input_tiempo).removeClass("is-invalid");
		$(input_tiempo).addClass("is-valid");
		$("#crperror").addClass("d-none");
		error[4]=false;
	}
	if( !(error[0] || error[1] || error[2] || error[3] || error[4]) ){
		var nocards=$("#accordion2").find(".card").length+1;
		var html="<div class='card'>";
		html+="<div class='card-header' role='tab' id='heading2"+nocards+"'>";
		html+="<h5 class='mb-0'>";
		html+="<a class='collapsed' data-toggle='collapse' href='#collapse2"+nocards+"' role='button' aria-expanded='false' aria-controls='collapse2"+nocards+"'>";
		html+=$(input_nombre).val();
		html+="</a>";
		html+="</h5>";
		html+="</div>";
		html+="<div id='collapse2"+nocards+"' class='collapse' role='tabpanel' aria-labelledby='heading2"+nocards+"' data-parent='#accordion2'>";
		html+="<div class='card-body'>";
		html+="<div class='row mx-1 mt-1'>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Nombre:</label>";
		html+="<input type='text' value='"+$(input_nombre).val()+"' class='form-control rp-nombre'>";
		html+="</div>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Ocupación:</label>";
		html+="<input type='text' value='"+$(input_ocupacion).val()+"' class='form-control rp-ocupacion'>";
		html+="</div>";
		html+="</div>";
		html+="<div class='row mx-1'>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Domicilio:</label>";
		html+="<input type='text' value='"+$(input_domicilio).val()+"' class='form-control rp-domicilio'>";
		html+="</div>";
		html+="</div>";
		html+="<div class='row mx-1'>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Telefono:</label>";
		html+="<input type='text' value='"+$(input_telefono).val()+"' class='form-control rp-telefono'>";
		html+="</div>";
		html+="<div class='col'>";
		html+="<label for='' class='col-form-label'>Tiempo de conocerlo:</label>";
		html+="<input type='number' value='"+$(input_tiempo).val()+"' class='form-control rp-tiempoc'>";
		html+="</div>";
		html+="</div>";
		html+="</div>";
		html+="</div>";
		html+="</div>";
		$("#accordion2").append(html);
		$("#modal_nuevo_referencia").modal("toggle");
	}
}

/**********************************************************************
DATOS GENERALES
**********************************************************************/

/*
@brief Habilita todas las entradas de información de la sección de Datos Generales
@param boton Botón que se presiona para ejecutar esta función
*/
function habilitar_datos_generales(boton){
	$("#v-pills-datosg").find("input").prop("disabled",false);
	$("#guardar-datos-generales").prop("disabled",false);
	$(boton).attr("onclick","cargar_datos_generales('"+idEmpleado+"')");
	$(boton).text("Cancelar");
	checar_radios_generales();
}

/*
@brief Habilita o deshabilita los campos que dependen de una pregunta al momento de cargarse la pagina
*/
function checar_radios_generales(){
	if($("input[name=dg2]:checked").val()=="Si"){
		$("input[name=dg2cia]").prop("disabled",false);
	}else{
		$("input[name=dg2cia]").prop("disabled",true);
	}
	if($("input[name=dg3]:checked").val()=="Si"){
		$("input[name=dg3cia]").prop("disabled",false);
	}else{
		$("input[name=dg3cia]").prop("disabled",true);
	}
	if($("input[name=dg4]:checked").val()=="Si"){
		$("input[name=dg4cia]").prop("disabled",false);
	}else{
		$("input[name=dg4cia]").prop("disabled",true);
	}
	if($("input[name=dg5]:checked").val()=="Si"){
		$("input[name=dg5cia]").prop("disabled",false);
	}else{
		$("input[name=dg5cia]").prop("disabled",true);
	}
	if($("input[name=dg6]:checked").val()=="Si"){
		$("input[name=dg6cia]").prop("disabled",false);
	}else{
		$("input[name=dg6cia]").prop("disabled",true);
	}
}
/**********************************************************************
DATOS ECONOMICOS
**********************************************************************/

/*
@brief Habilita todas las entradas de información de la sección de Datos Económicos
*/
function habilitar_datos_economicos(boton){
	$("#v-pills-datose").find("input").prop("disabled",false);
	$("#guardar-datos-economicos").prop("disabled",false);
	$(boton).text("Cancelar");
	$(boton).attr("onclick","cargar_datos_economicos('"+idEmpleado+"')");
	checar_radios_economicos();
}
/*
@brief Habilita o deshabilita los campos que dependen de una pregunta al momento de cargarse la pregunta
*/
function checar_radios_economicos(){
	if($("input[name=de1]:checked").val()=="Si"){
		$("input[name=de1des]").prop("disabled",false);
	}else{
		$("input[name=de1des]").prop("disabled",true);
	}
	if($("input[name=de2]:checked").val()=="Si"){
		$("input[name=de2des]").prop("disabled",false);
	}else{
		$("input[name=de2des]").prop("disabled",true);
	}
	if($("input[name=de3]:checked").val()=="Si"){
		$("input[name=de3des]").prop("disabled",false);
		$("input[name=de3des2]").prop("disabled",false);
	}else{
		$("input[name=de3des]").prop("disabled",true);
		$("input[name=de3des2]").prop("disabled",true);
	}
	if($("input[name=de5]:checked").val()=="Si"){
		$("input[name=de5des]").prop("disabled",false);
		$("input[name=de5des2]").prop("disabled",false);
	}else{
		$("input[name=de5des]").prop("disabled",true);
		$("input[name=de5des2]").prop("disabled",true);
	}
	if($("input[name=de6]:checked").val()=="Si"){
		$("input[name=de6des]").prop("disabled",false);
	}else{
		$("input[name=de6des]").prop("disabled",true);
	}
	if($("input[name=de7]:checked").val()=="Si"){
		$("input[name=de7des]").prop("disabled",false);
		$("input[name=de7des2]").prop("disabled",false);
		$("input[name=de8]").prop("disabled",false);
	}else{
		$("input[name=de7des]").prop("disabled",true);
		$("input[name=de7des2]").prop("disabled",true);
		$("input[name=de8]").prop("disabled",true);
	}
}

/**********************************************************************
DATOS EXTRAS
**********************************************************************/

function habilitar_datos_extras(boton){
	$("#v-pills-datoex").find("input").prop("disabled",false);
	$("#v-pills-datoex").find("select").prop("disabled",false);
	$(boton).text("Cancelar");
	$(boton).attr("onclick","cargar_datos_extras('"+idEmpleado+"')");
	$("#guardar_dex").prop("disabled",false);
}
