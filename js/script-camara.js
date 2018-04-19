// Obtenemos todos los elementos que necesitaremos
var video = document.querySelector('#camera-stream'),
    image = document.querySelector('#snap'),
    start_camera = document.querySelector('#start-camera'),
    controls = document.querySelector('.controls'),
    take_photo_btn = document.querySelector('#take-photo'),
    delete_photo_btn = document.querySelector('#delete-photo'),
    download_photo_btn = document.querySelector('#download-photo'),
    fotoJuano = document.querySelector('#fotoJuano'),
    fotoCrop = document.querySelector('#foto-juanoCrop'),
    error_message = document.querySelector('#error-message');





// Utilizamos la funcion getUserMedia para obtener la salida de la webcam
navigator.getMedia = ( navigator.getUserMedia ||
                      navigator.webkitGetUserMedia ||
                      navigator.mediaDevices.getUserMedia ||
                      navigator.msGetUserMedia);


if(!navigator.getMedia){
  displayErrorMessage("Tu navegador no soporta la funcion getMedia.");
}
else{

  // Solicitamos la camara
  navigator.getMedia(
    {
      video: true
    },
    function(stream){

      // A nuestro componente video le establecemos el src al stream de la webcam
      video.src = window.URL.createObjectURL(stream);

      // Reproducimos
      video.play();
      video.onplay = function() {
        showVideo();
      };

    },
    function(err){
      displayErrorMessage("Ocurrio un error al obtener el stream de la webcam: " + err.name, err);
    }
  );

}



// En los moviles no se puede reproducir el video automaticamente, programamos funcionamiento del boton inicar camara
start_camera.addEventListener("click", function(e){

  e.preventDefault();

  // Reproducimos manualmente
  video.play();
  showVideo();

});


take_photo_btn.addEventListener("click", function(e){

  e.preventDefault();

  var snap = takeSnapshot();

  // Mostramos la imagen
  image.setAttribute('src', snap)

  // Activamos los botones de eliminar foto y descargar foto
  delete_photo_btn.classList.remove("disabled");
  download_photo_btn.classList.remove("disabled");

  // Establecemos el atributo href para el boton de descargar imagen

  // Pausamos el stream de video de la webcam
  video.pause();

});


delete_photo_btn.addEventListener("click", function(e){

  e.preventDefault();

  // Ocultamos la imagen
  image.setAttribute('src', "");
  image.classList.remove("visible");

  // Reanudamos la reproduccion de la webcam
  video.play();
  $("#confirm").addClass("d-none");
  $("#takePhoto").removeClass("d-none");
  $("#confirmPhoto").attr("src","");
});



function showVideo(){
  // Mostramos el stream de la webcam y los controles

  hideUI();
  video.classList.add("visible");
  controls.classList.add("visible");
}


function takeSnapshot(){

  var hidden_canvas = document.querySelector('#imagen'),
      context = hidden_canvas.getContext('2d');

  var width = video.videoWidth,
      height = video.videoHeight;

  if (width && height) {

    // Configuramos el canvas con las mismas dimensiones que el video
    hidden_canvas.width = width;
    hidden_canvas.height = height;

    // Hacemos una copia
    context.drawImage(video, 0, 0, width, height);

    // Convertimos la imagen del canvas en datarurl
    return hidden_canvas.toDataURL('image/png');
  }

}

/**
*@brief En caso de que ocurriera un error con esta funcion se mostraria al usuario una especificacion del error
*@param error_msg: el mensaje que se mostrara  error: la excepción causada
**/
function displayErrorMessage(error_msg, error){
  error = error || "";
  if(error){
    console.log(error);
  }

  error_message.innerText = error_msg;

  hideUI();
  error_message.classList.add("visible");
}


function hideUI(){
  // Limpiamos

  controls.classList.remove("visible");
  start_camera.classList.remove("visible");
  video.classList.remove("visible");
  snap.classList.remove("visible");
  error_message.classList.remove("visible");
}