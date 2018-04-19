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
	$link = mysqli_connect("localhost","root","root","empleadossmt") or die("No se pudo conectar: " .mysql_error());
	$acentos = $link->query("SET NAMES 'utf8'");
	mysqli_close($link);


	/*
	* @brief Abre y cierra una conexion con la base de datos para generar una consulta
	* @param query es el query que se va a ejecutar
	* @return retorna un array con el resultado del query ejecutado 
	*/
	function consultar($query){
		//Se abre una conexion
		$link = mysqli_connect("localhost","root","root","empleadossmt") or die("No se pudo conectar: " .mysql_error());
		$consulta =  mysqli_query($link,$query);			//Se ejecuta el qy¿uery
		while ($line = mysqli_fetch_array($consulta, MYSQLI_NUM)) { 	//obtiene una fila de la tabla resultante
		    foreach ($line as $col_value) {
		        $array[] = $col_value;				//el valor lo asignamos a un array
		    }
		}
		mysqli_close($link); 		//se cierra la conexion
		return $array;			//returnamos el array con los valor de la consulta
	}


	//Se inicia una sesion en el navegador
	session_start();
	//se le asigna el valor del id del empleado a la variable idEmp
	//$idEmp = $_SESSION["IDEMPL"];
	$idEmp = "100";
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
	for($i=0;$i<$length;$i++){
		$result .= $dependientes[$i]; //concatenacion de lo valores del array dependenetes
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
	$length = count($idTelefonos); //tamaño del arreglo de idTelefonos
	$tipoTelefonos = consultar("SELECT tipo FROM telefono WHERE fkEmpleado='".$idEmp."'");


	$telefonos = consultar("SELECT Telefono FROM telefono WHERE fkEmpleado='".$idEmp."'");
	for($i=0;$i<$length;$i+=2){  //for que recorre todos los telefonos del empleado y los va agregando a la tabla
		$isuma = $i+1;  //variable para poder acceder a la posicion i+1 del arreglo
		$htmltelefono .= "<tr><td>$tipoTelefonos[$i]</td><td>$telefonos[$i]</td><td>$tipoTelefonos[$isuma]</td><td>$telefonos[$isuma]</td></tr>"; // se concatena cada etiqueta <tr> con su contenido para despues insertarla al html
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
	$pasaporte = $pasaporte[0];
	$cartilla_sm = consultar("SELECT cartilla_sm FROM empleado WHERE idEmpleado='".$idEmp."'");
	if($cartilla_sm[0]==0){  //Si el empleado no tiene cartilla entonces indicamos que no tiene cartilla
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
	if($documento_extranjero==""){
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
	$length = count($nombreHijos);  //numero de hijos registrados
	$htmlHijos = "";  // variable donde se guardara todo el codigo HTML que se inyectara al html del pdf

	//Si no tiene hijos entonces se mostrara un mensaje en la tabla de hijos no registrados 
	if($length>0){
		for($i=0;$i<$length;$i++){
			$htmlHijos .= "<tr><td>$nombreHijos[$i]</td><td>$edadHijos[$i]</td></tr>";
		}
	}	else {
		$htmlHijos ="<tr><td colspan='2'><p style='font-size: 30px;' class='text-center'>SIN HIJOS</p></td></tr>";
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////
	// Llenado de la tabla de Conocimiento Generales   												 //
	///////////////////////////////////////////////////////////////////////////////////////////////////

	
	$idiomas = consultar("SELECT idioma FROM idioma JOIN empleado_idioma ON idIdioma=fkIdioma WHERE fkEmpleado='".$idEmp."' ORDER BY fkIdioma ASC");
	$nivelIdiomas = consultar("SELECT nivel FROM empleado_idioma WHERE fkEmpleado='".$idEmp."' ORDER BY fkIdioma ASC");
	$length = count($idiomas);  //Numero de idiomas
	$htmlIdioma = ""; //variable que contiene el codigo que se inyectara al PDF
	if($length>0){
		for ($i=0; $i < $length; $i+=2) {
			$imas = $i+1;  //variable para obtener el valor del arreglo en la posicion i+1
			$htmlIdioma .= "<tr><td>$idiomas[$i]</td><td>$nivelIdiomas[$i]</td><td>$idiomas[$imas]</td><td>$nivelIdiomas[$imas]</td></tr>";
 		}
	} else {			
		// en caso de no tener hijos se mostrara en la tabla que no tiene idiomas registrados
		$htmlIdioma = "<tr><td colspan='4'><p style='font-size: 30px;' class='text-center'>SIN IDIOMAS</p></td></tr>";
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
	 $length = count($tipoEmpleo);
	 for ($i=0; $i < $length; $i++) { 
	 	if($tipoEmpleo[$i]){
	 		$tipoEmpleo[$i] = "Actual";
	 	} else {
	 		$tipoEmpleo[$i] = "Anterior";
	 	}
	 }
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
							<td class='labels'><p>Empezo a prestar sus servicios:</p></td>
							<td>$tiempoInicioEmpleo[$i]</td>
						</tr>
						<tr>
							<td class='labels'><p>Termino de Prestar sus servicios:</p></td>
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


	 //////////////////////////////////////////////////////////////////////////////////////////////////
	 //   LLenado de la tabla de Referencias personales 											 //
	 //////////////////////////////////////////////////////////////////////////////////////////////////


	 $nombreReferencias = consultar("SELECT nombre FROM referencias WHERE fkEmpleado='".$idEmp."'");
	 $domicilioReferencias = consultar("SELECT domicilio FROM referencias WHERE fkEmpleado='".$idEmp."'");
	 $telefonoReferencias = consultar("SELECT telefono FROM referencias WHERE fkEmpleado='".$idEmp."'");
	 $ocupacionReferencias = consultar("SELECT ocupacion FROM referencias WHERE fkEmpleado='".$idEmp."'");
	 $tiempoConocerlo = consultar("SELECT tiempo_conocerlo FROM referencias WHERE fkEmpleado='".$idEmp."'");
	 $length = count($nombreReferencias);
	 $htmlReferencia = "";
	 for ($i=0; $i < $length; $i++) { 
	 	$htmlReferencia .= "<tr>
								<td>$nombreReferencias[$i]</td>
								<td>$domicilioReferencias[$i]</td>
								<td>$telefonoReferencias[$i]</td>
								<td>$ocupacionReferencias[$i]</td>
								<td>$tiempoConocerlo[$i]</td>
							</tr>";
	 }


	 ////////////////////////////////////////////////////////////////////////////////////////////////
	 //    Llenado del aparatado de datos economicos 											   //
	 ////////////////////////////////////////////////////////////////////////////////////////////////

	 $otrosIngresos = consultar("SELECT respuesta FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='1'");
	 $otrosIngresosMonto = consultar("SELECT monto FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='1'");
	 if($otrosIngresosMonto[0]!=0){
		$otrosIngresos = $otrosIngresos[0];
		$otrosIngresosMonto = $otrosIngresosMonto[0];
	} else {
		$otrosIngresos = "No tiene otros ingresos";
		$otrosIngresosMonto = "No aplica";
	}
	 $valorCasaPropia = consultar("SELECT monto FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='3'");
	 if($valorCasaPropia[0]==0)
	 	$valorCasaPropia = "Sin Casa propia";
	 else
	 	$valorCasaPropia = $valorCasaPropia[0];
	 $modeloAuto = consultar("SELECT respuesta FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='5'");
	 $montoAuto = consultar("SELECT monto FROM empleado_de WHERE fkEmpleado='".$idEmp."' && fkDE='5'");
	 if($montoAuto[0]!=0){
	 	$modeloAuto = $modeloAuto[0];
	 	$montoAuto = $montoAuto[0];
	 } else {
	 	$modeloAuto = "Sin automovil";
	 	$montoAuto = "No aplica";
	 }
	 $gastosMensuales = consultar("SELECT monto FROM empleado_de fkEmpleado='".$idEmp."' && fkDE='8'");
	 $gastosMensuales = $gastosMensuales[0];
	 $trabajoConyuge = consultar("SELECT respuesta FROM empleado_de fkEmpleado='".$idEmp."' && fkDE='2'");



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
					<div class="w-100"></div>
					<div class="col text-center">
						<p class="contacto mx-auto">marktac@marktac.com | Tel: 55-70-30-39-88</p>
					</div>
				</div>
			 	
			</div>
		</div>
	</header>


	<div class="informacion">
		<h1>Solicitud de Empleo</h1>
		<div class="contenido">
			<table class="infoBasica">
				<tr>
					<td id="foto"><img id="imgEmpleado" src="img/foto.jpg"></td>
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
						<p>Correo Electronico:</p>
						<p>Sexo:</p>
						<p>Orientación Sexual:</p>
						<p>Estado Civil:</p>
						<p>Lugar de Nacimiento:</p>
						<p>Fecha de Nacimiento:</p>
						<p>Estatura:</p>
						<p>Peso:</p>
						<p>Talla de camisa:</p>
						<p>Talla de pantalon:</p>
						<p>Pastel favorito:</p>
					</td>
					<td>
						<p><?php echo "$email";?></p>
						<p><?php echo "$sexo";?></p>
						<p><?php echo "$orientacion_sexual";?></p>
						<p><?php echo "$estado_civil"?></p>
						<p><?php echo "$lugar_nacimiento"?></p>
						<p><?php echo "$fecha_nacimiento"?></p>
						<p><?php echo "$estatura"?></p>
						<p><?php echo "$peso"?></p>
						<p><?php echo "$tallac"?></p>
						<p><?php echo "$tallap"?></p>
						<p><?php echo "$pastelf"?></p>
					</td>
					<td class="labels">
						<p>Estado:</p>
						<p>Municipio:</p>
						<p>Colonia:</p>
						<p>Calle:</p>
						<p>Codigo Postal:</p>
						<p>Numero Exterior:</p>
						<p>Numero Interior:</p>
						<p>Nacionalidad:</p>
						<p>Gelatina Favorita:</p>
						<p>Color Favorito:</p>
						<p>Comida Favorita:</p>
					</td>
					<td >
						<p><?php echo "$estado"?></p>
						<p><?php echo "$municipio"?></p>
						<p><?php echo "$colonia"?></p>
						<p><?php echo "$calle"?></p>
						<p><?php echo "$cp"?></p>
						<p><?php echo "$no_ext"?></p>
						<p><?php echo "$no_int"?></p>
						<p><?php echo "$nacionalidad"?></p>
						<p><?php echo "$gelatinaf"?></p>
						<p><?php echo "$colorf"?></p>
						<p><?php echo "$comidaf"?></p>
					</td>
				</tr>
				<tr>
					<td class="labels">
						<p>Vive con:</p>
					</td>
					<td><p><?php echo "$vive_con"?></p></td>
				</tr>
				<tr>
					<td class="labels"><p>Personas que dependen de usted:</p></td>
					<td><p><?php echo "$result"?></p></td>
				</tr>
			</table>
		</div>
		<div class="contenido" style=" page-break-before: always;">
			<hr>
			<h3>Telefonos</h3>
			<hr>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<th>Tipo</th>
					<th>Numero</th>
					<th>Tipo</th>
					<th>Numero</th>
				</thead>
				<tbody>
					<?php echo "$htmltelefono"?>
				</tbody>
			</table>
			<hr>
			<h3>Documentacion</h3>
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
						<p class="label">Numero licencia manejo:</p>
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
			<h3>Estado de salud y habitos personales</h3>
			<hr>
			<table id="tablaSalud" class="table table-bordered">
				<thead class="thead-dark">
					<th>Pregunta</th>
					<th>Respuesta</th>
				</thead>
				<tbody>
					<tr>
						<td>¿Como considera su estado de salud actual?</td>
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
						<td>¿Esta usted embarazada?</td>
						<td style="max-width: 500px"><?php echo "$preguntaSalud8"?></td>
					</tr>
					<tr>
						<td>¿Cual es su meta en la vida?</td>
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
					<tr>
						<td>Padre</td>
						<td>Nombre completo del padre</td>
						<td>Fallido</td>
						<td>Calle numero colonia localidad municipio esstado</td>
						<td>Empleado</td>
					</tr>
					<tr>
						<td>Madre</td>
						<td>Nombre completo del padre</td>
						<td>Fallido</td>
						<td>Calle numero colonia localidad municipio esstado</td>
						<td>Empleado</td>
					</tr>
					<tr>
						<td>Espos@</td>
						<td>Nombre completo del padre</td>
						<td>Fallido</td>
						<td>Calle numero colonia localidad municipio esstado</td>
						<td>Empleado</td>
					</tr>
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
				<div class="agregarEscuela">
					<p class="header-escuela">Nombre de la Escuela numero 1</p>
					<table class="table table-bordered table-sm">
						<tr>
							<td class="labels">
								<p>Nombre:</p>
							</td>
							<td>
								<p>Centro de estudios cientificos y tecnologicos "wilfridou masssiosadsf"</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Estudiando en esta institución:</p>
							</td>
							<td>
								<p>No</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Nivel:</p>
							</td>
							<td>
								<p>Nivel Media Superior</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Estado:</p>
							</td>
							<td>
								<p>Ciudad de Mexico</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Delegación</p>
							</td>
							<td>
								<p>Hidalgo</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Calle:</p>
							</td>
							<td>
								<p>Calle de la direccion baba</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Numero Exterior:</p>
							</td>
							<td>
								<p>123</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Año en que inicio:</p>
							</td>
							<td>
								<p>2012</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Año en que termino:</p>
							</td>
							<td>
								<p>2018</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Años estudiados:</p>
							</td>
							<td>
								<p>6</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Titulo Recibido:</p>
							</td>
							<td>
								<p>Ingeniero en optimación de espaciado de automovolies con especialidad en estacionamientos del IMSS</p>
							</td>
						</tr>
					</table>
				</div>
				<div class="agregarEscuela">
					<p class="header-escuela">Nombre de la Escuela numero 2</p>
					<table  class="table table-bordered table-sm">
						<tr>
							<td class="labels">
								<p>Nombre:</p>
							</td>
							<td>
								<p>Centro de estudios cientificos y tecnologicos "wilfridou masssiosadsf"</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Estudiando en esta institución:</p>
							</td>
							<td>
								<p>No</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Nivel:</p>
							</td>
							<td>
								<p>Nivel Media Superior</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Estado:</p>
							</td>
							<td>
								<p>Ciudad de Mexico</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Delegación</p>
							</td>
							<td>
								<p>Hidalgo</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Calle:</p>
							</td>
							<td>
								<p>Calle de la direccion baba</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Numero Exterior:</p>
							</td>
							<td>
								<p>123</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Año en que inicio:</p>
							</td>
							<td>
								<p>2012</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Horario:</p>
							</td>
							<td>
								<p>07:00-03:00</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Curso o Carrera:</p>
							</td>
							<td>
								<p>Ingenieria Agropecuaria</p>
							</td>
						</tr>
						<tr>
							<td class="labels">
								<p>Grado:</p>
							</td>
							<td>
								<p>4to Semestre</p>
							</td>
						</tr>
					</table>
				</div>
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
					<?php echo "$htmlIdioma" ?>;
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
						<td><p>Empresa propia</p></td>
						<td class="labels"><p>Monto:</p></td>
						<td><p>$11111111</p></td>
					</tr>
					<tr>
						<td class="labels"><p>Valor aproximado de su casa propia:</p></td>
						<td><p>$12341234214</p></td>
					</tr>
					<tr>
						<td class="labels"><p>Marca y modelo del automovil</p></td>
						<td><p>Bochito volksvagen</p></td>
						<td class="labels"><p>Año:</p></td>
						<td><p>2015</p></td>
					</tr>
					<tr>
						<td class="labels"><p>Gastos Mensuales:</p></td>
						<td><p>$12314324123</p></td>
					</tr>
					<tr>
						<td class="labels"><p>Trabajo del Conyúge</p></td>
						<td><p>No trabaja</p></td>
						<td class="labels"><p>Percepción mensual</p></td>
						<td><p>No aplica</p></td>
					</tr>
					<tr>
						<td class="labels"><p>Renta mensual:</p></td>
						<td><p>$12341234</p></td>
					</tr>
					<tr>
						<td class="labels"><p>Importe de deudas:</p></td>
						<td><p>$123123412</p></td>
						<td class="labels"><p>¿Con quien?</p></td>
						<td><p>Elektra</p></td>
						<td class="labels"><p>Abono Mensual:</p></td>
						<td><p>$12331235</p></td>
					</tr>
				</table>
			</div>
			<div class="contenido">
			<hr>
			<h3>Datos Generales</h3>
			<hr>
			
			<table  cellpadding="10" style="align-content: center;" class="dg">
				<tr>
					<td class="text-left">
						<p class="label">¿Como supo de este empleo?:</p>
					</td>
					<td>
						<p class="input">OCC MUNDIAL</p>
					</td>
					<td class="text-left">
						<p class="label">Seguro de vida:</p>
					</td>
					<td>
						<p class="input">21444125</p>
					</td>
				</tr>
				<tr>
					<td class="text-left">
						<p class="label">Parientes trabajando en la empresa:</p>
					</td>
					<td>
						<p class="input">Lorenita De la Santa Concepcion</p>
					</td>
					<td class="text-left">
						<p class="label">Puede Viajar:</p>
					</td>
					<td>
						<p class="input">No, mi familia depende mucho de mi</p>
					</td>								
				</tr>
				<tr>
					<td class="text-left">
						<p class="label">Empleado afianzado:</p>
					</td>
					<td>
						<p class="input">12341241234</p>
					</td>
					<td class="text-left">
						<p class="label">Puede cambiar de lugar de residencia:</p>
					</td>
					<td>
						<p class="input">No, mi familia deoende mucho de mi</p>
					</td>								
				</tr>
				<tr>
					<td class="text-left">
						<p class="label">Afiliación a sindicato:</p>
					</td>
					<td>
						<p class="input">Sindicato de trabajadores</p>
					</td>
					<td class="text-left">
						<p class="label">Fecha en que puede presentarse a trabajar:</p>
					</td>
					<td>
						<p class="input">2018/02/21</p>
					</td>								
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
					<tr>
						<td>Mary carmen gonzalez gonzalez</td>
						<td>Madre</td>
						<td>324321234</td>
					</tr>
					<tr>
						<td>Jorge Cedilo PEREZ</td>
						<td>Padre</td>
						<td>59482123</td>
					</tr>
					<tr>
						<td>Grizelda hernandez</td>
						<td>Esposa</td>
						<td>99234312</td>
					</tr>
					<tr>
						<td>Abril gomez manrique</td>
						<td>Hemrna</td>
						<td>889912342</td>
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