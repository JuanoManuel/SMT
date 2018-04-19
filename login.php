<?php
session_start();
include 'conmenulog.php';
$idEmpleado=mysqli_real_escape_string($conexion,$_POST["Usuario"]);
$contra=mysqli_real_escape_string($conexion,$_POST["Contra"]);
$query="SELECT * FROM empleado WHERE Contrasena COLLATE utf8_bin ='$contra' AND Nivel='2' AND rfc COLLATE utf8_bin ='$idEmpleado' ORDER BY idempleado DESC";
// echo $query;

if(!$resultado=$conexion->query($query)){
	$_SESSION["login-status"]="error-conexion";
	//echo "<p>Error con1</p>";
	header("location: index.php");
	exit;
}

if($resultado->num_rows === 0){
	$query="SELECT * FROM empleado WHERE Contrasena COLLATE utf8_bin ='$contra' AND Nivel='1' AND rfc COLLATE utf8_bin ='$idEmpleado' ORDER BY idempleado DESC";
	if(!$resultado2=$conexion->query($query)){
		$_SESSION["login-status"]="error-conexion";
		//echo "<p>Error con2</p>";
		header("location: index.php");
		exit;
	}
	if($resultado2->num_rows===0){
		$query="SELECT * FROM empleado WHERE Contrasena COLLATE utf8_bin='$contra' AND Nivel='3' AND rfc COLLATE utf8_bin='$idEmpleado' ORDER BY idempleado DESC";
		if(!$resultado3=$conexion->query($query)){
			$_SESSION["login-status"]="error-conexion";
			//echo "<p>Error con3</p>";
			header("location: index.php");
			exit;
		}
		if($resultado3->num_rows===0){
			$_SESSION["login-status"]="error-autentication";
			//echo "<p>Error aut</p>";
			header("location: index.php");
			exit;
		}
		$arrayRes=$resultado3->fetch_array();
		$_SESSION["idEmpleado"]=$arrayRes["idEmpleado"];
		$_SESSION["Nombre"]=$arrayRes["Nombre"];
		$_SESSION["ApellidoP"]=$arrayRes["ApellidoP"];
		$_SESSION["ApellidoM"]=$arrayRes["ApellidoM"];
		$_SESSION["Nivel"]=$arrayRes["Nivel"];
		//echo "<p>login3</p>";
		header("location: menu.html");
		exit;
	}
	$arrayRes=$resultado2->fetch_array();
	$_SESSION["idEmpleado"]=$arrayRes["idEmpleado"];
	$_SESSION["Nombre"]=$arrayRes["Nombre"];
	$_SESSION["ApellidoP"]=$arrayRes["ApellidoP"];
	$_SESSION["ApellidoM"]=$arrayRes["ApellidoM"];
	$_SESSION["Nivel"]=$arrayRes["Nivel"];
	//echo "<p>login2</p>";
	header("location: menu.html");
	exit;
}
$arrayRes=$resultado->fetch_array();
$_SESSION["idEmpleado"]=$arrayRes["idEmpleado"];
$_SESSION["Nombre"]=$arrayRes["Nombre"];
$_SESSION["ApellidoP"]=$arrayRes["ApellidoP"];
$_SESSION["ApellidoM"]=$arrayRes["ApellidoM"];
$_SESSION["Nivel"]=$arrayRes["Nivel"];
header("location: menu.html");
//echo "<p>login1</p>";
exit;
?>