/**
* @file canvas-camara.js
* @author Juan Manuel Hernandez Hernandez
* @brief Documento donde se controlan todos los elementos del HTML TomarFoto.html excluyendo el funcionamiento de la camara
**/


// Funcion que se ejecuta al cargar el documento
$(document).ready(function(){
	// se manda a llamar a funcion generarGuia
	generarGuia();
	// cuando el usuario le de click al icono de tomar foto se mandara a llamar a la funcion siguiente
	$("#take-photo").on("click",function(){
		//se manda a llamar al metodo letsCut de la clase clsCut
		clsCut.letsCut("snap","app");
		//Se oculta el boton de tomar foto
		$("#takePhoto").addClass("d-none");
		// se muestra el div para confirmar la foto
		$("#confirm").removeClass("d-none");
	});

	//Cuando el usuario confirme la foto se mandara a llamar a la siguiente funcion
	$("button#nextStep").on("click",function(){
		var url = $("#confirmPhoto").attr("src"); //variable que contiene la url de la foto

		//se le asigna el url de la foto a la etiqueta imagen
		$("#photoNext").attr("src",url);
		// Se muestra el div para pasar a la firma 
		$("div#nextStep").removeClass("d-none");
		// Se oculta el div actual
		$("#confirm").addClass("d-none");
	});

	//cuando el usuario le de click en continuar se ejecutara la siguiente funcion
	$("#btnContinuar").click(function(){
    	var url = $("#photoNext").attr("src"); //variable donde se guarda la url de la foto

    	// metodo post de ajax donde se mandara la url de la foto al php upload-foto.php para 
    	// que sea guardada en el directorio correspondiente
    	$.post('upload-foto.php',{img : url},function(data) {
    		window.alert("Foto Guardada");
    		window.location.href="firmaProspecto.html";
    	});
    });
});

/**
* @brief Dibuja el canvas con el recuadro amarillo que servira de guia para tomar una buena foto
**/
function generarGuia(){
	var video = $("video"); // se guarda en una variable la etiqueta video

	//se guardan el ancho y altura del video
	var videoWidth = video.width();
	var videoHeight = 150+video.height();

	//se genera una escena de kinetic con las medidas del video
	var stage = new Kinetic.Stage({
		container: 'marco',
		width: videoWidth,
		height: videoHeight
	});
	var layer = new Kinetic.Layer(); //se genera una nueva capa
	var rect = new Kinetic.Rect({ //se genera el rectangulo que servira de guia
		x: (videoWidth/2)-142,
		y: 50,
		width: 284,
		height: 340,
		stroke: "#FFFF00",
		strokeWidth: 1,
		draggable: true
	});

	// Se agrega el rectangulo a la capa y la capa a la escena de kinetic y se dibuja en el canvas
	layer.add(rect);
	stage.add(layer);
	stage.draw();
}


/**
* @brief clase clsCut con solo un metodo llamado letsCut
**/
var clsCut = (function(){

	/**
	* @brief funcion que recorta toda la foto, para que solo sea guardada la parte de la imagen que este dentro
	* de la guia amarilla
	* @param idImg: la foto tomada, idComtainer: contenedor donde se guardara la imagen ya recortada
	**/

	//Metodo fadeOut oculta el elemento y metodo fadeIn muestra el elemento

	function letsCut(idImg,idContainer){
		$("#snap").fadeOut(); 
		var idImg = "#"+idImg; //agregamos un # al elemento de imagen para poder usarlo con jquery
		var url = $("#snap").attr("src"); // se guarda el URL de la imagen
		var imagen = new Image(); //se crea un objeto imagen
		imagen.src = url; //al objeto imagen se le asigna el url de la foto

		//al cargarse la imagen se ejecutara la siguiente funcion
		imagen.onload = function(){

			//se guarda el tamaño de la imagen
			var imgWidth = this.width;
			var imgHeight = this.height;

			// se crea una nueva escena de kinetic
			var stage = new Kinetic.Stage({
				container: 'imagen', //canvas con el id imagen
				width: imgWidth,
				height: imgHeight,
			});
			var layer = new  Kinetic.Layer(); //layer que contendra el rectangulo
			var fondo = new Kinetic.Layer(); //leyer que simulara ser el fondo
			var img = new Kinetic.Image({  // se crea una imagen kinetic
				image: imagen, //variable donde esta guardada la imagen
				x: 0,
				y: 0,
				width: imgWidth,
				height: imgHeight,
			});
			fondo.add(img); //agregamos la imagen al fondo
			var rect = new Kinetic.Rect({ //se dibuja el rectangulo de referencia para recortar la imagen
				x: (imgWidth/2)-142,
				y: 50,
				width: 284,
				height: 340,
				stroke: "#FFFF00",
				strokeWidth: 1,
				draggable: true
			});
			layer.add(rect);
			stage.add(fondo);
			stage.add(layer);
			stage.draw();
				
			layer.remove(rect); // se remueve el rectangulo para que no aparesca en la imagen recortada
			var Canvas = document.getElementsByTagName("canvas"); //se guardan todos los canvas en un array
			var ctx = Canvas[2].getContext("2d"); //dependiendo del numero de canvas el canvas[2] es donde esta dibujada la imagen

			//funcion getImageData donde se especifica una region de la imagen que se desea ser mostrada
			var datosImage = ctx.getImageData(rect.getX(),rect.getY(),rect.width(),rect.height());
			var canvasFinal = Canvas[3];  //canvas donde se dibujara la imagen recortada
			var ctx2 = canvasFinal.getContext("2d"); 
			canvasFinal.height = datosImage.height;
			canvasFinal.width = datosImage.width;
			ctx2.putImageData(datosImage,0,0); //se agrega la imagen a la variable ctx2
			var dataURL = canvasFinal.toDataURL(); 
			//se obtiene el url de la nueva imagen para asignarlo a los botones de descargar y confirmar
			$("#download-photo").attr("href",dataURL);
			$("#confirmPhoto").attr("src",dataURL);
		}
	}
	return {
		//se retorna el metodo para que pueda ser utilizado
		letsCut : letsCut
	}
})();