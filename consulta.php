<?php

	header("Content-Type: text/html;charset=utf-8");

	$link = mysqli_connect("localhost","root","root","empleadossmt") or die("No se pudo conectar: " .mysql_error());
	$acentos = $link->query("SET NAMES 'utf8'");
	$consulta = "select nombre from empleado where idEmpleado = 'HEHJN54N09'";
	$result = mysqli_query($link,$consulta) or die('Consulta fallida: ' .mysql_error());
while ($line = mysqli_fetch_array($result, MYSQLI_NUM)) {
    foreach ($line as $col_value) {
    	echo "$col_value";
    }
}

mysqli_close($link);

?>