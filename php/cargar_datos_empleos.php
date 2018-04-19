<?php 
include 'conmenu.php';

$idEmpleado=$_POST["idEmpleado"];
$query = "SELECT empleo.*,empleado.razon_empleo FROM empleado,empleado_empleo,empleo WHERE empleado.idempleado=empleado_empleo.fkempleado AND empleo.idempleo= empleado_empleo.fkempleo AND idempleado='$idEmpleado'";
echo "<h2 class='mt-2'>Empleo Actual y Anteriores</h2>";
 if(!$resultado=$link->query($query)){
 	echo "<p class='text-danger text-center'>Error al recuperar la información del empleado</p>";
 	exit;
 }

 if($resultado->num_rows === 0){
 	echo "<p class='text-danger text-center'>El empleado no ha tenido empleos anteriores</p>";
 	exit;
 }
						echo "<div id='accordion' role='tablist'>";
						$i=0;
						while($arrayRes = $resultado->fetch_assoc()){
							$informes=$arrayRes["razon_empleo"];
							$i++;
							echo "<div class='card'>
								<div class='card-header' role='tab' id='heading".$i."'>
									<h5 class='mb-0'>
									<a data-toggle='collapse' href='#collapse".$i."' role='button' aria-expanded='true' aria-controls='collapse".$i."'>
									".$arrayRes["Nombre"]."
									</a>
									</h5>
								</div>
								<div id='collapse".$i."' class='collapse"; if($i==1){ echo" show";} echo "' role='tabpanel' aria-labelledby='heading".$i."' data-parent='#accordion'>
									<div class='card-body'>
										<div class='row mx-1 mt-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Año en el que empezó a prestar sus servicios:</label>
												<input type='text' value='".$arrayRes["Tiempo_inicio"]."' class='form-control empleo-ti' disabled>
											</div>
											<div class='col'>
												<label for='' class='col-form-label'>Año en el que terminó a prestar sus servicios:</label>
												<input type='text' value='".$arrayRes["Tiempo_fin"]."' class='form-control empleo-tf' disabled>
											</div>
										</div>
										<div class='row mx-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Nombre de la compañia:</label>
												<input type='text' value='".$arrayRes["Nombre"]."' class='form-control empleo-nombre' disabled>
											</div>
											<div class='col'>
												<label for='' class='col-form-label'>Telefono:</label>
												<input type='text' value='".$arrayRes["Telefono"]."' class='form-control empleo-telefono' disabled>
											</div>
										</div>
										<div class='row mx-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Dirección:</label>
												<input type='text' value='".$arrayRes["Direccion"]."' class='form-control empleo-direccion' disabled>
											</div>
										</div>
										<div class='row mx-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Sueldo mensual:</label>
												<input type='text' value='".$arrayRes["Sueldo_mensual"]."' class='form-control empleo-sueldo' disabled>
											</div>
											<div class='col'>
												<label for='' class='col-form-label'>Puesto:</label>
												<input type='text' value='".$arrayRes["Puesto"]."' class='form-control empleo-puesto' disabled>
											</div>
										</div>
										<div class='row mx-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Nombre del jefe directo:</label>
												<input type='text' value='".$arrayRes["Nombre_jefe"]."' class='form-control empleo-njefe' disabled>
											</div>
											<div class='col'>
												<label for='' class='col-form-label'>Puesto del jefe directo:</label>
												<input type='text' value='".$arrayRes["Puesto_jefe"]."' class='form-control empleo-pjefe' disabled>
											</div>
										</div>
										<div class='row mx-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Motivo de separación:</label>
												<input type='text' value='".$arrayRes["Motivo_separacion"]."' class='form-control empleo-motivo' disabled>
											</div>
										</div>
										<div class='row mx-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Comentarios de sus jefes:</label>
												<input type='text' value='".$arrayRes["Comentarios"]."' class='form-control empleo-comentario' disabled>
											</div>
										</div>
									</div>
								</div>
							</div>";
						}
							
						echo "</div>
						<div class='row mx-2 my-2'>";
						if($informes=="Si"){
							echo "<div class='col-4'>
								<div class='form-check'>
									<input type='checkbox' class='empleo-informes' disabled checked>
									<label>¿Podemos pedir informes?</label>
								</div>
							</div>
							<div class='col-2'>
								<label for=''  >      ¿Razones?:</label>
							</div>
							<div class='col'>
								<input type='text' name='' class='form-control form-control-sm empleo-razones	' disabled>
							</div>";
						}else{
							echo "<div class='col-4'>
								<div class='form-check'>
									<input type='checkbox' class='empleo-informes' disabled>
									<label>¿Podemos pedir informes?</label>
								</div>
							</div>
							<div class='col-2'>
								<label for=''  >      ¿Razones?:</label>
							</div>
							<div class='col'>
								<input type='text' name='' value='".$arrayRes["Razon_empleo"]."' class='form-control form-control-sm empleo-razones	' disabled>
							</div>";
						}
						echo "</div>
						<div class='row justify-content-md-center mt-2 mb-3 d-none' id='boton-agregar-empleo'>
							<div class='col col-lg-2'>
								<button type='button' class='btn bMT' data-toggle='modal' data-target='#modal_nuevo_empleo'>Agregar</button>
							</div>
						</div>
                    	<div class='row justify-content-md-center mt-2 mb-3'>
							<div class='col col-lg-2'>
								<button type='button' class='btn bMT' onclick=''>Modificar</button>
							</div>
							<div class='col col-lg-2'>
								<button type='button' class='btn bMT' id='guardar_empleo' disabled>Guardar</button>
							</div>	
						</div>
						<div class='modal fade' id='modal_nuevo_empleo' tabindex='-1' role='dialog' aria-labelledby='titulo_nuevo_empleo' aria-hidden='true'>
							<div class='modal-dialog modal-lg' role='document'>
								<div class='modal-content'>
									<div class='modal-header'>
										<h5 class='modal-title' id='titulo_nuevo_empleo'>Agregar referencia</h5>
										<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									</div>
									<div class='modal-body'>
										<div class='row mx-1 mt-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Año en el que empezó a prestar sus servicios:</label>
												<input type='number' class='form-control' id='empleo-ti-nuevo' disabled>
												<p class='text-danger d-none' id='tieerror'>Ingrese un año valido</p>
											</div>
											<div class='col'>
												<label for='' class='col-form-label'>Año en el que terminó a prestar sus servicios:</label>
												<input type='text' class='form-control' id='empleo-tf-nuevo' disabled>
												<p class='text-danger d-none' id='tfeerror'>Ingrese un año valido</p>
											</div>
										</div>
										<div class='row mx-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Nombre de la compañia:</label>
												<input type='text' class='form-control' id='empleo-nombre-nuevo' disabled>
												<p class='text-danger d-none' id='neerror'>Ingrese un nombre valido</p>
											</div>
											<div class='col'>
												<label for='' class='col-form-label'>Telefono:</label>
												<input type='text' class='form-control' id='empleo-telefono-nuevo' disabled>
												<p class='text-danger d-none' id='teerror'>Ingrese un telefono valido</p>
											</div>
										</div>
										<div class='row mx-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Dirección:</label>
												<input type='text' class='form-control' id='empleo-direccion-nuevo' disabled>
												<p class='text-danger d-none' id='deerror'>Ingrese una dirección valido</p>
											</div>
										</div>
										<div class='row mx-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Sueldo mensual:</label>
												<input type='text' class='form-control' id='empleo-sueldo-nuevo' disabled>
												<p class='text-danger d-none' id='seerror'>Ingrese un sueldo valido</p>
											</div>
											<div class='col'>
												<label for='' class='col-form-label'>Puesto:</label>
												<input type='text' class='form-control' id='empleo-puesto-nuevo' disabled>
												<p class='text-danger d-none' id='peerror'>Ingrese un puesto valido</p>
											</div>
										</div>
										<div class='row mx-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Nombre del jefe directo:</label>
												<input type='text' class='form-control' id='empleo-njefe-nuevo' disabled>
												<p class='text-danger d-none' id='njeerror'>Ingrese un nombre valido</p>
											</div>
											<div class='col'>
												<label for='' class='col-form-label'>Puesto del jefe directo:</label>
												<input type='text' class='form-control' id='empleo-pjefe-nuevo' disabled>
												<p class='text-danger d-none' id='pjeerror'>Ingrese un puesto valido</p>
											</div>
										</div>
										<div class='row mx-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Motivo de separación:</label>
												<input type='text' class='form-control' id='empleo-motivo-nuevo' disabled>
												<p class='text-danger d-none' id='meerror'>Ingrese un motivo valido</p>
											</div>
										</div>
										<div class='row mx-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Comentarios de sus jefes:</label>
												<input type='text' class='form-control' id='empleo-comentario-nuevo' disabled>
												<p class='text-danger d-none' id='ceerror'>Ingrese un comentario valido</p>
											</div>
										</div>
									</div>
									<div class='modal-footer'>
										<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
										<button type='button' class='btn btn-primary' onclick='agregar_empleo()'>Guardar</button>
									</div>
								</div>
							</div>
						</div>";
$resultado->free();
$link->close();