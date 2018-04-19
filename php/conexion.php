<?php
/*
@file conexion.php
@author Cedillo González Jorge
@brief Archivo que hace la conexion con la base de datos MySQL
@date 11/01/2018
*/
$conexion = mysqli_connect("localhost", "root","MarkTac","empleadossmt");
$acentos = $conexion->query("SET NAMES 'utf8'");

if(!$conexion){
	echo "<p class='text-center text-center'>Error al conectar a la base de datos</p>";
	exit;
}
else{
	// echo 'Conectado a la base de datos';
}
