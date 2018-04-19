$(document).ready(function(){
  resetMenu();
  $(document).on("click","#v-pills-solicitud-tab",setMenuSolicitud);
  $(document).on("click","#v-pills-listaemp-tab",setMenuLista);
  $(document).on("click","#v-pills-generarCarta-tab",setMenuGenerar);
  $(document).on("click","#v-pills-controlCartas-tab",setMenuControl);
  $(document).on("click","#v-pills-puestos-tab",setMenuPuestos);
  $(document).on("click","#v-pills-bienvenida-tab",setMenuBienvenida);
});

function resetMenu(){
	$("#menuEmpleados a").attr("aria-expanded","false");
  $("#v-pills-bienvenida-tab").addClass("active");
	$("#v-pills-bienvenida-tab").attr("aria-expanded","true");
	$("#v-pills-bienvenida").addClass("active");
	$("#v-pills-bienvenida").addClass("show");
	$("#v-pills-bienvenida").attr("aria-expanded","true");
}

function setMenuControl() {
	console.info("setMenuControl");
	//Activar la vista de control de cartas
	$("#v-pills-controlCartas-tab").addClass("active");
	$("#v-pills-controlCartas-tab").attr("aria-expanded","true");
	$("#v-pills-controlCartas").addClass("active");
	$("#v-pills-controlCartas").addClass("show");
	$("#v-pills-controlCartas").attr("aria-expanded","true");
	//Desactivar vista de bienvenida
  $("#v-pills-bienvenida-tab").removeClass("active");
	$("#v-pills-bienvenida-tab").attr("aria-expanded","false");
	$("#v-pills-bienvenida").removeClass("active");
	$("#v-pills-bienvenida").removeClass("show");
	$("#v-pills-bienvenida").attr("aria-expanded","false");
	//Desactivar vista solicitud de empleo
	$("#v-pills-solicitud-tab").removeClass("active");
	$("#v-pills-solicitud-tab").attr("aria-expanded","false");
	$("#v-pills-solicitud").removeClass("active");
	$("#v-pills-solicitud").removeClass("show");
	$("#v-pills-solicitud").attr("aria-expanded","false");
	//Desactivar vista de lista de empleados
	$("#v-pills-listaemp-tab").removeClass("active");
	$("#v-pills-listaemp-tab").attr("aria-expanded","false");
	$("#v-pills-listaemp").removeClass("active");
	$("#v-pills-listaemp").removeClass("show");
	$("#v-pills-listaemp").attr("aria-expanded","false");
	//Desactivar vista generar cartas
	$("#v-pills-generarCarta-tab").removeClass("active");
	$("#v-pills-generarCarta-tab").attr("aria-expanded","false");
	$("#v-pills-generarCarta").removeClass("active");
	$("#v-pills-generarCarta").removeClass("show");
	$("#v-pills-generarCarta").attr("aria-expanded","false");
  //Desactivar vista de puestos
	$("#v-pills-puestos-tab").removeClass("active");
	$("#v-pills-puestos-tab").attr("aria-expanded","false");
	$("#v-pills-puestos").removeClass("active");
	$("#v-pills-puestos").removeClass("show");
	$("#v-pills-puestos").attr("aria-expanded","false");
}

function setMenuGenerar() {
	console.info("setMenuGenerar");
	//Activar la vista generar carta
	$("#v-pills-generarCarta-tab").addClass("active");
	$("#v-pills-generarCarta-tab").attr("aria-expanded","true");
	$("#v-pills-generarCarta").addClass("active");
	$("#v-pills-generarCarta").addClass("show");
	$("#v-pills-generarCarta").attr("aria-expanded","true");
	//Desactivar vista de bienvenida
  $("#v-pills-bienvenida-tab").removeClass("active");
	$("#v-pills-bienvenida-tab").attr("aria-expanded","false");
	$("#v-pills-bienvenida").removeClass("active");
	$("#v-pills-bienvenida").removeClass("show");
	$("#v-pills-bienvenida").attr("aria-expanded","false");
	//Desactivar vista control cartas
	$("#v-pills-controlCartas-tab").removeClass("active");
	$("#v-pills-controlCartas-tab").attr("aria-expanded","false");
	$("#v-pills-controlCartas").removeClass("active");
	$("#v-pills-controlCartas").removeClass("show");
	$("#v-pills-controlCartas").attr("aria-expanded","false");
	//Desactivar vista solicitud de empleo
	$("#v-pills-solicitud-tab").removeClass("active");
	$("#v-pills-solicitud-tab").attr("aria-expanded","false");
	$("#v-pills-solicitud").removeClass("active");
	$("#v-pills-solicitud").removeClass("show");
	$("#v-pills-solicitud").attr("aria-expanded","false");
	//Desactivar vista de lista de empleados
	$("#v-pills-listaemp-tab").removeClass("active");
	$("#v-pills-listaemp-tab").attr("aria-expanded","false");
	$("#v-pills-listaemp").removeClass("active");
	$("#v-pills-listaemp").removeClass("show");
	$("#v-pills-listaemp").attr("aria-expanded","false");
  //Desactivar vista de puestos
	$("#v-pills-puestos-tab").removeClass("active");
	$("#v-pills-puestos-tab").attr("aria-expanded","false");
	$("#v-pills-puestos").removeClass("active");
	$("#v-pills-puestos").removeClass("show");
	$("#v-pills-puestos").attr("aria-expanded","false");
}

function setMenuLista() {
	console.info("setMenuLista");
	//Activar vista lista de empleados
	$("#v-pills-listaemp-tab").addClass("active");
	$("#v-pills-listaemp-tab").attr("aria-expanded","true");
	$("#v-pills-listaemp").addClass("active");
	$("#v-pills-listaemp").addClass("show");
	$("#v-pills-listaemp").attr("aria-expanded","true");
	//Desactivar vista de bienvenida
  $("#v-pills-bienvenida-tab").removeClass("active");
	$("#v-pills-bienvenida-tab").attr("aria-expanded","false");
	$("#v-pills-bienvenida").removeClass("active");
	$("#v-pills-bienvenida").removeClass("show");
	$("#v-pills-bienvenida").attr("aria-expanded","false");
	//Desactivar vista control cartas
	$("#v-pills-controlCartas-tab").removeClass("active");
	$("#v-pills-controlCartas-tab").attr("aria-expanded","false");
	$("#v-pills-controlCartas").removeClass("active");
	$("#v-pills-controlCartas").removeClass("show");
	$("#v-pills-controlCartas").attr("aria-expanded","false");
	//Desactivar vista generar cartas
	$("#v-pills-generarCarta-tab").removeClass("active");
	$("#v-pills-generarCarta-tab").attr("aria-expanded","false");
	$("#v-pills-generarCarta").removeClass("active");
	$("#v-pills-generarCarta").removeClass("show");
	$("#v-pills-generarCarta").attr("aria-expanded","false");
	//Desactivar vista solicitud de empleo
	$("#v-pills-solicitud-tab").removeClass("active");
	$("#v-pills-solicitud-tab").attr("aria-expanded","false");
	$("#v-pills-solicitud").removeClass("active");
	$("#v-pills-solicitud").removeClass("show");
	$("#v-pills-solicitud").attr("aria-expanded","false");
  //Desactivar vista de puestos
	$("#v-pills-puestos-tab").removeClass("active");
	$("#v-pills-puestos-tab").attr("aria-expanded","false");
	$("#v-pills-puestos").removeClass("active");
	$("#v-pills-puestos").removeClass("show");
	$("#v-pills-puestos").attr("aria-expanded","false");
}

function setMenuSolicitud() {
	//Activar vista de solicitud de empleo
	$("#v-pills-solicitud-tab").addClass("active");
	$("#v-pills-solicitud-tab").attr("aria-expanded","true");
	$("#v-pills-solicitud").addClass("active");
	$("#v-pills-solicitud").addClass("show");
	$("#v-pills-solicitud").attr("aria-expanded","true");
	//Desactivar vista de bienvenida
  $("#v-pills-bienvenida-tab").removeClass("active");
	$("#v-pills-bienvenida-tab").attr("aria-expanded","false");
	$("#v-pills-bienvenida").removeClass("active");
	$("#v-pills-bienvenida").removeClass("show");
	$("#v-pills-bienvenida").attr("aria-expanded","false");
	//Desactivar vista de lista de empleados
	$("#v-pills-listaemp-tab").removeClass("active");
	$("#v-pills-listaemp-tab").attr("aria-expanded","false");
	$("#v-pills-listaemp").removeClass("active");
	$("#v-pills-listaemp").removeClass("show");
	$("#v-pills-listaemp").attr("aria-expanded","false");
	//Desactivar vista control cartas
	$("#v-pills-controlCartas-tab").removeClass("active");
	$("#v-pills-controlCartas-tab").attr("aria-expanded","false");
	$("#v-pills-controlCartas").removeClass("active");
	$("#v-pills-controlCartas").removeClass("show");
	$("#v-pills-controlCartas").attr("aria-expanded","false");
	//Desactivar vista generar cartas
	$("#v-pills-generarCarta-tab").removeClass("active");
	$("#v-pills-generarCarta-tab").attr("aria-expanded","false");
	$("#v-pills-generarCarta").removeClass("active");
	$("#v-pills-generarCarta").removeClass("show");
	$("#v-pills-generarCarta").attr("aria-expanded","false");
  //Desactivar vista de puestos
	$("#v-pills-puestos-tab").removeClass("active");
	$("#v-pills-puestos-tab").attr("aria-expanded","false");
	$("#v-pills-puestos").removeClass("active");
	$("#v-pills-puestos").removeClass("show");
	$("#v-pills-puestos").attr("aria-expanded","false");
}

function setMenuPuestos(){
  // Activar vista de puestos
  $("#v-pills-puestos-tab").addClass("active");
	$("#v-pills-puestos-tab").attr("aria-expanded","true");
	$("#v-pills-puestos").addClass("active");
	$("#v-pills-puestos").addClass("show");
	$("#v-pills-puestos").attr("aria-expanded","true");
  //Desactivar vista de bienvenida
  $("#v-pills-bienvenida-tab").removeClass("active");
	$("#v-pills-bienvenida-tab").attr("aria-expanded","false");
	$("#v-pills-bienvenida").removeClass("active");
	$("#v-pills-bienvenida").removeClass("show");
	$("#v-pills-bienvenida").attr("aria-expanded","false");
	//Desactivar vista de lista de empleados
	$("#v-pills-listaemp-tab").removeClass("active");
	$("#v-pills-listaemp-tab").attr("aria-expanded","false");
	$("#v-pills-listaemp").removeClass("active");
	$("#v-pills-listaemp").removeClass("show");
	$("#v-pills-listaemp").attr("aria-expanded","false");
	//Desactivar vista control cartas
	$("#v-pills-controlCartas-tab").removeClass("active");
	$("#v-pills-controlCartas-tab").attr("aria-expanded","false");
	$("#v-pills-controlCartas").removeClass("active");
	$("#v-pills-controlCartas").removeClass("show");
	$("#v-pills-controlCartas").attr("aria-expanded","false");
	//Desactivar vista generar cartas
	$("#v-pills-generarCarta-tab").removeClass("active");
	$("#v-pills-generarCarta-tab").attr("aria-expanded","false");
	$("#v-pills-generarCarta").removeClass("active");
	$("#v-pills-generarCarta").removeClass("show");
	$("#v-pills-generarCarta").attr("aria-expanded","false");
  //Desactivar vista solicitud de empleo
	$("#v-pills-solicitud-tab").removeClass("active");
	$("#v-pills-solicitud-tab").attr("aria-expanded","false");
	$("#v-pills-solicitud").removeClass("active");
	$("#v-pills-solicitud").removeClass("show");
	$("#v-pills-solicitud").attr("aria-expanded","false");
}

function setMenuBienvenida(){
  // Activar vista de bienvenida
  $("#v-pills-bienvenida-tab").addClass("active");
	$("#v-pills-bienvenida-tab").attr("aria-expanded","true");
	$("#v-pills-bienvenida").addClass("active");
	$("#v-pills-bienvenida").addClass("show");
	$("#v-pills-bienvenida").attr("aria-expanded","true");
  //Desactivar vista de lista de empleados
	$("#v-pills-listaemp-tab").removeClass("active");
	$("#v-pills-listaemp-tab").attr("aria-expanded","false");
	$("#v-pills-listaemp").removeClass("active");
	$("#v-pills-listaemp").removeClass("show");
	$("#v-pills-listaemp").attr("aria-expanded","false");
	//Desactivar vista control cartas
	$("#v-pills-controlCartas-tab").removeClass("active");
	$("#v-pills-controlCartas-tab").attr("aria-expanded","false");
	$("#v-pills-controlCartas").removeClass("active");
	$("#v-pills-controlCartas").removeClass("show");
	$("#v-pills-controlCartas").attr("aria-expanded","false");
	//Desactivar vista generar cartas
	$("#v-pills-generarCarta-tab").removeClass("active");
	$("#v-pills-generarCarta-tab").attr("aria-expanded","false");
	$("#v-pills-generarCarta").removeClass("active");
	$("#v-pills-generarCarta").removeClass("show");
	$("#v-pills-generarCarta").attr("aria-expanded","false");
  //Desactivar vista solicitud de empleo
	$("#v-pills-solicitud-tab").removeClass("active");
	$("#v-pills-solicitud-tab").attr("aria-expanded","false");
	$("#v-pills-solicitud").removeClass("active");
	$("#v-pills-solicitud").removeClass("show");
	$("#v-pills-solicitud").attr("aria-expanded","false");
  //Desactivar vista de puestos
	$("#v-pills-puestos-tab").removeClass("active");
	$("#v-pills-puestos-tab").attr("aria-expanded","false");
	$("#v-pills-puestos").removeClass("active");
	$("#v-pills-puestos").removeClass("show");
	$("#v-pills-puestos").attr("aria-expanded","false");
}
