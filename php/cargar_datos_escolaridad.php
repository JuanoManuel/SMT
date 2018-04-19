<?php
/*
*/

include 'conmenu.php';

$idEmpleado = $_POST["idEmpleado"];
$resultado;
$query = "SELECT * FROM escolaridad WHERE fkEmpleado ='$idEmpleado'";

if(!$resultado = $link->query($query)){
	echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
	exit;
}
$noEscolaridad=false;
$noEstudioA=false;
echo "<h2 class='mt-2'>Escolaridad</h2>
	<div id='accordion3'>";
$i=0;
if($resultado->num_rows != 0){
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
				".$arrayRes2["Nivel_educativo"]."
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
								<input type='number' min='1950' max='2017' value='".$arrayRes["Inicio"]."' class='form-control escol-ai'>
							</div>
						</div>
						<div class='col'>
							<div class='form-group'>
								<label for=''>Año fin:</label>
								<input type='number' max='2019' value='".$arrayRes["Fin"]."' class='form-control escol-af'>
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
					</div>";
					$res=explode("|", $arrayRes["Direccion"]);
					echo "<div class='row'>
						<div class='col'>
							<div class='form-group'>
								<label for=''>Calle: </label>
								<input type='text' value='".$res[0]."' class='form-control escol-direccion'>
							</div>
						</div>
						<div class='col-3'>
							<div class='form-group'>
								<label for=''>No. exterior: </label>
								<input type='text' value='".$res[1]."' class='form-control escol-direccion'>
							</div>
						</div>
					</div>
					<div class='row'>
						<div class='col'>
							<div class='form-group'>
								<label for=''>Nivel:</label>
								<input type='text' value='".$arrayRes2["Nivel_educativo"]."' class='form-control escol-nivel validarTexto'>
							</div>
						</div>
						<div class='col'>
							<div class='form-group'>
								<label for=''>Años:</label>
								<input type='number' value='".$arrayRes["Anios"]."' min='1' class='form-control escol-anios'>
							</div>
						</div>
						<div class='col'>
							<div class='form-group'>
								<label for=''>Titulo Recibido:</label>
								<input type='text' maxlength='60' value='".$arrayRes["Titulo_recibido"]."' class='form-control escol-titulo validarTexto'>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>";
	}
	$resultado->free();
	$resultado2->free();
}else{
	$noEscolaridad=true;
}
$query3="SELECT * FROM estudio_actual WHERE fkEmpleado='$idEmpleado'";
$resultado3;
$resultado4;
if(!$resultado3 = $link->query($query3)){
	echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
	exit;
}
if($resultado3->num_rows!=0){
	while ($arrayRes3 = $resultado3->fetch_assoc()) {
		$i++;
		$fkEscuelas2=$arrayRes3["fkEscuelas"];
		$query4="SELECT * FROM escuelas WHERE idEscuelas=$fkEscuelas2";
		$resultado4=$link->query($query4);
		$arrayRes4=$resultado4->fetch_assoc();
		echo "<div class='card'>
			<div class='card-header' id='heading3".$i."'>
				<h5 class='mb-0'>
				<a data-toggle='collapse' data-target='#collapse3".$i."' aria-expanded='true' aria-controls='collapse3".$i."'>
				".$arrayRes4["Nivel_educativo"]."
				</a>
				</h5>
			</div>
			<div id='collapse3".$i."' class='collapse"; if($i==1){echo " show'";} echo" aria-labelledby='heading3".$i."' data-parent='#accordion3'>
				<div class='card-body'>
					<div class='row'>
						<div class='col'>
							<label for=''>¿Actualmente esta estudiando en esta institución?</label>
							<select name='' id='' class='form-control escol-ea'>
								<option value='Si' selected>Si</option>
								<option value='No'>No</option>
							</select>
						</div>
					</div>
					<div class='row'>
						<div class='col'>
							<div class='form-group'>
								<label for=''>Nombre de la institución:</label>
								<input type='text' value='".$arrayRes4["Nombre"]."' class='form-control escol-nombre validarTexto'>
							</div>
						</div>
					</div>
					<div class='row'>
						<div class='col'>
							<div class='form-group'>
								<label for=''>Estado</label>
								<select class='form-control'>
									<option value=''>Seleccione una opción</option>
									<option value='".$arrayRes4["Estado"]."' selected>".$arrayRes4["Estado"]."</option>
								</select>
							</div>
						</div>
						<div class='col'>
							<div class='form-group'>
								<label for=''>Municipio o Delegación</label>
								<select class='form-control'>
									<option value=''>Seleccione una opción</option>
									<option value='".$arrayRes4["Municipio"]."' selected>".$arrayRes4["Municipio"]."</option>
								</select>
							</div>
						</div>
					</div>";
					$res=explode("|", $arrayRes3["Direccion"]);
					echo "<div class='row'>
						<div class='col'>
							<div class='form-group'>
								<label for=''>Calle: </label>
								<input type='text' maxlength='60' value='".$res[0]."' class='form-control escol-calle'>
							</div>
						</div>
						<div class='col-3'>
							<div class='form-group'>
								<label for=''>No. exterior: </label>
								<input type='text' maxlength='39' value='".$res[1]."' class='form-control escol-noext'>
							</div>
						</div>
					</div>
					<div class='row'>
						<div class='col'>
							<div class='form-group'>
								<label for=''>Nivel:</label>
								<input type='text' value='".$arrayRes4["Nivel_educativo"]."' class='form-control escol-nivel validarTexto'>
							</div>
						</div>
						<div class='col'>
							<div class='form-group'>
								<label for=''>Años:</label>
								<input type='number' value='".$arrayRes3["Anio"]."' min='1' class='form-control escol-anios'>
							</div>
						</div>
						<div class='col'>
							<div class='form-group'>
								<label for=''>Horario:</label>
								<input type='text' value='".$arrayRes3["Horario"]."' class='form-control escol-titulo'>
							</div>
						</div>
					</div>
					<div class='row'>
						<div class='col'>
							<div class='form-group'>
								<label for=''>Curso o carrera</label>
								<input type='text' value='".$arrayRes3["Curso_carrera"]."' class='form-control escol-curso validarTexto' maxlength='100'>
							</div>
						</div>
						<div class='col'>
							<div class='form-group'>
								<label for=''>Grado</label>
								<input type='text' maxlength='20' placeholder='Ej. 1er semestre' value='".$arrayRes3["Grado_nivel"]."' class='form-control escol-curso validarTexto' maxlength='100'>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>";
		$resultado4->free();
	}
	$resultado3->free();
}else{
	$noEstudioA=true;
}
if($noEstudioA && $noEscolaridad){
	echo "<p class='text-center text-danger'>No se registró ninguna escuela</p>";
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
													<input type='number' min='1950' max='2017' class='form-control' id='escol-ai-nuevo'>
													<p class='text-danger d-none' id='escol-ai-error'>Ingrese un año valido</p>
												</div>
											</div>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Año de graduación:</label>
													<input type='number' max='2018' class='form-control' id='escol-af-nuevo'>
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
											<div class='col-8'>
												<div class='form-group'>
													<label for=''>Calle</label>
													<input type='text' maxlength='60' class='form-control' id='escol-calle-nuevo'>
													<p class='text-danger d-none' id='escol-calle-error'>Ingrese una calle valido</p>
												</div>
											</div>
											<div class='col-4'>
												<div class='form-group'>
													<label for=''>No. Exterior</label>
													<input type='text' maxlength='39' class='form-control' id='escol-noext-nuevo'>
													<p class='text-danger d-none' id='escol-noext-error'>Ingrese un numero exterior valido</p>
												</div>
											</div>
										</div>
										<div class='row'>
											<div class='col'>
												<div class='form-group'>
													<label for=''>Nivel:</label>
													<input type='text' class='form-control validarTexto' id='escol-nivel-nuevo'>
													<p class='text-danger d-none' id='escol-nivel-error'>Ingrese un nivel valido</p>
												</div>
											</div>
											<div class='col noesactual'>
												<div class='form-group'>
													<label for=''>Años:</label>
													<input type='number' min='1' class='form-control' id='escol-anios-nuevo'>
													<p class='text-danger d-none' id='escol-anios-error'>Ingrese un año valido</p>
												</div>
											</div>
											<div class='col noesactual'>
												<div class='form-group'>
													<label for=''>Titulo Recibido:</label>
													<input type='text'  class='form-control validarTexto' id='escol-titulo-nuevo' maxlength='60'>
													<p class='text-danger d-none' id='escol-titulo-error'>Ingrese un titulo valido</p>
												</div>
											</div>
											<div class='col esactual d-none'>
												<div class='form-group'>
													<label for=''>Curso o carrera:</label>
													<input type='text' maxlength='100' class='form-control d-none' id='escol-curso-nuevo'>
													<p class='text-danger d-none' id='escol-curso-error'>Ingrese un texto valido</p>
												</div>
											</div>
											<div class='col esactual d-none'>
												<div class='form-group'>
													<label for=''>Grado:</label>
													<input type='text'  class='form-control d-none' id='escol-grado-nuevo' maxlength='20'>
													<p class='text-danger d-none' id='escol-titulo-error'>Ingrese un texto valido</p>
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
$link->close();
