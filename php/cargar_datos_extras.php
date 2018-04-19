<?php 

include "conmenu.php";
$idEmpleado=$_POST["idEmpleado"];
$query="SELECT * FROM empleado WHERE idEmpleado='$idEmpleado'";

if(!$resultado = $link->query($query)){
	echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
	exit;
}

if($resultado->num_rows === 0){
	echo "<p class='text-center'>Error el recuperar el empleado con el id proporcionado</p>";
	exit;
}

$arrayRes=$resultado->fetch_assoc();
echo "<h2>Datos Extras</h2>
						<div class='row justify-content-around'>
							<div class='col-4'>
								<div class='form-group'>
									<label for='inputTallaCamisa'>Talla de Camisa</label>
									<select required='' class='form-control' name='inputTallaCamisa' id='inputTallaCamisa'>";
									switch ($arrayRes["Tallac"]) {
										case 'Chica':
											echo "<option value=''>Seleccione una opción</option>
											<option value='Chica' selected>Chica</option>
											<option value='Mediana'>Mediana</option>
											<option value='Grande'>Grande</option>";
											break;
										case 'Mediana':
											echo "<option value=''>Seleccione una opción</option>
											<option value='Chica'>Chica</option>
											<option value='Mediana' selected>Mediana</option>
											<option value='Grande'>Grande</option>";
											break;
										case 'Grande':
											echo "<option value=''>Seleccione una opción</option>
											<option value='Chica'>Chica</option>
											<option value='Mediana'>Mediana</option>
											<option value='Grande' selected>Grande</option>";
											break;
										default:
											echo "<option value='' selected>Seleccione una opción</option>
											<option value='Chica'>Chica</option>
											<option value='Mediana'>Mediana</option>
											<option value='Grande'>Grande</option>";
											break;
									}	
									echo "</select>
								</div>
							</div>
							<div class='col-4'>
								<div class='form-group noSpinner'>
									<label for='inputTallaPantalon'>Talla de Pantalon</label>
									<input required='' type='number' value='".$arrayRes["Tallap"]."' class='form-control' min='0' max='60' value='' id='inputTallaPantalon' name='inputTallaPantalon'>
								</div>
							</div>
							<div class='col-auto'>
								<div class='form-group'>
									<label for='inputPastel'>Pastel Favorito</label>
									<input required='' type='text' value='".$arrayRes["Pastelf"]."' name='inputPastel' id='inputPastel' class='form-control'>
								</div>
							</div>
						</div>
						<div class='row justify-content-around'>
							<div class='col-4'>
								<div class='form-group'>
									<label for='inputGelatina'>Gelatina Favorita</label>
									<input required='' type='text' value='".$arrayRes["Gelatinaf"]."' name='inputGelatina' id='inputGelatina' class='form-control'>
								</div>
							</div>
							<div class='col-4'>
								<div class='form-group'>
									<label for='inputColor'>Color Favorito</label>
									<input required='' type='text' value='".$arrayRes["Colorf"]."' name='inputColor' id='inputColor' class='form-control'>
								</div>
							</div>
							<div class='col-auto'>
								<div class='form-group'>
									<label for='inputComida'>Comida Favorita</label>
									<input required='' type='text' value='".$arrayRes["Comidaf"]."' name='inputComida' id='inputComida' class='form-control'>
								</div>
							</div>
						</div>";
						$face="";
						$insta="";
						$twitter="";
						$youtube="";
						$query3="SELECT empleado_redes.fkRedsocial,empleado_redes.Cuenta FROM empleado,empleado_redes,redes_sociales WHERE empleado.idEmpleado=empleado_redes.fkEmpleado AND redes_sociales.idRedSocial=empleado_redes.fkRedsocial AND empleado.idEmpleado='$idEmpleado'";
						if (!$resultado3=$link->query($query3)) {
							echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
							exit;
						}
						while ($arrayRes3=$resultado3->fetch_assoc()) {
							switch ($arrayRes3["fkRedsocial"]) {
								case "1":
									$face=$arrayRes3["Cuenta"];
									break;
								case "2":
									$twitter=$arrayRes3["Cuenta"];
									break;
								case "3":
									$insta=$arrayRes3["Cuenta"];
									break;
								case "4":
									$youtube=$arrayRes3["Cuenta"];
									break;
							}
						}

						echo "<div class='row justify-content-around'>
							<div class='col-6'>
								<div class='form-group'>
									<label for='inputGelatina'>Facebook</label>
									<input required='' type='text' value='".$face."' name='inputGelatina' id='inputGelatina' class='form-control'>
								</div>
							</div>
							<div class='col-6'>
								<div class='form-group'>
									<label for='inputColor'>Youtube</label>
									<input required='' type='text' value='".$youtube."' name='inputColor' id='inputColor' class='form-control'>
								</div>
							</div>
							<div class='col-6'>
								<div class='form-group'>
									<label for='inputComida'>Twitter</label>
									<input required='' type='text' value='".$twitter."' name='inputComida' id='inputComida' class='form-control'>
								</div>
							</div>
							<div class='col-6'>
								<div class='form-group'>
									<label for='inputComida'>Instagram</label>
									<input required='' type='text' value='".$insta."' name='inputComida' id='inputComida' class='form-control'>
								</div>
							</div>
						</div>
						<div class='row justify-content-start ml-3'>
							<div class='col-auto'>
								<div class='row'>Contactos de Emergencia</div>
								<div class='row'>
									<table id='tablaContactos' class='table table-striped table-responsive tabla'>
										<thead class='thead-dark'>
											<th>Nombre</th>
											<th>Parentesco</th>
											<th>Telefono</th>
										</thead>
										<tbody>";
										$query2="SELECT * FROM contacto_emergencia WHERE fkEmpleado='$idEmpleado'";
										if(!$resultado2 = $link->query($query2)){
											echo "<tr><td class='text-center' col-span='3'>Lo sentimos, el sitio web esta experimentando problemas</td></tr>";
											exit;
										}

										if($resultado2->num_rows === 0){
											echo "<tr><td class='text-center' col-span='3'>Sin contactos de emergencia</td></tr>";
											exit;
										}
										while ($arrayRes2=$resultado2->fetch_assoc()) {
											echo "<tr>
												<td><input type='text' value='".$arrayRes2["Nombre"]."' name='NombreCE1' id='NombreCE1' class='form-control NombreCE'></td>
												<td><input type='text' value='".$arrayRes2["Parentesco"]."' name='ParentescoCE1' id='ParentescoCE1' class='form-control'></td>
												<td class='noSpinner'><input type='number' value='".$arrayRes2["Telefono"]."' name='TelefonoCE1' id='TelefonoCE1' class='form-control'></td>
											</tr>";
										}
											echo "
										</tbody>
									</table>										
								</div>
							</div>
						</div>
						<div class='row justify-content-md-center mt-2 mb-3'>
							<div class='col col-lg-2'>
								<button type='button' class='btn bMT' id='mod_dex' onclick=''>Modificar</button>
							</div>
							<div class='col col-lg-2'>
								<button type='button' class='btn bMT' id='guardar_dex' disabled>Guardar</button>
							</div>	
						</div>";
$resultado->free();
$resultado2->free();
$link->close();