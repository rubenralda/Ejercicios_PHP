<!DOCTYPE html>
<html>
<head>
	<title>Buscar</title>
</head>
<body>
<form action="#" method="POST">
	<fieldset>
		<legend>Busqueda</legend>
		<label><h3>Ingrese el id del prestamo a eliminar:</h3></label>
		<input type="text" name="id">
		<br><br>
		<input type="submit" name="Buscar" value="Buscar">
	</fieldset>
	<br>
	<?php
	if ($_SERVER['REQUEST_METHOD']=='POST'){
		$idbuscar=$_POST['id'];
		$conectar=mysqli_connect('localhost','root','12345678','ejerciciophp');
		if(!$conectar){
			die("Conexion Fallida: ".mysqli_connect_error());
		}
		$sql="Delete from prestamos where idprestamo=".$idbuscar;
		$consulta=mysqli_query($conectar,$sql)or die(mysqli_error($conectar));
		$registros=mysqli_fetch_array($consulta);
		if(empty($registros)){
			echo("Eliminado");
		}else
		{
			echo("No existe");
		}
	}

	?>
</form>
</body>
</html>