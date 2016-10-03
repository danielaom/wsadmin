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

    if (!empty($_POST["imagen"])) {
      # code...
      $choose = $_POST['imagen'];

      $image = "http://localhost:8888/wsadmin/img/".$choose;
      $sql_query = "UPDATE producto SET nombre='$nombre',descripcion='$descripcion',precio='$precio',categoriIdCategoria='$categoria',imagen='$imagen',estado='$estado' WHERE idProducto='$ID'";

      if (!mysqli_query($con,$sql_query)) {
          echo "Error al Actualizar";
      }
      header("Location: ../vista/registro_producto.php");
      mysqli_close($con);
    } else {
      # code...
      $sql_query = "UPDATE producto SET nombre='$nombre',descripcion='$descripcion',precio='$precio',categoriIdCategoria='$categoria',estado='$estado' WHERE idProducto='$ID'";
      if (!mysqli_query($con,$sql_query)) {
          echo "Error al Actualizar imagen";
      }
      header("Location: ../vista/registro_producto.php");
      mysqli_close($con);
    }





}
?>
