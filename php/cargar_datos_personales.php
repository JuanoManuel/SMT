<?php

/*
@file cargar_datos_personales.php
@author Cedillo Gonzalez Jorge Arturo, Hernandez Hernandez Juan Manuel, Paredes Rivas Alberto
@date 25/01/2017
@brief Se imprime la sección de Datos Personales del empleado, cargando toda su información de la base de datos
*/
include 'conmenu.php';

$idEmpleado = $_POST["idEmpleado"];
$idEmpleadoMostrar= substr($idEmpleado,0,-2);
$resultado;

$query = "SELECT * FROM empleado WHERE idEmpleado='$idEmpleado'";
// Verificamos que se ejecute nuestra consulta
if(!$resultado = $link->query($query)){
	echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
	exit;
}
// Verificamos que el resultado de la consulta no este vacio
if($resultado->num_rows === 0){
	echo "<p class='text-center'>Error el recuperar el empleado con el id proporcionado</p>";
	exit;
}

// Guardamos el resultado de la consulta en un array asociativo
$arrayRes =  $resultado->fetch_assoc();
// Si todo se realizo correctamente se empieza a enviar la estructura de la pagina.
echo "<h2 class='mt-2 mb-3'>Datos Personales</h2>
							<form action='php/guardar_datos_personales.php' method='POST'>
							<div class='row justify-content-center'>
								<div class='col'>

								</div>
							</div>
							<div class='form-row mb-0 justify-content-start'>
								<div class='col-auto'>
									<img src='fotos/$idEmpleado.png' class='img-thumbnail' width='200px' height='300px'>
								</div>
								<div class='col'>
									<div class='row'>
										<div class='col-6'>
											<div class='form-group'>
												<label for=''>Clave del empleado:</label>
												<input type='text' maxlength='10' value='" . $idEmpleadoMostrar . "' class='form-control' name='idEmpleado'>
											</div>
										</div>
										<div class='col-6'>
											<a href='prepararImpresion.php?idEmpleado=$idEmpleado' class='btn btn-outline-danger mt-2' style='display:block;'>Imprimir</a>
										</div>
										<div class='col-6'>
											<div class='form-group'>
												<label for=''>Puesto:</label>
												<select id='inputPuesto' class='form-control' name='inputPuesto' required=''>
													<option value='default' selected>Selecciona una opcion</option>
													<option value='Marketing'>Marketing</option>
													<option value='Limpieza'>Limpieza</option>
													<option value='Visepresidente ejecutivo'>Visepresidente ejecutivo</option>
												</select>
											</div>
										</div>
										<div class='col-6'>
											<div class='form-group'>
												<label for=''>Fecha de registro:</label>
												<input type='date' value='" . $arrayRes["Fecha_registro"] . "' class='form-control' name='inputFechaR'>
											</div>
										</div>
										<div class='col-6'>
											<div class='form-group'>
												<label for=''>Fecha de contratación:</label>
												<input type='date' value='" . $arrayRes["Fecha_contratacion"] . "' class='form-control' name='inputFechaC'>
											</div>
										</div>
										<div class='col-6'>
											<div class='form-group'>
												<label for=''>Sueldo:</label>
												<input type='text' value='" . $arrayRes["Sueldo_esperado"] . "' class='form-control validarNumero' maxlength='10' name='inputSueldoE'>
											</div>
										</div>
									</div>
								</div>

							</div>
							<div class='form-row justify-content-between'>

							</div>
							<hr>
							<div class='form-row justify-content-between'>
								<div class='col-auto'>
									<div class='form-group'>
										<label for=''>Apellido Paterno:</label>
										<input type='text' maxlength='45' value='" . $arrayRes["ApellidoP"] . "' class='form-control validarTexto' name='inputApellidoP'>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for=''>Apellido Materno:</label>
										<input type='text' maxlength='45' value='" . $arrayRes["ApellidoM"] . "' class='form-control validarTexto' name='inputApellidoM'>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for=''>Nombre(s):</label>
										<input type='text' maxlength='45' value='" . $arrayRes["Nombre"] . "' class='form-control validarTexto' name='inputNombre'>
									</div>
								</div>
							</div>
							<div class='form-row justify-content-between'>
								<div class='col-4'>
									<label for=''>Correo electrónico:</label>
									<div class='input-group mb-3'>
										<div class='input-group-addon'>
											<i class='material-icons' id='addon-correo'>email</i>
										</div>
										<input required type='email' value='" . $arrayRes["Correo"] . "' name='inputCorreo' class='form-control' placeholder='Correo' aria-label='Correo' aria-describedby='addon-correo'>
									</div>
								</div>
								<div class='col-2'>
									<div class='form-group'>
										<label for=''>Edad:</label>
										<input type='number' min='15' max='60' value='" . $arrayRes["Edad"] . "' class='form-control' name='inputEdad'>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for=''>Sexo:</label>
										<select required='' class='form-control' id='inputSexo' name='inputSexo'>";
										// Se revisa el valor del campo texto para imprimir el formato correcto
										switch ($arrayRes["Sexo"]) {
											case 'F':
												echo "<option>Selecciona una opción</option>
												<option value='M'>Masculino</option>
												<option value='F' selected>Femenino</option>
												<option value='O'>Otros</option>";
												break;
											case 'M':
												echo "<option>Selecciona una opción</option>
												<option value='M' selected>Masculino</option>
												<option value='F'>Femenino</option>
												<option value='O'>Otros</option>";
												break;
											case 'O':
												echo "<option>Selecciona una opción</option>
												<option value='M'>Masculino</option>
												<option value='F'>Femenino</option>
												<option value='O' selected>Otros</option>";
												break;
											default:
												echo "<option selected>Selecciona una opción</option>
												<option value='M'>Masculino</option>
												<option value='F'>Femenino</option>
												<option value='O'>Otros</option>";
												break;
										}
										echo "</select>
									</div>
								</div>
							</div>";
							// Se preparan las variables para una segunda consulta
							$resultado2;
							$fkDirecciones=$arrayRes["fkDirecciones"];
							$query2 = "SELECT * FROM direcciones WHERE idDirecciones = $fkDirecciones";
							// Verificamos que la consulta se haya ejecutado correctamente
							if(!$resultado2 = $link->query($query2)){
								echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
								exit;
							}
							// Guardamos el resultado de la consulta en una segundo array asociativo
							$arrayRes2=$resultado2->fetch_assoc();
							$resultado2->free();
							$query="SELECT DISTINCT Estado FROM direcciones";
							if(!$resultado2 = $link->query($query)){
								echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
								exit;
							}

							echo "<div class='form-row justify-content-between'>
								<div class='col-4'>
									<div class='form-group'>
										<label for='inputEstado'>Estado</label>
										<select required='' class='form-control' id='inputEstado2' name='inputEstado'>
											<option>Seleccione una opción</option>";
										while ($resEstados=$resultado2->fetch_assoc()) {
											if ($resEstados["Estado"]==$arrayRes2["Estado"]) {
												echo "<option value='".$arrayRes2["Estado"]."' selected>".$arrayRes2["Estado"]."</option>";
											}else{
												echo "<option value='".$resEstados["Estado"]."'>".$resEstados["Estado"]."</option>";
											}
										}
										echo "</select>
									</div>
								</div>
								<div class='col-4'>
									<div class='form-group'>
										<label for='inputMunicipio'>Municipio</label>
										<select required='' class='form-control' id='inputMunicipio2' name='inputMunicipio'>
											<option>Seleccione una opción</option>";
											$resultado2->free();
											$query="SELECT DISTINCT Municipio FROM direcciones WHERE Estado='".$arrayRes2["Estado"]."'";
											if(!$resultado2=$link->query($query)){
												echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
												exit;
											}
											while ($resMunicipio=$resultado2->fetch_assoc()) {
												if($resMunicipio["Municipio"]==$arrayRes2["Municipio"]){
													echo "<option value='".$arrayRes2["Municipio"]."' selected>".$arrayRes2["Municipio"]."</option>";
												}else{
													echo "<option value='".$resMunicipio["Municipio"]."'>".$resMunicipio["Municipio"]."</option>";
												}
											}
											echo "</select>
									</div>
								</div>
								<div class='col-4'>
									<div class='form-group'>
										<label for='inputColonia'>Colonia</label>
										<select required='' class='form-control' id='inputColonia2' name='inputColonia'>
											<option>Seleccione una opción</option>";
											$resultado2->free();
											$query="SELECT DISTINCT Colonia FROM direcciones WHERE Estado='".$arrayRes2["Estado"]."' AND Municipio='".$arrayRes2["Municipio"]."'";
											if(!$resultado2=$link->query($query)){
												echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
												exit;
											}
											while ($resColonia=$resultado2->fetch_assoc()) {
												if($resColonia["Colonia"]==$arrayRes2["Colonia"]){
													echo "<option value='".$arrayRes2["Colonia"]."' selected>".$arrayRes2["Colonia"]."</option>";
												}else{
													echo "<option value='".$resColonia["Colonia"]."'>".$resColonia["Colonia"]."</option>";
												}
											}
											echo"
										</select>
									</div>
								</div>
								<div class='col-5'>
									<div class='form-group'>
										<label for='inputCalle'>Calle</label>
										<input required maxlength='80' value='" . $arrayRes["calle"] . "' type='text' name='inputCalle' class='form-control' id='inputCalle'>
									</div>
								</div>
								<div class='col-4'>
									<div class='form-group'>
										<label for='inputNacionalidad'>Nacionalidad</label>
										<select required='' class='form-control' id='inputNacionalidad2' name='inputNacionalidad'>";
											// Se preparan las variables para una tercera consulta
											$resultado3;
											$fkNacionalidad=$arrayRes["fkNacionalidad"];
											$query3="SELECT * FROM Nacionalidad";
											// Verificamos que la consulta se haya ejecutado correctamente
											if(!$resultado3 = $link->query($query3)){
												echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
												exit;
											}
											// Enviamos el resultado de las consultas mediante un ciclo
											while($arrayRes3 = $resultado3->fetch_assoc()){
												if($fkNacionalidad==$arrayRes3["idNacionalidad"]){
													echo "<option value='".$arrayRes3["idNacionalidad"]."' selected>".$arrayRes3["Nombre"]."</option>";
												}else{
													echo "<option value='".$arrayRes3["idNacionalidad"]."'>".$arrayRes3["Nombre"]."</option>";
												}

											}
										// Continuamos con el envio de la pagina
										echo "</select>
									</div>
								</div>
								<div class='col-3'>
									<div class='form-group'>
										<label for='inputCP'>Código Postal</label>
										<select name='inputCP' class='form-control' id='inputCP2'>";
										$resultado2->free();
										$query="SELECT DISTINCT CP FROM direcciones WHERE Estado='".$arrayRes2["Estado"]."' AND Municipio='".$arrayRes2["Municipio"]."' AND Colonia='".$arrayRes2["Colonia"]."'";
										if(!$resultado2=$link->query($query)){
											echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
											exit;
										}
										while ($resCP=$resultado2->fetch_assoc()) {
											if($resCP["CP"]==$arrayRes2["CP"]){
												echo "<option value='".$arrayRes2["CP"]."' selected>".$arrayRes2["CP"]."</option>";
											}else{
												echo "<option value='".$resCP["CP"]."' selected>".$resCP["CP"]."</option>";
											}
										}
											echo "
										</select>
										<input type='hidden' name='idDireccion' id='idDireccion2' value=''>
									</div>
								</div>
							</div>
							<div class='form-row justify-content-between'>
								<div class='col-auto'>
									<div class='form-group'>
										<label for='inputNumExt'>Número Exterior</label>
										<input required maxlength='50' value='" . $arrayRes["No_ext"] . "' type='text' name='inputNumExt' id='inputNumExt' class='form-control'>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for='inputnumInt'>Número Interior</label>
										<input type='text' maxlength='50' value='" . $arrayRes["No_int"] . "' name='inputNumInt' id='inputnumInt' class='form-control'>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for='inputEstadoCivil'>Estado Civil</label>
										<select required='' class='form-control' id='inputEstadoCivil' name='inputEstadoC'>";
										// Se revisa el campo de Estado_Civil para enviar el formato correcto
										switch ( $arrayRes["Estado_civil"] ) {
											case 'Soltero':
												echo "<option>Seleccione una opción</option>
												<option value='Soltero' selected>Soltero</option>
												<option value='Casado'>Casado</option>
												<option value='Divorciado'>Divorciado</option>
												<option value='Viudo'>Viudo</option>";
												break;
											case 'Casado':
												echo "<option>Seleccione una opción</option>
												<option value='Soltero'>Soltero</option>
												<option value='Casado' selected>Casado</option>
												<option value='Divorciado'>Divorciado</option>
												<option value='Viudo'>Viudo</option>";
												break;
											case 'Divorciado':
												echo "<option>Seleccione una opción</option>
												<option value='Soltero'>Soltero</option>
												<option value='Casado'>Casado</option>
												<option value='Divorciado' selected>Divorciado</option>
												<option value='Viudo'>Viudo</option>";
												break;
											case 'Viudo':
												echo "<option>Seleccione una opción</option>
												<option value='Soltero'>Soltero</option>
												<option value='Casado'>Casado</option>
												<option value='Divorciado'>Divorciado</option>
												<option value='Viudo' selected>Viudo</option>";
												break;
											default:
												echo "<option selected>Seleccione una opción</option>
												<option value='Soltero'>Soltero</option>
												<option value='Casado'>Casado</option>
												<option value='Divorciado'>Divorciado</option>
												<option value='Viudo'>Viudo</option>";
												break;
										}
										echo "</select>
									</div>
								</div>
							</div>
							<div class='row justify-content-between'>
								<div class='col-auto'>
									<div class='form-group'>
										<label for='inputLugarNacimiento'>Lugar de Nacimiento</label>
										<input required='' value='" . $arrayRes["Lugar_nacimiento"] . "' type='text' name='inputLugarNacimiento' class='form-control validarTexto' maxlength='50' id='inputLugarNacimiento'>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for='inputFechaNacimiento'>Fecha de Nacimiento</label>
										<input required='' value='" . $arrayRes["Fecha_nacimiento"] . "' type='date' name='inputFechaNacimiento' class='form-control' id='inputFechaNacimiento'>
									</div>
								</div>
								<div class='col-2'>
									<div class='form-group'>
										<label for='inputEstatura'>Estatura</label>
										<div class='input-group noSpinner'>
											<input required='' min='0' max='300' value='" . $arrayRes["Estatura"] . "' type='number' class='form-control' id='inputEstatura' name='inputEstatura' aria-label='Estatura' aria-describedby='estatura-addon'>
											<div class='input-group-addon'>
											  <span class='input-group-text' id='estatura-addon2'>cm</span>
											</div>
										</div>
									</div>
								</div>
								<div class='col-2'>
									<div class='form-group'>
										<label for='inputPeso'>Peso</label>
										<div class='input-group noSpinner'>
											<input required='' value='" . $arrayRes["Peso"] . "' type='number' class='form-control' id='inputPeso' min='30' max='200' name='inputPeso' aria-label='Peso' aria-describedby='peso-addon'>
											<div class='input-group-addon'>
												<span class='input-group-text' id='peso-addon'>Kg</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class='row'>
								<label for='' class='col'>Vive con:</label><br>
							</div>";
							// Se realiza otra consulta para saber con quien vive el empleado
							$resultado->free();
							$query="SELECT * FROM vive_con WHERE fkempleado='$idEmpleado'";
							if(!$resultado = $link->query($query)){
								echo "<p class='text-danger text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
								exit;
							}
							$arrayRes = $resultado->fetch_assoc();
							// Se revisa el campo de Vive para enviar el formato correcto
							switch ($arrayRes["Vive"]) {
								case 'Padres':
									echo "<div class='row'>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Padres' name='vivecon' class='' checked>
											<label for='' class=''>Sus padres</label>
										</div>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Familia' name='vivecon' class=''>
											<label for='' class=''>Su familia</label>
										</div>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Parientes' name='vivecon' class=''>
											<label for='' class=''>Parientes</label>
										</div>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Solo' name='vivecon' class=''>
											<label for='' class=''>Solo</label>
										</div>
									</div>";
									break;
								case 'Familia':
									echo "<div class='row'>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Padres' name='vivecon' class=''>
											<label for='' class=''>Sus padres</label>
										</div>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Familia' name='vivecon' class='' checked>
											<label for='' class=''>Su familia</label>
										</div>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Parientes' name='vivecon' class=''>
											<label for='' class=''>Parientes</label>
										</div>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Solo' name='vivecon' class=''>
											<label for='' class=''>Solo</label>
										</div>
									</div>";
									break;
								case 'Parientes':
									echo "<div class='row'>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Padres' name='vivecon' class=''>
											<label for='' class=''>Sus padres</label>
										</div>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Familia' name='vivecon' class=''>
											<label for='' class=''>Su familia</label>
										</div>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Parientes' name='vivecon' class='' checked>
											<label for='' class=''>Parientes</label>
										</div>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Solo' name='vivecon' class=''>
											<label for='' class=''>Solo</label>
										</div>
									</div>";
									break;
								case 'Solo':
									echo "<div class='row'>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Padres' name='vivecon' class=''>
											<label for='' class=''>Sus padres</label>
										</div>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Familia' name='vivecon' class=''>
											<label for='' class=''>Su familia</label>
										</div>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Parientes' name='vivecon' class=''>
											<label for='' class=''>Parientes</label>
										</div>
										<div class='col form-check form-check-inline'>
											<input type='radio' value='Solo' name='vivecon' class='' checked>
											<label for='' class=''>Solo</label>
										</div>
									</div>";
									break;
							}
							echo "<div class='row'>
								<label for='' class='col'>Personas que dependen de usted:</label><br>
							</div>";
							// Se realiza otra consulta para saber que personas dependen del empleado
							$resultado->free();
							$query="SELECT * FROM dependientes WHERE fkempleado='$idEmpleado'";
							if(!$resultado = $link->query($query)){
								echo "<p class='text-danger text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
								exit;
							}
							echo "<div class='row'>";
							$hijos=false;
							$conyuge=false;
							$padres=false;
							$otros=false;
							$nadie=false;
							// Se revisa que personas dependen del empleado para despues enviar el formato correcto a la pagina
							while($arrayRes = $resultado->fetch_assoc()){
								if($arrayRes["Nombre"]=="Hijos"){
									$hijos=true;
								}
								if($arrayRes["Nombre"]=="Conyuge"){
									$conyuge=true;
								}
								if($arrayRes["Nombre"]=="Padres"){
									$padres=true;
								}
								if($arrayRes["Nombre"]=="Otros"){
									$otros=true;
								}
								if($arrayRes["Nombre"]=="Nadie"){
									$nadie=true;
								}
							}
							if($hijos){
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende1' class='' value='Hijos' checked>
									<label for='' class=''>Hijos</label>
								</div>";
							}else{
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende2' value='Hijos' class=''>
									<label for='' class=''>Hijos</label>
								</div>";
							}
							if($conyuge){
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende3' value='Cónyuge' class='' checked>
									<label for='' class=''>Cónyuge</label>
								</div>";
							}else{
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende4' value='Cónyuge' class=''>
									<label for='' class=''>Cónyuge</label>
								</div>";
							}
							if($padres){
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende3' value='Padres' class='' checked>
									<label for='' class=''>Padres</label>
								</div>";
							}else{
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende3' value='Padres' class=''>
									<label for='' class=''>Padres</label>
								</div>";
							}
							if ($otros) {
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende4' value='Otros' class='' checked>
									<label for='' class=''>Otros</label>
								</div>";
							}else{
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende4' value='Otros' class=''>
									<label for='' class=''>Otros</label>
								</div>";
							}
							if ($nadie) {
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende5' value='Nadie' class='' checked>
									<label for='' class=''>Nadie</label>
								</div>";
							}else{
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende5' value='Nadie' class=''>
									<label for='' class=''>Nadie</label>
								</div>";
							}
							echo "</div>
							<div class='form-row mt-2 justify-content-between'>
								<div class='col-6'>
									<label for='' class='col-form-label'>Teléfonos:</label>
									<table class='table' id='telefonos_dp'>
										<thead id='head_telefonos_dp'>
											<tr>
												<th>Numero</th>
												<th>Tipo</th>
												<th>Teléfono</th>
											</tr>
										</thead>
										<tbody id='body_telefonos_dp'>";
										// Se realiza la consulta para mostrar los telefonos del empleado
										$resultado->free();
										$query="SELECT * FROM telefono WHERE fkempleado='$idEmpleado'";
										if(!$resultado = $link->query($query)){
											echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
											exit;
										}
										if($resultado->num_rows === 0){
											echo "<tr><td class='text-center' colspan='3'>El empleado no tiene ningun telefono registrado</td></tr>";
										}else{
											$i=0;
											// Se realiza el ciclo para imprimir los telefonos
											while ($arrayRes = $resultado->fetch_assoc()) {
												$i++;
												echo "<tr>
													<td>" . $i . "</td>
													<td>" . $arrayRes["Tipo"] . "</td>
													<td>" . $arrayRes["Telefono"] . "</td>
													<input type='hidden' class='tel-dp-tipo' value='" . $arrayRes["Tipo"] . "'>
													<input type='hidden' class='tel-dp-tel' value='" . $arrayRes["Telefono"] . "'>
												</tr>";
											}
										}
										echo "</tbody>
										<input type='hidden' name='notelefonos-dp'>
										</table>";
									echo "<button type='button' class='btn bMT d-none mb-2' id='btn-tel-dp' data-toggle='modal' data-target='#exampleModal'>Agregar</button>
									<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
										<div class='modal-dialog modal-dialog-centered' role='document'>
											<div class='modal-content'>
												<div class='modal-header'>
												<h5 class='modal-title' id='exampleModalLabel'>Agregar telefono</h5>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
												</button>
												</div>
												<div class='modal-body'>
													<div class='container-fluid'>
														<div class='row'>
															<div class='col'>
																<div class='form-group'>
																	<label for=''>Telefono:</label>
																	<input type='text' class='form-control validarTelefono' placeholder='Ej. 5511223344' id='agregar-tel-dp'>
																	<p class='text-danger d-none' id='perror-tel-dp'>Debe introducir un telefono valido</p>
																</div>
															</div>
															<div class='col'>
																<div class='form-group'>
																	<label for=''>Tipo:</label>
																	<select class='form-control' id='agregar-tel-dp-tipo'>
																		<option value='Local'>Local</option>
																		<option value='Movil'>Movil</option>
																	</select>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class='modal-footer'>
													<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
													<button type='button' class='btn btn-primary' onclick='agregar_tel_dp()'>Agregar</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class='col-6'>
									<label for=''>Firma:</label>
									<img src='firmas/$idEmpleado.png' alt='' class='img-thumbnail'>
								</div>
							</div>
							<div class='row mt-4 justify-content-around'>
								<div class='col-2'>
									<button type='button' class='btn bMT' id='mod_dp' onclick='habilitar_datos_personales()'>Modificar</button>
								</div>
								<div class='col-2'>
									<button type='submit' id='guardar-dp' class='btn bMT' disabled>Guardar</button>
								</div>
							</div>
							</form>";
// Se liberan los recursos de la base de datos y se cierra la conexión
$resultado->free();
$resultado2->free();
$resultado3->free();
$link->close();
