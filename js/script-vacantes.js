/**
* @author Juan Manuel Hernandez Hernandez
* @file script-vacantes.js
* @brief scripts que definen la interactividad entre el usuario y el apartado de control de vacantes
**/



//funcion principal se asignan funciones a eventos
$(document).ready(function(){
	console.log("Entro al script de vacantes");
	$("#savePuestos").prop("disabled",true);
	$(document).on("click","#agregarVacante, #quitarVacante",habilitarGuardarCambios);
	$(document).on("click","#agregarVacante",agregarVacante);
	$(document).on("click","#quitarVacante",quitarVacante);
	$(document).on("click","#eliminarPuesto",eliminarPuesto);
	$(document).on("click","#addPuesto",agregarPuesto);
	$(document).on("click","#cerrarModalVacantes",confirmarCancelarNuevoPuesto);
	$(document).on("click","#savePuestos",guardarCambios);
});

/**
* @brief funcion que llena el la etiqueta select con las vacantes solicitadas guardadas en la base de datos
**/
function llenarPuestosSolicitud() {
	console.log("LLenando puestos de la solicitud");
	$.ajax({
		url: 'php/llenarPuestosSolicitud.php',
		type: 'GET',
		success: function (response){
			$("#inputPuesto").html(response);
		}
	});
}


/**
* @brief Guarda los cambios efectuados en ambas listas
**/
function guardarCambios() {
	$("#vacantesSelect option[value='']").remove(); //Barrando basura options vacios
	$("#puestosSelect option[value='']").remove();
	console.clear();
	var optionPuestos = $("#puestosSelect option");
	var puestos = [];
	for(var i=0;i<optionPuestos.length;i++)
		puestos[i] = $(optionPuestos[i]).val();
	var optionVacantes = $("#vacantesSelect option");
	var vacantes = [];
	for(var i=0;i<optionVacantes.length;i++)
		vacantes[i] = $(optionVacantes[i]).val();
	console.log(vacantes);
	console.log(puestos);
	if(window.confirm("¿Seguro(a) que deseas guardar cambios?")){
		$.ajax({
			url: 'php/actualizarPuestos.php',
			type: 'POST',
			data: {"puestos":JSON.stringify(puestos),"vacantes":JSON.stringify(vacantes)},
			success: function(response) {

				console.log(response);
			},
			error: function(response) {
				console.log(response);
			}
		});
	}
	$("#savePuestos").prop("disabled",true);
}

/**
* Habilita el boton de Guardar Cambios
**/
function habilitarGuardarCambios() {
	$("#savePuestos").prop("disabled",false);
}
/**
* @brief al cargar la pagina se agrega a la lista de vacantes los puestos que son solicitados 
**/
/**
function llenarVacantes() {
	console.log("Buenos dias");
	var vacantes = "";
	var html = "";
	$.ajax({
		url: 'php/getVacantes.php',
		type: 'GET',
		success: function(response){
			vacantes = response.split(",");
			for(var i=0;i<vacantes.length;i++)
				html += "<option value='"+vacantes[i]+"'>"+vacantes[i]+"</option>";
			$("#vacantesSelect").html(html);
		}
	});
}

/**
* @brief al cargar la pagina se agrega a la lista puestos los puestos que no son solicitados
**/
/**function llenarPuestos() {
	var puestos = "";
	var html = "";
	$.ajax({
		url: 'php/getPuestos.php',
		type: 'GET',
		success: function(response) {
			puestos = response.split(",");
			for(var i=0;i<puestos.length;i++)
				html += "<option value='"+puestos[i]+"'>"+puestos[i]+"</option>";
			$("#puestosSelect").html(html);
		}
	});
}

/**
* @brief agrega el puesto a la lista de vacantes
**/
function agregarVacante(){
	var puesto = sPuestos.val();
	if(puesto!=""){
		for(var i=0;i<puesto.length;i++){
			$("#vacantesSelect option[value='']").remove();
			sVacantes.append("<option value='"+puesto[i]+"'>"+puesto[i]+"</option>");
			$("#puestosSelect option[value='"+puesto[i]+"']").remove();
		}
	}
}

/**
* @brief elimina un puesto de la lista de puestos y deja de estar disponible en ambas listas
**/
function eliminarPuesto() {
	var puesto = $("#puestosSelect").val();
	if(puesto!=""){
		if(window.confirm("¿Seguro que desea eliminar el puesto: "+puesto+"?")){
			$("#puestosSelect option[value='"+puesto+"']").remove();
			habilitarGuardarCambios();
		}
	}
}

/**
* @brief agrega un nuevo puesto a la lista de puestos
**/
function agregarPuesto(){
	var nuevoPuesto = $("#inputNuevoPuesto");
	var val = nuevoPuesto.val();
	var optionPuestos = $("#puestosSelect option");
	var puestos = [];
	for(var i=0;i<optionPuestos.length;i++)
		puestos[i] = $(optionPuestos[i]).val();

	
	if(nuevoPuesto.hasClass("is-invalid")){
		window.alert("Por favor, ingrese solo letras");
	} else {
		//Buscar que el puesto no se repita
		addPuesto(val);
		nuevoPuesto.val("");
		$("#agregarNuevoPuesto").modal("hide");
		habilitarGuardarCambios();
	}
	var puestos = getPuestos();
	if(puestos.length>0)
		ordenarLista(puestos);
	actualizarLista(sPuestos,puestos);
}

/**
* @brief Quita las vacantes seleccionadas y las agrega a la lista de puestos ademas las ordena alfabeticamente
**/
function quitarVacante(){
	var vacantes = sVacantes.val(); // obtiene las vacantes seleccionadas
	for(var i=0; i<vacantes.length;i++){
		$("#puestosSelect option[value='']").remove();
		addPuesto(vacantes[i]);    //agrega las vacantes a la lista de puestos
		quitVacante(vacantes[i]);	//quita las vacantes de la lista de vacantes
	}
	var puestos = getPuestos();  //obtiene la lista de puestos con las vacantes recien agregadas
	if(puestos.length>0)
		ordenarLista(puestos);   //ordena alfabeticamente la lista
	actualizarLista(sPuestos,puestos);  //actualiza la lista del html

}

/**
*  @grief confirma si se desea agregar en nuevo puesto
**/
function confirmarCancelarNuevoPuesto() {
	var nvoPuesto = $("#inputNuevoPuesto").val();
	var mensaje = "Esta a punto de cerrar esta ventana, esto evitara que se agrege el nuevo puesto \n¿Desea continuar?";
	if(nvoPuesto!=""){
		if(window.confirm(mensaje)){
			$("#agregarNuevoPuesto").modal("hide");
			$("#inputNuevoPuesto").val("");
			$("#inputNuevoPuesto").removeClass("is-invalid");
		}
	} else{
		$("#agregarNuevoPuesto").modal("hide");
	}
}

/**
* @brief pasa una lista a mayusculas y ordena la lista original alfabeticamente usando la lista en mayusculas
* @param lista: el array que se ordenara
**/
function ordenarLista(lista){
	var listaUpper = [];
	var auxUpper, aux;

	//Metodo burbuja
	for(var i=0;i<lista.length;i++)
		listaUpper[i] = lista[i].toUpperCase();
	for(var i=1;i<listaUpper.length;i++){
		for(var j=0;j<listaUpper.length-1;j++){
			if(listaUpper[j] > listaUpper[j+1]){
				auxUpper = listaUpper[j];
				aux = lista[j];
				listaUpper[j] = listaUpper[j+1];
				listaUpper[j+1] = auxUpper;
				lista[j] = lista[j+1];
				lista[j+1] = aux;
			}
		}
	}

}

/**
* @brief Convierte los valores de un array a mayusculas
* @param array: el array que se pasara a mayusculas
**/
function toUpper(array){
	var newArray = [];
	for(var i=0;i<array.length;i++){
		newArray[i] = array[i].toUpperCase();
	}

	return newArray;
}

/**
* @brief guardar los puestos que estan actualmente en la lista de puestos
**/
function getPuestos(){
	sPuestos = $("#puestosSelect");
	puestos = sPuestos.children("option");
	for(var i=0;i<puestos.length;i++)
		puestos[i] = $(puestos[i]).val();
	return puestos;
}

/**
* @brief agrega a la lista del html todos los elementos del array
* @param nodoHTML: el SELECT al que le agregaremos las opciones 
* @param array: arreglo que contiene las opciones a agregar
**/
function actualizarLista(nodoHTML,array){
	nodoHTML.html("");
	for(var i=0;i<array.length;i++)
		nodoHTML.append("<option value='"+array[i]+"'>"+array[i]+"</option>");
}

/**
* @brief elimina una vacante de la lista de vacantes
* @param vacante: vacante que se eliminara
**/
function quitVacante(vacante){
	$("#vacantesSelect option[value='"+vacante+"']").remove();
}

/**
* @brief agrega una vacante a la lista de puestos
* @param vacante: vacante que se agregara
**/
function addPuesto(vacante){
	sPuestos.append("<option value='"+vacante+"'>"+vacante+"</option>");
}
