<?php
/*
@file listar_empleados.php
@author Paredes Rivas Alberto
@date 23/01/2017
@brief Este archivo se encarga de consultar la lista de empleados existentes en la empresa y las despliega en una tabla
con un boton para poder visualizar y editar su información
*/

include 'conmenu.php';

$resultado;
$sql="SELECT idEmpleado, RFC, Nombre, ApellidoP, ApellidoM, Puesto_solicitado, Estatus FROM empleado";
//Verificamos que se haya ejecutado la consulta
if(!$resultado = $link->query($sql)){
	echo "<p class='text-center'>Lo sentimos, el sitio web esta experimentando problemas</p>";
	exit;
}
//Verificamos que el resultado de nuestra consulta no este vacio
if($resultado->num_rows === 0){
	echo "<p class='text-center'>No hay empleados registrados</p>";
	exit;
}

// En caso de no encontrar ningun error, procedemos a construir la estructura de la tabla donde se visualizara la información
echo "<table class='table table-hover table-responsive' id='tablaLaWebera'>
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
// Hacemos un ciclo que nos permita mostrar a todos los empleados
while($arrayRes = $resultado->fetch_assoc()){
	$clave=$arrayRes["idEmpleado"];
	$clave=substr($clave,0,-2);
	echo "<tr>
	<td>" . $clave . "</td>
	<td>" . $arrayRes["RFC"] . "</td>
	<td>" . $arrayRes["Nombre"] . " " . $arrayRes["ApellidoP"] . " " . $arrayRes["ApellidoM"] . "</td>
	<td>" . $arrayRes["Puesto_solicitado"] ."</td>
	<td>" . $arrayRes["Estatus"] ."</td>
	<td class='text-center'><a href='menuDatos.php?idEmpleado=".$arrayRes["idEmpleado"]."'><i class='material-icons'>exit_to_app</i></a></td>
	</tr>";
}

echo "</tbody></table>";
// Liberamos los recursos de la base de datos
$resultado->free();
$link->close();
