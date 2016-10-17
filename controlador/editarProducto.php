<?php
include_once("../BD/conexion.php");
$cnn= new conexion();
$con =$cnn->conectar();
mysqli_select_db($con,"restaurante");
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
    if (!empty($_FILES['imagen']['name'])) {
        # code...
        $choose = $_FILES['imagen']['name'];
        $image = "http://192.168.43.199:80/sw/img/".$choose;
        $imageDir = "../img/".$choose;
        move_uploaded_file($_FILES['imagen']['tmp_name'],$imageDir);
        $sql_query = "UPDATE producto SET nombre='$nombre',descripcion='$descripcion',precio='$precio',categoriaIdCategoria='$categoria',imagen='$image',estado='$estado' WHERE idProducto='$ID'";
        if (!mysqli_query($con,$sql_query)) {
            echo "Error al Actualizar";
        }
        header("Location: ../vista/registro_producto.php");
        mysqli_close($con);
    } else {
        # code...
        $sql_query = "UPDATE producto SET nombre='$nombre',descripcion='$descripcion',precio='$precio',categoriaIdCategoria='$categoria',estado='$estado' WHERE idProducto='$ID'";
        if (!mysqli_query($con,$sql_query)) {
            echo "Error al Actualizar imagen";
        }
        header("Location: ../vista/registro_producto.php");
        mysqli_close($con);
    }
}
?>
