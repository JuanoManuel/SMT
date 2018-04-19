<?php

header("Content-Type: text/html;charset=utf-8");

include 'conmenu.php'; //Se importa todo el codigo para relizar la conexion con la base de datos
$puestos = json_decode($_POST["puestos"]);
$vacantes = json_decode($_POST["vacantes"]);
 
echo var_dump($puestos);
echo var_dump($vacantes);
$consulta = "SELECT puesto FROM puestos";
$result = mysqli_query($link,$consulta) or die("Consulta fallida: ".mysqli_error($link));
while($line = mysqli_fetch_array($result, MYSQLI_NUM)){
	foreach ($line as $col_value) {
		$puestosTotales[] = $col_value;
	}
}

/*$consulta = "SELECT puesto FROM puestos WHERE Solicitado = 1";
$result = mysqli_query($link,$consulta) or die("Consulta fallida: ".mysql_error());
while($line = mysqli_fetch_array($result, MYSQLI_NUM)){
	foreach ($line as $col_value) {
		$vacantesActuales[] = $col_value;
	}
}*/

$flag = 0;
$lengthPuestos = count($puestos);
$lengthVacantes = count($vacantes);
$lengthPuestosTotales = count($puestosTotales);
for($i=0;$i<$lengthPuestos;$i++){
	//buscar todos puesto en la lista de puestos e indicar que no es solicitado
	//significado de los valores de la bandera flag:
	// 0 = valor inicial/no encontro puesto, 1 = encontro puesto
	$flag = 0;
	for($j=0;$j<$lengthPuestosTotales;$j++){
		if($puestos[$i]==$puestosTotales[$j]){
			$consulta = "UPDATE puestos SET Solicitado = 0 WHERE puesto='".$puestos[$i]."'";
			mysqli_query($link, $consulta) or die("Error al hacer update puestos: ".mysqli_error($link));
			$flag = 1;
		}
	}
	if($flag==0){ //los que no se encuentren, seran agregados a la base de datos
		$consulta = "INSERT INTO puestos(Puesto,Solicitado) VALUES ('".$puestos[$i]."',0)";
		mysqli_query($link,$consulta) or die("Error al crear nuevo puesto ".mysqli_error($link));
	}
}

for($i=0;$i<$lengthVacantes;$i++){
	//busca todas las vacantes en la lista de puestos e indicar si es solicitado
	$flag = 0;
	for($j=0;$j<$lengthPuestosTotales;$j++){
		if($vacantes[$i]==$puestosTotales[$j]){
			$consulta = "UPDATE puestos SET Solicitado = 1 WHERE puesto='".$vacantes[$i]."'";
			mysqli_query($link, $consulta) or die("Error al hacer update puestos: ".mysqli_error($link));
			$flag = 1;
		}
	}
	if($flag==0){ //los que no se encuentren, seran agregados a la base de datos
		$consulta = "INSERT INTO puestos(Puesto,Solicitado) VALUES ('".$vacantes[$i]."',1)";
		mysqli_query($link,$consulta) or die("Error al crear nuevo puesto ".mysqli_error($link));
	}
}

// se actualizan todos los tamaños ya que se agregaron o quitaron elementos
$lengthPuestosTotales = count($puestosTotales);
if($lengthPuestos>0){ // si hay puestos en la lista de puestos
	//Busca si todos los puestos de la base de datos estan en la lista de vacantes y puestos si no borra el registro
	$flag = 0;
	//primero busca en la lista de puestos
	for($i=0;$i<$lengthPuestosTotales;$i++){
		echo "Buscando: ".$puestosTotales[$i];
		echo "[Buscando en Puestos]";
		for($j=0;$j<$lengthPuestos && $flag!=1;$j++){
			echo "[".$puestos[$j]."==".$puestosTotales[$i]."]";
			if($puestos[$j]==$puestosTotales[$i]){
				echo "[puesto encontrado]";
				$flag = 1;
			}
		}
		if($flag != 1){
			echo "[puesto no encontrado en puestos]";
			echo "[buscando en vacantes]";
			for($j=0;$j<$lengthVacantes;$j++){
				echo "[".$vacantes[$j]."==".$puestosTotales[$i]."]";
				if($vacantes[$j]==$puestosTotales[$i]){
					echo "[puesto encontrado]";
					$flag = 1;
				}
			}
		}
		if($flag != 1){
			echo "[Borrando: $puestosTotales[$i]]";
			$consulta = "DELETE FROM puestos WHERE puesto='".$puestosTotales[$i]."'";
			mysqli_query($link,$consulta) or die("Error al borrar puesto ".mysqli_error($link));
		}
		$flag = 0;
	}
	//si aun no lo encuentra lo buscara en la lista de vacantes
}




mysqli_close($link);

?>