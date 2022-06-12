<?php
$conectar=mysqli_connect('localhost','root','12345678','ejerciciophp');
if(!$conectar){
    die("No se pudo ".mysqli_connect_error());
}
echo("Si se pudo!  ");
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$idcat=$_POST['idcat'];
$sql="INSERT into libros values(".$id.",'".$nombre."',".$idcat.");";

if(mysqli_query($conectar,$sql)){
    echo "Registro guardado exitosamente <a href='index.html'>Volver</a><br>";
}else{
    echo "Error: ".$sql."<br>".mysqli_error($conectar);
}
mysqli_close($conectar);
?>