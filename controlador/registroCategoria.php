<?php
  include_once("../BD/conexion.php");
  $cnn= new conexion();
  $con =$cnn->conectar();
  mysqli_select_db($con,"restaurante");
  $nombre = strtoupper($_POST["nombre"]);

  $VERIFY_USER = "SELECT * FROM categoria WHERE nombre='$nombre'";
  $QUERY_VERIFY = mysqli_query($con,$VERIFY_USER);
  $TAM = mysqli_num_rows($QUERY_VERIFY);

  if ($TAM > 0) {
    header('location:../vista/registro_categoria.php?error=201');
  } else {
    $QUERY_INSERT = "INSERT INTO categoria(idCategoria,nombre,estado)
                     VALUES('','$nombre','Habilitado')";
      if(!mysqli_query($con, $QUERY_INSERT)) {
        die("Error al insertar categoria nuevo");
      } else{
        header('location:../vista/registro_categoria.php');
      }
  }

  mysqli_close($con);
?>
