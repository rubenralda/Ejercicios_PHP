<!DOCTYPE html>
<html>
<head>
	<title>Buscar</title>
</head>
<body>
<form action="#" method="POST">
	<fieldset>
		<legend>Busqueda</legend>
		<label><h3>Ingrese el id del libro:</h3></label>
		<input type="text" name="id">
		<br><br>
		<input type="submit" name="Buscar" value="Buscar">
	</fieldset>
	<br>
	<?php
	$id="";
	$nom="";
	$idcat="";
	if ($_SERVER['REQUEST_METHOD']=='POST'){
		echo("asdf");
		$idbuscar=$_POST['id'];
		$conectar=mysqli_connect('localhost','root','12345678','ejerciciophp');
		if(!$conectar){
			die("Conexion Fallida: ".mysqli_connect_error());
		}
		$sql="SELECT *FROM libros WHERE idlibros=$idbuscar;";
		$consulta=mysqli_query($conectar,$sql)or die(mysqli_error($conectar));
		$registros=mysqli_fetch_array($consulta);
		do{
			$id=$registros['idlibros'];
			$nom=$registros['nombre'];
			$idcat=$registros['idcategoria'];
		}while($registros=mysqli_fetch_array($consulta)); //HASTA LLEGAR AL FINAL DE LOS REGISTROS
	}

	?>
	<fieldset>
		<legend>Datos Del usuario</legend>
		<label><h4>Id del libro  </h4></label><input type="text" name="id" value=<?php echo $id ?>>
		<label><h4>Nombre del Libro </h4></label><input type="text" name="nom" value=<?php echo $nom ?>>
		<label><h4>Id de la categoria </h4></label><input type="text" name="idcat" value=<?php echo $idcat ?>>
		</fieldset>
</form>
</body>
</html>