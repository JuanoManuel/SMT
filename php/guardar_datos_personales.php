<?php 
session_start();
include "conmenu.php";

$idEmpleado=mysqli_real_escape_string($link,$_POST["idEmpleado"]);
$puesto=mysqli_real_escape_string($link,$_POST["inputPuesto"]);
$fechar=mysqli_real_escape_string($link,$_POST["inputFechaR"]);
$fechac=mysqli_real_escape_string($link,$_POST["inputFechaC"]);
$sueldoe=mysqli_real_escape_string($link,$_POST["inputSueldoE"]);
$apellidop=mysqli_real_escape_string($link,$_POST["inputApellidoP"]);
$apellidom=mysqli_real_escape_string($link,$_POST["inputApellidoM"]);
$nombre=mysqli_real_escape_string($link,$_POST["inputNombre"]);
$correo=mysqli_real_escape_string($link,$_POST["inputCorreo"]);
$edad=mysqli_real_escape_string($link,$_POST["inputEdad"]);
$sexo=mysqli_real_escape_string($link,$_POST["inputSexo"]);
$orientacion=mysqli_real_escape_string($link,$_POST["inputOrientacionSexual"]);
$direccion=mysqli_real_escape_string($link,$_POST["idDireccion"]);
$calle=mysqli_real_escape_string($link,$_POST["inputCalle"]);
$nacionalidad=mysqli_real_escape_string($link,$_POST["inputNacionalidad"]);
$noext=mysqli_real_escape_string($link,$_POST["inputNumExt"]);
$noint=mysqli_real_escape_string($link,$_POST["inputNumInt"]);
$estadoc=mysqli_real_escape_string($link,$_POST["inputEstadoC"]);
$lugarnac=mysqli_real_escape_string($link,$_POST["inputLugarNacimiento"]);
$fechanac=mysqli_real_escape_string($link,$_POST["inputFechaNacimiento"]);
$estatura=mysqli_real_escape_string($link,$_POST["inputEstatura"]);
$peso=mysqli_real_escape_string($link,$_POST["inputPeso"]);
$vivecon=mysqli_real_escape_string($link,$_POST["vivecon"]);
$depende1=mysqli_real_escape_string($link,$_POST["depende1"]);
$depende2=mysqli_real_escape_string($link,$_POST["depende2"]);
$depende3=mysqli_real_escape_string($link,$_POST["depende3"]);
$depende4=mysqli_real_escape_string($link,$_POST["depende4"]);
$depende5=mysqli_real_escape_string($link,$_POST["depende5"]);
$telefono=mysqli_real_escape_string($link,$_POST["notelefonos-dp"]);


$query="UPDATE empleado SET puesto_solicitado='$puesto', Fecha_registro='$fechar', Sueldo_esperado='$sueldoe', ApellidoP='$apellidop', ApellidoM='$apellidom', Nombre='$nombre', Correo='$correo', Edad=$edad, Sexo='$sexo', Orientacion_sexual='$orientacion', fkDirecciones='$direccion', calle='$calle', fkNacionalidad='$nacionalidad', No_ext='$noext', No_int='$noint', Estado_Civil='$estadoc', Lugar_nacimiento='$lugarnac', Fecha_nacimiento='$fechanac', Estatura='$estatura', Peso='$peso' WHERE idEmpleado='$idEmpleado'";

echo $query;
echo "<br>";

if (!$resultado=$link->query($query)) {
	echo "<p>ERROR</p>";
	exit;
}

$_SESSION["tokenFrom"]=1;
header("location: ../menuDatos.php?idEmpleado=$idEmpleado");
 ?>