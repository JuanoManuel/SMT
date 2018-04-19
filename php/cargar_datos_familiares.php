<?php
include 'conmenu.php';

$idEmpleado = $_POST["idEmpleado"];
$query = "SELECT * FROM datos_familiares WHERE fkEmpleado='$idEmpleado'";
$resultado;

if(!$resultado = $link->query($query)){
	echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
	exit;
}
if($resultado->num_rows === 0){
	echo "<p class='text-center'>Error el recuperar el empleado con el id proporcionado</p>";
	exit;
}


echo "<h2>Datos familiares</h2>
						<div class='row'>
							<div class='col'>
								<table class='table' id='tabla_parientes'>
									<thead>
										<tr>
											<th>Parentesco</th>
											<th>Nombre</th>
											<th>Vive</th>
											<th>Domicilio</th>
											<th>Ocupación</th>
										</tr>
									</thead>
									<tbody>";
									while($arrayRes = $resultado->fetch_assoc()){
										echo "<tr>
											<td>". $arrayRes["Parentesco"] ."</td>
											<td class='nombre_pariente'>". $arrayRes["Nombre"] ."</td>";
											if($arrayRes["Vive"]=="1"){
												echo "<td><input type='checkbox' disabled class='vive_parientei' checked></td>";
											}else{
												echo "<td><input type='checkbox' disabled class='vive_parientei'></td>";
											}
											echo "<td class='direccion_pariente'>". $arrayRes["Domicilio"]."</td>
											<td class='ocupacion_pariente'>" . $arrayRes["Ocupacion"] ."</td>
											<input type='hidden' class='nombre_parientei' value='". $arrayRes["Nombre"] ."'>
											<input type='hidden' class='direccion_parientei' value='". $arrayRes["Domicilio"]."'>
											<input type='hidden' class='ocupacion_parientei' value='" . $arrayRes["Ocupacion"] ."'>
										</tr>";
									}
									echo "</tbody>
								</table>
							</div>
						</div>
						<div class='row'>
							<div class='col-6'>
								<label for=''>Hijos:</label>
								<table class='table'>
									<thead id='head_thijos_df'>
										<tr>
											<th>Numero</th>
											<th>Nombre</th>
											<th>Edad</th>
										</tr>
									</thead>
									<tbody id='body_thijos_df'>";
										$resultado2;
										$query="SELECT * FROM hijos_empleado WHERE fkEmpleado='$idEmpleado'";
										if(!$resultado2 = $link->query($query)){
											echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
											exit;
										}
										if($resultado2->num_rows === 0){
											echo "<td colspan='3'>El empleado no tiene ningun hijo</td>";
										}
										$i=1;
										while($arrayRes = $resultado2->fetch_assoc()){
											echo "<tr class='fhijo'><td>".$i."</td>
											<td>".$arrayRes["Nombre"]."</td>
											<td>".$arrayRes["Edad"]."</td>
											<input type='hidden' value='".$arrayRes["Nombre"]."' name='Nombrehijo1' class='nombre_hijo'>
											<input type='hidden' value='".$arrayRes["Edad"]."' name='Edadhijo1' class='edad_hijo'></tr>";
											$i++;
										}
										echo "</tr>
										<input type='hidden' name='nohijos' value='0'>
									</tbody>
								</table>
								<button type='button' class='btn bMT d-none' data-toggle='modal' data-target='#modal_hijos_df' id='agregar_hijos_df'>Agregar</button>
								<div class='modal fade' id='modal_hijos_df' tabindex='-1' role='dialog' aria-labelledby='titulo_modal_hijo' aria-hidden='true'>
									<div class='modal-dialog' role='document'>
										<div class='modal-content'>
											<div class='modal-header'>
												<h5 class='modal-title' id='titulo_modal_hijo'>Agregar hijo</h5>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
												</button>
											</div>
											<div class='modal-body'>
												<div class='row'>
													<div class='col'>
														<div class='form-group'>
															<label>Nombre:</label>
															<input type='text' maxlength='70' id='nombre_hijo_nuevo' name='' class='form-control validarTexto'>
															<p class='text-danger d-none' id='nherror'>Ingrese un nombre valido</p>
														</div>
													</div>
													<div class='col'>
														<div class='form-group'>
															<label>Edad:</label>
															<input type='number' min='1' max='60' id='edad_hijo_nueva' name='' class='form-control'>
															<p class='text-danger d-none' id='eherror'>Ingrese una edad valida</p>
														</div>
													</div>
												</div>
											</div>
											<div class='modal-footer'>
												<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
												<button type='button' class='btn btn-primary' onclick='agregar_hijos()'>Agregar</button>
											</div>
										</div>
									</div>
								</div>
								<div class='modal fade' id='modal_parientes_df' tabindex='-1' role='dialog' aria-labelledby='titulo_modal_pariente' aria-hidden='true'>
									<div class='modal-dialog' role='document'>
										<div class='modal-content'>
											<div class='modal-header'>
												<h5 class='modal-title' id='titulo_modal_pariente'>Modificar pariente</h5>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
												</button>
											</div>
											<div class='modal-body'>
												<input type='hidden' value='0' id='indicetr'>
												<div class='row'>
													<div class='col-7'>
														<div class='form-group'>
															<label>Nombre:</label>
															<input type='text' maxlength='70' id='nombre_pariente_nuevo' name='' class='form-control'>
															<p class='text-danger d-none' id='nperror'>Ingrese un nombre valido</p>
														</div>
													</div>
													<div class='col'>
														<div class='form-group'>
															<label>Ocupación:</label>
															<input type='text' id='ocupacion_pariente_nuevo' maxlength='100' name='' class='form-control'>
															<p class='text-danger d-none' id='operror'>Ingrese una ocupación valida</p>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class='col'>
														<div class='form-group'>
															<label>Dirección:</label>
															<input type='text' id='direccion_pariente_nuevo' name='' maxlength='100' class='form-control'>
															<p class='text-danger d-none' id='dperror'>Ingrese una dirección valida</p>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class='col'>
														<div class='form-check'>
															<input type='checkbox' value='' id='vive_pariente_nuevo'>
															<label class='form-check-label' for='defaultCheck1'>
															¿Vive?
															</label>
														</div>
													</div>
												</div>
											</div>
											<div class='modal-footer'>
												<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
												<button type='button' class='btn btn-primary' onclick='mod_parientes()'>Guardar</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class='col-5 text-center'>
								<div class='w-100 mt-5'></div>
								<button type='button' class='btn my-5 bMT' id='mod_familiares' onclick='habilitar_datos_familiares()'>Modificar</button>
								<div class='w-100'></div>
								<button type='button' class='btn mt-5 bMT' id='guardar_familiares' disabled>Guardar</button>
							</div>
						</div>";
$resultado->free();
$resultado2->free();
$link->close();
