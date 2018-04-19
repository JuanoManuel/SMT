<?php
include 'conmenu.php';

$idEmpleado = $_POST["idEmpleado"];
$resultado;
$query = "SELECT * FROM escolaridad WHERE fkEmpleado = $idEmpleado";

if(!$resultado = $link->query($query)){
	echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
	exit;
}
if($resultado->num_rows === 0){
	echo "<p class='text-center'>Error el recuperar el empleado con el id proporcionado</p>";
	exit;
}

echo "<h2 class='mt-2'>Escolaridad</h2>
						<div id='accordion3'>";
						$i=0;
						while ($arrayRes = $resultado->fetch_assoc()) {
							$i++;
							$fkEscuelas=$arrayRes["fkEscuelas"];
							$query2="SELECT * FROM escuelas WHERE idEscuelas=$fkEscuelas";
							$resultado2=$link->query($query2);
							$arrayRes2=$resultado2->fetch_assoc();
							echo "<div class='card'>
								<div class='card-header' id='heading3".$i."'>
									<h5 class='mb-0'>
									<a data-toggle='collapse' data-target='#collapse3".$i."' aria-expanded='true' aria-controls='collapse3".$i."'>
									Primaria
									</a>
									</h5>
								</div>
								<div id='collapse3".$i."' class='collapse"; if($i==1){echo " show'";} echo" aria-labelledby='heading3".$i."' data-parent='#accordion3'>
									<div class='card-body'>
										<div class='row'>
											<div class='col'>
												<label for=''>¿Actualmente esta estudiando en esta institución?</label>
												<select name='' id='' class='form-control escol-ea'>
													<option value='Si'>Si</option>
													<option value='No' selected>No</option>
												</select>
											</div>
										</div>
										<div class='row'>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Año inicio:</label>
													<input type='number' value='".$arrayRes["Inicio"]."' class='form-control escol-ai'>
												</div>
											</div>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Año fin:</label>
													<input type='number' value='".$arrayRes["Fin"]."' class='form-control escol-af'>
												</div>
											</div>
										</div>
										<div class='row'>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Nombre de la institución:</label>
													<input type='text' value='".$arrayRes2["Nombre"]."' class='form-control escol-nombre'>
												</div>
											</div>
										</div>
										<div class='row'>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Estado</label>
													<select class='form-control'>
														<option value=''>Seleccione una opción</option>
														<option value='".$arrayRes2["Estado"]."' selected>".$arrayRes2["Estado"]."</option>
													</select>
												</div>
											</div>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Municipio o Delegación</label>
													<select class='form-control'>
														<option value=''>Seleccione una opción</option>
														<option value='".$arrayRes2["Municipio"]."' selected>".$arrayRes2["Municipio"]."</option>
													</select>
												</div>
											</div>
										</div>
										<div class='row'>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Calle </label>
													<input type='text' value='".$arrayRes["Direccion"]."' class='form-control escol-direccion'>
												</div>
											</div>
										</div>
										<div class='row'>
											<div class='col'> 
												<div class='form-group'>
													<label for=''>Nivel:</label>
													<input type='text' value='".$arrayRes2["Nivel_educativo"]."' class='form-control escol-nivel'>
												</div>
											</div>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Años:</label>
													<input type='text' value='".$arrayRes["Anios"]."' class='form-control escol-anios'>
												</div>
											</div>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Titulo Recibido:</label>
													<input type='text' value='".$arrayRes["Titulo_recibido"]."' class='form-control escol-titulo'>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>";
						}
						echo "</div>
						<div class='row my-3 justify-content-center'>
							<div class='col-auto'>
								<button type='button' class='btn bMT d-none' id='agregar_escolaridad' data-toggle='modal' data-target='#modal_nuevo_escolaridad'>Agregar</button>
							</div>
						</div>
						<div class='row justify-content-md-center mt-2 mb-3'>
							<div class='col col-lg-2'>
								<button type='button' class='btn bMT' onclick='habilitar_escolaridad(this)'>Modificar</button>
							</div>
							<div class='col col-lg-2'>
								<button type='button' class='btn bMT' id='guardar-escolaridad' disabled>Guardar</button>
							</div>	
						</div>
						<div class='modal fade' id='modal_nuevo_escolaridad' tabindex='-1' role='dialog' aria-labelledby='titulo_nuevo_escolaridad' aria-hidden='true'>
							<div class='modal-dialog modal-lg' role='document'>
								<div class='modal-content'>
									<div class='modal-header'>
										<h5 class='modal-title' id='titulo_nuevo_escolaridad'>Agregar escolaridad</h5>
										<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									</div>
									<div class='modal-body'>
										<div class='row'>
											<div class='col'>
												<label for=''>¿Actualmente esta estudiando en esta institución?</label>
												<select name='' class='form-control' id='escol-ea-nuevo'>
													<option value='' selected>Seleccione una opción</option>
													<option value='Si'>Si</option>
													<option value='No'>No</option>
												</select>
												<p class='text-danger d-none' id='escol-ea-error'>Seleccione una respuesta</p>
											</div>
										</div>
										<div class='row'>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Año inicio:</label>
													<input type='number' class='form-control' id='escol-ai-nuevo'>
													<p class='text-danger d-none' id='escol-ai-error'>Ingrese un año valido</p>
												</div>
											</div>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Año fin:</label>
													<input type='number' class='form-control' id='escol-af-nuevo'>
													<p class='text-danger d-none' id='escol-af-error'>Ingrese un año valido</p>
												</div>
											</div>
										</div>
										<div class='row'>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Nombre de la institución:</label>
													<input type='text' class='form-control' id='escol-nombre-nuevo'>
													<p class='text-danger d-none' id='escol-nombre-error'>Ingrese un nombre valido</p>
												</div>
											</div>
										</div>
										<div class='row'>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Dirección</label>
													<input type='text' class='form-control' id='escol-direccion-nuevo'>
													<p class='text-danger d-none' id='escol-direccion-error'>Ingrese una dirección valido</p>
												</div>
											</div>
										</div>
										<div class='row'>
											<div class='col'> 
												<div class='form-group'>
													<label for=''>Nivel:</label>
													<input type='text' class='form-control' id='escol-nivel-nuevo'>
													<p class='text-danger d-none' id='escol-nivel-error'>Ingrese un nivel valido</p>
												</div>
											</div>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Años:</label>
													<input type='number' class='form-control' id='escol-anios-nuevo'>
													<p class='text-danger d-none' id='escol-anios-error'>Ingrese un año valido</p>
												</div>
											</div>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Titulo Recibido:</label>
													<input type='text' class='form-control' id='escol-titulo-nuevo'>
													<p class='text-danger d-none' id='escol-titulo-error'>Ingrese un titulo valido</p>
												</div>
											</div>
										</div>
									</div>
									<div class='modal-footer'>
										<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
										<button type='button' class='btn btn-primary' onclick='agregar_escolaridad_modal()'>Guardar</button>
									</div>
								</div>
							</div>
						</div>";
$resultado->free();
$link->close();