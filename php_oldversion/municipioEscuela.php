<?php
	header("Content-Type: text/html;charset=utf-8");

	$estado = $_REQUEST['estado'];
	include 'conmenu.php';
	$consulta =  "select distinct municipio from escuelas where estado='".$estado."' order by municipio asc";
	$result = mysqli_query($link,$consulta) or die('Consulta fallida: ' .mysql_error());
	$array[] = "<option value='default'>Selecciona una opción</option>";
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