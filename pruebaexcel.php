<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>excel</title>
</head>
<body>
	<div class="container">
<h2>Export Data to Excel with PHP and MySQL</h2>
<div class="well-sm col-sm-12">
<div class="btn-group pull-right">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
<button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Export to excel</button>
</form>
</div>
</div>
<table id="" class="table table-striped table-bordered">
<tr>
<th>idEmpleado</th>
<th>Nombre</th>
<th>ApellidoP</th>
<th>ApellidoM</th>
<th>Edad</th>
</tr>
<tbody>
<?php foreach($developer_records as $developer) { ?>
<tr>
<td><?php echo $developer ['idEmpleado']; ?></td>
<td><?php echo $developer ['Nombre']; ?></td>
<td><?php echo $developer ['ApellidoP']; ?></td>
<td><?php echo $developer ['ApellidoM']; ?></td>
<td><?php echo $developer ['Edad']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</body>
</html>
