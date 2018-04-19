<?php 
include 'conmenu.php';

$idEmpleado = $_POST["idEmpleado"];
$resultado;

$query = "SELECT * FROM empleado_es WHERE fkEmpleado=$idEmpleado";
if(!$resultado = $link->query($query)){
	echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
	exit;
}
if($resultado->num_rows === 0){
	echo "<p class='text-center'>Error el recuperar el empleado con el id proporcionado</p>";
	exit;
}

$arrayRes=$resultado->fetch_assoc();
$cronica=$arrayRes["Respuesta"];
$arrayRes=$resultado->fetch_assoc();
$embarazada=$arrayRes["Respuesta"];
$arrayRes=$resultado->fetch_assoc();
$discapacidad=$arrayRes["Respuesta"];
$arrayRes=$resultado->fetch_assoc();
$salud_actual=$arrayRes["Respuesta"];
$arrayRes=$resultado->fetch_assoc();
$deporte=$arrayRes["Respuesta"];
$arrayRes=$resultado->fetch_assoc();
$club=$arrayRes["Respuesta"];
$arrayRes=$resultado->fetch_assoc();
$pasatiempo=$arrayRes["Respuesta"];
$arrayRes=$resultado->fetch_assoc();
$meta=$arrayRes["Respuesta"];
$arrayRes=$resultado->fetch_assoc();
$sangre=$arrayRes["Respuesta"];
$arrayRes=$resultado->fetch_assoc();
$alergias=$arrayRes["Respuesta"];
echo "<h2 class='mt-2 mb-3'>Estado de Salud y Hábitos Personales</h2>
						<div class='row justify-content-around'>
								<div class='col-auto'>
									<div class='form-group'>
										<label>¿Como considera su estado de salud actual?</label>
										<select required='' id='inputEstadoSalud' class='form-control' name='inputEstadoSalud'>";
										switch ($salud_actual) {
											case 'bueno':
												echo "<option>Seleccione una opción</option>
												<option value='bueno' selected>Bueno</option>
												<option value='regular'>Regular</option>
												<option value='malo'>Malo</option>";
												break;
											
											case 'regular':
												echo "<option>Seleccione una opción</option>
												<option value='bueno'>Bueno</option>
												<option value='regular' selected>Regular</option>
												<option value='malo'>Malo</option>";
												break;
											
											case 'malo':
												echo "<option>Seleccione una opción</option>
												<option value='bueno'>Bueno</option>
												<option value='regular'>Regular</option>
												<option value='malo' selected>Malo</option>";
												break;
											
											default:
												echo "<option selected>Seleccione una opción</option>
												<option value='bueno'>Bueno</option>
												<option value='regular'>Regular</option>
												<option value='malo'>Malo</option>";
												break;
										}
											
										echo "</select>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for='inputTipoSangre'>Tipo de Sangre</label>
										<select required='' name='inputTipoSangre' id='inputTipoSangre' class='form-control'>";
										switch ($sangre) {
											case 'a+';
												echo "<option value='a+' selected>A+</option>
												<option value='a-'>A-</option>
												<option value='b+'>B+</option>
												<option value='b-'>B-</option>
												<option value='ab+'>AB+</option>
												<option value='ab-'>AB-</option>
												<option value='o+'>O+</option>
												<option value='o-'>O-</option>";
												break;
											case 'a-';
												echo "<option value='a+'>A+</option>
												<option value='a-' selected>A-</option>
												<option value='b+'>B+</option>
												<option value='b-'>B-</option>
												<option value='ab+'>AB+</option>
												<option value='ab-'>AB-</option>
												<option value='o+'>O+</option>
												<option value='o-'>O-</option>";
												break;
											case 'b+';
												echo "<option value='a+'>A+</option>
												<option value='a-'>A-</option>
												<option value='b+' selected>B+</option>
												<option value='b-'>B-</option>
												<option value='ab+'>AB+</option>
												<option value='ab-'>AB-</option>
												<option value='o+'>O+</option>
												<option value='o-'>O-</option>";
												break;
											case 'b-';
												echo "<option value='a+'>A+</option>
												<option value='a-'>A-</option>
												<option value='b+'>B+</option>
												<option value='b-' selected>B-</option>
												<option value='ab+'>AB+</option>
												<option value='ab-'>AB-</option>
												<option value='o+'>O+</option>
												<option value='o-'>O-</option>";
												break;
											case 'ab+';
												echo "<option value='a+'>A+</option>
												<option value='a-'>A-</option>
												<option value='b+'>B+</option>
												<option value='b-'>B-</option>
												<option value='ab+' selected>AB+</option>
												<option value='ab-'>AB-</option>
												<option value='o+'>O+</option>
												<option value='o-'>O-</option>";
												break;
											case 'ab-';
												echo "<option value='a+'>A+</option>
												<option value='a-'>A-</option>
												<option value='b+'>B+</option>
												<option value='b-'>B-</option>
												<option value='ab+'>AB+</option>
												<option value='ab-' selected>AB-</option>
												<option value='o+'>O+</option>
												<option value='o-'>O-</option>";
												break;
											case 'o+';
												echo "<option value='a+'>A+</option>
												<option value='a-'>A-</option>
												<option value='b+'>B+</option>
												<option value='b-'>B-</option>
												<option value='ab+'>AB+</option>
												<option value='ab-'>AB-</option>
												<option value='o+' selected>O+</option>
												<option value='o-'>O-</option>";
												break;
											case 'o-';
												echo "<option value='a+'>A+</option>
												<option value='a-'>A-</option>
												<option value='b+'>B+</option>
												<option value='b-'>B-</option>
												<option value='ab+'>AB+</option>
												<option value='ab-'>AB-</option>
												<option value='o+'>O+</option>
												<option value='o-' selected>O-</option>";
												break;
											
											default:
												# code...
												break;
										}
											
										echo "</select>
									</div>
								</div>
							</div>
							<div class='row justify-content-between'>
								<div class='col-12'>
									<table id='tablaSalud' class='table table-striped table-bordered tabla'>
										<thead class='thead-dark'>
											<th scope='col'>Pregunta</th>
											<th scope='col'>Resp.</th>
											<th scope='col'>Especificación</th>
										</thead>
										<tbody>
											<tr>";
												if($cronica=="no"){
													echo "<td scope='row'>¿Padece alguna enfermedad crónica?</td>
													<td><input type='checkbox' name='checkPreguntaSalud1' id='checkPreguntaSalud1' value='Si'></td>
													<td><textarea class='form-control' name='inputPreguntaSalud1' id='inputPreguntaSalud1' rows='2'></textarea></td>";
												}else{
													echo "<td scope='row'>¿Padece alguna enfermedad crónica?</td>
													<td><input type='checkbox' name='checkPreguntaSalud1' id='checkPreguntaSalud1' value='Si' checked></td>
													<td><textarea class='form-control' name='inputPreguntaSalud1' id='inputPreguntaSalud1' rows='2'>".$cronica."</textarea></td>";
												}
											echo "</tr>
											<tr>";
												if($deporte=="no"){
													echo "<td scope='row'>¿Practica usted algún deporte?</td>
												<td><input type='checkbox' name='checkPreguntaSalud2' id='checkPreguntaSalud2' value='Si'></td>
												<td><textarea class='form-control' name='inputPreguntaSalud2' id='inputPreguntaSalud2' rows='2'></textarea></td>";
												}else{
													echo "<td scope='row'>¿Practica usted algún deporte?</td>
												<td><input type='checkbox' name='checkPreguntaSalud2' id='checkPreguntaSalud2' value='Si' checked></td>
												<td><textarea class='form-control' name='inputPreguntaSalud2' id='inputPreguntaSalud2' rows='2'>".$deporte."</textarea></td>";
												}
											echo "</tr>
											<tr>";
											if($club=="no"){
												echo "<td scope='row'>¿Permanece a algún club social o deportivo?</td>
												<td><input type='checkbox' name='checkPreguntaSalud3' id='checkPreguntaSalud3' value='Si'></td>
												<td><textarea class='form-control' name='inputPreguntaSalud3' id='inputPreguntaSalud3' rows='2'></textarea></td>";
											}else{
												echo "<td scope='row'>¿Permanece a algún club social o deportivo?</td>
												<td><input type='checkbox' name='checkPreguntaSalud3' id='checkPreguntaSalud3' value='Si' checked></td>
												<td><textarea class='form-control' name='inputPreguntaSalud3' id='inputPreguntaSalud3' rows='2'>".$club."</textarea></td>";
											}
											echo "</tr>
											<tr>";
											if($pasatiempo=="no"){
												echo "<td scope='row'>¿Tiene algún pasatiempo?</td>
												<td><input type='checkbox' name='checkPreguntaSalud4' id='checkPreguntaSalud4' value='Si'></td>
												<td><textarea class='form-control' name='inputPreguntaSalud4' id='inputPreguntaSalud4' rows='2'></textarea></td>";
											}else{
												echo "<td scope='row'>¿Tiene algún pasatiempo?</td>
												<td><input type='checkbox' name='checkPreguntaSalud4' id='checkPreguntaSalud4' value='Si' checked></td>
												<td><textarea class='form-control' name='inputPreguntaSalud4' id='inputPreguntaSalud4' rows='2'>".$pasatiempo."</textarea></td>";
											}
												
											echo "</tr>
											<tr>";
											if($alergias=="no"){
												echo "<td scope='row'>¿Tiene alguna alergia?</td>
												<td><input type='checkbox' name='checkPreguntaSalud5' id='checkPreguntaSalud5' value='Si'></td>
												<td><textarea class='form-control' name='inputPreguntaSalud5' id='inputPreguntaSalud5' rows='2'></textarea></td>";
											}else{
												echo "<td scope='row'>¿Tiene alguna alergia?</td>
												<td><input type='checkbox' name='checkPreguntaSalud5' id='checkPreguntaSalud5' value='Si' checked></td>
												<td><textarea class='form-control' name='inputPreguntaSalud5' id='inputPreguntaSalud5' rows='2'>".$alergias."</textarea></td>";
											}
												
											echo "</tr>
											<tr>";
											if($discapacidad=="no"){
												echo "<td scope='row'>¿Tiene alguna Discapacidad?</td>
												<td><input type='checkbox' name='checkPreguntaSalud6' id='checkPreguntaSalud6' value='Si'></td>
												<td><textarea class='form-control' name='inputPreguntaSalud6' id='inputPreguntaSalud6' rows='2'></textarea></td>";
											}else{
												echo "<td scope='row'>¿Tiene alguna Discapacidad?</td>
												<td><input type='checkbox' name='checkPreguntaSalud6' id='checkPreguntaSalud6' value='Si' checked></td>
												<td><textarea class='form-control' name='inputPreguntaSalud6' id='inputPreguntaSalud6' rows='2'>".$discapacidad."</textarea></td>";
											}
												
											echo "</tr>
											<tr>";
											if($embarazada=="no"){
												echo "<td scope='row'>¿Esta usted embarazada?</td>
												<td><input type='checkbox' name='checkPreguntaSalud7' id='checkPreguntaSalud7' value='Si'></td>
												<td><textarea class='form-control' name='inputPreguntaSalud7' id='inputPreguntaSalud7' rows='2'></textarea></td>";
											}else{
												echo "<td scope='row'>¿Esta usted embarazada?</td>
												<td><input type='checkbox' name='checkPreguntaSalud7' id='checkPreguntaSalud7' value='Si' checked></td>
												<td><textarea class='form-control' name='inputPreguntaSalud7' id='inputPreguntaSalud7' rows='2'>".$embarazada."</textarea></td>";
											}
												
											echo "</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class='row justify-content-between'>
								<div class='col'>
									<div class='form-group'>
										<label>¿Cuál es su meta en la vida?</label>
										<textarea required='' class='form-control' id='inputMetaVida' name='inputMetaVida' rows='4'>".$meta."</textarea>
									</div>
								</div>
							</div>
						<div class='row justify-content-md-center mt-2 mb-3'>
							<div class='col col-lg-2'>
								<button type='button' class='btn bMT'' id='mod_es' onclick='habilitar_datos_es()'>Modificar</button>
							</div>
							<div class='col col-lg-2'>
								<button type='button' class='btn bMT' id='guardar_es' disabled>Guardar</button>
							</div>	
						</div>";
$resultado->free();
$link->close();