<?php
include("cuerpo/header.php");
?>
    <h1>INSERTAR CATEGORIAS</h1><br>
    <form action="insertcat.php" method="POST">
        <p>Ingresa el id: </p>
        <input type="text" name="id"><br>
        <p>Ingresa el nombre de la categoria:</p>
        <input type="text" name="cat"><br><br>
        <input type="submit">
    </form>
<?php
include("cuerpo/pie.php");