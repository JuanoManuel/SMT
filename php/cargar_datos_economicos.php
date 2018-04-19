<?php 

include 'conmenu.php';

$idEmpleado=$_POST["idEmpleado"];
$query = "SELECT * FROM empleado_de WHERE fkempleado='$idEmpleado'";
if(!$resultado=$link->query($query)){
	echo "<p class='text-danger text-center'>Error al recuperar la información del empleado</p>";
	exit;
}

if($resultado->num_rows === 0){
	echo "<p class='text-danger text-center'>El empleado no ha tenido empleos anteriores</p>";
	exit;
}
$oingresos;
$oingresosm;
$conyuge;
$conyugem;
$casap;
$casapm;
$renta;
$rentam;
$automovilma;
$automovilmo;
$deudas;
$deudasm;
$abono;
$abonom;
$gastosm;

while ($arrayRes=$resultado->fetch_assoc()) {
	switch ($arrayRes["fkDE"]) {
		case '1':
			$oingresos=$arrayRes["Respuesta"];
			$oingresosm=$arrayRes["Monto"];
			break;
		case '2':
			$conyuge=$arrayRes["Respuesta"];
			$conyugem=$arrayRes["Monto"];
			break;
		case '3':
			$casap=$arrayRes["Respuesta"];
			$casapm=$arrayRes["Monto"];
			break;
		case '4':
			$renta=$arrayRes["Respuesta"];
			$rentam=$arrayRes["Monto"];
			break;
		case '5':
			$automovilma=$arrayRes["Respuesta"];
			$automovilmo=$arrayRes["Monto"];
			break;
		case '6':
			$deudas=$arrayRes["Respuesta"];
			$deudasm=$arrayRes["Monto"];
			break;
		case '7':
			$abono=$arrayRes["Respuesta"];
			$abonom=$arrayRes["Monto"];
			break;
		case '8':
			$gastosm=$arrayRes["Monto"];
			break;
	}
}
echo "<h2>Datos economicos</h2>
						<div class='form-row'>
							<div class='col border'>
								<div class='form-group mb-0'>
									<label for=''>¿Tiene usted otros ingresos?</label>
								</div>";
								if ($oingresos=="No") {
									echo "<div class='form-group row my-0'>
									<label for='' class='col'><input type='radio' value='Si' name='de1' disabled> Si </label>
									<label for='' class='col'><input type='radio' value='No' name='de1' disabled checked> No </label>
								</div>	
								<div class='form-group'>
									<label for=''>Describalos</label>
									<input type='text' name='de1des' class='form-control'>
								</div>";
								}else{
									echo "<div class='form-group row my-0'>
									<label for='' class='col'><input type='radio' value='Si' name='de1' disabled checked> Si </label>
									<label for='' class='col'><input type='radio' value='No' name='de1' disabled> No </label>
								</div>	
								<div class='form-group'>
									<label for=''>Describalos</label>
									<input type='text' value='".$oingresosm."' name='de1des' class='form-control'>
								</div>";
								}
								
								echo "<div class='form-group mb-0'>
									<label for=''>¿Vive en casa propia?</label>
								</div>";
								if($casap=="No"){
									echo "<div class='form-group row my-0'>
									<label for='' class='col'><input type='radio' value='Si' name='de2' disabled> Si </label>
									<label for='' class='col'><input type='radio' value='No' name='de2' disabled checked> No </label>
								</div>	
								<div class='form-group'>
									<label for=''>Valor aproximado:</label>
									<input type='number' name='de2des' class='form-control'>
								</div>";
								}else{
									echo "<div class='form-group row my-0'>
									<label for='' class='col'><input type='radio' value='Si' name='de2' disabled checked> Si </label>
									<label for='' class='col'><input type='radio' value='No' name='de2' disabled> No </label>
								</div>	
								<div class='form-group'>
									<label for=''>Valor aproximado:</label>
									<input type='number' value='".$casapm."' name='de2des' class='form-control'>
								</div>";
								}
								
								echo "<div class='form-group mb-0'>
									<label for=''>¿Tiene automovil propio?</label>
								</div>";
								if($automovilma=="No"){
									echo "<div class='form-group row my-0'>
									<label for='' class='col'><input type='radio' value='Si' name='de3' disabled> Si </label>
									<label for='' class='col'><input type='radio' value='No' name='de3' disabled checked> No </label>
								</div>	
								<div class='form-group mb-0'>
									<label for=''>Marca</label>
									<input type='text' name='de3des' class='form-control'>
								</div>
								<div class='form-group'>
									<label for=''>Modelo</label>
									<input type='text' name='de3des2' class='form-control'>
								</div>";
								}else{
									echo "<div class='form-group row my-0'>
									<label for='' class='col'><input type='radio' value='Si' name='de3' disabled checked> Si </label>
									<label for='' class='col'><input type='radio' value='No' name='de3' disabled> No </label>
								</div>	
								<div class='form-group mb-0'>
									<label for=''>Marca</label>
									<input type='text' value='".$automovilma."' name='de3des' class='form-control'>
								</div>
								<div class='form-group'>
									<label for=''>Modelo</label>
									<input type='text' value='".$automovilmo."' name='de3des2' class='form-control'>
								</div>";
								}
								
								echo "<div class='form-group'>
									<label for=''>¿A cuantó ascienden sus gastos mensuales?</label>
									<input type='text' value='".$gastosm."' name='de4' class='form-control'>
								</div>
							</div>
							<div class='col border'>
								<div class='form-group mb-0'>
									<label for=''>¿Su conyúge trabaja?</label>
								</div>";
								if($conyuge=="No"){
									echo "<div class='form-group row my-0'>
									<label for='' class='col'><input type='radio' value='Si' name='de5' disabled> Si </label>
									<label for='' class='col'><input type='radio' value='No' name='de5' disabled checked> No </label>
								</div>	
								<div class='form-group mb-0'>
									<label for=''>¿Dónde?</label>
									<input type='text' name='de5des' class='form-control'>
								</div>";
								}else{
									echo "<div class='form-group row my-0'>
									<label for='' class='col'><input type='radio' value='Si' name='de5' disabled checked> Si </label>
									<label for='' class='col'><input type='radio' value='No' name='de5' disabled> No </label>
								</div>	
								<div class='form-group mb-0'>
									<label for=''>¿Dónde?</label>
									<input type='text' value='".$conyuge."' name='de5des' class='form-control'>
								</div>
								<div class='form-group'>
									<label for=''>Percepción mensual:</label>
									<input type='number' value='".$conyugem."' name='de5des2' class='form-control'>
								</div>";
								}
								
								echo "
								<div class='form-group mb-0'>
									<label for=''>¿Paga renta?</label>
								</div>";
								if($renta=="No"){
									echo "<div class='form-group row my-0'>
									<label for='' class='col'><input type='radio' value='Si' name='de6' disabled> Si </label>
									<label for='' class='col'><input type='radio' value='No' name='de6' disabled checked> No </label>
								</div>	
								<div class='form-group'>
									<label for=''>Renta mensual:</label>
									<input type='number' name='de6des' class='form-control'>
								</div>";
								}else{
									echo "<div class='form-group row my-0'>
									<label for='' class='col'><input type='radio' value='Si' name='de6' disabled checked> Si </label>
									<label for='' class='col'><input type='radio' value='No' name='de6' disabled> No </label>
								</div>	
								<div class='form-group'>
									<label for=''>Renta mensual:</label>
									<input type='number' value='".$rentam."' name='de6des' class='form-control'>
								</div>";
								}
								
								echo "<div class='form-group mb-0'>
									<label for=''>¿Tiene deudas?</label>
								</div>";
								if($deudas=="No"){
									echo "<div class='form-group row my-0'>
									<label for='' class='col'><input type='radio' value='Si' name='de7' disabled> Si </label>
									<label for='' class='col'><input type='radio' value='No' name='de7' disabled checked> No </label>
								</div>	
								<div class='form-group mb-0'>
									<label for=''>¿Con quién?</label>
									<input type='text' name='de7des' class='form-control'>
								</div>
								<div class='form-group'>
									<label for=''>Importe:</label>
									<input type='number' name='de7des2' class='form-control'>
								</div>";
								}else{
									echo "<div class='form-group row my-0'>
									<label for='' class='col'><input type='radio' value='Si' name='de7' disabled checked> Si </label>
									<label for='' class='col'><input type='radio' value='No' name='de7' disabled> No </label>
								</div>	
								<div class='form-group mb-0'>
									<label for=''>¿Con quién?</label>
									<input type='text' value='".$deudas."' name='de7des' class='form-control'>
								</div>
								<div class='form-group'>
									<label for=''>Importe:</label>
									<input type='number' value='".$deudasm."' name='de7des2' class='form-control'>
								</div>";
								}
								if($abono=="No"){
									echo "<div class='form-group'>
									<label for=''>¿Cuanto abona mensualmente?</label>
									<input type='text' name='de8' class='form-control'>
								</div>";
								}else{
									echo "<div class='form-group'>
									<label for=''>¿Cuanto abona mensualmente?</label>
									<input type='text' value='".$abonom."' name='de8' class='form-control'>
								</div>";
								}
								
							echo "</div>
						</div>
						<div class='row mt-3'>
							<div class='col text-center'>
								<button class='btn bMT' onclick=''>Modificar</button>
							</div>
							<div class='col text-center'>
								<button class='btn bMT' id='guardar-datos-economicos' disabled>Guardar</button>
							</div>
						</div>";