/** * @file controlTablas.js
* @author Juan Manuel Hernandez Hernandez
* @brief  javascript que se encarga de insertar todo el codigo HTML a la pagina de menu.html
**/


//main
$(document).ready(function(){
	numTelefono = $("#tablaTelefonos tbody tr").length; // numero de telefonos agregados  a la tabla telefonos
	numHijos = $("#tablaHijos tbody tr").length; // nummero de hijos agregados a la tabla de hijos
	numIdiomas = $("#tablaIdiomas tbody tr").length; //numero de idiomas agregados a la tabla de idiomas
	numSoft = $("#tablaSoftware tbody tr").length; //numero de software agregados a la tabla software
	$("#numSoft").val(numSoft); //input que contiene el numero de software
	$("#numHijos").val(numHijos); //input que contiene el numero de hijos
	$("#numTelefonos").val(numTelefono); //input que contiene el numero de telefonos
	$("#numIdiomas").val(numIdiomas); //input que contiene el numero de Idiomas
	$(document).on("click","#btnAddTelefono",agregarTelefono);
	$(document).on("click","#tablaTelefonos .borrarTelefono",borrarTelefono);
	$(document).on("click","#agregarHijos",agregarHijo);
	$(document).on("click","#tablaHijos .eliminar",borrarHijo);
	$(document).on("click","#btnAgregarEscuela",agregarEscuela);
	$(document).on("click","#agregarIdioma",agregarIdioma);
	$(document).on("click","#tablaIdiomas .eliminar",borrarIdioma);
	$(document).on("click","#agregarSoftware",agregarSoftware);
	$(document).on("click","#tablaSoftware .eliminar",borrarSoftware);
	$(document).on("click","#btnAgregarEmpleo",agregarEmpleo);
	$(document).on("click","#btnQuitarEscuela",quitarEscuela);
	$(document).on("click","#btnQuitarEmpleo",quitarEmpleo);
	$(document).on("click","#btnQuitarEscuela, #btnAgregarEscuela",controlBotonAgregarEscuela);
	$(document).on("click","#btnQuitarEmpleo, #btnAgregarEmpleo",controlBotonAgregarEmpleo);
	$(document).on("click",".close",regresarFloat);
});

function desactivaFloat(){
	var elemento = document.getElementById("accordion");
	elemento.className += " d-none";
}
function regresarFloat(){
	var elemento= document.getElementById("accordion");
	elemento.classList.remove("d-none");
}
/**
*@brief control del texto al boton agregar empleo
**/
function controlBotonAgregarEmpleo() {
	var numEmp = $("div.agregarEmpleo div.container").length;
	if(numEmp>0){
		$("#btnAgregarEmpleo").html("Agregar otro Empleo");
		$("div.agregarEmpleo").find(".noEmpleo").remove();
	} else if(numEmp==0) {
		console.log("entro");
		$(".agregarEmpleo").html("<h5 class='noEmpleo'>No hay empleo</h5>");
		$("#btnAgregarEmpleo").html("Agregar Empleo");
	}
}
/**
*@brief funcion para quitar el ultimo empleo agregado
**/
function quitarEmpleo () {
	var numEmp = $("div.agregarEmpleo div.container").length;
	if(numEmp>0){
		$(this).closest(".setBorder").find(".agregarEmpleo .container:last-child").remove();
		numEmp--;
		$("#numEmpleo").val(numEmp);
	}
}

/**
*@brief controla el texto del boton agregar escuela
**/
function controlBotonAgregarEscuela () {
	var numEsc = $("div.agregarEscuela div.container").length;
	if(numEsc>0){
		$("#btnAgregarEscuela").html("Agregar otra Escuela");
		$("div.agregarEscuela").find(".noEscuela").remove();
	}
	else if(numEsc==0){
		$(".agregarEscuela").html("<h5 class='noEscuela'>No hay escuela</h5>");
		$("#btnAgregarEscuela").html("Agregar Escuela");
	}
}

/**
*@brief Funcion que quita la ultima escuela agregada
**/
function quitarEscuela() {
	var numEsc = $("div.agregarEscuela div.container").length;
	if(numEsc>0){
		$(this).closest(".setBorder").find(".agregarEscuela .container:last-child").remove();
		numEsc--;
		$("#numEscuela").val(numEsc);
	}
}

/**
*@brief agrega una etiqueta tr con el numero de telefono y tipo a la tabla de telefonos
**/
function agregarTelefono(){
	//obtenemos el numero y tipo de telefono
	var numero = $("#inputTelefono").val();
	var tipo = $("#selectTelefono").val();
	var nuevaFila = "<tr>"; //variable que contiene el codigo HTML que sera insertado
	var tel = $("#numTelefonos").val();
	if(numero.match(/\d/) && numero.length==10 && tipo!=""){ //Expresion regular para validar un telefono
		//agrega un telefono si no esta seleccionada la opcion de tipo

		$("#tablaTelefonos tbody tr.noTR").remove();
		var numRows = $("#tablaTelefonos tbody tr").length;
		nuevaFila += "<td>"+tipo+"</td><td>"+numero+"</td><td><button class='btn borrarTelefono' type='button'>Quitar</button></td>";
		nuevaFila += "<input class='tipoTelefono' type='hidden' name='telefonoTipo"+(numRows+1)+"' value='"+tipo+"'>";
		nuevaFila += "<input class='numeroTelefono' type='hidden' name='telefonoNumero"+(numRows+1)+"' value='"+numero+"'>";
		$("#tablaTelefonos").append(nuevaFila);
		tel++;
		$("#inputTelefono").removeClass("is-invalid");
		$("#errorTelefono").addClass("d-none");
		$("#error2Telefono").addClass("d-none");
	}
	else if(tipo=="") {
		//Salta un error en caso de que no se seleccione el tipo de telefono

		$("#inputTelefono").addClass("is-invalid");
		$("#errorTelefono").addClass("d-none");
		$("#error2Telefono").removeClass("d-none");
	}
	else {
		//Salta un error en caso de que el telefono no sea valido

		$("#inputTelefono").addClass("is-invalid");
		$("#errorTelefono").removeClass("d-none");
		$("#error2Telefono").addClass("d-none");
	}
	$("#numTelefonos").val(tel); // se actualiza el numero de telefonos
	$("#inputTelefono").val("");
}
/**
*@brief borra un telefono de la tabla de telefonos
**/

function borrarTelefono(){
	var tel = $("#numTelefonos").val();
	$(this).closest("tr").remove(); // vora el padre tr mas cercano
	tel--;
	$("#numTelefonos").val(tel);
	if(tel==0){
		// se agrega el nuevo telefono al final de la tabla
		$("#tablaTelefonos tbody").html("<tr class='noTR'><td class='align-middle' colspan='3'><p class='text-center'>Agrega teléfonos a la tabla usando el boton AGREGAR TELÉFONOS</p></td></tr>");
	}
	var trs =  $("#tablaTelefonos tbody").find("tr");

	//se actualizan los atrubutos name
	for(var i=0; i<=trs.length ;i++){
		$(trs[i]).find(".tipoTelefono").attr("name","telefonoTipo"+(i+1));
		$(trs[i]).find(".numeroTelefono").attr("name","telefonoNumero"+(i+1));
	}
}
/**
*@brief agrega un hijo a la tabla de hijos
**/
function agregarHijo(){
	$("#tablaHijos tr.noTR").remove();
	var numRows = $("#tablaHijos tbody tr").length;
	var nuevaFila = "<tr><td><input required='' type='text' maxlength='70' name='inputNombreHijo"+(numRows+1)+"' class='form-control validarTexto inputNombreHijo'></td>";
	nuevaFila += "<td><input required='' type='number' min='1' max='60' value='1' name='inputEdadHijo"+(numRows+1)+"' class='form-control inputEdadHijo'></td>";
	nuevaFila += "<td><button type='button' class='btn btn-secondary eliminar'>Quitar</button></td></tr>";
	$("#tablaHijos").append(nuevaFila);
	var x = $("#numHijos").val();
	x++;
	$("#numHijos").val(x);
}

function borrarHijo(){
	$(this).closest("tr").remove();
	var x = $("#numHijos").val();
	x--;
	$("#numHijos").val(x);
	if(x==0)
		$("#tablaHijos tbody").html("<tr class='noTR'><td class='align-middle' colspan='3'><p class='text-center'>Sin hijos</p></td></tr>");
	var trs = $("#tablaHijos tbody").find("tr");
	for(var i=0; i<=trs.length; i++){
		$(trs[i]).find(".inputNombreHijo").attr("name","inputNombreHijo"+(i+1));
		$(trs[i]).find(".inputEdadHijo").attr("name","inputNombreHijo"+(i+1));
	}
}

function agregarIdioma() {
	$("#tablaIdiomas tbody tr.noTR").remove();
	var numRows = $("#tablaIdiomas tbody tr").length;
	var nuevaFila = "<tr><td><select required='' name='inputIdioma"+(numRows+1)+"' class='form-control inputIdioma'><option>Seleccione una opción</option></select></td>";
	nuevaFila += "<td><div class='input-group'><input required='' type='number' min='0' max='100' name='inputNivel"+(numRows+1)+"' class='form-control inputNivel' aria-describedby='porcentajeIcon'>";
	nuevaFila += "<div class='input-group-addon'><span class='input-group-text' id='porcentajeIcon'>%</span></div></div></td>";
	nuevaFila += "<td><button type='button' class='btn btn-secondary eliminar'>Quitar</button></td></tr>";
	$("#tablaIdiomas").append(nuevaFila);
	var x = $("#numIdiomas").val();
	x++;
	$("#numIdiomas").val(x);
}

function borrarIdioma() {
	$(this).closest("tr").remove();
	var x = $("#numIdiomas").val();
	x--;
	$("#numIdiomas").val(x);
	if(x==0)
		$("#tablaIdiomas tbody").html("<tr class='noTR'><td class='align-middle' colspan='3'><p class='text-center'>No hay Idiomas</p></td></tr>");
	var trs = $("#tablaIdiomas tbody").find("tr");
	for(var i=0; i<trs.length; i++){
		$(trs[i]).find(".inputIdioma").attr("name","inputIdioma"+(i+1));
		$(trs[i]).find(".inputNivel").attr("name","inputNivel"+(i+1));
	}
}

function agregarSoftware(){
	$("#tablaSoftware tr.noTR").remove();
	var numRows = $("#tablaSoftware tbody tr").length;
	var nuevaFila = "<tr><td><input type='text' maxlength='40' required='' name='inputSofware"+(numRows+1)+"' class='form-control inputSoftware'></td>";
	nuevaFila += "<td><select required='' name='inputNivelSoftware"+(numRows+1)+"' class='form-control inputNivelSoftware'><option value='Basico'>Basico</option>";
	nuevaFila += "<option value='Intermedio'>Intermedio</option><option value='Avanzado'>Avanzado</option></select></td>";
	nuevaFila += "<td><button type='button' class='btn btn-secondary eliminar'>Quitar</button></td></tr>";
	$("#tablaSoftware").append(nuevaFila);
	var x = $("#numSoft").val();
	x++;
	$("#numSoft").val(x);
}

function borrarSoftware() {
	$(this).closest("tr").remove();
	var x = $("#numSoft").val();
	x--;
	$("#numSoft").val(x);
	if(x==0)
		$("#tablaSoftware tbody").html("<tr class='noTR'><td class='align-middle' colspan='3'><p class='text-center'>Agrege aquí cualquier otro software que maneje y que no se haya mencionado arriba.</p></td></tr>");
	var trs = $("#tablaSoftware tbody").find("tr");
	for(var i=0; i<trs.length; i++){
		$(trs[i]).find(".inputSoftware").attr("name","inputSoftware"+(i+1));
		$(trs[i]).find(".inputNivelSoftware").attr("name","inputNivelSoftware"+(i+1));
	}
}
function modalHH(){
	$('#exampleModal').modal('toggle');
}
function modalCM(){
	$('#ModalCM').modal('toggle');
}
function modalESCOL(){
	$('#ESCOL').modal('toggle');
}
function modalEMP(){
	$('#modalEMP').modal('toggle');
}
function agregarEscuela(){
	var numEsc = $("div.agregarEscuela div.container").length;
	var nuevo = "<div class='container' value='"+(numEsc+1)+"'><div class='row pl-3 justify-content-start empleos-header'>";
	nuevo += "<h3>ESCUELA "+(numEsc+1)+"</h3></div><input type='hidden' name='idEscuela"+(numEsc+1)+"' id='idEscuela"+(numEsc+1)+"' value=''><div class='row justify-content-start'>";
	nuevo += "<div class='col'><div class='form-group'><label>¿Actualmente esta estudiando en esta institución?</label>";
	nuevo += "<select class='form-control selectTipoEscuela' id='selectTipoEscuela"+(numEsc+1)+"' name='selectTipoEscuela"+(numEsc+1)+"'><option value='Si'>Si</option>";
	nuevo += "<option value='No' selected>No</option></select></div></div></div>";
	nuevo += "<div class='row justify-content-between'><div class='col-4'><div class='form-group'>";
	nuevo += "<label for='selectNivelEscuela"+(numEsc+1)+"'>Nivel</label><select name='selectNivelEscuela"+(numEsc+1)+"' class='form-control selectNivelEscuela'>";
	nuevo += "<option value='default'>Selecciona una opción</option></select></div></div>";
	nuevo += "<div class='col-4'><div class'form-group'>";
	nuevo += "<label for='selectEstado"+(numEsc+1)+"'>Estado</label><select name='selectEstado"+(numEsc+1)+"' class='form-control selectEstado'>";
	nuevo += "<option value='default'>Selecciona una opción</option></select></div></div>";
	nuevo += "<div class='col-4'><div class='form-group'>";
	nuevo += "<label for='selectDelegacion"+(numEsc+1)+"'>Delegación</label>";
	nuevo += "<select name='selectDelegacion"+(numEsc+1)+"' class='form-control selectDelegacion'>";
	nuevo += "<option value='default'>Selecciona una opción</option>";
	nuevo += "</select></div></div></div><div class='row justify-content-between'><div class='col-5'>";
	nuevo += "<div class='form-group'><label for='inputEscuela"+(numEsc+1)+"'>Escuela</label>";
	nuevo += "<select name='inputEscuela"+(numEsc+1)+"' class='form-control inputEscuela'><option value='default'>Selecciona una opción</option></select></div></div>";
	nuevo += "<div class='col-auto'><div class='form-group'>";
	nuevo += "<label for='inputCalleEscuela"+(numEsc+1)+"'>Calle</label>";
	nuevo += "<input type='text' maxlength='60' name='inputCalleEscuela"+(numEsc+1)+"' class='form-control'></div></div>";
	nuevo += "<div class='col'><div class='form-group noSpinner'>";
	nuevo += "<label for='inputNumeroEscuela"+(numEsc+1)+"'>Numero Exterior</label>";
	nuevo += "<input type='text' maxlength='39' name='inputNumeroEscuela"+(numEsc+1)+"' class='form-control'></div></div></div>";
	nuevo += "<div class='row justify-content-between'><div class='col-2'><div class='form-group noSpinner'>";
	nuevo += "<label for='inputAnoinicio"+(numEsc+1)+"'>Año Inicio*</label>";
	nuevo += "<input type='number' min='1950' required='' name='inputAnoinicio"+(numEsc+1)+"' class='form-control validarNumero'></div></div>";
	nuevo += "<div class='col-3'><div class='form-group noSpinner escuelaAnterior'>";
	nuevo += "<label for='inputAnofinal"+(numEsc+1)+"'>Año de Graduación*</label>";
	nuevo += "<input type='number' required='' name='inputAnofinal"+(numEsc+1)+"' class='form-control validarNumero'></div><div class='form-group d-none escuelaActual'>";
	nuevo += "<div class='row'><div class='col-8'><label for='inputHorarioEscuelaActual"+(numEsc+1)+"'>Horario*</label></div><div class='col-4'><i id='ModalHH' onclick='modalHH(),desactivaFloat()' class='material-icons unselection botonx'>info</i></div></div>";
	nuevo += "<input type='text' disabled='' maxlength='11' name='inputHorarioEscuelaActual"+(numEsc+1)+"' id='inputHorarioEscuelaActual"+(numEsc+1)+"' placeholder='Ej: 07:30-12:00' class='form-control validarHorario'>";
	nuevo += "<p class=' d-none text-danger small'>Horario no valido</p></div></div><div class='col-2 curso'><div class='form-group noSpinner escuelaAnterior'><label for='inputAnos"+(numEsc+1)+"'>Años*</label>";
	nuevo += "<input type='number' min='1' readonly='' required='' name='inputAnos"+(numEsc+1)+"' class='form-control validarNumero'></div><div class='form-group d-none escuelaActual'><label>Curso o Carrera*</label>";
	nuevo += "<input type='text' maxlength='100' name='inputCurso"+(numEsc+1)+"' id='inputCurso"+(numEsc+1)+"' class='form-control validarTexto'></div></div>";
	nuevo += "<div class='col-auto grado'><div class='form-group escuelaAnterior'><label for='inputTitulo"+(numEsc+1)+"'>Titulo Recibido*</label>";
	nuevo += "<input type='text' required='' maxlength='60' name='inputTitulo"+(numEsc+1)+"' class='form-control  validarTexto'><small class='form-text text-muted'>Si no tiene titulo ingrese 'Sin Titulo'</small></div><div class='form-group d-none escuelaActual'><label>Grado</label>";
	nuevo += "<input type='text' maxlength='20' placeholder='Ej: 1er Semestre' name='inputGrado"+(numEsc+1)+"' id='inputGrado"+(numEsc+1)+"' class='form-control'></div></div></div></div>";
	$("div.agregarEscuela").append(nuevo);
	var x = $("#numEscuela").val();
	x++;
	$("#numEscuela").val(x);
}

function agregarEmpleo() {
	var numEmp = $("div.agregarEmpleo div.container").length;
	var nuevo = "<div class='container pb-3'><div class='row pl-3 justify-content-start empleos-header'><h3>EMPLEO "+(numEmp+1)+"</h3></div>";
	nuevo += "<div class='form-group row justify-content-start'><label class='col-form-label col-auto'>Empleo:</label><div class='col-auto'>";
	nuevo += "<select name='selectEmpleo"+(numEmp+1)+"' class='form-control selectEmpleo'><option value='actual'>Actual</option><option value='anterior' selected>Anterior</option>";
	nuevo += "</select></div></div><div class='form-group row justify-content-between'><div class='col-6'><div class='form-group'><label>Empezo a prestar sus servicios (Mes y año):*</label>";
	nuevo += "<input required='' maxlength='15' type='date' name='servicioInicio"+(numEmp+1)+"' class='servicioInicio form-control form-control-sm'><small class='form-text text-muted'>Si no recuerda el dia exacto basta con seleccionar un dia correspondiente al mes y año</small></div></div>";
	nuevo += "<div class='col-6 terminoPrestar'><div class='form-group'><label>Termino de prestar sus servicios (Mes y año):*</label>";
	nuevo += "<input type='date' maxlength='15' required='' name='servicioFinal"+(numEmp+1)+"' class='servicioFinal form-control form-control-sm'><small class='form-text text-muted'>Si no recuerda el dia exacto basta con seleccionar un dia correspondiente al mes y año</small></div></div></div>";
	nuevo += "<div class='row justify-content-between'><div class='col-4'><div class='form-group'><label for='inputNombreCompania"+(numEmp+1)+"'>Nombre de la compañia*</label>";
	nuevo += "<input required='' type='text' maxlength='100' name='inputNombreCompania"+(numEmp+1)+"' class='inputNombreCompania form-control'></div></div><div class='col-8'><div class='form-group'>";
	nuevo += "<label for='inputDireccionCompania"+(numEmp+1)+"'>Dirección</label><input type='text' maxlength='100' name='inputDireccionCompania"+(numEmp+1)+"' class='inputDireccionCompania form-control'>";
	nuevo += "</div></div></div><div class='row justify-content-between'><div class='col-auto'><div class='form-group noSpinner'><label for='inputTelefonoCompania"+(numEmp+1)+"'>Teléfono</label>";
	nuevo += "<input type='text' maxlength='10' name='inputTelefonoCompania"+(numEmp+1)+"' class='inputTelefonoCompania form-control validarTelefono'></div></div><div class='col-auto'><div class='form-group'>";
	nuevo += "<label for='inputPuestoAnterior"+(numEmp+1)+"'>Puesto*</label><input required='' type='text' maxlength='45' name='inputPuestoAnterior"+(numEmp+1)+"' class='inputPuestoAnterior form-control validarTexto'>";
	nuevo += "</div></div><div class='col-3'><div class='form-group noSpinner'><label for='inputSueldoAnterior"+(numEmp+1)+"'>Sueldo Mensual*</label>";
	nuevo += "<input type='number' required='' min='0' max='500000' name='inputSueldoAnterior"+(numEmp+1)+"' class='inputSueldoAnterior form-control'></div></div></div><div class='row justify-content-around'>";
	nuevo += "<div class='col-3 terminoPrestar'><div class='form-group'><label>Motivo separación*</label><input type='text' required='' maxlength='280' name='inputMotivo"+(numEmp+1)+"' class='inputMotivo form-control validarTexto'></div></div>";
	nuevo += "<div class='col-auto'><div class='form-group'><label>Nombre de su jefe directo*</label><input required='' type='text' maxlength='100' name='inputNombreJefe"+(numEmp+1)+"' class='inputNombreJefe form-control validarTexto'>";
	nuevo += "</div></div><div class='col-auto'><div class='form-group'><label for='inputPuestoJefe"+(numEmp+1)+"'>Puesto del jefe Directo*</label>";
	nuevo += "<input type='text' required='' maxlength='45' name='inputPuestoJefe"+(numEmp+1)+"' class='form-control inputPuestoJefe validarTexto'></div></div></div><div class='row justify-content-start'><div class='col'><div class='form-group'>";
	nuevo += "<label for='comentariosJefe"+(numEmp+1)+"'>Comentarios de la empresa</label><textarea rows='3'  maxlength='280' name='comentariosJefe"+(numEmp+1)+"' class='form-control comentariosJefe'></textarea></div></div></div></div>";
	$("div.agregarEmpleo").append(nuevo);
	var x = $("#numEmpleo").val();
	x++;
	$("#numEmpleo").val(x);
}
