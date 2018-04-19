<?php
include('db_con.php');

$stmt=$db_con->prepare('select idEmpleado, Nombre, ApellidoP,ApellidoM,Edad from empleado');
$stmt->execute();


?>

<html>
<head>
<title>Export Books Data into Excel Sheet</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="panel">
    <div class="panel-heading">
      <h3>Export Books Data into Excel Sheet</h3>
      <div class="panel-body">
        <table border="1" class="table table-bordered table-striped">
    				<tr>
    					<th>idEmpleado</th>
    					<th width="120">Nombre</th>
    					<th>ApellidoP</th>
              	<th>ApellidoM</th>
                <th>Edad</th>
    				</tr>
    			<?php

    			while($row=$stmt->FETCH(PDO::FETCH_ASSOC)){
    				echo '
    				<tr>
    					<td>'.$row["idEmpleado"].'</td>
    					<td>'.$row["Nombre"].'</td>
    					<td>'.$row["ApellidoP"].'</td>
              <td>'.$row["ApellidoM"].'</td>
              <td>'.$row["Edad"].'</td>
    				</tr>
    				';
    			}
    			?>
    		</table>
    		<a href="export-book.php">Export To Excel</a>

      </div>

    </div>

  </div>

</div>



</body>
</html>
