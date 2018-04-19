<?php
	header("Content-Type: text/html;charset=utf-8");

	include 'conmenu.php';

	$colonia=$_REQUEST['colonia'];
	$municipio=$_REQUEST['municipio'];
	$estado=$_REQUEST['estado'];
	$CP=$_REQUEST['CP'];

	$consulta =  "select idDirecciones from direcciones where colonia='".$colonia."' && municipio='".$municipio."' && estado='".$estado."' && CP='".$CP."'";
	$result = mysqli_query($link,$consulta) or die('Consulta fallida: ' .mysqli_error($link));
	while ($line = mysqli_fetch_array($result, MYSQLI_NUM)) {
	    foreach ($line as $col_value) {
	    	echo "$col_value";
	    }
	}

	mysqli_close($link);
?>