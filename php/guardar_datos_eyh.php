<?php 
include "conmenu.php";

$idEmpleado=mysqli_real_escape_string($link,$_POST["idEmpleado"]);

$estadoSalud=mysqli_real_escape_string($link,$_POST["inputEstadoSalud"]);
$tipoSangre=mysqli_real_escape_string($link,$_POST["inputTipoSangre"]);

$pregunta1=mysqli_real_escape_string($link,$_POST["inputPreguntaSalud1"]);
$pregunta2=mysqli_real_escape_string($link,$_POST["inputPreguntaSalud2"]);
$pregunta3=mysqli_real_escape_string($link,$_POST["inputPreguntaSalud3"]);
$pregunta4=mysqli_real_escape_string($link,$_POST["inputPreguntaSalud4"]);
$pregunta5=mysqli_real_escape_string($link,$_POST["inputPreguntaSalud5"]);
$pregunta6=mysqli_real_escape_string($link,$_POST["inputPreguntaSalud6"]);
$pregunta7=mysqli_real_escape_string($link,$_POST["inputPreguntaSalud7"]);

$meta=mysqli_real_escape_string($link,$_POST["inputMetaVida"]);

$query="DELETE FROM empleado_comp WHERE idEmpleado='$idEmpleado'";

$query="INSERT INTO empleado (fkEmpleado,fkSH,Respuesta) VALUES ('$idEmpleado',1,'$inputPreguntaSalud1'),('$idEmpleado',2,'$inputPreguntaSalud7'),('$idEmpleado',3,'$inputPreguntaSalud6'),('$idEmpleado',4,'$estadoSalud'),('$idEmpleado',5,'$inputPreguntaSalud2'),('$idEmpleado',6,'$inputPreguntaSalud3'),('$idEmpleado',7,'$inputPreguntaSalud4'),('$idEmpleado',8,'$meta'),('$idEmpleado',9,'$tipoSangre'),('$idEmpleado',10,'$inputPreguntaSalud5')";