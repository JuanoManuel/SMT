<?php
include 'conmenu.php';

$idEmpleado = $_POST["idEmpleado"];

echo "$idEmpleado";

$resultado;

$query = "SELECT * FROM empleado WHERE idEmpleado='$idEmpleado'";
if(!$resultado = $link->query($query)){
	echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
	exit;
}
if($resultado->num_rows === 0){
	echo "<p class='text-center'>Error el recuperar el empleado con el id proporcionado</p>";
	exit;
}

$arrayRes =  $resultado->fetch_assoc();

echo "<h2 class='mt-2 mb-3'>Datos Personales</h2>
							<div class='form-row mb-0 justify-content-start'>
								<div class='col-auto mr-3'>
									<div class='form-group'>
										<label for=''>Clave del empleado:</label>
										<input type='text' value='" . $arrayRes["idEmpleado"] . "' class='form-control'>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for=''>Puesto:</label>
										<select id='inputPuesto' class='form-control' name='Puesto' required=''>
											<option value='default' selected>Selecciona una opcion</option>
											<option value='Marketing'>Marketing</option>
											<option value='Limpieza'>Limpieza</option>
											<option value='Visepresidente ejecutivo'>Visepresidente ejecutivo</option>
										</select>
									</div>
								</div>
							</div>
							<div class='form-row justify-content-between'>
								<div class='col-auto'>
									<div class='form-group'>
										<label for=''>Fecha de registro:</label>
										<input type='date' value='" . $arrayRes["Fecha_registro"] . "' class='form-control'>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for=''>Fecha de contratación:</label>
										<input type='date' value='" . $arrayRes["Fecha_contratacion"] . "' class='form-control'>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for=''>Sueldo:</label>
										<input type='text' value='" . $arrayRes["Sueldo_esperado"] . "' class='form-control'>
									</div>
								</div>
							</div>
							<hr>
							<div class='form-row justify-content-between'>
								<div class='col-auto'>
									<div class='form-group'>
										<label for=''>Apellido Paterno:</label>
										<input type='text' value='" . $arrayRes["ApellidoP"] . "' class='form-control'>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for=''>Apellido Materno:</label>
										<input type='text' value='" . $arrayRes["ApellidoM"] . "' class='form-control'>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for=''>Nombre(s):</label>
										<input type='text' value='" . $arrayRes["Nombre"] . "' class='form-control'>
									</div>
								</div>
							</div>
							<div class='form-row justify-content-between'>
								<div class='col-4'>
									<label for=''>Correo electronico:</label>
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
										<input type='number' value='" . $arrayRes["Edad"] . "' class='form-control'>
									</div>
								</div>
								<div class='col-2'>
									<div class='form-group'>
										<label for=''>Sexo:</label>
										<select required='' class='form-control' id='inputSexo' name='inputSexo'>";
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
								<div class='col-4'>
									<div class='form-group'>
										<label for=''>Orientación sexual</label>
										<input type='text' value='" . $arrayRes["Orientacion_sexual"] . "' class='form-control'=''>
									</div>
								</div>
							</div>";
							$resultado2;
							$fkDirecciones=$arrayRes["fkDirecciones"];
							$query2 = "SELECT * FROM direcciones WHERE idDirecciones = $fkDirecciones";
							if(!$resultado2 = $link->query($query2)){
								echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
								exit;
							}
							$arrayRes2=$resultado2->fetch_assoc();

							echo "<div class='form-row justify-content-between'>
								<div class='col-4'>
									<div class='form-group'>
										<label for='inputEstado'>Estado</label>
										<select required='' class='form-control' id='inputEstado' name='inputEstado'>
											<option value='".$arrayRes2["Estado"]."' selected>".$arrayRes2["Estado"]."</option>
											<option>Seleccione una opción</option>
										</select>
									</div>
								</div>
								<div class='col-4'>
									<div class='form-group'>
										<label for='inputMunicipio'>Municipio</label>
										<select required='' class='form-control' id='inputMunicipio' name='inputMunicipio'>
											<option value='".$arrayRes2["Municipio"]."' selected>".$arrayRes2["Municipio"]."</option>
											<option>Seleccione una opción</option>
										</select>
									</div>
								</div>
								<div class='col-4'>
									<div class='form-group'>
										<label for='inputColonia'>Colonia</label>
										<select required='' class='form-control' id='inputColonia' name='inputColonia'>
											<option value='".$arrayRes2["Colonia"]."' selected>".$arrayRes2["Colonia"]."</option>
											<option>Seleccione una opción</option>
										</select>
									</div>
								</div>
								<div class='col-5'>
									<div class='form-group'>
										<label for='inputCalle'>Calle</label>
										<input required value='" . $arrayRes["Calle"] . "' type='text' name='inputCalle' class='form-control' id='inputCalle'>
									</div>
								</div>
								<div class='col-4'>
									<div class='form-group'>
										<label for='inputNacionalidad'>Nacionalidad</label>
										<select required='' class='form-control' id='inputNacionalidad' name='inputNacionalidad'>";
											$resultado3;
											$fkNacionalidad=$arrayRes["fkNacionalidad"];
											$query3="SELECT * FROM Nacionalidad";
											if(!$resultado3 = $link->query($query3)){
												echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
												exit;
											}
											while($arrayRes3 = $resultado3->fetch_assoc()){
												if($fkNacionalidad==$arrayRes3["idNacionalidad"]){
													echo "<option value='".$arrayRes3["idNacionalidad"]."' selected>".$arrayRes3["Nombre"]."</option>";
												}else{
													echo "<option value='".$arrayRes3["idNacionalidad"]."'>".$arrayRes3["Nombre"]."</option>";
												}

											}
										echo "</select>
									</div>
								</div>
								<div class='col-3'>
									<div class='form-group'>
										<label for='inputCP'>Codigo Postal</label>
										<select name='inputCP' class='form-control' id='inputCP'>
											<option value='".$arrayRes2["CP"]."' selected>".$arrayRes2["CP"]."</option>
										</select>
										<input type='hidden' name='idDireccion' id='idDireccion' value=''>
									</div>
								</div>
							</div>
							<div class='form-row justify-content-between'>
								<div class='col-auto'>
									<div class='form-group'>
										<label for='inputNumExt'>Numero Exterior</label>
										<input required value='" . $arrayRes["No_ext"] . "' type='text' name='inputNumExt' id='inputNumExt' class='form-control'>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for='inputnumInt'>Numero Interior</label>
										<input type='text' value='" . $arrayRes["No_int"] . "' name='inputnumInt' id='inputnumInt' class='form-control'>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for='inputEstadoCivil'>Estado Civil</label>
										<select required='' class='form-control' id='inputEstadoCivil' name='inputEstadoCivil'>";
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
										<input required='' value='" . $arrayRes["Lugar_nacimiento"] . "' type='text' name='inputLugarNacimiento' class='form-control' id='inputLugarNacimiento'>
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
											<input required='' value='" . $arrayRes["Estatura"] . "' type='number' class='form-control' id='inputEstatura' name='inputEstatura' aria-label='Estatura' aria-describedby='estatura-addon'>
											<div class='input-group-addon'>
											  <span class='input-group-text' id='estatura-addon2'>m</span>
											</div>
										</div>
									</div>
								</div>
								<div class='col-2'>
									<div class='form-group'>
										<label for='inputPeso'>Peso</label>
										<div class='input-group noSpinner'>
											<input required='' value='" . $arrayRes["Peso"] . "' type='number' class='form-control' id='inputPeso' name='inputPeso' aria-label='Peso' aria-describedby='peso-addon'>
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
							$resultado->free();
							$query="SELECT * FROM Vive_con WHERE fkempleado=$idEmpleado";
							if(!$resultado = $link->query($query)){
								echo "<p class='text-danger text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
								exit;
							}
							$arrayRes = $resultado->fetch_assoc();
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
							$resultado->free();
							$query="SELECT * FROM dependientes WHERE fkempleado=$idEmpleado";
							if(!$resultado = $link->query($query)){
								echo "<p class='text-danger text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
								exit;
							}
							echo "<div class='row'>";
							$hijos=false;
							$conyuge=false;
							$padres=false;
							$otros=false;
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
							}
							if($hijos){
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende1' class='' checked>
									<label for='' class=''>Hijos</label>
								</div>";
							}else{
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende1' class=''>
									<label for='' class=''>Hijos</label>
								</div>";
							}
							if($conyuge){
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende2' class='' checked>
									<label for='' class=''>Cónyuge</label>
								</div>";
							}else{
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende2' class=''>
									<label for='' class=''>Cónyuge</label>
								</div>";
							}
							if($padres){
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende3' class='' checked>
									<label for='' class=''>Padres</label>
								</div>";
							}else{
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende3' class=''>
									<label for='' class=''>Padres</label>
								</div>";
							}
							if ($otros) {
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende4' class='' checked>
									<label for='' class=''>Otros</label>
								</div>";
							}else{
								echo "<div class='col form-check form-check-inline'>
									<input type='checkbox' name='depende4' class=''>
									<label for='' class=''>Otros</label>
								</div>";
							}
								
							echo "</div>
							<div class='form-row mt-2 justify-content-between'>
								<div class='col-7'>
									<label for='' class='col-form-label'>Telefonos:</label>
									<table class='table' id='telefonos_dp'>
										<thead id='head_telefonos_dp'>
											<tr>
												<th>Numero</th>
												<th>Tipo</th>
												<th>Telefono</th>
											</tr>
										</thead>
										<tbody id='body_telefonos_dp'>";
										$resultado->free();
										$query="SELECT * FROM telefono WHERE fkempleado='$idEmpleado'";
										if(!$resultado = $link->query($query)){
											echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
											exit;
										}
										if($resultado->num_rows === 0){
											echo "<p class='text-center'>El empleado no tiene ningun telefono registrado</p>";
											exit;
										}
										$i=0;
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
										echo "</tbody>
										<input type='hidden' name='notelefonos-dp'>
									</table>
									<button type='button' class='btn bMT d-none mb-2' id='btn-tel-dp' data-toggle='modal' data-target='#exampleModal'>Agregar</button>
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
																		<input type='text' class='form-control' placeholder='Ej. 5511223344' id='agregar-tel-dp'>
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
							</div>
							<div class='row mt-4 justify-content-around'>
								<div class='col-2'>
									<button type='button' class='btn bMT' id='mod_dp' onclick='habilitar_datos_personales()'>Modificar</button>
								</div>
								<div class='col-2'>
									<button type='button' id='guardar-dp' class='btn bMT'>Guardar</button>
								</div>
							</div>";
$resultado->free();
$resultado2->free();
$link->close();