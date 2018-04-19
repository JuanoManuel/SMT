<?php
include 'conmenu.php';

$idEmpleado=$_POST["idEmpleado"];
$query = "SELECT * FROM referencias WHERE fkempleado='$idEmpleado'";

 if(!$resultado=$link->query($query)){
 	echo "<p class='text-danger text-center'>Error al recuperar la información del empleado</p>";
 	exit;
 }
echo "<h2 class='mt-2'>Referencias Personales</h2>";
 if($resultado->num_rows === 0){
 	echo "<p class='text-danger text-center'>El empleado no registró ninguna referencia</p>";
 	exit;
 }

echo " 		<div id='accordion2' role='tablist'>";
						$i=0;
						while ($arrayRes = $resultado->fetch_assoc()) {
							$i++;
							echo "<div class='card'>
								<div class='card-header' role='tab' id='heading2".$i."'>
									<h5 class='mb-0'>
									<a data-toggle='collapse' href='#collapse2".$i."' role='button' aria-expanded='true' aria-controls='collapse2".$i."'>
									".$arrayRes["Nombre"]."
									</a>
									</h5>
								</div>
								<div id='collapse2".$i."' class='collapse"; if($i==1){ echo " show'";} echo " role='tabpanel' aria-labelledby='heading2".$i."' data-parent='#accordion2'>
									<div class='card-body'>
										<div class='row mx-1 mt-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Nombre:</label>
												<input type='text' value='".$arrayRes["Nombre"]."' class='form-control rp-nombre' disabled>
											</div>
											<div class='col'>
												<label for='' class='col-form-label'>Ocupación:</label>
												<input type='text' value='".$arrayRes["Ocupacion"]."' class='form-control rp-ocupacion' disabled>
											</div>
										</div>
										<div class='row mx-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Domicilio:</label>
												<input type='text' value='".$arrayRes["Domicilio"]."' class='form-control rp-domicilio' disabled>
											</div>
										</div>
										<div class='row mx-1'>
											<div class='col'>
												<label for='' class='col-form-label'>Telefono:</label>
												<input type='text' value='".$arrayRes["Telefono"]."' class='form-control rp-telefono' disabled>
											</div>
											<div class='col'>
												<label for='' class='col-form-label'>Tiempo de conocerlo:</label>
												<input type='number' value='".$arrayRes["Tiempo_conocerlo"]."' class='form-control rp-tiempoc' disabled>
											</div>
										</div>
									</div>
								</div>
							</div>";
						}
						echo "</div>
						<div class='row justify-content-md-center mt-3 mb-3 d-none' id='boton-agregar-rp'>
							<div class='col col-lg-2'>
								<button type='button' class='btn bMT' data-toggle='modal' data-target='#modal_nuevo_referencia'>Agregar</button>
							</div>
						</div>
						<div class='row justify-content-md-center mt-3 mb-3'>
							<div class='col col-lg-2'>
								<button   type='button' class='btn bMT' onclick=''>Modificar</button>
							</div>
							<div class='col col-lg-2'>
								<button type='button' class='btn bMT' id='guardar-referenciasp' disabled>Guardar</button>
							</div>
						</div>
						<div class='modal fade' id='modal_nuevo_referencia' tabindex='-1' role='dialog' aria-labelledby='titulo_nuevo_referencia' aria-hidden='true'>
							<div class='modal-dialog modal-lg' role='document'>
								<div class='modal-content'>
									<div class='modal-header'>
										<h5 class='modal-title' id='titulo_nuevo_referencia'>Agregar referencia</h5>
										<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									</div>
									<div class='modal-body'>
										<div class='row mx-1 mt-1'>
												<div class='col'>
													<label for='' class='col-form-label'>Nombre:</label>
													<input type='text' class='form-control ' id='rp-nombre-nuevo' disabled>
													<p class='text-danger d-none' id='nrperror'>Ingrese un nombre valido</p>
												</div>
												<div class='col'>
													<label for='' class='col-form-label'>Ocupación:</label>
													<input type='text' class='form-control ' id='rp-ocupacion-nuevo' disabled>
													<p class='text-danger d-none' id='orperror'>Ingrese una ocupación valida</p>
												</div>
											</div>
											<div class='row mx-1'>
												<div class='col'>
													<label for='' class='col-form-label'>Domicilio:</label>
													<input type='text' class='form-control ' id='rp-domicilio-nuevo' disabled>
													<p class='text-danger d-none' id='drperror'>Ingrese un domicilio valido</p>
												</div>
											</div>
											<div class='row mx-1'>
												<div class='col'>
													<label for='' class='col-form-label'>Telefono:</label>
													<input type='text' class='form-control ' id='rp-telefono-nuevo' disabled>
													<p class='text-danger d-none' id='trperror'>Ingrese un telefono valido</p>
												</div>
												<div class='col'>
													<label for='' class='col-form-label'>Tiempo de conocerlo:</label>
													<input type='number' class='form-control ' id='rp-tiempoc-nuevo' disabled>
													<p class='text-danger d-none' id='crperror'>Ingrese un valor valido</p>
												</div>
											</div>
									</div>
									<div class='modal-footer'>
										<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
										<button type='button' class='btn btn-primary' onclick='agregar_referencia()'>Guardar</button>
									</div>
								</div>
							</div>
						</div>";
$resultado->free();
$link->close();
