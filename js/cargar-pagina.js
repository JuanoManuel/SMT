var sVacantes; //sVacantes esta seleccionando el nodo de la lista de vacantes
var sPuestos; //sPuestos esta seleccionando el nodo de la lista de puestos

$(document).ready(function(){
  cargar_menu();
  cargar_contenido();
});

function bloquearGuardarCambios(){
  $("#savePuestos").prop("disabled",true); //Bloquea el boton de guardar cambios en la seccion de vacantes
}

function cargar_menu(){
  console.log("cargar-menu");
  var peticion=$.ajax({
		method: "POST",
		url: "php/cargar_menu.php"
	});
	peticion.done(function(respuesta){
		$("#cargar-menu").html(respuesta);
	})
}
function cargar_contenido(){
  console.log("cargar-contenido");
  var peticion=$.ajax({
    method: "POST",
    url: "php/cargar_contenido.php"
  });
	peticion.done(function(respuesta){
  	$("#cargar-contenido").html(respuesta);
    bloquearGuardarCambios();
    listar_empleados();
    cargar_bienvenida();
    llenarVacantes();
    llenarPuestos();
    llenarPuestosSolicitud();
    sVacantes = $("#vacantesSelect");
    sPuestos = $("#puestosSelect");

  })
}
function cargar_bienvenida(){
  var peticion=$.ajax({
    method: "POST",
    url: "php/cargar_bienvenida.php"
  });
  peticion.done(function(respuesta){
    $("#v-pills-bienvenida").html(respuesta);
  });
}

/**
* @brief al cargar la pagina se agrega a la lista de vacantes los puestos que son solicitados 
**/
function llenarVacantes() {
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
function llenarPuestos() {
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
* @brief funcion que llena el la etiqueta select con las vacantes solicitadas guardadas en la base de datos
**/
function llenarPuestosSolicitud() {
  
  $.ajax({
    url: 'php/llenarPuestosSolicitud.php',
    type: 'GET',
    success: function (response){
      $("#inputPuesto").html(response);
    }
  });
}