<!DOCTYPE html>
<html>
<head>
	<title>Mostrar</title>
</head>
<body>
		<form action="#" >
		<p>DATOS DE LA TABLA: categoria </p>
		<br>
		<table >
		<tr>
		<th>idcategoria</th><th>Tipo</th>
		<?php
			$conectar=mysqli_connect('localhost','root','12345678','ejerciciophp');
			if(!$conectar){
				die("Conexion Fallida: ".mysqli_connect_error());
            }
			$sql="SELECT *FROM categorias";
		 	$consulta=mysqli_query($conectar,$sql)or die(mysqli_error($conectar));

			$registros=mysqli_fetch_array($consulta);
			do{
				$id=$registros['idcategoria'];
				$nom=$registros['categoria'];
				echo "<tr><td>$id</td><td>$nom</td></tr>";
			}while($registros=mysqli_fetch_array($consulta));
		?>
        </table>
        <p>Datos de la tabla: libros</p>
        <br>
        <table >
		<tr>
		<th>idlibro</th><th>nombre</th><th>idcategoria</th>
		<?php
			$conectar=mysqli_connect('localhost','root','12345678','ejerciciophp');
			if(!$conectar){
				die("Conexion Fallida: ".mysqli_connect_error());
            }
			$sql="SELECT *FROM libros";
		 	$consulta=mysqli_query($conectar,$sql)or die(mysqli_error($conectar));

			$registros=mysqli_fetch_array($consulta);
			do{
				$id=$registros['idlibros'];
                $nom=$registros['nombre'];
                $idcat=$registros['idcategoria'];
				echo "<tr><td>$id</td><td>$nom</td><td>$idcat</td></tr>";
			}while($registros=mysqli_fetch_array($consulta));
		?>
        </table>
		</form>
</body>
</html>