<?php
include('db_con.php');

$conn = new mysqli('localhost', 'root', 'root');
mysqli_select_db($conn, 'empleadossmt');

//$setSql = "SELECT `ur_Id`,`ur_username`,`ur_password` FROM `tbl_user`";
//$setRec = mysqli_query($conn,$setSql);

$stmt=$db_con->prepare('select idEmpleado,Nombre,ApellidoP,ApellidoM,Edad from empleado');
$stmt->execute();


$columnHeader ='';
$columnHeader = "IdEMPLEADO"."\t"."NOMBRE"."\t"."ApellidoP"."\t"."ApellidoM"."\t"."Edad"."\t";


$setData='';

while($rec =$stmt->FETCH(PDO::FETCH_ASSOC))
{
  $rowData = '';
  foreach($rec as $value)
  {
    $value = '"' . $value . '"' . "\t";
    $rowData .= $value;
  }
  $setData .= trim($rowData)."\n";
}


header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Book record sheet.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo ucwords($columnHeader)."\n".$setData."\n";

?>
