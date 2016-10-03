<?php
    include_once("../BD/conexion.php");
    $cnn= new conexion();
    $con =$cnn->conectar();

    if (mysqli_select_db($con,"restaurante")) {
      # code...
      $usuario = mysqli_real_escape_string($con,$_POST['usuario']);
      $password = mysqli_real_escape_string($con,$_POST['password']);

      $sql = "SELECT * FROM usuariorol WHERE usuario = '$usuario' AND password = '$password'";
      $result=mysqli_query($con,$sql);
      $rows = $result->num_rows;

      if($rows > 0) {
          session_start();
          $row = $result->fetch_assoc();
          $_SESSION['id_usuario'] = $row['idUsuarioRol'];
          $_SESSION['tipo_usuario'] = $row['rolIdRol'];
          $_SESSION['loggedin'] = true;

          header("location: ../index.php");
      } else {
          header("location: ../index.php?error=102");
      }
    } else {
      # code...
      echo "Error al Conectar con la BD";
    }




    mysqli_close($con)
?>
