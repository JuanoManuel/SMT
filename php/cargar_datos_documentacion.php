<?php
include 'conmenu.php';

$idEmpleado = $_POST["idEmpleado"];
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

echo "<form action='php/guardar_datos_documentacion.php' method='POST'>
								<div class='row justify-content-between'>
								<div class='col-auto'>
									<div class='form-group'>
									<input type='hidden' value='" . $idEmpleado. "' name='idEmpleado'>
										<label for='inputCurp'>CURP</label>
										<input required='' value='" . $arrayRes["CURP"] . "' type='text' class='form-control' id='inputCurp' name='inputCurp'>
										<p id='error' class='d-none text-danger small'>CURP no valido</p>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for='inputAfore'>AFORE</label>
										<input type='text' maxlength='50' value='" . $arrayRes["Afore"] . "' class='form-control' id='inputAfore' name='inputAfore'>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for='inputPasaporte'>Pasaporte</label>
										<input type='text' maxlength='14' value='" . $arrayRes["Pasaporte"] . "' class='form-control' id='inputPasaporte' name='inputPasaporte'>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for='inputRFC'>RFC</label>
										<input required='' maxlength='13' value='" . $arrayRes["RFC"] . "' type='text' class='form-control' id='inputRFC' name='inputRFC'>
										<p class='d-none text-danger small'>RFC no valido</p>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group noSpinner'>
										<label for='inputNSS'>NSS</label>
										<input required='' maxlength='11' maxlength='20' type='number' value='" . $arrayRes["NSS"] . "' class='form-control' id='inputNSS' name='inputNSS'>
										<p class='d-none text-danger small'>Numero de seguro social no valido</p>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group noSpinner'>
										<label for='inputCartilla'>Cartilla Militar</label> <!--opcional-->";
										if($arrayRes["Cartilla_SM"] == ""){
											echo "<input type='text' class='form-control' id='inputCartilla' placeholder='Ejemplo: D-123456...' name='inputCartilla'>";
										}else{
											echo "<input type='text' value='" . $arrayRes["Cartilla_SM"] . "' class='form-control' id='inputCartilla' placeholder='Ejemplo: D-123456...' name='inputCartilla'>";
										}

										echo "<p class='d-none text-danger small'>Matricula no valida</p>
									</div>
								</div>
							</div>
							<div class='row'>";
								if($arrayRes["Documento_extranjero"]==""){
									echo "<div class='col-auto'>
										<div class='form-check'>
											<input type='checkbox' name='checkExtranjero' id='checkExtranjero' value='Si'>
											<label for='checkExtranjero' class='unselection'>¿Es extranjero?</label>
										</div>
									</div>
									<div class='col-9'>
										<div class='form-group'>
											<label for='inputDocExtranjero'>Documentos que le permiten trabajar en el pais</label>
											<input type='text' disabled='' class='form-control validarTexto' maxlength='80' id='inputDocExtranjero' name='inputDocExtranjero'>
										</div>
									</div>";
								}else{
									echo "<div class='col-auto'>
										<div class='form-check'>
											<input type='checkbox' name='checkExtranjero' id='checkExtranjero' value='Si' checked>
											<label for='checkExtranjero' class='unselection'>¿Es extranjero?</label>
										</div>
									</div>
									<div class='col-9'>
										<div class='form-group'>
											<label for='inputDocExtranjero'>Documentos que le permiten trabajar en el pais</label>
											<input type='text' value='" . $arrayRes["Documento_extranjero"] . "' disabled='' class='form-control validarTexto' maxlength='80' id='inputDocExtranjero' name='inputDocExtranjero'>
										</div>
									</div>";
								}
							echo "</div>
							<div class='row'>
								<div class='col-auto'>
									<div class='form-check'>";
									if($arrayRes["Licencia_Manejo"]==""){
										echo "<input type='checkbox' name='checkLicencia' id='checkLicencia' value='Si'>";
									}else{
										echo "<input type='checkbox' name='checkLicencia' id='checkLicencia' value='Si' checked>";
									}
										echo "<label for='checkLicencia' class='unselection'>¿Tiene licencia de manejo?</label>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for='inputTipoLicencia'>Tipo de Licencia</label>
										<select id='inputTipoLicencia' disabled='' name='inputTipoLicencia' class='form-control'>";
										switch ($arrayRes["Tipo_licencia_manejo"]) {
											case 'A':
												echo "<option>Selecciona una opción</option>
												<option value='Menor'>Menores de edad</option>
												<option value='A' selected>Tipo A</option>
												<option value='B'>Tipo B</option>
												<option value='C'>Tipo C</option>
												<option value='D'>Tipo D</option>";
												break;
											case 'B':
												echo "<option>Selecciona una opción</option>
												<option value='Menor'>Menores de edad</option>
												<option value='A'>Tipo A</option>
												<option value='B' selected>Tipo B</option>
												<option value='C'>Tipo C</option>
												<option value='D'>Tipo D</option>";
												break;
											case 'C':
												echo "<option>Selecciona una opción</option>
												<option value='Menor'>Menores de edad</option>
												<option value='A'>Tipo A</option>
												<option value='B'>Tipo B</option>
												<option value='C' selected>Tipo C</option>
												<option value='D'>Tipo D</option>";
												break;
											case 'D':
												echo "<option>Selecciona una opción</option>
												<option value='Menor'>Menores de edad</option>
												<option value='A'>Tipo A</option>
												<option value='B'>Tipo B</option>
												<option value='C'>Tipo C</option>
												<option value='D' selected>Tipo D</option>";
												break;
											case 'Menor':
												echo "<option>Selecciona una opción</option>
												<option value='Menor' selected>Menores de edad</option>
												<option value='A'>Tipo A</option>
												<option value='B'>Tipo B</option>
												<option value='C'>Tipo C</option>
												<option value='D'>Tipo D</option>";
												break;
											default:
												echo "<option selected>Selecciona una opción</option>
												<option value='menor'>Menores de edad</option>
												<option value='A'>Tipo A</option>
												<option value='B'>Tipo B</option>
												<option value='C'>Tipo C</option>
												<option value='D'>Tipo D</option>";
												break;
										}
										echo "</select>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group noSpinner'>
										<label for='inputLicencia'>Numero de licencia</label>
										<input type='text' maxlength='10' value='" . $arrayRes["Licencia_Manejo"] . "' disabled='' class='form-control' id='inputLicencia' name='inputLicencia'>
									</div>
								</div>
							</div>
						<div class='row justify-content-md-center mt-2 mb-3'>
							<div class='col col-lg-2'>
								<button type='button' class='btn bMT' id='mod_doc' onclick='habilitar_datos_documentacion()'>Modificar</button>
							</div>
							<div class='col col-lg-2'>
								<button type='submit' class='btn bMT' id='guardar_doc' disabled>Guardar</button>
							</div>
						</div>
						</form>";
$resultado->free();
$link->close();
