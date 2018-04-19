<?php
	header("Content-Type: text/html;charset=utf-8");

	include 'conmenu.php';

	$nivel=$_REQUEST['nivel'];
	$estado=$_REQUEST['estado'];
	$municipio=$_REQUEST['municipio'];
	$nombre=$_REQUEST['nombre'];

	$consulta = "select idEscuelas from escuelas where Nivel_educativo='".$nivel."' && estado='".$estado."' && municipio='".$municipio."' && nombre='".$nombre."'";
	$result = mysqli_query($link,$consulta) or die('Consulta fallida: ' .mysql_error());
while ($line = mysqli_fetch_array($result, MYSQLI_NUM)) {
    foreach ($line as $col_value) {
        $array[] = $col_value;
    }
}
echo "$array[0]";

mysqli_close($link);
?>