<?php

	header("Content-Type: text/html;charset=utf-8");
	$link = mysqli_connect("localhost","root","root","empleadossmt");
	$acentos = $link->query("SET NAMES 'utf8'");
	mysqli_close($link);
	include 'conmenu.php';
	$consulta =  "Select distinct puesto from puestos where Solicitado = 1 order by puesto ASC";
	$result = mysqli_query($link,$consulta) or die('Consulta fallida: ' .mysql_error());
	$array[] = "<option value=''>Selecciona una opción</option>";
	while ($line = mysqli_fetch_array($result, MYSQLI_NUM)) {
	    foreach ($line as $col_value) {
	        $array[] = "<option value='".$col_value."'>".$col_value."</option>";
	    }
	}
	$arrayLength = count($array);
	for($i = 0; $i<$arrayLength ; $i++){
		echo "$array[$i]";
	}

	mysqli_close($link);
?>