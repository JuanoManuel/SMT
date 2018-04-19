<?php
/**
*@file llenarbd.php
*@Author Jorge Arturo Cedillo González,Alberto Paredes Rivas,Juan Manuel Hernandez Hernandez
*@date 11/01/2018
*@brief Este documento será el encargado de que el formulario de la solicitud de empleo sea guardado con éxito en la base de datos.   
*/
include 'conmenu.php'; //Se importa el codigo necesario para la conexión con la base de datos.
header("Content-Type: text/html;charset=utf-8 ");//Header necesario para poder guardar acentos y caracteres especiales.
session_start();//Inicio de una sesion (necesaria para variables de sesion).
//header('Location: TomarFoto.html');//Header para re direccionar la pagina.

  function consultar($query){
    //Se abre una conexion
    $link = mysqli_connect("localhost","root","root","empleadossmt");
    $consulta =  mysqli_query($link,$query);      //Se ejecuta el qy¿uery
    $boolean=false;
    while ($line = mysqli_fetch_array($consulta, MYSQLI_NUM)) {   //obtiene una fila de la tabla resultante
        foreach ($line as $col_value) {
          $boolean=true;
            $array[] = $col_value;        //el valor lo asignamos a un array
        }
    }
    $consulta->free();
    mysqli_close($link);    //se cierra la conexion
    if ($boolean) {
      return $array;
    }else{
      return "no";
    }   //returnamos el array con los valor de la consulta
  }

/************************************************/
/*********INICIA DECLARACIÓN DE VARIABLES********/
/***********************************************/

/**
*@brief En la sguiente seccion se declaran todas las variables necesarias para llenar las tablas de la base de datos, las variables estan separadas en secciones dependiendo de a que seccion de la solicitud de empleo pertenecen. Para darle valor a las variables se usa el method post para que tomen el valor que esta en el formulario.
formato: $NombreVariable=$_POST["NAMEINPUT"]; eL nameinput es aquel que se le da a los objetos del html  con el parametro "name".
*/
//variables que no se encuentran en la solicitud o que no pertenecen a una sección en especifica de la solicitud de empleo.
$Status='Prospecto';
$Nivel='0';
$Contratacion="NULL";
$fecha_actual = date("Y-m-d"); //Función predeterminada para obtener la fecha actual. 
$puesto=$_POST["Puesto"];
if ($puesto=='Otros') {
  $puesto=$_POST["inputOtroPuesto"];
}
$sueldo=$_POST["inputSueldo"];
$Observaciones="NULL";
//Datos Personales
$ApeP=$_POST["inputApellidoPaterno"];
$numTelefonos=$_POST["numTelefonos"];
$ApeM=$_POST["inputApellidoMaterno"];
$Nombres=$_POST["inputNombre"];
$CorreoE=$_POST["inputCorreo"];
$Edad=$_POST["inputEdad"];
$Sexo=$_POST["inputSexo"];
$Orientacion=$_POST["inputOrientacionSexual"];
$EstadoC=$_POST["inputEstadoCivil"];
$EstadoEmpleado=$_POST["inputEstado"];
$Municipio=$_POST["inputMunicipio"];
$Colonia=$_POST["inputColonia"];
$Calle=$_POST["inputCalle"];
$NoEXT=$_POST["inputNumExt"];
$NoInt=$_POST["inputnumInt"];
$Nacionalidad=$_POST["inputNacionalidad"];
$fkdirecciones=$_POST["idDireccion"];
$fkNacionalidad='1';
$CP=$_POST["inputCP"];
$LugarN=$_POST["inputLugarNacimiento"];
$FechaN=$_POST["inputFechaNacimiento"];
$Estatura=$_POST["inputEstatura"];
$Peso=$_POST["inputPeso"];
$TelTipo=$_POST["comboTelefono"];
$NumeroTel=$_POST["inputTelefono"];
$ViveCon=$_POST["viveOptions"];
$DependeDe=$_POST["dependenOptions1"];
$DependeDe1=$_POST["dependenOptions2"];
$DependeDe2=$_POST["dependenOptions3"];
$DependeDe3=$_POST["dependenOptions4"];
$DependeDe4=$_POST["dependenOptions5"];
//Documentación
$CURP=$_POST["inputCurp"];
$AFORE=$_POST["inputAfore"];
$Pasaporte=$_POST["inputPasaporte"];
$NSS=$_POST["inputNSS"];
$CM=$_POST["inputCartilla"];
$CheckDE=$_POST["checkExtranjero"];
$TieneLDM=$_POST["checkLicencia"];
$RFC=$_POST["inputRFC"];
//Estado de salud y habutos personales
$contaidempleado='1';
$idEmp=$CURP[0].$CURP[1].$CURP[2].$CURP[3].$RFC[10].$RFC[11].$RFC[12].$CURP[15].$CURP[16].$CURP[17].'-'.$contaidempleado; //para el id del empleado tomamos los primeros 4 caracteres del curp,seguidos de los ultimos 3 del rfc y por ultimo los ultimos 3 del curp además de tener un numero el cual llevara un contral por si el empleado regresa despues de una inactividiad.

for ($i=0; $i < 8 ; $i++) { 
 $consulta=consultar("SELECT idEmpleado from empleado where idEmpleado='".$idEmp."'");
 if ($consulta=='no') {
      break;
      echo "Entre a la wea donde no existe ningun id ";
  }else{
    $contaidempleado++;
    $idEmp=$CURP[0].$CURP[1].$CURP[2].$CURP[3].$RFC[10].$RFC[11].$RFC[12].$CURP[15].$CURP[16].$CURP[17].'-'.$contaidempleado;
     echo "Entre a la wea en la que le doy valor al id";
  } 

}
$_SESSION["IDEMPL"]=$idEmp;
$SaludActual=$_POST["inputEstadoSalud"];
if ($SaludActual=='Malo') {
  $SaludActual=$_POST["inputDetallesSalud"];
}
$TipoSangre=$_POST["inputTipoSangre"];
$chekPS1=$_POST["checkPreguntaSalud1"];
$espePS1=$_POST["inputPreguntaSalud1"];
$chekPS2=$_POST["checkPreguntaSalud2"];
$espePS2=$_POST["inputPreguntaSalud2"];
$chekPS3=$_POST["checkPreguntaSalud3"];
$espePS3=$_POST["inputPreguntaSalud3"];
$chekPS4=$_POST["checkPreguntaSalud4"];
$espePS4=$_POST["inputPreguntaSalud4"];
$chekPS5=$_POST["checkPreguntaSalud5"];
$espePS5=$_POST["inputPreguntaSalud5"];
$chekPS6=$_POST["checkPreguntaSalud6"];
$espePS6=$_POST["inputPreguntaSalud6"];
$cheKPS7=$_POST["checkPreguntaSalud7"];
$espePS7=$_POST["inputPreguntaSalud7"];
$MetaVida=$_POST["inputMetaVida"];
//Datos Familiares
$NombreFAM1=$_POST["inputNombreFamiliar1"];
$ViveFAM1=$_POST["checkFamiliar1"];
$DomicilioFAM1=$_POST["inputDomicilioFamilia1"];
$OcupacionFAM1=$_POST["inputFamiliarOcupacion1"];
$NombreFAM2=$_POST["inputNombreFamiliar2"];
$ViveFAM2=$_POST["checkFamiliar2"];
$DomicilioFAM2=$_POST["inputDomicilioFamilia2"];
$OcupacionFAM2=$_POST["inputFamiliarOcupacion2"];
$NombreFAM3=$_POST["inputNombreFamiliar3"];
$ViveFAM3=$_POST["checkFamiliar3"];
$DomicilioFAM3=$_POST["inputDomicilioFamilia3"];
$OcupacionFAM3=$_POST["inputFamiliarOcupacion3"];
$numHijos=$_POST["numHijos"];
//Escolaridad
$numEsceulas=$_POST["numEscuela"];//esta es una variable de control, que nos dira cuantas escuelas registro el empleado.
//Conocimientos generales
$Numidiomas=$_POST["numIdiomas"];
$NivelWindows=$_POST["selectWindows"];
$NivelIOS=$_POST["selectIOS"];
$NivelAndrois=$_POST["selectAndroid"];
$NivelLinux=$_POST["selectLinux"];
$CheKOtrosSO=$_POST["checkOtrosOS"];
$OtroSO=$_POST["inputOtroSistemaOperativo"];
$NivelOS=$_POST["selectOtrosOS"];
$NivelFace=$_POST["selectFacebook"];
$NivelTwitter=$_POST["selectTwitter"];
$NivelPinterest=$_POST["selectPinterest"];
$NivelYoutube=$_POST["selectYoutube"];
$NivelLinkedin=$_POST["selectLinkedin"];
$ChekOtrosRS=$_POST["checkOtrosRS"];
$OtraRS=$_POST["inputOtraRedSocial"];
$NivelOtraRS=$_POST["selectOtrosRS"];
$NivelExcel=$_POST["selectExcel"];
$NivelWord=$_POST["selectWord"];
$NivelOutlook=$_POST["selectOutlook"];
$NivelPowerPoint=$_POST["selectPowerPoint"];
$NivelAcces=$_POST["selectAccess"];
$NivelPublisher=$_POST["selectPublisher"];
$NivelWhatsapp=$_POST["selectWhatsapp"];
$NivelSkype=$_POST["selectSkype"];
$NivelOneDrive=$_POST["selectOnedrive"];
$ChekOtrosAPPS=$_POST["checkOtrosApp"];
$OtraAPPS=$_POST["inputOtraAplicacion"];
$NivelOtraApp=$_POST["selectOtrosApp"];
$NumOtrosS=$_POST["numSoft"];//variable de control para saber cuantos software adicionales agrego el empleado
$NivelEtica=$_POST["selectEtica"];
$NivelCAnalisis=$_POST["selectCDA"];
$NivelTD=$_POST["selectTD"];
$NivelCreatividad=$_POST["selectCreatividad"];
$NivelHV=$_POST["selectHV"];
$NivelOR=$_POST["selectOR"];
$NivelIniciativa=$_POST["selectIniciativa"];
$NivelDisciplina=$_POST["selectDisciplina"];
$NivelLiderazgo=$_POST["selectLiderazgo"];
$NivelEmpatia=$_POST["selectEmpatia"];
$NivelPerssitencia=$_POST["selectPersistencia"];
$NivelCompromiso=$_POST["selectCompromiso"];
$NivelAutoconfianza=$_POST["selectAutoconfianza"];
$NivelAdaptabilidad=$_POST["selectAdaptabilidad"];
$NivelIndependencia=$_POST["selectIndependencia"];
$NivelIndagación=$_POST["selectIndagacion"];
$NivelTE=$_POST["selectTE"];
$NivelSeguimiento=$_POST["selectSeguimiento"];
$NivelVison=$_POST["selectVision"];
$NivelOrganizacion=$_POST["selectOrganizacion"];
$NivelAutocontrol=$_POST["selectAutocontrol"];
$NivelPlanificacion=$_POST["selectPlanificacion"];
$NivelDG=$_POST["selectDG"];
$NivelDelegacion=$_POST["selectDelegar"];
$NivelTF=$_POST["selectTF"];
$NivelMotivacion=$_POST["selectMotivacion"];
$NivelCG=$_POST["selectCG"];
$NivelPersuacion=$_POST["selectPersuacion"];
$NivelSR=$_POST["selectSeguirInstrucciones"];
$NivelApegado=$_POST["selectApegadoInstrucciones"];
//Empleo Actual y Anteriores 
$numEmpleos=$_POST["numEmpleo"];//variable de control para saber cuantos empleos agrego
$CheckInformes=$_POST["checkPedirInformes"];
//Referencias personales (Favor de no incluir jefes anteriores)
$NombreReferencia1=$_POST["inputNombreReferencia"];
$DomicilioReferencia1=$_POST["inputDomicilioReferencia"];
$TelefonoReferencia1=$_POST["inputTelefonoReferencia"];
$OcupacionReferencia1=$_POST["inputOcupacionReferencia"];
$AnoConociendoloReferencia1=$_POST["inputTimepoConociendo"];
$NombreReferencia2=$_POST["inputNombreReferencia1"];
$DomicilioReferencia2=$_POST["inputDomicilioReferencia1"];
$TelefonoReferencia2=$_POST["inputTelefonoReferencia1"];
$OcupacionReferencia2=$_POST["inputOcupacionReferencia1"];
$AnoConociendoloReferencia2=$_POST["inputTimepoConociendo1"];
$NombreReferencia3=$_POST["inputNombreReferencia2"];
$DomicilioReferencia3=$_POST["inputDomicilioReferencia2"];
$TelefonoReferencia3=$_POST["inputTelefonoReferencia2"];
$OcupacionReferencia3=$_POST["inputOcupacionReferencia2"];
$AnoConociendoloReferencia3=$_POST["inputTimepoConociendo2"];
$NombreReferencia4=$_POST["inputNombreReferencia3"];
$DomicilioReferencia4=$_POST["inputDomicilioReferencia3"];
$TelefonoReferencia4=$_POST["inputTelefonoReferencia3"];
$OcupacionReferencia4=$_POST["inputOcupacionReferencia3"];
$AnoConociendoloReferencia4=$_POST["inputTimepoConociendo3"];
$NombreReferencia5=$_POST["inputNombreReferencia4"];
$DomicilioReferencia5=$_POST["inputDomicilioReferencia4"];
$TelefonoReferencia5=$_POST["inputTelefonoReferencia4"];
$OcupacionReferencia5=$_POST["inputOcupacionReferencia4"];
$AnoConociendoloReferencia5=$_POST["inputTimepoConociendo4"];
//Datos Economicos
$CheckOtrosI=$_POST["Ingresos"];
$OtrosI=$_POST["inputMontoIngresos"];
$DescripOI=$_POST["DesOI"];
$CheckConyugue=$_POST["Conyugue"];
$PercepcionContugue=$_POST["PercepcionMC"];
$DondeConyugue=$_POST["inputConyugeDonde"];
$CheckCasaPropia=$_POST["Casa"];
$ValorCasa=$_POST["inputValorC"];
$CheckRenta=$_POST["Renta"];
$MontoRenta=$_POST["inputRM"];
$CheckAuto=$_POST["Auto"];
$MarcaAuto=$_POST["inputMaraC"];
$ModeloAuto=$_POST["ModeloC"];
$AbodonoDeuda=$_POST["AbonoC"];
$CheckDeudas=$_POST["Deudas"];
$MontoDeuda=$_POST["inportMD"];
$QuienDeuda=$_POST["QuienD"];
$GastosMensuales=$_POST["GastosM"];
//Datos Generales
$ComoSupoEmleo=$_POST["selectSaberEmpleo"];
$EspecificarEmpleo=$_POST["EspecifiqueSE"];
$CheckPariente=$_POST["ParientesOptions"];
$NombreParientes=$_POST["NombreParientes"];
$CheckAfian=$_POST["Afian"];
$AfianzadoCia=$_POST["inputCiaA"];
$CheckSindi=$_POST["Sind"];
$SindicatoCia=$_POST["inputCiaS"];
$CheckSeguroV=$_POST["Segurovi"];
$SeguroVidaCia=$_POST["inputCiaSV"];
$CheckViajar=$_POST["Viajar"];
$RazonViajar=$_POST["inputRazonesViajar"];
$CheckCambiarRD=$_POST["Residcenia"];
$RazonCambiarD=$_POST["inputRazonesCambioR"];
$FechaTrabajar=$_POST["FechaTrabajar"];
//Datos extra
$TallaCamisa=$_POST["inputTallaCamisa"];
$TallaPantalon=$_POST["inputTallaPantalon"];
$TipoSangre=$_POST["inputTipoSangre"];
$PastelFavorito=$_POST["inputPastel"];
$GelatinaFavorito=$_POST["inputGelatina"];
$ColorFavorito=$_POST["inputColor"];
$ComidaFavorita=$_POST["inputComida"];
$CE1Nombre=$_POST["NombreCE1"];
$CE1Parentesco=$_POST["ParentescoCE1"];
$CE1Telefono=$_POST["TelefonoCE1"];
$CE2Nombre=$_POST["NombreCE2"];
$CE2Parentesco=$_POST["ParentescoCE2"];
$CE2Telefono=$_POST["TelefonoCE2"];
$CE3Nombre=$_POST["NombreCE3"];
$CE3Parentesco=$_POST["ParentescoCE3"];
$CE3Telefono=$_POST["TelefonoCE3"];
$CE4Nombre=$_POST["NombreCE4"];
$CE4Parentesco=$_POST["ParentescoCE4"];
$CE4Telefono=$_POST["TelefonoCE4"];
$cuentaface=$_POST["inputFacebook"];
$cuentayoutube=$_POST["inputYoutube"];
$cuentatwitter=$_POST["inputTwitter"];
$cuentainstagram=$_POST["inputInstagram"];

/****************************************/
/********Termino seccion de variables****/
/****************************************/


/*****************************************************/
/******Inicia seccion de llenado de base de datos****/
/****************************************************/
/**
@brief En esta sección se llenaran las tablas de las bases de datos además de presentarse algunas validaciones así como unas cuantas declaraciones de variables. 
*/

/**********************************************
Tabla empleado
***********************************************/

//tabla empleado
$querynacio="SELECT idNacionalidad from nacionalidad  where Nombre='$Nacionalidad'";//consulta para obtener el id de la nacionalidad ele mpleado
$resultadoNacio=mysqli_query($conexion,$querynacio);//funcion de php que realiza una consulta o query teniendo como parametro al conexion a la base y el query
$row=mysqli_fetch_array($resultadoNacio, MYSQLI_NUM);//se guarda la consulta como un array numerico
$idnaci=$row[0];
//la siguiente condicional sirve para guardar si el empleado autorizo o no que se permita pedir informes sobre el. 1=si, 0=no.
if ($CheckInformes=='Si') { 
  $Razones="Si";
  $razonesb=1;
}else{
  $Razones=$_POST["inputRazonesInformes"];
  $CheckInformes="No";
  $razonesb=0;
}
//condicional para saber si el empleado es extranjero
if ($CheckDE='Si') {
  $DocuExtranjero=$_POST["inputDocExtranjero"];
}else{
  $DocuExtranjero="";
}
//condicional para saber si el empleado cuenta con una licencia de manejo
if ($TieneLDM='Si') {
  $TipoLM=$_POST["inputTipoLicencia"];
  $NoL=$_POST["inputLicencia"];
}
else{
  $TipoLM="NULL";
  $NoL="NULL";
}

$insertarempleado="INSERT INTO empleado(idEmpleado,Nombre, ApellidoP,ApellidoM,Edad,Lugar_nacimiento,Sexo,Fecha_nacimiento,Estatura,Peso,Estado_civil,NSS,CURP,Afore,Cartilla_SM,Pasaporte,Licencia_Manejo,Sueldo_esperado,Observaciones,Fecha_registro,Estatus,RFC,Orientacion_sexual,Nivel,Fecha_contratacion,Documento_extranjero,Calle,No_ext,No_int,fkNacionalidad,fkDirecciones,Tallac,Tallap,Pastelf,Colorf,Gelatinaf,Comidaf,Puesto_solicitado,Tipo_licencia_manejo,Razon_empleo,Correo) values ('$idEmp','$Nombres','$ApeP','$ApeM',$Edad,'$LugarN','$Sexo','$FechaN',$Estatura,$Peso,'$EstadoC','$NSS','$CURP','$AFORE','$CM','$Pasaporte','$NoL',$sueldo,'$Observaciones','$fecha_actual','$Status','$RFC','$Orientacion','$Nivel',$Contratacion,'$DocuExtranjero','$Calle','$NoEXT','$NoInt','".$idnaci."','$fkdirecciones','$TallaCamisa',$TallaPantalon,'$PastelFavorito','$ColorFavorito','$GelatinaFavorito','$ComidaFavorita','$puesto','$TipoLM','$Razones','$CorreoE')";
$resultadoEmpleado=mysqli_query($conexion,$insertarempleado) or die(mysqli_error($conexion)) ;//funcion de php que realiza el query teniendo como parametros la conexion y el query.
//condicional para saber si el insert a empleado funciono o no.
if(!$resultadoEmpleado){
  echo 'Error al registrar empleado';
  echo "<br>";
}else{
  echo 'Registro exitoso empleado';
  echo "<br>";
}


/*************************************
TABLA REFERENCIAS
*************************************/
//referencias
//array en el que se guardaran las variables de referencia para que sea mas sencillo hacer el insert a la tabla de referencias.
$arrayreferencias= array($NombreReferencia1,$DomicilioReferencia1,$TelefonoReferencia1,$OcupacionReferencia1,$AnoConociendoloReferencia1,$NombreReferencia2,$DomicilioReferencia2,$TelefonoReferencia2,$OcupacionReferencia2,$AnoConociendoloReferencia2,$NombreReferencia3,$DomicilioReferencia3,$TelefonoReferencia3,$OcupacionReferencia3,$AnoConociendoloReferencia3,$NombreReferencia4,$DomicilioReferencia4,$TelefonoReferencia4,$OcupacionReferencia4,$AnoConociendoloReferencia4,$NombreReferencia5,$DomicilioReferencia5,$TelefonoReferencia5,$OcupacionReferencia5,$AnoConociendoloReferencia5);
$LarrayR=count($arrayreferencias);//funcion que cuenta los elementos dentro del array;
for($i=0; $i<$LarrayR; $i=$i+5)//ciclo for para que el insert se repita 5 veces, lo cual reduce el numero de lineas.
      {
        $i1=$i+1;//se crea una variable con un valor +1 al contador para poder acceder ala siguiente posicion del array.
        $i2=$i+2;//se crea una variable con un valor +2 al contador
        $i3=$i+3;//se crea una variable con un valor +3 al contador
        $i4=$i+4;//se crea una variable con un valor +4 al contador
        if($arrayreferencias[$i]==""){//este if servira como validación, ya que el nombre de la referencia no debe estar vacio para que este sea introducido en la base dedatos(se permitira introducir una referencia aunque falten los demas datos).

        }
        else{
        $insertarreferencias="INSERT INTO referencias(Nombre,Domicilio,Telefono,Ocupacion,Tiempo_conocerlo,fkEmpleado) values('$arrayreferencias[$i]','$arrayreferencias[$i1]','$arrayreferencias[$i2]','$arrayreferencias[$i3]','$arrayreferencias[$i4]','$idEmp') ";
        $resultadoreferencia=mysqli_query($conexion,$insertarreferencias);

    if(!$resultadoreferencia){
      echo 'Error al registrar referencias';
      echo "<br>";

    }else{
      echo 'Registro exitoso referencias';
      echo "<br>";
    }
    }

      }
/***************************************
TABLA EMPLEADO_ES(Estado de salud)
****************************************/
//Preguntas salud
      //En esta parte se llenará la información sobre las preguntas de salud, se hará la validación para saber si el checkbox de cada pregunta fue clikeado o no, en caso de que si, se guardara la respuesta, en caso de que no, se guardara como respuesta un “NO”. (hay 2 preguntas las cuales no tiene checkbox, por lo tanto, se guarda la respuesta directamente)  
     if ($chekPS1=='Si') {
        $inserPS1="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','1','$espePS1')";
      }
      else
      {
        $inserPS1="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','1','No')";
      }
      $resultadoinserPS1=mysqli_query($conexion,$inserPS1);
      if(!$resultadoinserPS1){
      echo 'Error al registrar 1';
    }else{
      echo 'Registro exitoso 1';
    }
    $resultadoinserPS1->free();

    if ($cheKPS7=='Si') {
        $inserPS2="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','2','$espePS7')";
      }
      else{
        $inserPS2="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','2','No')";
      }
      $resultadoinserPS2=mysqli_query($conexion,$inserPS2);
      if(!$resultadoinserPS2){
      echo 'Error al registrar 2';
    }else{
      echo 'Registro exitoso 2';
    }
    $resultadoinserPS2->free();

    if ($chekPS6=='Si') {
        $inserPS3="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','3','$espePS6')";
      }
      else{
        $inserPS3="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','3','No')";
      }
      $resultadoinserPS3=mysqli_query($conexion,$inserPS3);
      if(!$resultadoinserPS3){
      echo 'Error al registrar 3';
    }else{
      echo 'Registro exitoso 3';
    }
    $resultadoinserPS3->free();



    $insertPS4="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','4','$SaludActual')";
    $resultadoinserPS4=mysqli_query($conexion,$insertPS4);
    if(!$resultadoinserPS4){
      echo 'Error al registrar 4';
    }else{
      echo 'Registro exitoso 4';
    }
    $resultadoinserPS4->free();
    if ($chekPS2=='Si') {
        $inserPS5="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','5','$espePS2')";
      }
      else{
        $inserPS5="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','5','No')";
      }
      $resultadoinserPS5=mysqli_query($conexion,$inserPS5);
      if(!$resultadoinserPS5){
      echo 'Error al registrar 5';
    }else{
      echo 'Registro exitoso 5';
    }
     $resultadoinserPS5->free();
    if ($chekPS3=='Si') {
        $inserPS6="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','6','$espePS3')";
      }
      else{
        $inserPS6="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','6','No')";
      }
      $resultadoinserPS6=mysqli_query($conexion,$inserPS6);
      if(!$resultadoinserPS6){
      echo 'Error al registrar 6';
    }else{
      echo 'Registro exitoso 6';
    }
    $resultadoinserPS6->free();

    if ($chekPS4=='Si') {
        $inserPS7="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','7','$espePS4')";
      }
      else{
        $inserPS7="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','7','No')";
      }
      $resultadoinserPS7=mysqli_query($conexion,$inserPS7);
      if(!$resultadoinserPS7){
      echo 'Error al registrar 7';
    }else{
      echo 'Registro exitoso 7';
    }
    $resultadoinserPS7->free();

    $inserPS8="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','8','$MetaVida')";
    $resultadoinserPS8=mysqli_query($conexion,$inserPS8);
    if(!$resultadoinserPS8){
      echo 'Error al registrar 8';
    }else{
      echo 'Registro exitoso 8';
    }
    $resultadoinserPS8->free();
     $inserPS9="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','9','$TipoSangre')";
    $resultadoinserPS9=mysqli_query($conexion,$inserPS9);
    if(!$resultadoinserPS9){
      echo 'Error al registrar 9';
    }else{
      echo 'Registro exitoso 9';
    }
    $resultadoinserPS9->free();

    if ($chekPS5=='Si') {
        $inserPS10="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','10','$espePS5')";
      }
      else{
        $inserPS10="INSERT INTO empleado_es(fkEmpleado,fkSH,Respuesta) values ('$idEmp','10','no')";
      }
      $resultadoinserPS10=mysqli_query($conexion,$inserPS10);
      if(!$resultadoinserPS10){
      echo 'Error al registrar 10';
    }else{
      echo 'Registro exitoso 10';
    }
    $resultadoinserPS10->free();
/**************************************************
TABLA VIVE_CON(personas que viven con el empleado)
***************************************************/
//vive con
$insertViveCon="INSERT INTO vive_con(Vive,fkEmpleado) values ('$ViveCon','$idEmp')";
$resultadoViveCon=mysqli_query($conexion,$insertViveCon);
if(!$resultadoViveCon){
      echo 'Error al registrar VIVE CON';
    }else{
      echo 'Registro exitoso VIVE CON';
    }
    $resultadoViveCon->free();
/******************************************************
TABLA DEPENDIENTES(personas que dependen del empleado)
*******************************************************/
//DEPENDE DE
    //se hace el insert por separado de las personas que dependen de la persona 
if ($DependeDe=="") {
}else{
  $insertDependede="INSERT INTO dependientes(Nombre,fkEmpleado) values ('$DependeDe','$idEmp')";
  $resultadoDependede=mysqli_query($conexion,$insertDependede);
  if(!$resultadoDependede){
      echo 'Error al registrar depende';
    }else{
      echo 'Registro exitoso depende';
    }
}
$resultadoDependede->free();

if ($DependeDe1=="") {
}else{
  $insertDependede1="INSERT INTO dependientes(Nombre,fkEmpleado) values ('$DependeDe1','$idEmp')";
  $resultadoDependede1=mysqli_query($conexion,$insertDependede1);
  if(!$resultadoDependede1){
      echo 'Error al registrar depende1';
    }else{
      echo 'Registro exitoso depende1';
    }
}
$resultadoDependede1->free();

if ($DependeDe2=="") {
}else{
  $insertDependede2="INSERT INTO dependientes(Nombre,fkEmpleado) values ('$DependeDe2','$idEmp')";
  $resultadoDependede2=mysqli_query($conexion,$insertDependede2);
  if(!$resultadoDependede2){
      echo 'Error al registrar depende2';
    }else{
      echo 'Registro exitoso depende2';
    }
}
$insertDependede2->free();

if ($DependeDe3=="") {
}else{
  $insertDependede3="INSERT INTO dependientes(Nombre,fkEmpleado) values ('$DependeDe3','$idEmp')";
  $resultadoDependede3=mysqli_query($conexion,$insertDependede3);
  if(!$resultadoDependede3){
      echo 'Error al registrar depende3';
    }else{
      echo 'Registro exitoso depende3';
    }
}
$resultadoDependede3->free();
if ($DependeDe4=="") {
}else{
  $insertDependede4="INSERT INTO dependientes(Nombre,fkEmpleado) values ('$DependeDe4','$idEmp')";
  $resultadoDependede4=mysqli_query($conexion,$insertDependede4);
  if(!$resultadoDependede4){
      echo 'Error al registrar depende4';
    }else{
      echo 'Registro exitoso depende4';
    }
}
$resultadoDependede4->free();
/**************************************
TABLA EMPLEADO_SOFTWARE
***************************************/
//Software que maneja
//el array de software nos servira para reducir codigo pero ademas estan ordenados igualmente que el catalogo de software, esto nos ayudara a que podamos saber el id del software con un contador. 
$arraynivelsoftware=array($NivelWindows,$NivelIOS,$NivelAndrois,$NivelExcel,$NivelPowerPoint,$NivelWord,$NivelOutlook,$NivelAcces,$NivelPublisher,$NivelFace,$NivelTwitter,$NivelPinterest,$NivelYoutube,$NivelLinkedin,$NivelWhatsapp,$NivelSkype,$NivelLinux,$NivelOneDrive);
$LAS=count($arraynivelsoftware);
$contasoftware=0;
for ($x=1; $x<=$LAS ; $x++) { 
  //para este for tendremos dos contadores, x que nos dara el fksoftware el cual esta definido en el catalogo de software. El contador contasoftware, nos servira para para tomar los valores del array que empiezan desde 0.
  $insertSoftware="INSERT INTO empleado_software(fkSoftware,fkEmpleado,Nivel) values ('$x','$idEmp','$arraynivelsoftware[$contasoftware]')";
  $resultadoSoftware=mysqli_query($conexion,$insertSoftware);

  if(!$resultadoSoftware){
      echo 'Error al registrar Software';
      echo "<br>";
    }else{
      echo 'Registro exitoso Software ';
      echo "<br>";
    }
    $contasoftware++;
}
$resultadoSoftware->free();
//Las siguientes condicionales nos servirán para saber si el empleado o solicitante introdujo un nuevo software o aplicación.  
if ($CheKOtrosSO=='Si') {
  $insertOTROSO="INSERT INTO software(Nombre) values ('$OtroSO')";
  $resultadoIOSO=mysqli_query($conexion,$insertOTROSO);//se inserta el nuevo SO en la tabla de software
    if(!$resultadoIOSO){
      echo 'Error al registrar nuevo Software';
      echo "<br>";
    }else{
      echo 'Registro exitoso nuevo Software ';
      echo "<br>";
    }
    $resultadoIOSO->free();

    $last_id = mysqli_insert_id($conexion);//Con esta función de php podremos saber el id ultimo id del ultimo registro que se hizo en la base de datos.

    $insertNOSO="INSERT INTO empleado_software(fkSoftware,fkEmpleado,Nivel) values ('$last_id','$idEmp','$NivelOS')";//last id es el id del software extra que añadio el empleado.
    $resultadoOTROSOSO=mysqli_query($conexion,$insertNOSO);
        if(!$resultadoOTROSOSO){
      echo 'Error al registrar otro Software';
      echo "<br>";
    }else{
      echo 'Registro exitoso otro Software ';
      echo "<br>";
    }
    $resultadoOTROSOSO->free();

}

if ($ChekOtrosRS=='Si') {//se repite el mismo proceso, lo unico que cambia seran las variables de la validacionen, la variable que guarda el last insert y la variable del insert.
  $insertOTRORS="INSERT INTO software(Nombre) values ('$OtraRS')";
  $resultadoORS=mysqli_query($conexion,$insertOTRORS);
    if(!$resultadoORS){
      echo 'Error al registrar Nuevo rs';
      echo "<br>";
    }else{
      echo 'Registro exitoso Nuevo rs';
      echo "<br>";
    }
    $resultadoORS->free();
    $last_id1 = mysqli_insert_id($conexion);

    $insertNORS="INSERT INTO empleado_software(fkSoftware,fkEmpleado,Nivel) values ('$last_id1','$idEmp','$NivelOtraRS')";
    $resultadoORSE=mysqli_query($conexion,$insertNORS);
        if(!$resultadoORSE){
      echo 'Error al registrar otro rs';
      echo "<br>";
    }else{
      echo 'Registro exitoso otro rs ';
      echo "<br>";
    }
    $resultadoORSE->free();

}

if ($ChekOtrosAPPS=='Si') {//se repite el proceso
  $insertOTRASAPP="INSERT INTO software(Nombre) values ('$OtraAPPS')";
  $resultadoOAPP=mysqli_query($conexion,$insertOTRASAPP);
    if(!$resultadoOAPP){
      echo 'Error al registrar NuevA APP';
      echo "<br>";
    }else{
      echo 'Registro exitoso NuevA APP';
      echo "<br>";
    }
    $resultadoOAPP->free();
    $last_id2 = mysqli_insert_id($conexion);

    $insertNOAP="INSERT INTO empleado_software(fkSoftware,fkEmpleado,Nivel) values ('$last_id2','$idEmp','$NivelOtraApp')";
    $resultadoNOAP=mysqli_query($conexion,$insertNOAP);
        if(!$resultadoNOAP){
      echo 'Error al registrar NIVEL otro APP';
      echo "<br>";
    }else{
      echo 'Registro exitoso NIVEL OTRO APP';
      echo "<br>";
    }
    $resultadoNOAP->free();
}
/*******************************************
TABLA EMPLEADO_COMP
*******************************************/

//Competencias
//EL metodo usado para insertar los valores en esta tabla es muy similar al metodo para insertar el nivel del software que tiene el empleado. 
$arrayCOMPETENCIAS=array($NivelEtica,$NivelCAnalisis,$NivelTD,$NivelCreatividad,$NivelHV,$NivelOR,$NivelIniciativa,$NivelDisciplina,$NivelPerssitencia,$NivelCompromiso,$NivelAutoconfianza,$NivelAdaptabilidad,$NivelIndependencia,$NivelIndagación,$NivelTE,$NivelSeguimiento,$NivelOrganizacion,$NivelPlanificacion,$NivelDG,$NivelDelegacion,$NivelAutocontrol,$NivelMotivacion,$NivelCG,$NivelLiderazgo,$NivelVison,$NivelPersuacion,$NivelEmpatia,$NivelTF,$NivelSR,$NivelApegado);
$LACom=count($arrayCOMPETENCIAS);
for ($y=0; $y <$LACom ; $y++) { 
  $y2=$y+1;//el contador y sera para el control del array mientras que y2 sera para representar el id de la competencia 
  $insertCOMP="INSERT INTO empleado_comp(fkEmpleado,fkCompetencias,Nivel) values ('$idEmp','$y2','$arrayCOMPETENCIAS[$y]')";
  $ResultadoComp=mysqli_query($conexion,$insertCOMP);
      if(!$ResultadoComp){
      echo 'Error al registrar COMP'.$y;
      echo "<br>";
    }else{
      echo 'Registro exitoso COM'.$y;
      echo "<br>";
    }


}
$ResultadoComp->free();

/***************************************
TABLA EMPLEADO_DE(DATOS ECONOMICOS)
****************************************/
//Datos economicos 
if($CheckOtrosI=='Si'){//En caso de que clickee el checkbox se guardara la descripcion y el monto de la pregunta, en caso de que no se guardara un "no" en respuesta y un "0" en monto.
  $insertOI="INSERT INTO empleado_de(fkEmpleado,fkDE,Respuesta,Monto) values ('$idEmp','1','$DescripOI','$OtrosI')";
  $resultadoOI=mysqli_query($conexion,$insertOI);
  if(!$resultadoOI){
    echo 'Error al registrar Otros ingresos';
    echo "<br>";
  }else{
    echo 'Registro exitoso otros ingresos';
    echo "<br>";
  }
}else{
  $insertOI="INSERT INTO empleado_de(fkEmpleado,fkDE,Respuesta,Monto) values ('$idEmp','1','No','0')";
  $resultadoOI=mysqli_query($conexion,$insertOI);
  if(!$resultadoOI){
    echo 'Error al registrar Otros ingresos';
    echo "<br>";
  }else{
    echo 'Registro exitoso otros ingresos';
    echo "<br>";
  }
}
$resultadoOI->free();

if($CheckConyugue=='Si'){
  $insertCony="INSERT INTO empleado_de(fkEmpleado,fkDE,Respuesta,Monto) values ('$idEmp','2','$DondeConyugue','$PercepcionContugue')";
  $resultadoCony=mysqli_query($conexion,$insertCony);
  if(!$resultadoCony){
    echo 'Error al registrar Conyugue';
    echo "<br>";
  }else{
    echo 'Registro exitoso Conyugue';
    echo "<br>";
  }
}else{
  $insertCony="INSERT INTO empleado_de(fkEmpleado,fkDE,Respuesta,Monto) values ('$idEmp','2','No','0')";
  $resultadoCony=mysqli_query($conexion,$insertCony);
  if(!$resultadoCony){
    echo 'Error al registrar Conyugue';
    echo "<br>";
  }else{
    echo 'Registro exitoso Conyugue';
    echo "<br>";
  }
}
$resultadoCony->free();

if($CheckCasaPropia=='Si'){
  $insertValorCasa="INSERT INTO empleado_de(fkEmpleado,fkDE,Respuesta,Monto) values ('$idEmp','3','Si','$ValorCasa')";
  $resultadoValorCasa=mysqli_query($conexion,$insertValorCasa);
  if(!$resultadoValorCasa){
    echo 'Error al registrar Casa';
    echo "<br>";
  }else{
    echo 'Registro exitoso Casa';
    echo "<br>";
  }
}else{
  $insertValorCasa="INSERT INTO empleado_de(fkEmpleado,fkDE,Respuesta,Monto) values ('$idEmp','3','No','0')";
  $resultadoValorCasa=mysqli_query($conexion,$insertValorCasa);
  if(!$resultadoValorCasa){
    echo 'Error al registrar Casa';
    echo "<br>";
  }else{
    echo 'Registro exitoso Casa';
    echo "<br>";
  }
}
$resultadoValorCasa->free();

if($CheckRenta=='Si'){
  $insertRenta="INSERT INTO empleado_de(fkEmpleado,fkDE,Respuesta,Monto) values ('$idEmp','4','Si','$MontoRenta')";
  $resultadoRenta=mysqli_query($conexion,$insertRenta);
  if(!$resultadoRenta){
    echo 'Error al registrar Renta';
    echo "<br>";
  }else{
    echo 'Registro exitoso Renta';
    echo "<br>";
  }
}else{
  $insertRenta="INSERT INTO empleado_de(fkEmpleado,fkDE,Respuesta,Monto) values ('$idEmp','4','No','0')";
  $resultadoRenta=mysqli_query($conexion,$insertRenta);
  if(!$resultadoRenta){
    echo 'Error al registrar Renta';
    echo "<br>";
  }else{
    echo 'Registro exitoso Renta';
    echo "<br>";
  }
}
$resultadoRenta->free();

if($CheckAuto=='Si'){
  $insertAuto="INSERT INTO empleado_de(fkEmpleado,fkDE,Respuesta,Monto) values ('$idEmp','5','$MarcaAuto','$ModeloAuto')";
  $resultadoAuto=mysqli_query($conexion,$insertAuto);
  if(!$resultadoAuto){
    echo 'Error al registrar Auto';
    echo "<br>";
  }else{
    echo 'Registro exitoso Auto';
    echo "<br>";
  }
}else{
  $insertAuto="INSERT INTO empleado_de(fkEmpleado,fkDE,Respuesta,Monto) values ('$idEmp','5','No','0')";
  $resultadoAuto=mysqli_query($conexion,$insertAuto);
  if(!$resultadoAuto){
    echo 'Error al registrar Auto';
    echo "<br>";
  }else{
    echo 'Registro exitoso Auto';
    echo "<br>";
  }
}
 $resultadoAuto->free();


if($CheckDeudas=='Si'){
  $insertDeudas="INSERT INTO empleado_de(fkEmpleado,fkDE,Respuesta,Monto) values ('$idEmp','6','$QuienDeuda','$MontoDeuda')";
  $resultadoDuedas=mysqli_query($conexion,$insertDeudas);
  if(!$resultadoDuedas){
    echo 'Error al registrar Deudas';
    echo "<br>";
  }else{
    echo 'Registro exitoso Deudas';
    echo "<br>";
  }
   

  $insertADeudas="INSERT INTO empleado_de(fkEmpleado,fkDE,Respuesta,Monto) values ('$idEmp','7','','$AbodonoDeuda')";
  $resultadoADuedas=mysqli_query($conexion,$insertADeudas);
  if(!$resultadoADuedas){
    echo 'Error al registrar Deudas Abono';
    echo "<br>";
  }else{
    echo 'Registro exitoso Deudas Abono ';
    echo "<br>";
  }
 

}else{
  $insertDeudas="INSERT INTO empleado_de(fkEmpleado,fkDE,Respuesta,Monto) values ('$idEmp','6','No','0')";
  $resultadoDuedas=mysqli_query($conexion,$insertDeudas);
  if(!$resultadoDuedas){
    echo 'Error al registrar Deudas';
    echo "<br>";
  }else{
    echo 'Registro exitoso Deudas';
    echo "<br>";
  }
  $insertADeudas="INSERT INTO empleado_de(fkEmpleado,fkDE,Respuesta,Monto) values ('$idEmp','7','No','0')";
  $resultadoADuedas=mysqli_query($conexion,$insertADeudas);
  if(!$resultadoADuedas){
    echo 'Error al registrar Deudas Abono';
    echo "<br>";
  }else{
    echo 'Registro exitoso Deudas Abono ';
    echo "<br>";
  }
}
$resultadoDuedas->free();
 $resultadoADuedas->free();
  $insertGastosM="INSERT INTO empleado_de(fkEmpleado,fkDE,Respuesta,Monto) values ('$idEmp','8','','$GastosMensuales')";
  $resultadoGastosM=mysqli_query($conexion,$insertGastosM);
  if(!$resultadoGastosM){
    echo 'Error al registrar GastosM';
    echo "<br>";
  }else{
    echo 'Registro exitoso GastosM';
    echo "<br>";
  }
  $insertGastosM->free();

/*********************************
TABLA EMPLEADO_DG(DATOS GENERALES)
********************************/
//Datos generales

//Para los datos generales se sigue el mismo principio que los de, solo que en este solo cambiara la respuesta, que sera la que se especifco en el formulario, o un "si/no".
if ($ComoSupoEmleo=='otros') {
  $insertSupoE="INSERT INTO empleado_dg(fkDG,fkEmpleado,Respuesta) values ('1','$idEmp','$EspecificarEmpleo')";
  $resultadoSupoE=mysqli_query($conexion,$insertSupoE);
    if(!$resultadoSupoE){
    echo 'Error al registrar SupoeMPLEO';
    echo "<br>";
  }else{
    echo 'Registro exitoso SupoeMPLEO';
    echo "<br>";
  }

}else{
  $insertSupoE="INSERT INTO empleado_dg(fkDG,fkEmpleado,Respuesta) values ('1','$idEmp','$ComoSupoEmleo')";
  $resultadoSupoE=mysqli_query($conexion,$insertSupoE);
  if(!$resultadoSupoE){
    echo 'Error al registrar SupoeMPLEO';
    echo "<br>";
  }else{
    echo 'Registro exitoso SupoeMPLEO';
    echo "<br>";
  }
}
$resultadoSupoE->free();

if ($CheckPariente=='Si') {
  $insertParientes="INSERT INTO empleado_dg(fkDG,fkEmpleado,Respuesta) values ('2','$idEmp','$NombreParientes')";
  $resultadoParientes=mysqli_query($conexion,$insertParientes);
  if(!$resultadoParientes){
    echo 'Error al registrar SupoeMPLEO';
    echo "<br>";
  }else{
    echo 'Registro exitoso SupoeMPLEO';
    echo "<br>";
  }
}else{
  $insertParientes="INSERT INTO empleado_dg(fkDG,fkEmpleado,Respuesta) values ('2','$idEmp','No')";
  $resultadoParientes=mysqli_query($conexion,$insertParientes);
  if(!$resultadoParientes){
    echo 'Error al registrar SupoeMPLEO';
    echo "<br>";
  }else{
    echo 'Registro exitoso SupoeMPLEO';
    echo "<br>";
  }
}
$resultadoParientes->free();
if ($CheckAfian=='Si') {
  $insertAfian="INSERT INTO empleado_dg(fkDG,fkEmpleado,Respuesta) values ('3','$idEmp','$AfianzadoCia')";
  $resultadoAfian=mysqli_query($conexion,$insertAfian);
  if(!$resultadoAfian){
    echo 'Error al registrar Afianzado';
    echo "<br>";
  }else{
    echo 'Registro exitoso Afianzad';
    echo "<br>";
  }
}else{
  $insertAfian="INSERT INTO empleado_dg(fkDG,fkEmpleado,Respuesta) values ('3','$idEmp','No')";
  $resultadoAfian=mysqli_query($conexion,$insertAfian);
  if(!$resultadoAfian){
    echo 'Error al registrar Afianzado';
    echo "<br>";
  }else{
    echo 'Registro exitoso Afianzad';
    echo "<br>";
  }
}
$resultadoAfian->free();
if ($CheckSindi=='Si') {
  $insertSindi="INSERT INTO empleado_dg(fkDG,fkEmpleado,Respuesta) values ('4','$idEmp','$SindicatoCia')";
  $resultadoSindi=mysqli_query($conexion,$insertSindi);
  if(!$resultadoSindi){
    echo 'Error al registrar Sindicato';
    echo "<br>";
  }else{
    echo 'Registro exitoso Sindicato';
    echo "<br>";
  }
}else{
  $insertSindi="INSERT INTO empleado_dg(fkDG,fkEmpleado,Respuesta) values ('4','$idEmp','No')";
  $resultadoSindi=mysqli_query($conexion,$insertSindi);
  if(!$resultadoSindi){
    echo 'Error al registrar Sindicato';
    echo "<br>";
  }else{
    echo 'Registro exitoso Sindicato';
    echo "<br>";
  }
}
$resultadoSindi->free();
if ($CheckSeguroV=='Si') {
  $insertSV="INSERT INTO empleado_dg(fkDG,fkEmpleado,Respuesta) values ('5','$idEmp','$SeguroVidaCia')";
  $resultadoSV=mysqli_query($conexion,$insertSV);
  if(!$resultadoSV){
    echo 'Error al registrar SV';
    echo "<br>";
  }else{
    echo 'Registro exitoso Sv';
    echo "<br>";
  }
}else{
    $insertSV="INSERT INTO empleado_dg(fkDG,fkEmpleado,Respuesta) values ('5','$idEmp','No')";
  $resultadoSV=mysqli_query($conexion,$insertSV);
  if(!$resultadoSV){
    echo 'Error al registrar SV';
    echo "<br>";
  }else{
    echo 'Registro exitoso Sv';
    echo "<br>";
  }
}
$resultadoSV->free();
if ($CheckViajar=='No') {
  $insertViajar="INSERT INTO empleado_dg(fkDG,fkEmpleado,Respuesta) values ('6','$idEmp','$RazonViajar')";
  $resultadoViajar=mysqli_query($conexion,$insertViajar);
  if(!$resultadoViajar){
    echo 'Error al registrar Viaje';
    echo "<br>";
  }else{
    echo 'Registro exitoso Viaje';
    echo "<br>";
  }
}else{
  $insertViajar="INSERT INTO empleado_dg(fkDG,fkEmpleado,Respuesta) values ('6','$idEmp','Si')";
  $resultadoViajar=mysqli_query($conexion,$insertViajar);
  if(!$resultadoViajar){
    echo 'Error al registrar Viaje';
    echo "<br>";
  }else{
    echo 'Registro exitoso Viaje';
    echo "<br>";
  }
}
  $resultadoViajar->free();

if ($CheckCambiarRD=='No') {
  $insertCRD="INSERT INTO empleado_dg(fkDG,fkEmpleado,Respuesta) values ('7','$idEmp','$RazonCambiarD')";
  $resultadoCRD=mysqli_query($conexion,$insertCRD);
  if(!$resultadoCRD){
    echo 'Error al registrar Cambiar residencia';
    echo "<br>";
  }else{
    echo 'Registro exitoso Cambiar residencia ';
    echo "<br>";
  }
}else{

  $insertCRD="INSERT INTO empleado_dg(fkDG,fkEmpleado,Respuesta) values ('7','$idEmp','Si')";
  $resultadoCRD=mysqli_query($conexion,$insertCRD);
  if(!$resultadoCRD){
    echo 'Error al registrar Cambiar residencia';
    echo "<br>";
  }else{
    echo 'Registro exitoso Cambiar residencia ';
    echo "<br>";
  }

}
$resultadoCRD->free();
$insertFechaPT="INSERT INTO empleado_dg(fkDG,fkEmpleado,Respuesta) values ('8','$idEmp','$FechaTrabajar')";
$resultadoFechaPT=mysqli_query($conexion,$insertFechaPT);

  if(!$resultadoFechaPT){
    echo 'Error al registrar fecha presentarse';
    echo "<br>";
  }else{
    echo 'Registro exitoso fecha presentarse ';
    echo "<br>";
  }
  $resultadoFechaPT->free();
/*****************************************
TABLA CONTACTO_EMERGENCIA
*****************************************/
//datos extra 
//La estructura de esta parte es similar a la de referencias
$arrayContactosEmer=array($CE1Nombre,$CE1Telefono,$CE1Parentesco,$CE2Nombre,$CE2Telefono,$CE2Parentesco,$CE3Nombre,$CE3Telefono,$CE3Parentesco,$CE4Nombre,$CE4Telefono,$CE4Parentesco);
$longACE=count($arrayContactosEmer);
for ($cde=0; $cde < $longACE ; $cde=$cde+3) { 
  $cde1=$cde+1;
  $cde2=$cde+2;

  if ($arrayContactosEmer[$cde]=="") {
    # code...
  }else{
    $insertCE="INSERT INTO contacto_emergencia(Nombre,Telefono,Parentesco,fkEmpleado) values ('$arrayContactosEmer[$cde]','$arrayContactosEmer[$cde1]','$arrayContactosEmer[$cde2]','$idEmp')";
    $resultadoCE=mysqli_query($conexion,$insertCE);
  if(!$resultadoCE){
    echo 'Error al registrar CE'.$cde;
    echo "<br>";
  }else{
    echo 'Registro exitoso CE '.$cde;
    echo "<br>";
  }

  }
}
$resultadoCE->free();
/********************************************
TABLA TELEFONO
********************************************/
//Telefonos
/**
@brief Esta sección hará que dependiendo cuantos números telefónicos introduzco el empleado será el número de registros
*/
$arrayTelefonos=array(); //hay un array por cada valor de la tabla, en este caso el numero de telefono.
$arrayTipoTel=array();//Tipo de telefono

for ($ctf=1; $ctf <= $numTelefonos ; $ctf++) {
  $cct=$ctf-1; //contador para el array
  $arrayTelefonos[$cct]=$_POST["telefonoNumero".$ctf]; //Cada vez que se agregue un nuevo número, el índice del input aumentara, el ciclo hará que reciba n número de inputs, dependiendo de la variable de control de cuantos teléfonos se agregaron.
  $arrayTipoTel[$cct]=$_POST["telefonoTipo".$ctf];
  $insertTelefono="INSERT INTO telefono(Telefono,Tipo,fkEmpleado) values ('$arrayTelefonos[$cct]','$arrayTipoTel[$cct]','$idEmp')";
  $resultadoTelefono=mysqli_query($conexion,$insertTelefono);
    if(!$resultadoTelefono){
    echo 'Error al registrar Telefono'.$ctf;
    echo "<br>";
  }else{
    echo 'Registro exitoso Telefono '.$ctf;
    echo "<br>";
  }

}
$resultadoTelefono->free();

/********************************************
TABLA DATOS FAMILIARES
*********************************************/
//Datos familiares

//Se guardan los datos de la tabla de datos familiares, lo unico que cambiara serael 1 o 0 que representara si el familiare vive o no.
if ($NombreFAM1=="") {
   
}else{
  if ($ViveFAM1=='Si') {
    $insertFAM1="INSERT INTO datos_familiares(Parentesco,Nombre,Vive,Domicilio,Ocupacion,fkEmpleado) values ('Padre','$NombreFAM1',1,'$DomicilioFAM1','$OcupacionFAM1','$idEmp')";  
  }else{
    $insertFAM1="INSERT INTO datos_familiares(Parentesco,Nombre,Vive,Domicilio,Ocupacion,fkEmpleado) values ('Padre','$NombreFAM1',0,'$DomicilioFAM1','$OcupacionFAM1','$idEmp')";  
  }

  $resultadoFAM1=mysqli_query($conexion,$insertFAM1);
  if(!$resultadoFAM1){
    echo 'Error al registrar Fam1';
    echo "<br>";
  }else{
    echo 'Registro exitoso Fam1 ';
    echo "<br>";
  } 
}
$resultadoFAM1->free();
if ($NombreFAM2=="") {

}else{
  if ($ViveFAM2=='Si') {
    $insertFAM2="INSERT INTO datos_familiares(Parentesco,Nombre,Vive,Domicilio,Ocupacion,fkEmpleado) values ('Madre','$NombreFAM2',1,'$DomicilioFAM2','$OcupacionFAM2','$idEmp')";  
  }else{
    $insertFAM2="INSERT INTO datos_familiares(Parentesco,Nombre,Vive,Domicilio,Ocupacion,fkEmpleado) values ('Madre','$NombreFAM2',0,'$DomicilioFAM2','$OcupacionFAM2','$idEmp')";  
  }
  $resultadoFAM2=mysqli_query($conexion,$insertFAM2);
    if(!$resultadoFAM2){
    echo 'Error al registrar Fam2';
    echo "<br>";
  }else{
    echo 'Registro exitoso Fam2';
    echo "<br>";
  } 
}
$resultadoFAM2->free();
if ($NombreFAM3=="") {
  # code...
}else{
  if ($ViveFAM3=='Si') {
    $insertFAM3="INSERT INTO datos_familiares(Parentesco,Nombre,Vive,Domicilio,Ocupacion,fkEmpleado) values ('Espos@','$NombreFAM3',1,'$DomicilioFAM3','$OcupacionFAM3','$idEmp')";  
  }else{
    $insertFAM3="INSERT INTO datos_familiares(Parentesco,Nombre,Vive,Domicilio,Ocupacion,fkEmpleado) values ('Espos@','$NombreFAM3',0,'$DomicilioFAM3','$OcupacionFAM3','$idEmp')";  
  }
  $resultadoFAM3=mysqli_query($conexion,$insertFAM3);
    if(!$resultadoFAM3){
    echo 'Error al registrar Fam3';
    echo "<br>";
  }else{
    echo 'Registro exitoso Fam3';
    echo "<br>";
  } 
}
 $resultadoFAM3->free();
$arrayNhijos=array();
$arrayEhijos=array();

for ($ch=1; $ch <=$numHijos ; $ch++) { 
  $cht=$ch-1;
  $arrayNhijos[$cht]=$_POST["inputNombreHijo".$ch];
  $arrayEhijos[$cht]=$_POST["inputEdadHijo".$ch];
  $insertHijo="INSERT INTO hijos_empleado(Nombre,Edad,fkEmpleado) values ('$arrayNhijos[$cht]','$arrayEhijos[$cht]','$idEmp')";
  $resultadohijo=mysqli_query($conexion,$insertHijo);
  if(!$resultadohijo){
    echo 'Error al registrar hijo'.$ch;
    echo "<br>";
  }else{
    echo 'Registro exitoso hijo'.$ch;
    echo "<br>";
  } 
}
$resultadohijo->free();
/*********************************************
TABLA ESCOLARIDAD
**********************************************/
//Escolaridad
//Al igual que la tabla de telefonos, para llenar esta tabla tenemos una variable de control para saber cuantas escuelas fueron agregadas, y los input de iugal manera iran aumentando en su indice
$arrayIdEscol=array();//id de la direccion de la escuela
$arrayCalle=array();//Calle de la escuela
$arrayNoExt=array();//No ext de la escuela
$arrayAnoI=array();//Año ingreso
$arrayAnoG=array();//Año graduacion
$arrayAnos=array();//Años que estuvo en la institucion
$arrayTituloR=array();//Titulo recibido
$arrayEscA=array();//Estado de la escuela (actual/no actual)
for ($ces=1; $ces <=$numEsceulas ; $ces++) { //contador para el indice
  $cese=$ces-1;//contador para los array
  $arrayIdEscol[$cese]=$_POST["idEscuela".$ces];
  $arrayCalle[$cese]=$_POST["inputCalleEscuela".$ces];
  $arrayNoExt[$cese]=$_POST["inputNumeroEscuela".$ces];
  $arrayAnoI[$cese]=$_POST["inputAnoinicio".$ces];
  $arrayAnoG[$cese]=$_POST["inputAnofinal".$ces];
  $arrayAnos[$cese]=$_POST["inputAnos".$ces];
  $arrayTituloR[$cese]=$_POST["inputTitulo".$ces];
  $arrayEscA[$cese]=$_POST["selectTipoEscuela".$ces];
  echo $cese;
  echo "<br>";
  echo $ces;
  echo "<br>";
  echo "$arrayEscA[$cese]";
  echo "$arrayIdEscol[$cese]";
  $calleno=$arrayCalle[$cese]."|".$arrayNoExt[$cese];//La variable calleno será una combinación de del número exterior con la calle.
  //En caso de que sea su escuela actual se guardaran campos extra 
  $horario=$_POST["inputHorarioEscuelaActual".$ces];  //Horario actual
  $CursoC=$_POST["inputCurso".$ces]; //CursoCarrera
  $Grado=$_POST["inputGrado".$ces];//Grado/Semestre/Trimestre 
  if ($arrayEscA[$cese]=='Si') {//Validacion escuela actual
    $insertEstuioA="INSERT INTO estudio_actual(Horario,Curso_carrera,Grado_nivel,fkEscuelas,fkEmpleado,Anio,Direccion) values ('$horario','$CursoC','$Grado','$arrayIdEscol[$cese]','$idEmp','$arrayAnoI[$cese]','$calleno')";
    $resultadoEstudio=mysqli_query($conexion,$insertEstuioA) or die (mysqli_error($conexion));
     if(!$resultadoEstudio){
    echo 'Error al registrar estudio acutal';
    echo "<br>";
  }else{
    echo 'Registro exitoso estudio actual';
    echo "<br>";
  }    
  }else{
  $insertEscol="INSERT INTO escolaridad(Direccion,Inicio,Fin,Titulo_recibido,fkEscuelas,fkEmpleado,Anios) values ('$calleno','$arrayAnoI[$cese]','$arrayAnoG[$cese]','$arrayTituloR[$cese]','$arrayIdEscol[$cese]','$idEmp','$arrayAnos[$cese]')";
  echo "$arrayIdEscol[$cese]";
  $resultadoEscol=mysqli_query($conexion,$insertEscol) or die(mysqli_error($conexion));
    if(!$resultadoEscol){
    echo 'Error al registrar escol'.$ces;
    echo "<br>";
  }else{
    echo 'Registro exitoso escol'.$ces;
    echo "<br>";
  } 
}
}
$resultadoEstudio->free();
$resultadoEscol->free();
/*****************************
  TABLA EMPLEADO_IDIOMA
  *****************************/

//Idiomas 
//Se usa el mismo metodo que para la tabla telefonos
$arrayNivel=array();
$arrayId=array();

for ($yci=1; $yci <=$Numidiomas ; $yci++) {
  $ycit= $yci-1;
  $arrayNivel[$ycit]=$_POST["inputNivel".$yci];
  $arrayId[$ycit]=$_POST["inputIdioma".$yci];
  $insertIdioma="INSERT INTO empleado_idioma(fkEmpleado,fkIdioma,Nivel) values ('$idEmp','$arrayId[$ycit]','$arrayNivel[$ycit]')";
  $resultadoIdioma=mysqli_query($conexion,$insertIdioma);
    if(!$resultadoIdioma){
    echo 'Error al registrar idioma'.$yci;
    echo "<br>";
  }else{
    echo 'Registro exitoso idioma'.$yci;
    echo "<br>";
  } 
}
$resultadoIdioma->free();
/***************************************
TABLA SOFTWARE
**************************************/

//Software
//Mismo procedimiento que l a tabla telefnos, solo que en este se haran dos insert, uno a la tabla de software con el nuevo software, y  otro a la tabla empleado_software con el nivel del nuevo software agregado por el empleado.
$arrayNuevoS=array();
$arrayNivelA=array();


for ($cst=1; $cst <=$NumOtrosS ; $cst++) { 
  $cstt=$cst-1;
  $arrayNuevoS[$cstt]=$_POST["inputSofware".$cst];
  $arrayNivelA[$cstt]=$_POST["inputNivelSoftware".$cst];
  $insertOsT="INSERT INTO software(Nombre) values ('$arrayNuevoS[$cstt]')";
  $resultadoOsT=mysqli_query($conexion,$insertOsT);
    if(!$resultadoOsT){
    echo 'Error al registrar tabla soft'.$cst;
    echo "<br>";
  }else{
    echo 'Registro exitoso tabla soft'.$cst;
    echo "<br>";
  }

  $lastSoft=mysqli_insert_id($conexion);//funcion de php para obtener el id del ultimo insert

  $insertToS="INSERT INTO empleado_software(fkSoftware,fkEmpleado,Nivel) values ('$lastSoft','$idEmp','$arrayNivelA[$cstt]')";
  $resultadoTos=mysqli_query($conexion,$insertToS);
  if(!$resultadoTos){
    echo 'Error al registrar tabla empleado soft'.$cst;
    echo "<br>";
  }else{
    echo 'Registro exitoso tabla empleado soft'.$cst;
    echo "<br>";
  }


}
$resultadoOsT->free();
$resultadoTos->free();
/*******************************************
TABLA EMPLEO
*******************************************/

//empleo
//Se usa el mismo procedimiento que la tabla de escolaridad
$arrayEmpleoAc=array();
$arrayIniciioEmpleo=array();
$arrayTerminoPrestar=array();
$arrayNombreCompania=array();
$arrayDireccionCompania=array();
$arrayTelefonoCompania=array();
$arrayPuesto=array();
$arraySueldoM=array();
$arrayMotivoSep=array();
$arrayJefeDirecto=array();
$arrayPuestoJefeDirecto=array();
$arrayComentarios=array();


for ($xce=1; $xce <= $numEmpleos; $xce++) { 
  $xcet=$xce-1;
  $arrayEmpleoAc[$xcet]=$_POST["selectEmpleo".$xce];
  $arrayIniciioEmpleo[$xcet]=$_POST["servicioInicio".$xce];
  $arrayTerminoPrestar[$xcet]=$_POST["servicioFinal".$xce];
  $arrayNombreCompania[$xcet]=$_POST["inputNombreCompania".$xce];
  $arrayDireccionCompania[$xcet]=$_POST["inputDireccionCompania".$xce];
  $arrayTelefonoCompania[$xcet]=$_POST["inputTelefonoCompania".$xce];
  $arrayPuesto[$xcet]=$_POST["inputPuestoAnterior".$xce];
  $arraySueldoM[$xcet]=$_POST["inputSueldoAnterior".$xce];
  $arrayMotivoSep[$xcet]=$_POST["inputMotivo".$xce];
  $arrayJefeDirecto[$xcet]=$_POST["inputNombreJefe".$xce];
  $arrayPuestoJefeDirecto[$xcet]=$_POST["inputPuestoJefe".$xce];
  $arrayComentarios[$xcet]=$_POST["comentariosJefe".$xce];
  if ($arrayEmpleoAc[$xcet]=='actual') {
    $actualE=1; //empledo actual
  }else{
    $actualE=0; //empleo no actual
  }

  $insertEmpleo="INSERT INTO empleo(Tiempo_inicio,Tiempo_fin,Nombre,Direccion,Telefono,Puesto,Sueldo_mensual,Motivo_separacion,Nombre_jefe,Puesto_jefe,Comentarios,Actual) values ('$arrayIniciioEmpleo[$xcet]','$arrayTerminoPrestar[$xcet]','$arrayNombreCompania[$xcet]','$arrayDireccionCompania[$xcet]','$arrayTelefonoCompania[$xcet]','$arrayPuesto[$xcet]',$arraySueldoM[$xcet],'$arrayMotivoSep[$xcet]','$arrayJefeDirecto[$xcet]','$arrayPuestoJefeDirecto[$xcet]','$arrayComentarios[$xcet]','$actualE')";
  $resultadoempleo=mysqli_query($conexion,$insertEmpleo) or die(mysqli_error($conexion));
  if(!$resultadoempleo){
    echo 'Error al registrar EMPLEO'.$xcet;
    echo "<br>";
  }else{
    echo 'Registro exitoso empleo'.$xcet;
    echo "<br>";
  }
  $lastEmpleo=mysqli_insert_id($conexion);
  $insertEmpleo_Empleado="INSERT INTO empleado_empleo(fkEmpleado,fkEmpleo) values ('$idEmp','$lastEmpleo')";
  $resultadoEmleadoEmpleo=mysqli_query($conexion,$insertEmpleo_Empleado) or die(mysqli_error($conexion));
  if(!$resultadoEmleadoEmpleo){
    echo 'Error al registrar empleado_empleo'.$xcet;
    echo "<br>";
  }else{
    echo 'Registro exitoso empleado_empleo'.$xcet;
    echo "<br>";
  }    
  


}
$resultadoempleo->free();
$resultadoEmleadoEmpleo->();
/**********************************************************
TABLA EMPLEADOS_REDES
**********************************************************/

if ($cuentayoutube=='') {
  
}else{
  $insertyoutube="INSERT INTO empleado_redes(fkEmpleado,fkRedsocial,Cuenta) values ('$idEmp',4,'$cuentayoutube')";
  $resultadoutube=mysqli_query($conexion,$insertyoutube);
  if(!$resultadoutube){
    echo 'Error al registrar youtube';
    echo "<br>";
  }else{
    echo 'Registro exitoso youtube';
    echo "<br>";
  } 
}
$resultadoutube->free();

if ($cuentaface=='') {
  
}else{
  $insertface="INSERT INTO empleado_redes(fkEmpleado,fkRedsocial,Cuenta) values ('$idEmp',1,'$cuentaface')";
  $resultadoface=mysqli_query($conexion,$insertface);
  if(!$resultadoface){
    echo 'Error al registrar face';
    echo "<br>";
  }else{
    echo 'Registro exitoso face';
    echo "<br>";
  } 
}


if ($cuentatwitter=='') {
  
}else{
  $inserttwitter="INSERT INTO empleado_redes(fkEmpleado,fkRedsocial,Cuenta) values ('$idEmp',2,'$cuentatwitter')";
  $resultadotwitter=mysqli_query($conexion,$inserttwitter);
  if(!$resultadotwitter){
    echo 'Error al registrar twitter';
    echo "<br>";
  }else{
    echo 'Registro exitoso twiiter';
    echo "<br>";
  } 
}


if ($cuentainstagram=='') {
  
}else{
  $insertinstagram="INSERT INTO empleado_redes(fkEmpleado,fkRedsocial,Cuenta) values ('$idEmp',3,'$cuentainstagram')";
  $resultadoinsta=mysqli_query($conexion,$insertinstagram);
  if(!$resultadoinsta){
    echo 'Error al registrar insta';
    echo "<br>";
  }else{
    echo 'Registro exitoso insta';
    echo "<br>";
  } 
}
$resultadoNacio->free();
$resultadoEmpleado->free();
mysqli_close($conexion);

exit;

?>