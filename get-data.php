<?php
include 'conmenu.php';
$sql_query = "SELECT idEmpleado, Nombre, ApellidoP, ApellidoM, Edad FROM empleado ;
$resultset = mysqli_query($conexion, $sql_query) or die("database error:". mysqli_error($conexion));
$developer_records = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
$developer_records[] = $rows;
}
 ?>
