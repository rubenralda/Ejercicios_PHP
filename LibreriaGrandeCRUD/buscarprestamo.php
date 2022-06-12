<!DOCTYPE html>
<html>
<head>
	<title>Buscar</title>
</head>
<body>
<form action="#" method="POST">
	<fieldset>
		<legend>Busqueda</legend>
		<label><h3>Ingrese el id del prestamo:</h3></label>
		<input type="text" name="id">
		<br><br>
		<input type="submit" name="Buscar" value="Buscar">
	</fieldset>
	<br>
	<?php
	$ide="";
	$nom="";
	$idcat="";
	if ($_SERVER['REQUEST_METHOD']=='POST'){
		$idbuscar=$_POST['id'];
		$conectar=mysqli_connect('localhost','root','12345678','ejerciciophp');
		if(!$conectar){
			die("Conexion Fallida: ".mysqli_connect_error());
		}
		$sql="SELECT prestamos.fecha,libros.nombre FROM prestamos Inner join libros on libros.idlibros=prestamos.idlibro WHERE idprestamo=$idbuscar;";
		$consulta=mysqli_query($conectar,$sql)or die(mysqli_error($conectar));
		$registros=mysqli_fetch_array($consulta);
		do{
			$ide=$registros['fecha'];
			$nom=$registros['nombre'];
		}while($registros=mysqli_fetch_array($consulta));
	}

	?>
	<fieldset>
		<legend>Datos Del usuario</legend>
		<label><h4>Fecha del prestamo </h4></label><input type="text" name="ide" value=<?php echo $ide ?>>
		<label><h4>Nombre del libro </h4></label><input type="text" name="nom" value=<?php echo $nom ?>>
		</fieldset>
</form>
</body>
</html>