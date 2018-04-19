<!-- 
*@file firma.html
*@Author Jorge Arturo Cedillo González
*@date 23/01/2018
*@brief Documento encargado de guardar la firma dibujada por el empleado. 
 -->
 <?php
  session_start();
 $idemp=$_SESSION["IDEMPL"];
 echo $idemp;

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Control de Empleados</title>
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet"> <!--letra del encabezado-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--Iconos de google-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos_menu.css">
    <header  class="container-fluid encabezado">
        <div class="row justify-content-center">
            <div class="d-flex align-items-center col-auto">
                <img src="img/marktac-sello.gif" class="float-left" alt="logo" width="139px" height="139px">
                <span>
                    <h1 class="titulo-encabezado">MarkTác México</h1>
                    <p class="eslogan">El camino de la estrategia a la acción</p>
                </span>
            </div>
            <div class="col-auto d-flex align-items-center">
                <div class="row">
                    <div class="col mb-3">
                        <div class="text-center">
                            <a href="https://www.facebook.com/marktacmexico/?fref=ts">
                                <img src="img/facebook.png" class="mx-2" alt="facebook" height="21px" width="21px">
                            </a>
                            <a href="https://www.youtube.com/channel/UCpUr4UIKt1C_ben1_2VY10g">
                                <img src="img/youtube.png" class="mx-2" alt="youtube" height="21px" width="21px">
                            </a>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col text-center">
                        <p class="contacto mx-auto">marktac@marktac.com | Tel: 55-70-30-39-88</p>
                    </div>
                </div>
                
            </div>
        </div>
    </header>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
     // Variables para contener los sucesivos puntos (x,y) por los que va
    // pasando el ratón, y su estado (pulsado/no pulsado)  
    /**
    *@brief Elsiguiente javascript sera el responsable de crear un canvas, en el cual se dibujara un trazo a mano alzada. 
    */

  var movimientos = new Array();
  var pulsado;
    /**     
    *@brief funcion initcanvas, delimitara el area del canvas, iniciara el canvas y llamara a los eventos para que el canvas se pueda realizar con una pantalla toutch
    */
    function initCanvas() {
        canvasDiv = document.getElementById('canvasDiv');
        canvas = document.createElement('canvas');
        canvas.setAttribute('width', 400);
        canvas.setAttribute('height', 200);
        canvas.setAttribute('id', 'canvas');
        canvasDiv.appendChild(canvas);
        if(typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);//crea el lienzo
        }
        context = canvas.getContext("2d");

        $('#canvas').bind('touchstart',function(event){//fincion para reconocer el iniciio del toutch
          var e = event.originalEvent;
          e.preventDefault();
          pulsado = true;
          movimientos.push([e.targetTouches[0].pageX - this.offsetLeft,
              e.targetTouches[0].pageY - this.offsetTop,
              false]);
          repinta();//llamada a la funcion repinta
        });

        $('#canvas').bind('touchmove',function(event){//funcion para reconocer el movimiento del totuch
          var e = event.originalEvent;
          e.preventDefault();
          if(pulsado){
              movimientos.push([e.targetTouches[0].pageX - this.offsetLeft,
                e.targetTouches[0].pageY - this.offsetTop,
                true]);
        repinta();//llamda a la funcion repinta
        }
    });
    
    $('#canvas').bind('touchend',function(event){//funcion para reconocer el fin del movimiento del toutch
        var e = event.originalEvent;
        e.preventDefault();
        pulsado = false;
    });
    
    $('#canvas').mouseleave(function(e){
        pulsado = false;
    });
    repinta();//llamada a la funcion repinta
}
/**
*@brief funcion para dibujar los movimientos que se evnian de los eventos del toutch
*/
function repinta(){
    // función para dibujar en el lienzo los movimientos del ratón que hemos
        // recogido en la variable "movimientos"
canvas.width = canvas.width; // Limpia el lienzo para cuando se recibe un nuevo evento

context.strokeStyle = "#000000"; //color de la linea
context.lineJoin = "round";//tipo de punta
context.lineWidth = 6;//ancho de punta
for(var i=0; i < movimientos.length; i++)
{     
context.beginPath();
if(movimientos[i][2] && i){
    context.moveTo(movimientos[i-1][0], movimientos[i-1][1]);
    }else{
    context.moveTo(movimientos[i][0], movimientos[i][1]);
    }
    context.lineTo(movimientos[i][0], movimientos[i][1]);
    context.closePath();
    context.stroke();
}
}
function upload() {//guardar imagen en servidor.
    $.post('upload-imagen.php',//se envia el canvas al documento php
        {
        img : canvas.toDataURL()//funcion de canvas para mandarl el canvas actual
        },
        /*
            @param data, recupera la imagen de la funcion "toDataUrl"
        */
        function(data) { //funcion de control, solo para visualizar la imagen
        // Cuando ha finalizado el envío, presenta en pantalla la imagen que ha
        // quedado almacenada en el servidor
        $('#imagen').attr('src', 'firmas/.png?timestamp=' + new Date().getTime());
        });
}

    </script>
</head>
<!-- 
    *@brief El resto de codigo es la visualizacion de la pagina
 -->
<body  onload="initCanvas();">  <!-- carga el init canvas para el body-->
    <div class="container">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-solicitud" role="tabpanel" aria-labelledby="v-pills-solicitud-tab">
                <h2>FIRMA</h2>
                 <h4>En el recuadro de abajo anote su firma </h4>
                <div class="row justify-content-center">
                    
                        <div id="canvasDiv" style="width: 400px; height: 200px; background:   #ccd1d1 ;"></div>   <!-- se inicia un div con el id de las funciones del canvas
                         -->

                      
                </div>
                <div class="row justify-content-center mt-3">
                    <input name="guardar" type="button" data-toggle="modal" data-target="#exampleModal" onclick="upload();" class="btn colorBMT" value="guardar">
                    <!-- boton para llamar la funcion upload -->
                </div>
                <!-- modal para regresar a la pagina principal o imprimir el pdf -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ALERTA</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <h2>HA COMPLETADO EL REGISTRO CON EXITO</h2>
                      </div>
                      <div class="modal-footer">
                        <input type="hidden" name="idemp" value="<?php echo htmlspecialchars($idemp) ?>">
                        <button type="button" class="btn colorBMT" data-dismiss="modal" onclick="location.href = 'menu.html'">Regresar a la pagina principal</button>
                        <button type="submit" class="btn colorBMT" data-dismiss="modal" onclick="location.href = 'generarImpresion.php'">Impresion</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
        <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
</body>
</html>