<?php
include 'conmenu.php';

$idEmpleado = $_POST["idEmpleado"];
$query = "SELECT idioma.idioma,empleado_idioma.nivel FROM empleado,idioma,empleado_idioma WHERE empleado.idempleado=empleado_idioma.fkempleado AND idioma.ididioma=empleado_idioma.fkidioma AND empleado.idEmpleado='$idEmpleado'";
$noidioma="";
if(!$resultado = $link->query($query)){
	echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas (idioma)</p>";
	exit;
}
if($resultado->num_rows === 0){
	$noidioma="<p class='text-center text-danger'>No se registro ningún idioma</p>";
}

echo "<h2>Conocimientos generales</h2>
						<div class='row'>
							<div class='borde-a col mx-3 mb-2'>
								<h4 class='text-left'>Idiomas que habla</h4>
								<div id='idiomas_maneja'>";
								if($noidioma!=""){
									echo $noidioma;
								}else{
									while ($arrayRes = $resultado->fetch_assoc()) {
										echo "<div class='row my-2'>
											<div class='col'>
												<p class='mb-0'>".$arrayRes["idioma"]."</p>
												<input type='hidden' value='".$arrayRes["idioma"]."'>
												<input type='hidden' value='".$arrayRes["nivel"]."%'>
												<div class='progress'>
													<div class='progress-bar' role='progressbar' style='width: ".$arrayRes["nivel"]."%;' aria-valuenow='".$arrayRes["nivel"]."' aria-valuemin='0' aria-valuemax='100'>".$arrayRes["nivel"]."%</div>
												</div>
											</div>
										</div>";
									}
								}
								
								echo "</div>
								<div class='row my-3 d-none' id='boton-agregar-idioma'>
									<div class='col'>
										<button type='button' class='btn bMT' data-toggle='modal' data-target='#modal_nuevo_idioma'>Agregar</button>
									</div>
								</div>
							</div>
						</div>
						<div class='row'>
							<div class='borde-a col mx-3 mb-2'>
								<h4 class='text-left'>Software que maneja:</h4>
								<div class='row' id='software_maneja'>";
								$resultado->free();
								$query = "SELECT software.idsoftware,software.nombre,empleado_software.nivel FROM empleado,software,empleado_software WHERE empleado.idempleado=empleado_software.fkempleado AND software.idsoftware=empleado_software.fksoftware AND empleado.idEmpleado='$idEmpleado'";

								if(!$resultado = $link->query($query)){
									echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas(software)</p>";
									exit;
								}
								if($resultado->num_rows === 0){
									echo "<p class='text-center'>Error el recuperar el empleado con el id proporcionado (software)</p>";
									exit;
								}

								while ($arrayRes = $resultado->fetch_assoc()) {
									echo "<div class='col-3'>
										<div class='form-group'>
											<label for=''>".$arrayRes["nombre"]."</label>
											<input type='hidden' value='".$arrayRes["idsoftware"]."'>
											<select name='' id='' class='form-control' disabled>";
											switch ($arrayRes["nivel"]) {
												case 'Basico':
													echo "<option value='No uso'>No lo uso</option>
													<option value='Basico' selected>Básico</option>
													<option value='Intermedio'>Intermedio</option>
													<option value='Avanzado'>Avanzado</option>";
													break;
												case 'Intermedio':
													echo "<option value='No uso'>No lo uso</option>
													<option value='Basico'>Básico</option>
													<option value='Intermedio' selected>Intermedio</option>
													<option value='Avanzado'>Avanzado</option>";
													break;
												case 'Avanzado':
													echo "<option value='No uso'>No lo uso</option>
													<option value='Basico'>Básico</option>
													<option value='Intermedio'>Intermedio</option>
													<option value='Avanzado' selected>Avanzado</option>";
													break;
												case 'No uso':
													echo "<option value='No uso' selected>No lo uso</option>
													<option value='Basico'>Básico</option>
													<option value='Intermedio'>Intermedio</option>
													<option value='Avanzado'>Avanzado</option>";
													break;
											}
												
											echo"</select>
										</div>
									</div>";
								}
								echo "</div>
								<input type='hidden' name='nosoftware' value=''>
								<div class='row d-none' id='boton-agregar-software'>
									<div class='col mb-2'><button type='button' class='btn bMT' data-toggle='modal' data-target='#modal_nuevo_software'>Agregar</button></div>
								</div>
							</div>
						</div>
						<div class='row'>
							<div class='col borde-a mx-3 mb-2'>
								<h3 class='text-left'>Competencias</h3>
								<div class='row'>";
								$resultado->free();
								$query = "SELECT competencias.nombre,competencias.idcompetencias,empleado_comp.nivel from competencias,empleado,empleado_comp WHERE competencias.idcompetencias = empleado_comp.fkcompetencias AND empleado.idempleado=empleado_comp.fkempleado AND empleado.idempleado='$idEmpleado'";
								if(!$resultado = $link->query($query)){
									echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas (competencias)</p>";
									exit;
								}
								if($resultado->num_rows === 0){
									echo "<p class='text-center'>Error el recuperar el empleado con el id proporcionado (competencias)</p>";
									exit;
								}
								while ($arrayRes = $resultado->fetch_assoc()) {
									echo "<div class='col-3'>
										<div class='form-group'>
											<label for=''>".$arrayRes["nombre"]."</label>
											<input type='hidden' value='".$arrayRes["idcompetencias"]."'>
											<select name='competencia1' id='' class='form-control' disabled>";
											switch ($arrayRes["nivel"]) {
												case 'Basico':
													echo "<option value='Basico' selected>Básico</option>
													<option value='Medio'>Medio</option>
													<option value='Alto'>Alto</option>";
													break;
												case 'Medio':
													echo "<option value='Basico'>Básico</option>
													<option value='Medio' selected>Medio</option>
													<option value='Alto'>Alto</option>";
													break;
												case 'Alto':
													echo "<option value='Basico'>Básico</option>
													<option value='Medio'>Medio</option>
													<option value='Alto' selected>Alto</option>";
													break;
											}	
											echo "</select>
										</div>
									</div>";
								}
								echo "</div>
							</div>
						</div>
						<div class='row mt-4'>
							<div class='col text-center'>
								<button type='button' class='btn bMT' onclick='' id='boton-hab-conocimientos'>Modificar</button>
							</div>
							<div class='col text-center'>
								<button type='button' class='btn bMT' id='boton-guardar-conocimientos' disabled>Guardar</button>
							</div>
						</div>
						<div class='modal fade' id='modal_nuevo_idioma' tabindex='-1' role='dialog' aria-labelledby='titulo_nuevo_idioma' aria-hidden='true'>
							<div class='modal-dialog' role='document'>
								<div class='modal-content'>
									<div class='modal-header'>
										<h5 class='modal-title' id='titulo_nuevo_idioma'>Agregar idioma</h5>
										<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									</div>
									<div class='modal-body'>
										<div class='row'>
											<div class='col'>
												<div class='form-group'>
													<label>Idioma:</label>
													<input type='text' id='idioma_nuevo' name='' class='form-control'>
													<p class='text-danger d-none' id='icerror'>Ingrese un idioma valido</p>
												</div>
											</div>
											<div class='col'>
												<div class='form-group'>
													<label>Porcentaje dominado:</label>
													<input type='text' id='porcentaje_nuevo' name='' class='form-control'>
													<p class='text-danger d-none' id='pcerror'>Ingrese un porcentaje valida</p>
												</div>
											</div>
										</div>
									</div>
									<div class='modal-footer'>
										<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
										<button type='button' class='btn btn-primary' onclick='agregar_idioma_cg()'>Guardar</button>
									</div>
								</div>
							</div>
						</div>
						<div class='modal fade' id='modal_nuevo_software' tabindex='-1' role='dialog' aria-labelledby='titulo_nuevo_software' aria-hidden='true'>
							<div class='modal-dialog' role='document'>
								<div class='modal-content'>
									<div class='modal-header'>
										<h5 class='modal-title' id='titulo_nuevo_software'>Agregar software</h5>
										<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									</div>
									<div class='modal-body'>
										<div class='row'>
											<div class='col'>
												<div class='form-group'>
													<label>Software:</label>
													<input type='text' id='software_nuevo' name='' class='form-control'>
													<p class='text-danger d-none' id='scerror'>Ingrese un software valido</p>
												</div>
											</div>
											<div class='col'>
												<div class='form-group'>
													<label>Nivel:</label>
													<select id='nivel_software_nuevo' name='' class='form-control'>
														<option value='' selected>Seleccione una opción</option>
														<option value='Básico'>Básico</option>
														<option value='Intermedio'>Intermedio</option>
														<option value='Avanzado'>Avanzado</option>
													</select>
													<p class='text-danger d-none' id='nscerror'>Seleccione un nivel</p>
												</div>
											</div>
										</div>
									</div>
									<div class='modal-footer'>
										<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
										<button type='button' class='btn btn-primary' onclick='agregar_software_cg()'>Guardar</button>
									</div>
								</div>
							</div>
						</div>";
