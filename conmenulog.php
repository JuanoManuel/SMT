<?php
session_start();//Inicio de una sesion (necesaria para variables de sesion).
$conexion = mysqli_connect("localhost", "root","root","empleadossmt");
$acentos = $conexion->query("SET NAMES 'utf8'");

if(!$conexion){
	//echo '	Error al conectar a la base de datos ';
}
else{
	//echo 'Conectado a la base de datos';
}