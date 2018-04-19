<?php
	/**
	* @file impresion.php
	* @Author Jorge Arturo Cedillo González, Juan Manuel Hernández Hernández
	* @date 25/01/2018
	* @brief En este documento php se generara una pagina html que sera tranformada a PDF. Dicha pagina contiene toda la informacion de una 
	* solicitud de empleo que ya habia sido registrada y subida al sistema. Primero se definen todas la variables que necesitara mostrar el * documento PDf, para asignarle valores a cada una de las variables hacemos multiples consultas a la base de datos
	**/

	/**
	* NOTA: en los querys donde se hace uso de la sentencias ORDER BY es para que la respuesta de cada pregunta corresponda con su 
	* respectiva pregunta
	**/

	header("Content-Type: text/html;charset=utf-8");
	$link = mysqli_connect("localhost","root","root","empleadossmt");
	$acentos = $link->query("SET NAMES 'utf8'");
	mysqli_close($link);



	//Se inicia una sesion en el navegador
	//se le asigna el valor del id del empleado a la variable idEmp
	
	$idEmp=$_COOKIE["id"];
	
	unset($_COOKIE["id"]);
	
	//$idEmp = "PEMKBH5R08";
	//echo "$idEmp";
	 

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



	//Se ejecutan todas las consultar y se guardan en variables que se imprimiran en el html del documento pdf


	////////////////////////////////////////////////////////////////////////////////////////////
	//LLenado de datos personales
	///////////////////////////////////////////////////////////////////////////////////////////
	$nombre = consultar("SELECT nombre FROM empleado WHERE idEmpleado='".$idEmp."'");
	$apellidoP = consultar("SELECT apellidoP FROM empleado WHERE idEmpleado='".$idEmp."'");
	$apellidoM = consultar("SELECT apellidoM FROM empleado WHERE idEmpleado='".$idEmp."'");
	$nombre = $nombre[0]." ".$apellidoP[0]." ".$apellidoM[0];
	$puesto = consultar("SELECT puesto_solicitado FROM empleado WHERE idEmpleado='".$idEmp."'");
	$puesto = $puesto[0];
	$edad = consultar("SELECT edad FROM empleado WHERE idEmpleado='".$idEmp."'");
	$edad = $edad[0];
	$sueldo = consultar("SELECT sueldo_esperado FROM empleado WHERE idEmpleado='".$idEmp."'");
	$sueldo = $sueldo[0];
	$email = consultar("SELECT correo FROM empleado WHERE idEmpleado='".$idEmp."'");
	$email = $email[0];
	$sexo = consultar("SELECT sexo FROM empleado WHERE idEmpleado='".$idEmp."'");
	$sexo = $sexo[0];
	$orientacion_sexual = consultar("SELECT orientacion_sexual FROM empleado WHERE idEmpleado='".$idEmp."'");
	$orientacion_sexual = $orientacion_sexual[0];
	$estado_civil = consultar("SELECT estado_civil FROM empleado WHERE idEmpleado='".$idEmp."'");
	$estado_civil = $estado_civil[0];
	$lugar_nacimiento = consultar("SELECT Lugar_nacimiento FROM empleado WHERE idEmpleado='".$idEmp."'");
	$lugar_nacimiento = $lugar_nacimiento[0];
	$fecha_nacimiento = consultar("SELECT fecha_nacimiento FROM empleado WHERE idEmpleado='".$idEmp."'");
	$fecha_nacimiento = $fecha_nacimiento[0];
	$estatura = consultar("SELECT Estatura FROM empleado WHERE idEmpleado='".$idEmp."'");
	$estatura = $estatura[0];
	$peso = consultar("SELECT peso FROM empleado WHERE idEmpleado='".$idEmp."'");
	$peso = $peso[0];
	$tallac = consultar("SELECT tallac FROM empleado WHERE idEmpleado='".$idEmp."'");
	$tallac = $tallac[0];
	$tallap = consultar("SELECT tallap FROM empleado WHERE idEmpleado='".$idEmp."'");
	$tallap = $tallap[0];
	$pastelf = consultar("SELECT pastelf FROM empleado WHERE idEmpleado='".$idEmp."'");
	$pastelf = $pastelf[0];
	$vive_con = consultar("SELECT vive FROM vive_con WHERE fkEmpleado='".$idEmp."'");
	$vive_con = $vive_con[0];
	$dependientes = consultar("SELECT nombre FROM dependientes WHERE fkEmpleado='".$idEmp."'");
	$length = count($dependientes); //tamaño del arreglo $dependientes
	$result= ""; //variable donde se almacenaran todos los dependientes
	$lengthmenos = $length-1;
	for($i=0;$i<$length;$i++){
		if($i<$lengthmenos)
			$result .= $dependientes[$i].", "; //concatenacion de lo valores del array dependenetes
		else if($i==$lengthmenos)
			$result .= $dependientes[$i].".";
	}

	$estado = consultar("SELECT Estado FROM direcciones JOIN empleado ON idDirecciones=fkDirecciones WHERE idEmpleado='".$idEmp."'");
	$estado = $estado[0];
	$municipio = consultar("SELECT municipio FROM direcciones JOIN empleado ON idDirecciones=fkDirecciones WHERE idEmpleado='".$idEmp."'");
	$municipio = $municipio[0];
	$colonia = consultar("SELECT colonia FROM direcciones JOIN empleado ON idDirecciones=fkDirecciones WHERE idEmpleado='".$idEmp."'");
	$colonia = $colonia[0];
	$estado = consultar("SELECT Estado FROM direcciones JOIN empleado ON idDirecciones=fkDirecciones WHERE idEmpleado='".$idEmp."'");
	$estado = $estado[0];
	$calle = consultar("SELECT calle FROM empleado WHERE idEmpleado='".$idEmp."'");
	$calle = $calle[0];
	$cp = consultar("SELECT cp FROM direcciones JOIN empleado ON idDirecciones=fkDirecciones WHERE idEmpleado='".$idEmp."'");
	$cp = $cp[0];
	$no_ext = consultar("SELECT no_ext FROM empleado WHERE idEmpleado='".$idEmp."'");
	$no_ext = $no_ext[0];
	$no_int = consultar("SELECT no_int FROM empleado WHERE idEmpleado='".$idEmp."'");
	if($no_int[0]!="")  //si el empleado tiene numero interior lo muestra en el pdf
		$no_int = $no_int[0];
	else 				//en caso contrario mostrara un S/N
		$no_int = "S/N";
	$nacionalidad=consultar("SELECT nacionalidad.nombre FROM nacionalidad JOIN empleado ON fkNacionalidad=idNacionalidad WHERE idEmpleado='".$idEmp."'");
	$nacionalidad = $nacionalidad[0];
	$gelatinaf = consultar("SELECT gelatinaf FROM empleado WHERE idEmpleado='".$idEmp."'");
	$gelatinaf = $gelatinaf[0];
	$colorf = consultar("SELECT colorf FROM empleado WHERE idEmpleado='".$idEmp."'");
	$colorf = $colorf[0];
	$comidaf = consultar("SELECT comidaf FROM empleado WHERE idEmpleado='".$idEmp."'");
	$comidaf = $comidaf[0];

	/////////////////////////////////
	//LLenado de la tabla Telefonos//
	/////////////////////////////////
	$htmltelefono = "";
	$idTelefonos = consultar("SELECT idTelefono FROM telefono WHERE fkEmpleado='".$idEmp."'");
	$tipoTelefonos = consultar("SELECT tipo FROM telefono WHERE fkEmpleado='".$idEmp."'");
	$telefonos = consultar("SELECT Telefono FROM telefono WHERE fkEmpleado='".$idEmp."'");

	if($idTelefonos!="no"){
		$length = count($idTelefonos); //tamaño del arreglo de idTelefonos
		for($i=0;$i<$length;$i+=2){  //for que recorre todos los telefonos del empleado y los va agregando a la tabla
			$isuma = $i+1;  //variable para poder acceder a la posicion i+1 del arreglo
			if($isuma>=$length)
				$htmltelefono .= "<tr><td>$tipoTelefonos[$i]</td><td>$telefonos[$i]</td><td></td><td></td></tr>";
			else
				$htmltelefono .= "<tr><td>$tipoTelefonos[$i]</td><td>$telefonos[$i]</td><td>$tipoTelefonos[$isuma]</td><td>$telefonos[$isuma]</td></tr>"; // se concatena cada etiqueta <tr> con su contenido para despues insertarla al html
		}
	} else {
		$htmltelefono = "<tr><td colspan='4'><p style='font-size: 30px;' class='text-center'>SIN TELEFONOS</p></td></tr>";
	}

	/////////////////////////////////////////////////////////////////////////
	//LLenado de la tabla de Documentacion                                 //
	/////////////////////////////////////////////////////////////////////////

	$curp = consultar("SELECT curp FROM empleado WHERE idEmpleado='".$idEmp."'");
	$curp = $curp[0];
	$rfc = consultar("SELECT rfc FROM empleado WHERE idEmpleado='".$idEmp."'");
	$rfc = $rfc[0];
	$afore = consultar("SELECT afore FROM empleado WHERE idEmpleado='".$idEmp."'");
	if($afore[0]!=""){ 						//Si el empleado cuenta con afore este se mostrar en el pdf 
		$afore = $afore[0];					//En caso contrario se mostrara "Sin afore" en el documento pdf
	}
	else {
		$afore = "Sin AFORE";
	}


	$curp = consultar("SELECT curp FROM empleado WHERE idEmpleado='".$idEmp."'");
	$curp = $curp[0];
	$nss = consultar("SELECT nss FROM empleado WHERE idEmpleado='".$idEmp."'");
	$nss = $nss[0];
	$pasaporte = consultar("SELECT pasaporte FROM empleado WHERE idEmpleado='".$idEmp."'");
	if($pasaporte[0]!="")
	$pasaporte = $pasaporte[0];
	else{
		$pasaporte = "Sin Pasaporte";
	}
	$cartilla_sm = consultar("SELECT cartilla_sm FROM empleado WHERE idEmpleado='".$idEmp."'");
	if($cartilla_sm[0]=='no'){  //Si el empleado no tiene cartilla entonces indicamos que no tiene cartilla
		$cartilla_sm = "Sin cartilla";
	} else {					//En caso de que si tenga cartilla se mostrara la cartilla en el PDF
		$cartilla_sm = $cartilla_sm[0];
	}

	$tipo_licencia_manejo = consultar("SELECT tipo_licencia_manejo FROM empleado WHERE idEmpleado='".$idEmp."'");
	if($tipo_licencia_manejo[0]==""){  //si no tiene licencia entonce no se necesita especificar un tipo de licencia
		$tipo_licencia_manejo = "No aplica";
	} else {
		$tipo_licencia_manejo = $tipo_licencia_manejo[0];
	}

	$licencia_manejo = consultar("SELECT licencia_manejo FROM empleado WHERE idEmpleado='".$idEmp."'");
	if($licencia_manejo[0]==""){  //En caso de que no tenga licencia se indicara que no se tiene una licencia
		$licencia_manejo = "Sin Licencia";
	} else {
		$licencia_manejo = $licencia_manejo[0];
	}

	$documento_extranjero = consultar("SELECT documento_extranjero FROM empleado WHERE idEmpleado='".$idEmp."'");
	if($documento_extranjero[0]==""){
		$documento_extranjero = "No es extranjero";
	}	else {
		$documento_extranjero = $documento_extranjero[0];
	}


	///////////////////////////////////////////////////////////////////////
	//LLenado de la tabla de salud 										 //
	///////////////////////////////////////////////////////////////////////
	$preguntaSalud1 = consultar("SELECT respuesta FROM empleado_es WHERE fkEmpleado='".$idEmp."' && fkSH='4'");
	$preguntaSalud1 = $preguntaSalud1[0];
	$preguntaSalud2 = consultar("SELECT respuesta FROM empleado_es WHERE fkEmpleado='".$idEmp."' && fkSH='9'");
	$preguntaSalud2 = $preguntaSalud2[0];
	$preguntaSalud3 = consultar("SELECT respuesta FROM empleado_es WHERE fkEmpleado='".$idEmp."' && fkSH='1'");
	$preguntaSalud3 = $preguntaSalud3[0];
	$preguntaSalud4 = consultar("SELECT respuesta FROM empleado_es WHERE fkEmpleado='".$idEmp."' && fkSH='5'");
	$preguntaSalud4 = $preguntaSalud4[0];
	$preguntaSalud5 = consultar("SELECT respuesta FROM empleado_es WHERE fkEmpleado='".$idEmp."' && fkSH='6'");
	$preguntaSalud5 = $preguntaSalud5[0];
	$preguntaSalud6 = consultar("SELECT respuesta FROM empleado_es WHERE fkEmpleado='".$idEmp."' && fkSH='7'");
	$preguntaSalud6 = $preguntaSalud6[0];
	$preguntaSalud7 = consultar("SELECT respuesta FROM empleado_es WHERE fkEmpleado='".$idEmp."' && fkSH='3'");
	$preguntaSalud7 = $preguntaSalud7[0];
	$preguntaSalud8 = consultar("SELECT respuesta FROM empleado_es WHERE fkEmpleado='".$idEmp."' && fkSH='2'");
	$preguntaSalud8 = $preguntaSalud8[0];
	$preguntaSalud9 = consultar("SELECT respuesta FROM empleado_es WHERE fkEmpleado='".$idEmp."' && fkSH='8'");
	$preguntaSalud9 = $preguntaSalud9[0];

	///////////////////////////////////////////////////////////////////////
	//LLenado de la tabla de Hijos 										 //
	///////////////////////////////////////////////////////////////////////

	$nombreHijos = consultar("SELECT nombre FROM hijos_empleado WHERE fkEmpleado='".$idEmp."'");
	$edadHijos = consultar("SELECT edad FROM hijos_empleado WHERE fkEmpleado='".$idEmp."'");
	$htmlHijos = "";  // variable donde se guardara todo el codigo HTML que se inyectara al html del pdf

	//Si no tiene hijos entonces se mostrara un mensaje en la tabla de hijos no registrados 
	if($nombreHijos!="no"){
		$length = count($nombreHijos);  //numero de hijos registrados
		for($i=0;$i<$length;$i++){
			$htmlHijos .= "<tr><td>$nombreHijos[$i]</td><td>$edadHijos[$i]</td></tr>";
		}
	} else {
		$htmlHijos ="<tr><td><p></p></td><td><p></p></td></tr> <tr><td><p></p></td><td><p></p></td></tr> <tr><td><p></p></td><td><p></p></td></tr> <tr><td><p></p></td><td><p></p></td></tr>";
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////
	// Llenado de la tabla de Conocimiento Generales   												 //
	///////////////////////////////////////////////////////////////////////////////////////////////////

	
	$idiomas = consultar("SELECT idioma FROM idioma JOIN empleado_idioma ON idIdioma=fkIdioma WHERE fkEmpleado='".$idEmp."' ORDER BY fkIdioma ASC");
	$nivelIdiomas = consultar("SELECT nivel FROM empleado_idioma WHERE fkEmpleado='".$idEmp."' ORDER BY fkIdioma ASC");
	$htmlIdioma = ""; //variable que contiene el codigo que se inyectara al PDF
	if($idiomas!="no"){
		$length = count($idiomas);  //Numero de idiomas
		for ($i=0; $i < $length; $i+=2) {
			$imas = $i+1;  //variable para obtener el valor del arreglo en la posicion i+1
			if ($imas>=$length) {
				$htmlIdioma .= "<tr><td>$idiomas[$i]</td><td>$nivelIdiomas[$i]</td><td></td><td></td></tr>";
			} else {
				$htmlIdioma .= "<tr><td>$idiomas[$i]</td><td>$nivelIdiomas[$i]</td><td>$idiomas[$imas]</td><td>$nivelIdiomas[$imas]</td></tr>";	
			}
 		}
	} else {			
		// en caso de no tener hijos se mostrara en la tabla que no tiene idiomas registrados
		$htmlIdioma = "<tr><td><p></p></td><td><p></p></td><td><p></p></td><td><p></p></td></tr> <tr><td><p></p></td><td><p></p></td><td><p></p></td><td><p></p></td></tr>";
	}

	///////////////////////////////////////////////////////////////////////////////////
	///   Llenado de la tabla de software 											///
	///////////////////////////////////////////////////////////////////////////////////

	$nombresSoftware = consultar("SELECT nombre FROM software JOIN empleado_software ON fksoftware=idSoftware WHERE fkEmpleado='".$idEmp."' ORDER BY nombre asc");
	$nivelesSoftware= consultar("SELECT nivel FROM software JOIN empleado_software ON fksoftware=idSoftware WHERE fkEmpleado='".$idEmp."' ORDER BY nombre asc");
	$length = count($nombresSoftware); //numero de softwares que estan lindados al idEmpleado
	$htmlSoftware="";  //varaible que contendra el codigo html que se insertara a la pagina html
	// el for va a ir concatenando en la variable htmlSoftware todos los renglone que se agregaran a la tabla 
	for ($i=0; $i < $length; $i+=2) { 
		$imas = $i+1;
		if($imas>=$length)
			$htmlSoftware .= "<tr><td class='label'>$nombresSoftware[$i]</td><td>$nivelesSoftware[$i]</td><td class='label'></td><td></td></tr>"; 
		else
			$htmlSoftware .= "<tr><td class='label'>$nombresSoftware[$i]</td><td>$nivelesSoftware[$i]</td><td class='label'>$nombresSoftware[$imas]</td><td>$nivelesSoftware[$imas]</td></tr>";
	}


	////////////////////////////////////////////////////////////////////////////////////////////
	///   Llenado de la tabla de competencias 												 ///
	////////////////////////////////////////////////////////////////////////////////////////////

	$nombreCompetencias = consultar("SELECT nombre FROM competencias JOIN empleado_comp ON fkCompetencias=idCompetencias WHERE fkEmpleado='".$idEmp."' ORDER BY nombre asc");
	$nivelCompetencias= consultar("SELECT nivel FROM empleado_comp JOIN competencias ON fkCompetencias=idCompetencias WHERE fkEmpleado='".$idEmp."' ORDER BY nombre asc");

	$length = count($nombreCompetencias);  //numero de competencias registradas
	$htmlCompetencias=""; //variable donde se guardara todo el codigo HTML que se agregara al HTML del PDF
	 for ($i=0; $i < $length; $i+=2) { 
	 	$imas = $i+1;
	 	// En esta parte se iran agregando filas de la tabla por cada dos competencias registradas
	 		$htmlCompetencias .=  "<tr><td class='label'>$nombreCompetencias[$i]</td><td>$nivelCompetencias[$i]</td><td class='label'>$nombreCompetencias[$imas]</td><td>$nivelCompetencias[$imas]</td></tr>";
	 }


	 ///////////////////////////////////////////////////////////////////////////////////////
	 //  Llenado seccion de empleos 													  //
	 ///////////////////////////////////////////////////////////////////////////////////////
	 /**
	 * Para obtener los datos de cada una de las escuelas se crearan arrays que contendran todos los valores de una sola 
	 * columna de la tabla despues se ira mostrando el elemento de la posicion $i de cada uno de los arrays para evitar que cada respuesta * no corresponda con la escuela, todas las consultas se ordenaran alfabeticamente.
	 **/

	 $razones = consultar("SELECT razon_empleo FROM empleado WHERE idEmpleado='".$idEmp."'");
	 $razones = $razones[0];
	 $htmlEmpleo = "";
	 $nombreEmpleos = consultar("SELECT nombre FROM empleo JOIN empleado_empleo ON fkempleo=idempleo WHERE fkempleado='".$idEmp."'");
	 $tiempoInicioEmpleo = consultar("SELECT tiempo_inicio FROM empleo JOIN empleado_empleo ON fkempleo=idempleo WHERE fkempleado='".$idEmp."'");
	 $tiempoFinEmpleo = consultar("SELECT tiempo_fin FROM empleo JOIN empleado_empleo ON fkempleo=idempleo WHERE fkempleado='".$idEmp."'");
	 $direccionEmpleo = consultar("SELECT direccion FROM empleo JOIN empleado_empleo ON fkempleo=idempleo WHERE fkempleado='".$idEmp."'");
	 $telefonoEmpleo = consultar("SELECT telefono FROM empleo JOIN empleado_empleo ON fkempleo=idempleo WHERE fkempleado='".$idEmp."'");
	 $puestoEmpleo = consultar("SELECT puesto FROM empleo JOIN empleado_empleo ON fkempleo=idempleo WHERE fkempleado='".$idEmp."'");
	 $sueldoMensualEmpleo = consultar("SELECT sueldo_mensual FROM empleo JOIN empleado_empleo ON fkempleo=idempleo WHERE fkempleado='".$idEmp."'");
	 $motivoSeparacion = consultar("SELECT motivo_separacion FROM empleo JOIN empleado_empleo ON fkempleo=idempleo WHERE fkempleado='".$idEmp."'");
	 $nombreJefe = consultar("SELECT nombre_jefe FROM empleo JOIN empleado_empleo ON fkempleo=idempleo WHERE fkempleado='".$idEmp."'");
	 $puestoJefe = consultar("SELECT puesto_jefe FROM empleo JOIN empleado_empleo ON fkempleo=idempleo WHERE fkempleado='".$idEmp."'");
	 $comentariosEmpleo = consultar("SELECT comentarios FROM empleo JOIN empleado_empleo ON fkempleo=idempleo WHERE fkempleado='".$idEmp."'");

	 /**
	 * En el caso de la vairable tipoEmpleo lo que obtendra es un array de booleanos, entonces nesecitamos pasar los valores 0 a Anterior 
	 * y 1 a actual
	 **/
	 $tipoEmpleo = consultar("SELECT actual FROM empleo JOIN empleado_empleo ON fkempleo=idempleo WHERE fkempleado='".$idEmp."'");
	 if($tipoEmpleo!="no"){
		 $length = count($tipoEmpleo);
		 for ($i=0; $i < $length; $i++) { 
		 	if($tipoEmpleo[$i]){
		 		$tipoEmpleo[$i] = "Actual";
		 	} else {
		 		$tipoEmpleo[$i] = "Anterior";
		 	}
		 }
	}
	 if($nombreEmpleos!="no"){
	 	$length = count($nombreEmpleos);
		for ($i=0; $i < $length; $i++) { 
		 	$htmlEmpleo .= "<div class='agregarEmpleo'>
						<p class='header-empleo'>$nombreEmpleos[$i]</p>
						<table class='table-bordered table-sm table'>
							<tbody>
							<tr>
								<td class='labels'><p>Tipo de Empleo:</p></td>
								<td><p>$tipoEmpleo[$i]</p></td>
							</tr>
							<tr>
								<td class='labels'><p>Nombre de la compañia:</p></td>
								<td><p>$nombreEmpleos[$i]</p></td>
							</tr>
							<tr>
								<td class='labels'><p>Puesto:</p></td>
								<td><p>$puestoEmpleo[$i]</p></td>
							</tr>
							<tr>
								<td class='labels'><p>Sueldo Mensual:</p></td>
								<td>$sueldoMensualEmpleo[$i]</td>
							</tr>
							<tr>
								<td class='labels'><p>Empezó a prestar sus servicios:</p></td>
								<td>$tiempoInicioEmpleo[$i]</td>
							</tr>
							<tr>
								<td class='labels'><p>Terminó de Prestar sus servicios:</p></td>
								<td>$tiempoFinEmpleo[$i]</td>
							</tr>
							<tr>
								<td class='labels'><p>Dirección:</p></td>
								<td>$direccionEmpleo[$i]</td>
							</tr>
							<tr>
								<td class='labels'><p>Teléfono:</p></td>
								<td>$telefonoEmpleo[$i]</td>
							</tr>
							<tr>
								<td class='labels'><p>Motivo de separación:</p></td>
								<td>$motivoSeparacion[$i]</td>
							</tr>
							<tr>
								<td class='labels'><p>Nombre del jefe directo:</p></td>
								<td>$nombreJefe[$i]</td>
							</tr>
							<tr>
								<td class='labels'><p>Puesto del jefe directo:</p></td>
								<td>$puestoJefe[$i]</td>
							</tr>
							<tr>
								<td class='labels align-top'><p>Comentarios:</p></td>
								<td>$comentariosEmpleo[$i]</td>
							</tr>
						</tbody>
						</table>
					</div>";
		 }
	} else {
		$htmlEmpleo = "<div class='agregarEmpleo'>
						<p class='header-empleo'>Empleo</p>
						<table class='table-bordered table-sm table'>
							<tbody>
							<tr>
								<td class='labels'><p>Tipo de Empleo:</p></td>
								<td><p></p></td>
							</tr>
							<tr>
								<td class='labels'><p>Nombre de la compañia:</p></td>
								<td><p></p></td>
							</tr>
							<tr>
								<td class='labels'><p>Puesto:</p></td>
								<td><p></p></td>
							</tr>
							<tr>
								<td class='labels'><p>Sueldo Mensual:</p></td>
								<td></td>
							</tr>
							<tr>
								<td class='labels'><p>Empezo a prestar sus servicios:</p></td>
								<td></td>
							</tr>
							<tr>
								<td class='labels'><p>Termino de Prestar sus servicios:</p></td>
								<td></td>
							</tr>
							<tr>
								<td class='labels'><p>Dirección:</p></td>
								<td></td>
							</tr>
							<tr>
								<td class='labels'><p>Teléfono:</p></td>
								<td></td>
							</tr>
							<tr>
								<td class='labels'><p>Motivo de separación:</p></td>
								<td></td>
							</tr>
							<tr>
								<td class='labels'><p>Nombre del jefe directo:</p></td>
								<td></td>
							</tr>
							<tr>
								<td class='labels'><p>Puesto del jefe directo:</p></td>
								<td></td>
							</tr>
							<tr>
								<td class='labels align-top'><p>Comentarios:</p></td>
								<td></td>
							</tr>
						</tbody>
						</table>
					</div>";
	}


	 //////////////////////////////////////////////////////////////////////////////////////////////////
	 //   LLenado de la tabla de Referencias personales 											 //
	 //////////////////////////////////////////////////////////////////////////////////////////////////


	 $nombreReferencias = consultar("SELECT nombre FROM referencias WHERE fkEmpleado='".$idEmp."'");
	 $domicilioReferencias = consultar("SELECT domicilio FROM referencias WHERE fkEmpleado='".$idEmp."'");
	 $telefonoReferencias = consultar("SELECT telefono FROM referencias WHERE fkEmpleado='".$idEmp."'");
	 $ocupacionReferencias = consultar("SELECT ocupacion FROM referencias WHERE fkEmpleado='".$idEmp."'");
	 $tiempoConocerlo = consultar("SELECT tiempo_conocerlo FROM referencias WHERE fkEmpleado='".$idEmp."'");
	 $htmlReferencia = "";
	 if($nombreReferencias!="no"){
			$length = count($nombreReferencias);
			for ($i=0; $i < $length; $i++) { 
				$htmlReferencia .= "<tr>
										<td>$nombreReferencias[$i]</td>
										<td>$domicilioReferencias[$i]</td>
										<td>$telefonoReferencias[$i]</td>
										<td>$ocupacionReferencias[$i]</td>
										<td>$tiempoConocerlo[$i]</td>
									</tr>";
			}
	} else {
		$htmlReferencia = "<tr>
										<td><p></p></td>
										<td><p></p></td>
										<td><p></p></td>
										<td><p></p></td>
										<td><p></p></td>
									</tr>
									<tr>
										<td><p></p></td>
										<td><p></p></td>
										<td><p></p></td>
										<td><p></p></td>
										<td><p></p></td>
									</tr>
									<tr>
										<td><p></p></td>
										<td><p></p></td>
										<td><p></p></td>
										<td><p></p></td>
										<td><p></p></td>
									</tr>
									<tr>
										<td><p></p></td>
										<td><p></p></td>
										<td><p></p></td>
										<td><p></p></td>
										<td><p></p></td>
									</tr>
									<tr>
										<td><p></p></td>
										<td><p></p></td>
										<td><p></p></td>
										<td><p></p></td>
										<td><p></p></td>
									</tr>
									";
	}


	 ////////////////////////////////////////////////////////////////////////////////////////////////
	 //    Llenado del apartado de datos economicos 											   //
	 ////////////////////////////////////////////////////////////////////////////////////////////////

	 $otrosIngresos = consultar("SELECT respuesta FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='1'");
	 $otrosIngresosMonto = consultar("SELECT monto FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='1'");
	 if($otrosIngresosMonto[0]!=0){
		$otrosIngresos = $otrosIngresos[0];
		$otrosIngresosMonto = "$".$otrosIngresosMonto[0];
	} else {
		$otrosIngresos = "No tiene otros ingresos";
		$otrosIngresosMonto = "No aplica";
	}
	 $valorCasaPropia = consultar("SELECT monto FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='3'");
	 if($valorCasaPropia[0]==0)
	 	$valorCasaPropia = "Sin Casa propia";
	 else
	 	$valorCasaPropia = "$".$valorCasaPropia[0];
	 $modeloAuto = consultar("SELECT respuesta FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='5'");
	 $montoAuto = consultar("SELECT monto FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='5'");
	 if($montoAuto[0]!=0){
	 	$modeloAuto = $modeloAuto[0];
	 	$montoAuto = $montoAuto[0];
	 } else {
	 	$modeloAuto = "Sin automóvil";
	 	$montoAuto = "No aplica";
	 }
	 $gastosMensuales = consultar("SELECT monto FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='8'");
	 $gastosMensuales = "$".$gastosMensuales[0];
	 $trabajoConyuge = consultar("SELECT respuesta FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='2'");
	 $montoConyuge = consultar("SELECT monto FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='2'");
	 if($montoConyuge[0] != 0){
	 	$trabajoConyuge = $trabajoConyuge[0];
	 	$montoConyuge = "$".$montoConyuge[0];
	 } else {
	 	$trabajoConyuge = "No trabaja";
	 	$montoConyuge = "No aplica";
	 }
	 $rentaMensual = consultar("SELECT monto FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='4'");
	 if($rentaMensual!=0)
	 	$rentaMensual = "$".$rentaMensual[0];
	 else
	 	$rentaMensual= "No paga renta";
	 $importeDeudas = consultar("SELECT monto FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='6'");
	 $nombreDeudas = consultar("SELECT respuesta FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='6'");
	 $abonoMensual = consultar("SELECT monto FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='7'");
	 if($importeDeudas[0]!=0 && $abonoMensual[0]!=0){
	 	$importeDeudas = $importeDeudas[0];
	 	$nombreDeudas = $nombreDeudas[0];
	 	$abonoMensual = $abonoMensual[0];
	 } else {
	 	$importeDeudas = "Sin deudas";
	 	$nombreDeudas = "Sin deudas";
	 	$abonoMensual = "Sin deudas";
	 }

	////////////////////////////////////////////////////////////////////////////
	//LLENADO DE LA TABLA DATOS FAMILIARES                                   ///
	////////////////////////////////////////////////////////////////////////////
	$parentescofam=consultar("SELECT parentesco from datos_familiares where fkEmpleado='".$idEmp."'");
	$nombrefam=consultar("SELECT nombre from datos_familiares where fkEmpleado='".$idEmp."'");
	$vivefam=consultar("SELECT vive from datos_familiares where fkEmpleado='".$idEmp."'");
	$domiciliofam=consultar("SELECT domicilio from datos_familiares where fkEmpleado='".$idEmp."'");
	$ocupacionfami=consultar("SELECT ocupacion from datos_familiares where fkEmpleado='".$idEmp."'");
	$length = count($nombrefam);
	$htmldatosfam="";
	for ($i=0; $i < $length ; $i++) { 
		if ($vivefam[$i]==1) {
			$vivefam1="Vivo";
		}else{
			$vivefam1="Fallido";
		}
		$htmldatosfam.="<tr><td>$parentescofam[$i]</td><td>$nombrefam[$i]</td><td>$vivefam1</td><td>$domiciliofam[$i]</td><td>$ocupacionfami[$i]</td></tr>";
	}
///////////////////////////////////////////////////////////////////
///LLENADO TABLA ESCUELAS/////////////////////////////////////////
//////////////////////////////////////////////////////////////////
	//ESCUELA ACTUAL

	$arrayniveles = array("POSGRADO S.A.","POSGRADO","LICENCIATURA S.A.","LICENCIATURA","PROFESIONAL TÉCNICO","BACHILLERATO","SECUNDARIA","PRIMARIA");//Array para poder ordenar las tablas de grado mayor a menor
	$estadoarray=count($arrayniveles);

	$idescuelaact=consultar("SELECT fkEscuelas from estudio_actual where fkEmpleado='".$idEmp."'");
	//este if hará que la información de la escuela actual sea mostrada, en caso de que no se tenga una escuela actual no se mostrara nada .
	if ($idescuelaact=='no') {
		$htmlestudioactual="";
	}else{
		$idescuelaact=$idescuelaact[0];
		$nomesact=consultar("SELECT Nombre from escuelas where idEscuelas='".$idescuelaact."'");
		$nomesact=$nomesact[0];
		$esact="Si";
		$niveleducativo=consultar("SELECT Nivel_educativo from escuelas where idEscuelas='".$idescuelaact."'");
		$niveleducativo=$niveleducativo[0];
		$estadoEA=consultar("SELECT Estado from escuelas where idEscuelas='".$idescuelaact."'");
		$estadoEA=$estadoEA[0];
		$delegaEA=consultar("SELECT Municipio from escuelas where idEscuelas='".$idescuelaact."'");
		$delegaEA=$delegaEA[0];
		$direccionES=consultar("SELECT Direccion from estudio_actual where fkEmpleado='".$idEmp."'");
		$direccionES=$direccionES[0];
		$contadire=strlen($direccionES);
		$calleEa="";
		$noextEA="";
		for ($i=0; $i <$contadire ; $i++) { 
			if ($direccionES[$i]=='|') {
				$cnoe=$i;
				break;
			}
			$calleEa.=$direccionES[$i];
		}
		for ($i=$cnoe+1; $i < $contadire ; $i++) { 
			$noextEA.=$direccionES[$i];
		}
		$anioEA=consultar("SELECT Anio from estudio_actual where fkEmpleado='".$idEmp."'");
		$anioEA=$anioEA[0];
		$horarioEA=consultar("SELECT Horario from estudio_actual where fkEmpleado='".$idEmp."'");
		$horarioEA=$horarioEA[0];
		$cursoEA=consultar("SELECT Curso_carrera from estudio_actual where fkEmpleado='".$idEmp."'");
		$cursoEA=$cursoEA[0];
		$gradoEA=consultar("SELECT Grado_nivel from estudio_actual where fkEmpleado='".$idEmp."'");
		$gradoEA=$gradoEA[0];
		$htmlestudioactual="<div class='agregarEscuela'>
					<p class='header-escuela'>$niveleducativo</p>
					<table  class='table table-bordered table-sm'>
						<tr>
							<td class='labels'>
								<p>Nombre:</p>
							</td>
							<td>
								<p>$nomesact</p>
							</td>
						</tr>
						<tr>
							<td class='labels'>
								<p>Estudiando en esta institución:</p>
							</td>
							<td>
								<p>Si</p>
							</td>
						</tr>
						<tr>
							<td class='labels'>
								<p>Estado:</p>
							</td>
							<td>
								<p>$estadoEA</p>
							</td>
						</tr>
						<tr>
							<td class='labels'>
								<p>Delegación:</p>
							</td>
							<td>
								<p>$delegaEA</p>
							</td>
						</tr>
						<tr>
							<td class='labels'>
								<p>Calle:</p>
							</td>
							<td>
								<p>$calleEa</p>
							</td>
						</tr>
						<tr>
							<td class='labels'>
								<p>Número Exterior:</p>
							</td>
							<td>
								<p>$noextEA</p>
							</td>
						</tr>
						<tr>
							<td class='labels'>
								<p>Año en que inició:</p>
							</td>
							<td>
								<p>$anioEA</p>
							</td>
						</tr>
						<tr>
							<td class='labels'>
								<p>Horario:</p>
							</td>
							<td>
								<p>$horarioEA</p>
							</td>
						</tr>
						<tr>
							<td class='labels'>
								<p>Curso o Carrera:</p>
							</td>
							<td>
								<p>$cursoEA</p>
							</td>
						</tr>
						<tr>
							<td class='labels'>
								<p>Grado:</p>
							</td>
							<td>
								<p>$gradoEA</p>
							</td>
						</tr>
					</table>
				</div>";


	}
	//ESCOLARIDAD
	
	// DATOS GENERALES
	$supoempleo=consultar("SELECT Respuesta from empleado_dg where fkDG=1 && fkEmpleado='".$idEmp."'");
	$supoempleo=$supoempleo[0];
	$parientesempresa=consultar("SELECT Respuesta from empleado_dg where fkDG=2 && fkEmpleado='".$idEmp."'");
	$parientesempresa=$parientesempresa[0];
	if ($parientesempresa=='No') {
		$parientesempresa="N/P";
	}
	$afianzadodg=consultar("SELECT Respuesta from empleado_dg where fkDG=3 && fkEmpleado='".$idEmp."'");
	$afianzadodg=$afianzadodg[0];
	if ($afianzadodg=='No') {
		$afianzadodg="N/P";
	}
	$sindicatodg=consultar("SELECT Respuesta from empleado_dg where fkDG=4 && fkEmpleado='".$idEmp."'");
	$sindicatodg=$sindicatodg[0];
	if ($sindicatodg=='No') {
		$sindicatodg="N/P";
	}	
	$segurovdg=consultar("SELECT Respuesta from empleado_dg where fkDG=5 && fkEmpleado='".$idEmp."'");
	$segurovdg=$segurovdg[0];
	if ($segurovdg=='No') {
		$segurovdg="N/P";
	}
	$viajardg=consultar("SELECT Respuesta from empleado_dg where fkDG=6 && fkEmpleado='".$idEmp."'");
	$viajardg=$viajardg[0];
	if ($viajardg=='Si') {
			$trueviajar="Si";
		}else{
			$trueviajar="No,".$viajardg;
		}
	$camresidg=consultar("SELECT Respuesta from empleado_dg where fkDG=7 && fkEmpleado='".$idEmp."'");
	$camresidg=$camresidg[0];
	if ($camresidg=='Si') {
		$truecamdg="Si";
	}else{
		$truecamdg="No,".$camresidg;
	}
	$fechadg=consultar("SELECT Respuesta from empleado_dg where fkDG=8 && fkEmpleado='".$idEmp."'");
	$fechadg=$fechadg[0];
	$htmldg="		<tr>
					<td class='text-left'>
						<p class='label'>¿Cómo supo de este empleo?:</p>
					</td>
					<td>
						<p class='input'> $supoempleo </p>
					</td>
					<td class='text-left'>
						<p class='label'>Seguro de vida:</p>
					</td>
					<td>
						<p class='input'>$segurovdg</p>
					</td>
				</tr>
				<tr>
					<td class='text-left'>
						<p class='label'>Parientes trabajando en la empresa:</p>
					</td>
					<td>
						<p class='input'>$parientesempresa</p>
					</td>
					<td class='text-left'>
						<p class='label'>Puede Viajar:</p>
					</td>
					<td>
						<p class='input'>$trueviajar</p>
					</td>								
				</tr>
				<tr>
					<td class='text-left'>
						<p class='label'>Empleado afianzado:</p>
					</td>
					<td>
						<p class='input'>$afianzadodg</p>
					</td>
					<td class='text-left'>
						<p class='label'>Puede cambiar de lugar de residencia:</p>
					</td>
					<td>
						<p class='input'>$truecamdg</p>
					</td>								
				</tr>
				<tr>
					<td class='text-left'>
						<p class='label'>Afiliación a sindicato:</p>
					</td>
					<td>
						<p class='input'>$sindicatodg</p>
					</td>
					<td class='text-left'>
						<p class='label'>Fecha en que puede presentarse a trabajar:</p>
					</td>
					<td>
						<p class='input'>$fechadg</p>
					</td>								
				</tr>	";

	//LLenado contactos de emergencia

	$nombreContactos = consultar("SELECT nombre FROM contacto_emergencia WHERE fkEmpleado='".$idEmp."'");
	$parentescoContactos = consultar("SELECT parentesco FROM contacto_emergencia WHERE fkEmpleado='".$idEmp."'");
	$telefonoContactos = consultar("SELECT telefono FROM contacto_emergencia WHERE fkEmpleado='".$idEmp."'");
	if($nombreContactos!="no"){
		$length = count($nombreContactos);
		$htmlContactos="";
		for($i=0;$i<$length;$i++){
			$htmlContactos .= "<tr><td>$nombreContactos[$i]</td><td>$parentescoContactos[$i]</td><td>$telefonoContactos[$i]</td></tr>";
		}
	} else {
		$htmlContactos = "<tr><td><p></p></td><td><p></p></td><td><p></p></td></tr> <tr><td><p></p></td><td><p></p></td><td><p></p></td></tr> <tr><td><p></p></td><td><p></p></td><td><p></p></td></tr> <tr><td><p></p></td><td><p></p></td><td><p></p></td></tr> <tr><td><p></p></td><td><p></p></td><td><p></p></td></tr>";
	}

	/////////////////////////////////////////////////////////////////////////
	// Llenado de la tabla de redes Sociales 							   //
	/////////////////////////////////////////////////////////////////////////

	$facebook = consultar("SELECT cuenta FROM empleado_redes WHERE fkEmpleado='".$idEmp."' && fkRedSocial='1'");
	if($facebook!="no"){
		$facebook = $facebook[0];
	} else {
		$facebook = "Sin facebook";
	}
	$twitter = consultar("SELECT cuenta FROM empleado_redes WHERE fkEmpleado='".$idEmp."' && fkRedSocial='2'");
	if($twitter!="no"){
		$twitter = $twitter[0];
	} else {
		$twitter = "Sin twitter";
	}
	$instagram = consultar("SELECT cuenta FROM empleado_redes WHERE fkEmpleado='".$idEmp."' && fkRedSocial='3'");
	if($instagram!="no"){
		$instagram = $instagram[0];
	} else {
		$instagram = "Sin instagram";
	}
	$youtube = consultar("SELECT cuenta FROM empleado_redes WHERE fkEmpleado='".$idEmp."' && fkRedSocial='4'");
	if($youtube!="no"){
		$youtube = $youtube[0];
	} else {
		$youtube = "Sin youtube";
	}

	// Fin de la declaracion de variables

?>
<!--Codigo HTML de la pagina web que se convertira a PDF-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Solicitud Impresa</title>
	<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet"> <!--letra del encabezado-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--Iconos de google-->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos_menu.css">
	<link rel="stylesheet" href="css/estilos-impresion.css">
</head>
<body>
	<header  class="container-fluid encabezado">
		<div class="row justify-content-center">
			<div class="d-flex align-items-center col-auto">
				<img src="img/marktac-sello.gif" class="float-left" alt="logo" width="139px" height="139px">
				<span>
					<h1 class="titulo-encabezado">MarkTác México</h1>
					<p class="eslogan">El camino de la estrategia a la acción</p>
				</span>
			</div>
			<div class="col-auto d-flex align-items-center">
				<div class="row">
					<div class="col mb-3">
						<div class="text-center">
							<a href="https://www.facebook.com/marktacmexico/?fref=ts">
								<img src="img/facebook.png" class="mx-2" alt="facebook" height="21px" width="21px">
							</a>
							<a href="https://www.youtube.com/channel/UCpUr4UIKt1C_ben1_2VY10g">
								<img src="img/youtube.png" class="mx-2" alt="youtube" height="21px" width="21px">
							</a>
						</div>
					</div>
				</div>
			 	
			</div>
		</div>
	</header>


	<div class="informacion">
		<div class="contenido">
			<table class="infoBasica">
				<tr>
					<td id="foto"><img id="imgEmpleado" src="fotos/<?php echo($idEmp)?>.png">
					</td>
					<td class="text-left">
						<p class="label">Clave: </p>
						<p class="label">Nombre Completo: </p>
						<p class="label">Puesto: </p>
						<p class="label">Edad:</p>
						<p class="label">Sueldo:</p>
					</td>
					<td class="text-left">
						<p ><?php echo "$idEmp" ?></p>
						<p ><?php echo "$nombre" ?></p>
						<p ><?php echo "$puesto" ?></p>
						<p ><?php echo "$edad" ?></p>
						<p ><?php echo "$sueldo"; ?></p>
					</td>
				</tr>
			</table>
			<hr>
			<h3>Datos Personales</h3>
			<hr>
			<table class="datosPersonales">
				<tr>
					<td class="labels">
						<p>Correo Electrónico:</p>
					</td>
					<td><p><?php echo "$email";?></p></td>
					<td class="labels"><p>Estado:</p></td>
					<td><p><?php echo "$estado"?></p></td>
				</tr>
				<tr>
					<td  class="labels">
						<p>Sexo:</p>
					</td>
					<td><p><?php echo "$sexo";?></p></td>
					<td class="labels"><p>Municipio:</p></td>
					<td><p><?php echo "$municipio"?></p></td>
				</tr>
				<tr>
					<td  class="labels">
						<p>Orientación Sexual:</p>
					</td>
					<td><p><?php echo "$orientacion_sexual";?></p></td>
					<td class="labels"><p>Colonia:</p></td>
					<td><p><?php echo "$colonia"?></p></td>
				</tr>
				<tr>
					<td  class="labels">
						<p>Estado Civil:</p>
					</td>
					<td><p><?php echo "$estado_civil"?></p></td>
					<td class="labels"><p>Calle:</p</td>
					<td><p><?php echo "$calle"?></p></td>
				</tr>
				<tr>
					<td  class="labels">
						<p>Lugar de Nacimiento:</p>
					</td>
					<td><p><?php echo "$lugar_nacimiento"?></p></td>
					<td class="labels"><p>Código Postal:</p></td>
					<td><p><?php echo "$cp"?></p></td>
				</tr>
				<tr>
					<td  class="labels">
						<p>Fecha de Nacimiento:</p>
					</td>
					<td><p><?php echo "$fecha_nacimiento"?></p></td>
					<td class="labels"><p>Número Exterior:</p></td>
					<td><p><?php echo "$no_ext"?></p></td>
				</tr>
				<tr>
					<td  class="labels">
						<p>Estatura:</p>
					</td>
					<td><p><?php echo "$estatura"?></p></td>
					<td class="labels"><p>Número Interior:</p></td>
					<td><p><?php echo "$no_int"?></p></td>
				</tr>
				<tr>
					<td  class="labels">
						<p>Peso:</p>
					</td>
					<td><p><?php echo "$peso"?></p></td>
					<td class="labels"><p>Nacionalidad:</p></td>
					<td><p><?php echo "$nacionalidad"?></p></td>
				</tr>
				<tr>
					<td  class="labels">
						<p>Talla de camisa:</p>
					</td>
					<td><p><?php echo "$tallac"?></p></td>
					<td class="labels"><p>Gelatina Favorita:</p></td>
					<td><p><?php echo "$gelatinaf"?></p></td>
				</tr>
				<tr>
					<td  class="labels">
						<p>Talla de pantalón:</p>
					</td>
					<td><p><?php echo "$tallap"?></p></td>
					<td class="labels"><p>Color Favorito:</p></td>
					<td><p><?php echo "$colorf"?></p></td>
				</tr>
				<tr>
					<td  class="labels">
						<p>Pastel favorito:</p>
					</td>
					<td><p><?php echo "$pastelf"?></p></td>
					<td class="labels"><p>Comida Favorita:</p></td>
					<td><p><?php echo "$comidaf"?></p></td>
				</tr>
				
				<tr>
					<td class="labels">
						<p>Vive con:</p>
					</td>
					<td><p><?php echo "$vive_con"?></p></td>
					<td class="labels"></td>
					<td></td>
				</tr>
				<tr>
					<td class="labels"><p>Personas que dependen de usted:</p></td>
					<td><p><?php echo "$result"?></p></td>
					<td class="labels"></td>
					<td></td>
				</tr>
			</table>
		</div>
		<div class="contenido" style=" page-break-before: always;">
			<hr>
			<h3>Teléfonos</h3>
			<hr>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<th>Tipo</th>
					<th>Número</th>
					<th>Tipo</th>
					<th>Número</th>
				</thead>
				<tbody>
					<?php echo "$htmltelefono"?>
				</tbody>
			</table>
			<hr>
			<h3>Documentación</h3>
			<hr>
			<center>
			<table cellpadding="10" class="documentacion">
				<tr>
					<td class="text-left">
						<p class="label">CURP:</p>
						<p class="label">AFORE:</p>
						<p class="label">Pasaporte:</p>
						<p class="label">Tipo licencia manejo:</p>
					</td>
					<td>
						<p class="input"><?php echo "$curp"?></p>
						<p class="input"><?php echo "$afore"?></p>
						<p class="input"><?php echo "$pasaporte"?></p>
						<p class="input"><?php echo "$tipo_licencia_manejo"?></p>

					</td>
					<td class="text-left">
						<p class="label">RFC:</p>
						<p class="label">NSS:</p>
						<p class="label">Cartilla Militar:</p>
						<p class="label">Número licencia manejo:</p>
					</td>
					<td>
						<p class="input"><?php echo "$rfc"?></p>
						<p class="input"><?php echo "$nss"?></p>
						<p class="input"><?php echo "$cartilla_sm"?></p>
						<p class="input"><?php echo "$licencia_manejo" ?></p>
					</td>									
				</tr>										
			</table>
			</center>
			<center>
			<table class="documentation">
				<tr>
					<td class="text-left">
						<p class="label">Doc.Extranjero:</p>
					</td>
					<td>
						<p class="input"><?php echo "$documento_extranjero"?></p>
					</td>
				</tr>
			</table>
			</center>
			<hr>
			<h3>Estado de salud y hábitos personales</h3>
			<hr>
			<table id="tablaSalud" class="table table-bordered">
				<thead class="thead-dark">
					<th>Pregunta</th>
					<th>Respuesta</th>
				</thead>
				<tbody>
					<tr>
						<td>¿Cómo considera su estado de salud actual?</td>
						<td style="max-width: 500px"><?php echo "$preguntaSalud1"?></td>
					</tr>
					<tr>
						<td>¿Tipo de sangre?</td>
						<td style="max-width: 500px"><?php echo "$preguntaSalud2"?></td>
					</tr>
					<tr>
						<td>¿Padece alguna enfermedad crónica?</td>
						<td style="max-width: 500px"><?php echo "$preguntaSalud3"?></td>
					</tr>
					<tr>
						<td>¿Practica usted algún deporte?</td>
						<td style="max-width: 500px"><?php echo "$preguntaSalud4"?></td>
					</tr>
					<tr>
						<td>¿Permanece a algún club social o deportivo?</td>
						<td style="max-width: 500px"><?php echo "$preguntaSalud5"?></td>
					</tr>
					<tr>
						<td>¿Tiene algún pasatiempo?</td>
						<td style="max-width: 500px"><?php echo "$preguntaSalud6"?></td>
					</tr>
					<tr>
						<td>¿Tiene alguna Discapacidad?</td>
						<td style="max-width: 500px"><?php echo "$preguntaSalud7"?></td>
					</tr>
					<tr>
						<td>¿Está usted embarazada?</td>
						<td style="max-width: 500px"><?php echo "$preguntaSalud8"?></td>
					</tr>
					<tr>
						<td>¿Cuál es su meta en la vida?</td>
						<td style="max-width: 500px"><?php echo "$preguntaSalud9"?></td>
					</tr>
				</tbody>
			</table>
			<hr>
			<h3>Datos Familiares</h3>
			<hr>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<th>Parentesco</th>
					<th>Nombre</th>
					<th>Vive</th>
					<th>Domicilio</th>
					<th>Ocupación</th>
				</thead>
				<tbody>
					<?php echo "$htmldatosfam"?>
				</tbody>
			</table>
			<hr>
			<h3>Hijos</h3>
			<hr>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<th>Nombre</th>
					<th>Edad</th>
				</thead>
				<tbody>
					<?php echo "$htmlHijos" ?>
				</tbody>
			</table>
		</div>
		<div class="contenido">
			<hr>
			<h3>Escolaridad</h3>
			<hr>
			<div class="escolaridad">
				<?php echo "$htmlestudioactual"?>
				<?php
				//este for esta para que se recorra la posición del array niveleseducativos, lo cual nos permitira obtener las escuelas de manera descendente 
				for ($z=0; $z <$estadoarray ; $z++) { 
					# code...
				//query para obtener las escuelas de cierto nivel que tiene el empleado 
				 $numescuelas=consultar("SELECT idEscuelas from escuelas join escolaridad ON fkEscuelas=idEscuelas where fkEmpleado='".$idEmp."' && nivel_educativo='".$arrayniveles[$z]."'");
				if($numescuelas!="no"){
					$lengthescuelas=count($numescuelas);
					for ($i=0; $i < $lengthescuelas ; $i++) { 
						$nombreescol=consultar("SELECT Nombre from escuelas where idEscuelas='".$numescuelas[$i]."'");
						$nombreescol=$nombreescol[0];
						$nivelescol=consultar("SELECT Nivel_educativo from escuelas where idEscuelas='".$numescuelas[$i]."'");
						$nivelescol=$nivelescol[0];
						$estadoescol=consultar("SELECT Estado from escuelas where idEscuelas='".$numescuelas[$i]."'");
						$estadoescol=$estadoescol[0];
						$delegaescol=consultar("SELECT Municipio from escuelas where idEscuelas='".$numescuelas[$i]."'");
						$delegaescol=$delegaescol[0];
						$direescol=consultar("SELECT Direccion from escolaridad where fkEscuelas='".$numescuelas[$i]."'");
						$direescol=$direescol[0];
						$contadire=strlen($direescol);
						$calleEa="";
						$noextEA="";		
						for ($x=0; $x <$contadire ; $x++) { 
							if ($direescol[$x]=='|') {
								$cnoe=$x;
								break;
							}
							$calleEa.=$direescol[$x];
						}
						for ($x=$cnoe+1; $x < $contadire ; $x++) { 
							$noextEA.=$direescol[$x];
						}		
						$inicioescol=consultar("SELECT Inicio from escolaridad where fkEscuelas='".$numescuelas[$i]."'");
						$inicioescol=$inicioescol[0];
						$finescol=consultar("SELECT Fin from escolaridad where fkEscuelas='".$numescuelas[$i]."'");
						$finescol=$finescol[0];
						$aniosescol=consultar("SELECT Anios from escolaridad where fkEscuelas='".$numescuelas[$i]."'");
						$aniosescol=$aniosescol[0];
						$tituloescol=consultar("SELECT Titulo_recibido from escolaridad where fkEscuelas='".$numescuelas[$i]."'");
						$tituloescol=$tituloescol[0];
						$htmlescol="<div class='agregarEscuela'>
									<p class='header-escuela'>$nivelescol</p>
									<table class='table table-bordered table-sm'>
										<tr>
											<td class='labels'>
												<p>Nombre:</p>
											</td>
											<td>
												<p>$nombreescol</p>
											</td>
										</tr>
										<tr>
											<td class='labels'>
												<p>Estudiando en esta institución:</p>
											</td>
											<td>
												<p>No</p>
											</td>
										</tr>
										<tr>
											<td class='labels'>
												<p>Estado:</p>
											</td>
											<td>
												<p>$estadoescol</p>
											</td>
										</tr>
										<tr>
											<td class='labels'>
												<p>Delegación</p>
											</td>
											<td>
												<p>$delegaescol</p>
											</td>
										</tr>
										<tr>
											<td class='labels'>
												<p>Calle:</p>
											</td>
											<td>
												<p>$calleEa</p>
											</td>
										</tr>
										<tr>
											<td class='labels'>
												<p>Número Exterior:</p>
											</td>
											<td>
												<p>$noextEA</p>
											</td>
										</tr>
										<tr>
											<td class='labels'>
												<p>Año en que inició:</p>
											</td>
											<td>
												<p>$inicioescol</p>
											</td>
										</tr>
										<tr>
											<td class='labels'>
												<p>Año en que terminó:</p>
											</td>
											<td>
												<p>$finescol</p>
											</td>
										</tr>
										<tr>
											<td class='labels'>
												<p>Años estudiados:</p>
											</td>
											<td>
												<p>$aniosescol</p>
											</td>
										</tr>
										<tr>
											<td class='labels'>
												<p>Titulo Recibido:</p>
											</td>
											<td>
												<p>$tituloescol</p>
											</td>
										</tr>
									</table>
								</div>";
								echo "$htmlescol";

					}
				}
			}
				?>
				
			</div>
		</div>
		<div id="conocimientosGenerales" class="contenido">
			<hr>
			<h3>Conocimientos generales</h3>
			<hr>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<th>Idioma</th>
					<th>Nivel(porcentaje)</th>
					<th>Idioma</th>
					<th>Nivel(porcentaje)</th>
				</thead>
				<tbody>
					<?php echo "$htmlIdioma" ?>
				</tbody>
			</table>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<th>Software</th>
					<th>Nivel</th>
					<th>Software</th>
					<th>Nivel</th>
				</thead>
				<tbody>
					<?php echo "$htmlSoftware"?>
				</tbody>
			</table>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<th>Competencias</th>
					<th>Nivel</th>
					<th>Competencias</th>
					<th>Nivel</th>
				</thead>
				<tbody>
					<?php echo "$htmlCompetencias"?>									
				</tbody>
			</table>
		</div>
		<div class="contenido">
			<hr>
			<h3>Empleo Actual y Anteriores</h3>
			<hr>
			<table style="width: 50%;">
				<tr>
					<td class="labels">
						<p>¿Se puede pedir informes?</p>
					</td>
					<td class="text-left">
						<p><?php echo "$razones"?></p>
					</td>
				</tr>
			</table>
			<div class="empleo">
				<?php echo "$htmlEmpleo" ?>
			</div>
		</div>
		<div class="contenido">
			<hr>
			<h3>Referencias personales</h3>
			<hr>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<th>Nombre</th>
					<th>Domicilio</th>
					<th>Teléfono</th>
					<th>Ocupación</th>
					<th>Años Conociendo</th>
				</thead>
				<tbody>
					<?php echo "$htmlReferencia"?>		
				</tbody>
			</table>
		</div>
		<div class="contenido">
				<hr>
				<h3>Datos Economicos</h3>
				<hr>
				<table>
					<tr>
						<td class="labels"><p>Descripción de otros ingresos:</p></td>
						<td><p><?php echo "$otrosIngresos"?></p></td>
						<td class="labels"><p>Monto:</p></td>
						<td><p><?php echo "$otrosIngresosMonto"?></p></td>
					</tr>
					<tr>
						<td class="labels"><p>Valor aproximado de su casa propia:</p></td>
						<td><p><?php echo "$valorCasaPropia"?></p></td>
					</tr>
					<tr>
						<td class="labels"><p>Marca y modelo del automóvil</p></td>
						<td><p><?php echo "$modeloAuto"?></p></td>
						<td class="labels"><p>Año:</p></td>
						<td><p><?php echo "$montoAuto"?></p></td>
					</tr>
					<tr>
						<td class="labels"><p>Gastos Mensuales:</p></td>
						<td><p><?php echo "$gastosMensuales"?></p></td>
					</tr>
					<tr>
						<td class="labels"><p>Trabajo del Cónyuge</p></td>
						<td><p><?php echo "$trabajoConyuge"?></p></td>
						<td class="labels"><p>Percepción mensual</p></td>
						<td><p><?php echo "$montoConyuge"?></p></td>
					</tr>
					<tr>
						<td class="labels"><p>Renta mensual:</p></td>
						<td><p><?php echo "$rentaMensual"?></p></td>
					</tr>
					<tr>
						<td class="labels"><p>Importe de deudas:</p></td>
						<td><p><?php echo "$importeDeudas"?></p></td>
						<td class="labels"><p>¿Con quién?</p></td>
						<td><p><?php echo "$nombreDeudas"?></p></td>
						<td class="labels"><p>Abono Mensual:</p></td>
						<td><p><?php echo "$abonoMensual"?></p></td>
					</tr>
				</table>
			</div>
			<div class="contenido">
			<hr>
			<h3>Datos Generales</h3>
			<hr>
			
			<table  cellpadding="10" style="align-content: center;" class="dg">
				<?php echo "$htmldg"?>													
			</table>
		</div>
		<div class="contenido">
			<hr>
			<h3>Redes Sociales</h3>
			<hr>
			<table class="table table-bordered">
				<tr>
					<td>Facebook</td>
					<td><?php echo "$facebook" ?></td>
				</tr>
				<tr>
					<td>Twitter</td>
					<td><?php echo "$twitter";?></td>
				</tr>
				<tr>
					<td>Instagram</td>
					<td><?php echo "$instagram";?></td>
				</tr>
				<tr>
					<td>Youtube</td>
					<td><?php echo "$youtube";?></td>
				</tr>
			</table>
		</div>
		<div class="contenido">
			<hr>
			<h3>Contactos de emergencia</h3>	
			<hr>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<th>Nombre</th>
					<th>Parentesco</th>
					<th>Telefono</th>
				</thead>
				<tbody>
					<?php echo "$htmlContactos";?>
				</tbody>
			</table>
			<hr>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<th>Firma</th>
					<th>Firma de Recursos Humanos</th>
				</thead>
				<tbody>
					<tr>
						<td style="width: 50%; "><img id="firmaEmpleado" style="border-style: solid; border-color: #808080; border-width: 3px;width: 100%; height: 100%;" src="firmas/<?php echo($idEmp)?>.png"></td>
						<td style="width: 50%; "><img id="firmaEmpleado" style="border-style: solid; border-color: #808080; border-width: 3px;width: 100%; height: 100%;" src="firmas/<?php echo($idEmp)?>.png"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>




	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="script-prueba.js"></script>
</body>
</html>