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
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];
    $imagen = $_POST["imagen"];
    $estado = $_POST["estado"];

    if (!empty($_FILES['imagen']['name'])) {
        # code...
        $choose = $_FILES['imagen']['name'];

        $image = "http://192.168.1.34:80/sw/img/".$choose;
        $imageDir = "../img/".$choose;

        move_uploaded_file($_FILES['imagen']['tmp_name'],$imageDir);
        $sql_query = "UPDATE promocion SET nombre='$nombre',descripcion='$descripcion',precio='$precio',fechaInicio='$fechaInicio',fechaFin='$fechaFin',imagen='$imagen' WHERE idPromocion='$ID'";

        if (!mysqli_query($con,$sql_query)) {
            echo "Error al Actualizar";
        }
        header("Location: ../vista/mostrar_promocion.php");
        mysqli_close($con);
    } else {
        # code...
        $sql_query = "UPDATE promocion SET nombre='$nombre',descripcion='$descripcion',precio='$precio',fechaInicio='$fechaInicio',fechaFin='$fechaFin',estado='$estado' WHERE idPromocion='$ID'";
        if (!mysqli_query($con,$sql_query)) {
            echo "Error al Actualizar imagen";
        }
        header("Location: ../vista/mostrar_promocion.php");
        mysqli_close($con);
    }

}
?>
