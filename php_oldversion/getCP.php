<?php
	header("Content-Type: text/html;charset=utf-8");

	include 'conmenu.php';

	$colonia=$_REQUEST['colonia'];
	$municipio=$_REQUEST['municipio'];
	$estado=$_REQUEST['estado'];
	$consulta =  "select CP from direcciones where colonia='".$colonia."' && municipio='".$municipio."' && estado='".$estado."'";
	$result = mysqli_query($link,$consulta) or die('Consulta fallida: ' .mysqli_error($link));
	while ($line = mysqli_fetch_array($result, MYSQLI_NUM)) {
	    foreach ($line as $col_value) {
	    	echo "<option>".$col_value."</option>";
	    }
	}

	mysqli_close($link);
?>