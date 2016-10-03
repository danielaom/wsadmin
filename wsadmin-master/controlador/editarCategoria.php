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

    $estado = $_POST["estado"];


    $sql_query = "UPDATE categoria SET nombre='$nombre',estado='$estado' WHERE idCategoria='$ID'";

    if (!mysqli_query($con,$sql_query)) {
        echo "Error al Actualizar";
    }

    header("Location: ../vista/registro_categoria.php");
    mysqli_close($con);

}
?>
