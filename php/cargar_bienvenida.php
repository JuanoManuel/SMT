<?php

/*
@file cargar_datos_personales.php
@author Cedillo Gonzalez Jorge Arturo, Hernandez Hernandez Juan Manuel, Paredes Rivas Alberto
@date 25/01/2017
@brief Se imprime la sección de Datos Personales del empleado, cargando toda su información de la base de datos
*/
session_start();
include 'conmenu.php';

if(isset($_SESSION["idEmpleado"])){
	$idEmpleado=$_SESSION["idEmpleado"];
}
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
echo "<h2 class='mt-2 mb-3'>Bienvenido</h2>
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
												<input type='text' maxlength='10' value='" . $idEmpleadoMostrar . "' class='form-control' name='idEmpleado' disabled>
											</div>
										</div>
										<div class='col-6'>
											<div class='form-group'>
												<label for=''>Puesto:</label>
												<select id='inputPuesto' class='form-control' name='inputPuesto' required=''disabled>
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
												<input type='date' value='" . $arrayRes["Fecha_registro"] . "' class='form-control' name='inputFechaR' disabled>
											</div>
										</div>
										<div class='col-6'>
											<div class='form-group'>
												<label for=''>Fecha de contratación:</label>
												<input type='date' value='" . $arrayRes["Fecha_contratacion"] . "' class='form-control' name='inputFechaC' disabled>
											</div>
										</div>
										<div class='col-6'>
											<div class='form-group'>
												<label for=''>Sueldo:</label>
												<input type='text' value='" . $arrayRes["Sueldo_esperado"] . "' class='form-control validarNumero' maxlength='10' name='inputSueldoE' disabled>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class='form-row justify-content-between'>
								<div class='col-auto'>
									<div class='form-group'>
										<label for=''>Apellido Paterno:</label>
										<input type='text' maxlength='45' value='" . $arrayRes["ApellidoP"] . "' class='form-control validarTexto' name='inputApellidoP' disabled>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for=''>Apellido Materno:</label>
										<input type='text' maxlength='45' value='" . $arrayRes["ApellidoM"] . "' class='form-control validarTexto' name='inputApellidoM' disabled>
									</div>
								</div>
								<div class='col-auto'>
									<div class='form-group'>
										<label for=''>Nombre(s):</label>
										<input type='text' maxlength='45' value='" . $arrayRes["Nombre"] . "' class='form-control validarTexto' name='inputNombre' disabled>
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
										<input required type='email' value='" . $arrayRes["Correo"] . "' name='inputCorreo' class='form-control' placeholder='Correo' aria-label='Correo' aria-describedby='addon-correo' disabled>
									</div>
								</div>
								<div class='col-2'>
									<div class='form-group'>
										<label for=''>Edad:</label>
										<input type='number' min='15' max='60' value='" . $arrayRes["Edad"] . "' class='form-control' name='inputEdad' disabled>
									</div>
								</div>
								<div class='col-2'>
									<div class='form-group'>
										<label for=''>Sexo:</label>
										<select required='' class='form-control' id='inputSexo' name='inputSexo' disabled>";
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
								<div class='col-4'>
									<div class='form-group'>
										<label for=''>Orientación sexual</label>
										<select required='' name='inputOrientacionSexual' id='inputOrientacionSexual' class='form-control' disabled>";
										switch ($arrayRes["Orientacion_sexual"]) {
											case 'Heterosexual':
												echo "<option value=''>Seleccione una opcion</option>
												<option value='Heterosexual' selected>Heterosexual</option>
												<option value='Homosexual'>Homosexual</option>
												<option value='Bisexual'>Bisexual</option>
												<option value='Otros'>Otros</option>";
												break;
											case 'Homosexual':
												echo "<option value=''>Seleccione una opcion</option>
												<option value='Heterosexual'>Heterosexual</option>
												<option value='Homosexual' selected>Homosexual</option>
												<option value='Bisexual'>Bisexual</option>
												<option value='Otros'>Otros</option>";
												break;
											case 'Bisexual':
												echo "<option value=''>Seleccione una opcion</option>
												<option value='Heterosexual'>Heterosexual</option>
												<option value='Homosexual'>Homosexual</option>
												<option value='Bisexual' selected>Bisexual</option>
												<option value='Otros'>Otros</option>";
												break;
											case 'Otros':
												echo "<option value=''>Seleccione una opcion</option>
												<option value='Heterosexual'>Heterosexual</option>
												<option value='Homosexual'>Homosexual</option>
												<option value='Bisexual'>Bisexual</option>
												<option value='Otros' selected>Otros</option>";
											default:
												echo "<option value='' selected>Seleccione una opcion</option>
												<option value='Heterosexual'>Heterosexual</option>
												<option value='Homosexual'>Homosexual</option>
												<option value='Bisexual'>Bisexual</option>
												<option value='Otros'>Otros</option>";
												break;
										}
										echo "</select>
									</div>
								</div>
							</div>";
// Se liberan los recursos de la base de datos y se cierra la conexión
$resultado->free();
$link->close();
