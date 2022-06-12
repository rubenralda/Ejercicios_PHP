<?php
$conectar=mysqli_connect('localhost','root','12345678','ejerciciophp');
if(!$conectar){
    die("No se pudo wey".mysqli_connect_error());
}
echo("Si se pudo!");
$id=$_POST['id'];
$cat=$_POST['cat'];
$idlib=$_POST['idlibro'];
$sql2="insert into prestamos values(".$id.",".$idlib.",'".$cat."')";

if(mysqli_query($conectar,$sql2)){
    echo "Registro guardado exitosamente <a href='index.html'>Volver</a><br>";
}else{
    echo "Error: ".$sql2."<br>".mysqli_error($conectar);
}
mysqli_close($conectar);
?>