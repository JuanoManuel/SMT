<?php
	header("Content-Type: text/html;charset=utf-8");

	include 'conmenu.php';
	$consulta =  "select Idioma from Idioma order by Idioma asc";
	$result = mysqli_query($link,$consulta) or die('Consulta fallida: ' .mysql_error());
	while ($line = mysqli_fetch_array($result, MYSQLI_NUM)) {
	    foreach ($line as $col_value) {
	        $array[] = $col_value;
	    }
	}
	$arrayLength = count($array);
	for($i = 0; $i<$arrayLength ; $i++){
		if($i<($arrayLength-1))
			echo "$array[$i],";
		else
			echo "$array[$i]";
	}


	mysqli_close($link);
?>