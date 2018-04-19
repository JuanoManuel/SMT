<?php 
session_start();
$_SESSION["IDEMPL"]=$_GET["idEmpleado"];
header("location: generarImpresion.php");