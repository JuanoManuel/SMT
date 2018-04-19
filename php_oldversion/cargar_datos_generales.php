<?php 
include 'conmenu.php';

$idEmpleado=$_POST["idEmpleado"];
$query = "SELECT * FROM empleado_dg WHERE fkempleado=$idEmpleado";
if(!$resultado=$link->query($query)){
	echo "<p class='text-danger text-center'>Error al recuperar la información del empleado</p>";
	exit;
}

if($resultado->num_rows === 0){
	echo "<p class='text-danger text-center'>El empleado no ha tenido empleos anteriores</p>";
	exit;
}

while ($arrayRes=$resultado->fetch_assoc()) {
	switch ($arrayRes["fkDG"]) {
		case '1':
			$spuesto=$arrayRes["Respuesta"];
			break;
		case '2':
			$parientes=$arrayRes["Respuesta"];
			break;
		case '3':
			$fianza=$arrayRes["Respuesta"];
			break;
		case '4':
			$sindicato=$arrayRes["Respuesta"];
			break;
		case '5':
			$segurov=$arrayRes["Respuesta"];
			break;
		case '6':
			$viajar=$arrayRes["Respuesta"];
			break;
		case '7':
			$residencia=$arrayRes["Respuesta"];
			break;
		case '8':
			$fecha=$arrayRes["Respuesta"];
			break;
	}
}
echo "<h2 class='mt-2'>Datos Generales</h2>
						
							<div class='form-row'>
								<div class='col-6 border'>
									<div class='form-group'>
										<label for=''>¿Comó supo de este empleo?</label>
										<input type='text' value='".$spuesto."' name='dg1' class='form-control' disabled>
									</div>
									<div class='form-group mb-0'>
										<label for=''>¿Ha estado afianzado?</label>
									</div>";
									if($fianza=="No"){
										echo "<div class='form-group row my-0'>
											<label for='' class='col'><input type='radio' name='dg2' value='Si' disabled> Si </label>
											<label for='' class='col'><input type='radio' name='dg2' value='No' disabled checked> No </label>
										</div>
										<div class='form-group'>
											<label for=''>Nombre de la Cía.</label>
											<input type='text' name='dg2cia' class='form-control' disabled>
										</div>";
									}else{
										echo "<div class='form-group row my-0'>
											<label for='' class='col'><input type='radio' name='dg2' value='Si' disabled checked> Si </label>
											<label for='' class='col'><input type='radio' name='dg2' value='No' disabled> No </label>
										</div>
										<div class='form-group'>
											<label for=''>Nombre de la Cía.</label>
											<input type='text' value='".$fianza."' name='dg2cia' class='form-control' disabled>
										</div>";
									}
									
									echo "<div class='form-group mb-0'>
										<label for=''>¿Tiene seguro de vida?</label>
									</div>";
									if($segurov=="No"){
										echo "<div class='form-group row my-0'>
											<label for='' class='col'><input type='radio' value='Si' name='dg3' disabled> Si </label>
											<label for='' class='col'><input type='radio' value='No' name='dg3' disabled checked> No </label>
										</div>
										<div class='form-group'>
											<label for=''>Nombre de la Cía.</label>
											<input type='text' name='dg3cia' class='form-control'>
										</div>";
									}else{
										echo "<div class='form-group row my-0'>
											<label for='' class='col'><input type='radio' value='Si' name='dg3' disabled checked> Si </label>
											<label for='' class='col'><input type='radio' value='No' name='dg3' disabled> No </label>
										</div>
										<div class='form-group'>
											<label for=''>Nombre de la Cía.</label>
											<input type='text' value='".$segurov."' name='dg3cia' class='form-control'>
										</div>";
									}
									
									echo "<div class='form-group mb-0'>
										<label for=''>¿Esta dispuesto a cambiar de lugar de residencia?</label>
									</div>";
									if($residencia=="No"){
										echo "<div class='form-group row my-0'>
											<label for='' class='col'><input type='radio' value='Si' name='dg4' disabled> Si </label>
											<label for='' class='col'><input type='radio' value='No' name='dg4' disabled checked> No </label>
										</div>
										<div class='form-group'>
											<label for=''>Razones</label>
											<input type='text' name='dg4cia' class='form-control'>
										</div>";
									}else{
										echo "<div class='form-group row my-0'>
											<label for='' class='col'><input type='radio' value='Si' name='dg4' disabled checked> Si </label>
											<label for='' class='col'><input type='radio' value='No' name='dg4' disabled> No </label>
										</div>
										<div class='form-group'>
											<label for=''>Razones</label>
											<input type='text' value='".$residencia."' name='dg4cia' class='form-control'>
										</div>";
									}
									
								echo"</div>
								<div class='col-6 border'>
									<div class='form-group mb-0'>
										<label for=''>¿Tiene parientes trabajando en esta empresa?</label>
									</div>";
									if($parientes=="No"){
										echo "<div class='form-group row my-0'>
											<label for='' class='col'><input type='radio' value='Si' name='dg5' disabled> Si </label>
											<label for='' class='col'><input type='radio' value='No' name='dg5' disabled checked> No </label>
										</div>
										<div class='form-group'>
											<label for=''>Nombre</label>
											<input type='text' name='dg5cia' class='form-control'>
										</div>";
									}else{
										echo "<div class='form-group row my-0'>
											<label for='' class='col'><input type='radio' value='Si' name='dg5' disabled checked> Si </label>
											<label for='' class='col'><input type='radio' value='No' name='dg5' disabled> No </label>
										</div>
										<div class='form-group'>
											<label for=''>Nombre</label>
											<input type='text' value='".$parientes."' name='dg5cia' class='form-control'>
										</div>";
									}
									
									echo "<div class='form-group mb-0'>
										<label for=''>¿Ha estado afiliado a algun sindicato?</label>
									</div>";
									if($sindicato=="No"){
										echo "<div class='form-group row my-0'>
											<label for='' class='col'><input type='radio' value='Si' name='dg6' disabled> Si </label>
											<label for='' class='col'><input type='radio' value='No' name='dg6' disabled checked> No </label>
										</div>
										<div class='form-group'>
											<label for=''>¿Cuál?</label>
											<input type='text' name='dg6cia' class='form-control'>
										</div>";
									}else{
										echo "<div class='form-group row my-0'>
											<label for='' class='col'><input type='radio' value='Si' name='dg6' disabled checked> Si </label>
											<label for='' class='col'><input type='radio' value='No' name='dg6' disabled> No </label>
										</div>
										<div class='form-group'>
											<label for=''>¿Cuál?</label>
											<input type='text' value='".$sindicato."' name='dg6cia' class='form-control'>
										</div>";
									}
								echo "</div>
							</div>
	                    	<div class='row justify-content-md-center mt-2 mb-3'>
								<div class='col col-lg-2'>
									<button   type='button' class='btn bMT' onclick='habilitar_datos_generales(this)'>Modificar</button>
								</div>
								<div class='col col-lg-2'>
									<button type='button' class='btn bMT' onclick='guardar_datos_generales()' id='guardar-datos-generales' disabled>Guardar</button>
								</div>	
							</div>";
$resultado->free();
$link->close();