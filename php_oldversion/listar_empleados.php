<?php
include 'conmenu.php';

$resultado;
$sql="SELECT idEmpleado, RFC, Nombre, ApellidoP, ApellidoM, Puesto_solicitado, Estatus FROM empleado";
if(!$resultado = $link->query($sql)){
	echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
	exit;
}
if($resultado->num_rows === 0){
	echo "<p class='text-center'>No hay empleados registrados</p>";
	exit;
}

echo "<table class='table table-hover' >
<caption>Lista de empleados</caption>
<thead>
<tr>
<th>Clave</th>
<th>RFC</th>
<th>Nombre</th>
<th>Puesto</th>
<th>Estado</th>
<th>Detalles</th>
</tr>
</thead>
<tbody>";
while($arrayRes = $resultado->fetch_assoc()){
	echo "<tr>
	<td>" . $arrayRes["idEmpleado"] . "</td>
	<td>" . $arrayRes["RFC"] . "</td>
	<td>" . $arrayRes["Nombre"] . " " . $arrayRes["ApellidoP"] . " " . $arrayRes["ApellidoM"] . "</td>
	<td>" . $arrayRes["Puesto_solicitado"] ."</td>
	<td>" . $arrayRes["Estatus"] ."</td>
	<td class='text-center'><a href='menuDatos.php?idEmpleado=" . $arrayRes["idEmpleado"] . "' ><i class='material-icons'>exit_to_app</i></a></td>
	</tr>";
}

echo "</tbody></table>";
$resultado->free();
$link->close();
?>