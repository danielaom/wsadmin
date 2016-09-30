<?php

$con = mysqli_connect("localhost","root","","restaurante");


if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
} else {
    $ID = $_POST['id'];


    $nombre =  strtoupper ($_POST["nombre"]);
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $categoria = $_POST["categoria"];
    $imagen = $_POST["imagen"];
    $estado = $_POST["estado"];


    $sql_query = "UPDATE Producto SET nombre='$nombre',descripcion='$descripcion',precio='$precio',categoria='$categoria',imagen='$imagen',estado='$estado' WHERE idProducto='$ID'";
    $sql_query = "UPDATE Imagen SET imagen='$imagen' WHERE idI='$ID'";
    if (!mysqli_query($con,$sql_query)) {
        echo "Error al Actualizar";
    }

    header("Location: ../vista/registro_producto.php");
    mysqli_close($con);

}
?>
