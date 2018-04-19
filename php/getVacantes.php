<?php

	header("Content-Type: text/html;charset=utf-8");
	$link = mysqli_connect("localhost","root","root","empleadossmt");
	$acentos = $link->query("SET NAMES 'utf8'");
	mysqli_close($link);
	include 'conmenu.php';


	/*
	* @brief Abre y cierra una conexion con la base de datos para generar una consulta
	* @param query es el query que se va a ejecutar
	* @return retorna un array con el resultado del query ejecutado 
	*/
	function consultar($query){
		//Se abre una conexion
		$link = mysqli_connect("localhost","root","root","empleadossmt");
		$consulta =  mysqli_query($link,$query);			//Se ejecuta el qy¿uery
		$boolean=false;
		while ($line = mysqli_fetch_array($consulta, MYSQLI_NUM)) { 	//obtiene una fila de la tabla resultante
		    foreach ($line as $col_value) {
		    	$boolean=true;
		        $array[] = $col_value;				//el valor lo asignamos a un array
		    }
		}
		$consulta->free();
		mysqli_close($link); 		//se cierra la conexion
		if ($boolean) {
			return $array;
		}else{
			return "no";
		}		//returnamos el array con los valor de la consulta
	}

	$consulta =  consultar("SELECT puesto FROM puestos WHERE Solicitado = 1 ORDER BY puesto ASC");
	if($consulta != "no"){
		$arrayLength = count($consulta);
		for($i = 0; $i<$arrayLength ; $i++){
			if($i<($arrayLength-1))
				echo "$consulta[$i],";
			else
				echo "$consulta[$i]";
		}
	}
?>