<?php

$con = mysqli_connect("localhost","root","","restaurante");


if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
} else {
    $ID = $_POST['id'];


    $nombre =  strtoupper ($_POST["nombre"]);
    $apellidoPaterno = $_POST["ap_paterno"];
    $apellidoMaterno = $_POST["ap_materno"];
    $ci = $_POST["ci"];
    $telefono = $_POST["telefono"];
    $estado = $_POST["estado"];


    $sql_query = "UPDATE usuario SET nombre='$nombre',apellidoPaterno='$apellidoPaterno',apellidoMaterno='$apellidoMaterno',ci='$ci',telefono='$telefono',estado='$estado' WHERE idUsuario='$ID'";

    if (!mysqli_query($con,$sql_query)) {
        echo "Error al Actualizar";
    }

    header("Location: ../vista/registro_usuario.php");
    mysqli_close($con);

}
?>

