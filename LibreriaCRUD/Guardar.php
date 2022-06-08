<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $conectar = mysqli_connect('localhost', 'root', '', 'Libreria', 3305) or die("Error al conectar a la base de datos");
    /*
        compruebo si el boton esta definido o no es null,
        devuelve true si el boton existe 
    */
    if (isset($_POST['registrarLibro'])) {
        //obtengo los datos
        $codigoLibro = $_POST['codigoLibro'];
        $nombreLibro = $_POST['nombreLibro'];
        $categoriaLibro = $_POST['categoriaLibro'];
        //creo la consulta y la envio
        $sql = "INSERT INTO libro VALUES ('$codigoLibro','$nombreLibro','$categoriaLibro');";
        mysqli_query($conectar, $sql) or die("Error al insertar");
        echo "Datos Almacenados";
        mysqli_close($conectar);
    }

    if (isset($_POST['BuscarLibro'])) {
        //obtengo el codigo a buscar
        $codigoLibroBuscar = $_POST['codigoLibroBuscar'];
        //guardo la consulta en una variable
        $sql = "SELECT * From libro Where Codigo = '$codigoLibroBuscar'";
        $libros = mysqli_query($conectar, $sql);
        //recorro la tabla
        while ($datos = mysqli_fetch_array($libros)) { 
            echo $datos['codigo'] . " " . $datos['Nombre'] . " " . $datos['Categoria'];
            echo "<br>";
            echo "Datos encontrados";
        }
        mysqli_close($conectar);
    }

    if (isset($_POST['mostrar'])) {
        $sql = "SELECT * From libro";
        $libros = mysqli_query($conectar, $sql);
        while ($datos = mysqli_fetch_array($libros)) {
            echo "Codigo: {$datos['codigo']} Nombre: {$datos['Nombre']} Categoria: {$datos['Categoria']}";
            echo "<br>";
        }
    }
    if (isset($_POST['Prestamo'])) {
        $DPI = $_POST['DPI'];
        $nombreCliente = $_POST['nombreCliente'];
        $codigoPrestar = $_POST['codigoLibroPrestar'];
        $insertar = "INSERT INTO prestamo VALUES('$DPI','$nombreCliente','$codigoPrestar');";
        mysqli_query($conectar, $insertar) or die("Error al Insertar");
        echo "Datos Almacenados";
        mysqli_close($conectar);
    }
    if (isset($_POST['detallePrestamo'])) {
        $cantidadPrestamo = $_POST['cantidadPrestamo'];
        $fecha = $_POST['fecha'];
        $insert = "INSERT INTO DetallePrestamo (cantidadPrestamo,fecha)Values ($cantidadPrestamo,'$fecha');";
        mysqli_query($conectar, $insert) or die("Error al insertar");
        echo "Datos Almacenados";
        mysqli_close($conectar);
    }
    if (isset($_POST['eliminar'])) {
        $codigoLibroEliminar = $_POST['codigoLibroEliminar'];
        $dpiEliminar = $_POST['dpiEliminar'];
        //pendiente
        $consulta = "CALL Eliminar('$codigoLibroEliminar','$dpiEliminar')";
        mysqli_query($conectar, $consulta) or die("Error Al Eliminar");
        echo "Libro y Prestamo Borrado con éxito";
        mysqli_close($conectar);
    }
}
