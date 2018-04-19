<?php 
session_start();
include "conmenu.php";

$idEmpleado=mysqli_real_escape_string($link,$_POST["idEmpleado"]);
$curp=mysqli_real_escape_string($link,$_POST["inputCurp"]);
$afore=mysqli_real_escape_string($link,$_POST["inputAfore"]);
$pasaporte=mysqli_real_escape_string($link,$_POST["inputPasaporte"]);
$rfc=mysqli_real_escape_string($link,$_POST["inputRFC"]);
$nss=mysqli_real_escape_string($link,$_POST["inputNSS"]);
$cartilla=mysqli_real_escape_string($link,$_POST["inputCartilla"]);
$extranjero=mysqli_real_escape_string($link,$_POST["inputExtranjero"]);
$tlicencia=mysqli_real_escape_string($link,$_POST["inputTipoLicencia"]);
$licencia=mysqli_real_escape_string($link,$_POST["inputLicencia"]);	

$query="UPDATE empleado SET CURP='$curp', Afore='$afore', Pasaporte='$pasaporte', RFC='$rfc', NSS='$nss', Cartilla_SM='$cartilla', Documento_extranjero='$extranjero', Tipo_licencia_manejo='$tlicencia', Licencia_manejo='$licencia' WHERE idEmpleado='$idEmpleado'";

echo $query;
if (!$resultado=$link->query($query)) {
	echo "<p>ERROR</p>";
	exit;
}

$_SESSION["tokenFrom"]=2;
header("location: ../menuDatos.php?idEmpleado=$idEmpleado");