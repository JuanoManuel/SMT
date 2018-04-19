<?php
	header("Content-Type: text/html;charset=utf-8");

	include 'conmenu.php';
	$consulta =  "select nombre from nacionalidad order by nombre asc";
	$result = mysqli_query($link,$consulta) or die('Consulta fallida: ' .mysql_error());
	$array[] = "<option value=''>Seleccione una opción</option>";
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